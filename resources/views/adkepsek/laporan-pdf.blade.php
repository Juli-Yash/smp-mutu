<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan PPDB</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 30px;
        }
        .header {
            text-align: center;
            margin-bottom: 10px;
        }
        .header img {
            width: 80px;
            height: auto;
            margin-bottom: 10px;
        }
        h2, h4 {
            margin: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th {
            background-color: #eee;
        }
        th, td {
            padding: 6px;
            text-align: left;
        }
        .info {
            margin-top: 20px;
        }
        .footer-info {
            margin-top: 30px;
            font-size: 11px;
            text-align: right;
        }
    </style>
</head>
<body>

    <div class="header">
        <img src="{{ public_path('logo-sekolah.png') }}" alt="Logo Sekolah">
        <h2>Laporan Pendaftaran Peserta Didik Baru</h2>
        <h4>SMP Muhammadiyah 1 Rowokele</h4>
    </div>

    <div class="info">
        <strong>Periode:</strong>
        @switch($periode)
            @case('harian')
                Harian - Tanggal: {{ request('tanggal') }}
                @break
            @case('mingguan')
                Mingguan - Minggu ke: {{ request('minggu') }}
                @break
            @case('bulanan')
                Bulan: {{ DateTime::createFromFormat('!m', request('bulan'))->format('F') }} {{ request('tahun') }}
                @break
            @case('tahunan')
                Tahun: {{ request('tahun') }}
                @break
        @endswitch
        <br>
        <strong>Status:</strong> 
        {{ ucfirst(request('status') === 'semua' ? 'Semua' : request('status')) }}
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>NISN</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Daftar</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pendaftar as $i => $p)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->nisn }}</td>
                    <td>{{ $p->jenis_kelamin }}</td>
                    <td>{{ \Carbon\Carbon::parse($p->created_at)->format('d-m-Y') }}</td>
                    <td>{{ ucfirst($p->status) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">Tidak ada data tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer-info">
        Dicetak oleh: {{ auth()->user()->name }}<br>
        Tanggal Cetak: {{ now()->translatedFormat('d F Y, H:i') }}
    </div>

</body>
</html>