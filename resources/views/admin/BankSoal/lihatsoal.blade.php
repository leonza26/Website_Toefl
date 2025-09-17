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
                <h4 class="mb-0 fw-semibold">{{ $bank_soal->nama_banksoal }}</h4>
                <p class="text-muted small mb-0">Ini adalah pratinjau bagaimana soal akan ditampilkan kepada peserta.</p>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-4 p-md-5">
                <ol class="list-group list-group-numbered">

                    @forelse ($soals as $soal)
                    <li class="list-group-item d-flex flex-column border-0 ps-3 mb-4">
                        <p class="fw-semibold mb-2">"{{ $soal->pertanyaan }}"</p>
                        <div class="ms-2">
                            {{-- Opsi A --}}
                            <div class="form-check mb-1 {{ $soal->jawaban_benar === 'A' ? 'bg-light-success rounded p-2 border border-success' : '' }}">
                                <input class="form-check-input" type="radio" {{ $soal->jawaban_benar === 'A' ? 'checked' : '' }} disabled>
                                <label class="form-check-label {{ $soal->jawaban_benar === 'A' ? 'fw-bold text-success' : '' }}">
                                    {{ $soal->a }}
                                </label>
                            </div>

                            {{-- Opsi B --}}
                            <div class="form-check mb-1 {{ $soal->jawaban_benar === 'B' ? 'bg-light-success rounded p-2 border border-success' : '' }}">
                                <input class="form-check-input" type="radio" {{ $soal->jawaban_benar === 'B' ? 'checked' : '' }} disabled>
                                <label class="form-check-label {{ $soal->jawaban_benar === 'B' ? 'fw-bold text-success' : '' }}">
                                    {{ $soal->b }}
                                </label>
                            </div>

                            {{-- Opsi C --}}
                            <div class="form-check mb-1 {{ $soal->jawaban_benar === 'C' ? 'bg-light-success rounded p-2 border border-success' : '' }}">
                                <input class="form-check-input" type="radio" {{ $soal->jawaban_benar === 'C' ? 'checked' : '' }} disabled>
                                <label class="form-check-label {{ $soal->jawaban_benar === 'C' ? 'fw-bold text-success' : '' }}">
                                    {{ $soal->c }}
                                </label>
                            </div>

                            {{-- Opsi D --}}
                            <div class="form-check mb-1 {{ $soal->jawaban_benar === 'D' ? 'bg-light-success rounded p-2 border border-success' : '' }}">
                                <input class="form-check-input" type="radio" {{ $soal->jawaban_benar === 'D' ? 'checked' : '' }} disabled>
                                <label class="form-check-label {{ $soal->jawaban_benar === 'D' ? 'fw-bold text-success' : '' }}">
                                    {{ $soal->d }}
                                </label>
                            </div>
                        </div>
                    </li>
                    <hr class="my-4">

                    @empty

                    <li class="text-muted">No data is available</li>

                    @endforelse

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