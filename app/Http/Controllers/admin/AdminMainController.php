<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BankSoal;
use App\Models\Materi;
use App\Models\Soal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminMainController extends Controller
{
    //
    public function admin()
    {
        $mahasiswa = User::where('role', 1)->count();
        $bank_soal = BankSoal::count();

        return view('admin.admin', compact('mahasiswa', 'bank_soal'));
    }

    // manage user
    public function manageuser(Request $request)
    {
        $search = $request->input('search');

        $query = User::query();

        if ($search) {
            $query->where(function ($q) use ($search) {

                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");

                if (strtolower($search) === 'admin') {
                    $q->orWhere('role', '=', 0);
                } elseif (strtolower($search) === 'participant' || strtolower($search) === 'user') {
                    $q->orWhere('role', '=', 1);
                }
            });
        }

        $users = $query->latest()->paginate(10);

        return view('admin.manage', compact('users', 'search'));
    }

    public function destroyuser($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('admin.manage')->with('success', 'User berhasil dihapus!');
    }

    // materi
    public function materi()
    {
        $materis = Materi::latest()->get();

        return view('admin.materi', compact('materis'));
    }

    public function buatmateri()
    {
        return view('admin.manajemenMateri');
    }

    public function create_materi(Request $request)
    {
        // 1. Validate input
        $request->validate(
            [
                'materiFile' => 'required|mimes:pdf|max:10240', // max 10mb
            ],
            [
                'materiFile.max' => 'Ukuran file PDF tidak boleh lebih dari 10MB.',
                'materiFile.mimes' => 'File harus berupa PDF.',
            ]
        );

        // 2. Store file in storage/app/public/pdfs
        $path = $request->file('materiFile')->store('pdfs', 'public');

        Materi::create([
            'jenis_bahasa' => $request->jenisBahasa,
            'jenis_materi' => $request->jenisMateri,
            'materi' => $path,
        ]);

        return redirect()->route('admin.materi');
    }

    public function hapus_materi($id)
    {
        $materi = Materi::findOrFail($id);

        // delete file if exists
        if ($materi->materi && Storage::disk('public')->exists($materi->materi)) {
            Storage::disk('public')->delete($materi->materi);
        }

        $materi->delete();

        return redirect()->routwhate('admin.materi')->with('success', 'Materi berhasil dihapus!');
    }

    // bank soal
    public function banksoal(Request $request)
    {
        $search = $request->input('search');
        $materi = $request->input('materi');

        // kolom yang dicari
        $columns = ['jenis_bahasa', 'jenis_materi', 'nama_banksoal'];

        // Query dengan filter search
        $bank_soals = BankSoal::when($search, function ($query, $search) use ($columns) {
            $query->where(function ($q) use ($search, $columns) {
                foreach ($columns as $col) {
                    $q->orWhere($col, 'like', "%{$search}%");
                }
            });
        })
            ->when($materi, function ($query, $materi) {
                $query->where('jenis_materi', $materi); // pastikan ada kolom `materi` di tabel

            })

            ->latest()
            ->get();

        return view('admin.BankSoal.banksoal', compact('bank_soals'));
    }

    public function store(Request $request)
    {
        $validate_data = $request->validate([
            'jenis_bahasa' => 'required|string|max:255',
            'jenis_materi' => 'required|string|max:255',
            'nama_banksoal' => 'nullable|string',

        ]);

        BankSoal::create($validate_data);

        return redirect()->route('admin.banksoal')->with('success', 'Bank Soal berhasil ditambahkan!');
    }

    public function tambah_banksoal()
    {
        return view('admin.BankSoal.tambah_banksoal');
    }

    public function kelola_banksoal($id)
    {
        $bank_soal = BankSoal::with('soals')->findOrFail($id);

        $soals = $bank_soal->soals;

        return view('admin.BankSoal.kelolasoal', compact('bank_soal', 'soals'));
    }

    public function lihatsoal($id)
    {
        $bank_soal = BankSoal::with('soals')->findOrFail($id);

        $soals = $bank_soal->soals;

        return view('admin.BankSoal.lihatsoal', compact('bank_soal', 'soals'));
    }

    public function buatsoal($id)
    {
        $bank_soal = BankSoal::where('id', $id)->first();

        return view('admin.BankSoal.buatsoal', compact('bank_soal'));
    }

    public function storesoal(Request $request, $id)
    {
        $bank_soal = BankSoal::where('id', $id)->first();

        $validate_data = $request->validate([
            'pertanyaan' => 'required',
            'file' => 'nullable|mimes:mp3|max:3072',
            'a' => 'required|string|max:255',
            'b' => 'required|string|max:255',
            'c' => 'required|string|max:255',
            'd' => 'required|string|max:255',
            'jawaban_benar' => 'required|string|max:255',
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('audio_files', 'public');
            $validate_data['file'] = $path;
        }

        $validate_data['bank_soal_id'] = $bank_soal->id;

        Soal::create($validate_data);

        return redirect()->route('admin.banksoal')->with('success', 'Soal berhasil ditambahkan!');
    }

    public function editsoal($id)
    {
        $soal = Soal::where('id', $id)->firstOrFail();
        $bank_soal = $soal->bankSoal;

        return view('admin.BankSoal.editsoal', compact('soal', 'bank_soal'));
    }

    public function updatesoal(Request $request, $id)
    {

        $soal = Soal::findOrFail($id);

        // dd($soal->file, Storage::disk('public')->exists($soal->file));

        $validate_data = $request->validate([
            'pertanyaan' => 'required',
            'file' => 'nullable|mimes:mp3|max:3072',
            'a' => 'required|string|max:255',
            'b' => 'required|string|max:255',
            'c' => 'required|string|max:255',
            'd' => 'required|string|max:255',
            'jawaban_benar' => 'required|string|max:255',
        ]);

        if ($request->hasFile('file')) {
            if ($soal->file && Storage::disk('public')->exists($soal->file)) {
                Storage::disk('public')->delete($soal->file);
            }
            $path = $request->file('file')->store('audio_files', 'public');
            $validate_data['file'] = $path;
        }

        $soal->update($validate_data);

        return redirect()->route('admin.banksoal')->with('success', 'Soal berhasil ditambahkan!');
    }

    public function hapussoal($id)
    {
        $soal = Soal::findOrFail($id);

        $soal->delete();

        return redirect()->route('admin.banksoal')->with('success', 'Materi berhasil dihapus!');
    }

    // hasil tes
    public function hasiltes()
    {
        return view('admin.hasiltes');
    }
}
