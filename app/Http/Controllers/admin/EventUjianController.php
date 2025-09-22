<?php

namespace App\Http\Controllers\Admin;

use App\Models\BankSoal;
use App\Models\EventUjian;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventUjianController extends Controller
{

    // event
    public function eventujian()
    {
        $events = EventUjian::with('bankSoal')->latest()->get();

        $UjianAktif = EventUjian::where('status', 'aktif')->exists();

        return view('admin.Ujian.eventujian', compact('events', 'UjianAktif'));
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
        // Cek
        $ujianAktifLain = EventUjian::where('status', 'aktif')->where('id', '!=', $eventUjian->id)->exists();

        if ($ujianAktifLain) {
            // Jika ada yang aktif, TOLAK
            return back()->with('error', 'Gagal! Sudah ada ujian lain yang sedang aktif.');
        }

        $eventUjian->update(['status' => 'aktif']);
        return redirect()->route('admin.eventujian')
        ->with('success', 'Ujian berhasil diaktifkan.');
    }

    // selesaikan paksa ujian
    public function selesaikanUjian(EventUjian $eventUjian)
    {
        //  hanya ujian yang aktif yang bisa diselesaikan
        if ($eventUjian->status !== 'aktif') {
            return redirect()->route('admin.eventujian')->with('error', 'Hanya ujian yang aktif yang bisa diselesaikan.');
        }

        $eventUjian->update(['status' => 'selesai']);
        return redirect()->route('admin.eventujian')->with('success', 'Ujian telah berhasil diselesaikan.');
    }

    // token
    public function releaseToken(EventUjian $eventUjian)
    {
        // token acak 6 karakter

        // $token = strtoupper(Str::random(4) . rand(100, 999));  -> token angka
        $token = Str::upper(Str::random(6));
        $eventUjian->update(['token' => $token]);
        return redirect()->route('admin.eventujian')->with('success', 'Token berhasil dirilis: ' . $token);
    }

    // hapus event
    public function destroy(EventUjian $eventUjian)
    {
        $eventUjian->delete();
        return redirect()->route('admin.eventujian')->with('success', 'Event ujian berhasil dihapus.');
    }

}
