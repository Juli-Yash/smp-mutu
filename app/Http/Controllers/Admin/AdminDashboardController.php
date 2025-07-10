<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PendaftaranExport;
use App\Models\Pendaftaran;
use Carbon\Carbon;


class AdminDashboardController extends Controller
{
    /**
     * Tampilkan dashboard untuk Admin.
     */
    public function index(Request $request)
    {
        // Auth
        $user = Auth::user();

        if ($user->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        // Query awal
        $query = Pendaftaran::query();
    
        // Filter berdasarkan request input (jika ada)
        if ($request->filled('jenis_kelamin')) {
            $query->where('jenis_kelamin', $request->jenis_kelamin);
        }
    
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
    
        // Ambil hasil query yang telah difilter
        $filteredData = $query->get();
    
        // Hitung total berdasarkan hasil filter
        $totalPendaftar = $filteredData->count();
        $diterima = $filteredData->where('status', 'Diterima')->count();
        $ditolak = $filteredData->where('status', 'Ditolak')->count();
        $diproses = $filteredData->where('status', 'Diproses')->count();
    
        // Hitung berdasarkan jenis kelamin
        $jumlahLaki = $filteredData->where('jenis_kelamin', 'Laki-laki')->count();
        $jumlahPerempuan = $filteredData->where('jenis_kelamin', 'Perempuan')->count();
    
        // Hitung jumlah pendaftar per asal sekolah
        $asalSekolahData = $filteredData
            ->groupBy('asal_sekolah')
            ->map(function ($items, $key) {
                return [
                    'asal_sekolah' => $key,
                    'total' => $items->count()
                ];
            })->values();
        
        // Ambil data peserta terbaik berdasarkan skor_akhir (sudah difilter)
        $pesertaTerbaik = $filteredData
            ->sortByDesc('skor_akhir')
            ->values();
    
        return view('admin.dashboard', compact(
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
    
        return view('admin.data-siswa.index', compact('pendaftars'));
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