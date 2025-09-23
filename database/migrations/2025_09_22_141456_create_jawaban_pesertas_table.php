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
        Schema::create('jawaban_pesertas', function (Blueprint $table) {
            $table->id();
            // Menghubungkan ke sesi ujian peserta
            $table->foreignId('ujian_peserta_id')->constrained()->onDelete('cascade');

            // Menghubungkan ke soal yang dijawab
            $table->foreignId('soal_id')->constrained()->onDelete('cascade');

            // Kolom ini boleh null, artinya peserta belum menjawab soal tersebut.
            $table->enum('jawaban', ['a', 'b', 'c', 'd'])->nullable();

            // Untuk menandai jika peserta ragu-ragu
            $table->boolean('is_ragu')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawaban_pesertas');
    }
};
