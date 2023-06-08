<script>
    function updateQuantity() {
        var quantitySelect = document.getElementById('quantitySelect');
        var selectedQuantity = quantitySelect.options[quantitySelect.selectedIndex].value;
        document.getElementById('quantity').value = selectedQuantity;
    }

    function addToCart() {
        var selectedQuantity = parseInt(document.getElementById('quantity').value);
        if (isNaN(selectedQuantity) || selectedQuantity <= 0) {
            alert('Please select a valid quantity.');
            return;
        }

        var form = document.getElementById('cartForm');
        var formData = new FormData(form);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', form.action, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    alert('Product added to cart successfully.');
                    window.location.href = '<?= base_url(); ?>';
                } else {
                    alert('An error occurred while adding the product to cart.');
                }
            }
        };
        xhr.send(formData);
    }
</script>


<div class="max-w-screen-xl mx-auto mt-10">
    <div class="flex flex-col md:flex-row">
        <?php if (!empty($product)) {
            foreach ($product as $row) { ?>
                <div class="md:w-1/2 mb-4 md:mb-0">
                    <img src="<?= base_url('assets/img/upload/product/' . $row->image_product) ?>" alt="<?= $row->name; ?>" class="w-full h-auto" />
                </div>

                <div class="md:w-1/2 md:pl-8">
                    <div class="bg-white shadow p-4 rounded-md">
                        <h1 class="text-xl xl:text-2xl font-medium mb-4">
                            <?= $row->name; ?>
                        </h1>

                        <p class="mt-2 text-gray-600"><?= $row->description; ?></p>

                        <div class="mt-6">
                            <h1>Selected Quantity</h1>
                            <select id="quantitySelect" name="quantity" onchange="updateQuantity();" class="border border-gray-300 rounded-md py-2 px-4">
                                <option value="pilih quantity">Pilih quantity</option>
                                <?php
                                for ($i = 1; $i <= $row->countInStock; $i++) {
                                    echo "<option value='$i'>$i</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <p class="mt-6 text-gray-800 font-semibold">
                            Rp.<?= $row->price; ?>
                        </p>

                        <div class="mt-6">
                            <?php if ($row->countInStock > 0) { ?>
                                <form id="cartForm" action="<?= base_url('cart/create') ?>" method="POST">
                                    <input type='hidden' name='name' value='<?= $row->name; ?>'>
                                    <input type='hidden' name='price' value='<?= $row->price; ?>'>
                                    <input type='hidden' name='product_id' value='<?= $row->product_id; ?>'>
                                    <input type='hidden' name='image_product' value='<?= $row->image_product; ?>'>
                                    <input type="hidden" id="quantity" name="quantity" />

                                    <?php if ($this->session->userdata('email')) { ?>
                                        <button class="bg-gray-800 text-white py-2 px-4 rounded-md mt-6" type="button" onclick="addToCart();">
                                            Add to Cart
                                        </button>
                                    <?php } else { ?>
                                        <button class="bg-gray-300 text-gray-500 py-2 px-4 rounded-md cursor-not-allowed" disabled>
                                            Add to Cart
                                        </button>
                                    <?php } ?>
                                </form>
                            <?php } else { ?>
                                <div>
                                    <h1>Out Of Stock</h1>
                                    <button class="bg-gray-300 text-gray-500 py-2 px-4 rounded-md cursor-not-allowed" disabled>
                                        Add to Cart
                                    </button>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
        <?php }
        } ?>
    </div>
</div>
