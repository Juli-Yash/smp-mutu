@extends('admin.app')

@section('title', 'Admin | Dasboard')

@section('content')
<section class="p-3 mt-2">
    <div class="bg-white rounded shadow p-6">
        <h1 class="text-2xl font-bold mb-2">Dashboard Admin</h1>
        <p class="text-gray-700">Halo, {{ auth()->user()->name }} — Anda login sebagai <span class="font-semibold">{{ auth()->user()->role }}</span></p>
    </div>

    <hr class="border-t-2 border-gray-800 my-6">

    <!-- Filter -->
    <div class="bg-white rounded-lg p-5 shadow mb-6">
        <h3 class="text-lg font-semibold mb-4">Filter Data</h3>
        <form action="{{ route('admin.dashboard') }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
            <!-- Filter Jenis Kelamin -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="w-full border-gray-300 rounded-lg shadow-sm">
                    <option value="">Semua</option>
                    <option value="Laki-laki" {{ request('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ request('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <!-- Filter Status -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" class="w-full border-gray-300 rounded-lg shadow-sm">
                    <option value="">Semua</option>
                    <option value="Diproses" {{ request('status') == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="Diterima" {{ request('status') == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                    <option value="Ditolak" {{ request('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
            </div>

            <!-- Tombol Cari -->
            <div>
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                    Cari
                </button>
            </div>
        </form>
    </div>

    <h2 class="text-xl font-semibold text-gray-800 mb-4">Data Pendaftaran</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        {{-- Total Pendaftar --}}
        <div class="bg-blue-600 text-white rounded-lg p-5 shadow">
            <h3 class="text-lg font-medium">Total Pendaftar</h3>
            <p class="text-3xl font-bold mt-2">{{ $totalPendaftar }} Siswa</p>
        </div>

        {{-- Diterima --}}
        <div class="bg-green-600 text-white rounded-lg p-5 shadow">
            <h3 class="text-lg font-medium">Diterima</h3>
            <p class="text-3xl font-bold mt-2">{{ $diterima }} Siswa</p>
        </div>

        {{-- Diproses --}}
        <div class="bg-yellow-500 text-white rounded-lg p-5 shadow">
            <h3 class="text-lg font-medium">Diproses</h3>
            <p class="text-3xl font-bold mt-2">{{ $diproses }} Siswa</p>
        </div>

        {{-- Ditolak --}}
        <div class="bg-red-600 text-white rounded-lg p-5 shadow">
            <h3 class="text-lg font-medium">Ditolak</h3>
            <p class="text-3xl font-bold mt-2">{{ $ditolak }} Siswa</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Pie Chart -->
        <div class="bg-white rounded-lg p-5 shadow flex flex-col items-center">
            <h3 class="text-lg font-semibold mb-4">Distribusi Jenis Kelamin (Pie Chart)</h3>
            <canvas id="pieChart" style="max-width: 300px; max-height: 300px;" class="mx-auto"></canvas>
        </div>

        <!-- Bar Chart -->
        <div class="bg-white rounded-lg p-5 shadow">
            <h3 class="text-lg font-semibold mb-4">Jumlah Pendaftar per Asal Sekolah</h3>
            <canvas id="schoolChart" class="w-full h-64"></canvas>
        </div>
    </div>

    <!-- Rekap Data Peserta -->
    <div class="bg-white rounded-lg p-5 shadow mt-8">
        <h3 class="text-lg font-semibold mb-4">Daftar Peserta Berdasarkan Peringkat</h3>

        <div class="overflow-x-auto">
            <table class="min-w-full table-auto text-center align-middle">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 border">Nomor</th>
                        <th class="px-4 py-2 border">Nama</th>
                        <th class="px-4 py-2 border">Jenis Kelamin</th>
                        <th class="px-4 py-2 border">NISN</th>
                        <th class="px-4 py-2 border">Asal Sekolah</th>
                        <th class="px-4 py-2 border">Nilai Rata-rata</th>
                        <th class="px-4 py-2 border">Status</th>
                    </tr>
                </thead>
                
                <tbody class="divide-y divide-gray-100">
                    @forelse ($pesertaTerbaik as $index => $peserta)
                    <tr>
                        <td class="px-4 py-2 ">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 ">{{ $peserta->nama }}</td>
                        <td class="px-4 py-2 ">{{ $peserta->jenis_kelamin }}</td>
                        <td class="px-4 py-2 ">{{ $peserta->nisn }}</td>
                        <td class="px-4 py-2 ">{{ $peserta->asal_sekolah }}</td>
                        <td class="px-4 py-2 font-semibold text-blue-700 ">{{ $peserta->nilai_rata_rata_skl }}</td>
                        <td class="px-4 py-2 ">
                            @php
                                $statusColor = match($peserta->status) {
                                    'Diterima' => 'bg-green-100 text-green-800',
                                    'Ditolak' => 'bg-red-100 text-red-800',
                                    'Diproses' => 'bg-yellow-100 text-yellow-800',
                                    default => 'bg-gray-100 text-gray-800'
                                };
                            @endphp
                            <span class="px-2 py-1 rounded text-xs font-medium {{ $statusColor }}">
                                {{ $peserta->status }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-3 text-center text-gray-500">Belum ada data peserta.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Data Pie Chart - Jenis Kelamin
        const dataJenisKelamin = {
            labels: ['Laki-laki', 'Perempuan'],
            datasets: [{
                label: 'Jumlah',
                data: [{{ $jumlahLaki }}, {{ $jumlahPerempuan }}],
                backgroundColor: ['#3B82F6', '#10B981'],
            }]
        };

        const pieCtx = document.getElementById('pieChart').getContext('2d');
        new Chart(pieCtx, {
            type: 'pie',
            data: dataJenisKelamin,
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'bottom' }
                }
            }
        });

        // Data Bar Chart - Pendaftar per Asal Sekolah
        const schoolLabels = {!! json_encode($asalSekolahData->pluck('asal_sekolah')) !!};
        const schoolCounts = {!! json_encode($asalSekolahData->pluck('total')) !!};

        // Array warna acak (panjang sesuai jumlah sekolah atau dipotong otomatis)
        const colorPalette = [
            '#3B82F6', '#10B981', '#F59E0B', '#EF4444', '#8B5CF6',
            '#EC4899', '#F97316', '#0EA5E9', '#22C55E', '#EAB308',
            '#14B8A6', '#6366F1', '#A855F7', '#FB923C', '#84CC16'
        ];

        const backgroundColors = schoolLabels.map((_, i) => colorPalette[i % colorPalette.length]);

        const ctxSchool = document.getElementById('schoolChart').getContext('2d');
        new Chart(ctxSchool, {
            type: 'bar',
            data: {
                labels: schoolLabels,
                datasets: [{
                    label: 'Jumlah Pendaftar',
                    data: schoolCounts,
                    backgroundColor: backgroundColors
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    title: {
                        display: true,
                        text: 'Jumlah Pendaftar per Asal Sekolah'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    });
</script>
@endsection