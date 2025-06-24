@extends('adsiswa.app')

@section('title', 'Siswa | Form Pendaftaran')

@section('content')
<section class="p-3 mt-2">
    <h2 class="text-center mb-3 fw-bold display-6">Tata Cara PPDB Online</h2>
    <div class="row">
        <div class="col-md-3">
            <div class="card h-100 d-flex">
                <div class="card-body text-center">
                    <h4>Daftar</h4>
                    <p>Calon peserta didik baru akses laman situs SMP Muhammadiyah 1 Rowokele dan klik halaman <strong>Daftar PPDB</strong></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100 d-flex">
                <div class="card-body text-center">
                    <h4>Upload Berkas</h4>
                    <p>Calon peserta didik mengisi seluruh formulir dan mengunggah dokumen seperti Ijazah atau </p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100 d-flex">
                <div class="card-body text-center">
                    <h4>Verifikasi Data</h4>
                    <p>Operator akan memverifikasi pengajuan akun dan berkas secara online</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100 d-flex">
                <div class="card-body text-center">
                    <h4>Hasil</h4>
                    <p>Calon peserta didik mengecek status kelulusan di halaman <strong>"Hasil Seleksi"</strong></p>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-5">
        <div class="card-body">
            <h2 class="text-center mb-4 fw-bold display-6">Biodata Siswa</h2>
            <hr>
            <form action="{{ route('daftar.store') }}" method="POST" class="row g-3" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="col-md-6">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                </div>
                <div class="col-md-6">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                </div>
                <div class="col-md-6">
                    <label for="nisn" class="form-label">NISN</label>
                    <input type="text" class="form-control" id="nisn" name="nisn" maxlength="10" pattern="\d{10}" required>
                </div>
                <div class="col-md-6">
                    <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
                    <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" required>
                </div>
                <div class="col-md-6">
                    <label for="agama" class="form-label">Agama</label>
                    <select class="form-select" id="agama" name="agama" required>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="jarak_tempat_tinggal" class="form-label">Jarak Tempat Tinggal (km)</label>
                    <input type="number" class="form-control" id="jarak_tempat_tinggal" name="jarak_tempat_tinggal" min="0" required>
                </div>
                <div class="col-md-6">
                    <label for="no_telp" class="form-label">Nomor WhatsApp</label>
                    <input type="tel" class="form-control" id="no_telp" name="no_telp" required>
                </div>
                <div class="col-md-6">
                    <label for="pilihan_ekskul" class="form-label">Pilihan Ekstrakurikuler</label>
                    <select class="form-select" id="pilihan_ekskul" name="pilihan_ekskul" required>
                        <option value="Pencak Silat">Pencak Silat</option>
                        <option value="Hizbul Wathan">Hizbul Wathan</option>
                        <option value="Futsal">Futsal</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="2" required></textarea>
                </div>
                <div class="col-md-12">
                    <label for="nilai_rata_rata_skl" class="form-label">Nilai Rata-rata SKL</label>
                    <input type="number" class="form-control" id="nilai_rata_rata_skl" name="nilai_rata_rata_skl" required min="0" max="100" step="0.01">
                </div>                
                <div class="col-md-12">
                    <h5 class="mb-3 fw-bold">Upload Berkas Persyaratan</h5>
    
                    <div class="mb-3">
                        <label for="scan_skl" class="form-label">Scan SKL</label>
                        <input class="form-control" type="file" id="scan_skl" name="scan_skl" accept=".jpg,.jpeg,.png,.pdf" required>
                    </div>
                    <div class="mb-3">
                        <label for="scan_akta" class="form-label">Scan Akta Kelahiran</label>
                        <input class="form-control" type="file" id="scan_akta" name="scan_akta" accept=".jpg,.jpeg,.png,.pdf" required>
                    </div>
                    <div class="mb-3">
                        <label for="scan_kk" class="form-label">Scan Kartu Keluarga (KK)</label>
                        <input class="form-control" type="file" id="scan_kk" name="scan_kk" accept=".jpg,.jpeg,.png,.pdf" required>
                    </div>
                    <div class="mb-3">
                        <label for="scan_piagam" class="form-label">Scan Piagam (Opsional)</label>
                        <input class="form-control" type="file" id="scan_piagam" name="scan_piagam" accept=".jpg,.jpeg,.png,.pdf">
                    </div>
                    <div class="mb-3">
                        <label for="scan_kip" class="form-label">Scan KIP / PKH (Opsional)</label>
                        <input class="form-control" type="file" id="scan_kip" name="scan_kip" accept=".jpg,.jpeg,.png,.pdf">
                    </div>
                </div>

                <div class="col-md-12">
                    <h2 class="text-center mb-4 fw-bold display-6">Biodata Orang Tua</h2>
                    <hr>
                </div>
                <div class="col-md-6">
                    <h5 class="font-bold mb-3">Data Ayah</h5>
                    <label for="nama_ayah" class="form-label">Nama Lengkap Ayah</label>
                    <input type="text" class="form-control mb-2" id="nama_ayah" name="nama_ayah" required>
                    <label for="pendidikan_ayah" class="form-label">Pendidikan Terakhir</label>
                    <input type="text" class="form-control mb-2" id="pendidikan_ayah" name="pendidikan_ayah" required>
                    <label for="pekerjaan_ayah" class="form-label">Pekerjaan</label>
                    <input type="text" class="form-control mb-2" id="pekerjaan_ayah" name="pekerjaan_ayah" required>
                    <label for="penghasilan_ayah" class="form-label">Jumlah Penghasilan (per bulan)</label>
                    <input type="number" class="form-control mb-2" id="penghasilan_ayah" name="penghasilan_ayah" required>
                </div>
                <div class="col-md-6">
                    <h5 class="font-bold mb-3">Data Ibu</h5>
                    <label for="nama_ibu" class="form-label">Nama Lengkap Ibu</label>
                    <input type="text" class="form-control mb-2" id="nama_ibu" name="nama_ibu" required>
                    <label for="pendidikan_ibu" class="form-label">Pendidikan Terakhir</label>
                    <input type="text" class="form-control mb-2" id="pendidikan_ibu" name="pendidikan_ibu" required>
                    <label for="pekerjaan_ibu" class="form-label">Pekerjaan</label>
                    <input type="text" class="form-control mb-2" id="pekerjaan_ibu" name="pekerjaan_ibu" required>
                    <label for="penghasilan_ibu" class="form-label">Jumlah Penghasilan (per bulan)</label>
                    <input type="number" class="form-control mb-2" id="penghasilan_ibu" name="penghasilan_ibu" required>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary w-100">Daftar</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('scripts')
@if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    });
</script>
@endif

@if(session('error'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            title: 'Gagal!',
            text: '{{ session('error') }}',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    });
</script>
@endif
@endsection