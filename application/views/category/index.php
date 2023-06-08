<div class="max-w-screen-xl mx-auto mt-10">
  <?php if (!empty($slug)): ?>
    <h1 class="text-2xl font-semibold p-3"><?= $slug ?></h1>
  <?php endif; ?>
  
  <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
    <?php if (!empty($category)): ?>
      <?php foreach ($category as $row): ?>
        <a href="<?= base_url('product/detail/' . $row->slug_product) ?>">
          <div class="p-4 border rounded-lg shadow-md bg-white">
            <div class="relative overflow-hidden">
              <img src="<?= base_url('assets/img/upload/product/' . $row->image_product) ?>" class="w-full h-40 object-cover rounded-lg" />
            </div>
            <div class="mt-4">
              <h3 class="text-lg font-semibold text-gray-800">
                <?= $row->name ?>
              </h3>
              <p class="mt-1 text-gray-600"><?= $row->description ?></p>
              <p class="mt-2 text-gray-800 font-semibold">
                Rp. <?= number_format($row->price, 2) ?>
              </p>
            </div>
          </div>
        </a>
      <?php endforeach; ?>
      <?php endif; ?>
  </div>
</div>
