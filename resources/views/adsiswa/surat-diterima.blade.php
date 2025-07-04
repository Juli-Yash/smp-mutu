<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Pernyataan Diterima - {{ $pendaftar->nama }}</title>
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
        .content {
            text-align: justify;
        }
        .data-table {
            width: 100%;
            margin: 10px 0 20px;
        }
        .data-table td {
            padding: 3px 0;
            vertical-align: top;
        }
        .footer {
            margin-top: 40px;
            text-align: right;
        }
        .signature {
            margin-top: 60px;
        }
    </style>
</head>
<body>
    <!-- Header Tengah -->
    <div class="header">
        <img src="{{ public_path('logo-sekolah.png') }}" alt="Logo Sekolah">
        <h2 style="margin: 0;">SMP MUHAMMADIYAH 1 ROWOKELE</h2>
        <h3 style="margin: 2px 0;">Tahun Ajaran {{ now()->year }}/{{ now()->addYear()->year }}</h3>
        <p style="margin: 2px 0;">Dk. Panjatan, Sukomulwo. Kec. Rowokele. Kebumen | Telp. (0287) 123456</p>
    </div>

    <!-- Isi Surat -->
    <div class="content">
        <h3 style="text-align: center">SURAT PERNYATAAN PENERIMAAN</h3>
        <p>Yang bertanda tangan di bawah ini menyatakan bahwa:</p>

        <table class="data-table">
            <tr><td style="width: 200px;"><strong>Nama</strong></td><td>: {{ $pendaftar->user->name }}</td></tr>
            <tr><td><strong>NISN</strong></td><td>: {{ $pendaftar->nisn }}</td></tr>
            <tr><td><strong>Jenis Kelamin</strong></td><td>: {{ $pendaftar->jenis_kelamin }}</td></tr>
            <tr><td><strong>Tempat, Tanggal Lahir</strong></td>
                <td>: {{ $pendaftar->tempat_lahir }}, {{ \Carbon\Carbon::parse($pendaftar->tanggal_lahir)->translatedFormat('d F Y') }}</td>
            </tr>
            <tr><td><strong>Alamat</strong></td><td>: {{ $pendaftar->alamat }}</td></tr>
            <tr><td><strong>No. HP Ortu</strong></td><td>: {{ $pendaftar->no_telp }}</td></tr>
        </table>

        <p>
            Telah <strong>DITERIMA</strong> sebagai calon peserta didik baru di <strong>SMP Muhammadiyah 1 Rowokele</strong>
            Tahun Ajaran <strong>{{ now()->year }}/{{ now()->addYear()->year }}</strong>.
        </p>

        <p>Demikian surat ini dibuat dengan sebenar-benarnya untuk dipergunakan sebagaimana mestinya.</p>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>Rowokele, {{ now()->translatedFormat('d F Y') }}</p>
        <p><strong>Panitia PPDB</strong></p>
        <div class="signature">
            <p><strong>Admin Verifikator: {{ $pendaftar->verified_by_name }}</strong></p>
        </div>
    </div>

</body>
</html>