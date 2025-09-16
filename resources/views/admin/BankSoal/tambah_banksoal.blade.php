@extends('admin.layouts.layout')

@section('title', 'Manajemen Soal')
@section('header-title', 'Bank Soal')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Tambah Bank Soal</h5>
            </div>
            <div class="card-body">

                <form method="POST" action="{{ route('admin.banksoal_store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="operator" class="form-label fw-bolder">Jenis Bahasa</label>
                        <select class="form-select" name="jenis_bahasa" id="operator">
                            <option selected disabled>Jenis Bahasa</option>
                            <option value="English">English</option>
                            <option value="Arabic">Arabic</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="operator" class="form-label fw-bolder">Jenis Materi</label>
                        <select class="form-select" name="jenis_materi" id="operator">
                            <option selected disabled>Jenis Materi</option>
                            <option value="Reading">Reading</option>
                            <option value="Listening">Listening</option>
                            <option value="Structure">Structure</option>
                            <option value="Istimaq">Istimaq</option>
                            <option value="Qoriah">Qoriah</option>
                            <option value="Qowait">Qowait</option>
                        </select>
                    </div>

                   {{-- bank soal --}}
                    <div class="mb-3 fw-bolder">
                        <label class="form-label">Nama Bank Soal</label>
                        <input type="text" name="nama_banksoal" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

</script>
@endsection
