<header id="header" class="fixed-top d-flex align-items-center">
  <div class="container">
    <div class="header-container d-flex align-items-center justify-content-between">

      {{-- Logo Sekolah --}}
      <div class="logo d-flex align-items-center">
        <img src="{{ asset('assets/img/nav-icon-bg.png') }}" alt="logo" style="height: 35px; width: 35px; border-radius: 50%; object-fit: cover;" class="me-2">
        <h1 class="text-light m-0">
          <a href="/"><span>SMP MUHAMMADIYAH 1 ROWOKELE</span></a>
        </h1>
      </div>

      {{-- Navbar --}}
      <nav id="navbar" class="navbar">
        <ul>
          @if (Request::is('/'))
            {{-- Halaman Beranda --}}
            <li><a class="nav-link scrollto active" href="/">Home</a></li>
            <li><a class="nav-link scrollto" href="#tentang">Tentang</a></li>
            <li><a class="nav-link scrollto" href="#why-us">Why Us</a></li>
            <li><a class="nav-link scrollto" href="#fasilitas">Fasilitas</a></li>
            <li><a class="nav-link scrollto" href="#prestasi">Prestasi</a></li>
            <li><a class="nav-link scrollto" href="#guru">Guru</a></li>
            <li><a class="nav-link scrollto" href="#kontak">Kontak</a></li>
            <li><a class="getstarted scrollto" href="{{ route('login') }}">PPDB</a></li>
          @endif
        </ul>

        {{-- Toggle Icon (Mobile Nav) --}}
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      {{-- End Navbar --}}

    </div> <!-- End Header Container -->
  </div>
</header>