<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParticipantMainController extends Controller
{
    //
     public function index(){
        return view('participant.dashboard');
    }
}
