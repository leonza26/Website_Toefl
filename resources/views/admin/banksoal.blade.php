@extends('admin.layouts.layout')

@section('title', 'Manajemen Bank Soal')
@section('header-title', 'Manajemen Bank Soal')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-0 pt-3">
                <div class="row">
                    <div class="col-12 col-md-6 mb-2 mb-md-0">
                        <h5 class="card-title fw-semibold mb-0">Daftar Bank Soal</h5>
                        <p class="text-muted small mb-0">Kelola kumpulan soal di setiap materi.</p>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-md-end">
                        <a href="#" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-2"></i>Tambah Bank Soal Baru
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- Search and Filter -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari judul bank soal...">
                            <button class="btn btn-outline-secondary" type="button"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select">
                            <option selected>Filter berdasarkan materi...</option>
                            <option value="1">Listening Comprehension</option>
                            <option value="2">Structure and Written Expression</option>
                            <option value="3">Reading Comprehension</option>
                        </select>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Judul Bank Soal</th>
                                <th scope="col">Materi</th>
                                <th scope="col" class="text-center">Jumlah Soal</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Listening Part A: Short Conversations</td>
                                <td>Listening Comprehension</td>
                                <td class="text-center">50</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-primary" title="Kelola Soal"><i class="bi bi-card-list"></i> Kelola Soal</a>
                                    <a href="#" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <form action="#" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus bank soal ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus"><i class="bi bi-trash-fill"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Structure: Incomplete Sentences</td>
                                <td>Structure and Written Expression</td>
                                <td class="text-center">40</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-primary" title="Kelola Soal"><i class="bi bi-card-list"></i> Kelola Soal</a>
                                    <a href="#" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <form action="#" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus bank soal ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus"><i class="bi bi-trash-fill"></i></button>
                                    </form>
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