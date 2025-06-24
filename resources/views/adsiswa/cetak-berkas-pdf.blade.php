<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Berkas Pendaftaran - {{ $pendaftar->nama }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 11px;
            margin: 10mm 15mm;
        }
        .header {
            text-align: center;
            border-bottom: 1.5px solid #000;
            margin-bottom: 8px;
            padding-bottom: 8px;
        }
        .header img {
            height: 60px;
            margin-bottom: 12px;
        }
        .header h2 {
            margin: 0px;
            font-size: 14pt;
        }
        .title {
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            margin: 8px 0;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
        }
        .table td, .table th {
            border: 1px solid #444;
            padding: 4px 6px;
            vertical-align: top;
        }
        .table th {
            background-color: #f2f2f2;
            text-align: left;
            width: 50%;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('logo-sekolah.png') }}" alt="Logo Sekolah">
        <h2 style="margin: 0;">SMP MUHAMMADIYAH 1 ROWOKELE</h2>
        <h3 style="margin: 2px 0;">Tahun Ajaran {{ now()->year }}/{{ now()->addYear()->year }}</h3>
        <p style="margin: 2px 0;">Dk. Panjatan, Sukomulwo. Kec. Rowokele. Kebumen | Telp. (0287) 123456</p>
    </div>

    <div class="title">
        FORMULIR DATA PENDAFTAR<br>PPDB SMP MUHAMMADIYAH 1 ROWOKELE
    </div>

    <table class="table">
        <tbody>
            <tr><th>Nomor Pendaftaran</th><td>{{ $pendaftar->nomor_pendaftaran }}</td></tr>
            <tr><th>Nama Lengkap</th><td>{{ $pendaftar->nama }}</td></tr>
            <tr><th>Jenis Kelamin</th><td>{{ $pendaftar->jenis_kelamin }}</td></tr>
            <tr><th>Tempat, Tanggal Lahir</th><td>{{ $pendaftar->tempat_lahir }}, {{ \Carbon\Carbon::parse($pendaftar->tanggal_lahir)->translatedFormat('d F Y') }}</td></tr>
            <tr><th>NISN</th><td>{{ $pendaftar->nisn }}</td></tr>
            <tr><th>Agama</th><td>{{ $pendaftar->agama }}</td></tr>
            <tr><th>Asal Sekolah</th><td>{{ $pendaftar->asal_sekolah }}</td></tr>
            <tr><th>Alamat</th><td>{{ $pendaftar->alamat }}</td></tr>
            <tr><th>No WhatsApp</th><td>{{ $pendaftar->no_telp }}</td></tr>
            <tr><th>Pilihan Ekskul</th><td>{{ $pendaftar->pilihan_ekskul }}</td></tr>
            <tr><th>Nilai Rata-Rata SKL</th><td>{{ $pendaftar->nilai_rata_rata_skl }}</td></tr>
            <tr><th>Status Seleksi</th><td>{{ $pendaftar->status }}</td></tr>
            <tr><th>Scan SKL</th><td>{{ $pendaftar->scan_skl ? 'Ada' : 'Tidak Ada' }}</td></tr>
            <tr><th>Scan Akta</th><td>{{ $pendaftar->scan_akta ? 'Ada' : 'Tidak Ada' }}</td></tr>
            <tr><th>Scan KK</th><td>{{ $pendaftar->scan_kk ? 'Ada' : 'Tidak Ada' }}</td></tr>
            <tr><th>Scan Piagam</th><td>{{ $pendaftar->scan_piagam ? 'Ada' : 'Tidak Ada' }}</td></tr>
            <tr><th>Scan KIP / PKH</th><td>{{ $pendaftar->scan_kip ? 'Ada' : 'Tidak Ada' }}</td></tr>
            <tr><th>Nama Ayah</th><td>{{ $pendaftar->nama_ayah }}</td></tr>
            <tr><th>Pendidikan Ayah</th><td>{{ $pendaftar->pendidikan_ayah }}</td></tr>
            <tr><th>Pekerjaan Ayah</th><td>{{ $pendaftar->pekerjaan_ayah }}</td></tr>
            <tr><th>Penghasilan Ayah</th><td>Rp{{ number_format($pendaftar->penghasilan_ayah, 0, ',', '.') }}</td></tr>
            <tr><th>Nama Ibu</th><td>{{ $pendaftar->nama_ibu }}</td></tr>
            <tr><th>Pendidikan Ibu</th><td>{{ $pendaftar->pendidikan_ibu }}</td></tr>
            <tr><th>Pekerjaan Ibu</th><td>{{ $pendaftar->pekerjaan_ibu }}</td></tr>
            <tr><th>Penghasilan Ibu</th><td>Rp{{ number_format($pendaftar->penghasilan_ibu, 0, ',', '.') }}</td></tr>
        </tbody>
    </table>

</body>
</html>