@extends('admin.app')
@section('title', 'Tambah Informasi')
@section('content')
<section class="p-3">
    <div class="bg-white shadow rounded p-4">
        <h2 class="text-lg font-bold mb-4">Tambah Informasi Sekolah</h2>
        <form action="{{ route('admin.informasi.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Profil</label>
                <textarea name="profil" rows="3" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label>Visi Misi</label>
                <textarea name="visi_misi" rows="3" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label>Fasilitas</label>
                <textarea name="fasilitas" rows="3" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.informasi.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</section>
@endsection