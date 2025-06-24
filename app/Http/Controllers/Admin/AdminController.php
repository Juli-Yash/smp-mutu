<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function index()
    {
        $pendaftars = Pendaftaran::select('nama', 'jenis_kelamin', 'nisn', 'asal_sekolah', 'alamat')->get();
        return view('admin.hasil', compact('pendaftars'));
    }
    
}