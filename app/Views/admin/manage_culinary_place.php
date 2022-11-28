<?= $this->extend('layout/template.php') ?>


<?= $this->section('content') ?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">List culinary place</li>
        </ol>
    </nav>
    <!-- DataTales  -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">List Culinary Place</h5>
            <a href="<?= base_url('manage_culinary_place/insert') ?> " title="Add culnary place" role="button" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <?php $no = 1;

                        ?>
                        <tr>
                            <th>No</th>
                            <th>Culinary Place Name</th>
                            <th class="text-center">Action</th>

                        </tr>

                    </thead>
                    <tbody>
                        <?php foreach ($culinaryPlaceData as $culinaryPlace) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $culinaryPlace->name; ?></td>
                                <td class="text-center">
                                    <a class="btn btn-outline-primary btn-sm" title="Update atraction" href="<?= base_url('manage_culinary_place/detail/' . $culinaryPlace->id); ?>"><i class="fa fa-eye"></i> </a>
                                    <a class="btn btn-outline-danger btn-sm" title="Delete Culinary Place" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $culinaryPlace->id; ?>">
                                        <i class="fa fa-trash"></i>
                                    </a>

                                    <!-- Delete Modal-->
                                    <div class="modal fade" id="deleteModal<?= $culinaryPlace->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Are you sure delete <b>" <?= $culinaryPlace->name; ?> "</b> culinary place?</div>
                                                <div class="modal-footer">
                                                    <a class="btn btn-danger" href="<?= base_url('manage_culinary_place/delete/' . $culinaryPlace->id) ?>">Delete</a>
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