<?= $this->extend('layout/template.php') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales  -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">List Package</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <?php $no = 1; ?>
                        <tr>
                            <th>No</th>

                            <th>Name</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($objectData as $package) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $package->name; ?></td>
                                <td class="text-center">
                                    <a class="btn btn-outline-primary btn-sm" title="Detail package" href="<?= base_url('manage_atraction/detail/' . $package->id); ?>"><i class="fa fa-eye"></i> </a>
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