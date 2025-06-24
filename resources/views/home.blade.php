@extends('layouts.app')

@section('title', 'SMP Muhammadiyah 1 Rowokele')

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
            <h1>Selamat Datang di SMP Muhammadiyah 1 Rowokele</h1>
            <h2>Raih masa depan gemilang dan penuh dengan haparan cerah disini</h2>
            <a href="{{ route('login') }}" class="btn-get-started scrollto">Daftar PPDB Sekarang</a>
        </div>
    </section><!-- End Hero -->

        <main id="main">
            <!-- ======= About Section ======= -->
            <section id="tentang" class="tentang">
                <div class="container">
                    <div class="row content">
                        <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                            <img src="{{ asset('assets/img/main-smp-mutu.jpg') }}" alt="Foto SMP Muhammadiyah 1 Rowokele" class="img-fluid">
                        </div>
                        <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left" data-aos-delay="200">
                            <h3 class="fw-bold">Profil Sekolah</h3>
                            <p style="text-align: justify;">{!! nl2br(e($profil)) !!}</p>
                        
                            <h3 class="fw-bold mt-4">Visi & Misi</h3>
                            <p style="text-align: justify;">{!! nl2br(e($visi_misi)) !!}</p>
                        </div>                        
                    </div>
                </div>
            </section>
            <!-- End About Section -->
        </main>
        
    
        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container">
                <div class="row counters">
                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="79" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Murid</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="11" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Guru & Staff</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="4" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Ekstrakurikuler</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Relasi</p>
                    </div>
                </div>
            </div>
        </section><!-- End Counts Section -->

        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container">

                <div class="row">
                    <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-right">
                        <div class="content">
                            <h3>Kenapa Memilih Sekolah Ini?</h3>
                            <p style="text-align: justify;">
                                Lebih dari puluhan siswa-siswi dengan berbagai latar belakang memilih SMP Muhammadiyah 1 Rowokele
                                sebagai tempat belajar mereka. Sekolah ini menawarkan lingkungan pendidikan yang kondusif dengan 
                                tenaga pengajar yang kompeten, kurikulum berbasis nilai-nilai Islam, serta kesempatan untuk meraih 
                                prestasi akademik dan non-akademik di tingkat lokal maupun nasional.
                            </p>                            
                        </div>
                    </div>
                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="icon-boxes d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-receipt"></i>
                                        <h4>Menekankan Pendidikan Karakter</h4>
                                        <p>SMP Muhammadiyah 1 Rowokele membentuk siswa yang aktif, inovatif, dan kreatif. Kurikulum 
                                            berbasis nilai-nilai Islam mendorong siswa untuk lebih peduli terhadap lingkungan sosial 
                                            serta mengembangkan akhlak mulia dalam kehidupan sehari-hari.</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-cube-alt"></i>
                                        <h4>Fasilitas Lengkap</h4>
                                        <p>Sekolah dilengkapi dengan ruang kelas nyaman, laboratorium komputer, laboratorium IPA, 
                                            perpustakaan, mushola, kantin sekolah, serta lapangan olahraga untuk menunjang pembelajaran 
                                            dan pengembangan bakat siswa.</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-images"></i>
                                        <h4>Prestasi Siswa</h4>
                                        <p>Beberapa prestasi yang telah diraih oleh siswa SMP Muhammadiyah 1 Rowokele antara lain: <br>
                                        <strong>Medali Emas</strong> <br>
                                            Juara 1 Pensi Per Kontingen <br>
                                            Juara 1 Reportase Putri <br>
                                            Juara 1 Semaphore Putri <br>
                                            Juara 1 Kultum Putri <br>
                                            Juara 1 Master Chef Putra <br>

                                        <strong>Medali Perak</strong> <br>
                                            Juara 2 Kaligrafi Putra <br>
                                            Juara 2 Kaligrafi Putri <br>

                                        <strong>Medali Perunggu</strong> <br>
                                            Juara 3 Tenda Putra <br>
                                            Juara 3 Outbound Putri <br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End .content-->
                    </div>
                </div>
            </div>
        </section><!-- End Why Us Section -->

        <!-- ======= Fasilitas/Services Section ======= -->
        <section id="fasilitas" class="services section-bg">
            <div class="container">

                <div class="row">
                    <div class="col-lg-4">
                        <div class="section-title" data-aos="fade-right">
                            <h2>Fasilitas</h2>
                            <p style="text-align: justify;">
                                Fasilitas sekolah berperan penting dalam mendukung kegiatan belajar mengajar (KBM). 
                                Fasilitas belajar mencakup sarana dan prasarana yang menunjang proses pembelajaran. 
                                Sarana adalah alat langsung yang digunakan dalam pembelajaran, sedangkan prasarana adalah 
                                fasilitas yang mendukung jalannya pendidikan secara tidak langsung. 
                                Di <strong>SMP Muhammadiyah 1 Rowokele</strong>, kami menyediakan berbagai fasilitas untuk menunjang 
                                kenyamanan dan kualitas pendidikan siswa, seperti gedung sekolah yang nyaman, lapangan olahraga, 
                                ruang kelas interaktif, perpustakaan, laboratorium, dan lainnya.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-6 d-flex align-items-stretch">
                                <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                                    <div class="icon"><i class="bx bxl-dribbble"></i></div>
                                    <h4><a>Ruang Kelas Nyaman</a></h4>
                                    <p>Setiap ruang kelas di <strong>SMP Muhammadiyah 1 Rowokele</strong>didesain untuk menciptakan 
                                        lingkungan belajar yang nyaman, bersih, dan kondusif bagi siswa.</p>
                                </div>
                            </div>

                            <div class="col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                                <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
                                    <div class="icon"><i class="bx bx-book"></i></div>
                                    <h4><a>Perpustakaan</a></h4>
                                    <p>Kami memiliki koleksi buku yang beragam untuk menunjang literasi siswa, mulai dari 
                                        buku pelajaran, buku cerita, hingga ensiklopedia.</p>
                                </div>
                            </div>

                            <div class="col-md-6 d-flex align-items-stretch mt-4">
                                <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
                                    <div class="icon"><i class="bx bx-laptop"></i></div>
                                    <h4><a>Laboratorium Komputer dan IPA</a></h4>
                                    <p>Di <strong>SMP Muhammadiyah 1 Rowokele</strong>, kami menyediakan laboratorium komputer dan laboratorium 
                                        IPA untuk mendukung pembelajaran berbasis teknologi dan eksperimen ilmiah.</p>
                                </div>
                            </div>

                            <div class="col-md-6 d-flex align-items-stretch mt-4">
                                <div class="icon-box" data-aos="zoom-in" data-aos-delay="400">
                                    <div class="icon"><i class="bx bx-universal-access"></i></div>
                                    <h4><a>Sarana Olahraga</a></h4>
                                    <p>Sekolah memiliki berbagai fasilitas olahraga seperti lapangan futsal, lapangan voli, dan 
                                        ruang olahraga untuk mendukung kegiatan ekstrakurikuler serta kesehatan siswa.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Prestasi/Portfolio Section ======= -->
        <section id="prestasi" class="portfolio">
            <div class="container">

                <div class="section-title" data-aos="fade-left">
                    <h2>Prestasi</h2>
                    <p style="text-align: justify;">
                        Meraih prestasi terbaik di bidang akademik maupun non-akademik merupakan kebanggaan tersendiri 
                        bagi setiap siswa. Terdapat berbagai macam prestasi yang dapat diraih sesuai dengan minat dan bakat mereka, 
                        melalui pembinaan yang tepat, setiap siswa memiliki kesempatan untuk mencapai prestasi terbaiknya.
                        Di bawah ini adalah dokumentasi prestasi yang telah diraih oleh <strong>SMP Muhammadiyah 1 Rowokele</strong>:
                    </p>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">Semua</li>
                            <li data-filter=".filter-akademik">Akademik</li>
                            <li data-filter=".filter-nonakademik">Non-Akademik</li>
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-4 col-md-6 portfolio-item filter-akademik">
                        <div class="portfolio-wrap">
                            <img src="assets/img/portfolio/medali-emas-jambore.jpg" class="img-fluid" alt="Juara 3 Jambore Daerah">
                            <div class="portfolio-info">
                                <h4>Juara 3</h4>
                                <p class="text-center">Juara 3 Jambore Daerah Kontingen KI BAGUS HADI KUSUMO</p>
                                <div class="portfolio-links">
                                    <a href="assets/img/portfolio/medali-emas-jambore.jpg" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="Juara 3 Jambore Daerah Kontingen KI BAGUS HADI KUSUMO"><i class="bx bx-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-akademik">
                        <div class="portfolio-wrap">
                            <img src="assets/img/portfolio/lomba-kaligrafi.jpg" class="img-fluid" alt="Lomba Kaligrafi">
                            <div class="portfolio-info">
                                <h4>Juara 2</h4>
                                <p class="text-center">Juara 2 Lomba Kaligrafi Tingkat Kabupaten Tahun 2024</p>
                                <div class="portfolio-links">
                                    <a href="assets/img/portfolio/lomba-kaligrafi.jpg" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="Juara 2 Lomba Kaligrafi Tingkat Kabupaten Tahun 2024"><i class="bx bx-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-nonakademik">
                        <div class="portfolio-wrap">
                            <img src="assets/img/portfolio/medali-perunggu-gerakjalan.jpg" class="img-fluid" alt="Juara 3 Lomba Gerak Jalan">
                            <div class="portfolio-info">
                                <h4>Juara 2</h4>
                                <p class="text-center">Juara 3 Lomba Gerak Jalan</p>
                                <div class="portfolio-links">
                                    <a href="assets/img/portfolio/medali-perunggu-gerakjalan.jpg" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="Juara 3 Lomba Gerak Jalan Pekan Olahraga Tingkat Kecamatan"><i class="bx bx-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-akademik">
                        <div class="portfolio-wrap">
                            <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="Juara 1 Lomba MTQ">
                            <div class="portfolio-info">
                                <h4>Juara 1</h4>
                                <p>Juara 1 Lomba MTQ FAI Education Fair 2023</p>
                                <div class="portfolio-links">
                                    <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="Juara 1 Lomba MTQ FAI Education Fair 2023"><i class="bx bx-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-nonakademik">
                        <div class="portfolio-wrap">
                            <img src="assets/img/portfolio/medali-emas-futsal.jpg" class="img-fluid" alt="Juara 1 Lomba Futs">
                            <div class="portfolio-info">
                                <h4>Juara 1</h4>
                                <p>Juara 1 Lomba Futsal Antar Sekolah CUP 2023</p>
                                <div class="portfolio-links">
                                    <a href="assets/img/portfolio/medali-emas-futsal.jpg" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="Juara 1 Lomba Futsal Antar Sekolah CUP 2023"><i class="bx bx-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-nonakademik">
                        <div class="portfolio-wrap">
                            <img src="assets/img/portfolio/lomba-upacara.jpg" class="img-fluid" alt="Juara 2 Lomba Upacara">
                            <div class="portfolio-info">
                                <h4>Juara 2</h4>
                                <p class="text-center">Juara  2 Lomba Upacara Tingkat Kecamatan Tahun 2023</p>
                                <div class="portfolio-links">
                                    <a href="assets/img/portfolio/lomba-upacara.jpg" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="Juara  2 Lomba Upacara Tingkat Kecamatan Tahun 2023"><i class="bx bx-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Portfolio Section -->

        <!-- ======= Guru/Team Section ======= -->
        <section id="guru" class="team py-5">
            <div class="container">
                <div class="section-title text-start mb-4" data-aos="fade-right">
                    <h2>Guru & Staff</h2>
                    <p style="text-align: justify;">
                        Salah satu hal penting untuk bisa meningkatkan kualitas pendidikan sebuah negara adalah
                        kualitas gurunya. Mengapa? Guru adalah fasilitator pendidikan. Guru menjadi garda terdepan
                        dalam meningkatkan kualitas pendidikan. Guru lah yang memberikan pendidikan kepada
                        siswa-siswanya. Oleh karena itu, SMA Nusa Bangsa semaksimal mungkin untuk dapat menghadirkan
                        guru-guru terbaik dalam bidangnya.
                    </p>
                </div>

                <div class="row gy-4">
                    <!-- 1 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="member text-center" data-aos="zoom-in" data-aos-delay="100">
                            <div class="pic mb-3"><img src="assets/img/team/icon_person.png" class="img-fluid rounded-circle" alt=""></div>
                            <div class="member-info">
                                <h5 class="fw-bold">Widiastuti, S.Pd</h5>
                                <small class="text-muted d-block mb-2">Kepala Sekolah</small>
                                <p class="fst-italic">"Barang siapa bersungguh-sungguh, maka dia akan mendapatkan kesuksesan."</p>
                                <div class="social mt-2">
                                    <a href="#"><i class="ri-twitter-fill"></i></a>
                                    <a href="#"><i class="ri-facebook-fill"></i></a>
                                    <a href="#"><i class="ri-instagram-fill"></i></a>
                                    <a href="#"><i class="ri-linkedin-box-fill"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 2 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="member text-center" data-aos="zoom-in" data-aos-delay="200">
                            <div class="pic mb-3"><img src="assets/img/team/icon_person.png" class="img-fluid rounded-circle" alt=""></div>
                            <div class="member-info">
                                <h5 class="fw-bold">Istiana Khasanah, A.md.Akun</h5>
                                <small class="text-muted d-block mb-2">Tata Usaha</small>
                                <p class="fst-italic">"Setiap kegagalan adalah jendela menuju pemahaman yang lebih dalam."</p>
                                <div class="social mt-2">
                                    <a href="#"><i class="ri-twitter-fill"></i></a>
                                    <a href="#"><i class="ri-facebook-fill"></i></a>
                                    <a href="#"><i class="ri-instagram-fill"></i></a>
                                    <a href="#"><i class="ri-linkedin-box-fill"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 3 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="member text-center" data-aos="zoom-in" data-aos-delay="300">
                            <div class="pic mb-3"><img src="assets/img/team/icon_person.png" class="img-fluid rounded-circle" alt=""></div>
                            <div class="member-info">
                                <h5 class="fw-bold">Dian Mirzaki, M.Pd</h5>
                                <small class="text-muted d-block mb-2">Guru Bahasa Indonesia</small>
                                <p class="fst-italic">"Lakukan yang terbaik di semua kesempatan yang kamu miliki."</p>
                                <div class="social mt-2">
                                    <a href="#"><i class="ri-twitter-fill"></i></a>
                                    <a href="#"><i class="ri-facebook-fill"></i></a>
                                    <a href="#"><i class="ri-instagram-fill"></i></a>
                                    <a href="#"><i class="ri-linkedin-box-fill"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 4 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="member text-center" data-aos="zoom-in" data-aos-delay="400">
                            <div class="pic mb-3"><img src="assets/img/team/icon_person.png" class="img-fluid rounded-circle" alt=""></div>
                            <div class="member-info">
                                <h5 class="fw-bold">Muhyil Mumit</h5>
                                <small class="text-muted d-block mb-2">Guru PAI</small>
                                <p class="fst-italic">"Masa depan adalah milik mereka yang menyiapkan hari ini."</p>
                                <div class="social mt-2">
                                    <a href="#"><i class="ri-twitter-fill"></i></a>
                                    <a href="#"><i class="ri-facebook-fill"></i></a>
                                    <a href="#"><i class="ri-instagram-fill"></i></a>
                                    <a href="#"><i class="ri-linkedin-box-fill"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 5 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="member text-center" data-aos="zoom-in" data-aos-delay="500">
                            <div class="pic mb-3"><img src="assets/img/team/icon_person.png" class="img-fluid rounded-circle" alt=""></div>
                            <div class="member-info">
                                <h5 class="fw-bold">Heni Zulaiha, S.Pd</h5>
                                <small class="text-muted d-block mb-2">Guru IPA</small>
                                <p class="fst-italic">"Kegagalan adalah guru terbaikmu. Maka belajarlah darinya."</p>
                                <div class="social mt-2">
                                    <a href="#"><i class="ri-twitter-fill"></i></a>
                                    <a href="#"><i class="ri-facebook-fill"></i></a>
                                    <a href="#"><i class="ri-instagram-fill"></i></a>
                                    <a href="#"><i class="ri-linkedin-box-fill"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 6 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="member text-center" data-aos="zoom-in" data-aos-delay="600">
                            <div class="pic mb-3"><img src="assets/img/team/icon_person.png" class="img-fluid rounded-circle" alt=""></div>
                            <div class="member-info">
                                <h5 class="fw-bold">Wisnu Budianto</h5>
                                <small class="text-muted d-block mb-2">Guru Pendidikan Jasmani</small>
                                <p class="fst-italic">"Jatuh itu biasa. Yang luar biasa adalah mereka yang bangkit dan membawa pelajaran."</p>
                                <div class="social mt-2">
                                    <a href="#"><i class="ri-twitter-fill"></i></a>
                                    <a href="#"><i class="ri-facebook-fill"></i></a>
                                    <a href="#"><i class="ri-instagram-fill"></i></a>
                                    <a href="#"><i class="ri-linkedin-box-fill"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 7 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="member text-center" data-aos="zoom-in" data-aos-delay="700">
                            <div class="pic mb-3"><img src="assets/img/team/icon_person.png" class="img-fluid rounded-circle" alt=""></div>
                            <div class="member-info">
                                <h5 class="fw-bold">Watimah, S.Pd</h5>
                                <small class="text-muted d-block mb-2">Guru PPKN</small>
                                <p class="fst-italic">"Belajarlah dari kesalahan, karena di sanalah tersembunyi kebijaksanaan."</p>
                                <div class="social mt-2">
                                    <a href="#"><i class="ri-twitter-fill"></i></a>
                                    <a href="#"><i class="ri-facebook-fill"></i></a>
                                    <a href="#"><i class="ri-instagram-fill"></i></a>
                                    <a href="#"><i class="ri-linkedin-box-fill"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 8 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="member text-center" data-aos="zoom-in" data-aos-delay="800">
                            <div class="pic mb-3"><img src="assets/img/team/icon_person.png" class="img-fluid rounded-circle" alt=""></div>
                            <div class="member-info">
                                <h5 class="fw-bold">Slamet Riyadi, S.H</h5>
                                <small class="text-muted d-block mb-2">Guru Kemuhammadiyahan</small>
                                <p class="fst-italic">"Bukan sukses yang membuatmu kuat, tapi bagaimana kamu belajar dari kegagalan."</p>
                                <div class="social mt-2">
                                    <a href="#"><i class="ri-twitter-fill"></i></a>
                                    <a href="#"><i class="ri-facebook-fill"></i></a>
                                    <a href="#"><i class="ri-instagram-fill"></i></a>
                                    <a href="#"><i class="ri-linkedin-box-fill"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 9 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="member text-center" data-aos="zoom-in" data-aos-delay="900">
                            <div class="pic mb-3"><img src="assets/img/team/icon_person.png" class="img-fluid rounded-circle" alt=""></div>
                            <div class="member-info">
                                <h5 class="fw-bold">Iqbal Latif Saputra</h5>
                                <small class="text-muted d-block mb-2">Guru Bahasa Inggris</small>
                                <p class="fst-italic">"Belajar bukan soal cepat pandai, tapi tentang terus mencoba."</p>
                                <div class="social mt-2">
                                    <a href="#"><i class="ri-twitter-fill"></i></a>
                                    <a href="#"><i class="ri-facebook-fill"></i></a>
                                    <a href="#"><i class="ri-instagram-fill"></i></a>
                                    <a href="#"><i class="ri-linkedin-box-fill"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 10 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="member text-center" data-aos="zoom-in" data-aos-delay="1000">
                            <div class="pic mb-3"><img src="assets/img/team/icon_person.png" class="img-fluid rounded-circle" alt=""></div>
                            <div class="member-info">
                                <h5 class="fw-bold">Septiani, S.Pd</h5>
                                <small class="text-muted d-block mb-2">Guru Matematika</small>
                                <p class="fst-italic">"Proses tidak akan mengkhianati hasil, selama kamu tidak berhenti belajar."</p>
                                <div class="social mt-2">
                                    <a href="#"><i class="ri-twitter-fill"></i></a>
                                    <a href="#"><i class="ri-facebook-fill"></i></a>
                                    <a href="#"><i class="ri-instagram-fill"></i></a>
                                    <a href="#"><i class="ri-linkedin-box-fill"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 11 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="member text-center" data-aos="zoom-in" data-aos-delay="1100">
                            <div class="pic mb-3"><img src="assets/img/team/icon_person.png" class="img-fluid rounded-circle" alt=""></div>
                            <div class="member-info">
                                <h5 class="fw-bold">Ismail Munto</h5>
                                <small class="text-muted d-block mb-2">Penjaga Sekolah</small>
                                <p class="fst-italic">"Anak hebat bukan yang selalu benar, tapi yang mau belajar dari salah."</p>
                                <div class="social mt-2">
                                    <a href="#"><i class="ri-twitter-fill"></i></a>
                                    <a href="#"><i class="ri-facebook-fill"></i></a>
                                    <a href="#"><i class="ri-instagram-fill"></i></a>
                                    <a href="#"><i class="ri-linkedin-box-fill"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- End Team Section -->

        <!-- ======= Contact Section ======= -->
        <section id="kontak" class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4" data-aos="fade-right">
                        <div class="section-title">
                            <h2>Kontak</h2>
                            <p style="text-align: justify;">
                                Untuk info lebih lanjut mengenai pendaftaran peserta didik baru, kerjasama atau yang lain nya
                                bisa menghubungi kontak yang tercantum atau bisa langsung ke sekolah SMP Muhammadiyah 1 Rowokele
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                        <iframe style="border:0; width: 100%; height: 270px;"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3950.623754127572!2d109.4720395!3d-7.5930618!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e654b0f5a6b5c4d%3A0xf73f52ad8cedb9d4!2sSMP%20Muhammadiyah%201%20Rowokele!5e0!3m2!1sid!2sid!4v1710845641234!5m2!1sid!2sid"
                            frameborder="0" allowfullscreen></iframe>
                        <div class="info mt-4">
                            <i class="icofont-google-map"></i>
                            <h4>Lokasi:</h4>
                            <p>SMP Muhammadiyah 1 Rowokele</p>
                            <p>Ds. Sukomulyo, Kec. Rowokele, Kabupaten Kebumen, Jawa Tengah 59567</p>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 mt-4">
                                <div class="info">
                                    <i class="icofont-envelope"></i>
                                    <h4>Email:</h4>
                                    <p>admin@smpmuh1rowokele.sch.id</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="info w-100 mt-4">
                                    <i class="icofont-phone"></i>
                                    <h4>Call:</h4>
                                    <p>628 12 7421 9874</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section><!-- End Contact Section -->
    </main><!-- End #main -->
@endsection