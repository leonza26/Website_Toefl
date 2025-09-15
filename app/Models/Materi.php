<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $fillable = [
            'jenis_bahasa',
            'jenis_materi',
            'materi'
    ];
}
