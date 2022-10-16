<?= $this->extend('layout/template.php') ?>


<?= $this->section('content') ?>


<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales  -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">List Event</h5>
            <a href="<?= base_url('manage_event/insert') ?> " title="Add event" role="button" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <?php $no = 1;

                        ?>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Date start</th>
                            <th class="text-center">Action</th>

                        </tr>

                    </thead>
                    <tbody>
                        <?php foreach ($objectData as $event) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $event->name; ?></td>
                                <td><?= $event->date_start; ?></td>
                                <td class="text-center">
                                    <a class="btn btn-outline-primary btn-sm" title="Detail event" href="<?= base_url('manage_event/detail/' . $event->id); ?>"><i class="fa fa-eye"></i> </a>
                                    <a class="btn btn-outline-danger btn-sm" title="Delete Event" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $event->id; ?>">
                                        <i class="fa fa-trash"></i>
                                    </a>

                                    <!-- Delete Modal-->
                                    <div class="modal fade" id="deleteModal<?= $event->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Are you sure delete <b>" <?= $event->name; ?> "</b> event?</div>
                                                <div class="modal-footer">
                                                    <a class="btn btn-danger" href="<?= base_url('manage_event/delete/' . $event->id) ?>">Delete</a>
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