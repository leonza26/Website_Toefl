@extends('admin.layouts.layout')

@section('title', 'Buat Sesi Ujian Baru')
@section('header-title', 'Buat Sesi Ujian Baru')

@section('content')
    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-light-2 border-0">
                    <h5 class="card-title mb-0 fw-semibold">Formulir Sesi Ujian</h5>
                    <p class="card-subtitle text-muted mt-1 small">Isi detail di bawah ini untuk menjadwalkan ujian baru.</p>
                </div>

                {{-- NOTE: Arahkan action form ini ke route untuk menyimpan sesi ujian --}}
                <form action="{{ route('event.create') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        {{-- Judul Ujian --}}
                        <div class="mb-3">
                            <label for="judul_ujian" class="form-label fw-semibold">Judul Ujian</label>
                            <input type="text" class="form-control" id="judul_ujian" name="judul_ujian"
                                placeholder="Contoh: Tes Penempatan TOEFL September 2025" required>
                        </div>

                        {{-- Pilih Bank Soal (Dropdown) --}}
                        <div class="mb-3">
                            <label for="bank_soal_id" class="form-label fw-semibold">Pilih Bank Soal</label>
                            <select class="form-select" id="bank_soal_id" name="bank_soal_id" required>
                                <option selected disabled value="">-- Pilih salah satu bank soal --</option>
                                {{-- NOTE: Loop data bank soal dari controller --}}
                                @foreach ($bankSoals as $banksoal)
                                    <option value="{{ $banksoal->id }}" {{ old('bank_soal_id') == $banksoal->id ? 'selected' : '' }}> {{ $banksoal->nama_banksoal }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="row">
                            {{-- Waktu Ujian (Timer) --}}
                            <div class="col-md-6 mb-3">
                                <label for="waktu_ujian" class="form-label fw-semibold">Waktu Ujian (Timer)</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="waktu_ujian" name="waktu_ujian"
                                        placeholder="Contoh: 20" required>
                                    <span class="input-group-text">Menit</span>
                                </div>
                            </div>

                            {{-- Tanggal Ujian --}}
                            <div class="col-md-6 mb-3">
                                <label for="tanggal_ujian" class="form-label fw-semibold">Tanggal Ujian</label>
                                <input type="date" class="form-control" id="tanggal_ujian" name="tanggal_ujian" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-0 text-end py-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-calendar-check-fill me-2"></i>Buat Event Ujian
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
