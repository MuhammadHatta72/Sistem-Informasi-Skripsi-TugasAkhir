<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
          rel="stylesheet">
    <script data-search-pseudo-elements="" defer=""
            src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"
            crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="{{ asset('assets/img/logo_polinema.png') }}" style="width: 50px">
    <title>SIM-SARPRAS POLINEMA</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/css/vendor/bootstrap.min.css')}}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/templatemo-chain-app-dev.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animated.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}"/>


</head>

<body>

<!-- ***** Preloader Start ***** -->
{{-- <div id="js-preloader" class="js-preloader">
  <div class="preloader-inner">
    <span class="dot"></span>
    <div class="dots">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
</div> --}}
<!-- ***** Preloader End ***** -->
<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a class="navbar-brand text-primary logo h1" href="#" style="font-size: xxx-large">SIM-SARPRAS
                        POLINEMA</a>
                    <!-- </a> -->
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                        <!-- <li class="scroll-to-section"><a href="#services">Services</a></li> -->
                        <li class="scroll-to-section"><a href="#about">About</a></li>
                        <li class="scroll-to-section"><a href="#services">Pengguna</a></li>

                        <!-- <li class="scroll-to-section"><a href="#pricing">Pricing</a></li>
                        <li class="scroll-to-section"><a href="#newsletter">Newsletter</a></li> -->
                        <li>
                            <div class="gradient-button"><a id="modal_trigger" href="{{ url('/log-in') }}"><i
                                        class="fa fa-sign-in-alt"></i> Login </a></div>
                        </li>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->

