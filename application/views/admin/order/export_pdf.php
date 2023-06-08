<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <style type="text/css">
        .table-data {
            width: 100%;
            border-collapse: collapse;
        }

        .table-data tr th,
        .table-data tr td {
            border: 1px solid black;
            font-size: 11pt;
            font-family: Verdana;
            padding: 10px 10px 10px 10px;
        }

        .table-data th {
            background-color: grey;
        }

        h3 {
            font-family: Verdana;
        }
    </style>
    <h3>
        <center>LAPORAN DATA Order</center>
    </h3>
    <br />
    <table class="table-data">
        <thead>
            <tr>
                <th class="border border-gray-800 p-2">Order ID</th>
                <th class="border border-gray-800 p-2">Email</th>
                <th class="border border-gray-800 p-2">Postal Code</th>
                <th class="border border-gray-800 p-2">Country Code</th>
                <th class="border border-gray-800 p-2">Total Product</th>
                <th class="border border-gray-800 p-2">Total Price</th>
            </tr>
        </thead>
        <tbody>
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
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>