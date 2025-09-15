@extends('admin.layouts.layout')

@section('title', 'Manajemen Materi')
@section('header-title', 'Manajemen Materi')

@section('content')

@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Terjadi kesalahan:</strong>
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Buat Materi</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.create_materi') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Operator -->
                    <div class="mb-3">
                        <label for="operator" class="form-label fw-bolder">Jenis Bahasa</label>
                        <select class="form-select" id="operator" name="jenisBahasa">
                            <option selected disabled>Jenis Bahasa</option>
                            <option value="English">English</option>
                            <option value="Arabic">Arabic</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="operator" class="form-label fw-bolder">Jenis Materi</label>
                        <select class="form-select" id="operator" name="jenisMateri">
                            <option selected disabled>Jenis Materi</option>
                            <option value="Reading">Reading</option>
                            <option value="Listening">Listening</option>
                            <option value="Structure">Structure</option>
                            <option value="Istimaq">Istimaq</option>
                            <option value="Qoriah">Qoriah</option>
                            <option value="Qowait">Qowait</option>
                        </select>
                    </div>

                    <!-- File Soal -->
                    <div class="mb-3">
                        <label class="form-label fw-bolder">Materi</label>
                        <input type="file" class="form-control mb-2" name="materiFile">
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-end gap-2">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection