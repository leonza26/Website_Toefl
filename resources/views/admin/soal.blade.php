@extends('admin.layouts.layout')

@section('title', 'Manajemen Soal')
@section('header-title', 'Manajemen Soal')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Buat Soal</h5>
            </div>
            <div class="card-body">
                <form>
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

                    <!-- Soal -->
                    <div class="mb-3">
                        <label class="form-label fw-bolder">Soal</label>
                        <input type="file" class="form-control mb-2">
                        <textarea class="form-control" rows="4" placeholder="Silahkan ketik soal atau Paste dari MS Word"></textarea>
                    </div>

                    <!-- Jawaban A -->
                    <div class="mb-3 fw-bolder">
                        <label class="form-label">Jawaban A</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1">
                    </div>

                    <!-- Jawaban B -->
                    <div class="mb-3 fw-bolder">
                        <label class="form-label">Jawaban B</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1">
                    </div>

                    <!-- Jawaban C -->
                    <div class="mb-3 fw-bolder">
                        <label class="form-label">Jawaban C</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1">
                    </div>

                    <!-- Jawaban D -->
                    <div class="mb-3 fw-bolder">
                        <label class="form-label">Jawaban D</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1">
                    </div>

                    <!-- Jawaban E -->
                    <div class="mb-3 fw-bolder">
                        <label class="form-label">Jawaban E</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1">
                    </div>

                    <!-- Jawaban Kunci -->
                    <div class="mb-3 fw-bolder">
                        <label class="form-label">Kunci Jawaban</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1">
                    </div>

                    <!-- Bobot Soal -->
                    <div class="mb-3 fw-bolder">
                        <label class="form-label">Bobot Soal</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" value="1">
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

</script>
@endsection