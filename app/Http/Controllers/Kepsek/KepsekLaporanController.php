<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class KepsekLaporanController extends Controller
{
    public function laporan()
    {
        return view('adkepsek.laporan');
    }

    public function cetak(Request $request)
    {
        $periode = $request->periode;
        $status = $request->status;
        $tahun = $request->tahun;
    
        $query = Pendaftaran::query();
    
        if ($periode === 'harian') {

            $tanggal = $request->tanggal;
            if ($tanggal) {
                $query->whereDate('created_at', $tanggal);
            }
        } elseif ($periode === 'mingguan') {

            $minggu = $request->minggu;
            if ($minggu) {
                try {

                    $startOfWeek = Carbon::parse($minggu)->startOfWeek(Carbon::MONDAY);
                    $endOfWeek = Carbon::parse($minggu)->endOfWeek(Carbon::SUNDAY);
                    $query->whereBetween('created_at', [$startOfWeek, $endOfWeek]);
                } catch (\Exception $e) {
                    return back()->with('error', 'Format minggu tidak valid.');
                }
            }
        } elseif ($periode === 'bulanan') {

            $bulan = $request->bulan;
            if ($bulan && $tahun) {
                $query->whereYear('created_at', $tahun)->whereMonth('created_at', $bulan);
            }
        } elseif ($periode === 'tahunan') {

            if ($tahun) {
                $query->whereYear('created_at', $tahun);
            }
        }
    
        if ($status !== 'semua') {
            $query->where('status', $status);
        }
    
        $pendaftar = $query->orderBy('created_at', 'desc')->get();
    
        $pdf = Pdf::loadView('adkepsek.laporan-pdf', compact('pendaftar', 'periode', 'status'));
        return $pdf->stream('laporan-ppdb.pdf');
    }    
}