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
                <h3>Edit User</h3>
            </div>
            <div class="card-body">
                <?= form_error("firstname"); ?>
                <?= form_error("lastname"); ?>
                <?= form_error("email"); ?>
                <?= form_error("password"); ?>
                <?php if (!empty($user)) { ?>
                    <?php foreach ($user as $row) { ?>
                        <form action="<?= base_url(); ?>admin/user/edit" method="POST">
                            <input type="hidden" name="id" value="<?php echo $row->user_id ?>">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Firstname</label>
                                <input type="text" name="firstname" value="<?php echo $row->firstname ?>" class="form-control" id="nama" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="lastname" class="form-label">Lastname</label>
                                <input type="text" name="lastname" value="<?php echo $row->lastname ?>" class="form-control" id="nama" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" value="<?php echo $row->email ?>" class="form-control" id="nama" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" value="<?php echo $row->password ?>" class="form-control" id="nama" aria-describedby="emailHelp">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </section>
</div>