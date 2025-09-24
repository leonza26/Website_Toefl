<?php
    namespace App\Http\Controllers\Participant;

    use App\Models\Soal;
    use App\Models\UjianPeserta;
    use Illuminate\Http\Request;
    use App\Models\JawabanPeserta;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Auth;

    class UjianProsesController extends Controller
    {
        /**
         * Mengambil data soal berdasarkan nomor untuk ditampilkan melalui AJAX.
         */
        public function muatSoal(UjianPeserta $ujianPeserta, Request $request)
        {

            if ($ujianPeserta->user_id !== Auth::id()) {
                return response()->json(['error' => 'Unauthorized'], 403);
            }

            $nomorSoal = $request->input('nomor', 1);
            $soalIds = $request->session()->get('ujian_soal_ids', []);

            $request->session()->put('ujian_soal_index', $nomorSoal - 1);

            $currentSoalId = $soalIds[$nomorSoal - 1] ?? null;

            if (!$currentSoalId) {
                return response()->json(['error' => 'Soal tidak ditemukan'], 404);
            }

            // Ambil data soal
            $soal = Soal::findOrFail($currentSoalId);

            $soal->nomor = $nomorSoal;

            $soal->append('file_url');

        $semuaJawaban = JawabanPeserta::where('ujian_peserta_id', $ujianPeserta->id)
            ->get(['soal_id', 'jawaban', 'is_ragu'])
            ->keyBy('soal_id');

        // Buat array baru untuk jawaban yang akan menyertakan nomor urut soal
        $jawabanDenganNomor = [];
        foreach($semuaJawaban as $soal_id => $jawaban) {
            // Cari nomor urut soal berdasarkan posisinya di 'peta' session
            $nomorUrut = array_search($soal_id, $soalIds);
            if ($nomorUrut !== false) {
                $jawabanDenganNomor[$soal_id] = [
                    'jawaban' => $jawaban->jawaban,
                    'is_ragu' => $jawaban->is_ragu,
                    'nomor' => $nomorUrut + 1, // +1 karena index array dimulai dari 0
                ];
            }
        }

            return response()->json([
                'soal' => $soal,
                'jawaban_peserta' => $jawabanDenganNomor,
            ]);
        }

        public function simpanJawaban(Request $request)
        {
            $validated = $request->validate([
                'ujian_peserta_id' => 'required|integer|exists:ujian_pesertas,id',
                'soal_id' => 'required|integer|exists:soals,id',
                'jawaban' => 'nullable|in:a,b,c,d',
                'is_ragu' => 'required|boolean',
            ]);

            $ujianPeserta = UjianPeserta::findOrFail($validated['ujian_peserta_id']);
            if ($ujianPeserta->user_id !== Auth::id()) {
                return response()->json(['error' => 'Unauthorized'], 403);
            }

            JawabanPeserta::updateOrCreate(
                [
                    'ujian_peserta_id' => $validated['ujian_peserta_id'],
                    'soal_id' => $validated['soal_id'],
                ],
                [
                    'jawaban' => $validated['jawaban'],
                    'is_ragu' => $validated['is_ragu'],
                ]
            );

            return response()->json(['success' => true, 'message' => 'Jawaban disimpan.']);
        }

        /**
         * Menyelesaikan ujian, menghitung skor, dan menyimpan hasilnya.
         */
        public function selesaikanUjian(Request $request)
        {
            $ujianPesertaId = $request->input('ujian_peserta_id');
            $ujianPeserta = UjianPeserta::with('eventUjian.bankSoal.soals')->findOrFail($ujianPesertaId);

            if ($ujianPeserta->user_id !== Auth::id()) {
                abort(403, 'Unauthorized action.');
            }

            $jawabanPesertas = JawabanPeserta::where('ujian_peserta_id', $ujianPeserta->id)->pluck('jawaban', 'soal_id');
            $kunciJawaban = $ujianPeserta->eventUjian->bankSoal->soals->pluck('jawaban_benar', 'id');

            $jumlahBenar = 0;
            foreach ($kunciJawaban as $soalId => $jawabanBenar) {
                // Menggunakan strtolower untuk perbandingan yang tidak case-sensitive
                if (isset($jawabanPesertas[$soalId]) && strtolower($jawabanPesertas[$soalId]) === strtolower($jawabanBenar)) {
                    $jumlahBenar++;
                }
            }

            $totalSoal = count($kunciJawaban);

            //  format skor  (contoh: "18/20")
            $skorString = $jumlahBenar . '/' . $totalSoal;

            $ujianPeserta->update([
                'skor' => $skorString,
                'status' => 'selesai',
            ]);

            $request->session()->forget(['ujian_soal_ids', 'ujian_soal_index']);

            return redirect()->route('participant')->with('success', "Ujian selesai! Skor Anda: $skorString");
            }

    }
