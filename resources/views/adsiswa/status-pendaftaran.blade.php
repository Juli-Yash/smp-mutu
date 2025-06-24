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
        </div>

        {{-- TINDAKAN BERIKUTNYA --}}
        <div class="mt-6 p-4 rounded border bg-gray-50 text-center">
            @if ($pendaftar->status == 'Diterima')
                <p class="text-green-700 mb-3 leading-relaxed">
                    🎉 Selamat! Anda dinyatakan <strong>DITERIMA</strong>.<br>
                    Silakan cetak bukti pendaftaran dan ikuti tahap selanjutnya.
                </p>
                <a href="{{ route('siswa.surat.pdf', $pendaftar->id) }}" target="_blank"
                   class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded shadow transition duration-300 inline-block">
                    Cetak Surat Penerimaan
                </a>
            @elseif ($pendaftar->status == 'Ditolak')
                <p class="text-red-700 leading-relaxed">
                    ❌ Mohon maaf, Anda <strong>TIDAK LOLOS</strong> dalam seleksi.<br>
                    Silakan hubungi panitia jika ada pertanyaan lebih lanjut.
                </p>
            @else
                <p class="text-yellow-700 leading-relaxed">
                    ⏳ Data Anda sedang dalam <strong>proses verifikasi</strong>.<br>
                    Silakan tunggu informasi lebih lanjut dari panitia.
                </p>
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