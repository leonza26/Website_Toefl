@extends('admin.layouts.layout')

{{-- Judul halaman dinamis --}}
@section('title', 'Preview Bank Soal')
@section('header-title', 'Preview Bank Soal')

@section('content')
<div class="row">
    <div class="col-12">
        {{-- Tombol Kembali --}}
        <div class="d-flex align-items-center mb-3">
            <a href="{{ route('admin.banksoal') }}" class="btn btn-outline-secondary me-3">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <div>
                {{-- NOTE: Ganti dengan data dinamis dari controller, contoh: $bankSoal->nama --}}
                <h4 class="mb-0 fw-semibold">Listening Part A: Short Conversations</h4>
                <p class="text-muted small mb-0">Ini adalah pratinjau bagaimana soal akan ditampilkan kepada peserta.</p>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-4 p-md-5">
                <ol class="list-group list-group-numbered">

                    {{-- Contoh Soal 1 --}}
                    <li class="list-group-item d-flex flex-column border-0 ps-3 mb-4">
                        <p class="fw-semibold mb-2">"The man thinks the woman should ____."</p>
                        <div class="ms-2">
                            <div class="form-check mb-1">
                                <input class="form-check-input" type="radio" disabled>
                                <label class="form-check-label">Option A</label>
                            </div>
                            <div class="form-check mb-1 bg-light-success rounded p-2 border border-success">
                                <input class="form-check-input" type="radio" checked disabled>
                                <label class="form-check-label fw-bold text-success">
                                    Option B (Jawaban Benar)
                                </label>
                            </div>
                            <div class="form-check mb-1">
                                <input class="form-check-input" type="radio" disabled>
                                <label class="form-check-label">Option C</label>
                            </div>
                            <div class="form-check mb-1">
                                <input class="form-check-input" type="radio" disabled>
                                <label class="form-check-label">Option D</label>
                            </div>
                        </div>
                    </li>
                    <hr class="my-4">

                    {{-- Contoh Soal 2 (Structure) --}}
                    <li class="list-group-item d-flex flex-column border-0 ps-3 mb-4">
                        <p class="fw-semibold mb-2">"The committee has met and ____."</p>
                        <div class="ms-2">
                             <div class="form-check mb-1">
                                <input class="form-check-input" type="radio" disabled>
                                <label class="form-check-label">A. they have reached a decision</label>
                            </div>
                            <div class="form-check mb-1 bg-light-success rounded p-2 border border-success">
                                <input class="form-check-input" type="radio" checked disabled>
                                <label class="form-check-label fw-bold text-success">
                                    B. it has reached a decision (Jawaban Benar)
                                </label>
                            </div>
                            <div class="form-check mb-1">
                                <input class="form-check-input" type="radio" disabled>
                                <label class="form-check-label">C. its decision was reached</label>
                            </div>
                            <div class="form-check mb-1">
                                <input class="form-check-input" type="radio" disabled>
                                <label class="form-check-label">D. it's decision was reached</label>
                            </div>
                        </div>
                    </li>
                    <hr class="my-4">

                    {{-- Contoh Soal 3 --}}
                     <li class="list-group-item d-flex flex-column border-0 ps-3">
                        <p class="fw-semibold mb-2">"What does the woman imply?"</p>
                        <div class="ms-2">
                            <div class="form-check mb-1 bg-light-success rounded p-2 border border-success">
                                <input class="form-check-input" type="radio" checked disabled>
                                <label class="form-check-label fw-bold text-success">
                                    Option A (Jawaban Benar)
                                </label>
                            </div>
                             <div class="form-check mb-1">
                                <input class="form-check-input" type="radio" disabled>
                                <label class="form-check-label">Option B</label>
                            </div>
                            <div class="form-check mb-1">
                                <input class="form-check-input" type="radio" disabled>
                                <label class="form-check-label">Option C</label>
                            </div>
                            <div class="form-check mb-1">
                                <input class="form-check-input" type="radio" disabled>
                                <label class="form-check-label">Option D</label>
                            </div>
                        </div>
                    </li>

                </ol>
            </div>
        </div>
    </div>
</div>

{{-- Helper CSS untuk highlight jawaban benar --}}
<style>
.bg-light-success {
    background-color: #e2f5e9 !important;
}
</style>
@endsection
