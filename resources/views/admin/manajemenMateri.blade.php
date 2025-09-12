@extends('admin.layouts.layout')

@section('title', 'Manajemen Materi')
@section('header-title', 'Manajemen Materi')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Buat Materi</h5>
            </div>
            <div class="card-body">
                <form>
                    <!-- Operator -->
                    <div class="mb-3">
                        <label for="operator" class="form-label fw-bolder">Jenis Bahasa</label>
                        <select class="form-select" id="operator">
                            <option selected disabled>Jenis Bahasa</option>
                            <option value="1">English</option>
                            <option value="2">Arabic</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="operator" class="form-label fw-bolder">Jenis Materi</label>
                        <select class="form-select" id="operator">
                            <option selected disabled>Jenis Materi</option>
                            <option value="1">Reading</option>
                            <option value="2">Listening</option>
                            <option value="3">Structure</option>
                            <option value="4">Istimaq</option>
                            <option value="5">Qoriah</option>
                            <option value="6">Qowait</option>
                        </select>
                    </div>

                    <!-- File Soal -->
                    <div class="mb-3">
                        <label class="form-label fw-bolder">Materi</label>
                        <input type="file" class="form-control mb-2">
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