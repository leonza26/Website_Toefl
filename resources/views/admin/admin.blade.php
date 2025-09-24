@extends('admin.layouts.layout')

@section('title', 'Admin Dashboard')
@section('header-title', 'Dashboard Administrator')

@section('content')
<div class="row">
    <!-- Card Jumlah Mahasiswa -->
    <div class="col-md-6 col-xl-3 mb-4">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <div class="fs-2 text-primary me-3"><i class="bi bi-people-fill"></i></div>
                <div>
                    <h5 class="card-title fw-semibold mb-0">Mahasiswa</h5>
                    <p class="fs-4 fw-semibold mb-0">{{ $mahasiswa }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Card Bank Soal -->
    <div class="col-md-6 col-xl-3 mb-4">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <div class="fs-2 text-success me-3"><i class="bi bi-bank"></i></div>
                <div>
                    <h5 class="card-title fw-semibold mb-0">Bank Soal</h5>
                    <p class="fs-4 fw-semibold mb-0">{{ $bank_soal }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Card Tes Aktif -->
    <div class="col-md-6 col-xl-3 mb-4">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <div class="fs-2 text-warning me-3"><i class="bi bi-play-circle-fill"></i></div>
                <div>
                    <h5 class="card-title fw-semibold mb-0">Tes Aktif</h5>
                    <p class="fs-4 fw-semibold mb-0">{{ $testAktif }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Card Hasil Tes -->
    <div class="col-md-6 col-xl-3 mb-4">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <div class="fs-2 text-info me-3"><i class="bi bi-file-earmark-check-fill"></i></div>
                <div>
                    <h5 class="card-title fw-semibold mb-0">Hasil Tes</h5>
                    <p class="fs-4 fw-semibold mb-0">4,590</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-0 pt-3">
                <h5 class="card-title fw-semibold mb-0">Aktivitas Terbaru</h5>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Mahasiswa</th>
                            <th>Aktivitas</th>
                            <th>Skor</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($aktifitas as $peserta)
                        <tr>
                            <td>{{ $peserta->user->name }}</td>
                            <td> @if($peserta->status === 'berlangsung')
                                {{ strtoupper('Sedang Berlangsung') }}
                                @elseif($peserta->status === 'selesai')
                                {{ strtoupper('Sudah Selesai') }}
                                @else
                                {{ strtoupper($peserta->status) }}
                                @endif
                            </td>
                            <td><span class="badge {{ $peserta->score < 12 
                                ? 'bg-warning-subtle text-warning-emphasis' 
                                : 'bg-success-subtle text-success-emphasis' }}">
                                    {{ $peserta->skor }}/15
                                </span></td>
                            <td>5 menit yang lalu</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                Belum Ada Peserta
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection