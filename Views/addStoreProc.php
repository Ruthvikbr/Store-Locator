<?php
session_start();

require('../Controller/StoreController.php');

if (isset($_GET['add'])) {

	$Store_Name = $_GET['Store_Name'];
	$Street_address = $_GET['Street_address'];
    $Store_area = $_GET['Store_area'];
    $Store_Phone_Number = $_GET['Store_Phone_Number'];
    $working_hours = $_GET['working_hours'];
    $Latitude = $_GET['Latitude'];
    $Longitude = $_GET['Longitude'];
    $map_id = $_GET['map_id'];


	$ret =  addStoreControl($Store_Name,$Street_address,$Store_area,$Store_Phone_Number,$working_hours,$Latitude,$Longitude,$map_id);

	if ($ret) {
		 header('Location: list.php');
    	$_SESSION['response'] = 'New Store Inserted!';

	}else{
		 header('Location: list.php');
    	$_SESSION['response'] = 'Error Inserting record!';

	}
}

if (isset($_GET['update'])) {

	$Store_id = $_GET['Store_id'];
	$Store_Name = $_GET['Store_Name'];
	$Street_address = $_GET['Street_address'];
    $Store_area = $_GET['Store_area'];
    $Store_Phone_Number = $_GET['Store_Phone_Number'];
    $working_hours = $_GET['working_hours'];
    $Latitude = $_GET['Latitude'];
    $Longitude = $_GET['Longitude'];
    $map_id = $_GET['map_id'];

	$ret =  updateStoreControl($Store_id,$Store_Name,$Street_address,$Store_area,$Store_Phone_Number,$working_hours,$Latitude,$Longitude,$map_id);

	if ($ret) {
		header('Location: list.php');
    	$_SESSION['update_response'] = 'Store Updated!';


	}else{
		header('Location: list.php');
    	$_SESSION['update_response'] = 'Error Occured!';

	}
}