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
        Schema::create('pilihan_jawabans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('soal_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // untuk menyimpan pilihan jawaban
            $table->string('opsi');
            $table->boolean('ragu_ragu')->default(false);   
            // boolean untuk menandai apakah ini jawaban yang benar atau tidak
            $table->boolean('is_benar')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pilihan_jawabans');
    }
};
