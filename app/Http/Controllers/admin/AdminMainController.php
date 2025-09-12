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

    public function materi()
    {
        return view('admin.materi');
    }

    public function buatmateri()
    {
        return view('admin.manajemenMateri');
    }

    public function banksoal()
    {
        return view('admin.banksoal');
    }

    public function soal()
    {
        return view('admin.soal');
    }

    public function hasiltes()
    {
        return view('admin.hasiltes');
    }
}
