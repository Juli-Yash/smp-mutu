@extends(auth()->user()->role === 'admin' ? 'admin.app' : (auth()->user()->role === 'kepsek' ? 'adkepsek.app' : 'adsiswa.app'))

@section('content')
<section class="p-3 mt-2">
    <div class="bg-white rounded shadow p-6">
        <h1 class="text-2xl font-bold mb-2">Dashboard</h1>
        <p class="text-gray-700">Halo, {{ auth()->user()->name }} — Anda login sebagai <span class="font-semibold">{{ auth()->user()->role }}</span></p>
    </div>

    <hr class="border-t-2 border-gray-800 my-6">

    <!-- FORM UPDATE -->
    <form id="updateProfileForm" action="{{ route('profile.update') }}" method="POST" class="bg-white p-6 rounded shadow mb-6 space-y-4">
        @csrf
        @method('PUT')

        <div class="text-center">
            <h5 class="h4 text-center">Perbaharui Profil</h5>
            <p class="text-sm text-gray-500">Silakan perbarui informasi akun Anda di bawah ini.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="name" class="block font-medium mb-1">Nama Lengkap</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="email" class="block font-medium mb-1">Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="password" class="block font-medium mb-1">Password Baru (opsional)</label>
                <input type="password" name="password" id="password"
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="password_confirmation" class="block font-medium mb-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300">
            </div>
        </div>

        <div class="text-center pt-4">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded shadow transition duration-150">
                Simpan Perubahan
            </button>
        </div>
    </form>

    <!-- FORM DELETE -->
    <form id="deleteForm" action="{{ route('profile.destroy') }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        @method('DELETE')

        <div class="text-center mb-4">
            <h2 class="text-lg font-bold text-red-600">Hapus Akun</h2>
            <p class="text-sm text-gray-500">Tindakan ini akan menghapus akun Anda secara permanen.</p>
        </div>

        <div class="text-center">
            <button type="button" id="btnDelete"
                class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded shadow transition duration-150">
                Hapus Akun
            </button>
        </div>
    </form>
</section>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Handle Session Success Alert & Delete Confirmation -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                confirmButtonText: 'OK',
                showConfirmButton: true,
            });
        @endif

        const btnDelete = document.getElementById('btnDelete');
        const deleteForm = document.getElementById('deleteForm');
        btnDelete.addEventListener('click', function () {
            Swal.fire({
                title: 'Yakin ingin menghapus akun?',
                text: 'Tindakan ini tidak bisa dibatalkan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteForm.submit();
                }
            });
        });
    });
</script>
@endsection