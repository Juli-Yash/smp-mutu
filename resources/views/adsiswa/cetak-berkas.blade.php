@extends('adsiswa.app')

@section('title', 'Siswa | Cetak Berkas')

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
        <h5 class="h4 text-center mb-4">Informasi Hasil Seleksi Calon Peserta Didik</h5>

        @php
            $pendaftar = auth()->user()->pendaftaran;
        @endphp

        @if ($pendaftar && isset($pendaftar->nomor_pendaftaran))
            <div class="overflow-x-auto">
                <table class="min-w-[600px] w-full table-auto border border-gray-300 text-sm">
                    <tbody>
                        {{-- Informasi Umum --}}
                        <tr class="border-b"><th class="bg-gray-100 px-3 py-2 text-left">Nomor Pendaftaran</th><td class="px-3 py-2">{{ $pendaftar->nomor_pendaftaran }}</td></tr>
                        <tr class="border-b"><th class="bg-gray-100 px-3 py-2 text-left">Nama Lengkap</th><td class="px-3 py-2">{{ $pendaftar->nama }}</td></tr>
                        <tr class="border-b"><th class="bg-gray-100 px-3 py-2 text-left">Jenis Kelamin</th><td class="px-3 py-2">{{ $pendaftar->jenis_kelamin }}</td></tr>
                        <tr class="border-b"><th class="bg-gray-100 px-3 py-2 text-left">Tempat, Tanggal Lahir</th><td class="px-3 py-2">{{ $pendaftar->tempat_lahir }}, {{ \Carbon\Carbon::parse($pendaftar->tanggal_lahir)->format('d-m-Y') }}</td></tr>
                        <tr class="border-b"><th class="bg-gray-100 px-3 py-2 text-left">NISN</th><td class="px-3 py-2">{{ $pendaftar->nisn }}</td></tr>
                        <tr class="border-b"><th class="bg-gray-100 px-3 py-2 text-left">Agama</th><td class="px-3 py-2">{{ $pendaftar->agama }}</td></tr>
                        <tr class="border-b"><th class="bg-gray-100 px-3 py-2 text-left">Asal Sekolah</th><td class="px-3 py-2">{{ $pendaftar->asal_sekolah }}</td></tr>
                        <tr class="border-b"><th class="bg-gray-100 px-3 py-2 text-left">Jarak Tempat Tinggal (km)</th><td class="px-3 py-2">{{ $pendaftar->jarak_tempat_tinggal }}</td></tr>
                        <tr class="border-b"><th class="bg-gray-100 px-3 py-2 text-left">Nomor WhatsApp</th><td class="px-3 py-2">{{ $pendaftar->no_telp }}</td></tr>
                        <tr class="border-b"><th class="bg-gray-100 px-3 py-2 text-left">Pilihan Ekstrakurikuler</th><td class="px-3 py-2">{{ $pendaftar->pilihan_ekskul }}</td></tr>
                        <tr class="border-b"><th class="bg-gray-100 px-3 py-2 text-left">Alamat</th><td class="px-3 py-2">{{ $pendaftar->alamat }}</td></tr>

                        {{-- Nilai --}}
                        <tr class="border-b">
                            <th class="text-left px-3 py-2 bg-gray-100">Nilai Rata-rata SKL</th>
                            <td class="px-3 py-2">
                                <span class="badge 
                                    @if ($pendaftar->nilai_rata_rata_skl >= 80)
                                        bg-success
                                    @elseif ($pendaftar->nilai_rata_rata_skl >= 60)
                                        bg-warning
                                    @else
                                        bg-danger
                                    @endif">
                                    {{ $pendaftar->nilai_rata_rata_skl }}
                                </span>
                            </td>
                        </tr>

                        {{-- Dokumen Upload --}}
                        @php
                            $dokumens = [
                                'Scan SKL' => $pendaftar->scan_skl,
                                'Scan Akta Kelahiran' => $pendaftar->scan_akta,
                                'Scan Kartu Keluarga' => $pendaftar->scan_kk,
                                'Scan Piagam' => $pendaftar->scan_piagam,
                                'Scan KIP / PKH' => $pendaftar->scan_kip,
                            ];
                        @endphp
                        @foreach ($dokumens as $label => $value)
                            <tr class="border-b">
                                <th class="text-left px-3 py-2 bg-gray-100">{{ $label }}</th>
                                <td class="px-3 py-2">
                                    @if ($value)
                                        <i class="bi bi-check-circle-fill text-success fs-5"></i>
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger fs-5"></i>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                        {{-- Data Orang Tua --}}
                        <tr class="border-b"><th class="bg-gray-100 px-3 py-2 text-left">Nama Ibu</th><td class="px-3 py-2">{{ $pendaftar->nama_ibu }}</td></tr>
                        <tr class="border-b"><th class="bg-gray-100 px-3 py-2 text-left">Pendidikan Ibu</th><td class="px-3 py-2">{{ $pendaftar->pendidikan_ibu }}</td></tr>
                        <tr class="border-b"><th class="bg-gray-100 px-3 py-2 text-left">Pekerjaan Ibu</th><td class="px-3 py-2">{{ $pendaftar->pekerjaan_ibu }}</td></tr>
                        <tr class="border-b"><th class="bg-gray-100 px-3 py-2 text-left">Penghasilan Ibu</th><td class="px-3 py-2">Rp{{ number_format($pendaftar->penghasilan_ibu, 0, ',', '.') }}</td></tr>
                        <tr class="border-b"><th class="bg-gray-100 px-3 py-2 text-left">Nama Ayah</th><td class="px-3 py-2">{{ $pendaftar->nama_ayah }}</td></tr>
                        <tr class="border-b"><th class="bg-gray-100 px-3 py-2 text-left">Pendidikan Ayah</th><td class="px-3 py-2">{{ $pendaftar->pendidikan_ayah }}</td></tr>
                        <tr class="border-b"><th class="bg-gray-100 px-3 py-2 text-left">Pekerjaan Ayah</th><td class="px-3 py-2">{{ $pendaftar->pekerjaan_ayah }}</td></tr>
                        <tr class="border-b"><th class="bg-gray-100 px-3 py-2 text-left">Penghasilan Ayah</th><td class="px-3 py-2">Rp{{ number_format($pendaftar->penghasilan_ayah, 0, ',', '.') }}</td></tr>

                        {{-- Status Seleksi --}}
                        <tr>
                            <th class="text-left px-3 py-2 bg-gray-100">Status Seleksi</th>
                            <td class="px-3 py-2">
                                @if ($pendaftar->status === 'Diterima')
                                    <span class="inline-block px-2 py-1 text-xs font-semibold text-green-800 bg-green-200 rounded">Diterima</span>
                                @elseif ($pendaftar->status === 'Ditolak')
                                    <span class="inline-block px-2 py-1 text-xs font-semibold text-red-800 bg-red-200 rounded">Ditolak</span>
                                @else
                                    <span class="inline-block px-2 py-1 text-xs font-semibold text-yellow-800 bg-yellow-200 rounded">Diproses</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            {{-- Tombol Cetak --}}
            @if ($pendaftar->status === 'Diterima')
            <div class="mt-6 flex justify-center">
                <a href="{{ route('siswa.berkas.pdf', $pendaftar->id) }}" target="_blank"
                    class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded shadow transition duration-300 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 9V4h12v5M6 14H5a2 2 0 01-2-2V9a2 2 0 012-2h14a2 2 0 012 2v3a2 2 0 01-2 2h-1M6 14v5h12v-5" />
                    </svg>
                    Cetak Berkas
                </a>
            </div>            
            @else
                <div class="mt-6 text-center text-sm text-gray-500 italic">
                    Berkas hanya bisa dicetak setelah Anda dinyatakan <span class="font-semibold text-green-600">Diterima</span>.
                </div>
            @endif
        @endif
    </div>
</section>
@endsection

@push('scripts')
    <style>
        .badge {
            min-width: 60px;
            padding: 4px 8px;
            border-radius: 4px;
            color: #fff;
            font-weight: bold;
            text-align: center;
            display: inline-block;
        }
        .bg-success { background-color: #16a34a; }
        .bg-warning { background-color: #f59e0b; }
        .bg-danger  { background-color: #dc2626; }
    </style>
@endpush