@extends('admin.layouts.layout')

{{-- NOTE: Judul halaman akan dinamis berdasarkan nama bank soal --}}
@section('title', 'Kelola Soal')
@section('header-title', 'Kelola Soal')

@section('content')
<div class="row">
    <div class="col-12">
        {{-- tombol  kembali --}}
        <div class="d-flex align-items-center mb-3">
            <a href="{{ route('admin.banksoal') }}" class="btn btn-outline-secondary me-3">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <div>
                {{-- NOTE: Ganti dengan data dinamis dari controller, contoh: $bankSoal->nama --}}
                <h4 class="mb-0 fw-semibold">{{ $bank_soal->nama_banksoal }}</h4>
                <p class="text-muted small mb-0">Kelola semua pertanyaan untuk bank soal ini.</p>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-0 pt-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title fw-semibold mb-0">Daftar Pertanyaan</h5>
                    <a href="{{ route('admin.buatsoal', $bank_soal->id) }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle-fill me-2"></i>Tambah Soal Baru
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" style="width: 5%;">#</th>
                                <th scope="col" style="width: 65%;">Pertanyaan</th>
                                <th scope="col" style="width: 15%;" class="text-center">Jawaban Benar</th>
                                <th scope="col" style="width: 15%;" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($soals as $index => $soal)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <p class="mb-0">{{ $soal->pertanyaan }}</p>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-success">{{ $soal->jawaban_benar }}</span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.editsoal', $soal->id) }}" class="btn btn-sm btn-outline-warning" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <button class="btn btn-danger btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteModal"
                                        data-id="{{ $soal->id }}"
                                        data-title="Soal Ini"><i class="bi bi-trash-fill"></i></button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">
                                    Belum Ada Soal
                                </td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-white border-0">
                {{-- tambahan Pagination  --}}
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus <strong id="materiTitle"></strong>?</p>
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            var title = button.getAttribute('data-title');

            // update modal content
            var materiTitle = deleteModal.querySelector('#materiTitle');
            materiTitle.textContent = title;

            // update form action
            var form = deleteModal.querySelector('#deleteForm');
            form.action = '/admin/hapussoal/' + id;
        });
    });
</script>
@endsection
