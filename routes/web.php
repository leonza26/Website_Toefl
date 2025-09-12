<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\AdminMainController;
use App\Http\Controllers\Participant\ParticipantMainController;

Route::get('/', function () {
    return view('welcome');
})->name('home');


// admin routes
Route::middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::controller(AdminMainController::class)->group(function () {
            Route::get('/dashboard', 'admin')->name('admin');
            Route::get('/manage', 'manageuser')->name('admin.manage');
            Route::get('/materi', 'materi')->name('admin.materi');
            Route::get('/buatMateri', 'buatmateri')->name('admin.buatmateri');
            Route::get('/banksoal', 'banksoal')->name('admin.banksoal');
            Route::get('/buatsoal', 'soal')->name('admin.soal');
            Route::get('/hasiltes', 'hasiltes')->name('admin.hasiltes');
        });



    });
});



// Participant routes
Route::middleware(['auth', 'verified', 'rolemanager:participant'])->group(function () {
    Route::prefix('participant')->group(function () {
        Route::controller(ParticipantMainController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('participant');
        });


    });
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
