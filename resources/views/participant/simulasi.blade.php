@extends('participant.layouts.layout')

@section('title', 'Mulai Tes')
@section('header-title', 'Konfirmasi Ujian')

@section('content')
@if($eventUjian)
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white text-center py-3">
                <h4 class="card-title fw-semibold mb-0">Konfirmasi Detail Ujian</h4>
            </div>
            <div class="card-body p-4 p-md-5">
                <p class="text-center text-muted mb-4">Harap periksa kembali detail ujian Anda di bawah ini. Pastikan semua informasi sudah benar sebelum memasukkan token dan memulai ujian.</p>

                <div class="row mb-4">
                    <!-- Detail Mahasiswa -->
                    <div class="col-md-6 mb-3 mb-md-0">
                        <h6 class="fw-semibold">Detail Mahasiswa:</h6>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0 d-flex justify-content-between">
                                <span class="text-muted">Nama Lengkap</span>
                                <strong class="text-end">{{ Auth::user()->name }}</strong>
                            </li>
                        </ul>
                    </div>
                    <!-- Detail Tes -->
                    <div class="col-md-6">
                        <h6 class="fw-semibold">Detail Tes:</h6>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0 d-flex justify-content-between">
                                <span class="text-muted">Jenis Ujian</span>
                                <strong class="text-end">Bahasa {{ $eventUjian->judul }}</strong>
                            </li>
                            <li class="list-group-item px-0 d-flex justify-content-between">
                                <span class="text-muted">Bank Soal</span>
                                <strong class="text-end">{{ $eventUjian->banksoal->nama_banksoal }}</strong>
                            </li>
                            <li class="list-group-item px-0 d-flex justify-content-between">
                                <span class="text-muted">Jumlah Soal</span>
                                <strong class="text-end">15 Soal</strong>
                            </li>
                            <li class="list-group-item px-0 d-flex justify-content-between">
                                <span class="text-muted">Alokasi Waktu</span>
                                <strong class="text-end">{{ $eventUjian->waktu_ujian }} Menit</strong>
                            </li>
                        </ul>
                    </div>
                </div>

                <form action="{{ route('participant.ujian', $eventUjian->id) }}" method="GET">
                    <!-- Input Token -->
                    <div class="form-group mb-4">
                        <label for="token" class="form-label fw-semibold">Masukkan Token Ujian</label>
                        <input type="text" id="token" name="token" class="form-control form-control-lg text-center" placeholder="TOKEN UJIAN">
                        <div class="form-text text-center">Token akan diberikan oleh administrator ketika ujian siap dimulai.</div>
                    </div>

                    @error('token')
                    <div class="text-danger text-center m-2">{{ $message }}</div>
                    @enderror

                    <!-- Tombol Mulai -->
                    <div class="d-grid">
                        <!-- NOTE: Ganti '#' dengan link ke halaman ujian Anda -->
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="bi bi-play-circle-fill me-2"></i>Mulai Ujian
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@else
<div class="container my-5 d-flex justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white text-center py-3">
                <h4 class="card-title fw-semibold mb-0">
                    Tidak Ada Jadwal Simulasi
                </h4>
            </div>
            <div class="card-body p-4 p-md-5">
                <p class="text-center text-muted mb-4">Harap periksa kembali detail ujian Anda. Jika tidak ada simulasi, silakan hubungi Admin atau Panitia Simulasi. Pastikan semua informasi sudah benar sebelum memasukkan token dan memulai ujian.</p>

                <div class="row mb-4">
                    <!-- Detail Mahasiswa -->
                    <div class="col-md-6 mb-3 mb-md-0">
                        <h6 class="fw-semibold">Detail Mahasiswa:</h6>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0 d-flex justify-content-between">
                                <span class="text-muted">Nama Lengkap</span>
                                <strong class="text-end">{{ Auth::user()->name }}</strong>
                            </li>
                            <li class="list-group-item px-0 d-flex justify-content-between">
                                <span class="text-muted">Email</span>
                                <strong class="text-end">{{ Auth::user()->email }}</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection