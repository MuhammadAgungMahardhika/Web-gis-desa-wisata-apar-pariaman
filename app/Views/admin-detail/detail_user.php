<?= $this->extend('layout/template.php') ?>


<?= $this->section('content') ?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('manage_users') ?>">List admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail admin</li>
        </ol>
    </nav>
    <!-- DataTales  -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Detail User</h6>
            <a href="<?= base_url('manage_users') ?>" title="Back to list " class="small btn btn-primary btn-sm text-right"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        <div class="card-body">
            <div class="row">

                <div class="text-end">
                    <a class="btn btn-outline-primary btn-sm" title="Edit user" href="<?= base_url('manage_users/edit/' . $user->userid); ?>"><i class="fa fa-edit"></i> </a>
                </div>

                <div class="col-md-4 text-center p-4">
                    <img src="<?= base_url('/assets/images/user-photos/') . "/" . $user->user_image; ?>" class="img-fluid rounded-circle py-4" width="250" />
                    <figcaption class="h5"><?= $user->role; ?></figcaption>

                </div>
                <div class="col-md-8">

                    <p> Email : <?= $user->email; ?></p>
                    <p> Username : <?= $user->username;  ?></p>
                    <p> Name : <?= $user->fullname; ?></p>
                    <p> Adress :<?= $user->address;  ?> </p>
                    <p> Contact person : <?= $user->contact; ?></p>


                </div>
            </div>


        </div>
    </div>
</div>


<!-- /.container-fluid -->


<?= $this->endSection() ?>