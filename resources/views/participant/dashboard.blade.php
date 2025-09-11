@extends('participant.layouts.layout')

@section('title', 'Dashboard Mahasiswa')
@section('header-title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0 welcome-card mb-4">
            <div class="card-body p-4">
                <h4 class="card-title fw-semibold">Selamat Datang Kembali, {{ Auth::user()->name }}!</h4>
                <p class="card-text text-muted">Anda siap untuk menguji kemampuan Anda? Mulai tes simulasi atau lihat riwayat skor Anda di bawah ini.</p>
                <a href="#" class="btn btn-primary">Mulai Tes Sekarang <i class="bi bi-arrow-right-short"></i></a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Card Skor Terakhir -->
    <div class="col-md-6 col-lg-4 mb-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <h5 class="card-title fw-semibold">Skor Terakhir Anda</h5>
                <p class="display-4 fw-semibold text-primary">550</p>
                <p class="text-muted small mb-0">Diambil pada: 10 September 2025</p>
            </div>
             <div class="card-footer bg-white border-0">
                <a href="#" class="text-decoration-none">Lihat Detail Skor <i class="bi bi-chevron-right"></i></a>
            </div>
        </div>
    </div>

    <!-- Card Jadwal Tes -->
    <div class="col-md-6 col-lg-4 mb-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                 <h5 class="card-title fw-semibold">Jadwal Tes Tersedia</h5>
                 <ul class="list-unstyled mt-3">
                    <li class="mb-2"><i class="bi bi-calendar-check text-success me-2"></i>Tes Penempatan #1: 15 Sep 2025</li>
                    <li class="mb-2"><i class="bi bi-calendar-check text-success me-2"></i>Tes Simulasi #5: 20 Sep 2025</li>
                    <li class="mb-2"><i class="bi bi-calendar-x text-muted me-2"></i>Tes Yudisium: Pendaftaran Ditutup</li>
                 </ul>
            </div>
             <div class="card-footer bg-white border-0">
                <a href="#" class="text-decoration-none">Lihat Semua Jadwal <i class="bi bi-chevron-right"></i></a>
            </div>
        </div>
    </div>

     <!-- Card Progress -->
    <div class="col-12 col-lg-4 mb-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <h5 class="card-title fw-semibold">Progress Belajar</h5>
                <p class="small text-muted">Peningkatan skor Anda dari 5 tes terakhir.</p>
                <div class="text-center py-4 bg-light rounded">

                    <p class="mt-2 mb-0 text-muted small">Grafik akan ditampilkan di sini</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

