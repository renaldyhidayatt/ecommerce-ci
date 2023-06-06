<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?php echo $heading; ?></h3>
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
                <h3>Edit Role</h3>
            </div>
            <div class="card-body">
                <?= form_error("role"); ?>
                <?php if (!empty($role)) { ?>
                    <?php foreach ($role as $row) { ?>
                        <form action="<?= base_url("admin/role/edit"); ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="role_id" value="<?php echo $row->role_id ?>">
                            <div class="mb-3">
                                <label for="role" class="form-label">Nama Role</label>
                                <input type="text" name="role" value="<?php echo $row->role ?>" class="form-control" id="role" aria-describedby="emailHelp">
                            </div>
                            
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </section>
</div>
