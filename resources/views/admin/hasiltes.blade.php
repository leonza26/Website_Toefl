@extends('admin.layouts.layout')

@section('title', 'Hasil Tes')
@section('header-title', 'Hasil Tes Mahasiswa')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
             <div class="card-header bg-white border-0 pt-3">
                <div class="row">
                    <div class="col-12 col-md-6 mb-2 mb-md-0">
                        <h5 class="card-title fw-semibold mb-0">Daftar Hasil Tes</h5>
                        <p class="text-muted small mb-0">Lihat dan kelola semua hasil tes yang telah diselesaikan mahasiswa.</p>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-md-end">
                        <a href="#" class="btn btn-success">
                            <i class="bi bi-file-earmark-excel-fill me-2"></i>Export ke Excel
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                 <!-- Search and Filter -->
                <div class="row mb-3 gy-2">
                    <div class="col-md-4">
                         <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari nama mahasiswa...">
                            <button class="btn btn-outline-secondary" type="button"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select">
                            <option selected>Filter berdasarkan tes...</option>
                            <option value="1">Tes Penempatan Awal</option>
                            <option value="2">Tes Simulasi #1</option>
                            <option value="3">Tes Reading Practice</option>
                        </select>
                    </div>
                     <div class="col-md-4">
                        <input type="date" class="form-control" placeholder="Filter tanggal">
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Mahasiswa</th>
                                <th scope="col">Judul Tes</th>
                                <th scope="col" class="text-center">Skor</th>
                                <th scope="col">Tanggal Tes</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Andini Putri</td>
                                <td>Tes Simulasi #5</td>
                                <td class="text-center"><span class="badge bg-primary">580</span></td>
                                <td>10 September 2025</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-outline-primary" title="Lihat Detail"><i class="bi bi-eye-fill"></i> Lihat Detail</a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Bagas Prasetyo</td>
                                <td>Tes Penempatan Awal</td>
                                <td class="text-center"><span class="badge bg-success">610</span></td>
                                <td>09 September 2025</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-outline-primary" title="Lihat Detail"><i class="bi bi-eye-fill"></i> Lihat Detail</a>
                                </td>
                            </tr>
                             <tr>
                                <td>3</td>
                                <td>Rizky Maulana</td>
                                <td>Tes Reading Practice</td>
                                <td class="text-center"><span class="badge bg-warning text-dark">78/100</span></td>
                                <td>08 September 2025</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-outline-primary" title="Lihat Detail"><i class="bi bi-eye-fill"></i> Lihat Detail</a>
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
