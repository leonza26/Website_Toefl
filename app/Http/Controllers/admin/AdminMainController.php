<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminMainController extends Controller
{
    //
    public function admin()
    {
        $mahasiswa = User::where('role', 1)->count();

        return view('admin.admin', compact('mahasiswa'));
    }

    public function manageuser()
    {
        $admins = User::where('role', '0')->get();
        $users = User::where('role', '1')->get();

        return view('admin.manage', compact('admins', 'users'));
    }


    // materi
    public function materi()
    {
        $materis = Materi::all();

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

        // 3. Save the path in database (if needed)
        // Example: Materi model has 'file_path' column
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

        return redirect()->route('admin.materi')->with('success', 'Materi berhasil dihapus!');
    }

    // bank soal
    public function banksoal()
    {
        return view('admin.BankSoal.banksoal');
    }

    public function tambah_banksoal()
    {
        return view('admin.BankSoal.tambah_banksoal');
    }

    public function kelola_banksoal()
    {
        return view('admin.BankSoal.kelolasoal');
    }

    public function lihatsoal()
    {
        return view('admin.BankSoal.lihatsoal');
    }

    public function buatsoal()
    {
        return view('admin.BankSoal.buatsoal');
    }

    public function editsoal()
    {
        return view('admin.BankSoal.editsoal');
    }


    // setting ujian

    public function sesiujian()
    {
        return view('admin.Ujian.sesiujian');
    }

    public function eventujian()
    {
        return view('admin.Ujian.eventujian');
    }

    // hasil tes
    public function hasiltes()
    {
        return view('admin.hasiltes');
    }
}
