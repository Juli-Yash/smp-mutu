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

<!-- SweetAlerts2 Terima/Tolak Script -->
<script>
    function confirmAction(id, status) {
        const label = status === 'diterima' ? 'Menerima' : 'Menolak';

        Swal.fire({
            title: `Yakin ingin ${label} pendaftar ini?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: `Ya, ${label}`,
            cancelButtonText: 'Batal',
            confirmButtonColor: status === 'diterima' ? '#16a34a' : '#dc2626',
            cancelButtonColor: '#6b7280',
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById(`form-status-${id}`);
                const input = document.getElementById(`status-input-${id}`);
                input.value = status;
                form.submit();
            }
        });
    }
</script>

<!-- SweetAlerts2 Logout -->
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