@extends('participant.layouts.layout')

@section('title', 'Materi Belajar')
@section('header-title', 'Materi Belajar TOEFL')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-0 pt-3">
                <h5 class="card-title fw-semibold mb-0">Daftar Modul</h5>
                <p class="text-muted small mb-0">Silakan pelajari modul-modul berikut untuk persiapan tes Anda.</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Jenis Bahasa</th>
                                <th scope="col" class="text-center">Jenis Materi</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($materis as $index => $materi)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $materi->jenis_bahasa }}</td>
                                <td class="text-center">{{ $materi->jenis_materi }}</td>
                                <td class="text-center">
                                    <a href="{{ asset('storage/' . $materi->materi)  }}" target="_blank" class="btn btn-sm btn-info text-white" title="Lihat Bank Soal"><i class="bi bi-eye-fill"></i> Lihat Materi</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">
                                    Belum Ada Materi
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection