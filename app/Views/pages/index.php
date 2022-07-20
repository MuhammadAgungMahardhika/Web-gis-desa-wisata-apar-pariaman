<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- My CSS -->
    <link href="/assets/css/main/style.css" rel="stylesheet">

    <title><?= $title; ?></title>

</head>

<body>
    <section class="bg">
        <video autoplay muted poster="/assets/images/bg-movie-ss.PNG" loop class="bg-video">
            <source src="/assets/images/apar/Video/bg-movie.mp4">
        </video>
        <div class="bg-content">
            <h1>Welcome To Apar Tourism Village</h1>
            <p>Pariaman City, West Sumatra, Indonesia</p>

            <a class="btn btn-success " href="<?= base_url('list_object') ?>">Explore Now!</a>
        </div>
    </section>
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

    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>


</html>