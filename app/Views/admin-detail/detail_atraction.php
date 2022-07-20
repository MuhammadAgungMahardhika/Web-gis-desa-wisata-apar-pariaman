<?= $this->extend('layout/template.php') ?>


<?= $this->section('content') ?>


<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales  -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Detail Atraction</h6>
            <a href="<?= base_url('manage_atraction') ?> " title="Back to list" role="button" class="btn btn-success btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        <div class="card-body">
            <div class="text-end">
                <a href="<?= base_url('manage_atraction/edit/' . $atractionData->id); ?>" role="button" class="btn btn-primary justify-item-center" title="edit apar info"><i class="fa fa-edit"></i></a>
            </div>

            <p> Name of Atraction : <?= $atractionData->name; ?></p>
            <p> Employe: <?= $atractionData->employe; ?></p>
            <p> Price : <?= $atractionData->price; ?></p>
            <p> Contact person : <?= $atractionData->contact_person; ?></p>
            <p> Description :<br><?= $atractionData->description; ?></p>
            <p> Latitide : <?= $atractionData->lat; ?></p>
            <p> Longtitude : <?= $atractionData->lng; ?></p>


        </div>
    </div>
</div>


<!-- /.container-fluid -->


<?= $this->endSection() ?>