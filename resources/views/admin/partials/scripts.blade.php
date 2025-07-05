<!-- AlpineJS (untuk interaktivitas sederhana jika diperlukan) -->
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Bootstrap CSS (opsional jika masih gunakan komponen Bootstrap) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- DataTables Bootstrap5 CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- DataTables Core + Bootstrap5 Integration JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- SweetAlert2 Global Feedback -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
                confirmButtonText: 'OK'
            });
        @endif

        @if($errors->any())
            Swal.fire({
                icon: 'warning',
                title: 'Terjadi Kesalahan!',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                confirmButtonText: 'OK'
            });
        @endif
    });
</script>

<!-- SweetAlert2 Universal Delete Function -->
<script>
    function confirmDelete(formId, message = 'Data ini akan dihapus secara permanen!') {
        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: message,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formId).submit();
            }
        });
    }
</script>

<!-- SweetAlert2 Terima/Tolak Status -->
<script>
    function confirmAction(id, status) {
        const label = status === 'Diterima' ? 'Menerima' : 'Menolak';

        if (status === 'Ditolak') {
            Swal.fire({
                title: `Yakin ingin ${label} pendaftar ini?`,
                html: `
                    <div class="form-group text-start">
                        <textarea id="catatan" class="form-control" rows="4" placeholder="Tulis alasan penolakan di sini..."></textarea>
                    </div>
                `,
                icon: 'warning',
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: `Ya, ${label}`,
                cancelButtonText: 'Batal',
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280',
                preConfirm: () => {
                    const catatan = document.getElementById('catatan').value.trim();
                    if (!catatan) {
                        Swal.showValidationMessage('Catatan penolakan wajib diisi');
                    }
                    return catatan;
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById(`form-status-${id}`);
                    document.getElementById(`status-input-${id}`).value = status;

                    // Tambahkan input catatan_penolakan
                    let catatanInput = form.querySelector('input[name="catatan_penolakan"]');
                    if (!catatanInput) {
                        catatanInput = document.createElement('input');
                        catatanInput.type = 'hidden';
                        catatanInput.name = 'catatan_penolakan';
                        form.appendChild(catatanInput);
                    }
                    catatanInput.value = result.value;

                    form.submit();
                }
            });
        } else {
            // Jika status diterima
            Swal.fire({
                title: `Yakin ingin ${label} pendaftar ini?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: `Ya, ${label}`,
                cancelButtonText: 'Batal',
                confirmButtonColor: '#16a34a',
                cancelButtonColor: '#6b7280',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`status-input-${id}`).value = status;
                    document.getElementById(`form-status-${id}`).submit();
                }
            });
        }
    }
</script>

<!-- SweetAlert2 Logout -->
<script>
    function confirmLogout() {
        Swal.fire({
            title: 'Yakin ingin logout?',
            text: "Sesi Anda akan diakhiri.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Logout',
            cancelButtonText: 'Batal',
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#6b7280'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    }
</script>
