<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BankSoal;
use App\Models\EventUjian;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventUjianController extends Controller
{
    // event
    public function eventujian()
    {
        $events = EventUjian::with('bankSoal')->latest()->get();

        return view('admin.Ujian.eventujian', compact('events'));
    }

    // sesi
    public function sesiujian()
    {
        $bankSoals = BankSoal::all();

        return view('admin.Ujian.sesiujian', compact('bankSoals'));
    }

    // buat sesi ujian
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $validated = $request->validate([
            'judul_ujian' => 'required|string|max:255',
            'bank_soal_id' => 'required|integer|exists:bank_soals,id',
            'waktu_ujian' => 'required|integer|min:1',
            'tanggal_ujian' => 'required|date',
        ]);

        // Buat data baru
        EventUjian::create([
            'judul' => $validated['judul_ujian'],
            'bank_soal_id' => $validated['bank_soal_id'],
            'waktu_ujian' => $validated['waktu_ujian'],
            'tanggal_ujian' => $validated['tanggal_ujian'],
        ]);

        return redirect()->route('admin.eventujian')->with('success', 'Event Ujian berhasil dibuat!');
    }

    // aktifkan ujian
    public function aktifkanUjian(EventUjian $eventUjian)
    {
        $eventUjian->update(['status' => 'aktif']);

        return back()->with('success', 'Ujian berhasil diaktifkan.');
    }

    // selesaikan paksa ujian
    public function selesaikanUjian(EventUjian $eventUjian)
    {
        //  hanya ujian yang aktif yang bisa diselesaikan
        if ($eventUjian->status !== 'aktif') {
            return back()->with('error', 'Hanya ujian yang aktif yang bisa diselesaikan.');
        }

        $eventUjian->update(['status' => 'selesai']);

        return back()->with('success', 'Ujian telah berhasil diselesaikan.');
    }

    // token
    public function releaseToken(EventUjian $eventUjian)
    {
        // token acak 6 karakter

        // $token = strtoupper(Str::random(4) . rand(100, 999));  -> token angka
        $token = Str::upper(Str::random(6));
        $eventUjian->update(['token' => $token]);

        return back()->with('success', 'Token berhasil dirilis: '.$token);
    }

    // hapus event
    public function destroy(EventUjian $eventUjian)
    {
        $eventUjian->delete();

        return back()->with('success', 'Event ujian berhasil dihapus.');
    }
}
