<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminMainController extends Controller
{
    //
    public function admin(){
        return view('admin.admin');
    }

     public function manageuser(){
        return view('admin.manage');
    }

    public function materi(){
        return view('admin.materi');
    }

    public function banksoal(){
        return view('admin.banksoal');
    }

    public function hasiltes(){
        return view('admin.hasiltes');
    }

}
