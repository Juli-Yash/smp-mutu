@extends('adsiswa.app')

@section('title', 'Siswa | Dashboard')

@section('content')
<section class="p-3 mt-2">

    <!-- HEADER DASHBOARD -->
    <div class="bg-white rounded shadow p-6">
        <h1 class="text-2xl font-bold mb-2">Dashboard Pengguna</h1>
        <p class="text-gray-700">
            Halo, {{ auth()->user()->name }} — Anda login sebagai 
            <span class="font-semibold">{{ auth()->user()->role }}</span>
        </p>
    </div>

    <hr class="border-t-2 border-gray-800 my-6">

    <!-- STATUS PENDAFTARAN & TINDAKAN LANJUT -->
    <div class="grid md:grid-cols-2 gap-6 mb-6">

        <!-- STATUS -->
        <div class="bg-white shadow rounded p-5">
            <h3 class="text-lg font-semibold mb-3">Status Pendaftaran</h3>

            @if ($pendaftar)
                <div class="text-center py-3 px-4 rounded-md
                    @if($pendaftar->status == 'Diterima') bg-green-600 text-white
                    @elseif($pendaftar->status == 'Ditolak') bg-red-100 text-red-700
                    @else bg-yellow-100 text-yellow-700 @endif">
                    
                    <span class="text-2xl font-semibold">
                        @if($pendaftar->status == 'Diterima') DITERIMA
                        @elseif($pendaftar->status == 'Ditolak') DITOLAK
                        @else DIPROSES
                        @endif
                    </span>
                </div>
            @else
                <p class="text-center text-gray-600">Anda belum mengisi formulir pendaftaran.</p>
            @endif        
        </div>

        <!-- TINDAKAN -->
        <div class="bg-white p-5 rounded shadow">
            <h3 class="text-lg font-semibold mb-3">Informasi Tindak Lanjut</h3>

            @if (!$pendaftar)
                <p class="text-gray-700 mb-3 text-center">
                    Silakan lengkapi formulir pendaftaran Anda melalui tombol di bawah ini.
                </p>
                <div class="text-center">
                    <a href="{{ route('daftar.create') }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded inline-block">
                        Isi Formulir Pendaftaran
                    </a>
                </div>

            @elseif ($pendaftar->status == 'Diterima')
                <p class="text-green-700 mb-3 text-center">
                    🎉 Selamat! Anda dinyatakan <strong>DITERIMA</strong>.<br>
                    Silakan cetak bukti pendaftaran dan ikuti tahap selanjutnya.
                </p>
                <div class="text-center">
                    <a href="{{ route('siswa.surat.pdf', $pendaftar->id) }}" target="_blank"
                       class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded inline-block">
                        Cetak Surat Penerimaan
                    </a>
                </div>

            @elseif ($pendaftar->status == 'Diproses')
                <p class="text-yellow-500 text-center">
                    ⏳ Pendaftaran Anda sedang <strong>Diproses</strong>.<br>
                    Mohon tunggu informasi selanjutnya dari panitia.
                </p>

            @elseif ($pendaftar->status == 'Ditolak')
                <p class="text-red-700 text-center">
                    ❌ Mohon maaf, Anda dinyatakan <strong>TIDAK LOLOS</strong> dalam seleksi.<br>
                    Jika ada pertanyaan, silakan hubungi panitia.
                </p>
            @endif
        </div>
    </div>

    <!-- DATA PENDAFTARAN -->
    @if ($pendaftar)
    <div class="gap-6 mb-6">
        <div class="bg-white p-5 rounded shadow">
            <h3 class="text-lg font-semibold mb-4">Data Pendaftaran Anda</h3>
            <ul class="text-gray-700 space-y-2">
                <li><strong>No. Pendaftaran:</strong> {{ $pendaftar->nomor_pendaftaran ?? '-' }}</li>
                <li><strong>NISN:</strong> {{ $pendaftar->nisn ?? '-' }}</li>
                <li><strong>Nama Lengkap:</strong> {{ $pendaftar->nama ?? '-' }}</li>
                <li><strong>Jenis Kelamin:</strong> {{ $pendaftar->jenis_kelamin ?? '-' }}</li>
                <li><strong>Asal Sekolah:</strong> {{ $pendaftar->asal_sekolah ?? '-' }}</li>
                <li><strong>Tanggal Daftar:</strong>
                    {{ $pendaftar->created_at ? $pendaftar->created_at->format('d M Y') : '-' }}
                </li>
            </ul>
        </div>
    </div>
    @endif

    <!-- INFORMASI PENTING & JADWAL -->
    <div class="bg-white p-5 rounded shadow">
        <h3 class="text-lg font-semibold mb-3">Informasi Penting & Jadwal Kegiatan PPDB</h3>
        
        <ul class="list-disc list-inside text-gray-700 space-y-1 mb-4">
            <li>Pastikan semua data pendaftaran Anda sudah benar.</li>
            <li>Status akan diperbarui secara otomatis oleh panitia.</li>
            <li>Update real-time juga dikirimkan langsung melalui WhatsApp.</li>
            <li>Jika mengalami kendala, harap hubungi admin melalui WhatsApp.</li>
        </ul>

        <h4 class="text-md font-semibold mb-4 text-gray-800">Jadwal Kegiatan:</h4>
        <ul class="list-inside text-sm text-gray-800 space-y-1">
            @php $now = \Carbon\Carbon::now(); @endphp
            @forelse ($jadwals as $jadwal)
                @php
                    $mulai = \Carbon\Carbon::parse($jadwal->tanggal_mulai);
                    $selesai = \Carbon\Carbon::parse($jadwal->tanggal_selesai);
                    $sedang = $now->between($mulai, $selesai);
                @endphp
                <li @if($sedang) class="font-bold text-blue-600" @endif>
                    <span class="font-medium">{{ $jadwal->tahapan }}:</span>
                    {{ $mulai->translatedFormat('d M Y') }} - {{ $selesai->translatedFormat('d M Y') }}
                </li>
            @empty
                <li>Belum ada jadwal yang tersedia saat ini.</li>
            @endforelse
        </ul>
    </div>
</section>
@endsection