@extends('admin.layouts.layout')

@section('title', 'Tambah Soal Baru')
@section('header-title', 'Tambah Soal Baru')

@section('content')
    <div class="row">
        <div class="col-12">
            {{-- Tombol Kembali --}}
            <div class="d-flex align-items-center mb-3">
                {{-- NOTE: Arahkan route ini kembali ke halaman kelola soal --}}
                {{-- route('admin.kelolasoal', ['id' => $bankSoal->id]) --}}
                <a href="{{ route('admin.kelolasoal', $bank_soal->id) }}" class="btn btn-outline-secondary me-3">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <div>
                    {{-- NOTE: Ganti dengan data dinamis dari controller, contoh: $bankSoal->nama --}}
                    <h4 class="mb-0 fw-semibold">{{ $bank_soal->nama_banksoal }}</h4>
                    <p class="text-muted small mb-0">Isi detail pertanyaan dan pilihan jawaban di bawah ini.</p>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <h6 class="fw-bold"><i class="bi bi-exclamation-triangle-fill me-2"></i>Terjadi Kesalahan:</h6>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card shadow-sm border-0">
                {{-- NOTE: Arahkan action form ini ke route untuk menyimpan soal --}}
                <form action="{{ route('admin.storesoal', $bank_soal->id) }}" method="POST">
                    @csrf

                    <div class="card-body">
                        {{-- Input untuk Teks Pertanyaan --}}
                        @if ($bank_soal->jenis_bahasa == 'Arabic')
                            <div class="mb-4">
                                <label for="question_text" class="form-label fw-semibold">Teks Pertanyaan (ﺔﻴﺑﺮﻌﻟﺍ
                                    ﺔﻐﻠﻟﺍ)</label>
                                <textarea class="form-control" id="question_text" name="pertanyaan" rows="4" placeholder="اﻨﻫ ﻝﺍﺆﺴﻟﺍ ﺺﻧ ﻞﺧﺩﺃ..."
                                    dir="rtl" lang="ar" required></textarea>
                            </div>

                            {{-- Input untuk Pilihan Jawaban --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Pilihan Jawaban</label>
                                <p class="form-text text-muted mt-0">Pilih salah satu opsi sebagai jawaban yang benar dengan
                                    mengklik tombol radio di sebelahnya.</p>

                                {{-- Opsi A --}}
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <input class="form-check-input mt-0" type="radio" name="jawaban_benar"
                                            value="A" required aria-label="Pilih sebagai jawaban benar">
                                    </div>
                                    <input type="text" class="form-control" name="a" placeholder="A ﺔﺑﺎﺟﻹﺍ ﺺﻧ"
                                        dir="rtl" lang="ar" required>
                                </div>

                                {{-- Opsi B --}}
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <input class="form-check-input mt-0" type="radio" name="jawaban_benar"
                                            value="B" aria-label="Pilih sebagai jawaban benar">
                                    </div>
                                    <input type="text" class="form-control" name="b" placeholder="B ﺔﺑﺎﺟﻹﺍ ﺺﻧ"
                                        dir="rtl" lang="ar" required>
                                </div>

                                {{-- Opsi C --}}
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <input class="form-check-input mt-0" type="radio" name="jawaban_benar"
                                            value="C" aria-label="Pilih sebagai jawaban benar">
                                    </div>
                                    <input type="text" class="form-control" name="c" placeholder="C ﺔﺑﺎﺟﻹﺍ ﺺﻧ"
                                        dir="rtl" lang="ar" required>
                                </div>

                                {{-- Opsi D --}}
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <input class="form-check-input mt-0" type="radio" name="jawaban_benar"
                                            value="D" aria-label="Pilih sebagai jawaban benar">
                                    </div>
                                    <input type="text" class="form-control" name="d" placeholder="D ﺔﺑﺎﺟﻹﺍ ﺺﻧ"
                                        dir="rtl" lang="ar" required>
                                </div>
                            </div>
                        @else
                            <div class="mb-4">
                                <label for="question_text" class="form-label fw-semibold">Teks Pertanyaan</label>
                                <textarea class="form-control" id="question_text" name="pertanyaan" rows="4"
                                    placeholder="Masukkan teks pertanyaan di sini..." required></textarea>
                            </div>

                            {{-- Input untuk Pilihan Jawaban --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Pilihan Jawaban</label>
                                <p class="form-text text-muted mt-0">Pilih salah satu opsi sebagai jawaban yang benar dengan
                                    mengklik tombol radio di sebelahnya.</p>

                                {{-- Opsi A --}}
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <input class="form-check-input mt-0" type="radio" name="jawaban_benar"
                                            value="A" required aria-label="Pilih sebagai jawaban benar">
                                    </div>
                                    <input type="text" class="form-control" name="a"
                                        placeholder="Teks Jawaban A" required>
                                </div>

                                {{-- Opsi B --}}
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <input class="form-check-input mt-0" type="radio" name="jawaban_benar"
                                            value="B" aria-label="Pilih sebagai jawaban benar">
                                    </div>
                                    <input type="text" class="form-control" name="b"
                                        placeholder="Teks Jawaban B" required>
                                </div>

                                {{-- Opsi C --}}
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <input class="form-check-input mt-0" type="radio" name="jawaban_benar"
                                            value="C" aria-label="Pilih sebagai jawaban benar">
                                    </div>
                                    <input type="text" class="form-control" name="c"
                                        placeholder="Teks Jawaban C" required>
                                </div>

                                {{-- Opsi D --}}
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <input class="form-check-input mt-0" type="radio" name="jawaban_benar"
                                            value="D" aria-label="Pilih sebagai jawaban benar">
                                    </div>
                                    <input type="text" class="form-control" name="d"
                                        placeholder="Teks Jawaban D" required>
                                </div>
                            </div>
                        @endif




                    </div>

                    <div class="card-footer bg-white border-0 text-end py-3">
                        <a href="{{-- route('admin.bank_soal.kelola', ['id' => $bankSoal->id]) --}}" class="btn btn-outline-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save-fill me-2"></i>Simpan Soal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
