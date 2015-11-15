<?php
    $id = $_POST['id'];
    try {
            $konek = new MongoCLient();
            $database = $konek->selectDB('akademik');
            $collection = $database->selectCollection('siswa');

            /*----------  update data proses  ----------*/
            $updateData = array();
            $updateData['nis']     = $_POST['nis'];
            $updateData['nama']    = $_POST['nama'];
            $updateData['umur']    = $_POST['umur'];
            $updateData['seks'] = $_POST['rdoseks'];
            $selesaiUpdate = $collection->update(array('_id'=> new MongoId($id)), $updateData);

            if ($selesaiUpdate) {
                echo "Berhasil di update";
            }

        } catch (MongoConnectionException $e) {
            die("failed to connect to mongodb". $e->getMessage());
        } catch (MongoException $e) {
            die("failed to update data".$e->getMessage());
        }
 ?>

 <a href="view.php" title="">[Lihat Data]</a>
