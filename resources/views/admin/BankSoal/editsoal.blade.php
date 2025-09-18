@extends('admin.layouts.layout')

@section('title', 'Edit Soal')
@section('header-title', 'Edit Soal')

@section('content')
<div class="row">
    <div class="col-12">
        {{-- Tombol Kembali & Judul Dinamis --}}
        <div class="d-flex align-items-center mb-3">
            {{-- NOTE: Arahkan route ini kembali ke halaman kelola soal --}}
            {{-- route('admin.bank_soal.kelola', ['id' => $soal->bank_soal_id]) --}}
            <a href="{{ route('admin.kelolasoal', $soal->bank_soal_id) }}" class="btn btn-outline-secondary me-3">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <div>
                {{-- NOTE: Ganti dengan data dinamis dari controller --}}
                <h4 class="mb-0 fw-semibold">Mengedit Soal di: {{-- $soal->bankSoal->nama --}}</h4>
                <p class="text-muted small mb-0">Ubah detail pertanyaan dan pilihan jawaban di bawah ini.</p>
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
            {{-- NOTE: Arahkan action form ini ke route untuk mengupdate soal --}}
            <form action="{{ route('admin.updatesoal', $soal->id ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-body">
                    {{-- Input untuk Teks Pertanyaan --}}
                    <div class="mb-4">
                        <label for="question_text" class="form-label fw-semibold">Teks Pertanyaan</label>
                        <textarea
                            class="form-control"
                            id="question_text"
                            name="pertanyaan"
                            rows="4"
                            placeholder="Masukkan teks pertanyaan di sini..."
                            required>{{ old('question_text', $soal->pertanyaan) }}</textarea>
                    </div>

                    @if ($bank_soal->jenis_materi == 'Istimaq' || $bank_soal->jenis_materi == 'Listening')
                    <div class="mb-3">
                        <label class="form-label fw-semibold">File Audio (MP3)</label>

                        @if ($soal->file)
                        <p class="text-muted small">File saat ini:</p>
                        <audio controls class="mb-2" style="width: 100%;">
                            <source src="{{ asset('storage/' . $soal->file) }}" type="audio/mpeg">
                            Browser Anda tidak mendukung pemutar audio.
                        </audio>
                        @endif

                        {{-- Input untuk upload baru --}}
                        <input type="file" class="form-control" name="file" accept="audio/mp3,audio/mpeg">
                        <small class="text-muted">Kosongkan jika tidak ingin mengganti file.</small>
                    </div>
                    @endif

                    {{-- Input untuk Pilihan Jawaban --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Pilihan Jawaban</label>
                        <p class="form-text text-muted mt-0">Pilih salah satu opsi sebagai jawaban yang benar dengan mengklik tombol radio di sebelahnya.</p>

                        {{-- Opsi A --}}
                        <div class="input-group mb-3">
                            <div class="input-group-text">
                                <input
                                    class="form-check-input mt-0"
                                    type="radio"
                                    name="jawaban_benar"
                                    value="A"
                                    {{ old('jawaban_benar', $soal->jawaban_benar) == 'A' ? 'checked' : '' }}
                                    required>
                            </div>
                            <input
                                type="text"
                                class="form-control"
                                name="a"
                                placeholder="Teks Jawaban A"
                                value="{{ old('a', $soal->a) }}"
                                required>
                        </div>

                        {{-- Opsi B --}}
                        <div class="input-group mb-3">
                            <div class="input-group-text">
                                <input
                                    class="form-check-input mt-0"
                                    type="radio"
                                    name="jawaban_benar"
                                    value="B"
                                    {{ old('jawaban_benar', $soal->jawaban_benar) == 'B' ? 'checked' : '' }}>
                            </div>
                            <input
                                type="text"
                                class="form-control"
                                name="b"
                                placeholder="Teks Jawaban B"
                                value="{{ old('b', $soal->b) }}"
                                required>
                        </div>

                        {{-- Opsi C --}}
                        <div class="input-group mb-3">
                            <div class="input-group-text">
                                <input
                                    class="form-check-input mt-0"
                                    type="radio"
                                    name="jawaban_benar"
                                    value="C"
                                    {{ old('jawaban_benar', $soal->jawaban_benar) == 'C' ? 'checked' : '' }}>
                            </div>
                            <input
                                type="text"
                                class="form-control"
                                name="c"
                                placeholder="Teks Jawaban C"
                                value="{{ old('c', $soal->c) }}"
                                required>
                        </div>

                        {{-- Opsi D --}}
                        <div class="input-group">
                            <div class="input-group-text">
                                <input
                                    class="form-check-input mt-0"
                                    type="radio"
                                    name="jawaban_benar"
                                    value="D"
                                    {{ old('jawaban_benar', $soal->jawaban_benar) == 'D' ? 'checked' : '' }}>
                            </div>
                            <input
                                type="text"
                                class="form-control"
                                name="d"
                                placeholder="Teks Jawaban D"
                                value="{{ old('d', $soal->d) }}"
                                required>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-white border-0 text-end py-3">
                    <a href="{{ route('admin.kelolasoal', ['id' => $soal->bank_soal_id]) }}" class="btn btn-outline-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save-fill me-2"></i> Update Soal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection