<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParticipantMainController extends Controller
{
    //
    public function index()
    {
        return view('participant.dashboard');
    }

    public function materi()
    {
        return view('participant.materi');
    }

    public function simulasi()
    {
        return view('participant.simulasi');
    }

    public function ujian()
    {
        return view('participant.ujian');
    }
}
