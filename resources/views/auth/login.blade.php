<x-guest-layout>
    <div class="card shadow-lg auth-card">
        <div class="card-body p-4 p-sm-5">

            <!-- Header Form -->
            <div class="text-center mb-4">
                <h4 class="brand-logo">UIN PADANG | TOEFL Center</h4>
                <h1 class="h3 fw-bold mt-3 mb-2">Login Akun Mahasiswa</h1>
                <p class="text-muted">Masuk untuk memulai tes atau melihat riwayat skor Anda.</p>
            </div>

            <!-- Session Status (Pesan seperti "Link reset password telah dikirim") -->
            <x-auth-session-status class="alert alert-success mb-4" :status="session('status')" />

            <!-- Form Login -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Alamat Email -->
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="contoh: nama@emailkampus.ac.id">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label fw-bold">Password</label>
                    <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Masukkan password Anda">
                     @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                        <label class="form-check-label" for="remember_me">
                            {{ __('Remember me') }}
                        </label>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="text-decoration-none small" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <!-- Tombol Login -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">
                        {{ __('Log in') }}
                    </button>
                </div>

                <hr class="my-4">

                <!-- Link ke Halaman Register -->
                <div class="text-center">
                    <p class="text-muted">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="text-decoration-none fw-bold">Daftar di sini</a>
                    </p>
                </div>
            </form>

        </div>
    </div>
</x-guest-layout>
