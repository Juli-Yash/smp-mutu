<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = [
        'tahapan',
        'tanggal_mulai',
        'tanggal_selesai',
    ];
}