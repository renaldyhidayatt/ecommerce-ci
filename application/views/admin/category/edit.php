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
                <h3>Edit Category</h3>
            </div>
            <div class="card-body">
                <?= form_error("nama_kategori"); ?>
                <?php if (!empty($category)) { ?>
                    <?php foreach ($category as $row) { ?>
                        <form action="<?= base_url("admin/category/edit"); ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="category_id" value="<?php echo $row->category_id ?>">
                            <div class="mb-3">
                                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                                <input type="text" name="nama_kategori" value="<?php echo $row->nama_kategori ?>" class="form-control" id="nama_kategori" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Gambar</label>
                                <input type="file" name="image" class="form-control" id="image">
                            </div>
                            <div class="mb-3">
                                <label for="current_image" class="form-label">Gambar Saat Ini</label>
                                <br>
                                <?php if ($row->image_category) { ?>
                                    <img src="<?= base_url('assets/img/upload/category/' . $row->image_category) ?>" alt="Current Image" style="width: 200px;">
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
