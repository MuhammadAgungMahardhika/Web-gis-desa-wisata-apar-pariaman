<?= $this->extend('layout/template.php') ?>


<?= $this->section('content') ?>


<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales  -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Manage Apar's Information</h6>


        </div>
        <div class="card-body">
            <div class="text-end">
                <a href="<?= base_url('manage_apar/edit/' . $aparData->id); ?>" role="button" class="btn btn-primary justify-item-center" title="edit apar info"><i class="fa fa-edit"></i></a>
            </div>

            <p> Name of tourism : <?= $aparData->name; ?></p>
            <p> Type of tourism : <?= $aparData->type_of_tourism; ?></p>
            <p> Adress : <?= $aparData->address; ?></p>
            <p> Contact person : <?= $aparData->contact_person; ?></p>
            <p> Description :<br><?= $aparData->description; ?></p>
            <p> Latitide : <?= $aparData->lat; ?></p>
            <p> Longtitude : <?= $aparData->lng; ?></p>


        </div>
    </div>
</div>


<!-- /.container-fluid -->



<?php
if (session()->getFlashdata('success')) : ?>
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '<?php echo session()->getFlashdata('success') ?>',
            showConfirmButton: false,
            timer: 1500
        })
    </script>

<?php elseif (session()->getFlashdata('failed')) : ?>
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: '<?php echo session()->getFlashdata('failed') ?>',
            showConfirmButton: false,
            timer: 1500
        })
    </script>

<?php endif; ?>
<!-- Akhir Flash Message -->

<?= $this->endSection() ?>