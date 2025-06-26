<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use Barryvdh\DomPDF\Facade\Pdf;

class UserCetakController extends Controller
{
    public function cetakBerkas()
    {
        $pendaftar = Pendaftaran::where('user_id', auth()->id())->first();
    
        if (!$pendaftar) {
            return redirect()->route('daftar.create')->with('error', 'Data belum ditemukan. Silakan isi formulir pendaftaran terlebih dahulu.');
        }
    
        return view('adsiswa.cetak-berkas', compact('pendaftar'));
    }    

    public function cetakBerkasPDF($id)
    {
        $pendaftar = Pendaftaran::findOrFail($id);
    
        if ($pendaftar->user_id !== auth()->id()) {
            abort(403);
        }
    
        if ($pendaftar->status !== 'Diterima') {
            abort(403, 'Belum diterima');
        }
    
        $pdf = Pdf::loadView('adsiswa.cetak-berkas-pdf', compact('pendaftar'));
        return $pdf->stream('berkas-lengkap-' . $pendaftar->nomor_pendaftaran . '.pdf');
    }       

    public function cetakSuratPenerimaan($id)
    {
        $pendaftar = Pendaftaran::findOrFail($id);
    
        if ($pendaftar->user_id !== auth()->id()) {
            abort(403);
        }
    
        if ($pendaftar->status !== 'Diterima') {
            abort(403, 'Belum diterima');
        }
    
        $pdf = Pdf::loadView('adsiswa.surat-diterima', compact('pendaftar'));
        return $pdf->stream('Surat-Penerimaan-' . $pendaftar->nomor_pendaftaran . '.pdf');
    }    
}