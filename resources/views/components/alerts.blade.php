<!-- SweetAlert2 Register Success-->
@if (session('success'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            icon: 'success',
            title: 'Registrasi Berhasil!',
            text: @json(session('success')),
            timer: 2500,
            showConfirmButton: false
        });
    });
</script>
@endif