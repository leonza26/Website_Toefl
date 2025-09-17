<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Soal extends Model
{
    //
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'bank_soal_id',
        'pertanyaan',
        'a',
        'b',
        'c',
        'd',
        'jawaban_benar',
    ];

    // Satu Soal pasti dimiliki oleh satu BankSoal.

    public function bankSoal()
    {
        return $this->belongsTo(BankSoal::class);
    }

    // * Satu Soal bisa memiliki banyak PilihanJawaban.
    //  */
    public function pilihanJawabans()
    {
        return $this->hasMany(PilihanJawaban::class);
    }
}
