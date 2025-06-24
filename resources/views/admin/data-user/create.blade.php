@extends('admin.app')

@section('content')
<div class="p-6 bg-white rounded shadow mt-4">
    <h2 class="text-xl font-bold mb-4">Tambah Data User</h2>

    <form action="{{ route('admin.data-user.store') }}" method="POST">
        @csrf

        <label class="block mb-2 font-semibold">Nama</label>
        <input type="text" name="name" placeholder="Masukkan nama lengkap" class="border rounded w-full p-2 mb-3" required>

        <label class="block mb-2 font-semibold">Email</label>
        <input type="email" name="email" placeholder="Masukkan email aktif" class="border rounded w-full p-2 mb-3" required>

        <label class="block mb-2 font-semibold">Password</label>
        <input type="password" name="password" placeholder="Masukkan password" class="border rounded w-full p-2 mb-3" required>

        <label class="block mb-2 font-semibold">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" placeholder="Ulangi password" class="border rounded w-full p-2 mb-3" required>

        <label class="block mb-2 font-semibold">Role</label>
        <select name="role" class="border rounded w-full p-2 mb-4" required>
            <option value="" disabled selected>Pilih Role</option>
            <option value="admin">Admin</option>
            <option value="user">User</option>
            <option value="kepsek">Kepsek</option>
        </select>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Simpan
        </button>
    </form>
</div>
@endsection