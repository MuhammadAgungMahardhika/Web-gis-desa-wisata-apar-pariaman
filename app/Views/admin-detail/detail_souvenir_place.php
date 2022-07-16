<?= $this->extend('layout/template.php') ?>


<?= $this->section('content') ?>


<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales  -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Detail Souvenir Place</h6>
            <a href="<?= base_url('manage_souvenir_place') ?>" title="Back to list " class="small btn btn-success btn-sm text-right"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        <div class="card-body">
            <div class="text-end">
                <a href="<?= base_url('manage_souvenir_place/edit/' . $souvenirPlaceData->id); ?>" role="button" class="btn btn-primary justify-item-center" title="edit apar info"><i class="fa fa-edit"></i></a>
            </div>

            <p> Name of Souvenir Place : <?= $souvenirPlaceData->name; ?></p>
            <p> Description :<br><?= $souvenirPlaceData->description; ?></p>
            <p> Latitide : <?= $souvenirPlaceData->lat; ?></p>
            <p> Longtitude : <?= $souvenirPlaceData->lng; ?></p>


        </div>
    </div>
</div>


<!-- /.container-fluid -->


<?= $this->endSection() ?>