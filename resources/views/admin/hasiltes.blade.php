@extends('admin.layouts.layout')

@section('title', 'Hasil Tes')
@section('header-title', 'Hasil Tes Mahasiswa')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-0 pt-3">
                    <div class="row">
                        <div class="col-12 col-md-6 mb-2 mb-md-0">
                            <h5 class="card-title fw-semibold mb-0">Daftar Hasil Tes</h5>
                            <p class="text-muted small mb-0">Lihat dan kelola semua hasil tes yang telah diselesaikan
                                mahasiswa.</p>
                        </div>

                    </div>
                </div>
                <div class="card-body">

                    <!-- Search and Filter -->
                    <div class="row mb-3 gy-2">
                        <div class="col-md-4">
                            <form action="{{ route('admin.hasiltes') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search"
                                        value="{{ request('search') }}" placeholder="Cari nama mahasiswa...">
                                    <button class="btn btn-outline-secondary" type="submit"><i
                                            class="bi bi-search"></i></button>
                                </div>
                            </form>
                        </div>

                        {{-- <div class="col-md-4">
                        <select class="form-select">
                            <option selected>Filter berdasarkan tes...</option>
                            <option value="1">Tes Penempatan Awal</option>
                            <option value="2">Tes Simulasi #1</option>
                            <option value="3">Tes Reading Practice</option>
                        </select>
                    </div> --}}

                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Mahasiswa</th>
                                    <th scope="col">Judul Tes</th>
                                    <th scope="col" class="text-center">Skor</th>
                                    <th scope="col">Tanggal Tes</th>
                                    <th scope="col">Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($hasilTes as $HT)
                                    <tr>
                                        <td>{{ ($hasilTes->currentPage() - 1) * $hasilTes->perPage() + $loop->iteration }}
                                        </td>
                                        <td>{{ $HT->user->name }}</td>
                                        <td>{{ $HT->eventUjian->judul }}</td>
                                        <td class="text-center"><span class="badge bg-primary">{{ $HT->skor }}</span>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($HT->eventUjian->tanggal_ujian)->format('d M Y') }}
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-1">
                                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#deleteHasilTesModal" data-id="{{ $HT->id }}"
                                                    data-title="{{ $HT->user->name }}"
                                                    data-url="{{ route('admin.hapustes', $HT) }}">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">
                                            Belum ada hasil tes
                                        </td>
                                    </tr>
                                @endforelse


                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4 d-flex justify-content-between">
                        @if ($hasilTes->onFirstPage())
                            <span class="btn btn-outline-secondary disabled">← Previous</span>
                        @else
                            <a href="{{ $hasilTes->previousPageUrl() }}" class="btn btn-outline-primary">← Previous</a>
                        @endif

                        @if ($hasilTes->hasMorePages())
                            <a href="{{ $hasilTes->nextPageUrl() }}" class="btn btn-outline-primary">Next →</a>
                        @else
                            <span class="btn btn-outline-secondary disabled">Next →</span>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="deleteHasilTesModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus hasil tes milik <strong id="deleteItemTitle"></strong>?</p>
                </div>
                <div class="modal-footer">
                    <form id="deleteHasilTesForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var deleteModal = document.getElementById('deleteHasilTesModal');
                deleteModal.addEventListener('show.bs.modal', function(event) {
                    var button = event.relatedTarget;

                    var url = button.getAttribute('data-url');
                    var title = button.getAttribute('data-title');


                    var itemTitle = deleteModal.querySelector('#deleteItemTitle');
                    itemTitle.textContent = title;


                    var form = deleteModal.querySelector('#deleteHasilTesForm');
                    form.action = url;
                });
            });
        </script>


    @endsection
