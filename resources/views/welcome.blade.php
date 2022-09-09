<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>JIM Mart</title>

    <meta name="title" content="Restawrant — Harga Kaki Lima Rasa Kaki Lima!">
    <meta name="description" content="  Restawrant adalah restoran yang menyediakan berbagai macam kategori makanan mulai dari minuman,
                        dessert dan lain lain dengan harga kaki lima namun rasanya bintang lima. Outlet kita selalu
                        rame, jadi jangan lupa reservasi ya!">
    <link rel="icon" href="{{ url('cuba/assets/images/favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ url('cuba/assets/images/icon-192.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@xz/fonts@1/serve/plus-jakarta-display.min.css" />

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('css/guest.css') }}">

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/4d516d4246.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.2/dist/css/splide.min.css">
</head>

<body>

    <!-- ------------------------ Mobile Header Section ------------------------ -->
    <nav class="navbar navbar-light bg-white d-block d-sm-block d-md-block d-lg-none py-3 border-bottom">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">🍣 Restawrant</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title fw-bold" id="offcanvasNavbarLabel">
                        🍣 JIM INN
                    </h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body" style="margin-top: -24px">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <hr />
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/#tentang-kami">Tentang Kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="linkto">Kategori</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="linkto">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/#galeri-outlet">Galeri Outlet</a>
                        </li>
                    </ul>
                    <hr />
                    <div class="d-grid gap-2">
                        <button class="btn btn-warning text-white me-2 px-5 fw-500" onclick="location.href='http://127.0.0.1:8000/reservation/step-one'" type="button"> <i class="fas fa-calendar-plus"></i> &nbsp; &nbsp; Buat
                            Reservasi</button>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- ------------------------ Double Header Section ------------------------ -->
    <nav class="py-1 bg-white border-bottom d-none d-sm-none d-md-none d-lg-block text-grey">
        <div class="container d-flex flex-wrap fs-15">
            <ul class="nav me-auto">
                <li class="nav-item me-2">
                    <a href="/" class="nav-link link-dark text-grey px-2 active" aria-current="page">Beranda</a>
                </li>
                <li class="nav-item me-2">
                    <a href="/#tentang-kami" class="nav-link link-dark text-grey px-2">Tentang Kami</a>
                </li>
                <li class="nav-item me-2">
                    <a href="linkto" class="nav-link link-dark text-grey px-2">Kategori</a>
                </li>
                <li class="nav-item me-2">
                    <a href="linkto" class="nav-link link-dark text-grey px-2">Menu</a>
                </li>
                <li class="nav-item me-2">
                    <a href="/#galeri-outlet" class="nav-link link-dark text-grey px-2">Galeri Outlet</a>
                </li>
            </ul>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link link-dark text-grey px-2 no-effect-hover">Nomor Telepon</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-dark text-grey px-2 no-effect-hover">|</a>
                </li>
                <li class="nav-item">
                    <a href="https://wa.me/+6285790702476" class="nav-link link-dark text-grey px-2" target="_blank">
                        +6285790702476</a>
                </li>
            </ul>
        </div>
    </nav>

    <header class="py-3 mb-4 border-bottom d-none d-sm-none d-md-none d-lg-block bg-white sticky-top">
        <div class="container d-flex flex-wrap justify-content-center">
            <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
                <span class="fs-3 fw-bold">🍣 JIM Mart</span>
            </a>
            <button class="btn btn-warning text-white me-2 px-5 fw-500" onclick="location.href='{{route('login')}}'" type="button"> <i class="fas fa-key"></i> &nbsp; &nbsp;Login</button>
        </div>
    </header>

    <!-- ------------------------ Main Content Section ------------------------ -->
    <main>
        <!-- ------------------------ Splide Hero Section ------------------------ -->
        <section class="splide my-4" aria-label="Splide Basic HTML Example">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide">
                        <a href="{{ url('/menus') }}">
                            <img src="{{ url('theme/slider-1.png') }}" class="d-block w-100" style="border-radius:8px;">
                        </a>
                    </li>
                    <li class="splide__slide">
                        <a href="{{ url('/reservation/step-one') }}">
                            <img src=" {{ url('theme/slider-2.png') }}" class="d-block w-100" style="border-radius:8px;">
                        </a>
                    </li>
                    <li class="splide__slide">
                        <a href="{{ url('/reservation/step-one') }}">
                            <img src="{{ url('theme/slider-3.png') }}" class="d-block w-100" style="border-radius:8px;">
                        </a>
                    </li>
                    <li class="splide__slide">
                        <img src="{{ url('theme/slider-4.png') }}" class="d-block w-100" style="border-radius:8px;">
                    </li>
                </ul>
            </div>
        </section>

        <!-- ------------------------ Logo List Section ------------------------ -->
        <section class="logo-list d-none d-sm-none d-md-none d-lg-block">
            <div class="container py-2">
                <div class="row">
                    <div class="col-lg-2 col-md-4 col-6">
                        <a href="#"><img src="{{ url('theme/logo/1.png') }}" class="img-fluid" alt="Bluehost logo" /></a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6">
                        <a href="#"><img src="{{ url('theme/logo/2.png') }}" class="img-fluid" alt="Hostgator logo" /></a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6">
                        <a href="#"><img src="{{ url('theme/logo/3.png') }}" class="img-fluid" alt="Green Geeks logo" /></a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6">
                        <a href="#"><img src="{{ url('theme/logo/lc_mini.png') }}" class="img-fluid" alt="lc mini logo" /></a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6">
                        <a href="#"><img src="{{ url('theme/logo/jim.png') }}" class="img-fluid" alt="jim logo" /></a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6">
                        <a href="#"><img src="{{ url('theme/logo/lc.png') }}" class="img-fluid" alt="LC logo" /></a>
                    </div>
                </div>
            </div>
        </section>

        <!-- ------------------------ Menu Card Section ------------------------ -->
        <section class="my-100">
            <div class="container">
                <div class="row mt-5 text-center">
                    <small class="text-warning text-uppercase fw-bold">Menu Spesial buat Kamu dan Orang Spesial</small>
                    <h1 class="fw-bold">Coba menu spesial kami hari ini!</h1>
                    <p>Jangan lupa buat reservasi dulu di website kami ya, kalau masih kepo sama menu bisa liat liat
                        dulu kok</p>
                </div>
                <div class="row mt-4">
                    <div class="container">
                        <div class="swiper menu-swiper">
                            <div class="swiper-wrapper">
                                <!-- e ($menus as $menu) -->
                                <div class="swiper-slide">
                                    <div class="card">
                                        <img src="image" class="card-img-top card-img-top-landing-page" />
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold"> menu name</h5>
                                            <div class="category-card-description-wrapper">
                                                <p class="card-text category-card-description" style="font-size: 13px;">
                                                    menu desktrips
                                                </p>
                                            </div>
                                            <hr>
                                            <h5 class="fw-semibold">Rp..000,00</h5>
                                        </div>
                                    </div>
                                </div>
                                dddempty
                                <p>gak ada menu euy</p>
                                ssendforelse
                            </div>
                        </div>
                    </div>
                    <div class="container mt-4">
                        <div class="row">
                            <a href="{{ url('/menus') }}" class="btn btn-warning text-white px-4 mx-auto text-center col-10 col-md-3 my-3 fw-bold">Lihat
                                Semua
                                &nbsp; <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ------------------------ #1 Feature Section ------------------------ -->
        <section class="my-100" id="tentang-kami">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-7 mb-4 mb-lg-0 my-auto">
                        <div class="splide splide2">
                            <div class="splide__track">
                                <div class="splide__list">
                                    <div class="splide__slide" data-splide-interval="600">
                                        <img src="{{ url('images/landing-page/reservation-features-images.png') }}" class="img-fluid shadow-images" />
                                    </div>
                                    <div class="splide__slide" data-splide-interval="600">
                                        <img src="{{ url('images/landing-page/reservation-features-images-2.png') }}" class="img-fluid shadow-images" />
                                    </div>
                                    <div class="splide__slide" data-splide-interval="600">
                                        <img src="{{ url('images/landing-page/reservation-features-images-3.png') }}" class="img-fluid shadow-images" />
                                    </div>
                                    <div class="splide__slide" data-splide-interval="600">
                                        <img src="{{ url('images/landing-page/reservation-features-images-4.png') }}" class="img-fluid shadow-images" />
                                    </div>
                                    <div class="splide__slide" data-splide-interval="600">
                                        <img src="{{ url('images/landing-page/reservation-features-images-5.png') }}" class="img-fluid shadow-images" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="
                    col-12 col-md-12 col-lg-4
                    ms-auto
                    text-center text-md-start text-lg-start
                    my-auto
                  ">
                        <p class="mb-0 fw-bold text-warning">FITUR RESERVASI</p>
                        <h2 class="fw-bold">Gak usah ribet nanyain menu dan booking tempat!</h2>
                        <div class="row mt-4">
                            <div class="col-3 col-md-2 col-lg-3 mx-auto">
                                <div class="p-1 bg-warning rounded-logo text-center">
                                    <i class="fab fa-wpforms py-3" style="color: white; font-size:24px"></i>
                                </div>
                            </div>
                            <div class="col-12 col-md-10 col-lg-9 mt-3 mt-md-0 mt-lg-0">
                                <h5 class="mb-1 fw-semibold">Isi Data Diri Kamu</h5>
                                <small>Nama, nomor telepon dan email yang bisa kami hubungi</small>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-3 col-md-2 col-lg-3 mx-auto">
                                <div class="p-1 bg-warning rounded-logo text-center">
                                    <i class="fas fa-chair py-3" style="color: white; font-size:24px"></i>
                                </div>
                            </div>
                            <div class="col-12 col-md-10 col-lg-9 mt-3 mt-md-0 mt-lg-0">
                                <h5 class="mb-1 fw-semibold">Pilih Menu & Meja</h5>
                                <small>Pilih tempat meja dan tentukan tanggal serta jam juga menu nya</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ------------------------ Category Cards Section ------------------------ -->
        <section class="my-100">
            <div class="container">
                <div class="text-center mb-5">
                    <small class="text-warning fw-bold text-uppercase">Kategori Makanan Yang Tersedia di
                        Restawrant</small>
                    <h1 class="fw-bold">Kategori Makanan & Minuman</h1>
                    <p>Mau cari minuman, makanan, dessert atau oleh oleh ada kategorinya nih</p>
                </div>
                <div class="row g-3">

                    <div class="col-md-4 col-lg-3">
                        <div class="card card-in-home bg-warning text-white text-center">
                            <img class="card-img-top card-img-top-category-landing-page" src="image" alt="" srcset="">
                            <div class="card-body">
                                <h5 class="card-title fw-bold mt-1">cat name</h5>
                                <div class="category-card-description-wrapper">
                                    <p class="card-text category-card-description" style="font-size: 14px;">
                                        cat desk
                                    </p>
                                </div>
                                <a href="linkto" class="btn btn-outline-light fs-12">Lihat Semua &nbsp;
                                    <small class="arrow-category-button">→</small></a>
                            </div>
                        </div>
                    </div>
                    aaaempty
                    <p>gak ada kategori euy</p>
                    sddendforelse
                </div>
            </div>
        </section>

        <!-- ------------------------ #2 Feature Section ------------------------ -->
        <section class="my-100">
            <div class="container">
                <div class="row">
                    <div class="
                    order-2 order-md-1
                    col-12 col-md-12 col-lg-4
                    me-auto
                    text-center text-md-start text-lg-start
                    my-auto
                  ">
                        <p class="mb-0 fw-bold text-warning">DIANTERIN KERUMAH</p>
                        <h2 class="fw-bold">Cocok buat kalian yang suka rebahan dan males keluar</h2>
                        <div class="row mt-4">
                            <div class="col-3 col-md-2 col-lg-3 mx-auto">
                                <div class="p-1 bg-warning rounded-logo text-center">
                                    <i class="fas fa-search py-3" style="color: white; font-size:24px"></i>
                                </div>
                            </div>
                            <div class="col-12 col-md-10 col-lg-9 mt-3 mt-md-0 mt-lg-0">
                                <h5 class="mb-1 fw-semibold">Pilih Menu</h5>
                                <small>Pilih menu di aplikasi kami dan isi alamat dan data diri kamu</small>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-3 col-md-2 col-lg-3 mx-auto">
                                <div class="p-1 bg-warning rounded-logo text-center">
                                    <i class="fas fa-motorcycle py-3" style="color: white; font-size:24px"></i>
                                </div>
                            </div>
                            <div class="col-12 col-md-10 col-lg-9 mt-3 mt-md-0 mt-lg-0">
                                <h5 class="mb-1 fw-semibold">Makanan Dijalan</h5>
                                <small>Tungguin makanan akan dianterin driver kami ke alamat kamu</small>
                            </div>
                        </div>
                    </div>
                    <div class="
                    order-1 order-md-2
                    col-12 col-md-12 col-lg-7
                    mb-4
                    mt-lg-0
                    mb-lg-0
                    overlay-container
                  ">
                        <img src="{{ url('images/landing-page/video.png') }}" class="img-fluid shadow-images img-video" />
                        <!-- The overlay area -->
                        <div class="container__overlay">
                            <!-- The player button -->
                            <a target="_blank" href="https://www.youtube.com/">
                                <i class="fas fa-play-circle text-white play-button"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ------------------------ Gallery Pictures Section ------------------------ -->
        <section class="my-100" id="galeri-outlet">
            <div class="container">
                <div class="text-center mb-5">
                    <small class="text-warning fw-bold text-uppercase">Foto dan Dokumentasi di outlet kami</small>
                    <h1 class="fw-bold">Galeri & Dokumentasi di Outlet</h1>
                    <p>Buat kalian yang penasaran sama tempatnya kayak gimana tapi tempatnya nyaman kok hehe</p>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp" class="w-100 shadow-1-strong rounded mb-4" alt="Boat on Calm Water" />

                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain1.webp" class="w-100 shadow-1-strong rounded mb-4" alt="Wintry Mountain Landscape" />
                    </div>

                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain2.webp" class="w-100 shadow-1-strong rounded mb-4" alt="Mountains in the Clouds" />

                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp" class="w-100 shadow-1-strong rounded mb-4" alt="Boat on Calm Water" />
                    </div>

                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(18).webp" class="w-100 shadow-1-strong rounded mb-4" alt="Waves at Sea" />

                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain3.webp" class="w-100 shadow-1-strong rounded mb-4" alt="Yosemite National Park" />
                    </div>
                </div>
            </div>
        </section>

        <!-- ------------------------ Testimonials Section ------------------------ -->
        <section class="my-100">
            <div class="container">
                <div class="text-center mb-5">
                    <small class="text-warning fw-bold text-uppercase">Apa kata mereka tentang kami?</small>
                    <h1 class="fw-bold">Testimoni dari Para Pelanggan</h1>
                    <p>Biar kalian makin yakin buat ke tempat kami karena kata orang orang bagus dan kece dong</p>
                </div>
                <div class="row">
                    <div class="container">
                        <div class="swiper testimonial-swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="card card-in-home bg-warning text-white">
                                        <div class="card-body">
                                            <h5 class="card-title lh-lg">⭐⭐⭐⭐⭐</h5>
                                            <h5 class="card-title lh-lg fw-bold">
                                                Tempat nyaman dan aman
                                            </h5>
                                            <p class="card-text mb-4">
                                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum a eveniet
                                                consectetur ipsum accusantium alias dignissimos
                                            </p>
                                            <hr />
                                            <div class="row">
                                                <div class="col-2 col-md-2 my-auto">
                                                    <img src="https://www.sibberhuuske.nl/wp-content/uploads/2016/10/default-avatar.png" class="img-fluid rounded" />
                                                </div>
                                                <div class="col-10 col-md-10 my-auto">
                                                    <p class="mb-0 fw-bold">
                                                        Syauqizaidan Khairan Khalaf
                                                    </p>
                                                    <small>Tukang tidur, 18 tahun</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card card-in-home bg-warning text-white">
                                        <div class="card-body">
                                            <h5 class="card-title lh-lg">⭐⭐⭐⭐⭐</h5>
                                            <h5 class="card-title lh-lg fw-bold">
                                                Makanan Enak Banget Banget!
                                            </h5>
                                            <p class="card-text mb-4">
                                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum a eveniet
                                                consectetur ipsum accusantium alias dignissimos
                                            </p>
                                            <hr />
                                            <div class="row">
                                                <div class="col-2 col-md-2 my-auto">
                                                    <img src="https://www.sibberhuuske.nl/wp-content/uploads/2016/10/default-avatar.png" class="img-fluid rounded" />
                                                </div>
                                                <div class="col-10 col-md-10 my-auto">
                                                    <p class="mb-0 fw-bold">
                                                        Conrad Aditya Veranda
                                                    </p>
                                                    <small>Tukang genshin, 18 tahun</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card card-in-home bg-warning text-white">
                                        <div class="card-body">
                                            <h5 class="card-title lh-lg">⭐⭐⭐⭐⭐</h5>
                                            <h5 class="card-title lh-lg fw-bold">
                                                Pegawai nya cantik dan ganteng
                                            </h5>
                                            <p class="card-text mb-4">
                                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum a eveniet
                                                consectetur ipsum accusantium alias dignissimos
                                            </p>
                                            <hr />
                                            <div class="row">
                                                <div class="col-2 col-md-2 my-auto">
                                                    <img src="https://www.sibberhuuske.nl/wp-content/uploads/2016/10/default-avatar.png" class="img-fluid rounded" />
                                                </div>
                                                <div class="col-10 col-md-10 my-auto">
                                                    <p class="mb-0 fw-bold">
                                                        Andhika Febriansyah
                                                    </p>
                                                    <small>Tukang bucin, 18 tahun</small>
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

        <!-- ------------------------ CTA Social Media Section ------------------------ -->
        <section>
            <div class="container mb-5">
                <div class="row rounded mx-auto " style="background-color: #fcca29">
                    <div class="col-md-7 my-auto text-white px-5 py-5">
                        <h2 class="fw-bold text-white">Jangan lewatkan promo dari kami</h2>
                        <p>
                            Pastikan kalian follow instagram dan twitter kami untuk informasi terkait promo, event, menu
                            baru atau giveaway bagi kalian para restawvers di seluruh Indonesia!
                        </p>
                        <a href='#' target="_blank" class="btn btn-outline-light mt-2 px-4 py-2" style="font-weight:500;">Follow Instagram
                            ⇾</a>
                    </div>
                    <div class="col-md-4 background-cta ms-auto">
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- --------------------------- Footer Section ---------------------------- -->
    <footer class="py-5">
        <div class="container">
            <div class="row text-white">
                <div class="col-md-6 border-end">
                    <h4 class="fw-bold">🍣 Restawrant — Harga kaki lima rasa bintang lima!</h4>
                    <p class="">
                        Restawrant adalah restoran yang menyediakan berbagai macam kategori makanan mulai dari minuman,
                        dessert dan lain lain dengan harga kaki lima namun rasanya bintang lima. Outlet kita selalu
                        rame, jadi jangan lupa reservasi ya!
                    </p>
                    <small class="d-block mb-3">
                        &copy; 2022 Syauqizaidan — Made with laravel 9.4.1 and bootstrap 5.2.0
                    </small>
                </div>

                <div class="col-6 col-md ms-0 ms-md-4">
                    <h4 class="fw-bold mb-3">Navigasi Cepat</h4>
                    <ul class="list-unstyled">
                        <li class="mb-1">
                            <a class="link-light text-decoration-none" href="/userlisting?srczz=&katfilt=6901">
                                Beranda
                            </a>
                        </li>
                        <li class="mb-1">
                            <a class="link-light text-decoration-none" href="/userlisting?srczz=&katfilt=6905">
                                Tentang Kami
                            </a>
                        </li>
                        <li class="mb-1">
                            <a class="link-light text-decoration-none" href="/userlisting?srczz=&katfilt=6904">
                                Kategori
                            </a>
                        </li>
                        <li class="mb-1">
                            <a class="link-light text-decoration-none" href="/userlisting?srczz=&katfilt=6902">
                                Menu
                            </a>
                        </li>
                        <li class="mb-1">
                            <a class="link-light text-decoration-none" href="/userlisting?srczz=&katfilt=6903">
                                Galeri Outlet
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h4 class="fw-bold mb-3">Sosial Media</h4>
                    <ul class="list-unstyled">
                        <li class="mb-1">
                            <a class="link-light text-decoration-none" href="#">
                                <i class="fab fa-whatsapp"></i> &nbsp; Whatsapp
                            </a>
                        </li>
                        <li class="mb-1">
                            <a class="link-light text-decoration-none" href="#" target="_blank">
                                <i class="fab fa-instagram"></i> &nbsp; Instagram
                            </a>
                        </li>
                        <li class="mb-1">
                            <a class="link-light text-decoration-none" href="#" target="_blank">
                                <i class="fab fa-twitter"></i> &nbsp;Twitter
                            </a>
                        </li>
                        <li class="mb-5 mb-md-1">
                            <a class="link-light text-decoration-none" href="#" target="_blank">
                                <i class="fab fa-facebook-square"></i> &nbsp; Facebook
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

    <!-- Splide JS -->
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.2/dist/js/splide.min.js"></script>

    <!-- Initializing Hero Section Splide JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var splide = new Splide('.splide', {
                type: 'loop',
                padding: '80px',
                gap: '24px',
                autoplay: true,
                arrows: false,
                breakpoints: {
                    576: {
                        type: 'loop',
                        perPage: 1,
                        gap: '8px',
                        padding: '8px',
                    },
                }
            });
            splide.mount();
        });
    </script>

    <!-- Initializing Feature Section Splide JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var splide = new Splide('.splide2', {
                type: 'fade',
                rewind: true,
                autoplay: true,
                arrows: false,
            });
            splide.mount();
        });
    </script>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Testimonial Swiper -->
    <script>
        var swiper = new Swiper(".testimonial-swiper", {
            slidesPerView: 1,
            spaceBetween: 12,
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                768: {
                    slidesPerView: 2.2,
                    spaceBetween: 12,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 12,
                },
            },
        });
    </script>

    <!-- Initialize Menu Swiper -->
    <script>
        var swiper = new Swiper(".menu-swiper", {
            slidesPerView: 1,
            spaceBetween: 12,
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                768: {
                    slidesPerView: 2.2,
                    spaceBetween: 12,
                },
                1024: {
                    slidesPerView: 4.3,
                    spaceBetween: 12,
                },
            },
        });
    </script>

</body>

</html>