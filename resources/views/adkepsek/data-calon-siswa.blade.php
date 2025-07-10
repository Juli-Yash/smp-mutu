@extends('adkepsek.app')

@section('title', 'Kepsek | Data Calon Siswa')

@section('content')
<section class="p-3 mt-2">
    <div class="bg-white rounded shadow p-6">
        <h1 class="text-2xl font-bold mb-2">Dashboard Kepala Sekolah</h1>
        <p class="text-gray-700">Halo, {{ auth()->user()->name }} — Anda login sebagai <span class="font-semibold">{{ auth()->user()->role }}</span></p>
    </div>

    <hr class="border-t-2 border-gray-800 my-6">

    <!-- Filter dan Export -->
    <form action="{{ route('kepsek.export.excel') }}" method="GET"
        class="bg-gray-100 rounded mb-3 mt-2 flex flex-col md:flex-row md:flex-wrap md:items-end gap-4">
    
        <!-- Filter Tanggal -->
        <div class="flex-1 min-w-[200px]">
            <label for="start_date" class="block text-sm font-medium mb-1">Dari Tanggal</label>
            <input type="date" name="start_date" id="start_date"
                    class="w-full border p-2 rounded"
                    value="{{ request('start_date') }}">
        </div>

        <div class="flex-1 min-w-[200px]">
            <label for="end_date" class="block text-sm font-medium mb-1">Sampai Tanggal</label>
            <input type="date" name="end_date" id="end_date"
                    class="w-full border p-2 rounded"
                    value="{{ request('end_date') }}">
        </div>

        <!-- Filter Status -->
        <div class="flex-1 min-w-[200px]">
            <label for="status" class="block text-sm font-medium mb-1">Status</label>
            <select name="status" id="status"
                    class="w-full border p-2 rounded">
                <option value="">-- Semua --</option>
                <option value="diterima" {{ request('status') == 'diterima' ? 'selected' : '' }}>Diterima</option>
                <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                <option value="diproses" {{ request('status') == 'diproses' ? 'selected' : '' }}>Diproses</option>
            </select>
        </div>
        
        <!-- Tombol -->
        <div class="flex-1 min-w-[200px] mt-2 md:mt-6">
            <button type="submit"
                class="w-full bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition flex items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 9V4h12v5M6 14H5a2 2 0 01-2-2V9a2 2 0 012-2h14a2 2 0 012 2v3a2 2 0 01-2 2h-1M6 14v5h12v-5" />
                </svg>
                Export
            </button>
        </div>        
    </form>

    <div class="card">
        <div class="card-body">
            <h5 class="mb-3 h4 text-center">Rekap Data Calon Siswa</h5>
            
            <div class="table-responsive">
                <table id="user-table" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center align-middle">No</th>
                            <th class="text-center align-middle">Nama</th>
                            <th class="text-center align-middle">Jenis Kelamin</th>
                            <th class="text-center align-middle">NISN</th>
                            <th class="text-center align-middle">Asal Sekolah</th>
                            <th class="text-center align-middle">Alamat</th>
                            <th class="text-center align-middle">Nilai SKL</th>
                            <th class="text-center align-middle">SKL</th>
                            <th class="text-center align-middle">Akta</th>
                            <th class="text-center align-middle">KK</th>
                            <th class="text-center align-middle">Piagam</th>
                            <th class="text-center align-middle">KIP/PKH</th>
                            <th class="text-center align-middle">Status</th>
                            <th class="text-center align-middle">Catatan</th>
                            <th class="text-center align-middle">Verifikator</th>
                        </tr>
                    </thead>                    
                    <tbody>
                        @foreach($pendaftars as $index => $pendaftar)
                        <tr>
                            <td class="text-center align-middle">{{ $index + 1 }}</td>
                            <td class="text-center align-middle">{{ $pendaftar->nama }}</td>
                            <td class="text-center align-middle">{{ $pendaftar->jenis_kelamin }}</td>
                            <td class="text-center align-middle">{{ $pendaftar->nisn }}</td>
                            <td class="text-center align-middle">{{ $pendaftar->asal_sekolah }}</td>
                            <td class="text-center align-middle">{{ $pendaftar->alamat }}</td>
                    
                            <!-- Nilai -->
                            <td class="text-center align-middle">
                                <span class="badge
                                    @if ($pendaftar->nilai_rata_rata_skl >= 80)
                                        bg-success
                                    @elseif ($pendaftar->nilai_rata_rata_skl >= 60)
                                        bg-warning
                                    @else
                                        bg-danger
                                    @endif
                                    ">
                                    {{ $pendaftar->nilai_rata_rata_skl }}
                                </span>
                            </td>
                            
                            <!-- Kolom SKL -->
                            <td class="text-center align-middle">
                                <x-file-viewer :path="$pendaftar->scan_skl" label="SKL" />
                            </td>

                            <!-- Kolom Akta -->
                            <td class="text-center align-middle">
                                <x-file-viewer :path="$pendaftar->scan_akta" label="Akta" />
                            </td>

                            <!-- Kolom KK -->
                            <td class="text-center align-middle">
                                <x-file-viewer :path="$pendaftar->scan_kk" label="KK" />
                            </td>

                            <!-- Kolom Piagam -->
                            <td class="text-center align-middle">
                                <x-file-viewer :path="$pendaftar->scan_piagam" label="Piagam" />
                            </td>

                            <!-- Kolom KIP/PKH -->
                            <td class="text-center align-middle">
                                <x-file-viewer :path="$pendaftar->scan_kip" label="KIP/PKH" />
                            </td>
                    
                            <!-- Status -->
                            <td class="text-center align-middle">
                                @php $status = strtolower($pendaftar->status); @endphp
                                @if ($status === 'diproses')
                                    <span class="inline-block px-2 py-1 text-xs font-semibold text-orange-800 bg-orange-200 rounded">Diproses</span>
                                @elseif ($status === 'diterima')
                                    <span class="inline-block px-2 py-1 text-xs font-semibold text-green-800 bg-green-200 rounded">Diterima</span>
                                @elseif ($status === 'ditolak')
                                    <span class="inline-block px-2 py-1 text-xs font-semibold text-red-800 bg-red-200 rounded">Ditolak</span>
                                @else
                                    <span class="inline-block px-2 py-1 text-xs font-semibold text-gray-800 bg-gray-200 rounded">{{ ucfirst($pendaftar->status) }}</span>
                                @endif
                            </td>    
                            
                            <!-- Catatan Penolakan -->
                            <td class="text-center align-middle">
                                @if (strtolower($pendaftar->status) === 'ditolak' && $pendaftar->catatan_penolakan)
                                    <span class="text-sm italic text-red-600">{{ $pendaftar->catatan_penolakan }}</span>
                                @else
                                    <span>-</span>
                                @endif
                             </td>

                            <!-- Verifikator Data -->
                            <td class="text-center align-middle">
                                <span class="text-sm italic">
                                    {{ $pendaftar->verified_by_name ?? '-' }}
                                </span>
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
<!-- Modal Preview File -->
<div id="fileModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-[9999] transition-opacity duration-300">
    <div onclick="event.stopPropagation()" class="bg-white p-4 rounded shadow-lg max-w-4xl w-full max-h-[90vh] overflow-auto relative">
        <button onclick="closeFileModal()" class="absolute top-2 right-2 text-red-600 font-bold text-xl">&times;</button>
        <h3 id="fileModalTitle" class="text-lg font-bold mb-4"></h3>
        <div id="filePreview" class="text-center">
            <!-- Isi akan muncul di sini -->
        </div>
    </div>
