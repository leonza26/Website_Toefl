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
                                <th scope="col">Judul Modul</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Panduan Lengkap Sesi Listening</td>
                                <td class="text-muted">Strategi menjawab soal-soal pada sesi listening...</td>
                                <td class="text-center">
                                    <!-- NOTE: Ganti '#' dengan link ke file PDF Anda -->
                                    <a href="#" target="_blank" class="btn btn-sm btn-primary">
                                        <i class="bi bi-eye-fill me-1"></i> Buka Modul
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Tips & Trik Sesi Reading</td>
                                <td class="text-muted">Cara cepat memahami bacaan dan menemukan jawaban...</td>
                                <td class="text-center">
                                     <a href="#" target="_blank" class="btn btn-sm btn-primary">
                                        <i class="bi bi-eye-fill me-1"></i> Buka Modul
                                    </a>
                                </td>
                            </tr>
                             <tr>
                                <td>3</td>
                                <td>Grammar Essentials for TOEFL</td>
                                <td class="text-muted">Penguatan materi grammar yang sering keluar di tes...</td>
                                <td class="text-center">
                                     <a href="#" target="_blank" class="btn btn-sm btn-primary">
                                        <i class="bi bi-eye-fill me-1"></i> Buka Modul
                                    </a>
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
