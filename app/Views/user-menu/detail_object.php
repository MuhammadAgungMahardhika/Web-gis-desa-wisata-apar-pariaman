<?= $this->extend('layout/template.php') ?>


<?= $this->section('content') ?>

<section class="section">
    <div class="row">

        <!-- Object Detail Information -->
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-center">Object Information</h4>
                    <div class="text-center">
                        <span class="material-symbols-outlined rating-color">star</span>
                        <span class="material-symbols-outlined rating-color">star</span>
                        <span class="material-symbols-outlined rating-color">star</span>
                        <span class="material-symbols-outlined rating-color">star</span>
                        <span class="material-symbols-outlined">star</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td class="fw-bold">Name</td>
                                        <td><?= $objectData->name; ?></td>
                                    </tr>

                                    <?php if ($objectData->status) : ?>
                                        <tr>
                                            <td class="fw-bold">Status</td>
                                            <td><?= $objectData->status; ?></td>
                                        </tr>
                                    <?php endif; ?>

                                    <tr>
                                        <td class="fw-bold">Ticket Price</td>
                                        <td>Rp 20.000</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Contact Person</td>
                                        <td>08123456789</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="fw-bold">Description</p>
                            <p><?= $objectData->description; ?>
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            <!--Rating and Review Section-->


        </div>

        <div class="col-md-6 col-12">
            <!-- Object Location on Map -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Google Maps</h5>
                </div>

                <!-- Object Map body -->

            </div>

            <!-- Object Media -->

        </div>
    </div>
</section>

<?= $this->endSection() ?>