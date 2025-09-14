<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminMainController extends Controller
{
    //
    public function admin()
    {
        $mahasiswa = User::where('role', 1)-> count();

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
        return view('admin.materi');
    }

    public function buatmateri()
    {
        return view('admin.manajemenMateri');
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

    public function lihatsoal(){
        return view('admin.BankSoal.lihatsoal');
    }

    public function buatsoal(){
        return view('admin.BankSoal.buatsoal');
    }

    public function editsoal(){
        return view('admin.BankSoal.editsoal');
    }


    // setting ujian

    public function sesiujian(){
        return view('admin.Ujian.sesiujian');
    }

    public function eventujian(){
        return view('admin.Ujian.eventujian');
    }

    // hasil tes
    public function hasiltes()
    {
        return view('admin.hasiltes');
    }
}
