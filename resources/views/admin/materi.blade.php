@extends('admin.layouts.layout')

@section('title', 'Manajemen Materi')
@section('header-title', 'Manajemen Materi')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-0 pt-3">
                <div class="row">
                    <div class="col-12 col-md-6 mb-2 mb-md-0">
                        <h5 class="card-title fw-semibold mb-0">Daftar Materi</h5>
                        <p class="text-muted small mb-0">Materi untuk belajar mahasiswa.</p>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-md-end">
                        <a href="{{ route('admin.buatmateri') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-2"></i>Tambah Materi Baru
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Jenis Bahasa</th>
                                <th scope="col" class="text-center">Jenis Materi</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($materis as $index => $materi)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $materi->jenis_bahasa }}</td>
                                <td class="text-center">{{ $materi->jenis_materi }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <a href="{{ asset('storage/' . $materi->materi)  }}" class="btn btn-sm btn-info text-white" title="Lihat Bank Soal"><i class="bi bi-eye-fill"></i> Lihat Materi</a>
                                        <button class="btn btn-danger btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteModal"
                                            data-id="{{ $materi->id }}"
                                            data-title="{{ $materi->jenis_materi }}"><i class="bi bi-trash-fill"></i></button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
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
            form.action = '/admin/hapus_Materi/' + id;
        });
    });
</script>
@endsection