@extends('adsiswa.app')

@section('title', 'Status Pendaftaran')

@section('content')
<section class="p-3 mt-2">
    <div class="bg-white rounded shadow p-6">
        <h1 class="text-2xl font-bold mb-2">Dashboard Pengguna</h1>
        <p class="text-gray-700">
            Halo, {{ auth()->user()->name }} — Anda login sebagai 
            <span class="font-semibold">{{ auth()->user()->role }}</span>
        </p>
    </div>

    <hr class="border-t-2 border-gray-800 my-6">

    <div class="bg-white rounded shadow p-6">
        <h5 class="text-xl font-semibold text-center mb-4">Status Pendaftaran Calon Siswa</h5>

        @php
            $pendaftar = auth()->user()->pendaftaran;
        @endphp

        @if($pendaftar)
        <div class="space-y-2 text-gray-800 text-sm sm:text-base">
            <div><span class="font-semibold">No. Pendaftaran:</span> {{ $pendaftar->nomor_pendaftaran }}</div>
            <div><span class="font-semibold">NISN:</span> {{ $pendaftar->nisn }}</div>
            <div><span class="font-semibold">Nama Lengkap:</span> {{ $pendaftar->nama }}</div>
            <div><span class="font-semibold">Jenis Kelamin:</span> {{ $pendaftar->jenis_kelamin }}</div>
            <div><span class="font-semibold">Asal Sekolah:</span> {{ $pendaftar->asal_sekolah }}</div>
            <div><span class="font-semibold">Tanggal Daftar:</span> {{ $pendaftar->created_at->format('d M Y') }}</div>
            <div>
                <span class="font-semibold">Status:</span>
                @if($pendaftar->status == 'Diterima')
                    <span class="text-green-600 font-bold">Diterima</span>
                @elseif($pendaftar->status == 'Ditolak')
                    <span class="text-red-600 font-bold">Ditolak</span>
                @else
                    <span class="text-yellow-600 font-bold">Menunggu Verifikasi</span>
                @endif
            </div>
            @if ($pendaftar->status === 'Ditolak')
            <div>
                <span class="font-semibold">Catatan Penolakan:</span>
                <span class="text-red-600 italic">{{ $pendaftar->catatan_penolakan }}</span>
            </div>
            @endif                          
        </div>

        {{-- TINDAKAN BERIKUTNYA --}}
        <div class="mt-6 p-4 rounded border bg-gray-50 text-center">
            @if ($pendaftar->status == 'Diterima')
                <div class="text-green-700 mb-3 leading-relaxed flex flex-col items-center gap-2">
                    <!-- Heroicon check-circle -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2l4 -4M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10s-4.477 10 -10 10z" />
                    </svg>
                    <p>
                        <strong>Selamat!</strong> Anda dinyatakan <strong>DITERIMA</strong>.<br>
                        Silakan cetak bukti pendaftaran dan ikuti tahap selanjutnya.
                    </p>
                </div>
                <a href="{{ route('siswa.surat.pdf', $pendaftar->id) }}" target="_blank"
                   class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded shadow transition duration-300 inline-flex items-center gap-2">
                    <!-- Heroicon printer -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9V4h12v5M6 14H5a2 2 0 01-2-2V9a2 2 0 012-2h14a2 2 0 012 2v3a2 2 0 01-2 2h-1M6 14v5h12v-5" />
                    </svg>
                    Cetak Surat Penerimaan
                </a>
            @elseif ($pendaftar->status == 'Ditolak')
                <div class="text-red-700 leading-relaxed flex flex-col items-center gap-2">
                    <!-- Heroicon x-circle -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M12 12l3-3m-3 3l-3-3M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10s-4.477 10 -10 10z" />
                    </svg>
                    <p>
                        <strong>Mohon maaf</strong>, Anda dinyatakan <strong>TIDAK LOLOS</strong>.<br>
                        Silakan hubungi panitia jika ada pertanyaan lebih lanjut.
                    </p>
                </div>
            @else
                <div class="text-yellow-700 leading-relaxed flex flex-col items-center gap-2">
                    <!-- Heroicon clock -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6l4 2M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10s-4.477 10 -10 10z" />
                    </svg>
                    <p>
                        Data Anda sedang dalam <strong>proses verifikasi</strong>.<br>
                        Silakan tunggu informasi lebih lanjut dari panitia.
                    </p>
                </div>
            @endif
        </div>               
        @else
        <div class="text-center text-gray-600">
            <p class="mb-4">Anda belum melakukan pendaftaran.</p>
            <a href="{{ route('daftar.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded shadow transition duration-300 inline-block">
                Isi Formulir Pendaftaran
            </a>
        </div>
        @endif
    </div>
</section>
@endsection