@extends('admin.app')

@section('title', 'Tambah Jadwal PPDB')

@section('content')
<section class="p-3 mt-2">
    <h2 class="text-xl font-bold mb-4">Tambah Jadwal</h2>

    <form action="{{ route('jadwal.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label>Tahapan</label>
            <input type="text" name="tahapan" class="border w-full p-2 rounded" required>
        </div>
        <div>
            <label>Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="border w-full p-2 rounded" required>
        </div>
        <div>
            <label>Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="border w-full p-2 rounded" required>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</section>
@endsection