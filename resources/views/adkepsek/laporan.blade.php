@extends('adkepsek.app')

@section('title', 'Kepsek | Laporan')

@section('content')
<section class="p-3 mt-2">
    <div class="bg-white rounded shadow p-6">
        <h1 class="text-2xl font-bold mb-2">Dashboard Kepala Sekolah</h1>
        <p class="text-gray-700">Halo, {{ auth()->user()->name }} — Anda login sebagai 
            <span class="font-semibold">{{ auth()->user()->role }}</span>
        </p>
    </div>

    <hr class="border-t-2 border-gray-800 my-6">

    <form action="{{ route('kepsek.laporan.cetak') }}" method="GET" target="_blank" class="bg-white p-4 rounded shadow">
        <div class="text-center mb-4">
            <h5 class="h4 text-center">Cetak Laporan</h5>
            <p class="text-muted">Silakan pilih filter data untuk laporan yang akan dicetak.</p>
        </div>

        <div class="row g-3">
            {{-- Pilih Periode --}}
            <div class="col-md-6">
                <label for="periode" class="form-label fw-medium">Periode</label>
                <select name="periode" id="periode" class="form-select">
                    <option value="harian">Harian</option>
                    <option value="mingguan">Mingguan</option>
                    <option value="bulanan">Bulanan</option>
                    <option value="tahunan">Tahunan</option>
                </select>
            </div>

            {{-- Input Harian --}}
            <div class="col-md-6" id="harian-wrapper" style="display: none;">
                <label for="tanggal" class="form-label fw-medium">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control">
            </div>

            {{-- Input Mingguan --}}
            <div class="col-md-6" id="mingguan-wrapper" style="display: none;">
                <label for="minggu" class="form-label fw-medium">Minggu</label>
                <input type="week" name="minggu" id="minggu" class="form-control">
            </div>

            {{-- Pilih Bulan --}}
            <div class="col-md-6" id="bulan-wrapper" style="display: none;">
                <label for="bulan" class="form-label fw-medium">Bulan</label>
                <select name="bulan" id="bulan" class="form-select">
                    @foreach(range(1, 12) as $bln)
                        <option value="{{ $bln }}">{{ DateTime::createFromFormat('!m', $bln)->format('F') }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Tahun --}}
            <div class="col-md-6" id="tahun-wrapper">
                <label for="tahun" class="form-label fw-medium">Tahun</label>
                <select name="tahun" id="tahun" class="form-select">
                    @for ($tahun = date('Y'); $tahun >= 2023; $tahun--)
                        <option value="{{ $tahun }}">{{ $tahun }}</option>
                    @endfor
                </select>
            </div>

            {{-- Status Pendaftaran --}}
            <div class="col-md-6" id="status-wrapper">
                <label for="status" class="form-label fw-medium">Status Pendaftaran</label>
                <select name="status" id="status" class="form-select">
                    <option value="semua">Semua</option>
                    <option value="diterima">Diterima</option>
                    <option value="ditolak">Ditolak</option>
                </select>
            </div>            
        </div>

        {{-- Tombol Submit --}}
        <div class="text-center pt-4">
            <button type="submit" class="btn btn-success px-4">
                <i class="bi bi-printer"></i> Cetak Laporan
            </button>
        </div>
    </form>
</section>

<script>
    const periodeSelect = document.getElementById('periode');

    const harianWrapper = document.getElementById('harian-wrapper');
    const mingguanWrapper = document.getElementById('mingguan-wrapper');
    const bulanWrapper = document.getElementById('bulan-wrapper');
    const tahunWrapper = document.getElementById('tahun-wrapper');
    const statusWrapper = document.getElementById('status-wrapper').closest('.col-md-6');

    function toggleFilter() {
        const value = periodeSelect.value;

        // Reset semua
        harianWrapper.style.display = 'none';
        mingguanWrapper.style.display = 'none';
        bulanWrapper.style.display = 'none';
        tahunWrapper.style.display = 'none';
        statusWrapper.style.display = 'none';

        if (value === 'harian') {
            harianWrapper.style.display = 'block';
            statusWrapper.style.display = 'block';
            // Tidak perlu tahun dan status
        } else if (value === 'mingguan') {
            mingguanWrapper.style.display = 'block';
            statusWrapper.style.display = 'block';
        } else if (value === 'bulanan') {
            bulanWrapper.style.display = 'block';
            tahunWrapper.style.display = 'block';
            statusWrapper.style.display = 'block';
        } else if (value === 'tahunan') {
            tahunWrapper.style.display = 'block';
            statusWrapper.style.display = 'block';
        }
    }

    periodeSelect.addEventListener('change', toggleFilter);
    document.addEventListener('DOMContentLoaded', toggleFilter);
</script>
@endsection