<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use App\Models\EventUjian;
use App\Models\Materi;
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

    public function ujian($id, Request $request)
    {
        $request->validate([
            'token' => 'required|string',
        ]);

        $ujianEvent = EventUjian::where('id', $id)->firstOrFail();

        if ($request->token !== $ujianEvent->token) {
            return back()->withErrors([
                'token' => 'Token yang Anda masukkan tidak sesuai.',
            ])->withInput();
        }


        return view('participant.ujian');
    }
}
