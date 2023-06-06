<style>
    .table-container {
        overflow-x: auto;
    }

    .table-container table {
        width: 100%;
        border-collapse: collapse;
    }

    .table-container th,
    .table-container td {
        padding: 8px;
        text-align: left;
    }

    .table-container th {
        background-color: #f2f2f2;
    }

    .table-container .center {
        text-align: center;
    }

    @media only screen and (max-width: 600px) {

        .table-container table,
        .table-container th,
        .table-container td {
            font-size: 12px;
        }
    }
</style>

<div class="table-container">
    <table border="1">
        <tr>
            <td>
                <table border="1">
                    <tr>
                        <th>Order ID</th>
                        <th>Email</th>
                        <th >Postal Code</th>
                        <th>Country Code</th>
                        <th >Total Product</th>
                        <th >Total Price</th>
                    </tr>
                    <?php
                    $no = 1;
                    foreach ($order as $row) {
                    ?>
                        <tr>
                            <td class="border border-gray-800 px-4 py-2"><?php echo $row->order_id ?></td>
                            <td class="border border-gray-800 px-4 py-2"><?php echo $row->email ?></td>
                            <td class="border border-gray-800 px-4 py-2"><?php echo $row->postal_code ?></td>
                            <td class="border border-gray-800 px-4 py-2"><?php echo $row->country_code ?></td>
                            <td class="border border-gray-800 px-4 py-2"><?php echo $row->total_product ?></td>
                            <td class="border border-gray-800 px-4 py-2"><?php echo $row->total_price ?></td>
                        </tr>
                    <?php $no++;
                    } ?>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <hr>
            </td>
        </tr>
        <tr>
            <td class="center">
                <?= date('d M Y H:i:s') ?>
            </td>
        </tr>
    </table>
</div>