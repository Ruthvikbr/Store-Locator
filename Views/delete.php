<?php
session_start();
require('../Controller/StoreController.php');
 $Store_id = $_GET['deleteId'];

$delete = deleteStoreControl($Store_id);

if ($delete) {
    header('Location: list.php');
    $_SESSION['response'] = 'Record deleted succesfully!';

} else {
     header('Location: list.php');
    $_SESSION['response'] = 'Record cannot be deleted!';
}

?>