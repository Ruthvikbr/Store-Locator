<?php

require('../Model/StoreModel.php');

class StoreController {

    public function addStoreControl($Store_Name,$Street_address,$Store_area,$Store_Phone_Number,$working_hours,$Latitude,$Longitude,$map_id){
        $insertModel = new StoreModel();
        $result = $insertModel->addStore($Store_Name,$Street_address,$Store_area,$Store_Phone_Number,$working_hours,$Latitude,$Longitude,$map_id);
        
    }

    public function getAllStoresControl(){
        $getModel = new StoreModel();
        $result = $getModel->getAllStores();
        return $result;
    }

    public function getStoreById($Store_id){
        $getModel = new StoreModel();
        $result = $getModel->getStoreById($Store_id);
        return $result;
    }

    public function deleteStoreControl($Store_id){
        $deleteModel = new StoreModel();
        $result = $deleteModel->deleteStore($Store_id);
        
    }

    public function updateStoreControl($Store_id,$Store_Name,$Street_address,$Store_area,$Store_Phone_Number,$working_hours,$Latitude,$Longitude,$map_id){
        $updateModel = new StoreModel();
        $result = $updateModel->updateStore($Store_id,$Store_Name,$Street_address,$Store_area,$Store_Phone_Number,$working_hours,$Latitude,$Longitude,$map_id);
    }

}

?>