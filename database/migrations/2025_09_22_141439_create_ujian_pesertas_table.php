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
        Schema::create('ujian_pesertas', function (Blueprint $table) {
            $table->id();
            // Menghubungkan ke user yang sedang ujian
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Menghubungkan ke event ujian yang sedang dikerjakan
            $table->foreignId('event_ujian_id')->constrained()->onDelete('cascade');

            // Mencatat waktu mulai dan selesai
            $table->timestamp('waktu_mulai');
            $table->timestamp('waktu_selesai');

            // Status ujian peserta
            $table->enum('status', ['berlangsung', 'selesai'])->default('berlangsung');

            // menyimpan skor akhir
            $table->integer('skor')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ujian_pesertas');
    }
};
