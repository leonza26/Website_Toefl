<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PilihanJawaban extends Model
{
    //

     use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'soal_id',
        'opsi',
        'is_benar',
    ];


    // * Satu PilihanJawaban pasti dimiliki oleh satu Soal.
    //  */
    public function soal()
    {
        return $this->belongsTo(Soal::class);
    }

}
