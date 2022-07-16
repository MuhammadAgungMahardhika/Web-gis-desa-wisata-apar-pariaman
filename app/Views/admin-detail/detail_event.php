<?= $this->extend('layout/template.php') ?>


<?= $this->section('content') ?>


<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales  -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Detail Event</h6>
            <a href="<?= base_url('manage_event') ?>" title="Back to list " class="small btn btn-success btn-sm text-right"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        <div class="card-body">
            <div class="text-end">
                <a href="<?= base_url('manage_event/edit/' . $eventData->id); ?>" role="button" class="btn btn-primary justify-item-center" title="edit apar info"><i class="fa fa-edit"></i></a>
            </div>

            <p> Name of event : <?= $eventData->name; ?></p>
            <p> Schedule : <?= $eventData->schedule; ?></p>
            <p> Price : <?= $eventData->price; ?></p>
            <p> Contact person : <?= $eventData->contact_person; ?></p>
            <p> Description :<br><?= $eventData->description; ?></p>
            <p> Latitide : <?= $eventData->lat; ?></p>
            <p> Longtitude : <?= $eventData->lng; ?></p>


        </div>
    </div>
</div>


<!-- /.container-fluid -->


<?= $this->endSection() ?>