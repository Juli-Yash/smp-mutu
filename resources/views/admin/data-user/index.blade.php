@extends('admin.app')

@section('title', 'Admin | Data User')

@section('content')
<section class="p-3 mt-2">
    <div class="bg-white rounded shadow p-6">
        <h1 class="text-xl font-bold mb-2">Dashboard Admin</h1>
        <p class="text-gray-700">Halo, {{ auth()->user()->name }} — Anda login sebagai <span class="font-semibold">{{ auth()->user()->role }}</span></p>
    </div>

    <hr class="border-t-2 border-gray-800 my-6">

    <!-- Tombol Tambah User -->
    <div class="flex justify-between items-center mb-4">
        <a href="{{ route('admin.data-user.create') }}" class="min-w-[200px] text-center bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            + Tambah Pengguna
        </a>
    </div>

    <!-- Tabel Data User -->
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="mb-3 h4 text-center">Data Seluruh Pengguna</h5>
            <div class="table-responsive">
                <table id="user-table" class="table table-bordered table-striped table-hover">
                    <thead class="table-light">
                        <tr>
                            <th class="py-2 px-4 border text-center align-middle">No</th>
                            <th class="py-2 px-4 border text-center align-middle">Nama</th>
                            <th class="py-2 px-4 border text-center align-middle">Email</th>
                            <th class="py-2 px-4 border text-center align-middle">Role</th>
                            <th class="py-2 px-4 border text-center align-middle">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $index => $user)
                            <tr>
                                <td class="py-2 px-4 border text-center align-middle">{{ $index + 1 }}</td>
                                <td class="py-2 px-4 border text-center align-middle">{{ $user->name }}</td>
                                <td class="py-2 px-4 border text-center align-middle">{{ $user->email }}</td>
                                <td class="py-2 px-4 border text-capitalize text-center align-middle">{{ $user->role }}</td>
                                <td class="py-2 px-4 border text-center align-middle">
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('admin.data-user.edit', $user->id) }}"
                                           class="btn btn-sm btn-warning"
                                           data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Pengguna">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                
                                        <form id="delete-user-{{ $user->id }}" action="{{ route('admin.data-user.destroy', $user->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="confirmDelete('delete-user-{{ $user->id }}')"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Pengguna">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>                                                                                              
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-3">Belum ada data user.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>                
            </div>
        </div>
    </div>
</section>
@endsection

{{-- Tambahkan DataTables CDN dan inisialisasi --}}
@push('scripts')
<script>
    $(document).ready(function() {
        $('#user-table').DataTable({
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                paginate: {
                    previous: "Sebelumnya",
                    next: "Berikutnya"
                },
                zeroRecords: "Data tidak ditemukan",
            }
        });
    });
</script>
@endpush