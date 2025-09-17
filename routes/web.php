<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\AdminMainController;
use App\Http\Controllers\Participant\ParticipantMainController;

Route::get('/', function () {
    $isAdmin = false;
    if (Auth::check() && Auth::user()->role === 'admin') {
        $isAdmin = true;
    }
    return view('welcome', compact('isAdmin'));
})->name('home');


// admin routes
Route::middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::controller(AdminMainController::class)->group(function () {
            Route::get('/dashboard', 'admin')->name('admin');
            Route::get('/manage', 'manageuser')->name('admin.manage');

            // materi
            Route::get('/materi', 'materi')->name('admin.materi');
            Route::get('/buatMateri', 'buatmateri')->name('admin.buatmateri');
            Route::post('/create_Materi', 'create_materi')->name('admin.create_materi');
            Route::delete('/hapus_Materi/{id}', 'hapus_materi')->name('admin.hapus_materi');

            // bank soal
            Route::get('/banksoal', 'banksoal')->name('admin.banksoal');
            // create banksoal
            Route::post('/create_banksoal', 'store')->name('admin.banksoal_store');

            // FE add bank soal
            Route::get('/buat_banksoal', 'tambah_banksoal')->name('admin.add_banksoal');

            // soal
            Route::get('/kelolasoal/{id}', 'kelola_banksoal')->name('admin.kelolasoal');
            Route::get('/lihatsoal/{id}', 'lihatsoal')->name('admin.lihatsoal');
            Route::get('/buatsoal/{id}', 'buatsoal')->name('admin.buatsoal');
            Route::post('/storesoal/{id}', 'storesoal')->name('admin.storesoal');
            Route::get('/editsoal/{id}', 'editsoal')->name('admin.editsoal');
            Route::put('/updatesoal/{id}', 'updatesoal')->name('admin.updatesoal');
            Route::delete('/hapussoal/{id}', 'hapussoal')->name('admin.hapussoal');

            // setting ujian
            Route::get('/sesiujian', 'sesiujian')->name('admin.sesiujian');
            Route::get('/eventujian', 'eventujian')->name('admin.eventujian');

            // hasil tes
            Route::get('/hasiltes', 'hasiltes')->name('admin.hasiltes');
        });
    });
});



// Participant routes
Route::middleware(['auth', 'verified', 'rolemanager:participant'])->group(function () {
    Route::prefix('participant')->group(function () {
        Route::controller(ParticipantMainController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('participant');
            Route::get('/materi', 'materi')->name('participant.materi');
            Route::get('/simulasi', 'simulasi')->name('participant.simulasi');
            Route::get('/ujian', 'ujian')->name('participant.ujian');
        });
    });
});




// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
