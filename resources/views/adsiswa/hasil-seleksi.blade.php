@extends('adsiswa.app')

@section('title', 'Siswa | Hasil Seleksi')

@section('content')
<section class="p-3 mt-2">
    <div class="bg-white rounded shadow p-6">
        <h1 class="text-2xl font-bold mb-2">Dashboard Pengguna</h1>
        <p class="text-gray-700">Halo, {{ auth()->user()->name }} — Anda login sebagai <span class="font-semibold">{{ auth()->user()->role }}</span></p>
    </div>

    <hr class="border-t-2 border-gray-800 my-6">

    <!-- Tabel Hasil Seleksi -->
    <div class="card">
        <div class="card-body">
            <h5 class="h4 text-center mb-3">Rekap Data Calon Siswa</h5>

            <div class="table-responsive">
                <table class="table table-sm table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center align-middle">No</th>
                            <th class="text-center align-middle">Nama</th>
                            <th class="text-center align-middle">Jenis Kelamin</th>
                            <th class="text-center align-middle">NISN</th>
                            <th class="text-center align-middle">Asal Sekolah</th>
                            <th class="text-center align-middle">Alamat</th>
                            <th class="text-center align-middle">Nilai Rata-rata SKL</th>
                            <th class="text-center align-middle">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendaftars as $index => $pendaftar)
                        @php $status = strtolower($pendaftar->status); @endphp
                        <tr>
                            <td class="text-center align-middle">{{ $index + 1 }}</td>
                            <td class="text-center align-middle">{{ $pendaftar->nama }}</td>
                            <td class="text-center align-middle">{{ $pendaftar->jenis_kelamin }}</td>
                            <td class="text-center align-middle">{{ $pendaftar->nisn }}</td>
                            <td class="text-center align-middle">{{ $pendaftar->asal_sekolah }}</td>
                            <td class="text-center align-middle">{{ $pendaftar->alamat }}</td>
                    
                            <!-- Nilai Rata-rata SKL -->
                            <td class="text-center align-middle">
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
                    
                            <!-- Status Seleksi -->
                            <td class="text-center align-middle">
                                @if ($status === 'diproses')
                                    <span class="inline-block px-2 py-1 text-xs font-semibold text-orange-800 bg-orange-200 rounded">Diproses</span>
                                @elseif ($status === 'diterima')
                                    <span class="inline-block px-2 py-1 text-xs font-semibold text-green-800 bg-green-200 rounded">Diterima</span>
                                @elseif ($status === 'ditolak')
                                    <span class="inline-block px-2 py-1 text-xs font-semibold text-red-800 bg-red-200 rounded">Ditolak</span>
                                @else
                                    <span class="inline-block px-2 py-1 text-xs font-semibold text-gray-800 bg-gray-200 rounded">
                                        {{ ucfirst($pendaftar->status) }}
                                    </span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>                    
                </table>
            </div>              
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                paginate: {
                    previous: "Sebelumnya",
                    next: "Berikutnya"
                },
                zeroRecords: "Data tidak ditemukan",
            }
        });
    });
</script>
@endpush    