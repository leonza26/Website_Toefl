<x-guest-layout>
    <div class="card shadow-lg auth-card">
        <div class="card-body p-4 p-sm-5">

            <!-- Header Form -->
            <div class="text-center mb-4">
                <h3 class="brand-logo">UIN PADANG | TOEFL Center</h3>
                <h1 class="h3 fw-bold mt-3 mb-2">Buat Akun Baru</h1>
                <p class="text-muted">Lengkapi data di bawah untuk mendaftar.</p>
            </div>

            <!-- Form Register -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nama Lengkap -->
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Nama Lengkap</label>
                    <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Masukkan nama lengkap Anda">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Alamat Email -->
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email Kampus</label>
                    <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="contoh: nama@emailkampus.ac.id">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label fw-bold">Password</label>
                    <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Buat password Anda">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Konfirmasi Password -->
                <div class="mb-4">
                    <label for="password_confirmation" class="form-label fw-bold">Konfirmasi Password</label>
                    <input id="password_confirmation" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi password Anda">
                </div>


                <!-- Tombol Register -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">
                        {{ __('Register') }}
                    </button>
                </div>

                <hr class="my-4">

                <!-- Link ke Halaman Login -->
                <div class="text-center">
                    <p class="text-muted">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="text-decoration-none fw-bold">Login di sini</a>
                    </p>
                </div>
            </form>

        </div>
    </div>
</x-guest-layout>
