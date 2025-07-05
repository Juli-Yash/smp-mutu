@extends('admin.app')

@section('title', 'Admin | Jadwal PPDB')

@section('content')
<section class="p-3 mt-2">
    <!-- Header -->
    <div class="bg-white rounded shadow p-6 mb-6">
        <h1 class="text-2xl font-bold mb-2">Dashboard Admin</h1>
        <p class="text-gray-700">
            Halo, {{ auth()->user()->name }} — Anda login sebagai 
            <span class="font-semibold">{{ auth()->user()->role }}</span>
        </p>
    </div>

    <hr class="border-t-2 border-gray-800 my-6">

    <!-- Tombol Tambah Jadwal -->
    <div class="flex justify-between items-center mb-4">
        <a href="{{ route('admin.jadwal.create') }}" class="min-w-[200px] text-center bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            + Tambah Jadwal
        </a>
    </div>

    <!-- Tabel Jadwal -->
    <div class="p-6 bg-white rounded shadow mt-4">
        <h5 class="mb-3 h4 text-center">Jadwal Kegiatan</h5>

        <!-- Responsif wrapper -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border text-center">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-2 px-4 border">No.</th>
                        <th class="py-2 px-4 border">Tahapan</th>
                        <th class="py-2 px-4 border">Tanggal Mulai</th>
                        <th class="py-2 px-4 border">Tanggal Selesai</th>
                        <th class="py-2 px-4 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jadwals as $index => $jadwal)
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 border">{{ $index + 1 }}</td>
                            <td class="py-2 px-4 border">{{ $jadwal->tahapan }}</td>
                            <td class="py-2 px-4 border">{{ $jadwal->tanggal_mulai }}</td>
                            <td class="py-2 px-4 border">{{ $jadwal->tanggal_selesai }}</td>
                            <td class="py-2 px-4 border">
                                <div class="flex justify-center items-center gap-2">
                                    <!-- Edit -->
                                    <a href="{{ route('admin.jadwal.edit', $jadwal->id) }}"
                                       class="btn btn-sm btn-warning"
                                       data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Jadwal">
                                        <i class="fas fa-edit"></i>
                                    </a>
                            
                                    <!-- Hapus -->
                                    <form id="delete-form-{{ $jadwal->id }}" action="{{ route('admin.jadwal.destroy', $jadwal->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                                onclick="confirmDelete('delete-form-{{ $jadwal->id }}')"
                                                class="btn btn-sm btn-danger"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Jadwal">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>                            
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-gray-500">Belum ada jadwal.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection