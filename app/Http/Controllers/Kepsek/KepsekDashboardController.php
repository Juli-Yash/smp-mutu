<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pendaftaran;
use Carbon\Carbon;
use App\Exports\PendaftaranExport;
use Maatwebsite\Excel\Facades\Excel;

class KepsekDashboardController extends Controller
{
    /**
     * Tampilkan dashboard untuk Kepsek.
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        if ($user->role !== 'kepsek') {
            abort(403, 'Unauthorized');
        }

        $query = Pendaftaran::query();
    
        if ($request->filled('jenis_kelamin')) {
            $query->where('jenis_kelamin', $request->jenis_kelamin);
        }
    
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
    
        $filteredData = $query->get();
    
        $totalPendaftar = $filteredData->count();
        $diterima = $filteredData->where('status', 'Diterima')->count();
        $ditolak = $filteredData->where('status', 'Ditolak')->count();
        $diproses = $filteredData->where('status', 'Diproses')->count();
    
        $jumlahLaki = $filteredData->where('jenis_kelamin', 'Laki-laki')->count();
        $jumlahPerempuan = $filteredData->where('jenis_kelamin', 'Perempuan')->count();
    
        $asalSekolahData = $filteredData
            ->groupBy('asal_sekolah')
            ->map(function ($items, $key) {
                return [
                    'asal_sekolah' => $key,
                    'total' => $items->count()
                ];
            })->values();
    
        $pesertaTerbaik = $filteredData
            ->sortByDesc('skor_akhir')
            ->values();
    
        return view('adkepsek.dashboard', compact(
            'totalPendaftar',
            'diterima',
            'ditolak',
            'diproses',
            'jumlahLaki',
            'jumlahPerempuan',
            'asalSekolahData',
            'pesertaTerbaik',
        )); 
    }

    public function hasil()
    {
        $pendaftars = Pendaftaran::select(
            'id',
            'nama',
            'jenis_kelamin',
            'nisn',
            'asal_sekolah',
            'alamat',
            'nilai_rata_rata_skl',
            'status',
            'scan_kk',
            'scan_piagam',
            'scan_akta',
            'scan_skl',
            'scan_kip',
            'catatan_penolakan',
            'verified_by_name'
        )->get();
    
        return view('adkepsek.data-calon-siswa', compact('pendaftars'));
    }

    public function exportExcel(Request $request)
    {
        $query = Pendaftaran::query();

        // Filter tanggal pendaftaran (created_at)
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        // Filter status (Diterima / Ditolak / Diproses)
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $filteredData = $query->get();

        $timestamp = Carbon::now()->format('Ymd_His');
        $filename = 'Rekap_Pendaftar_' . $timestamp . '.xlsx';

        return Excel::download(new PendaftaranExport($filteredData), $filename);
    }
}