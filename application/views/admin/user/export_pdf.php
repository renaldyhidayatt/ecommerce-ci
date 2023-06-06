<style>
    .container-fluid {
        margin-top: 20px;
    }

    .btn {
        margin-right: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }
</style>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <a href="<?= base_url('admin/user/laporan_user_pdf'); ?>" class="btn btn-warning btn-sm mb-3"><i class="far fa-file-pdf"></i> Download Pdf</a>
            <a href="<?= base_url('admin/user/export_excel'); ?>" class="btn btn-success btn-sm mb-3"><i class="far fa-file-excel"></i> Export ke Excel</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($user)) {
                        foreach ($user as $row) {
                    ?>
                            <tr>
                                <td><?php echo $row->user_id ?></td>
                                <td><?php echo $row->firstname ?></td>
                                <td><?php echo $row->lastname ?></td>
                                <td><?php echo $row->email ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
