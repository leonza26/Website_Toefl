<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventUjian extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'judul',
        'bank_soal_id',
        'waktu_ujian',
        'tanggal_ujian',
        'status',
        'token',
    ];


    public function bankSoal(){
        return $this->belongsTo(BankSoal::class);
    }
}
