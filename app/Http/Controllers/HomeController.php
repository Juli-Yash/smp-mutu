<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformasiSekolah;


class HomeController extends Controller
{
    public function index()
    {
        $informasi = InformasiSekolah::first();

        return view('home', [
            'profil' => $informasi?->profil,
            'visi_misi' => $informasi?->visi_misi,
            'fasilitas' => $informasi?->fasilitas,
        ]);
    }
}