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
        Schema::create('event_ujians', function (Blueprint $table) {
            $table->id();
            $table->string('judul');

            $table->foreignId('bank_soal_id')->constrained()->onDelete('cascade');
            $table->integer('waktu_ujian'); // Disimpan dalam menit
            $table->dateTime('tanggal_ujian');

            $table->enum('status', ['belum_aktif', 'aktif', 'selesai'])->default('belum_aktif');

            $table->string('token')->nullable()->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_ujians');
    }
};
