<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Insert</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <form action="" method="POST">
        <table border="1" cellpadding="6" cellspacing="0">
            <tr>
                <td colspan="3" align="center" bgcolor="gray">DATA SISWA</td>
            </tr>
            <tr>
                <td>NIS</td>
                <td>:</td>
                <td><input type="text" name="nis" value="" placeholder=""></td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td>:</td>
                <td><input type="text" name="nama" value="" placeholder=""></td>
            </tr>
            <tr>
                <td>UMUR</td>
                <td>:</td>
                <td><input type="text" name="umur" value="" placeholder="" size="3"></td>
            </tr>
            <tr>
                <td>SEKS</td>
                <td>:</td>
                <td>
                    <input type="radio" name="rdoseks" value="pria">PRIA
                    <input type="radio" name="rdoseks" value="wanita">WANITA
                </td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                    <input type="submit" name="" value="INSERT">
                    <input type="reset" name="" value="BATAL">
                    <a href="view.php" title="">[Lihat Data Siswa]</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php
    if ($_POST) {
        $nis = $_POST["nis"] ;
        $nama = $_POST["nama"] ;
        $umur = $_POST["umur"] ;
        $seks = $_POST["rdoseks"] ;

        try {
            $konek = new Mongo();
            $database = $konek->selectDB("akademik");
            $collection = $database->selectCollection('siswa');

            $article = array(
                    'nis' => $nis,
                    'nama' => $nama,
                    'umur' => $umur,
                    'seks' => $seks
                );

            $collection->insert($article);
        } catch (MongoConnectionException $e) {
            die("failed to connect to database ". $e->getMessage());
        } catch (MongoException $e) {
            die("failed to insert data ". $e->getMessage());
        }

    }
 ?>
