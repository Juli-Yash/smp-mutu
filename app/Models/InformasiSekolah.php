<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class InformasiSekolah extends Model
{
    use HasFactory;
    protected $fillable = ['profil', 'visi_misi', 'fasilitas'];
}