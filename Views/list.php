
<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- link bootstrap.css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
        .store{
            font-size:10px;
        }

        .table{
            table-layout: fixed;
            width:100%; 
        }

        .tr{
            height:50px;
        }

        .center{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 200px;
        }
    </style>
</head>
<body>
    <h2 class="text-center">Stores List</h2>
    <div class="table-responsive"> 
    <table class="table store">
        <thead>
        <tr>
            <th>Store Id</th>
            <th>Store Name</th>
            <th>Street Address</th>
            <th>Store Area</th>
            <th>Ph No</th>
            <th>Working hours</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Map ID</th>
            <th>Created On</th>
            <th>Updated On</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        <?php 
        
            require('../Controller/StoreController.php');
            $storeList = getAllStoresControl();

            foreach($storeList as $value){
                $Store_id = $value['Store_id'];
                $Store_Name = $value['Store_Name'];
                $Street_address = $value['Street_address'];
                $Store_area = $value['Store_area'];
                $Store_Phone_Number = $value['Store_Phone_Number'];
                $working_hours = $value['working_hours'];
                $Latitude = $value['Latitude'];
                $Longitude = $value['Longitude'];
                $map_id = $value['map_id'];
                $created_on = $value['created_on'];
                $updated_on = $value['updated_on'];
                $_SESSION['id']=$Store_id;
                $uid=$_SESSION['id'];

                echo "<tr>";
                echo "<td>$Store_id</td>";
                echo "<td>$Store_Name</td>";
                echo "<td>$Street_address</td>";
                echo "<td>$Store_area</td>";
                echo "<td>$Store_Phone_Number</td>";
                echo "<td>$working_hours</td>";
                echo "<td>$Latitude</td>";
                echo "<td>$Longitude</td>";
                echo "<td>$map_id</td>";
                echo "<td>$created_on</td>";
                echo "<td>$updated_on</td>";
                echo "<td><a href='delete.php?deleteId=$Store_id' class= 'btn btn-outline-danger'>Delete</a></td>";
                echo "<td><a href='addStore.php?updateId=$uid' class= 'btn btn-outline-success'>Update</a></td>";

            echo "</tr>";



            }

        ?>
        </tbody>
    </table>

    <?php if (isset($_SESSION['response'])): ?>
        <div class='alert alert-danger'>

            <?php
                echo $_SESSION['response'];
                unset($_SESSION['response']);
            ?>

        </div>
    <?php endif ?>


    <?php if (isset($_SESSION['update_response'])): ?>
      <div class="alert alert-success">
            
            <?php
                echo $_SESSION['update_response'];
                unset($_SESSION['update_response']);
            ?>

      </div>
    <?php endif ?>

    <hr>
    <div class="center">
    <a href="addStore.php" class= "btn btn-outline-success add">Add New Store</a>
    </div>
    <!-- link jquery.js -->
    <script src="js/jquery.3.5.1.js"></script>

    <!-- link bootstrap.js -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>