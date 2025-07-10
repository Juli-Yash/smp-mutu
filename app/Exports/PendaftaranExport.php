<?php

namespace App\Exports;

use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class PendaftaranExport implements FromArray, WithTitle, WithEvents, WithCustomStartCell
{
    private $dataArray = [];

    public function __construct($filteredData)
    {
        $this->prepareData($filteredData);
    }

    public function array(): array
    {
        return $this->dataArray;
    }

    public function title(): string
    {
        return 'Data Pendaftaran';
    }

    public function startCell(): string
    {
        return 'A8'; // Data akan dimulai dari A8
    }

    private function prepareData($data)
    {
        $no = 1;
        $this->dataArray[] = [
            'No',
            'Nama',
            'NISN',
            'Asal Sekolah',
            'Jenis Kelamin',
            'Nilai SKL',
            'SKL',
            'Akta',
            'KK',
            'Piagam',
            'KIP/PKH',
            'Status',
            'Catatan',
            'Verifikator',
        ];

        foreach ($data as $item) {
            $this->dataArray[] = [
                $no++,
                $item->nama,
                $item->nisn,
                $item->asal_sekolah,
                $item->jenis_kelamin,
                $item->nilai_rata_rata_skl,
                $this->checkFileExists($item->scan_skl),
                $this->checkFileExists($item->scan_akta),
                $this->checkFileExists($item->scan_kk),
                $this->checkFileExists($item->scan_piagam),
                $this->checkFileExists($item->scan_kip),
                $item->status,
                $item->catatan_penolakan,
                $item->verified_by_name,
            ];
        }
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $rowCount = count($this->dataArray);
                $endDataRow = 8 + $rowCount - 1;

                // Logo
                $drawing = new Drawing();
                $drawing->setName('Logo Sekolah');
                $drawing->setDescription('Logo Sekolah');
                $drawing->setPath(public_path('logo-sekolah.png'));
                $drawing->setHeight(80);
                $drawing->setCoordinates('G1');
                $drawing->setWorksheet($sheet);
                $sheet->mergeCells('G1:H3');

                // Header
                $sheet->setCellValue('A5', 'DATA PENDAFTAR SISWA');
                $sheet->setCellValue('A6', 'SMP MUHAMMADIYAH 1 ROWOKELE');
                $sheet->setCellValue('A7', 'Dk. Panjatan. RT.01/RW.06 Desa Sukomulyo Kec. Rowokele | Email. smpmutu.rowokele@gmail.com');
                foreach ([5, 6, 7] as $row) {
                    $sheet->mergeCells("A{$row}:N{$row}");
                    $sheet->getStyle("A{$row}")->getAlignment()->setHorizontal('center');
                }

                $sheet->getStyle('A5')->getFont()->setBold(true)->setSize(14);
                $sheet->getStyle('A6')->getFont()->setBold(true)->setSize(12);
                $sheet->getStyle('A7')->getFont()->setSize(11);

                // Header tabel
                $sheet->getStyle("A8:N8")->applyFromArray([
                    'font' => ['bold' => true],
                    'alignment' => ['horizontal' => 'center'],
                    'borders' => ['allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]],
                ]);

                // Border isi
                $sheet->getStyle("A8:N{$endDataRow}")->applyFromArray([
                    'borders' => ['allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]],
                ]);

                // Footer
                $footerRow = $endDataRow + 2;

                
                // User yang sedang login (dicetak oleh siapa)
                $currentUser = auth()->check() ? auth()->user()->name : 'Administrator';

                // Kepala sekolah tetap (untuk tanda tangan)
                $kepsekUser = \App\Models\User::where('role', 'kepsek')->first();
                $kepsekName = $kepsekUser ? $kepsekUser->name : 'Kepala Sekolah';

                $today = now()->translatedFormat('d F Y');

                // Footer kiri: info cetak
                $sheet->setCellValue("A{$footerRow}", 'Tanggal Cetak: ' . $today);
                $sheet->setCellValue("A" . ($footerRow + 1), 'Dicetak oleh: ' . $currentUser);
                $sheet->mergeCells("A{$footerRow}:F{$footerRow}");
                $sheet->mergeCells("A" . ($footerRow + 1) . ":F" . ($footerRow + 1));
                $sheet->getStyle("A{$footerRow}:A" . ($footerRow + 1))->getFont()->setItalic(true)->setSize(11);

                // Footer kanan: TTD Kepsek
                $ttdRow = $footerRow;
                $sheet->setCellValue("K{$ttdRow}", 'Rowokele, ' . $today);
                $sheet->setCellValue("K" . ($ttdRow + 1), 'Kepala Sekolah');
                $sheet->setCellValue("K" . ($ttdRow + 5), $kepsekName);
                $sheet->mergeCells("K{$ttdRow}:N{$ttdRow}");
                $sheet->mergeCells("K" . ($ttdRow + 1) . ":N" . ($ttdRow + 1));
                $sheet->mergeCells("K" . ($ttdRow + 5) . ":N" . ($ttdRow + 5));
                $sheet->getStyle("K{$ttdRow}:N" . ($ttdRow + 5))->getAlignment()->setHorizontal('center');

                foreach (range('A', 'N') as $col) {
                    $sheet->getColumnDimension($col)->setAutoSize(true);
                }
            },
        ];
    }

    private function checkFileExists($filePath)
    {
        return $filePath && Storage::disk('public')->exists($filePath) ? '✅' : 'Kosong';
    }
}