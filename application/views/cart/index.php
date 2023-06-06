<div class="relative overflow-x-auto">
    <div class="flex justify-center">
        <div class="w-full md:w-2/3 card text-center shadow-lg p-3 mb-5 bg-white rounded">
            <div class="text-center m-5">My Cart</div>
            <div class="overflow-x-auto mt-10">
                <table class="table-auto w-full text-sm text-left">
                    <thead>
                        <tr>
                            <th class="border border-gray-800 p-2">Name</th>
                            <th class="border border-gray-800 p-2">Quantity</th>
                            <th class="border border-gray-800 p-2">Price</th>
                            <th class="border border-gray-800 p-2">Total Price</th>
                            <th class="border border-gray-800 p-2">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $subtotal = 0; // Inisialisasi subtotal
                        $totalProducts = 0; // Inisialisasi total produk
                        foreach ($cart as $row) {
                            $totalProducts += $row->quantity; // Tambahkan jumlah produk ke total produk
                        ?>
                            <tr>
                                <td class="border border-gray-800 px-4 py-2"><?php echo $row->name ?></td>
                                <td class="border border-gray-800 px-4 py-2"><?php echo $row->quantity ?></td>
                                <td class="border border-gray-800 px-4 py-2"><?php echo $row->price ?></td>
                                <td class="border border-gray-800 px-4 py-2"><?php echo $row->quantity * $row->price; ?></td>
                                <td class="border border-gray-800 px-4 py-2">
                                    <a onclick="return confirm('Are you sure you want to delete this record?');" href="<?= base_url('cart/delete/' . $row->cart_id); ?>">
                                        <i style="color: red" class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                            $subtotal += $row->quantity * $row->price; // Tambahkan subtotal dengan total harga untuk setiap produk
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <hr />
            <h2 class="text-center">SubTotal: Rp:<?php echo $subtotal; ?></h2>
            <p class="text-center">Total Products: <?php echo $totalProducts; ?></p>
            <hr />
            <div class="flex justify-center">
                <div id="paypal-button-container"></div>
            </div>
        </div>
    </div>
</div>


<style>
    #paypal-button-container .paypal-button-container {
        transform: scale(0.8);
        transform-origin: center;
    }
</style>

<script src="https://www.paypal.com/sdk/js?client-id=AWB0KnJcTsTgLbSZbr9VJTJx3Llrwy6e9DurXdi5Ir1VN2zIFvRq62hoVo9W54zi8Ghpob-D8VHDx-dz" data-sdk-integration-source="button-factory"></script>
<script>
    function generateOrderID() {
        var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var length = 10;
        var orderID = '';
        for (var i = 0; i < length; i++) {
            var randomIndex = Math.floor(Math.random() * characters.length);
            orderID += characters.charAt(randomIndex);
        }
        return orderID;
    }



    var baseUrl = '<?php echo base_url(); ?>';

    var orderID = generateOrderID();

    function updateProductQuantities() {
        var products = <?php echo json_encode($cart); ?>;
        var formData = new FormData();

        console.log("products", products);

        formData.append('cart', JSON.stringify(products));

        fetch(`${baseUrl}product/updateQuantity`, {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                console.log('Product quantity updated: ', data);
            })
            .catch(error => {
                console.error('Error updating product quantity: ', error);
            });
    }





    function createOrder(postData) {
        fetch(`${baseUrl}order/create`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: Object.keys(postData)
                    .map((key) => encodeURIComponent(key) + '=' + encodeURIComponent(postData[key]))
                    .join('&')
            })
            .then(response => response.text())
            .then(data => {

                window.location.reload();

                console.log(data);
            })
            .catch(error => {
                alert('Error: ' + error);
                console.error(error);
            });

    }

    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '<?php echo $subtotal; ?>'
                    },

                    custom_id: orderID
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {

                var shippingAddress = details.purchase_units[0].shipping.address;
                var orderID = details.purchase_units[0].custom_id;
                var email = details.payer.email_address;

                var postalCode = shippingAddress.postal_code;
                var countryCode = shippingAddress.country_code;

                var totalProduct = '<?php echo $totalProducts; ?>';



                var postData = {
                    order_id: orderID,
                    email: email,
                    postal_code: postalCode,
                    country_code: countryCode,
                    total_product: totalProduct,
                    total_price: '<?php echo $subtotal; ?>'
                };

                updateProductQuantities();
                createOrder(postData);





                // alert('Payment successful' +
                //     '\nShipping Address: ' + JSON.stringify(shippingAddress) +
                //     '\nOrder ID: ' + orderID +
                //     '\nEmail: ' + email +
                //     '\nPostal Code: ' + postalCode +
                //     '\nCountry Code: ' + countryCode
                // );
            });
        }
    }).render('#paypal-button-container');
</script>