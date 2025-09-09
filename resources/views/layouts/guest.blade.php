<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Google Fonts (Poppins) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS untuk Halaman Login/Register -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            /* Latar belakang gradien yang serasi dengan landing page */
            background: linear-gradient(45deg, #0d6efd, #0d1b2a);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .auth-card {
            border: none;
            border-radius: 1rem;
            background-color: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
        }
        .form-control-lg {
            padding: 0.8rem 1rem;
            font-size: 1rem;
        }
        .btn-lg {
            padding: 0.8rem 1rem;
            font-size: 1.1rem;
            font-weight: 600;
        }
        .brand-logo {
            font-weight: 700;
            color: #0d1b2a;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-5">
                <!-- Slot ini akan diisi oleh form login atau register -->
                {{ $slot }}
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (opsional, tapi baik untuk disertakan) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
