<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pendaftaran;
use App\Models\Jadwal;

class UserDashboardController extends Controller
{
    /**
     * Tampilkan dashboard utama pengguna.
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        if ($user->role !== 'user') {
            abort(403, 'Unauthorized');
        }

        $pendaftar = Pendaftaran::where('user_id', $user->id)->first();
        $jadwals = Jadwal::orderBy('tanggal_mulai')->get();

        return view('adsiswa.dashboard', compact('pendaftar', 'jadwals'));
    }

    /**
     * Tampilkan status pendaftaran pengguna.
     */
    public function statusPendaftaran()
    {
        $pendaftar = auth()->user()->pendaftaran;

        return view('adsiswa.status-pendaftaran', compact('pendaftar'));
    }

    /**
     * Tampilkan hasil seleksi seluruh peserta.
     */
    public function hasilPendaftaran()
    {
        $pendaftars = Pendaftaran::select(
            'id',
            'nama',
            'jenis_kelamin',
            'nisn',
            'asal_sekolah',
            'alamat',
            'nilai_rata_rata_skl',
            'status'
        )->get();

        return view('adsiswa.hasil-seleksi', compact('pendaftars'));
    }

    /**
     * Tampilkan hasil seleksi seluruh peserta.
     */
    public function cetakBerkas()
    {
        $pendaftar = Pendaftaran::where('user_id', auth()->id())->firstOrFail();
        return view('adsiswa.cetak-berkas', compact('pendaftar'));
    }
}