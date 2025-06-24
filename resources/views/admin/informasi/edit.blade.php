@extends('admin.app')
@section('title', 'Edit Informasi')
@section('content')
<section class="p-3">
    <div class="bg-white shadow rounded p-4">
        <h2 class="text-lg font-bold mb-4">Edit Informasi Sekolah</h2>
        <form action="{{ route('admin.informasi.update', $informasi->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label>Profil</label>
                <textarea name="profil" rows="3" class="form-control" required>{{ $informasi->profil }}</textarea>
            </div>
            <div class="mb-3">
                <label>Visi Misi</label>
                <textarea name="visi_misi" rows="3" class="form-control" required>{{ $informasi->visi_misi }}</textarea>
            </div>
            <div class="mb-3">
                <label>Fasilitas</label>
                <textarea name="fasilitas" rows="3" class="form-control" required>{{ $informasi->fasilitas }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.informasi.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</section>
@endsection