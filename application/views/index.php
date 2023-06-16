<div class="mx-auto flex justify-center mt-10">
    <div class="swiper-container relative h-56 sm:h-72 md:h-96 w-full sm:w-10/12 md:w-11/12 lg:w-8/12 xl:w-7/12 2xl:w-6/12 overflow-hidden rounded-lg" style="border-radius: 10px;">
        <div class="swiper-wrapper">
            <?php
            if (!empty($slider)) {
                foreach ($slider as $row) {
            ?>

                    <div class="swiper-slide">
                        <img src="<?= base_url('assets/img/upload/slider/' . $row->image) ?>" alt="<?= $row->nama ?>" />
                    </div>

            <?php
                }
            }
            ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>

<div class="max-w-screen-xl mx-auto mt-10">

    <div class="mt-10">
        <h1 class="text-2xl font-semibold p-3 ">Category</h1>

    </div>
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 mt-10">
        <?php
        if (!empty($category)) {
            foreach ($category as $row) {
        ?>
                <a href="<?= base_url('category/detail/' . $row->slug_category); ?>" class="p-2 border rounded-lg shadow">
                    <div class="flex items-center justify-center h-24">
                        <img src="<?= base_url('assets/img/upload/category/' . $row->image_category) ?>" alt="Category 1" class="h-16" />
                    </div>
                    <div class="mt-2 text-center">
                        <h4 class="text-lg font-semibold"><?= $row->nama_kategori; ?></h4>
                    </div>
                </a>
        <?php
            }
        }
        ?>

    </div>

</div>

<div class="max-w-screen-xl mx-auto mt-10">
    <div class="mt-10">
        <h1 class="text-2xl font-semibold p-3 ">Product</h1>

    </div>
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        <?php if (!empty($product)) {
            foreach ($product as $row) { ?>
                <a href="<?= base_url('product/detail/' . $row->slug_product); ?>">
                    <div class="p-4 border rounded-lg shadow-md bg-white">
                        <div class="relative overflow-hidden">
                            <img src="<?= base_url('assets/img/upload/product/' . $row->image_product) ?>" alt="<?= $row->name; ?>" class="w-full h-32 sm:h-40 object-cover rounded-lg" />
                        </div>
                        <div class="mt-4">
                            <h3 class="text-lg font-semibold text-gray-800">
                                <?= $row->name; ?>
                            </h3>
                            <p class="mt-1 text-gray-600"><?= $row->description; ?></p>
                            <p class="mt-2 text-gray-800 font-semibold">
                                Rp. <?= number_format($row->price, 0) ?>
                            </p>
                        </div>
                    </div>
                </a>
        <?php }
        } ?>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var swiper = new Swiper('.swiper-container', {
            loop: true,
            spaceBetween: 0,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>