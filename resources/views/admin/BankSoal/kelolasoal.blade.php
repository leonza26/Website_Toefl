@extends('admin.layouts.layout')

{{-- NOTE: Judul halaman akan dinamis berdasarkan nama bank soal --}}
@section('title', 'Kelola Soal')
@section('header-title', 'Kelola Soal')

@section('content')
<div class="row">
    <div class="col-12">
        {{-- tombol  kembali --}}
        <div class="d-flex align-items-center mb-3">
            <a href="{{ route('admin.banksoal') }}" class="btn btn-outline-secondary me-3">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <div>
                {{-- NOTE: Ganti dengan data dinamis dari controller, contoh: $bankSoal->nama --}}
                <h4 class="mb-0 fw-semibold">Listening Part A: Short Conversations</h4>
                <p class="text-muted small mb-0">Kelola semua pertanyaan untuk bank soal ini.</p>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-0 pt-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title fw-semibold mb-0">Daftar Pertanyaan</h5>
                    <a href="{{ route('admin.buatsoal') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle-fill me-2"></i>Tambah Soal Baru
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" style="width: 5%;">#</th>
                                <th scope="col" style="width: 65%;">Pertanyaan</th>
                                <th scope="col" style="width: 15%;" class="text-center">Jawaban Benar</th>
                                <th scope="col" style="width: 15%;" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Contoh Soal 1 --}}
                            <tr>
                                <td>1</td>
                                <td>
                                    <p class="mb-0">"The man thinks the woman should ____."</p>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-success">B</span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.editsoal') }}" class="btn btn-sm btn-outline-warning" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="#" class="btn btn-sm btn-outline-danger" title="Hapus"><i class="bi bi-trash-fill"></i></a>
                                </td>
                            </tr>
                            {{-- Contoh Soal 2 (Structure) --}}
                            <tr>
                                <td>2</td>
                                <td>
                                    <p class="mb-0">"The committee has met and ____."</p>
                                    <small class="text-muted">A. they have reached a decision</small><br>
                                    <small class="text-muted">B. it has reached a decision</small><br>
                                    <small class="text-muted">C. its decision was reached</small><br>
                                    <small class="text-muted">D. it's decision was reached</small>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-success">B</span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.editsoal') }}" class="btn btn-sm btn-outline-warning" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="#" class="btn btn-sm btn-outline-danger" title="Hapus"><i class="bi bi-trash-fill"></i></a>
                                </td>
                            </tr>
                             {{-- Contoh Soal 3 --}}
                            <tr>
                                <td>3</td>
                                <td>
                                    <p class="mb-0">"What does the woman imply?"</p>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-success">A</span>
                                </td>
                                <td class="text-center">
                                   <a href="{{ route('admin.editsoal') }}" class="btn btn-sm btn-outline-warning" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="#" class="btn btn-sm btn-outline-danger" title="Hapus"><i class="bi bi-trash-fill"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-white border-0">
                {{-- tambahan Pagination  --}}
            </div>
        </div>
    </div>
</div>
@endsection
