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
                <h3>Edit Product</h3>
            </div>
            <div class="card-body">
                <?= form_error("name"); ?>
                <?= form_error("category_id"); ?>
                <?= form_error("description"); ?>
                <?= form_error("price"); ?>
                <?= form_error("countInStock"); ?>
                <?= form_error("image"); ?>
                <?php if (!empty($product)) { ?>
                    <?php foreach ($product as $row) { ?>
                        <form action="<?= base_url("admin/product/edit"); ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="product_id" value="<?php echo $row->product_id ?>">
                            <label for="name_produk">Nama Produk: </label>
                            <div class="form-group">
                                <input id="name_produk" type="text" name="name" value="<?php echo $row->name ?>" placeholder="Nama Produk" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Gambar</label>
                                <input type="file" name="image" class="form-control" id="image">
                            </div>
                            <div class="form-group">
                                <label for="current_image" class="form-label">Gambar Saat Ini</label>
                                <br>
                                <?php if ($row->image_product) { ?>
                                    <img src="<?= base_url('assets/img/upload/product/' . $row->image_product) ?>" alt="Current Image" style="width: 200px;">
                                <?php } else { ?>
                                    <span>Tidak ada gambar</span>
                                <?php } ?>
                            </div>
                            <label for="category_id">ID Kategori: </label>
                            <div class="form-group">
                                <select name="category_id" class="form-control">
                                    <option value="">Pilih Kategori</option>
                                    <?php foreach ($category as $k) { ?>
                                        <option value="<?= $k->category_id; ?>"><?= $k->nama_kategori; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <label for="description">Deskripsi: </label>
                            <div class="form-group">
                                <textarea id="description" name="description" placeholder="Deskripsi" class="form-control"><?php echo $row->description; ?></textarea>
                            </div>

                            <label for="price">Harga: </label>
                            <div class="form-group">
                                <input id="price" type="text" name="price" value="<?php echo $row->price ?>" placeholder="Harga" class="form-control" />
                            </div>
                            <label for="countInStock">Jumlah Stok: </label>
                            <div class="form-group">
                                <input id="countInStock" type="text" name="countInStock" value="<?php echo $row->countInStock; ?>" placeholder="Jumlah Stok" class="form-control" />
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </section>
</div>