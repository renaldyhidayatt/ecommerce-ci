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
                if ($this->session->flashdata('error_role') != '') {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';

                    echo $this->session->flashdata('error_role');
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                    echo '</div>';
                }
                ?>

                <?php
                if ($this->session->flashdata('success_role') != '') {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';

                    echo $this->session->flashdata('success_role');
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
                <button type="button" class="btn btn-primary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#role"><i class="fas fa-user"></i> Add Role</button>

            </div>
            <div class="card-body">

                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Role</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($role)) {
                            foreach ($role as $row) {
                        ?>
                                <tr>
                                    <td><?php echo $row->role_id ?></td>
                                    <td><?php echo $row->role ?></td>
                                   
                                    <td><?php echo $row->created_at ?></td>
                                    <td><?php echo $row->updated_at ?></td>
                                    <td width="250">
                                        <a href="<?php echo site_url('admin/role/edit/') . $row->role_id; ?>" class="btn btn-success">Edit</a>
                                        <a onclick="return confirm('Are you sure you want to delete this record?');" href="<?php echo site_url('admin/role/delete/' . $row->role_id); ?>" class="btn btn-danger">Delete</a>
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