<?= $this->extend('layout/template.php') ?>


<?= $this->section('content') ?>


<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales  -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Detail worship Place</h6>
            <a href="<?= base_url('manage_worship_place') ?>" title="Back to list " class="small btn btn-success btn-sm text-right"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        <div class="card-body">
            <div class="text-end">
                <a href="<?= base_url('manage_worship_place/edit/' . $worshipPlaceData->id); ?>" role="button" class="btn btn-primary justify-item-center" title="edit apar info"><i class="fa fa-edit"></i></a>
            </div>

            <p> Name of worship Place : <?= $worshipPlaceData->name; ?></p>
            <p> Description :<br><?= $worshipPlaceData->description; ?></p>
            <p> Latitide : <?= $worshipPlaceData->lat; ?></p>
            <p> Longtitude : <?= $worshipPlaceData->lng; ?></p>


        </div>
    </div>
</div>


<!-- /.container-fluid -->


<?= $this->endSection() ?>