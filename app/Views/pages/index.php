<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />


    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('assets/css/landing-page/bootstrap.min.css') ?>" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('assets/lib/animate/animate.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/lib/lightbox/css/lightbox.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/lib/owlcarousel/assets/owl.carousel.min.css') ?>" rel="stylesheet" />
    <!-- Third Party CSS and JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/de7d18ea4d.js" crossorigin="anonymous"></script>

    <!-- My CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/main/style.css') ?>" />
    <title><?= $title ?></title>
</head>

<body>
    <!-- Awal landing -->
    <section class="container-fluid" id="landing">
        <div class="row">
            <div class="col">
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
                                <a class="nav-link" href="<?= base_url('list_object'); ?>">EXPLORE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#About">ABOUT</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#MyProjects">PREVIEW</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#MyCertificates">CERTIFICATES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#MyContacts">GET IN TOUCH</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- Akhir navigasi -->
                <div class="bg" id="bg">
                    <video autoplay muted poster="<?= base_url('/assets/images/bg-movie-ss.PNG') ?>" loop class="bg-video">
                        <source src="<?= base_url('media/videos/' . $aparData->video_url); ?>">
                    </video>
                    <div class="bg-content">
                        <h1 style="color: #eaeaea;">Welcome To Apar Tourism Village</h1>
                        <p>Pariaman City, West Sumatra, Indonesia</p>
                        <a class="btn btn-success " href="<?= base_url('list_object') ?>">Explore Now!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir landing -->

    <!-- About  -->
    <section class="container-fluid" id="About">
        <div class="row text-center">
            <div class="col">
                <h2 class="efek1">ABOUT APAR</h2>
                <p style="text-align: justify">
                    <?= $aparData->description; ?>
                </p>
            </div>
        </div>
    </section>
    <!-- Akhir About me -->
    <!-- My Projects -->
    <section class="container-fluid" id="MyProjects">
        <div class="row text-center">
            <div class="col">
                <h2 class="efek2">PREVIEW</h2>
                <button class="btn btn-success" onclick="showObject('atraction')">Atraction</button>
                <button class="btn btn-success" onclick="showObject('event')">Event</button>
                <button class="btn btn-success" onclick="showObject('culinary_place')">Culinary place</button>
                <button class="btn btn-success" onclick="showObject('souvenir_place')">Souvenir place</button>
                <button class="btn btn-success" onclick="showObject('worship_place')">Worship place</button>
                <button class="btn btn-success" onclick="showObject('facility')">Facility</button>
            </div>
        </div>
        <div class="row justify-content-center m-2">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <?= $this->include('/layout/map-body.php'); ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Akhir My Projects -->

    <!-- Awal My Certificate -->
    <section class="container-fluid text-center" id="MyCertificates">
        <div class="row">
            <div class="col">
                <h2 class="efek3">Award</h2>
            </div>
        </div>
    </section>
    <!-- Akhir My Cerficate -->
    <!-- Awal Award  -->
    <div class="container-xxl bg-primary facts my-5 py-5" id="MyCertificates">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-md-6 col-lg-6 text-center">
                    <img src="media/photos/landing-page/trophy.png" alt="" style="filter: invert(100%); max-width: 4em" class="mb-3">
                    <h1 class="text-white mb-2" data-toggle="counter-up">50</h1>
                    <p class="text-white mb-0">Besar ADWI 2021</p>
                </div>
                <div class="col-md-6 col-lg-6 text-center  " 0.3s">
                    <img src="media/photos/landing-page/rumah-gadang.png" alt="" style="filter: invert(100%); max-width: 5em">
                    <h1 class="text-white mb-2" data-toggle="counter-up">70</h1>
                    <p class="text-white mb-0">Rumah Gadang</p>
                </div>
            </div>
        </div>
    </div>
    <!--  Akhir Award -->
    <!-- Footer Start -->
    <div class="container-fluid footer bg-dark text-light footer mt-5 pt-5  " 0.1s">
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
                        <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/Kampuang%20Minang%20Nagari%20Sumpu"><i class="fab fa-facebook-f"></i></a>
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
    <script src="<?= base_url('/assets/js/map.js') ?>"></script>
    <!-- Maps JS -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8B04MTIk7abJDVESr6SUF6f3Hgt1DPAY&callback=initMap"></script>
</body>

</html>