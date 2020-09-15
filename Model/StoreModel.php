<?php

require('../Config/database.php');

class StoreModel extends database_connection{

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
        $link = $this->db_connect();
        $req = $link->prepare($insert);
        $req->bindValue(':Store_Name', $Store_Name, PDO::PARAM_STR);
        $req->bindValue(':Street_address', $Street_address, PDO::PARAM_STR);
        $req->bindValue(':Store_area', $Store_area, PDO::PARAM_STR);
        $req->bindValue(':Store_Phone_Number', $Store_Phone_Number, PDO::PARAM_STR);
        $req->bindValue(':working_hours', $working_hours, PDO::PARAM_STR);
        $req->bindValue(':Latitude', $Latitude, PDO::PARAM_STR);
        $req->bindValue(':Longitude', $Longitude, PDO::PARAM_STR);
        $req->bindValue(':map_id', $map_id, PDO::PARAM_STR);
        $req->bindValue(':created_on', date('Y-m-d'), PDO::PARAM_STR);
        $req->bindValue(':updated_on', date('Y-m-d'), PDO::PARAM_STR);
        
        return $req->execute();
    }

    public function getAllStores(){
        $stores = array();
		$sql = "SELECT * FROM stores ORDER BY Store_id DESC";
        $link = $this->db_connect();
        $result =  $link->query($sql);
        
        if($result){
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $stores[] = $row;
            }
        }
               
        return $stores;
    }

    public function getStoresForPage($start_from,$per_page){
        $stores = array();
		$sql = "SELECT * FROM stores ORDER BY Store_id DESC LIMIT $start_from,$per_page ";
        $link = $this->db_connect();
        $result =  $link->query($sql);
        
        if($result){
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $stores[] = $row;
            }
        }
               
        return $stores;
    }

    public function getStoreById($Store_id){
        $store = array();
		$sql = "SELECT * FROM stores WHERE `Store_id`='$Store_id'";
		$link = $this->db_connect();
        $result = $link->query($sql);
        if($result){
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $store[] = $row;
            }
        }

        return $store;

	}
    
    public function deleteStore($Store_id){
		
		$sql = "DELETE FROM stores WHERE Store_id='$Store_id'";
        $link = $this->db_connect();
		$link->query($sql);
    }
    
    public function updateStore($Store_id,$Store_Name,$Street_address,$Store_area,$Store_Phone_Number,$working_hours,$Latitude,$Longitude,$map_id){
        $updated_on = date('Y-m-d');
        $update = "UPDATE stores SET Store_Name = :Store_Name, Street_address = :Street_address , Store_area = :Store_area , Store_Phone_Number = :Store_Phone_Number ,working_hours = :working_hours ,Latitude = :Latitude ,Longitude = :Longitude ,map_id = :map_id , updated_on = :updated_on WHERE Store_id = :Store_id";
        $link = $this->db_connect();
        $req = $link->prepare($update);
        
        $req->bindValue(':Store_Name', $Store_Name, PDO::PARAM_STR);
        $req->bindValue(':Street_address', $Street_address, PDO::PARAM_STR);
        $req->bindValue(':Store_area', $Store_area, PDO::PARAM_STR);
        $req->bindValue(':Store_Phone_Number', $Store_Phone_Number, PDO::PARAM_STR);
        $req->bindValue(':working_hours', $working_hours, PDO::PARAM_STR);
        $req->bindValue(':Latitude', $Latitude, PDO::PARAM_STR);
        $req->bindValue(':Longitude', $Longitude, PDO::PARAM_STR);
        $req->bindValue(':map_id', $map_id, PDO::PARAM_STR);
        $req->bindValue(':updated_on', $updated_on, PDO::PARAM_STR);
        $req->bindValue(':Store_id', $Store_id, PDO::PARAM_INT);
        return $req->execute();
        

	}
}

?>