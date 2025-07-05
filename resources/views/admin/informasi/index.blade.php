@extends('admin.app')

@section('title', 'Admin | Informasi Sekolah')

@section('content')
<section class="p-3 mt-2">
    <!-- Header Dashboard -->
    <div class="bg-white rounded shadow p-6 mb-6">
        <h1 class="text-2xl font-bold mb-2">Dashboard Admin</h1>
        <p class="text-gray-700">
            Halo, {{ auth()->user()->name }} — Anda login sebagai 
            <span class="font-semibold">{{ auth()->user()->role }}</span>
        </p>
    </div>

    <hr class="border-t-2 border-gray-800 my-6">

    <!-- Tombol Tambah Informasi -->
    <div class="flex justify-between items-center mb-4">
        <a href="{{ route('admin.informasi.create') }}" class="min-w-[200px] text-center bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            + Tambah Informasi
        </a>
    </div>

    <!-- Tabel Informasi Sekolah -->
    <div class="p-4 bg-white rounded shadow mt-4 overflow-x-auto">
        <h5 class="mb-3 h4 text-center">Informasi Sekolah</h5>

        <table class="min-w-full bg-white border border-gray-300 text-center">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 border">No</th>
                    <th class="py-2 px-4 border">Profil</th>
                    <th class="py-2 px-4 border">Visi Misi</th>
                    <th class="py-2 px-4 border">Fasilitas</th>
                    <th class="py-2 px-4 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($informasi as $info)
                    <tr class="hover:bg-gray-50">
                        <td class="py-2 px-4 border">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border">{{ Str::limit($info->profil, 50) }}</td>
                        <td class="py-2 px-4 border">{{ Str::limit($info->visi_misi, 50) }}</td>
                        <td class="py-2 px-4 border">{{ Str::limit($info->fasilitas, 50) }}</td>
                        <td class="py-2 px-4 border">
                            <div class="flex gap-2 justify-center">
                                <!-- Tombol Edit -->
                                <a href="{{ route('admin.informasi.edit', $info->id) }}"
                                   class="btn btn-sm btn-warning"
                                   data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Informasi">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <!-- Tombol Hapus -->
                                <form id="delete-informasi-{{ $info->id }}" action="{{ route('admin.informasi.destroy', $info->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                            onclick="confirmDelete('delete-informasi-{{ $info->id }}')"
                                            class="btn btn-sm btn-danger"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Informasi">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">Belum ada informasi yang tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection