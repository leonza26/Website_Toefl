<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pusat Tes TOEFL - [Nama Kampus Anda]</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/landingpage.css') }}">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">UIN PADANG | TOEFL Center</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#hero">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#features">Informasi Tes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#testimonials">Manfaat Tes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#cta">Mulai Tes</a>
                </li>
            </ul>

            @if (Route::has('login'))
                <div class="d-flex">
                    @auth
                        {{-- Jika pengguna sudah login, tampilkan tombol Dashboard --}}
                        <a href="{{ url('/dashboard') }}" class="btn btn-primary">
                            Dashboard
                        </a>
                    @else
                        {{-- Jika pengguna belum login, tampilkan tombol Log in --}}
                        <a href="{{ route('login') }}" class="btn btn-outline-light me-2">
                            Login Mahasiswa
                        </a>

                        {{-- Jika rute register tersedia, tampilkan tombol Register --}}
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary">
                                Daftar
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
            </div>
    </div>
</nav>

    <section id="hero" class="d-flex align-items-center text-center">
        <div class="container">
            <h1 class="display-3 fw-bold text-white">Pusat Tes TOEFL Institusional</h1>
            <p class="lead text-white-50 my-4">Selamat datang di portal resmi tes TOEFL untuk mahasiswa [Nama Kampus Anda].<br>Laksanakan tes sebagai syarat kelulusan, beasiswa, atau program internasional.</p>
            <a href="#cta" class="btn btn-primary btn-lg">Ambil Tes Penempatan</a>
        </div>
    </section>

    <main>
        <section id="features" class="py-5">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Keunggulan Platform Tes Kampus</h2>
                    <p class="text-muted">Dirancang untuk kebutuhan akademik Anda.</p>
                </div>
                <div class="row text-center g-4">
                    <div class="col-md-4 fade-in">
                        <div class="feature-icon mb-3">
                            <i class="bi bi-patch-check-fill"></i>
                        </div>
                        <h3>Standar Tes Resmi</h3>
                        <p>Soal dan penilaian mengacu pada standar ETS untuk hasil yang akurat dan dapat dipertanggungjawabkan.</p>
                    </div>
                    <div class="col-md-4 fade-in">
                        <div class="feature-icon mb-3">
                           <i class="bi bi-file-earmark-text"></i>
                        </div>
                        <h3>Laporan Skor Instan</h3>
                        <p>Hasil tes dapat langsung dilihat dan diunduh sebagai dokumen resmi untuk keperluan akademik Anda.</p>
                    </div>
                    <div class="col-md-4 fade-in">
                        <div class="feature-icon mb-3">
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>
                        <h3>Syarat Kelulusan & Yudisium</h3>
                        <p>Gunakan sertifikat dari tes ini sebagai salah satu syarat wajib untuk sidang skripsi dan yudisium.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="testimonials" class="py-5 bg-light">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Manfaat untuk Karir Akademik</h2>
                    <p class="text-muted">Bagaimana tes ini membantu mahasiswa kami.</p>
                </div>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4 fade-in">
                        <div class="card testimonial-card">
                            <div class="card-body">
                                <p class="card-text fst-italic">"Skor dari sini saya lampirkan untuk mendaftar program pertukaran pelajar ke Korea Selatan. Prosesnya jadi lebih mudah karena sertifikatnya diakui oleh pihak kampus."</p>
                                <div class="d-flex align-items-center mt-3">

                                    <div class="ms-3">
                                        <h6 class="card-title mb-0">Citra Anindia</h6>
                                        <small class="text-muted">Mahasiswa, Hubungan Internasional</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-6 col-lg-4 fade-in">
                        <div class="card testimonial-card">
                            <div class="card-body">
                                <p class="card-text fst-italic">"Sebagai syarat yudisium, tes di platform ini sangat efisien. Tidak perlu keluar kampus, hasilnya cepat, dan bisa langsung saya serahkan ke bagian akademik. Sangat membantu!"</p>
                                <div class="d-flex align-items-center mt-3">

                                    <div class="ms-3">
                                        <h6 class="card-title mb-0">Adi Nugroho</h6>
                                        <small class="text-muted">Mahasiswa, Fakultas Teknik</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-6 col-lg-4 fade-in">
                        <div class="card testimonial-card">
                            <div class="card-body">
                                <p class="card-text fst-italic">"Saya menggunakan hasil tes ini untuk melamar beasiswa internal kampus. Laporan skornya yang detail juga membantu saya fokus memperbaiki bagian Reading."</p>
                                <div class="d-flex align-items-center mt-3">

                                    <div class="ms-3">
                                        <h6 class="card-title mb-0">Farah Diba</h6>
                                        <small class="text-muted">Mahasiswa, Fakultas Ekonomi</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="cta" class="py-5 text-center text-white">
            <div class="container">
                 <h2 class="display-5 fw-bold">Siap Mengukur Kemampuan Anda?</h2>
                <p class="my-4">Login menggunakan akun mahasiswa Anda untuk memulai tes simulasi atau mengambil tes penempatan resmi yang dijadwalkan.</p>
                <a href="#" class="btn btn-light btn-lg">Login dengan Akun Kampus</a>
            </div>
        </section>
    </main>

    <footer class="py-4 bg-dark text-white text-center">
        <div class="container">
            <p class="mb-0">© 2025 Pusat Bahasa [Nama Kampus Anda]. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/landingpage.js') }}"></script>
</body>
</html>
