<?= $this->extend('layout/template.php') ?>


<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl col-lg">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header bg-success text-white text-start">
                    <h3 class="m-0 font-weight-bold text-center">About </h3>


                </div>
                <!-- Card Body -->
                <div class="card-body">

                    <div class="row" style="min-height: 100vh;">
                        <div class="col-xl-8 col-lg-8">
                            <p class="text-left">Tourism name : <?= $aparData->name; ?></p>
                            <p class="text-left">Tourism type : <?= $aparData->type_of_tourism; ?></p>
                            <p class="text-left">Tourism adress : <?= $aparData->address; ?></p>
                            <p class="text-justify">Description : <br><?= $aparData->description; ?> </p>
                            <a class="btn btn-outline-success" href="<?= base_url('home') ?>">Explore now !</a>
                        </div>
                        <div class="col-xl-4 col-lg-4 text-center">

                            <img class="shadow rounded" src="/img/apar/bg-about.JPG" width="100%">
                            <figcaption style="font-family: italic; font-size:13px; margin-top:5px">Top 50 Indonesian Tourism Village Award 2021 (ADWI)</figcaption>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>