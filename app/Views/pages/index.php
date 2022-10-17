<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />


    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('assets/css/landing-page/bootstrap.min.css') ?>" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('assets/lib/animate/animate.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/lib/lightbox/css/lightbox.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/lib/owlcarousel/assets/owl.carousel.min.css') ?>" rel="stylesheet" />
    <!-- Third Party CSS and JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/de7d18ea4d.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&family=Rubik+Dirt&display=swap" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/main/style.css') ?>" />
    <title><?= $title ?></title>
</head>

<body>
    <!-- Awal landing -->

    <!-- Awal navigasi -->
    <nav class="container-fluid navbar navbar-expand-lg " id="Nav">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-example" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbar-example">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="#landing">LANDING PAGE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('list_object'); ?>">EXPLORE APAR TOURISM VILLAGE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#About">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#MyProjects">PREVIEW</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#MyCertificates">AWARDS</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Akhir navigasi -->
    <div class="bg" id="bg">
        <video autoplay muted poster="<?= base_url('/assets/images/bg-movie-ss.PNG') ?>" loop class="bg-video">
            <source src="<?= base_url('media/videos/bg-movie.MP4'); ?>">
        </video>
        <div class="bg-content">
            <h1 style="color: #eaeaea;">Welcome To Apar Tourism Village</h1>
            <p>Pariaman City, West Sumatra, Indonesia</p>
            <a class="btn btn-success " href="<?= base_url('list_object') ?>">Explore Now!</a>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#0C0C0C" fill-opacity="1" d="M0,160L48,133.3C96,107,192,53,288,26.7C384,0,480,0,576,16C672,32,768,64,864,112C960,160,1056,224,1152,213.3C1248,203,1344,117,1392,74.7L1440,32L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
    </svg>
    <!-- Akhir landing -->
    <!-- About  -->
    <section class="container-fluid mb-2" id="About">
        <div class="row" style="position: relative;">
            <div class="col-md-6 text-center">
                <h1 class="efek1 text-success">Enjoy Our Culture!</h1>
                <p style=" font-size:20px;font-family: 'Roboto', sans-serif;">
                    <?= $aparData->description; ?>
                </p>
            </div>
            <div class="col-md-6 p-4 text-center">
                <img src="media/photos/landing-page/pohon-mangrove.png" alt="" style=" max-width: 100%" class="mb-3 efek1">
                <figcaption class="figure-caption">(Mangrove) Tanaman dengan banyak manfaat yang berada di pesisir pantai <a class="text-link text-success" href="<?= base_url('list_object'); ?>"> Selengkapnya</a></figcaption>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="position: absolute; bottom:0;left:0;right:0;z-index:-1;">
                <path fill="#F3F4F5" fill-opacity="1" d="M0,320L48,272C96,224,192,128,288,122.7C384,117,480,203,576,229.3C672,256,768,224,864,186.7C960,149,1056,107,1152,106.7C1248,107,1344,149,1392,170.7L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
        <div class="row justify-content-end text-center bg-light p-4">
            <div class="col-md-6 my-2">
                <img src="media/photos/landing-page/turtle-1.png" alt="" style="max-width: 100%;" class="mb-3 efek5">
                <figcaption class="figure-caption">Salah satu dari 3 jenis penyu yang ada di Desa Wisata Apar (Hanya 7 di dunia) <a class="text-link text-success" href="<?= base_url('list_object'); ?>"> Selengkapnya</a></figcaption>
            </div>
            <div class="col-md-6 ">
                <div class="card-body rounded shadow border">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <?php $no = 0; ?>
                        <ol class="carousel-indicators">
                            <?php foreach ($galleryData as $gallery) : ?>
                                <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= esc($no); ?>" class="<?php if ($no == 0) echo 'active'; ?>"></li>
                                <?php $no++; ?>
                            <?php endforeach; ?>
                        </ol>
                        <div class="carousel-inner">
                            <!-- List gallery -->
                            <?php $no = 0; ?>
                            <?php foreach ($galleryData as $gallery) : ?>
                                <div class="carousel-item <?php if ($no == 0) echo 'active'; ?>">
                                    <img src="<?= base_url('media/photos/'); ?>/<?= $gallery->url; ?>" class="d-block w-100">
                                </div>
                                <?php $no++; ?>
                            <?php endforeach; ?>
                        </div>
                        <a class=" carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Akhir About me -->
    <!-- My Projects -->
    <section class="container-fluid" id="MyProjects">
        <div class="row justify-content-center ">
            <div class="col-md-8 text-center">
                <h1 class="efek2 text-success">PREVIEW</h1>
                <button class="btn btn-outline-primary m-1" onclick="showObject('atraction')">Atraction</button>
                <button class="btn btn-outline-primary m-1" onclick="showObject('culinary_place')">Culinary place</button>
                <button class="btn btn-outline-primary m-1" onclick="showObject('souvenir_place')">Souvenir place</button>
                <button class="btn btn-outline-primary m-1" onclick="showObject('worship_place')">Worship place</button>
                <button class="btn btn-outline-primary m-1" onclick="showObject('facility')">Facility</button>
            </div>
        </div>
        <div class="row justify-content-center m-2">
            <div class="col-md-8">
                <?= $this->include('/layout/map-body.php'); ?>
            </div>
        </div>
    </section>
    <!-- Akhir My Projects -->

    <!-- Awal Award  -->
    <div class="container bg-primary facts my-5 py-5 border border-success" id="MyCertificates">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-md-6 col-lg-6 text-center">
                    <img src="media/photos/landing-page/trophy.png" alt="" style="filter: invert(100%); max-width: 4em" class="mb-3">
                    <h1 class="text-white mb-2" data-toggle="counter-up">Top 3</h1>
                    <p class="text-white mb-0">ADWI 2021</p>
                </div>
                <div class="col-md-6 col-lg-6 text-center">
                    <img src="media/photos/landing-page/atraksi.png" alt="" style="filter: invert(100%); max-width: 5em">
                    <h1 class="text-white mb-2" data-toggle="counter-up">2</h1>
                    <p class="text-white mb-0">Uniqe Atraction</p>
                </div>
            </div>
        </div>
    </div>
    <!--  Akhir Award -->
    <!-- Footer Start -->
    <div class="container-fluid footer bg-dark text-light footer mt-5 pt-5 0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-9 col-md-6">
                    <h5 class="text-light mb-4">Address</h5>
                    <p class="mb-2">
                        <i class="fa fa-map-marker-alt me-3"></i>Desa Apar, Kota Pariaman, Sumatera Barat
                    </p>
                    <p class="mb-2">
                        <i class="fa fa-phone-alt me-3"></i>+62 813 7451 9594
                    </p>
                    <p class="mb-2">
                        <i class="fa fa-envelope me-3"></i>apar@gmail.com
                    </p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href="https://www.instagram.com/desa_wisata_apar"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Links</h5>
                    <a class="btn btn-link" href="#landing">Home</a>
                    <a class="btn btn-link" href="<?= base_url('list_object') ?>">Explore</a>
                    <a class="btn btn-link" href="#About">About</a>
                    <a class="btn btn-link" href="#award">Award</a>
                    <a class="btn btn-link" href="<?= base_url('login'); ?>">Login</a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Muhammad Agung Mahardhika</a>, All
                        Right Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
    <!-- Akhir main -->
    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
    <script>
        gsap.to(".bg-content", {
            duration: 2,
            x: 0,
            opacity: 1,
            ease: "bounce"
        }).delay(2);
        let datas
        let geomApar = JSON.parse('<?= $aparData->geoJSON; ?>')
        let latApar = parseFloat(<?= $aparData->lat; ?>)
        let lngApar = parseFloat(<?= $aparData->lng; ?>)
    </script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/js/script.js'); ?>"></script>
    <script src="<?= base_url('assets/js/map.js') ?>"></script>
    <!-- Maps JS -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8B04MTIk7abJDVESr6SUF6f3Hgt1DPAY&callback=initMap"></script>
</body>

</html>