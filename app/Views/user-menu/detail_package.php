<?= $this->extend('layout/template.php') ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="row">
        <!-- Object Detail Information -->
        <div class="col-md-6 col-12">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 font-weight-bold  text-center"> Detail Package</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-border">
                                <tbody>
                                    <tr>
                                        <td class="fw-bold">Name</td>
                                        <td><?= $objectData->name; ?></td>
                                    </tr>

                                    <tr>
                                        <td class="fw-bold">Price</td>
                                        <td><?= $objectData->price; ?> IDR</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Minimal</td>
                                        <td><?= $objectData->min_capacity; ?> people</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Contact</td>
                                        <td><?= $objectData->contact_person; ?></td>
                                    </tr>
                                    <tr class="text-center">
                                        <td class="fw-bold" colspan="2">Description</td>
                                    </tr>
                                    <tr class="border">
                                        <td style="text-align: justify;" colspan="2"><?= $objectData->description; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <!-- Object Location on Map -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Facility</h5>
                </div>
                <div class="card-body">
                    <?php $no = 1; ?>
                    <?php foreach ($facilityPackage as $facility) : ?>

                        <table class="">
                            <tr>
                                <td class="">
                                    <?= $no++; ?>.
                                </td>
                                <td class="ps-1">
                                    <?= $facility->name; ?>
                                </td>
                            </tr>
                        </table>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Object Detail Information -->
        <div class="col-12">
            <div class="row">
                <div class="card">
                    <div class="card-header">

                        <h5 class="m-0 font-weight-bold  text-center"> Activities</h5>
                    </div>
                    <div class="card-body">
                        <div class="row d-flex">
                            <?php $no = 0; ?>
                            <?php foreach ($activitiesData as $activities) : ?>
                                <div class="col-md-12">
                                    <div class="card mb-3 shadow-sm">
                                        <div class="row g-0">
                                            <div class="col-md-5 p-1">
                                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                                    <ol class="carousel-indicators">
                                                        <?php foreach ($activities as $gallery) : ?>
                                                            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= esc($no); ?>" class="<?php if ($no == 0) echo 'active'; ?>"></li>
                                                        <?php endforeach; ?>
                                                    </ol>
                                                    <div class="carousel-inner">
                                                        <!-- List gallery -->
                                                        <?php $no_image = 0; ?>
                                                        <?php foreach ($activities as $gallery) : ?>
                                                            <?php dd($activitiesData) ?>
                                                            <div class="carousel-item <?php if ($no_image == 0) echo 'active'; ?>">
                                                                <img src="<?= base_url('media/photos/activities/'); ?>/<?= $gallery[$no_image]->url; ?>" class="d-block w-100">
                                                            </div>
                                                            <?php $no_image++ ?>
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
                                            <div class="col-md-7">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?= $activities->name; ?></h5>
                                                    <p class="card-text"><?= $activities->description; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $no++; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<?= $this->endSection() ?>