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
                    <p class="fs-4 fw-semibold mb-0">1,250</p>
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
                    <p class="fs-4 fw-semibold mb-0">875</p>
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
                    <p class="fs-4 fw-semibold mb-0">15</p>
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
                        <tr>
                            <td>Andini Putri</td>
                            <td>Menyelesaikan Tes Simulasi #5</td>
                            <td><span class="badge bg-success-subtle text-success-emphasis">580</span></td>
                            <td>5 menit yang lalu</td>
                        </tr>
                        <tr>
                            <td>Bagas Prasetyo</td>
                            <td>Mendaftar untuk Tes Penempatan</td>
                            <td>-</td>
                            <td>15 menit yang lalu</td>
                        </tr>
                        <tr>
                            <td>Rizky Maulana</td>
                            <td>Menyelesaikan Tes Reading Practice</td>
                            <td><span class="badge bg-warning-subtle text-warning-emphasis">78/100</span></td>
                            <td>1 jam yang lalu</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection