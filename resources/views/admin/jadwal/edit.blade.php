@extends('admin.app')

@section('title', 'Edit Jadwal PPDB')

@section('content')
<section class="p-3 mt-2">
    <h2 class="text-xl font-bold mb-4">Edit Jadwal</h2>

    <div class="bg-white shadow rounded p-4">
        <form action="{{ route('admin.jadwal.update', $jadwal->id) }}" method="POST" class="space-y-4">
            @csrf @method('PUT')
            <div>
                <label>Tahapan</label>
                <input type="text" name="tahapan" value="{{ $jadwal->tahapan }}" class="border w-full p-2 rounded" required>
            </div>
            <div>
                <label>Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" value="{{ $jadwal->tanggal_mulai }}" class="border w-full p-2 rounded" required>
            </div>
            <div>
                <label>Tanggal Selesai</label>
                <input type="date" name="tanggal_selesai" value="{{ $jadwal->tanggal_selesai }}" class="border w-full p-2 rounded" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.jadwal.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</section>
@endsection