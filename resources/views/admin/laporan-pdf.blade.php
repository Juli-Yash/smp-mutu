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

        /* Footer dua kolom */
        .footer-section {
            display: flex;
            justify-content: space-between;
            align-items: flex-start; 
            font-size: 11px;
            margin-top: 50px;
        }
        .footer-left {
            text-align: left;
        }
        .footer-right {
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

    @php
        $currentUser = auth()->check() ? auth()->user()->name : 'Administrator';
        $kepsek = \App\Models\User::where('role', 'kepsek')->first();
        $kepsekName = $kepsek ? $kepsek->name : 'Kepala Sekolah';
    @endphp

    <div class="footer-section">
        <!-- Kiri: info cetak -->
        <div class="footer-left">
            Dicetak oleh: {{ $currentUser }}<br>
            Tanggal Cetak: {{ now()->translatedFormat('d F Y, H:i') }}
        </div>

        <!-- Kanan: TTD Kepsek -->
        <div class="footer-right">
            Rowokele, {{ now()->translatedFormat('d F Y') }}<br>
            Kepala Sekolah<br><br><br>
            <strong>{{ $kepsekName }}</strong>
        </div>
    </div>

</body>
</html>