</div>

<script>
    function showFileModal(url, title) {
        const modal = document.getElementById('fileModal');
        const preview = document.getElementById('filePreview');
        const titleElement = document.getElementById('fileModalTitle');

        titleElement.innerText = `Preview ${title}`;
        preview.innerHTML = ''; // bersihkan isi sebelumnya

        if (url.endsWith('.pdf')) {
            preview.innerHTML = `
                <iframe src="${url}" class="w-full h-[80vh]" frameborder="0"></iframe>
            `;
        } else {
            const img = document.createElement('img');
            img.src = url;
            img.alt = title;
            img.className = 'mx-auto max-h-[80vh]';

            img.onerror = () => {
                preview.innerHTML = `<p class="text-red-500">Gagal memuat gambar. File mungkin rusak atau tidak ditemukan.</p>`;
            };

            preview.appendChild(img);
        }

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeFileModal() {
        const modal = document.getElementById('fileModal');
        const preview = document.getElementById('filePreview');

        preview.innerHTML = '';
        modal.classList.remove('flex');
        modal.classList.add('hidden');
    }

    // Tambahkan fungsi ke window agar dapat dipanggil dari onclick
    window.showFileModal = showFileModal;

    // Tutup modal jika klik di luar kontennya
    document.getElementById('fileModal').addEventListener('click', closeFileModal);
</script>

<script>
    $(document).ready(function() {
        $('#user-table').DataTable({
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