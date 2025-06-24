@extends('admin.app')

@section('content')
<div class="p-6 bg-white rounded shadow mt-4">
    <h2 class="text-xl font-bold mb-4">Edit Data User</h2>

    <form action="{{ route('admin.data-user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label class="block mb-2 font-semibold">Nama</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="border rounded w-full p-2 mb-3" required>

        <label class="block mb-2 font-semibold">Email</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="border rounded w-full p-2 mb-3" required>

        <label class="block mb-2 font-semibold">Role</label>
        <select name="role" class="border rounded w-full p-2 mb-4" required>
            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
            <option value="kepsek" {{ $user->role === 'kepsek' ? 'selected' : '' }}>Kepsek</option>
        </select>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Simpan Perubahan
        </button>
    </form>
</div>
@endsection