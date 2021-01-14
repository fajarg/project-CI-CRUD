<?php

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Students Data.xls");

?>

<html>

<body>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>School</th>
                <th>Grade</th>
                <th>Departmen</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($siswa as $row) : ?>
                <tr>
                    <td scope="row"><?= $i; ?></td>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['school']; ?></td>
                    <td><?= $row['grade']; ?></td>
                    <td><?= $row['department']; ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>