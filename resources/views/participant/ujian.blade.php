<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- PENTING: CSRF Token untuk keamanan AJAX --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ujian Berlangsung - {{ $eventUjian->judul }}</title>

    <!-- Dependencies -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sesiujian.css') }}">
</head>

<body>
    <header class="test-header py-3 shadow-sm">
        <div class="container d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-semibold">{{ $eventUjian->judul }}</h5>
            <div class="timer-box px-3 py-1 fs-5">
                <i class="bi bi-clock-fill"></i>
                <span id="timer">--:--</span>
            </div>
        </div>
    </header>
    <main class="container py-4">
        <form id="ujianForm" method="POST" action="{{ route('participant.ujian.selesaikan') }}">
            @csrf
            <input type="hidden" name="ujian_peserta_id" id="ujian_peserta_id" value="{{ $ujianPeserta->id }}">
            <div class="row g-4">
                <div class="col-lg-8">
                    <div id="question-container" class="question-panel p-4">
                        <div class="text-center p-5">
                            <div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="question-panel p-4 navigation-panel">
                        <h6 class="fw-semibold text-center">Navigasi Soal</h6>
                        <hr>
                        <div id="nav-question-grid" class="nav-question-grid"></div>
                        <div class="d-flex align-items-center justify-content-center small text-muted mt-3">
                            <span class="badge bg-success me-1">&nbsp;</span> Dijawab
                            <span class="badge bg-warning mx-2">&nbsp;</span> Ragu-ragu
                        </div>
                        <div class="d-grid mt-3">
                            <button type="button" id="btnSelesaikan" class="btn btn-success" disabled>
                                <i class="bi bi-check-circle-fill me-2"></i>Selesaikan Ujian
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
    <!-- Modal -->
    <div class="modal fade" id="konfirmasiModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Selesaikan Ujian</h5><button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Anda telah menjawab <strong id="jawabanTerkumpul">0</strong> dari <strong
                            id="totalSoalModal">0</strong> soal.</p>
                    <p>Apakah Anda yakin ingin mengakhiri sesi ujian ini?</p>
                </div>
                <div class="modal-footer"><button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Batal</button><button type="button" id="btnSubmitFinal"
                        class="btn btn-success">Ya, Selesaikan</button></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        let sisaWaktu = {{ $sisaWaktu }};
        const ujianPesertaId = document.getElementById('ujian_peserta_id').value;
        const totalSoal = {{ $totalSoal }};
        let soalSaatIni = null;
        let jawabanPeserta = {};
        let isLoading = false; // Flag untuk mencegah klik ganda
        const timerDisplay = document.getElementById('timer');
        const questionContainer = document.getElementById('question-container');
        const navGrid = document.getElementById('nav-question-grid');
        const btnSelesaikan = document.getElementById('btnSelesaikan');
        const konfirmasiModal = new bootstrap.Modal(document.getElementById('konfirmasiModal'));

        function muatSoal(nomorSoal) {
            if (isLoading) return;
            isLoading = true;
            questionContainer.innerHTML = `<div class="text-center p-5"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>`;
            const url = `{{ route('participant.ujian.muat_soal', ['ujianPeserta' => ':id']) }}`.replace(':id', ujianPesertaId);
            fetch(`${url}?nomor=${nomorSoal}`, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                .then(response => { if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`); return response.json(); })
                .then(data => {
                    soalSaatIni = data.soal;
                    Object.assign(jawabanPeserta, data.jawaban_peserta);
                    renderSoal();
                    renderNavigasi();
                    updateStatusPenyelesaian();
                }).catch(error => {
                    console.error('Fetch error:', error);
                    questionContainer.innerHTML = `<div class="alert alert-danger">Gagal memuat soal. Silakan periksa koneksi atau coba refresh halaman.</div>`;
                }).finally(() => {
                    isLoading = false;
                });
        }

        function renderSoal() {
            let pilihanHTML = '';
            const opsi = ['a', 'b', 'c', 'd'];
            const jawabanTersimpan = jawabanPeserta[soalSaatIni.id] ? jawabanPeserta[soalSaatIni.id].jawaban : null;
            opsi.forEach(opt => {
                const isChecked = jawabanTersimpan === opt ? 'checked' : '';
                pilihanHTML += `<label class="list-group-item"><input class="form-check-input me-2" type="radio" name="jawaban" value="${opt}" ${isChecked}> ${soalSaatIni[opt]}</label>`;
            });
            const isRagu = jawabanPeserta[soalSaatIni.id] ? jawabanPeserta[soalSaatIni.id].is_ragu : false;
            questionContainer.innerHTML = `<h6 class="text-muted">Pertanyaan ${soalSaatIni.nomor} dari ${totalSoal}</h6><hr><div class="mb-3">${soalSaatIni.pertanyaan}</div><div class="list-group">${pilihanHTML}</div><div class="d-flex justify-content-between mt-4"><button type="button" class="btn btn-outline-secondary ${soalSaatIni.nomor === 1 ? 'disabled-button' : ''}" onclick="navigasi(-1)"><i class="bi bi-arrow-left"></i> Sebelumnya</button><button type="button" class="btn ${isRagu ? 'btn-danger' : 'btn-warning'}" onclick="tandaiRagu()"><i class="bi bi-flag-fill"></i> ${isRagu ? 'Hapus Tanda' : 'Ragu-ragu'}</button><button type="button" class="btn btn-primary" onclick="navigasi(1)">${soalSaatIni.nomor === totalSoal ? 'Selesaikan' : 'Selanjutnya'} <i class="bi bi-arrow-right"></i></button></div>`;
        }

        function renderNavigasi() {
            navGrid.innerHTML = '';
            for (let i = 1; i <= totalSoal; i++) {
                let statusClass = '';
                const soalData = Object.values(jawabanPeserta).find(item => item && item.nomor === i);
                if (soalData) {
                    if (soalData.is_ragu) statusClass = 'doubtful';
                    else if (soalData.jawaban) statusClass = 'answered';
                }
                if (soalSaatIni && i === soalSaatIni.nomor) statusClass += ' current';
                navGrid.innerHTML += `<button type="button" class="btn btn-outline-secondary nav-question-btn ${statusClass}" onclick="muatSoal(${i})">${i}</button>`;
            }
        }

        function simpanJawaban(jawaban, isRagu, callback) {
            fetch(`{{ route('participant.ujian.simpan_jawaban') }}`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') },
                body: JSON.stringify({ ujian_peserta_id: ujianPesertaId, soal_id: soalSaatIni.id, jawaban: jawaban, is_ragu: isRagu })
            }).then(response => response.json()).then(data => {
                if (data.success) {
                    jawabanPeserta[soalSaatIni.id] = { jawaban: jawaban, is_ragu: isRagu, nomor: soalSaatIni.nomor };
                    renderNavigasi(); updateStatusPenyelesaian(); if (callback) callback();
                }
            });
        }

        function updateStatusPenyelesaian() {
            const jawabanTersimpan = Object.values(jawabanPeserta).filter(j => j && j.jawaban).length;
            btnSelesaikan.disabled = jawabanTersimpan !== totalSoal;
        }

        window.navigasi = function(arah) {
            if (isLoading) return;
            const jawabanTerpilih = document.querySelector('input[name="jawaban"]:checked');
            const jawaban = jawabanTerpilih ? jawabanTerpilih.value : (jawabanPeserta[soalSaatIni.id]?.jawaban || null);
            const isRagu = jawabanPeserta[soalSaatIni.id]?.is_ragu || false;

            simpanJawaban(jawaban, isRagu, function() {
                // ==========================================================
                //           PERBAIKAN UTAMA ADA DI BARIS INI
                // ==========================================================
                // Menggunakan parseInt() untuk memastikan penjumlahan matematika
                const nomorBerikutnya = parseInt(soalSaatIni.nomor) + arah;
                // ==========================================================

                if (nomorBerikutnya > 0 && nomorBerikutnya <= totalSoal) {
                    muatSoal(nomorBerikutnya);
                } else if (nomorBerikutnya > totalSoal) {
                    btnSelesaikan.click();
                }
            });
        };

        window.tandaiRagu = function() {
            if (isLoading) return;
            const jawabanTerpilih = document.querySelector('input[name="jawaban"]:checked');
            const jawaban = jawabanTerpilih ? jawabanTerpilih.value : (jawabanPeserta[soalSaatIni.id]?.jawaban || null);
            const isRaguSaatIni = jawabanPeserta[soalSaatIni.id]?.is_ragu || false;
            simpanJawaban(jawaban, !isRaguSaatIni, () => muatSoal(soalSaatIni.nomor));
        };

        btnSelesaikan.addEventListener('click', function() {
            const jawabanTerkumpul = Object.values(jawabanPeserta).filter(j => j.jawaban).length;
            document.getElementById('jawabanTerkumpul').textContent = jawabanTerkumpul;
            document.getElementById('totalSoalModal').textContent = totalSoal;
            konfirmasiModal.show();
        });

        document.getElementById('btnSubmitFinal').addEventListener('click', () => document.getElementById('ujianForm').submit());

        const timerInterval = setInterval(() => {
            if (sisaWaktu < 0) {
                clearInterval(timerInterval);
                alert('Waktu ujian telah habis! Jawaban Anda akan dikirim secara otomatis.');
                document.getElementById('ujianForm').submit();
                return;
            }
            const minutes = Math.floor(sisaWaktu / 60);
            let seconds = Math.floor(sisaWaktu % 60);
            seconds = seconds < 10 ? '0' + seconds : seconds;
            timerDisplay.textContent = `${minutes}:${seconds}`;
            sisaWaktu--;
        }, 1000);

        history.pushState(null, null, location.href);
        window.onpopstate = () => history.go(1);
        muatSoal({{ $nomorSoal }});
    });
    </script>

</body>

</html>
