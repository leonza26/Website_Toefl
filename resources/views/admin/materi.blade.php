@extends('admin.layouts.layout')

@section('title', 'Manajemen Materi')
@section('header-title', 'Manajemen Materi')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-0 pt-3">
                <div class="row">
                    <div class="col-12 col-md-6 mb-2 mb-md-0">
                        <h5 class="card-title fw-semibold mb-0">Daftar Materi</h5>
                        <p class="text-muted small mb-0">Kelola kategori utama untuk bank soal.</p>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-md-end">
                        <a href="#" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-2"></i>Tambah Materi Baru
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Materi</th>
                                <th scope="col" class="text-center">Jumlah Bank Soal</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Listening Comprehension</td>
                                <td class="text-center">5</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-info text-white" title="Lihat Bank Soal"><i class="bi bi-eye-fill"></i> Lihat Bank Soal</a>
                                    <a href="#" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <form action="#" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus materi ini? Menghapus materi akan menghapus semua bank soal di dalamnya.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus"><i class="bi bi-trash-fill"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Structure and Written Expression</td>
                                <td class="text-center">3</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-info text-white" title="Lihat Bank Soal"><i class="bi bi-eye-fill"></i> Lihat Bank Soal</a>
                                    <a href="#" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <form action="#" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus materi ini? Menghapus materi akan menghapus semua bank soal di dalamnya.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus"><i class="bi bi-trash-fill"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Reading Comprehension</td>
                                <td class="text-center">8</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-info text-white" title="Lihat Bank Soal"><i class="bi bi-eye-fill"></i> Lihat Bank Soal</a>
                                    <a href="#" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <form action="#" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus materi ini? Menghapus materi akan menghapus semua bank soal di dalamnya.');">
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