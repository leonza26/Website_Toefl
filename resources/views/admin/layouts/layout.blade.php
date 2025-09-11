<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Panel') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Dependencies -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/admindashboard.css') }}">
</head>

<div class="wrapper">
        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar vh-100 d-flex flex-column p-0">
             <a href="#" class="sidebar-brand">
                <i class="bi bi-shield-lock-fill"></i> <span>Admin Panel</span>
            </a>
            <ul class="nav nav-pills flex-column sidebar-nav flex-grow-1">
                <li class="sidebar-header">Administrator</li>

                {{-- dashboard --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin') ? 'active' : '' }}" href="{{ route('admin') }}">
                        <i class="bi bi-speedometer2"></i><span>Dashboard</span>
                    </a>
                </li>

                {{-- manage.user --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.manage') ? 'active' : '' }}" href="{{ route('admin.manage') }}"><i class="bi bi-people-fill"></i><span>Manajemen User</span></a>
                </li>

                {{-- materi --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.materi') ? 'active' : '' }}" href="{{ route('admin.materi') }}"><i class="bi bi-card-text"></i><span>Materi</span></a>
                </li>

                {{-- banksoal --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.banksoal') ? 'active' : '' }}" href="{{ route('admin.banksoal') }}"><i class="bi bi-bank"></i><span>Bank Soal</span></a>
                </li>

                {{-- hasil tes --}}
                 <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.hasiltes') ? 'active' : '' }}" href="{{ route('admin.hasiltes') }}"><i class="bi bi-bar-chart-line-fill"></i><span>Hasil Tes</span></a>
                </li>

                {{-- profile --}}
                 <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}" href="{{ route('profile.edit') }}">
                        <i class="bi bi-person-circle"></i><span>Profil Saya</span>
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <div class="main-content d-flex flex-column vh-100">
             <header class="top-navbar d-flex align-items-center p-2">
                <button class="btn btn-link text-dark fs-4" id="sidebar-toggle"><i class="bi bi-list"></i></button>
                <div class="ms-auto">
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="https://source.unsplash.com/40x40/?person,admin" alt="" class="rounded-circle avatar me-2">
                            <span class="fw-semibold">{{ Auth::user()->name }} (Admin)</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Log out</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>
            <main class="content p-4 flex-grow-1">
                <div class="container-fluid">
                    <h1 class="h3 mb-3 fw-semibold">@yield('header-title', 'Halaman')</h1>
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- script js --}}
    <script src="{{ asset('js/admindashboard.js') }}"></script>

</body>
</html>

