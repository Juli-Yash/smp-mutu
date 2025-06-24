  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- DataTables Bootstrap 5 -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


      <script>
            // Tambahkan 'active' ke menu yang diklik
            document.querySelectorAll('.nav-link.scrollto').forEach(function (link) {
            link.addEventListener('click', function () {
                  document.querySelectorAll('.nav-link.scrollto').forEach(function (el) {
                        el.classList.remove('active');
                  });
                  this.classList.add('active');
            });
            });
      </script>

      <script>
            // Tambahkan active class berdasarkan scroll posisi
            window.addEventListener('scroll', () => {
            const sections = document.querySelectorAll('section');
            const scrollPos = window.scrollY + 200;
      
            sections.forEach(section => {
                  const top = section.offsetTop;
                  const bottom = top + section.offsetHeight;
                  const id = section.getAttribute('id');
      
                  if (scrollPos >= top && scrollPos <= bottom) {
                        document.querySelectorAll('.nav-link.scrollto').forEach(link => {
                        link.classList.remove('active');
                        if (link.getAttribute('href') === `#${id}`) {
                              link.classList.add('active');
                        }
                        });
                  }
            });
            });
      </script>
  

      <script>
            $(document).ready(function() {
            let table = $('#dataTable').DataTable({
                  "pageLength": 10
            });

            $('#searchBox').on('keyup', function () {
                  table.search(this.value).draw();
            });

            $('#entries').on('change', function () {
                  let val = $(this).val();
                  table.page.len(val === '-1' ? table.rows().count() : val).draw();
            });
            });
      </script>

      <!-- SweetAlerts2 Logout -->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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