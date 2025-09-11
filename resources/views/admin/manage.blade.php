@extends('admin.layouts.layout')

@section('title', 'Manajemen User')
@section('header-title', 'Manajemen User')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-0 pt-3">
                <div class="row">
                    <div class="col-12 col-md-6 mb-2 mb-md-0">
                        <h5 class="card-title fw-semibold mb-0">Daftar Pengguna</h5>
                        <p class="text-muted small mb-0">Kelola semua akun admin dan mahasiswa.</p>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-md-end">
                        <a href="#" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-2"></i>Tambah User Baru
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- Search and Filter -->
                <div class="row mb-3">
                    <div class="col-md-4">
                         <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari berdasarkan nama atau email...">
                            <button class="btn btn-outline-secondary" type="button"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                </div>

                <!-- Users Table -->
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Tanggal Bergabung</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Contoh data user 1 (Admin) --}}
                            <tr>
                                <td>1</td>
                                <td>Leonza</td>
                                <td>leonza@gmail.com</td>
                                <td><span class="badge bg-primary-subtle text-primary-emphasis rounded-pill">Admin</span></td>
                                <td>10 Sep 2025</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <form action="#" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus"><i class="bi bi-trash-fill"></i></button>
                                    </form>
                                </td>
                            </tr>
                            {{-- Contoh data user 2 (Participant) --}}
                            <tr>
                                <td>2</td>
                                <td>Ibad</td>
                                <td>ibad@gmail.com</td>
                                <td><span class="badge bg-success-subtle text-success-emphasis rounded-pill">Participant</span></td>
                                <td>11 Sep 2025</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                     <form action="#" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus"><i class="bi bi-trash-fill"></i></button>
                                    </form>
                                </td>
                            </tr>
                             {{-- Contoh data user lainnya --}}
                             <tr>
                                <td>3</td>
                                <td>Andini Putri</td>
                                <td>andini@example.com</td>
                                <td><span class="badge bg-success-subtle text-success-emphasis rounded-pill">Participant</span></td>
                                <td>09 Sep 2025</td>
                                 <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                     <form action="#" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus"><i class="bi bi-trash-fill"></i></button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-end mt-3">
                        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
