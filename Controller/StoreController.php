<?php

require('../Model/StoreModel.php');



    function addStoreControl($Store_Name,$Street_address,$Store_area,$Store_Phone_Number,$working_hours,$Latitude,$Longitude,$map_id){
        $insertModel = new StoreModel();
        $result = $insertModel->addStore($Store_Name,$Street_address,$Store_area,$Store_Phone_Number,$working_hours,$Latitude,$Longitude,$map_id);
        return $result;
    }

    function getAllStoresControl(){
        $getModel = new StoreModel();
        $result = $getModel->getAllStores();
        return $result;
    }

    function getStoresByPageControl($start_from,$per_page){
        $getModel = new StoreModel();
        $result = $getModel->getStoresForPage($start_from,$per_page);
        return $result;
    }

    

    function getStoreById($Store_id){
        $getModel = new StoreModel();
        $result = $getModel->getStoreById($Store_id);
        return $result;
    }

    function deleteStoreControl($Store_id){
        $deleteModel = new StoreModel();
        $result = $deleteModel->deleteStore($Store_id);
        return $result;
        
    }

    function updateStoreControl($Store_id,$Store_Name,$Street_address,$Store_area,$Store_Phone_Number,$working_hours,$Latitude,$Longitude,$map_id){
        $updateModel = new StoreModel();
        $result = $updateModel->updateStore($Store_id,$Store_Name,$Street_address,$Store_area,$Store_Phone_Number,$working_hours,$Latitude,$Longitude,$map_id);
        return $result;
    }



?>