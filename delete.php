<?php
    $id = $_GET['id'];
    try {
        $konek = new MongoClient();
        $database = $konek->selectDB('akademik');
        $collection = $database->selectCollection('siswa');
        $record = $collection->remove(array('_id'=> new MongoId($id)));
        header('Location: http://localhost/crud-php-mongodb/view.php');
    } catch (MongoConnectionException $e) {
        die("failed to connect to database". $e->getMessage());
    } catch (MongoException $e) {
        die("failed to delete data". $e->getMessage());
    }
 ?>
