@extends('participant.layouts.layout')

@section('title', 'Mulai Tes')
@section('header-title', 'Konfirmasi Ujian')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            @if ($eventUjian)
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0 fw-semibold">Konfirmasi Memulai Simulasi</h5>
                    </div>
                    {{-- Form ini akan mengirim data ke controller --}}
                    <form action="{{ route('participant.ujian.start', $eventUjian) }}" method="POST">
                        @csrf {{-- Penting untuk mengatasi error "Page Expired" --}}

                        <div class="card-body">
                            <p class="mb-4">Anda akan memulai simulasi berikut. Pastikan Anda sudah siap dan koneksi internet
                                stabil.</p>

                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width: 30%;">Nama Ujian</th>
                                        <td>{{ $eventUjian->judul }}</td>
                                    </tr>
                                    <tr>
                                        <th>Bank Soal</th>
                                        <td>{{ $eventUjian->bankSoal->nama_banksoal ?? 'N/A' }}
                                            ({{ $eventUjian->bankSoal->jenis_bahasa ?? '' }})</td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah Soal</th>
                                        <td>{{ $eventUjian->bankSoal->soals->count() }} Soal</td>
                                    </tr>
                                    <tr>
                                        <th>Waktu Pengerjaan</th>
                                        <td>{{ $eventUjian->waktu_ujian }} Menit</td>
                                    </tr>
                                </tbody>
                            </table>

                            <hr>

                            <div class="mt-4">
                                <label for="token" class="form-label fw-semibold">Masukkan Token Ujian</label>
                                <input type="text" class="form-control form-control-lg text-center" id="token"
                                    name="token" placeholder="ex: CVXGSH" required>
                                @error('token')
                                    <div class="text-danger small mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer bg-light-2 border-0 text-end py-3">
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="bi bi-play-circle-fill me-2"></i>Mulai Ujian Sekarang
                            </button>
                        </div>
                    </form>
                </div>
            @else
                <div class="alert alert-info text-center">
                    <h4 class="alert-heading">Belum Ada Ujian Aktif</h4>
                    <p>Saat ini belum ada ujian yang dijadwalkan. Silakan kembali lagi nanti.</p>
                </div>
            @endif
        </div>
    </div>
@endsection
