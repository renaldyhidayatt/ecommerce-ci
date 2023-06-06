<?php
header('Content-type: application/vnd-ms-excel');
header('Content-Disposition: attachment; filename=' . $title . '.xls');
header('Pragma: no-cache');
header('Expires: 0');
?>
<h3>
    <center>Laporan Data User Toko Online</center>
</h3>

<table class="table-data">
    <thead>
        <tr>
            <th>No</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($user)) {
            foreach ($user as $row) {

        ?>
                <tr>
                    <td><?php echo $row->user_id ?></td>
                    <td><?php echo $row->firstname ?></td>
                    <td><?php echo $row->lastname ?></td>
                    <td><?php echo $row->email ?></td>
            <?php
            }
        }
            ?>
    </tbody>
</table>