<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bank_soals', function (Blueprint $table) {
            $table->id();
            // Kolom untuk 'Jenis Bahasa'
            $table->string('jenis_bahasa');
            // Kolom untuk 'Jenis Materi'
            $table->string('jenis_materi');
            // Kolom untuk 'Bank Soal'
            $table->text('nama_banksoal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_soals');
    }
};
