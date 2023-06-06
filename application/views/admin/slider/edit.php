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
                <h3>Edit Slider</h3>
            </div>
            <div class="card-body">
                <?= form_error("nama"); ?>
                <?php if (!empty($slider)) { ?>
                    <?php foreach ($slider as $row) { ?>
                        <form action="<?= base_url("admin/slider/edit"); ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="slider_id" value="<?php echo $row->slider_id ?>">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" value="<?php echo $row->nama ?>" class="form-control" id="nama" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Gambar</label>
                                <input type="file" name="image" class="form-control" id="image">
                            </div>
                            <div class="mb-3">
                                <label for="current_image" class="form-label">Gambar Saat Ini</label>
                                <br>
                                <?php if ($row->image) { ?>
                                    <img src="<?= base_url('assets/img/upload/slider/' . $row->image) ?>" alt="Current Image" style="width: 200px;">
                                <?php } else { ?>
                                    <span>Tidak ada gambar</span>
                                <?php } ?>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </section>
</div>