<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6 align-self-center">
                        <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s"
                             data-wow-delay="1s">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2>Sistem Inforamasi Peminjaman Sarana dan Prasarana Polinema</h2>
                                    <p>Selamat datang di Sistem Informasi Peminjaman Sarana Prasarana Polinema</p>
                                </div>
                                <div class="col-lg-12">
                                    <a class="btn btn-link fw-500" href="#!">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                            <img src="{{asset('assets/img/slider-dec.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="services" class="services section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
                    <h4>Seputar <em>SIM-SARPRAS</em> Polinema</h4>
                    <img src="{{asset('assets/img/heading-line-dec.png')}}" alt="">
                    <p>Sistem Informasi Peminjaman Sarana & Prasarana Politeknik Negeri Malang dihadirkan untuk membantu
                        mempermudah
                        kegiatan peminjam sarana dan prasarana di Politeknik Negeri Malang. Dengan adanya sistem ini,
                        diharapkan seluruh kegiatan
                        pengajuan peminjaman sarana dan prasarana dapat dilakukan secara terstruktur dan terpadu dalam
                        SIM-SARPRAS POLINEMA.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="service-item first-service">
                    <div class="icon"></div>
                    <h4>Seputar SIM-SARPRAS</h4>
                    <p>Dengan SIM-SARPRAS POLINEMA diharapkan digitalisasi pelayanan di POLINEMA akan segara
                        terwujud.</p>
                    <div class="text-button">
                        <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="service-item second-service">
                    <div class="icon"></div>
                    <h4>Prosedur Peminjaman</h4>
                    <p>Panduan Peminjaman Sarana Prasarana yang terstruktur menjadikan kegiatan peminjaman berjalan
                        dengan baik.</p>
                    <div class="text-button">
                        <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="service-item third-service">
                    <div class="icon"></div>
                    <h4>Hubungi Kami</h4>
                    <p>Lebih lanjut mengenai SIM-SARPRAS POLINEMA dapat diakses pada laman resmi kami</p>
                    <div class="text-button">
                        <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="about" class="about-us section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="section-heading">
                    <h4>Seputar <em>SIM-SARPRAS</em></h4>
                    <img src="{{asset('assets/img/heading-line-dec.png')}}" alt="">
                    <p>Sistem Informasi Peminjaman Sarana & Prasarana Politeknik Negeri Malang sebagai langkah
                        mewujudkan digitalisi
                        pelayanan di Politeknik Negeri Malang.
                    </p>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="box-item">
                            <h4><a href="#">Peminjaman Sarana &amp; Prasarana</a></h4>
                            <p>Peminjaman Sarana Prasarana melalui sistem informasi yang terpadu.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="box-item">
                            <h4><a href="#">Pengelolaan Data Sarana &amp; Prasarana</a></h4>
                            <p>Perubahan data Sarana Prasarana dikelola oleh admin dalam sistem.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="box-item">
                            <h4><a href="#">History Peminjaman</a></h4>
                            <p>Melihat Data Peminjaman yang telah dilakukan sebelumnya.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="box-item">
                            <h4><a href="#">Pelaporan</a></h4>
                            <p>Pelaporan admin terkait peminjaman yang bisa dilakukan dengan mudah dan cepat.</p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="right-image">
                    <img src="{{asset('assets/img/about-right-dec.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<section class=" pt-10">
    <div class="container px-5">
        <div class="text-center mb-5">
            <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
                <h4>Penggunaan <em>SIM-SARPRAS</em> Polinema</h4>
                <img src="{{asset('assets/img/heading-line-dec.png')}}" alt="">
                <p>Prosedur penggunaan sistem</p>
            </div>
        </div>
        <div class="row gx-5 z-1">
            <div class="col-lg-6 mb-5 mb-lg-n10" data-aos="fade-up" data-aos-delay="100">
                <div class="card pricing h-100">
                    <div class="card-body ps-0 pt-5 pb-5 pe-5">
                        <div class="timeline ms-0">
                            <div class="timeline-item">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-indicator bg-primary-soft text-primary"><i
                                            data-feather="play"></i></div>
                                </div>
                                <div class="timeline-item-content pt-0">
                                    <div class="card shadow-sm">
                                        <div class="card-body">
                                            <h5 class="text-primary">Step 1</h5>
                                            User mengakses website SIM-SARPRAS
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-indicator bg-success-soft text-success"><i
                                            data-feather="log-in"></i></div>
                                </div>
                                <div class="timeline-item-content pt-0">
                                    <div class="card shadow-sm">
                                        <div class="card-body">
                                            <h5 class="text-success">Step 2</h5>
                                            User login ke dalam sistem
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-indicator bg-primary-soft text-primary"><i
                                            data-feather="mouse-pointer"></i></div>
                                </div>
                                <div class="timeline-item-content pt-0">
                                    <div class="card shadow-sm">
                                        <div class="card-body">
                                            <h5 class="text-primary">Step 3</h5>
                                            User memilih ruangan yang ingin dipinjam
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-5 mb-lg-n10" data-aos="fade-up">
                <div class="card pricing h-100">
                    <div class="card-body ps-0 pt-5 pb-5 pe-5">
                        <div class="timeline">
                            <div class="timeline-item">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-indicator bg-success-soft text-success"><i
                                            data-feather="upload"></i></div>
                                </div>
                                <div class="timeline-item-content pt-0">
                                    <div class="card shadow-sm">
                                        <div class="card-body">
                                            <h5 class="text-success">Step 4</h5>
                                            User mengupload proposal peminjaman
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-indicator bg-primary-soft text-primary"><i
                                            data-feather="clock"></i></div>
                                </div>
                                <div class="timeline-item-content pt-0">
                                    <div class="card shadow-sm">
                                        <div class="card-body">
                                            <h5 class="text-primary">Step 5</h5>
                                            User menunggu proposal divalidasi oleh admin
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-indicator bg-success-soft text-success"><i
                                            data-feather="flag"></i></div>
                                </div>
                                <div class="timeline-item-content pt-0">
                                    <div class="card shadow-sm">
                                        <div class="card-body">
                                            <h5 class="text-success">Step 6</h5>
                                            Selesai! ruangan bisa dipakai
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer id="newsletter">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-8 offset-lg-2">
                <div class="section-heading">
                    <h4>PUSKOM POLINEMA - SIM SARPRAS POLINEMA</h4>
                    <h4>Polinema Jujur Optimis Semangat Sukses</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="footer-widget">
                    <h4>Contact Us</h4>
                    <p>Jl. Soekarno Hatta No.9, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141</p>
                    <p><a href="#">(0341) 404424</a></p>
                    <p><a href="#">info@polinema.ac.id</a></p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="footer-widget">
                    <h4>About Us</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="footer-widget">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">Web Polinema</a></li>
                        <li><a href="#">Instagram</a></li>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Web Helpdesk</a></li>
                    </ul>
                    <ul>
                        <li><a href="#">PUSKOM</a></li>
                        <li><a href="#">Icikiwir Techno Houses</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="footer-widget">
                    <h4>About Our <em>SIM-SARPRAS</em></h4>
                    <div class="logo">
                        <img src="{{asset('assets/img/polinema-logo.png')}}" alt="">
                    </div>
                    <p>
                        SIM-SARPRAS merupakan sistem informasi yang dibuat untuk mempermudah dalam peminjaman sarana dan
                        prasarana di Politeknik Negeri Malang.
                    </p>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="copyright-text">
                    <p>Copyright &copy; 2023, Developed By <a href="https://nauval.in/">Icikiwir Technology House</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- Scripts -->
<script src="{{asset('assets/js/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/owl-carousel.js')}}"></script>
<script src="{{asset('assets/js/animation.js')}}"></script>
<script src="{{asset('assets/js/imagesloaded.js')}}"></script>
<script src="{{asset('assets/js/popup.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="{{asset('assets/js/scriptslanding.js')}}"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        disable: 'mobile',
        duration: 600,
        once: true,
    });
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v2b4487d741ca48dcbadcaf954e159fc61680799950996"
        integrity="sha512-D/jdE0CypeVxFadTejKGTzmwyV10c1pxZk/AqjJuZbaJwGMyNHY3q/mTPWqMUnFACfCTunhZUVcd4cV78dK1pQ=="
        data-cf-beacon='{"rayId":"7b42d657d8474112","token":"6e2c2575ac8f44ed824cef7899ba8463","version":"2023.3.0","si":100}'
        crossorigin="anonymous"></script>
</body>
</html>
