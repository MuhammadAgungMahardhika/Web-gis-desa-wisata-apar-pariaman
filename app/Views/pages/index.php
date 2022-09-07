<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/9d17737383.js" crossorigin="anonymous"></script>
    <!-- My CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/main/style.css') ?>" />
    <title><?= $title ?></title>
</head>

<body>
    <!-- Awal Header -->
    <section class="container-fluid" id="landing">
        <!-- Awal navigasi -->
        <nav class="container navbar navbar-expand-lg navbar-light" id="Nav">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-example" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbar-example">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('list_object'); ?>">EXPLORE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#About">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#MyProjects">MY PROJECTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#MyCertificates">CERTIFICATES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#MyContacts">GET IN TOUCH</a>
                    </li>
                    <!-- <a href="#home" class="nav-item nav-link active">Home</a>
                    <a href="/web" class="nav-item nav-link">Explore</a>
                    <a href="#about" class="nav-item nav-link">About</a>
                    <a href="#award" class="nav-item nav-link">Award</a> -->
                </ul>
            </div>
        </nav>
        <!-- Akhir navigasi -->
        <div class="bg">
            <video autoplay muted poster="<?= base_url('/assets/images/bg-movie-ss.PNG') ?>" loop class="bg-video">
                <source src="<?= base_url('media/videos/' . $aparData->video_url); ?>">
            </video>
            <div class="bg-content">
                <h1>Welcome To Apar Tourism Village</h1>
                <p>Pariaman City, West Sumatra, Indonesia</p>
                <a class="btn btn-success " href="<?= base_url('list_object') ?>">Explore Now!</a>
            </div>
        </div>
    </section>

    <!-- Akhir header -->
    <!-- About me -->
    <section class="container-fluid text-center" id="About">
        <article class="row">
            <h2 class="efek1">ABOUT APAR</h2>
            <div class="col">
                <p style="text-align: justify">
                    <?= $aparData->description; ?>
                </p>
            </div>
        </article>
    </section>
    <!-- Akhir About me -->

    <!-- My Projects -->
    <section class="container-fluid text-center" id="MyProjects">
        <div class="row">
            <h2 class="efek2">MY PROJECTS</h2>
            <div class="col allcard">
                <div class="card" style="width: 18rem">
                    <a href="https://stimik.herokuapp.com/">
                        <img src="images/2.png" class="card-img-top" alt="..." sizes="300" />
                        <div class="card-body">
                            <h5 class="card-title">
                                Web Design- Stimik Indonesia Festivals
                            </h5>
                            <p class="card-text">
                                Landing web design with ocean theme by using
                                HTML,CSS,Bootsrap,Javascript and Jquery
                            </p>
                        </div>
                    </a>
                </div>
                <div class="card" style="width: 18rem">
                    <a href="https://greenfoot.org/scenarios/25077">
                        <img src="images/3.png" class="card-img-top" alt="..." sizes="300" />
                        <div class="card-body">
                            <h5 class="card-title">Game- Honey Bear Survive</h5>
                            <p class="card-text">
                                A simple shooting game using Java with greenfoot's app
                            </p>
                        </div>
                    </a>
                </div>
                <div class="card" style="width: 18rem">
                    <a href="https://batubusuak.wordpress.com/">
                        <img src="images/4.png" class="card-img-top" alt="..." sizes="300" />
                        <div class="card-body">
                            <h5 class="card-title">
                                Blog- Batu Busuk Destination Tourism Web
                            </h5>
                            <p class="card-text">
                                A website that provide information of Batu Busuk destination
                                Tourism in Lambung Bukit/ Pauh/ Padang City/ West Sumatra.
                                By using Wordpress.com
                            </p>
                        </div>
                    </a>
                </div>
                <div class="card" style="width: 18rem">
                    <a href="https://github.com/MuhammadAgungMahardhika/Aplikasi-Logistik-Gudang-Farmasi-Dinas-Kesehatan-Prov.Sumbar">
                        <img src="images/5.png" class="card-img-top" alt="..." sizes="300" />
                        <div class="card-body">
                            <h5 class="card-title">
                                Web Aplication- West Sumatra Provincial Health Service
                                Pharmacy Logistics Application
                            </h5>
                            <p class="card-text">
                                A web application that can manage logistics goods in
                                pharmacy warehouses using HTML, CSS, Bootstrap, Javascript,
                                Jquery, PHP, Mysql server and other library/plugins
                            </p>
                        </div>
                    </a>
                </div>
                <div class="card" style="width: 18rem">
                    <a href="https://github.com/MuhammadAgungMahardhika/lumen_api">
                        <img src="images/Lumen.jpg" class="card-img-top" alt="..." sizes="300" />
                        <div class="card-body">
                            <h5 class="card-title">
                                API- API for My Android Mobile Project
                            </h5>
                            <p class="card-text">
                                An api for my android mobile application for booking gym in
                                Padang City, West Sumatra. By using Lumen PHP Framework
                            </p>
                        </div>
                    </a>
                </div>
                <div class="card" style="width: 18rem">
                    <a href="https://github.com/MuhammadAgungMahardhika/Pafitness">
                        <img src="images/Android.jpeg" class="card-img-top" alt="..." sizes="300" />
                        <div class="card-body">
                            <h5 class="card-title">Android- Mobile Aplication</h5>
                            <p class="card-text">
                                An android mobile aplication for searching gym in Padang
                                City. By using Java, Firebase Auth, API, PostrgreSQL, Google
                                Maps API
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir My Projects -->

    <!-- Awal My Certificate -->
    <section class="container-fluid text-center" id="MyCertificates">
        <div class="row">
            <h2 class="efek3">CERTIFICATES</h2>

        </div>
    </section>

    <!-- Akhir My Cerficate -->
    <!-- My Contacts -->
    <section class="container-fluid text-center" id="MyContacts">
        <div class="row">
            <h2 class="efek4">GET IN TOUCH</h2>
            <div class="col-md-12 text-center">
                <a href="https://muhammadagungmahardhika.wordpress.com/"><i class="fa-brands fa-wordpress fa-3x p-2"></i></a>
                <a href="https://medium.com/@m.agungmahardika12"><i class="fa-brands fa-medium fa-3x p-2"></i></a>
                <a href="https://www.instagram.com/m.agungmahardhika/"><i class="fa-brands fa-instagram fa-3x p-2"></i></a>
                <a href="https://www.linkedin.com/in/muhammad-agung-mahardhika-ba1b39203/"><i class="fa-brands fa-linkedin fa-3x p-2"></i></a>
                <a href="https://wa.me/6281373517899"><i class="fa-brands fa-whatsapp fa-3x p-2"></i></a>
                <a href="https://github.com/MuhammadAgungMahardhika"><i class="fa-brands fa-github fa-3x p-2"></i></a>
            </div>
        </div>
    </section>
    <!-- Akhir My Contacts -->
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
    </script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/js/script.js'); ?>"></script>
</body>

</html>