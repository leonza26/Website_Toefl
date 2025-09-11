<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Dependencies -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS for Dashboard -->
    <link rel="stylesheet" href="{{ asset('css/participantdashboard.css') }}">
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar vh-100 d-flex flex-column p-0">
             <a href="{{ route('participant') }}" class="sidebar-brand">
                <i class="bi bi-mortarboard-fill"></i> <span>TOEFL Center</span>
            </a>
            <ul class="nav nav-pills flex-column sidebar-nav flex-grow-1">
                <li class="sidebar-header">Mahasiswa</li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('participant') ? 'active' : '' }}" href="{{ route('participant') }}">
                        <i class="bi bi-speedometer2"></i><span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('participant.materi') ? 'active' : '' }}" href="{{ route('participant.materi') }}"><i class="bi bi-book-half"></i><span>Materi</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('participant.simulasi') ? 'active' : '' }}" href="{{ route('participant.simulasi') }}"><i class="bi bi-pencil-square"></i><span>Simulasi</span></a>
                </li>

            </ul>
        </aside>

        <!-- Main Content -->
        <div class="main-content d-flex flex-column vh-100">
            <!-- Top Navbar -->
            <header class="top-navbar d-flex align-items-center p-2">
                <button class="btn btn-link text-dark fs-4" id="sidebar-toggle"><i class="bi bi-list"></i></button>
                <div class="ms-auto">
                    <div class="dropdown me-3">
                        <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="fw-semibold">{{ Auth::user()->name }}</span>
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

            <!-- Page Content -->
            <main class="content p-4 flex-grow-1">
                <div class="container-fluid">
                    <h1 class="h3 mb-3 fw-semibold">@yield('header-title', 'Halaman')</h1>
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- js mahasiswa --}}
    <script src="{{ asset('js/participantdashboard.js') }}"></script>
</body>
</html>

