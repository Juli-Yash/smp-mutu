<?php

namespace App\Exports;

use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PendaftaranExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Pendaftaran::all()->map(function ($item) {
            return [
                'nama' => $item->nama,
                'nisn' => $item->nisn,
                'asal_sekolah' => $item->asal_sekolah,
                'jenis_kelamin' => $item->jenis_kelamin,
                'nilai_skl' => $item->rata_rata_nilai_skl,
                'skl' => $this->checkFileExists($item->scan_skl),
                'akta' => $this->checkFileExists($item->scan_akta),
                'kk' => $this->checkFileExists($item->scan_kk),
                'piagam' => $this->checkFileExists($item->scan_piagam),
                'kip' => $this->checkFileExists($item->scan_kip),
                'status' => $item->status,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Nama',
            'NISN',
            'Asal Sekolah',
            'Jenis Kelamin',
            'Nilai Rata-rata SKL',
            'SKL',
            'Akta',
            'KK',
            'Piagam',
            'KIP/PKH',
            'Status',
        ];
    }

    private function checkFileExists($filePath)
    {
        return $filePath && Storage::disk('public')->exists($filePath) ? '✅' : '';
    }
}