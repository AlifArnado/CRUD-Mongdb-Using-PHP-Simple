<?php
    $id = $_REQUEST['id'];
    try {
        $konek = new MongoCLient();
        $database = $konek->selectDB('akademik');
        $collection = $database->selectCollection('siswa');

        /*=====  view of Section data before edit  ======*/
        $data = $collection->findOne(array('_id'=>new MongoId($id)));

        /*----------  selection data using option radio button  ----------*/
        if ($data['seks'] == "pria") {
            $p = "checked";
            $w = "";
        } else {
            $p = "";
            $w = "checked";
        }

    } catch (MongoConnectionException $e) {
        die("failed to connect to MongoDB". $e->getMessage());
    } catch (MongoException $e) {
        die("failed to update mongodb ".$e->getMessage());
    }
 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <form action="konfirmasiUpdate.php" method="POST">
        <table border="1" cellpadding="6" cellspacing="0">
            <tr>
                <td colspan="3" align="center" bgcolor="gray">DATA SISWA</td>
            </tr>
            <tr>
                <td>NIS</td>
                <td>:</td>
                <td><input type="text" name="nis" value="<?php echo $data['nis']; ?>" placeholder=""></td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td>:</td>
                <td><input type="text" name="nama" value="<?php echo $data['nama']; ?>" placeholder=""></td>
            </tr>
            <tr>
                <td>UMUR</td>
                <td>:</td>
                <td><input type="text" name="umur" value="<?php echo $data['umur']; ?>" placeholder="" size="3"></td>
            </tr>
            <tr>
                <td>SEKS</td>
                <td>:</td>
                <td>
                    <input type="radio" name="rdoseks" value="pria" <?php echo "$p"; ?> >PRIA
                    <input type="radio" name="rdoseks" value="wanita" <?php echo "$w"; ?> >WANITA
                </td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                    <input type="submit" name="" value="UPDATE">
                    <input type="reset" name="" value="BATAL">
                    <a href="view.php" title="">[Lihat Data Siswa]</a>
                </td>
            </tr>
        </table>
        <input type="hidden" name="id" value="<?php echo $data['_id']; ?>">
    </form>
</body>
</html>


