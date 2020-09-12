<?php

require('../Config/database.php');

class StoreModel extends database{

    public $Store_id = null;
    public $Store_Name = null;
    public $Street_address = null;
    public $Store_area = null;
    public $Store_Phone_Number = null;
    public $working_hours = null;
    public $Latitude = null;
    public $Longitude = null;
    public $map_id = null;
    public $created_on = null;
    public $updated_on = null;
    

    public function addStore($Store_Name,$Street_address,$Store_area,$Store_Phone_Number,$working_hours,$Latitude,$Longitude,$map_id){
        
        $insert = "INSERT INTO stores (Store_Name,Street_address,Store_area,Store_Phone_Number,working_hours,Latitude,Longitude,map_id,created_on,updated_on) VALUES (:Store_Name,:Street_address,:Store_area,:Store_Phone_Number,:working_hours,:Latitude,:Longitude,:map_id,:created_on,:updated_on)";
        $link = db_connect();
        $req = $link->prepare($insert);
        $req->execute([
            'Store_Name' => $Store_Name,
            'Street_address' => $Street_address,
            'Store_area' => $Store_area,
            'Store_Phone_Number' => $Store_Phone_Number,
            'working_hours' => $working_hours,
            'Latitude' => $Latitude,
            'Longitude' => $Longitude,
            'map_id' => $map_id,
            'created_on' => date('d-m-Y'),
            'updated_on' => date('d-m-Y')
        ]);
    }

    public function getAllStores(){
        $stores = array();
		$sql = "SELECT * FROM stores ORDER BY desc";
        $link = db_connect();
        $result =  $link->query($sql);
        
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $stores[] = $row;
        }       
        return $stores;
    }

    public function getStoreById($Store_id){
		$sql = "SELECT * FROM stores WHERE `Store_id`='$Store_id'";
		$link = db_connect();
        $req = $link->query($sql);
        return $req->fetch(PDO::FETCH_ASSOC);

	}
    
    public function deleteStore($Store_id){
		
		$sql = "DELETE FROM stores WHERE Store_id='$Store_id'";
        $link = db_connect();
		$link->query($sql);
    }
    
    public function updateStore($Store_id,$Store_Name,$Street_address,$Store_area,$Store_Phone_Number,$working_hours,$Latitude,$Longitude,$map_id){
        $updated_on = date('d-m-Y');
		$sql = "UPDATE studentlist
					SET `Store_Name`='$Store_Name',
						`Street_address`='$Street_address',
						`Store_area`='$Store_area',
						`Store_Phone_Number`='$Store_Phone_Number',
                        `working_hours`='$working_hours',
						`Latitude`='$Latitude',
                        `Longitude`='$Longitude',
						`map_id`='$map_id',
                        `updated_on`='$updated_on'
					WHERE Store_id='$Store_id'";
		$link = db_connect();
		$link->query($sql);
	}
}

?>