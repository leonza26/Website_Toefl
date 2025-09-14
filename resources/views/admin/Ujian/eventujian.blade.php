@extends('admin.layouts.layout')

@section('title', 'Daftar Event Ujian')
@section('header-title', 'Daftar Event Ujian')

@section('content')

{{-- Style kustom untuk mencegah teks di tabel terpotong --}}
<style>
    .table-nowrap th,
    .table-nowrap td {
        white-space: nowrap;
    }
</style>

<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
             <div class="card-header bg-light-2 border-0">
                <h5 class="card-title mb-0 fw-semibold">Daftar Semua Event Ujian</h5>
                <p class="card-subtitle text-muted mt-1 small">Kelola, aktifkan, dan rilis token untuk setiap event ujian dari sini.</p>
            </div>
            <div class="card-body">
                <div class="table-responsive border rounded-3">
                    {{-- Menambahkan class 'table-nowrap' untuk mengaktifkan style di atas --}}

                    <table class="table table-hover table-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Judul Ujian</th>
                                <th scope="col">Bank Soal</th>
                                <th scope="col">Waktu</th>
                                <th scope="col">Tgl Ujian</th>
                                <th scope="col">Status</th>
                                <th scope="col">Token</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Contoh Data 1 (Belum Aktif) --}}
                            <tr>
                                <td class="fw-semibold">Tes Penempatan TOEFL September 2025</td>
                                <td>Listening Part A</td>
                                <td>120 Menit</td>
                                <td>20 Sep 2025</td>
                                <td><span class="badge bg-secondary">Belum Aktif</span></td>
                                <td><span class="text-muted fst-italic">Belum Dirilis</span></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        {{-- NOTE: Tampilkan tombol ini jika status belum aktif --}}
                                        <form action="#" method="POST" class="d-inline"> @csrf <button type="submit" class="btn btn-success btn-sm">Aktifkan</button> </form>
                                        <button class="btn btn-info btn-sm" disabled>Release Token</button>
                                        <button class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                                    </div>
                                </td>
                            </tr>

                            {{-- Contoh Data 2 (Sudah Aktif) --}}
                            <tr>
                                <td class="fw-semibold">Simulasi TOEFL Gelombang 1</td>
                                <td>Structure: Incomplete Sentences</td>
                                <td>90 Menit</td>
                                <td>18 Sep 2025</td>
                                <td><span class="badge bg-success">Aktif</span></td>
                                <td><span class="text-muted fst-italic">Belum Dirilis</span></td>
                                <td class="text-center">
                                     <div class="d-flex justify-content-center gap-1">
                                        {{-- NOTE: Tombol aktifkan disembunyikan jika sudah aktif --}}
                                        <form action="#" method="POST" class="d-inline"> @csrf <button type="submit" class="btn btn-info btn-sm">Release Token</button> </form>
                                        <button class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                                    </div>
                                </td>
                            </tr>

                             {{-- Contoh Data 3 (Aktif & Token Dirilis) --}}
                            <tr>
                                <td class="fw-semibold">Ujian Remedial Reading</td>
                                <td>Reading: Vocabulary</td>
                                <td>60 Menit</td>
                                <td>15 Sep 2025</td>
                                <td><span class="badge bg-success">Aktif</span></td>
                                <td class="fw-bold">X7B2K9</td>
                                <td class="text-center">
                                     <div class="d-flex justify-content-center gap-1">
                                        <button class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                                     </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

