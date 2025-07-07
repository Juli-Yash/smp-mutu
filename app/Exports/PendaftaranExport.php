<?php

namespace App\Exports;

use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class PendaftaranExport implements FromCollection, WithHeadings, WithTitle, WithStyles, WithEvents
{
    public function collection()
    {
        return Pendaftaran::all()->map(function ($item) {
            return [
                'nama' => $item->nama,
                'nisn' => $item->nisn,
                'asal_sekolah' => $item->asal_sekolah,
                'jenis_kelamin' => $item->jenis_kelamin,
                'nilai_skl' => $item->nilai_rata_rata_skl,
                'skl' => $this->checkFileExists($item->scan_skl),
                'akta' => $this->checkFileExists($item->scan_akta),
                'kk' => $this->checkFileExists($item->scan_kk),
                'piagam' => $this->checkFileExists($item->scan_piagam),
                'kip' => $this->checkFileExists($item->scan_kip),
                'status' => $item->status,
                'catatan_penolakan' => $item->catatan_penolakan,
                'verified_by_name' => $item->verified_by_name,
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
            'Catatan Penolakan',
            'Verifikator',
        ];
    }

    public function title(): string
    {
        return 'Data Pendaftaran';
    }

    public function styles(Worksheet $sheet)
    {
        return [];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet;

                // Tambahkan baris awal untuk logo dan kop
                $sheet->insertNewRowBefore(1, 5);

                // Tambahkan logo di G1–H3 (tengah)
                $drawing = new Drawing();
                $drawing->setName('Logo Sekolah');
                $drawing->setDescription('Logo');
                $drawing->setPath(public_path('logo-sekolah.png')); // Pastikan file ada
                $drawing->setHeight(80);
                $drawing->setCoordinates('G1');
                $drawing->setOffsetX(10);
                $drawing->setOffsetY(5);
                $drawing->setWorksheet($sheet->getDelegate());
                $sheet->mergeCells('G1:H3');

                // Isi kop di baris 5–7
                $sheet->setCellValue('A5', 'DATA PENDAFTAR SISWA');
                $sheet->setCellValue('A6', 'SMP MUHAMMADIYAH 1 ROWOKELE');
                $sheet->setCellValue('A7', 'Dk. Panjatan. RT.01/RW.06 Desa Sukomulyo Kec. Rowokele | Email. smpmutu.rowokele@gmail.com');

                foreach ([5, 6, 7] as $row) {
                    $sheet->mergeCells("A{$row}:M{$row}");
                    $sheet->getStyle("A{$row}")->getAlignment()->setHorizontal('center');
                }

                $sheet->getStyle('A5')->applyFromArray(['font' => ['bold' => true, 'size' => 14]]);
                $sheet->getStyle('A6')->applyFromArray(['font' => ['bold' => true, 'size' => 12]]);
                $sheet->getStyle('A7')->applyFromArray(['font' => ['size' => 11]]);

                // Header tabel baris 8
                $sheet->getStyle('A8:M8')->applyFromArray([
                    'font' => ['bold' => true],
                    'alignment' => ['horizontal' => 'left'],
                ]);

                // Hitung data dan tentukan batas baris
                $dataRowCount = Pendaftaran::count();
                $lastRow = 8 + $dataRowCount;

                // Border seluruh tabel
                $sheet->getStyle("A8:M{$lastRow}")->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);

                // Tanggal cetak dan nama admin login
                $footerRow = $lastRow + 2;
                $adminName = auth()->check() ? auth()->user()->name : 'Administrator';
                $sheet->setCellValue("A{$footerRow}", 'Tanggal Cetak: ' . now()->translatedFormat('d F Y'));
                $sheet->setCellValue("A" . ($footerRow + 1), 'Dicetak oleh: ' . $adminName);
                $sheet->mergeCells("A{$footerRow}:F{$footerRow}");
                $sheet->mergeCells("A" . ($footerRow + 1) . ":F" . ($footerRow + 1));
                $sheet->getStyle("A{$footerRow}:A" . ($footerRow + 1))->applyFromArray([
                    'font' => ['italic' => true, 'size' => 11],
                ]);

                // Tanda tangan kepala sekolah
                $ttdRow = $footerRow + 3;
                $sheet->setCellValue("K{$ttdRow}", 'Rowokele, ' . now()->translatedFormat('d F Y'));
                $sheet->setCellValue("K" . ($ttdRow + 1), 'Kepala Sekolah');
                $sheet->setCellValue("K" . ($ttdRow + 5), $adminName);
                $sheet->mergeCells("K{$ttdRow}:M{$ttdRow}");
                $sheet->mergeCells("K" . ($ttdRow + 1) . ":M" . ($ttdRow + 1));
                $sheet->mergeCells("K" . ($ttdRow + 5) . ":M" . ($ttdRow + 5));
                $sheet->getStyle("K{$ttdRow}:M" . ($ttdRow + 5))->applyFromArray([
                    'font' => ['size' => 11],
                    'alignment' => ['horizontal' => 'center'],
                ]);

                // Auto-size semua kolom
                foreach (range('A', 'M') as $col) {
                    $sheet->getDelegate()->getColumnDimension($col)->setAutoSize(true);
                }
            },
        ];
    }

    private function checkFileExists($filePath)
    {
        return $filePath && Storage::disk('public')->exists($filePath) ? '✅' : 'Kosong';
    }
}