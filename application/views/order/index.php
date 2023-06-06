<div class="relative overflow-x-auto">
    <div class="flex justify-center">
        <div class="w-full md:w-2/3 card text-center shadow-lg p-3 mb-5 bg-white rounded">
            <div class="text-center m-5">My Order</div>
            <div class="overflow-x-auto mt-10">
                <table class="table-auto w-full text-sm text-left">
                    <thead>
                        <tr>
                            <th class="border border-gray-800 p-2">Order ID</th>
                            <th class="border border-gray-800 p-2">Email</th>
                            <th class="border border-gray-800 p-2">Postal Code</th>
                            <th class="border border-gray-800 p-2">Country Code</th>
                            <th class="border border-gray-800 p-2">Total Product</th>
                            <th class="border border-gray-800 p-2">Total Price</th>
                            <th class="border border-gray-800 p-2">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $subtotal = 0; // Inisialisasi subtotal
                        $totalProducts = 0; // Inisialisasi total produk
                        foreach ($order as $row) {
                        ?>
                            <tr>
                                <td class="border border-gray-800 px-4 py-2"><?php echo $row->order_id ?></td>
                                <td class="border border-gray-800 px-4 py-2"><?php echo $row->email ?></td>
                                <td class="border border-gray-800 px-4 py-2"><?php echo $row->postal_code ?></td>
                                <td class="border border-gray-800 px-4 py-2"><?php echo $row->country_code ?></td>
                                <td class="border border-gray-800 px-4 py-2"><?php echo $row->total_product ?></td>
                                <td class="border border-gray-800 px-4 py-2"><?php echo $row->total_price ?></td>
                                
                                <td class="border border-gray-800 px-4 py-2">
                                    <a onclick="return confirm('Are you sure you want to delete this record?');" href="<?= base_url('order/delete/' . $row->order_id); ?>">
                                        <i style="color: red" class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                            
                        }
                        ?>
                    </tbody>
                </table>
                
            </div>
            <div class="flex justify-center mt-5">
                
                <a href="<?= base_url('order/generatePdf/'); ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    <span class="fas fa-file-pdf"></span>  Generate PDF
                    </a>
            </div>
            
        </div>
    </div>
</div>

