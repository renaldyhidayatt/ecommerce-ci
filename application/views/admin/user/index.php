<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?php echo $heading; ?></h3>
                <?php if (validation_errors()) { ?>
                    
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= validation_errors(); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>

                <?php
                if ($this->session->flashdata('error_users') != '') {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';

                    echo $this->session->flashdata('error_users');
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                    echo '</div>';
                }
                ?>

                <?php
                if ($this->session->flashdata('success_user') != '') {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';

                    echo $this->session->flashdata('success_user');
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                    echo '</div>';
                }
                ?>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <?php echo $heading; ?>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">

            <div class="card-header">
                <button type="button" class="btn btn-primary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#user"><i class="fas fa-user"></i> Add User</button>
                <a href="<?= base_url('admin/user/laporan_user_pdf'); ?>" class="btn btn-warning btn-sm mb-3"><i class="far fa-file-pdf"></i> Download Pdf</a>
                <a href="<?= base_url('admin/user/export_excel'); ?>" class="btn btn-success btn-sm mb-3"><i class="far fa-file-excel"></i> Export ke Excel</a>
            </div>
            <div class="card-body">

                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Email</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Status</th>
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
                                    <td><?php echo $row->created_at ?></td>
                                    <td><?php echo $row->updated_at ?></td>
                                    <td width="250">
                                        <a href="<?php echo site_url('admin/user/edit/') . $row->user_id; ?>" class="btn btn-success">Edit</a>
                                        <a onclick="return confirm('Are you sure you want to delete this record?');" href="<?php echo site_url('admin/user/delete/' . $row->user_id); ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>