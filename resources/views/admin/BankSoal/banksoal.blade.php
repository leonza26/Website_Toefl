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
                            <a href="{{ route('admin.add_banksoal') }}" class="btn btn-primary">
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
                                <button class="btn btn-outline-secondary" type="button"><i
                                        class="bi bi-search"></i></button>
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

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- jika berhasil, maka akan menampilkan pesan successnya --}}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Jenis Bahasa</th>
                                    <th scope="col">Jenis Materi</th>
                                    <th scope="col">Bank Soal</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp

                                @foreach ($bank_soals as $bank_soal)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $bank_soal->jenis_bahasa }}</td>
                                        <td>{{ $bank_soal->jenis_materi }}</td>
                                        <td>{{ $bank_soal->nama_banksoal }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.kelolasoal', $bank_soal->id) }}" class="btn btn-sm btn-primary"
                                                title="Kelola Soal"><i class="bi bi-card-list"></i> Kelola Soal</a>
                                            <a href="{{ route('admin.lihatsoal', $bank_soal->id) }}" class="btn btn-sm btn-primary"
                                                title="Kelola Soal"><i class="bi bi-eye"></i> Lihat Soal</a>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
