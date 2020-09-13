<?php
session_start();

require('../Controller/StoreController.php');




if (isset($_GET['updateId'])) {

$Store_id = $_GET['updateId'];
$Store = getStoreById($Store_id);

$Store_Name = $Store[0]['Store_Name'];
$Street_address = $Store[0]['Street_address'];
$Store_area = $Store[0]['Store_area'];
$Store_Phone_Number = $Store[0]['Store_Phone_Number'];
$working_hours = $Store[0]['working_hours'];
$Latitude = $Store[0]['Latitude'];
$Longitude = $Store[0]['Longitude'];
$map_id = $Store[0]['map_id'];

	
}

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
    
    .center{
        width: 100%;
        margin: 0 400px;

    }

    </style>
</head>
<body>
    <h2 class="text-center">Add Stores</h2>
    <div class="center">
    
    <div class="panel-body">

            <form  action="addStoreProc.php" class="form-horizontal" enctype="multipart/form-data" >


            <input type="hidden" name="Store_id" value="<?= isset($Store_id)?($Store_id):'' ?>">

              <div class="form-group">

                <label class="col-md-3 control-label">Store Name </label>

                <div class="col-md-6">

                  <input type="text" class="form-control" name="Store_Name" value="<?= isset($Store_Name)?($Store_Name):'' ?>" required>

                </div>

              </div>

          
              <div class="form-group">

                <label class="col-md-3 control-label"> Street Address </label>

                <div class="col-md-6">

                  <input type="text" class="form-control" name="Street_address" value="<?= isset($Street_address)?($Street_address):'' ?>" required>

                </div>

              </div>

              <div class="form-group">

                <label class="col-md-3 control-label"> Store Area </label>

                <div class="col-md-6">

                  <input type="text" class="form-control" name="Store_area" value="<?= isset($Store_area)?($Store_area):'' ?>" required>

                </div>

              </div>

              <div class="form-group">

                <label class="col-md-3 control-label"> Store Phone Number </label>

                <div class="col-md-6">

                  <input type="text" class="form-control" name="Store_Phone_Number" value="<?= isset($Store_Phone_Number)?($Store_Phone_Number):'' ?>" required>

                </div>

              </div>

              <div class="form-group">

                <label class="col-md-3 control-label"> Working Hours </label>

                <div class="col-md-6">

                  <input type="text" class="form-control" name="working_hours" value="<?= isset($working_hours)?($working_hours):'' ?>" required>

                </div>

              </div>
              

            <div class="form-group">

                <label class="col-md-3 control-label"> Latitude </label>

                <div class="col-md-6">

                    <input type="text" class="form-control" name="Latitude" value="<?= isset($Latitude)?($Latitude):'' ?>" required>

                </div>

            </div>

                <div class="form-group">

                <label class="col-md-3 control-label"> Longitude </label>

                <div class="col-md-6">

                <input type="text" class="form-control" name="Longitude" value="<?= isset($Longitude)?($Longitude):'' ?>" required>

                </div>

                </div>

                <div class="form-group">

                <label class="col-md-3 control-label"> Map ID </label>

                <div class="col-md-6">

                <input type="text" class="form-control" name="map_id" value="<?= isset($map_id)?($map_id):'' ?>" required>

                </div>

                </div>
            

              <div class="form-group">
                <label class="col-md-3 control-label"> </label>

                <div class="col-md-6">

                  <input class="btn btn-primary form-control" type="submit" name="<?=isset($Store_Name)? 'update':'add' ?>" value = "<?=isset($Store_Name)?'Update Store':'Add Store' ?>">

                </div>

              </div>


            </form>

          </div>

        </div>

    </div>

    <?php if (isset($_SESSION['response'])): ?>

    <div class="alert alert-success alert-dismissible fade show" role='alert'>
        <?php
            echo $_SESSION['response'];
            unset($_SESSION['response']);
        ?>
    </div>

<?php endif ?>
    
    <!-- link jquery.js -->
    <script src="js/jquery.3.5.1.js"></script>

    <!-- link bootstrap.js -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>