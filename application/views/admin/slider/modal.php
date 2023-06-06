<div class="modal fade text-left" id="slider" tabindex="-1" role="dialog" aria-labelledby="slider" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="slider">
                    Add Slider
                </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= base_url('admin/slider'); ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <label for="nama">Nama: </label>
                    <div class="form-group">
                        <input id="nama" type="text" name="nama" placeholder="Nama" class="form-control" />
                    </div>
                    <label for="image">image: </label>
                    <div class="form-group">
                        <input type="file" class="form-control" id="image" name="image">
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