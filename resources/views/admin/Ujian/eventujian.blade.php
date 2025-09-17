@extends('admin.layouts.layout')

@section('title', 'Daftar Event Ujian')
@section('header-title', 'Daftar Event Ujian')

@section('content')

    {{-- Style kustom untuk mencegah teks di tabel terpotong --}}
    <style>
        .table-nowrap th,
        .table-nowrap td {
            white-space: nowrap;
        }
    </style>

    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-light-2 border-0">
                    <h5 class="card-title mb-0 fw-semibold">Daftar Semua Event Ujian</h5>
                    <p class="card-subtitle text-muted mt-1 small">Kelola, aktifkan, dan rilis token untuk setiap event ujian
                        dari sini.</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive border rounded-3">
                        {{-- Menambahkan class 'table-nowrap' untuk mengaktifkan style di atas --}}

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- jika berhasil, maka akan menampilkan pesan successnya --}}
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table table-hover table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Judul Ujian</th>
                                    <th scope="col">Bank Soal</th>
                                    <th scope="col">Waktu</th>
                                    <th scope="col">Tgl Ujian</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Token</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($events as $event)
                                    <tr>
                                        <td class="fw-semibold">{{ $event->judul }}</td>
                                        <td>{{ $event->bank_soal_id }}</td>
                                        <td>{{ $event->waktu_ujian }}</td>
                                        <td>{{ \Carbon\Carbon::parse($event->tanggal_ujian)->format('d M Y') }}</td>
                                        <td>
                                            @switch($event->status)
                                                @case('belum_aktif')
                                                    <span class="badge bg-secondary">Belum Aktif</span>
                                                @break

                                                @case('aktif')
                                                    <span class="badge bg-success">Aktif</span>
                                                @break

                                                @case('selesai')
                                                    <span class="badge bg-dark">Selesai</span>
                                                @break
                                            @endswitch
                                        </td>
                                        <td>
                                            @if ($event->token)
                                                <span class="fw-bold">{{ $event->token }}</span>
                                            @else
                                                <span class="text-muted fst-italic">Belum Dirilis</span>
                                            @endif
                                        </td>

                                        {{-- aksi --}}
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-1">
                                                @if ($event->status == 'belum_aktif')
                                                    {{--  mengaktifkan ujian --}}
                                                    <form action="{{ route('event.aktifkan_ujian', $event) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit"
                                                            class="btn btn-success btn-sm">Aktifkan</button>
                                                    </form>
                                                    <button class="btn btn-info btn-sm" disabled>Release Token</button>
                                                @elseif($event->status == 'aktif')
                                                    {{-- merilis token --}}
                                                    @if (!$event->token)
                                                        <form action="{{ route('event.token', $event) }}" method="POST"
                                                            class="d-inline">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="btn btn-info btn-sm">Release
                                                                Token</button>
                                                        </form>
                                                    @endif
                                                @endif
                                                {{-- menghapus event --}}
                                                <form action="{{ route('event.hapus', $event) }}" method="POST"
                                                    class="d-inline"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus event ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="bi bi-trash-fill"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                        {{-- Tampilan jika tidak ada data event ujian sama sekali --}}
                                        <tr>
                                            <td colspan="7" class="text-center text-muted fst-italic">
                                                Belum ada event ujian yang dibuat.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
