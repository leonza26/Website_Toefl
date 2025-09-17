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
        Schema::create('soals', function (Blueprint $table) {
            $table->id();
            // onDelete('cascade') berarti jika bank soal dihapus, semua soal di dalamnya ikut terhapus.
            $table->foreignId('bank_soal_id')->constrained()->onDelete('cascade');
            // menyimpan pertanyaan
            $table->text('pertanyaan');
            $table->string('file')->nullable();
            $table->string('a');
            $table->string('b');
            $table->string('c');
            $table->string('d');
            $table->string('jawaban_benar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soals');
    }
};
