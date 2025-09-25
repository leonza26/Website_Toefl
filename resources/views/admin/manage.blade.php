@extends('admin.layouts.layout')

@section('title', 'Manajemen User')
@section('header-title', 'Manajemen User')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-0 pt-3">
                <div class="row">
                    <div class="col-12 col-md-6 mb-2 mb-md-0">
                        <h5 class="card-title fw-semibold mb-0">Daftar Pengguna</h5>
                        <p class="text-muted small mb-0">Kelola semua akun admin dan mahasiswa.</p>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-md-end">
                        <a href="#" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-2"></i>Tambah User Baru
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <!-- Search and Filter -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <form method="GET" action="{{ route('admin.manage') }}">
                            <div class="input-group">
                                <input type="text" name="search" value="{{ request('search') }}"
                                    class="form-control" placeholder="Cari berdasarkan nama atau email...">
                                <button class="btn btn-outline-secondary" type="submit"><i
                                        class="bi bi-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Users Table -->
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Tanggal Bergabung</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr>
                                {{-- penomoran pagination --}}
                                <td>{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}</td>

                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->role == 0)
                                    <span
                                        class="badge bg-primary-subtle text-primary-emphasis rounded-pill">Admin</span>
                                    @else
                                    <span
                                        class="badge bg-success-subtle text-success-emphasis rounded-pill">Participant</span>
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}</td>

                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <button class="btn btn-danger btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteModal"
                                            data-id="{{ $user->id }}"
                                            data-title="{{ $user->name }}"><i class="bi bi-trash-fill"></i></button>
                                    </div>
                                </td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Data tidak ditemukan.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{-- link halaman --}}
                    <div class="mt-4 d-flex justify-content-between">
                        @if ($users->onFirstPage())
                        <span class="btn btn-outline-secondary disabled">← Previous</span>
                        @else
                        <a href="{{ $users->previousPageUrl() }}" class="btn btn-outline-primary">← Previous</a>
                        @endif

                        @if ($users->hasMorePages())
                        <a href="{{ $users->nextPageUrl() }}" class="btn btn-outline-primary">Next →</a>
                        @else
                        <span class="btn btn-outline-secondary disabled">Next →</span>
                        @endif
                    </div>
                </div>

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
            form.action = '/admin/destroyuser/' + id;
        });
    });
</script>
@endsection
