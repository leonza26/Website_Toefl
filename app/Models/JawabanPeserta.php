<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JawabanPeserta extends Model
{
    //

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ujian_peserta_id',
        'soal_id',
        'jawaban', // Menggantikan pilihan_jawaban_id
        'is_ragu',
    ];

    public function ujianPeserta()
    {
        return $this->belongsTo(UjianPeserta::class);
    }


    public function soal()
    {
        return $this->belongsTo(Soal::class);
    }
}
