
<?php
    require('../Controller/StoreController.php');
    $per_page=10;

    if(isset($_GET['page'])){

        $page = $_GET['page'];

    }else{

        $page=1;

    }

    $start_from = ($page-1) * $per_page;
    $storeList = getStoresByPageControl($start_from,$per_page);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Locator</title>


    <!-- link bootstrap.css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">


    <!-- link master.less -->
    <link rel="stylesheet/less" type="text/css" href="../css/main.less" />
    <script src="//cdn.jsdelivr.net/npm/less" ></script>

    <!--link Font Awesome css -->
    <link rel="stylesheet" href="../css/all.min.css">

    <!-- link Leaflet css -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin="" />

    <!-- link Leaflet script file -->
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
        integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
        crossorigin=""></script>


</head>

<body>

    <!--Start Header area -->
    <div class="header-area">
        <div class="main-menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="../images/Desktop/logo-icon.png" alt="logo"
                        class="img-responsive"></a>

                <div class="col-md-4 col-sm-2">
                    <div class="inner-addon right-addon">
                        <i class="fa fa-search"></i>
                        <input type="search" class="form-control" placeholder="Search Brands & Products" />
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <div class="mr-auto"></div>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Our Stores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link discounts" href="#"> Discounts </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Rewards</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                My Account
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">My Orders</a>
                                <a class="dropdown-item" href="#">Edit Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Logout</a>
                            </div>
                        </li>

                    </ul>

                </div>
            </nav>
        </div>
    </div>

    <!--End Header area -->

    <!-- Start Secondary Navigation area -->
    <div class="secondary-area">
        <ul id="menu">
            <li>Brands</li>
            <li>Makeup</li>
            <li>Skin</li>
            <li>Hair</li>
            <li>Tools & Accessories</li>
            <li>Fragrance</li>
            <li>Bras</li>
            <li>Panties</li>
            <li>Nightwear</li>
            <li>Active Wear</li>
            <li>More Lingerie</li>
        </ul>
    </div>

    <!-- End Secondary Navigation area-->


    <!-- Start Banner Area -->
    <div class="img-responsive custom-banner-image">
        <div class="text">Our Stores</div>
    </div>
    <!-- End Banner Area -->

    <!-- Start Address area -->


    <div class="address-area ">
        <div class="container">
        <?php 
            $index = 0;
            
           

            for($x=0;$x<count($storeList)/2;$x++){
                echo "<div class='row'>";
                
                for($y=0;$y<=1&$index<count($storeList);$y++){
                    $Store_Name = $storeList[$index]['Store_Name'];
                    $Street_address = $storeList[$index]['Street_address'];
                    $Store_area = $storeList[$index]['Store_area'];
                    $Store_Phone_Number = $storeList[$index]['Store_Phone_Number'];
                    $working_hours = $storeList[$index]['working_hours'];
                    $Latitude = $storeList[$index]['Latitude'];
                    $Longitude = $storeList[$index]['Longitude'];
                    $map_id = $storeList[$index]['map_id'];
                    $index++; 

                echo "<div class='col-lg-6 col-md-12'>

                    <div class='address-item'>

                        <h2 class='Area'>$Store_Name</h2>
                        <p class='address'>$Street_address<br>
                            $Store_area <br>
                            Phone:<a href='tel:+1-303-499-7111'>$Store_Phone_Number</a><br>
                            $working_hours</p>
                            
                        <div id='$map_id'>
                            <script>
                                var mapName = L.map('$map_id').setView([$Latitude, $Longitude], 13);
                                L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                                    attribution: '&copy; <a href='http://osm.org/copyright'>OpenStreetMap</a> contributors'
                                }).addTo(mapName);
                                var marker = L.marker([$Latitude, $Longitude]).addTo(mapName);
                            </script>  
                        </div>
                    </div>
                </div>";
                
                }
                
                echo "</div>";
            
            }
        ?>

        <div class="paging">
            <ul class="pagination">
				<?php
                    
                    $result = getAllStoresControl();
                    $total_records = count($result);
                    $total_pages = ceil($total_records / $per_page);
                        echo "
                            <li class='page-item'>
                                <a class='page-link' href='Stores.php?page=1'> ".'Previous'." </a>
                            </li>";

                        for($i=1; $i<=$total_pages; $i++){
                              echo "
                            <li class='page-item'>
                                <a class='page-link' href='Stores.php?page=".$i."'> ".$i." </a>
                            </li>";
                        };

                        echo "
                            <li class='page-item'>
                                <a class='page-link' href='Stores.php?page=$total_pages'> ".'Next'." </a>
                            </li>";				
				?>
            </ul>
        </div>
            



            <!-- <div class="row">
                <div class="col-lg-6 col-md-12">

                    <div class="address-item">

                        <h2 class="Area">Jubilee Hills</h2>
                        <p class="address">Road No.36, Jubilee Hills,<br>
                            Hyderabad, Telangana-500033. <br>
                            Phone:<a href="tel:+1-303-499-7111">+91 040 6704 3636</a><br>
                            11:00 am - 9:00 pm (Monday to Sunday)</p>
                        <div id="mapid">

                            <script>
                                var mymap = L.map('mapid').setView([17.428838, 78.413781], 13);
                                L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                                    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
                                }).addTo(mymap);
                                var marker = L.marker([17.428838, 78.413781]).addTo(mymap);
                            </script>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">

                    <div class="address-item">

                        <h2 class="Area">Abids</h2>
                        <p class="address">Main Road, Abids,<br>
                            Hyderabad, Telangana-500001. <br>
                            Phone:<a href="tel:+1-303-499-7111">+91 040 6656 6234</a><br>
                            11:00 am - 9:00 pm (Monday to Sunday)</p>
                        <div id="mapid1">
                            <script>
                                var mymap1 = L.map('mapid1').setView([17.390642, 78.476479], 13);
                                L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                                    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
                                }).addTo(mymap1);
                                var marker = L.marker([17.390642, 78.476479]).addTo(mymap1);
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12">

                    <div class="address-item">

                        <h2 class="Area">Secunderabad</h2>
                        <p class="address">Gandhi Statue Square, <br>
                            Secunderabad, Telangana-500003. <br>
                            Phone:<a href="tel:+1-303-499-7111">+91 040 2784 6188</a> <br>
                            11:00 am - 9:00 pm (Monday to Sunday)</p>
                        <div id="mapid2">

                            <script>
                                var mymap2 = L.map('mapid2').setView([17.444160, 78.487573], 13);
                                L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                                    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
                                }).addTo(mymap2);
                                var marker = L.marker([17.444160, 78.487573]).addTo(mymap2);
                            </script>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">

                    <div class="address-item">

                        <h2 class="Area">K.S Beauty Center</h2>
                        <p class="address">Kathiawar Plaza, P.G. Road, <br>
                            Secunderabad, Telangana – 500003. <br>
                            Phone:<a href="tel:+1-303-499-7111">+91 040 66381555 </a><br>
                            11:00 am - 8:30 pm (Monday to Sunday)</p>
                        <div id="mapid3">
                            <script>
                                var mymap3 = L.map('mapid3').setView([17.440800, 78.484990], 13);
                                L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                                    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
                                }).addTo(mymap3);
                                var marker = L.marker([17.440800, 78.484990]).addTo(mymap3);
                            </script>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <!-- End Address area -->


    <!-- Start Advantages area -->
    <div class="advantages">
        <div class="container">
            <div class="advantage">
                <div class="content" id="payment">
                    <img class="img-responsive" src="/images/Desktop/credit-card.png" alt="card image">
                    <p>Safe & Secured <br> Payment gateway</p>
                </div>
            </div>

            <div class="advantage">
                <div class="content" id="guarantee">
                    <img class="img-responsive" src="/images/Desktop/box.png" alt="Box image">
                    <p>Genuine Products <br> guaranteed</p>
                </div>
            </div>
            <div class="advantage">
                <div class="content" id="offers">
                    <img class="img-responsive" src="/images/Desktop/ribbon.png" alt="ribbon image">
                    <p>Free shipping for <br> orders over Rs 749</p>
                </div>
            </div>
            <div class="Subscribe">
                <p>Keep updated & Get Unlimited Offers</p>
                <div class="input-group">
                    <input type="text" name="email" class="form-control" placeholder="Your email address">
                    <span class="input-group-btn">
                      <input type="submit" class="btn btn-default" value="Subscribe">
                    </span>
                    </div>
            </div>
        </div>
    </div>
    <!-- End Advantages area -->
    <!-- Start Footer area -->
    <div id="footer">
        <div class="container">
            <div class="row">
                <div class="pages">
                    <h4>Kathiawar Stores</h4>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Stores</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Offers</a></li>
                    </ul>


                </div>

                <div class="pages">
                    <h4>Information</h4>
                    <ul>
                        <li><a href="#">Shipping & Delivery</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Return & Exchange Policy</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>

                <div class="pages">
                    <h4>Categories</h4>

                    <ul>
                        <li><a href="#">Cosmetics</a></li>
                        <li><a href="#">Lingerie</a></li>
                        <li><a href="#">Skin Care</a></li>
                        <li><a href="#">Makeup</a></li>
                        <li><a href="#">Our Brands</a></li>
                    </ul>


                </div>

                <div class="pages">
                    <h4>Follow us on</h4>
                    <div class="social">
                        <div class="item">
                            <a href="#"><img src="/images/Desktop/facebook.png" alt="Facebook Logo"> Facebook</a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="/images/Desktop/instagram.png" alt="Instagram Logo"> Instagram</a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="/images/Desktop/twitter.png" alt="Twitter Logo"> Twitter</a>
                        </div>
                    </div>
                </div>

                <div>
                    <h4>Customer Support</h4>
                    <p class="contact">Call us at <a href="tel:+1-303-499-7111">+91-81642 94004</a></p>
                    <p class="contact">Customer Service Reps are available for inquires <br>
                        Monday to Friday from 10AM to 6PM </p>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <h4 class="content">© 2020 Kathiawarstores. All Rights Reserved.</h4>
    </div>

    <!-- End Footer area -->

    <!-- link jquery.js -->
    <script src="js/jquery.3.5.1.js"></script>

    <!-- link bootstrap.js -->
    <script src="js/bootstrap.min.js"></script>


    <!-- link Less -->
    <script src="//cdn.jsdelivr.net/npm/less"></script>


</body>

</html>