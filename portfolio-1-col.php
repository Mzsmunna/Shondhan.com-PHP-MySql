<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shondhan.com - Advertise page</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="css/addupdate.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        // Search on Fly over Keystroke using Ajax!
        function getStates(value) {
            $.post("getStates.php",{partialState:value},function(data){
                $("#main-body").html(data);
            });
        }
        
        //// Filter Search on Fly on GO click using Ajax!
        function getMultiStates() {
            
            //alert("Working!");
            var f_pt = $("#f-pt").val();
            var f_bed = $("#f-bed").val();
            var f_mbed = $("#f-mbed").val();
            var f_belcony = $("#f-belcony").val();
            var f_sqrft = $("#f-sqrft").val();
            var f_price = $("#f-price").val();
            var f_div = $("#f-div").val();
            var f_dis = $("#f-dis").val();
            
            // Returns successful data submission message when the entered information is stored in database.
        var dataString = 'property='+ f_pt + '&bed='+ f_bed + '&mbed='+ f_mbed + '&belcony='+ f_belcony + '&sqrft='+ f_sqrft + '&price='+ f_price + '&div='+ f_div + '&dis='+ f_dis;
            
            // AJAX Code To Submit Form.
            $.ajax({
            type: "POST",
            url: "getMultiStates.php",
            data: dataString,
            cache: false,
            success: function(result){
                //alert(result);
                $("#main-body").html(result);
            }
            });
            
        }
        
    </script>
    <style>
        #filter-nav{
            position: fixed;
            top: 55px;
            width: 100%;
            display: block;
            z-index: 1;
            font-size: 12px;
        }
    </style>

  </head>

  <body>
    <?php
        //include_once('connection.php');
        require_once('connection.php'); // DB connection & user DB Table creation!
        require_once 'connectionadds.php'; //DB connection & advertise DB Table creation!
        
        session_start();
        $username = "";
        $userId = "";
    
        $addID = "";
        $addOwner = "";
        $addOwnerID = "";
        $addFor = ""; 
        $addType = "";
        $addLift = "";
        $bed = "";
        $mstrBed = "";
        $belcony = "";
        $dAd = "";
        $sqr_ft = "";
        $price = "";
        $mobileNO = "";
        $floor = "";
        $division = "";
        $district = "";
        $location = "";
        $inDetail = "";
        $date = "";
    
        $btnUpdt = "";
        $status = "";
        
        //Store User Informaton if Logged in!
        if (!isset($_SESSION['username'])) {
            
        }else{
            $username = $_SESSION['username'];
            $userId = $_SESSION['userID'];
        }
        
        //Destroy Session on Logout!
        if (isset($_GET['logout'])) {

            session_destroy();
            //unset($_SESSION['Username']);
            header("Location: portfolio-1-col.php");
            exit;
        }
        
        //Update Button Link click to POP UP UPDATE FORM
        if (isset($_GET['btnUpdt'])) {
            
            $btnUpdt = $_GET['btnUpdt'];
            
            //echo "i'm in php btnUpdt : ".$btnUpdt;
            
            $sql="SELECT * FROM advertises where aid='{$_GET['btnUpdt']}' ";
            $query=mysql_query($sql);
            $row=mysql_fetch_object($query);
            
            $addID = $row->aid;
            $addOwner = $row->addOwner;
            $addOwnerID = $row->addOwnerID;
            $addFor = $row->addFor; 
            $addType = $row->addType;
            $bed = $row->bed;
            $mstrBed = $row->masterBeed;
            $belcony = $row->belcony;
            $dAd = $row->attachedDD;
            $sqr_ft = $row->squareFeet;
            $price = $row->price;
            $mobileNO = $row->contactNo;
            $floor = $row->floor;
            $division = $row->division;
            $district = $row->district;
            $location = $row->location;
            $inDetail = $row->inDetail;
            $date = $row->date;
            
            $dAd2="";
            
            if($dAd == "Yes")
            {
                $dAd2 = "No";
            }else{
                $dAd2 = "Yes";
            }
            
            ?>
    <!-- Edit Add Info POP UP FORM -->
    <div id="simpleModal" class="modal">
            <div class="modal-content">
                <form action="" method="post" id="update-form">
                    <div class="modal-header">
                        <input type="submit" id="updt-btn" class="btn btn-success" name="btn_updt" value="Update">
                        <h2>Edit Advertise</h2>
                        <span class="closeBtn">&times;</span>
                    </div>
                    <div class="modal-container modal-body">
                        <div class="textbox-items">
                            <label>Advertise For :</label>
                            <select name="for" id="sel1" class="form-items">
                                <option value="Rent">Rent</option>
                                <option value="Sale">Sale</option>
                              </select>
                            <label>Property Type :</label><select name="f_type" class="form-items" id="f-type">
                            <?php echo "<option value='$addType' selected>$addType</option>" ; ?>
                <option value="Apartment">Apartment</option>
                <option value="Building">Building</option>
                <option value="Duplex Villa">Duplex Villa</option>
                <option value="Flat">Flat</option>
                <option value="Land">Land</option>
              </select>
<!--
                            <label>Lift Available :</label><select name="lift" class="form-items" id="lift">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                  </select>
-->
                            <label>Number of Beds :</label><input type="number" min="1" id="beds" class="form-items" name="beds" placeholder="<?php echo $bed; ?>" value="<?php echo $bed; ?>">
                            <label>Number of Master Beds :</label><input type="number" min="1" id="mbeds" class="form-items" name="mbeds" placeholder="<?php echo $mstrBed; ?>" value="<?php echo $mstrBed; ?>">
                            <label>Number of Belcony :</label><input type="number" min="1" id="belcony" class="form-items" name="belcony" placeholder="<?php echo $belcony; ?>" value="<?php echo $belcony; ?>">
                            <label>Attached Drawing/Dining :</label>
                            <select id="attch-dw" name="attch_dw" class="form-items">
                                <?php echo "<option value='$dAd' selected>$dAd</option><option value='$dAd2'>$dAd2</option>" ; ?>
                            </select>
                            <label>Square Feet :</label><input type="number" id="sqr-ft" class="form-items" name="sqr_ft" placeholder="<?php echo $sqr_ft; ?>" value="<?php echo $sqr_ft; ?>">
                            <label>Price :</label><input type="number" id="price" class="form-items" name="price" placeholder="<?php echo $price; ?>" value="<?php echo $price; ?>"><select name="currency" class="form-items" id="currency">
                    <option value="TK">TK</option>
                    <option value="$">$</option>
                    <option value="€">€</option>
                    <option value="RS">RS</option>
                  </select>
                            <label>Contact No :</label><input type="text" id="contact" class="form-items" name="contact" placeholder="<?php echo $mobileNO; ?>" value="<?php echo $mobileNO; ?>">
                            <label>Floor Number :</label><input type="text" id="floor" class="form-items" name="floor" placeholder="<?php echo $floor; ?>" value="<?php echo $floor; ?>">
                            <label>Division :</label><select name="division" class="form-items" id="division"><?php echo "<option value='$division' selected>$division</option>" ; ?>
                    <option value="Dhaka">Dhaka</option>
                    <option value="Chittagong">Chittagong</option>
                    <option value="Khulna">Khulna</option>
                    <option value="Barisal">Barisal</option>
                    <option value="Sylhet">Sylhet</option>
                    <option value="Rajshahi">Rajshahi</option>
                    <option value="Mymensingh">Mymensingh</option>
                    <option value="Rangpur">Rangpur</option>
                  </select>
                            <label>District :</label><input type="text" id="district" class="form-items" name="district" placeholder="<?php echo $district; ?>" value="<?php echo $district; ?>">
                            <label>Location :</label><input type="text" id="location" class="form-items" name="location" placeholder="<?php echo $location; ?>" value="<?php echo $location; ?>">
                            <label>Short Description :</label><input type="text" id="indetails" class="form-items" name="indetails" placeholder="<?php echo $inDetail; ?>" value="<?php echo $inDetail; ?>">
                            <label>Date :</label><input type="text" id="date" class="form-items" name="date" placeholder="<?php echo $date; ?>" value="<?php echo $date; ?>" readonly>

                        </div>
                        <div class="btn-items">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <h3>&copy; Shondhan.com </h3>
                    </div>
                </form>
            </div>
        </div>
            
        <?php

        }
      
            //Delete Button Click POP UP Form
            if (isset($_GET['deleteAdd'])) {
            
            $deleteAdd = $_GET['deleteAdd'];
            
            //echo "i'm in php deleteAdd : ".$deleteAdd;
            
            ?>
    <!-- Delete Button POP UP Warning HTML -->
    <div id="simpleModal" class="modal">
            <div class="modal-content" id="webAlert">
                <form action="" method="post" id="update-form">
                    <div class="modal-header">
                        <a class="btn btn-success" href="portfolio-1-col.php">No
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
                        <h2>Are You Sure?</h2>
                        <a class="btn btn-danger" href="deleteAdd.php?id=<?php echo $deleteAdd; ?>">Yes
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
                    </div>
                </form>
            </div>
        </div>
            
        <?php
                
        }
            //Send Update Request with data to server!
            if(isset($_POST['btn_updt']))
            {
                //echo "working!";
                if(isset($_POST['for']))
                {
                    $addFor=$_POST['for'];
                }
                
                if(isset($_POST['f_type']))
                {
                    $addType=$_POST['f_type'];
                }
                
                /*if(isset($_POST['lift']))
                {
                    $addLift=$_POST['lift'];
                }*/
                
                if(isset($_POST['beds']))
                {
                    $bed=$_POST['beds'];
                }else{
                    
                }
                
                if(isset($_POST['mbeds']))
                {
                    $mstrBed=$_POST['mbeds'];
                }
                
                if(isset($_POST['belcony']))
                {
                    $belcony=$_POST['belcony'];
                }
                
                if(isset($_POST['attch_dw']))
                {
                    $dAd=$_POST['attch_dw'];
                }
                
                if(isset($_POST['sqr_ft']))
                {
                    $sqr_ft=$_POST['sqr_ft'];
                }
                
                if (!empty($_POST["price"])) {
                    if(isset($_POST['price']))
                    {
                        $price=$_POST['price'];

                        //if(isset($_POST['currency']))
                        //{
                            $currency = $_POST['currency'];
                            $price = $price . " " . $currency;
                        //}else{

                        //}
                    }
                }
                
                if(isset($_POST['contact']))
                {
                    $mobileNO=$_POST['contact'];
                }
                
                if(isset($_POST['floor']))
                {
                    $floor=$_POST['floor'];
                }
                
                if(isset($_POST['division']))
                {
                    $division=$_POST['division'];
                }
                
                if(isset($_POST['district']))
                {
                    $district=$_POST['district'];
                }
                
                if(isset($_POST['location']))
                {
                    $location=$_POST['location'];
                }
                
                if(isset($_POST['indetails']))
                {
                    $inDetail=$_POST['indetails'];
                }
                
                if(isset($_POST['date']))
                {
                    $date=$_POST['date'];
                }
                
                $sql="UPDATE advertises SET aid='$addID', addOwner='$addOwner', addOwnerID='$addOwnerID', addFor='$addFor', addType='$addType', bed='$bed', masterBeed='$mstrBed', belcony='$belcony', attachedDD='$dAd', squareFeet='$sqr_ft',  price='$price', contactNo='$mobileNO', floor='$floor', division='$division', district='$district', location='$location', inDetail='$inDetail', date='$date' WHERE aid LIKE '$btnUpdt' ";
                $query=mysql_query($sql);
                if($query)
                {
                    //echo "Updated";
                    $status = "Updated";
                    
                }else{
                    //echo " :( ";
                    $status = "Error";
                }
            }
    ?>
    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Shondhan.com</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="col-sm-5 col-sm-offset-3">
            <div id="imaginary_container">
                <div class="input-group stylish-input-group">
                        <input type="text" class="form-control" onkeyup="getStates(this.value)" name="srch_bx" placeholder="Type here to Search . . ." />
                        <button id="filterB" class="btn btn-sm ml-3">Filter Search</button>
                </div>
            </div>
          </div>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="portfolio-1-col.php">Advertises</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="services.html">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <?php
                    
                        if (isset($_SESSION['username'])) {
                    ?>
            <li class="nav-item">
              <a class="nav-link" href="myprofile.php"><?php echo $username; ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?logout">Logout</a>
            </li>
            <?php
                            
                        }else{
                    ?> 
            <li class="nav-item">
              <a class="nav-link" href="logreg.php">Login/Register</a>
            </li>
            <?php
                            
                        }
                    ?>
          </ul>
        </div>
        
      </div>
    </nav>
    
    <!--Filter Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="filter-nav" hidden>
      <div class="container col-sm-10">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="navbar-nav" id="navbarFilter">
          <div class="col-md-2">
            <label class="text-white ml-3" for="f-pt">Property :</label>
              <select name="f_pt" class="form-control" id="f-pt">
                <option value="">Any</option>
                <option value="Apartment">Apartment</option>
                <option value="Building">Building</option>
                <option value="Duplex Villa">Duplex Villa</option>
                <option value="Flat">Flat</option>
                <option value="Land">Land</option>
              </select>
           </div>
           <div class="col-md-1">
            <label class="text-white ml-3" for="f-bed">Beds :</label>
              <select name="f_bed" class="form-control" id="f-bed">
               <option value="">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>

              </select>
           </div>
            <div class="col-md-1">
              <label class="text-white ml-6" for="f-mbed">Ms.Bed :</label>
                  <select name="f_mbed" class="form-control" id="f-mbed">
                   <option value="">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                  </select>
            </div>
             <div class="col-md-1">
              <label class="text-white ml-6" for="f-belcony">Belcony :</label>
                  <select name="f_belcony" class="form-control" id="f-belcony">
                   <option value="">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                  </select>
              </div>
              <div class="col-md-2">
               <label class="text-white ml-6" for="f-div">Division :</label>
                  <select name="f_div" class="form-control" id="f-div">
                   <option value="">Any</option>
                    <option value="Dhaka">Dhaka</option>
                    <option value="Chittagong">Chittagong</option>
                    <option value="Khulna">Khulna</option>
                    <option value="Barisal">Barisal</option>
                    <option value="Sylhet">Sylhet</option>
                    <option value="Rajshahi">Rajshahi</option>
                    <option value="Mymensingh">Mymensingh</option>
                    <option value="Rangpur">Rangpur</option>
                  </select>
            </div>
            <div class="col-md-2">
               <label class="text-white ml-6" for="f-dis">District :</label>
                <input class="form-control" id="f-dis" type="text" placeholder="Enter District" name="f_dis">
            </div>
            <div class="col-md-2">
               <label class="text-white ml-6" for="f-sqrft">Square Feet :</label>
                <input class="form-control" id="f-sqrft" type="text" placeholder="Enter Square" name="f_sqrft">
            </div>
            <div class="col-md-2">
               <label class="text-white ml-6" for="f-price">Enter Price :</label>
                <input class="form-control" id="f-price" type="text" placeholder="Enter Price" name="f_price">
            </div>
          <input type="button" class="form-control" onclick="getMultiStates()" name="srch_btn" value="Go" />
        </div>
        
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Available
        <small>Adds</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Advertises - Grid 1 View | </li>
        <li class="ml-4">
          <a href="advertises-g2.php">Grid 2 View</a>
        </li>
        <li class="ml-4">
          <a href="advertises-g3.php">Grid 3 View</a>
        </li>
        <li class="ml-4">
          <a href="advertises-g4.php">Grid 4 View</a>
        </li>
      </ol>
    </div>
    
    <div class="container" id="main-body">
                
      <!-- Adds One to Many -->
          <?php
        
        $sql="SELECT * FROM advertises ORDER BY aid DESC";
        $query=mysql_query($sql);
        $row="";
        $allAdds=array();
        if(mysql_num_rows($query)>0)
        {
            while($row=mysql_fetch_object($query))
            {
                $addID = $row->aid;
                $addOwner = $row->addOwner;
                $addOwnerID = $row->addOwnerID;
                $addFor = $row->addFor; 
                $addType = $row->addType;
                $bed = $row->bed;
                $mstrBed = $row->masterBeed;
                $belcony = $row->belcony;
                $dAd = $row->attachedDD;
                $sqr_ft = $row->squareFeet;
                $price = $row->price;
                $mobileNO = $row->contactNo;
                $floor = $row->floor;
                $division = $row->division;
                $district = $row->district;
                $location = $row->location;
                $inDetail = $row->inDetail;
                $date = $row->date;
                
                //GET FROM THE DIRECTORY!!
                
                $dir = "uploads\\shondhan_users\\";
                $addPath = $dir . "$addOwner\\" . "$addID";
                $addDir = $dir . "$addOwner\\"."$addID\\";
                $picName = "$addOwner"."$addID";
                $picPath = "$addDir"."$picName"."0";
                //$getPic = "$addDir"."$picName"."0";
                
                    $getPic = $picPath . ".jpg";
                    
                    if (file_exists($getPic)) {
                        //echo "The file $filename exists";
                        $getPic = $picPath . ".jpg";
                    } else {
                        //echo "The file $filename does not exist";
                        $getPic = $picPath . ".jpeg";
                        if (file_exists($getPic)) {
                            //echo "The file $filename exists";
                            $getPic = $picPath . ".jpeg";
                        } else {
                            //echo "The file $filename does not exist";
                            $getPic = $picPath . ".png";
                            if (file_exists($getPic)) {
                                //echo "The file $filename exists";
                                $getPic = $picPath . ".png";
                            } else {
                                //echo "The file $filename does not exist";
                                $getPic = $picPath . ".gif";
                                if (file_exists($getPic)) {
                                    //echo "The file $filename exists";
                                    $getPic = $picPath . ".gif";
                                } else {
                                    //echo "Image Not Available!";
                                    $getPic ="http://placehold.it/700x300";
                                }
                            }
                        }
                    }
                
                ?>
                
      <!-- Add Container -->
      <div class="row" id="<?php echo $addID; ?>">
        <div class="col-md-7">
          <a href="">
            <img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo $getPic; ?>" alt="">
          </a>
        </div>
        <div class="col-md-5">
          <h3><?php echo $addType; ?> For <?php echo $addFor; ?><a class="btn btn-danger disabled float-right" href=""><?php echo $price; ?>
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a></h3>
          <p class="card-text"><?php echo $inDetail; ?></p>
          <p class="card-text"> Number of Rooms : <span class="t-rooms"><?php echo $bed; ?></span></p>
          <p class="card-text"> Number of Master Bed : <span class="mb-rooms"><?php echo $mstrBed; ?></span></p>
          <p class="card-text"> Number of Belcony : <span class="belcony"><?php echo $belcony; ?></span></p>
          <p class="card-text"> Attatched Drawing and Dining : <span class="a-dd"><?php echo $dAd; ?></span></p>
          <p class="card-text"> Square feets : <span class="sqr-ft"><?php echo $sqr_ft; ?></span></p>
          <p class="card-text"> Division : <span class="division"><?php echo $division; ?></span></p>
          <p class="card-text"> District : <span class="district"><?php echo $district; ?></span></p>
          <p class="card-text"> Contact Number : <span class="contact"><?php echo $mobileNO; ?></span></p>
          <a class="btn btn-primary" href="portfolio-item.php?aid=<?php echo $addID; ?> ">View More
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
          <?php
                        if($username==$addOwner)
                        {
                    ?>
          <a class="btn btn-success" href="?btnUpdt=<?php echo $addID; ?> ">Update
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
          <a class="btn btn-danger" href="?deleteAdd=<?php echo $addID; ?> ">Delete
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
                              <?php
                        }
                    ?>
        </div>
      </div>
      <!-- /.row -->

      <hr>
        
                <?php
                
            }
        }
    
    ?>

      <!-- Pagination -->
<!--
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>
-->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Shondhan.Com 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/addupdate.js"></script>
    <script type="text/javascript">
    var stat = "<?php echo $status; ?>";
        
    var modal = document.getElementById('simpleModal');
    if(stat == "Updated")
        {
            //alert("closing");
            document.location.href='portfolio-1-col.php';
            //modal.setAttribute("hidden", true);
        }
        
        var filter_search = document.querySelector("#filter-nav");
        var btn_filterB = document.querySelector("#filterB");
        
        btn_filterB.addEventListener("click", toggleNav);
        
        function toggleNav(e){
            var tf = document.querySelector("#filter-nav").hasAttribute("hidden");
            if (tf) {
                //alert("inside hide to visible");
                btn_filterB.innerHTML = "Hide Filter";
                filter_search.removeAttribute("hidden");
                
            } else {
                //alert("about to hide");
                filter_search.setAttribute("hidden", true);
                btn_filterB.innerHTML = "Filter Search";
            }
        }
    </script>

  </body>

</html>
