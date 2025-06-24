<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use Barryvdh\DomPDF\Facade\Pdf;

class UserCetakController extends Controller
{
    public function cetakBerkasPDF($id)
    {
        $pendaftar = \App\Models\Pendaftaran::findOrFail($id);
        $pdf = PDF::loadView('adsiswa.cetak-berkas-pdf', compact('pendaftar'));
        return $pdf->stream('berkas-lengkap-'.$pendaftar->nomor_pendaftaran.'.pdf');
    }
    
    public function cetakSuratPenerimaan($id)
    {
        $pendaftar = \App\Models\Pendaftaran::findOrFail($id);
    
        if ($pendaftar->status !== 'Diterima') {
            abort(403, 'Belum diterima');
        }
    
        $pdf = PDF::loadView('adsiswa.surat-diterima', compact('pendaftar'));
        return $pdf->stream('Surat-Penerimaan-'.$pendaftar->nomor_pendaftaran.'.pdf');
    }
}