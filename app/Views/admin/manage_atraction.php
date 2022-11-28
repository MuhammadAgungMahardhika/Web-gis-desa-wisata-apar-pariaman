<?= $this->extend('layout/template.php') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">List atraction</li>
        </ol>
    </nav>
    <!-- DataTales  -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">List Atraction</h5>
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
                        <?php foreach ($objectData as $atraction) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $atraction->name; ?></td>
                                <td class="text-center">
                                    <a class="btn btn-outline-primary btn-sm" title="Detail atraction" href="<?= base_url('manage_atraction/detail/' . $atraction->id); ?>"><i class="fa fa-eye"></i> </a>
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