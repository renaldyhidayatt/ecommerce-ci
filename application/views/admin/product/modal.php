<div class="modal fade text-left" id="product" tabindex="-1" role="dialog" aria-labelledby="product" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="product">
                    Add Kategori
                </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= base_url('admin/product'); ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <label for="name_produk">Nama Produk: </label>
                    <div class="form-group">
                        <input id="name_produk" type="text" name="name" placeholder="Nama Produk" class="form-control" />
                    </div>
                    <label for="image">Gambar: </label>
                    <div class="form-group">
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <label for="category_id">ID Kategori: </label>
                    <div class="form-group">
                        <select name="category_id" class="form-control">
                            <option value="">Pilih Kategori</option>
                            <?php foreach ($category as $k) { ?>
                            <option value="<?= $k->category_id;?>"><?= $k->nama_kategori;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <label for="description">Deskripsi: </label>
                    <div class="form-group">
                        <textarea id="description" name="description" placeholder="Deskripsi" class="form-control"></textarea>
                    </div>
                    <label for="price">Harga: </label>
                    <div class="form-group">
                        <input id="price" type="text" name="price" placeholder="Harga" class="form-control" />
                    </div>
                    <label for="countInStock">Jumlah Stok: </label>
                    <div class="form-group">
                        <input id="countInStock" type="text" name="countInStock" placeholder="Jumlah Stok" class="form-control" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Adding</span>
                    </button>
                </div>
            </form>
            
        </div>
    </div>
</div>
