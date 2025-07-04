@extends('admin.app')

@section('content')
<section class="p-3 mt-2">
    <div class="bg-white rounded shadow p-6">
        <h1 class="text-xl font-bold mb-2">Dashboard Admin</h1>
        <p class="text-gray-700">Halo, {{ auth()->user()->name }} — Anda login sebagai <span class="font-semibold">{{ auth()->user()->role }}</span></p>
    </div>
    <hr class="border-t-2 border-gray-800 my-6">

    <a href="{{ route('admin.hasil') }}" class="btn btn-secondary mb-4" style="background-color: #4b5563; border-color: #374151;">
        ← Kembali
    </a>

    <div class="card shadow-sm p-4">
        <h2 class="mb-4 text-center fw-bold">Form Edit Data Pendaftar</h2>

        <form action="{{ route('admin.pendaftar.update', $pendaftar->id) }}" method="POST" enctype="multipart/form-data" class="row g-4">
            @csrf
            @method('PUT')

            {{-- ===== Data Siswa ===== --}}
            <div class="col-md-6">
                <h5 class="fw-bold">Biodata Siswa</h5>
                <label class="form-label mt-2">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama', $pendaftar->nama) }}" required>

                <label class="form-label mt-3">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $pendaftar->tempat_lahir) }}" required>

                <label class="form-label mt-3">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $pendaftar->tanggal_lahir) }}" required>

                <label class="form-label mt-3">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select" required>
                    <option value="Laki-laki" {{ $pendaftar->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ $pendaftar->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>

                <label class="form-label mt-3">NISN</label>
                <input type="text" name="nisn" class="form-control" value="{{ old('nisn', $pendaftar->nisn) }}" required>

                <label class="form-label mt-3">Agama</label>
                <input type="text" name="agama" class="form-control" value="{{ old('agama', $pendaftar->agama) }}" required>
            </div>

            <div class="col-md-6">
                <h5 class="fw-bold invisible">.</h5> {{-- Spacer for alignment --}}
                <label class="form-label mt-2">Asal Sekolah</label>
                <input type="text" name="asal_sekolah" class="form-control" value="{{ old('asal_sekolah', $pendaftar->asal_sekolah) }}" required>

                <label class="form-label mt-3">Jarak Tempat Tinggal (km)</label>
                <input type="number" name="jarak_tempat_tinggal" class="form-control" value="{{ old('jarak_tempat_tinggal', $pendaftar->jarak_tempat_tinggal) }}" required>

                <label class="form-label mt-3">Pilihan Ekstrakurikuler</label>
                <select name="pilihan_ekskul" class="form-select" required>
                    <option value="Pencak Silat" {{ $pendaftar->pilihan_ekskul == 'Pencak Silat' ? 'selected' : '' }}>Pencak Silat</option>
                    <option value="Hizbul Wathan" {{ $pendaftar->pilihan_ekskul == 'Hizbul Wathan' ? 'selected' : '' }}>Hizbul Wathan</option>
                    <option value="Futsal" {{ $pendaftar->pilihan_ekskul == 'Futsal' ? 'selected' : '' }}>Futsal</option>
                </select>                

                <label class="form-label mt-3">Nilai Rata-Rata SKL</label>
                <input type="number" name="nilai_rata_rata_skl" step="0.01" class="form-control" value="{{ old('nilai_rata_rata_skl', $pendaftar->nilai_rata_rata_skl) }}" required>

                <label class="form-label mt-3">Status</label>
                <select name="status" class="form-select" required>
                    <option value="Diproses" {{ $pendaftar->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="Diterima" {{ $pendaftar->status == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                    <option value="Ditolak" {{ $pendaftar->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>

                <label class="form-label mt-3">Nomor WhatsApp</label>
                <input type="text" name="no_telp" class="form-control" value="{{ old('no_telp', $pendaftar->no_telp) }}" required>
            </div>
            
            <div class="col-md-12 mb-4">
                <label class="form-label">Alamat Lengkap</label>
                <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat', $pendaftar->alamat) }}</textarea>
            </div>

            {{-- ===== Upload File ===== --}}
            <div class="col-12">
                <hr>
                <h5 class="fw-bold mt-3">Upload Berkas</h5>
                <div class="row">
                    @foreach ([
                        'scan_skl' => 'SKL',
                        'scan_akta' => 'Akta Kelahiran',
                        'scan_kk' => 'Kartu Keluarga',
                        'scan_piagam' => 'Piagam (Opsional)',
                        'scan_kip' => 'KIP / PKH (Opsional)'
                    ] as $field => $label)
                        <div class="col-md-6 mb-4">
                            <label class="form-label mb-1">Scan {{ $label }}</label>
                            @if ($pendaftar->$field)
                                <div class="mb-2">
                                    <a 
                                        href="{{ asset('storage/' . $pendaftar->$field) }}" 
                                        target="_blank" 
                                        class="d-inline-flex align-items-center gap-1 text-primary text-decoration-none"
                                        title="Lihat file lama"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <circle cx="12" cy="12" r="2" />
                                            <path d="M22 12c-2.5 -5 -7 -8 -10 -8s-7.5 3 -10 8c2.5 5 7 8 10 8s7.5 -3 10 -8z" />
                                        </svg>
                                        <span>Lihat file lama</span>
                                    </a>
                                </div>
                            @endif
                            <input 
                                type="file" 
                                name="{{ $field }}" 
                                class="form-control" 
                                accept=".jpg,.jpeg,.png,.pdf"
                            >
                        </div>
                    @endforeach
                </div>                
            </div>

            {{-- ===== Data Orang Tua ===== --}}
            <div class="col-md-6">
                <hr>
                <h5 class="fw-bold mt-3">Data Ayah</h5>
                <label class="form-label">Nama</label>
                <input type="text" name="nama_ayah" class="form-control" value="{{ old('nama_ayah', $pendaftar->nama_ayah) }}">
                <label class="form-label mt-2">Pendidikan</label>
                <input type="text" name="pendidikan_ayah" class="form-control" value="{{ old('pendidikan_ayah', $pendaftar->pendidikan_ayah) }}">
                <label class="form-label mt-2">Pekerjaan</label>
                <input type="text" name="pekerjaan_ayah" class="form-control" value="{{ old('pekerjaan_ayah', $pendaftar->pekerjaan_ayah) }}">
                <label class="form-label mt-2">Penghasilan (per bulan)</label>
                <input type="number" name="penghasilan_ayah" class="form-control" value="{{ old('penghasilan_ayah', $pendaftar->penghasilan_ayah) }}">
            </div>

            <div class="col-md-6">
                <hr>
                <h5 class="fw-bold mt-3">Data Ibu</h5>
                <label class="form-label">Nama</label>
                <input type="text" name="nama_ibu" class="form-control" value="{{ old('nama_ibu', $pendaftar->nama_ibu) }}">
                <label class="form-label mt-2">Pendidikan</label>
                <input type="text" name="pendidikan_ibu" class="form-control" value="{{ old('pendidikan_ibu', $pendaftar->pendidikan_ibu) }}">
                <label class="form-label mt-2">Pekerjaan</label>
                <input type="text" name="pekerjaan_ibu" class="form-control" value="{{ old('pekerjaan_ibu', $pendaftar->pekerjaan_ibu) }}">
                <label class="form-label mt-2">Penghasilan (per bulan)</label>
                <input type="number" name="penghasilan_ibu" class="form-control" value="{{ old('penghasilan_ibu', $pendaftar->penghasilan_ibu) }}">
            </div>

            <div class="col-12 text-center mt-4">
                <button type="submit" class="btn btn-success px-4 py-2">
                    <i class="bi bi-save me-1"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    {{-- ===== Hapus Pendaftar ===== --}}
    <div class="col-12 text-center mt-2">
        <form id="deleteForm" action="{{ route('admin.pendaftar.destroy', $pendaftar->id) }}" method="POST" class="bg-white p-6 rounded shadow">
            @csrf
            @method('DELETE')

            <div class="text-center mb-4">
                <h2 class="text-lg font-bold text-red-600">Hapus Data Pendaftar</h2>
                <p class="text-sm text-gray-500">Tindakan ini akan menghapus data secara permanen.</p>
            </div>

            <div class="text-center">
            <button type="button" id="btnDelete"class="btn btn-danger px-4 py-2 mt-2">
                <i class="bi bi-trash me-1"></i> Hapus Data 
            </button>
            </div>
        </form>
    </div>
</section>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const btnDelete = document.getElementById('btnDelete');
    const deleteForm = document.getElementById('deleteForm');

    btnDelete.addEventListener('click', function () {
        Swal.fire({
            title: 'Yakin ingin menghapus data ini?',
            text: 'Tindakan ini akan menghapus data secara permanen!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal',
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#6b7280',
        }).then((result) => {
            if (result.isConfirmed) {
                deleteForm.submit();
            }
        });
    });
</script>
@endpush