<!-- SweetAlert2 Register Success-->
@if (session('success'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            icon: 'success',
            title: 'Registrasi Berhasil!',
            text: @json(session('success')),
            timer: 2000,
            showConfirmButton: false
        });
    });
</script>
@endif


@if (session('status'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            icon: 'success',
            title: 'Reset Password Berhasil!',
            text: @json(session('status')),
            timer: 2000,
            showConfirmButton: false
        });
    });
</script>
@endif