<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UjianPeserta extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_ujian_id',
        'waktu_mulai',
        'waktu_selesai',
        'status',
        'skor',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function eventUjian()
    {
        return $this->belongsTo(EventUjian::class);
    }

    public function jawabanPesertas()
    {
        return $this->hasMany(JawabanPeserta::class);
    }
}
