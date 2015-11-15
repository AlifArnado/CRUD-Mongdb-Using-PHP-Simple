<?php
    $konek = new MongoClient();
    $database = $konek->selectDB('akademik');
    $collection = $database->selectCollection('siswa');

    $record = $collection->find();
    $num_count = $record->count();
    $no = 1;
 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>View</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <h3>Data Siswa</h3>
    <table border="1" cellpadding="4" cellspacing="0">
        <tr bgcolor="aqua">
            <th>#</th>
            <th>NIS</th>
            <th>NAMA</th>
            <th>UMUR</th>
            <th>SEKS</th>
            <th colspan="2">AKSI</th>
        </tr>
        <?php if ($num_count > $no): ?>

        <?php foreach ($record as $data): ?>
            <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $data["nis"]; ?></td>
                <td><?php echo $data["nama"]; ?></td>
                <td><?php echo $data["umur"]; ?></td>
                <td><?php echo $data["seks"]; ?></td>
                <td><a href="edit.php?id=<?php echo $data['_id']; ?>" title="">Ubah</a></td>
                <td><a href="delete.php?id=<?php echo $data['_id']; ?>" >Hapus</a></td>
            </tr>
        <?php endforeach ?>
        <?php endif ?>
    </table>
    <h4>Total data : <?php echo $num_count; ?> <a href="insert.php" >[Tambah Data]</a></h4>
</body>
</html>
