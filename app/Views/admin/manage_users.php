<?= $this->extend('layout/template.php') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">List admin</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">List Admin</h5>
            <a href="<?= base_url('manage_users/insert') ?> " title="Add new admin" role="button" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <?php $no = 1; ?>
                        <tr>
                            <th>No</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Fullname</th>
                            <th>Adress</th>
                            <th>Contact</th>
                            <th class="text-center">Action</th>

                        </tr>

                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $user->email; ?></td>
                                <td><?= $user->username; ?></td>
                                <td><?= $user->fullname; ?></td>
                                <td><?= $user->address; ?></td>
                                <td><?= $user->contact; ?></td>

                                <td class="text-center">
                                    <a class="btn btn-outline-primary btn-sm" title="Edit user" href="<?= base_url('manage_users/detail/' . $user->userid); ?>"><i class="fa fa-eye"></i> </a>
                                    <a class="btn btn-outline-danger btn-sm" title="Delete User" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $user->userid; ?>">
                                        <i class="fa fa-trash"></i>
                                    </a>

                                    <!-- Delete Modal-->
                                    <div class="modal fade" id="deleteModal<?= $user->userid; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Are you sure delete <b>" <?= $user->username; ?> "</b> user?</div>
                                                <div class="modal-footer">
                                                    <a class="btn btn-danger" href="<?= base_url('manage_users/delete/' . $user->userid) ?>">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection() ?>