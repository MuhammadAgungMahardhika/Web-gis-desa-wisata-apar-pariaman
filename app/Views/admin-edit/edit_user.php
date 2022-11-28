<?= $this->extend('layout/template.php') ?>


<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('manage_users') ?>">List admin</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('manage_users/detail/' . $user->userid); ?>">Detail admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit admin</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col">
            <div class="card mb-3">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">Edit User</h6>
                    <a href="<?= base_url('manage_users/detail/' . $user->userid) ?>" title="Back to detail admin" class="small btn btn-primary btn-sm text-right"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
                <div class="row g-0">
                    <div class="col-md-2 text-center p-3">
                        <img src="<?= base_url('/assets/images/user-photos/') . "/" . $user->user_image; ?>" class="img-fluid rounded-circle py-4" width="250" />
                        <figcaption class="h5"><?= $user->role; ?></figcaption>

                    </div>
                    <div class="col-md-8">

                        <div class="card-body">

                            <form action="<?= base_url('manage_users/save_update/' . $user->userid); ?>" method="post" autocomplete="off">
                                <div class="form-group">
                                    <label for="username" class=" col col-form-label">Username</label>
                                    <div class="col">
                                        <input type="text" class="form-control" name="username" value="<?= $user->username; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col col-form-label">Email</label>
                                    <div class="col">
                                        <input type="text" class="form-control" name="email" value="<?= $user->email; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class=" col col-form-label">Name</label>
                                    <div class="col">
                                        <input type="text" class="form-control" name="name" value="<?= $user->fullname; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address" class=" col col-form-label">Address</label>
                                    <div class="col">
                                        <input type="text" class="form-control" name="address" value="<?= $user->address; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="contact" class=" col col-form-label">Contact</label>
                                    <div class="col">
                                        <input type="text" class="form-control" name="contact" value="<?= $user->contact; ?>">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success btn-sm">Save</button>
                                <button type="reset" class="btn btn-danger btn-sm">cancel</button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?= $this->endSection() ?>