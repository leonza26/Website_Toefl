<?php

namespace App\Http\Controllers\Participant;

use App\Models\Soal;
use App\Models\Materi;
use App\Models\EventUjian;
use App\Models\UjianPeserta;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ParticipantMainController extends Controller
{
    //
    public function index()
    {
        $lastUjian = UjianPeserta::where('user_id', Auth::id())
            ->latest()
            ->first();

        $jadwal = EventUjian::whereDate('tanggal_ujian', '>=', Carbon::today())
            ->orderBy('tanggal_ujian', 'asc')
            ->get();

        return view('participant.dashboard', compact('lastUjian','jadwal'));
    }

    public function materi()
    {
        $materis = Materi::all();

        return view('participant.materi', compact('materis'));
    }

    public function simulasi()
    {
        $eventUjian = EventUjian::with('bankSoal')
            ->where('status', 'aktif')
            ->first();

        return view('participant.simulasi', compact('eventUjian'));
    }

    public function startUjian(EventUjian $eventUjian, Request $request)
    {
        // 1. Validasi token
        $request->validate(['token' => 'required|string']);
        if ($request->token !== $eventUjian->token) {
            return back()->withErrors(['token' => 'Token yang Anda masukkan tidak sesuai.'])->withInput();
        }

        // 2. Cek apakah peserta sudah pernah memulai, jika belum, buat sesi baru.
        $ujianPeserta = UjianPeserta::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'event_ujian_id' => $eventUjian->id,
            ],
            [
                'waktu_mulai' => now(),
                'waktu_selesai' => Carbon::now()->addMinutes($eventUjian->waktu_ujian),
            ]
        );

        // 3. Alih-alih return view, kita REDIRECT ke rute GET
        return redirect()->route('participant.ujian.show', $ujianPeserta);
    }

    /**
     * Metode baru ini menangani GET untuk menampilkan halaman ujian.
     * Tugasnya: Siapkan data dan tampilkan view.
     */
    public function showUjianPage(UjianPeserta $ujianPeserta)
    {
        // Keamanan: Pastikan user hanya bisa melihat ujiannya sendiri
        if ($ujianPeserta->user_id !== Auth::id()) {
            abort(403);
        }

        // Siapkan 'peta' soal di session jika belum ada atau jika sesi berbeda
        $soalIds = $ujianPeserta->eventUjian->bankSoal->soals()->pluck('id')->toArray();
        session([
            'ujian_soal_ids'   => $soalIds,
            'ujian_soal_index' => 0 // Selalu mulai dari soal pertama saat halaman dimuat
        ]);

        $currentIndex = 0;

        // Hitung sisa waktu ujian
        $sisaWaktu = Carbon::now()->diffInSeconds(Carbon::parse($ujianPeserta->waktu_selesai), false);
        if ($sisaWaktu < 0) {
            $sisaWaktu = 0;
        }

        // Kirim semua data yang diperlukan ke view
        return view('participant.ujian', [
            'eventUjian'   => $ujianPeserta->eventUjian,
            'ujianPeserta' => $ujianPeserta,
            'totalSoal'    => count($soalIds),
            'nomorSoal'    => $currentIndex + 1, // Nomor soal mulai dari 1
            'sisaWaktu'    => $sisaWaktu,
        ]);
    }
}
