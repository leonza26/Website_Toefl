<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ujian Berlangsung - Tes Penempatan Awal</title>

    <!-- Dependencies -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5;
        }
        .test-header {
            background-color: #0d1b2a;
            color: white;
        }
        .timer-box {
            background-color: #ffc107;
            color: #000;
            font-weight: 600;
            border-radius: .25rem;
        }
        .question-panel {
            background-color: white;
            border-radius: .5rem;
            box-shadow: 0 0 15px rgba(0,0,0,0.05);
        }
        .navigation-panel {
            position: sticky;
            top: 20px;
        }
        .nav-question-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(40px, 1fr));
            gap: 10px;
        }
        .nav-question-btn {
            width: 40px;
            height: 40px;
        }
        .nav-question-btn.answered {
            background-color: #198754;
            color: white;
            border-color: #198754;
        }
        .nav-question-btn.doubtful {
            background-color: #ffc107;
            color: #000;
            border-color: #ffc107;
        }
        .nav-question-btn.current {
            background-color: #0d6efd;
            color: white;
            border-color: #0d6efd;
        }
        .reading-passage {
            max-height: 400px;
            overflow-y: auto;
            border: 1px solid #dee2e6;
            padding: 15px;
            border-radius: .25rem;
        }
    </style>
</head>
<body>
    <header class="test-header py-3 shadow-sm">
        <div class="container d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-semibold">Tes Penempatan Awal - Reading Section</h5>
            <div class="timer-box px-3 py-1 fs-5">
                <i class="bi bi-clock-fill"></i>
                <span id="timer">20:00</span>
            </div>
        </div>
    </header>

    <main class="container py-4">
        <div class="row g-4">
            <!-- Kolom Soal -->
            <div class="col-lg-8">
                <div class="question-panel p-4">
                    <h6 class="text-muted">Pertanyaan 1 dari 50</h6>
                    <hr>
                    <div class="reading-passage mb-3">
                        <p><strong>Reading Passage:</strong></p>
                        <p>The term "biodiversity" is a contraction of "biological diversity" and refers to the variety of life forms on Earth. This includes the diversity of species, the genetic diversity within those species, and the diversity of ecosystems they form. The concept gained widespread recognition after the 1992 Earth Summit in Rio de Janeiro. Preserving biodiversity is crucial for many reasons. Ecosystems with a high degree of biodiversity are more resilient to disturbances and can provide essential "ecosystem services," such as clean water, pollination of crops, and climate regulation.</p>
                        <p>However, biodiversity is currently facing unprecedented threats from human activities. Habitat destruction, pollution, climate change, and the introduction of invasive species are the primary drivers of biodiversity loss. Scientists estimate that species are going extinct at a rate hundreds of times higher than the natural background rate. This loss diminishes nature's ability to provide the services we depend on and reduces its aesthetic and cultural value.</p>
                    </div>
                    <p class="fw-semibold">1. What is the primary focus of the passage?</p>
                    <div class="list-group">
                        <label class="list-group-item">
                            <input class="form-check-input me-2" type="radio" name="question1" value="A"> The history of the Earth Summit.
                        </label>
                         <label class="list-group-item">
                            <input class="form-check-input me-2" type="radio" name="question1" value="B"> The definition, importance, and threats to biodiversity.
                        </label>
                         <label class="list-group-item">
                            <input class="form-check-input me-2" type="radio" name="question1" value="C"> The economic benefits of ecosystem services.
                        </label>
                         <label class="list-group-item">
                            <input class="form-check-input me-2" type="radio" name="question1" value="D"> An analysis of invasive species.
                        </label>
                    </div>
                    <!-- DIREVISI: Tombol navigasi soal diperbarui -->
                     <div class="d-flex justify-content-between mt-4">
                        <button class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i> Sebelumnya</button>
                        <button class="btn btn-warning"><i class="bi bi-flag-fill"></i> Ragu-ragu</button>
                        <button class="btn btn-primary">Selanjutnya & Simpan <i class="bi bi-arrow-right"></i></button>
                    </div>
                </div>
            </div>

            <!-- Kolom Navigasi Soal -->
            <div class="col-lg-4">
                 <div class="question-panel p-4 navigation-panel">
                     <h6 class="fw-semibold text-center">Navigasi Soal</h6>
                     <hr>
                     <div class="nav-question-grid">
                        <!-- Contoh Navigasi dengan status ragu-ragu -->
                        <button class="btn btn-outline-secondary nav-question-btn current">1</button>
                        <button class="btn btn-outline-secondary nav-question-btn doubtful">2</button>
                        <button class="btn btn-outline-secondary nav-question-btn answered">3</button>
                        <button class="btn btn-outline-secondary nav-question-btn">4</button>
                        <button class="btn btn-outline-secondary nav-question-btn">5</button>
                         <button class="btn btn-outline-secondary nav-question-btn current">6</button>
                        <button class="btn btn-outline-secondary nav-question-btn">7</button>
                        <button class="btn btn-outline-secondary nav-question-btn answered">8</button>
                        <button class="btn btn-outline-secondary nav-question-btn">9</button>
                        <button class="btn btn-outline-secondary nav-question-btn">10</button>
                        <button class="btn btn-outline-secondary nav-question-btn current">11</button>
                        <button class="btn btn-outline-secondary nav-question-btn">12</button>
                        <button class="btn btn-outline-secondary nav-question-btn">13</button>
                        <button class="btn btn-outline-secondary nav-question-btn current">14</button>
                        <button class="btn btn-outline-secondary nav-question-btn">15</button>
                        <button class="btn btn-outline-secondary nav-question-btn">16</button>
                        <button class="btn btn-outline-secondary nav-question-btn current">17</button>
                        <button class="btn btn-outline-secondary nav-question-btn current">18</button>
                        <button class="btn btn-outline-secondary nav-question-btn current">19</button>
                        <button class="btn btn-outline-secondary nav-question-btn current">20</button>


                     </div>
                      <div class="d-flex align-items-center justify-content-center small text-muted mt-3">
                          <span class="badge bg-success me-1">&nbsp;</span> Dijawab
                          <span class="badge bg-warning mx-2">&nbsp;</span> Ragu-ragu
                      </div>
                     <div class="d-grid mt-3">
                        <button class="btn btn-success"><i class="bi bi-check-circle-fill me-2"></i>Selesaikan Ujian</button>
                     </div>
                 </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const timerDisplay = document.getElementById('timer');
            let timeLeft = 20 * 60; // 20 menit dalam detik

            const timerInterval = setInterval(() => {
                const minutes = Math.floor(timeLeft / 60);
                let seconds = timeLeft % 60;
                seconds = seconds < 10 ? '0' + seconds : seconds;

                timerDisplay.textContent = `${minutes}:${seconds}`;
                timeLeft--;

                if (timeLeft < 0) {
                    clearInterval(timerInterval);
                    alert('Waktu ujian telah habis!');
                    // Tambahkan logika untuk submit otomatis di sini
                }
            }, 1000);
        });
    </script>
</body>
</html>

