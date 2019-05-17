<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Profile</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="css/myprofile.css" />
    <link rel="stylesheet" type="text/css" href="css/myprofiledit.css" />
</head>
<body>
<?php
    //include_once('connection.php');
    require_once('connection.php');
    //require_once 'connectionadds.php';
    
    $userID = "";
    $userName = "";
    $addFor="";
    
    $firsName = "";
    $lastName = "";
    $password = "";
    $emailID = "";
    $mobileNO = "";
    $accountType = "";
    $accountType2 = "";
    
    $edit="";
    $cngpss="";
    $status="";
    $click="";
    
    session_start();
    
    if (!isset($_SESSION['username'])) {
        //header("Location: home.html");
    }else{
        //header("Location: home.php");
        $userName = $_SESSION['username'];
        //$userID = $_SESSION['userID'];
        
        $sql="SELECT * FROM users WHERE username = '$userName'";
        $query=mysql_query($sql);
        $row="";
        if(mysql_num_rows($query)>0)
        {
            while($row=mysql_fetch_object($query))
            {   
                $userID = $row->uid;
                //$userName = $row->username;
                $firsName = $row->firstName;
                $lastName = $row->lastName;
                $password = $row->password;
                $emailID = $row->email;
                $mobileNO = $row->mobileNo;
                $accountType = $row->accountType;
                
                if($accountType == "Male")
                {
                    $accountType2 = "Female";
                }else{
                    $accountType2 = "Male";
                }
                
            }
        }
    }
    
    echo $userID;
    
    if (isset($_GET['edit'])) {
        
        $edit = $_GET['edit'];
            
    ?>
    
    <!-- [ Edit Profile ] Button Pop Up FORM HTML -->
          
    <div id="simpleModal" class="modal">
            <div class="modal-content">
                <form action="" method="post" id="update-form">
                    <div class="modal-header">
                        <!--<button class="button btn-updt">Update Here</button>-->
                        <input type="submit" id="updt-btn" class="button btn-updt" name="btn_updt" value="Update Profile">
                        <h2>Personal Information</h2>
                        <span class="closeBtn">&times;</span>
                    </div>
                    <div class="modal-container modal-body">
                        <div class="textbox-items">
                            <label>Username :</label><input type="text" id="name" class="form-items" name="name" placeholder="<?php echo $userName; ?>" readonly>
                            <label>First Name :</label><input type="text" id="fname" class="form-items" name="fname" placeholder="<?php echo $firsName; ?>" value="<?php echo $firsName; ?>">
                            <label>Last Name :</label><input type="text" id="lname" class="form-items" name="lname" placeholder="<?php echo $lastName; ?>" value="<?php echo $lastName; ?>">
                            <label>Email ID :</label><input type="email" id="email" class="form-items" name="email" placeholder="<?php echo $emailID; ?>" value="<?php echo $emailID; ?>">
                            <label>Phone Number :</label><input type="text" id="contact" class="form-items" name="contact" placeholder="<?php echo $mobileNO; ?>" value="<?php echo $mobileNO; ?>">
                            <label>Account Type :</label><select id="a-type" name="a_type" class="form-items">
                                <?php echo "<option value='$accountType' selected>$accountType</option><option value='$accountType2'>$accountType2</option>" ; ?>
                            </select>
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
    
    if (isset($_GET['cngpss'])) {
        
        $cngpss = $_GET['cngpss'];
            
    ?>
           
    <!-- [ Change Password ] Button Pop Up FORM HTML -->
            
    <div id="simpleModal" class="modal">
            <div class="modal-content">
                <form action="" method="post" id="update-form">
                    <div class="modal-header">
                        <!--<button class="button btn-updt">Update Here</button>-->
                        <input type="submit" id="updt-btn" class="button btn-updt" name="btn_cngpw" value="Change Password">
                        <h2>Account Settings</h2>
                        <span class="closeBtn">&times;</span> 
                    </div>
                    <div class="modal-container modal-body">
                        <div class="textbox-items">
                            <label>Current Password :</label><input type="password" id="cpw" class="form-items" name="cpw" >
                            <label>New Password :</label><input type="password" id="npw" class="form-items" name="npw" >
                            <label>Confirm New Password :</label><input type="password" id="cfpw" class="form-items" name="cfpw" >
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
    
    
    if (isset($_GET['propic'])) {
        
        $propic = $_GET['propic'];
            
    ?>
           
    <!-- [ Upload Profile Pic ] Button Pop Up FORM HTML to Select File -->
            
    <div id="simpleModal" class="modal">
            <div class="modal-content">
                <form  action="imageupload.php" method="post" enctype="multipart/form-data" id="update-form">
                    <div class="modal-header">
                        <!--<button class="button btn-updt">Update Here</button>-->
                        <input type="submit" id="updt-btn" class="button btn-updt" name="pro_pic" value="Change">
                        <h2 for="fileSelect">Choose a Picture</h2>
                        <span class="closeBtn">&times;</span>
                    </div>
                    <div class="modal-container modal-body">
                        <div class="textbox-items">
                          <label><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="color: red;">Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB.</span></strong></label>
                          <br />
                          <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           <!--<label for="fileSelect">Choose a Photo:</label>-->
                            <input type="file" name="photo" id="fileSelect" value="Change Photo">
                            <!--<input type="submit" name="submit" value="Change Photo">-->
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
    
    if(isset($_POST['btn_updt'])){
        
        $validation = true;
        //echo "working!";
        
        function checkUserByEmail($email)
        {
            global $validation;
            global $status;

            $resE=mysql_query("SELECT * FROM users WHERE email='$email'");

            $rowE=mysql_fetch_array($resE);

            if( $rowE['email'] == $email ) {
                //echo "<br>This Email ID already exist! Try a different one!";
                $validation = false;
                $status ="eml";
                $click = "false";
            }
        }
        
        $click = "true";
        //header('Refresh:0; advertisement.php');
        if(isset($_POST['fname']))
        {
            $firsName=$_POST['fname'];
        }

        if(isset($_POST['lname']))
        {
            $lastName=$_POST['lname'];
        }

        if(isset($_POST['contact']))
        {
            $mobileNO=$_POST['contact'];
        }
        
        if(isset($_POST['email']))
        {
            $emailID=$_POST['email'];
            checkUserByEmail($email);
        }
        
        if(isset($_POST['a_type']))
        {
            $accountType=$_POST['a_type'];
        }
        
        if($validation==true)    
        {
        
            $sql="UPDATE users SET uid='$userID', username='$userName', firstName='$firsName', lastName='$lastName', password='$password', email='$emailID', mobileNo='$mobileNO', accountType='$accountType' WHERE uid LIKE '$edit' ";
            $query=mysql_query($sql);
            if($query)
            {
                echo "Updated";
                $status = "Updated";

                //header('Refresh:0; advertisement.php');
                //header("Location: advertisement.php");
            }else{
                echo " :( ";
            }
        
        }
        
    }
    
    if (isset($_POST['btn_cngpw'])) {
        
        $click = "true";
        
        $cpw = $_POST['cpw'];
        $npw = $_POST['npw'];
        $cfpw = $_POST['cfpw'];
        
        if($cpw=="")
        {
            $status ="Enter Your Current Password!";
            
        }else if($cpw==$password)
        {
            if($cpw==$npw)
            {
                $status =" Can't set current password as new password! ";
                
            }else if($npw==$cfpw)
            {
                $password=$npw;
                
                $sql="UPDATE users SET uid='$userID', username='$userName', firstName='$firsName', lastName='$lastName', password='$password', email='$emailID', mobileNo='$mobileNO', accountType='$accountType' WHERE uid LIKE '$cngpss' ";
                $query=mysql_query($sql);
                if($query)
                {
                    echo "Updated";
                    $status = "Updated";

                    //header('Refresh:0; advertisement.php');
                    //header("Location: advertisement.php");
                }else{
                    echo " :( ";
                    $status = "Something went wrong while updating!";
                }
                
            }else{
                echo " :( ";
                $status = "New & Confirm Password didn't match!";
            }
        }else{
            echo " :( ";
            $status = "Your Current Password didn't match!";
        }

    }
    
    if(isset($_POST["post_add"]))
    {
        require_once 'connectionadds.php';
                
                $addFor = trim($_POST['for']);
                $addFor = strip_tags($addFor);
                $addType = trim($_POST['f_type']);
                $addType = strip_tags($addType);
                $bed = trim($_POST['bed']);
                $bed = strip_tags($bed);
                $mstrBed = trim($_POST['mbed']);
                $mstrBed = strip_tags($mstrBed);
                $belcony = trim($_POST['belcony']);
                $belcony = strip_tags($belcony);
                $price = trim($_POST['price']);
                $price = strip_tags($price);
                $currency = trim($_POST['currency']);
                $currency = strip_tags($_POST['currency']);
                $price = $price . " " . $currency;
                $sqr_ft = trim($_POST['sqr_ft']);
                $sqr_ft = strip_tags($sqr_ft);
                $dAd = trim($_POST['dAd']);
                $dAd = strip_tags($dAd);
                $district = trim($_POST['district']);
                $district = strip_tags($district);
                $division = trim($_POST['division']);
                $division = strip_tags($division);
                $location = trim($_POST['location']);
                $location = strip_tags($location);
                $floor = trim($_POST['floor']);
                $floor = strip_tags($floor);
                $indetails = trim($_POST['indetails']);
                $indetails= strip_tags($indetails);
                $amobileNo = trim($_POST['acontact']);
                $amobileNo = strip_tags($amobileNo);
        
                date_default_timezone_set('Asia/Dhaka');
                $date= date('m-d-Y') ;
                
                $sql="INSERT INTO advertises(addOwner, addOwnerID, addFor, addType, bed, masterBeed, belcony, attachedDD, squareFeet, price, contactNo, floor, division, district, location, inDetail, date) VALUES('$userName', '$userID', '$addFor', '$addType', '$bed', '$mstrBed', '$belcony', '$dAd', '$sqr_ft', '$price', '$amobileNo', '$floor', '$division', '$district', '$location', '$indetails', '$date')";
                $query=mysql_query($sql);
        
                if($query)
                {
                    //echo "<br>Added";
                    //mysql_close($conn);
                            $sql="SELECT * FROM advertises";
                            $query=mysql_query($sql);
                            $row="";
                            $addID="";
                            if(mysql_num_rows($query)>0)
                            {
                                while($row=mysql_fetch_object($query))
                                {      
                                    $addID = $row->aid;
                                }
                            }
                    
                    //------------UPLOAD MULTIPLE PHOTO-------------//
                    
                    //Creating Custom Path according to Username & advertiseID
                    $dir = "uploads\\shondhan_users\\";
                    $addPath = $dir . "$userName\\" . "$addID";
                    $addDir = $dir . "$userName\\"."$addID\\";
                    $picName = "$userName"."$addID";
                    $tempName = "$userName"."$addID";
                    
                    echo $addDir;
                    //Create PARTICULAR Directory if not Exist!
                    if (!file_exists("$addPath")) {
                        mkdir("$addPath", 0777, true);
                    }
                        //Check if Selected Photo is More than One! 
                        if(count($_FILES['upload']['name']) > 0){
                        //Loop through each file
                        for($i=0; $i<count($_FILES['upload']['name']); $i++) {
                            
                          //Get the temp file path
                            $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

                            //Make sure we have a filepath
                            if($tmpFilePath != ""){

                                //save the filename
                                $shortname = $_FILES['upload']['name'][$i];

                                //save the url and the file
                                $filePath = "$addDir".$_FILES['upload']['name'][$i];
                                // Verify file extension
                                $ext = pathinfo($filePath, PATHINFO_EXTENSION);

                                //Upload the file into the temp dir
                                if(move_uploaded_file($tmpFilePath, $filePath)) {

                                    $files[] = $shortname;
                                    rename("$filePath", "$addDir"."$picName"."$i"."."."$ext");
                                    
                                    //insert into db 
                                    //use $shortname for the filename
                                    //use $filePath for the relative url to the file

                                }
                              }
                        }
                    }
                    
                    $status = "Updated";

                    //show success message
                    echo "<h1>Uploaded:</h1>";    
                    if(is_array($files)){
                        echo "<ul>";
                        foreach($files as $file){
                            echo "<li>$file</li>";
                        }
                        echo "</ul>";
                    }
                    //header('Refresh:0; home.php');
                }else{
                    //echo "<br> Couldn't add! :( ";
                    $status = "ErrorUP";
                }
    }
    
    if (isset($_GET['postfor'])) {
        
            $addFor=$_GET['postfor'];
            date_default_timezone_set('Asia/Dhaka');
                $date= date('m-d-Y') ;
        
        ?>
        
        <!-- [ POST ADD ] div with image Click Pop Up FORM HTML -->
        
        <div id="simpleModal" class="modal">
            <div class="modal-content">
                <form action="" method="post" enctype="multipart/form-data" id="update-form">
                    <div class="modal-header">
                        <!--<button class="button btn-updt">Update Here</button>-->
                        <input type="submit" id="updt-btn" class="button btn-updt" name="post_add" value="Post">
                        <h2>Post Advertise</h2>
                        <span class="closeBtn">&times;</span>
                    </div>
                    <div class="modal-container modal-body">
                        <div class="textbox-items">
                            <label>Advertise For :</label><input type="text" id="for" class="form-items" name="for" placeholder="<?php echo $addFor; ?>" value="<?php echo $addFor; ?>" readonly>
                            <label>Property Type :</label>
                                          <select name="f_type" id="f-type" class="form-items">
                <option value="Apartment">Apartment</option>
                <option value="Building">Building</option>
                <option value="Duplex Villa">Duplex Villa</option>
                <option value="Flat">Flat</option>
                <option value="Land">Land</option>
              </select>
                            <label>Number of Beds :</label><input type="number" min="1" id="bed" class="form-items" name="bed" placeholder="<?php echo $bed; ?>" value="<?php echo $bed; ?>" required>
                            <label>Number of Master Beds :</label><input type="number" min="1" id="mbed" class="form-items" name="mbed" placeholder="<?php echo $mstrBed; ?>" value="<?php echo $mstrBed; ?>" required>
                            <label>Number of Belcony :</label><input type="number" min="1" id="belcony" class="form-items" name="belcony" placeholder="<?php echo $belcony; ?>" value="<?php echo $belcony; ?>" required>
                            <label>Attached Drawing/Dining :</label><select name="dAd" id="attch-dw" class="form-items">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                              </select>
                            <label>Square Feet :</label><input type="number" id="sqr-ft" class="form-items" name="sqr_ft" placeholder="<?php echo $sqr_ft; ?>" value="<?php echo $sqr_ft; ?>" required>
                            <label>Price :</label><input type="number" id="price" class="form-items" name="price" placeholder="<?php echo $price; ?>" value="<?php echo $price; ?>" required><select name="currency" class="form-items" id="currency">
                    <option value="TK">TK</option>
                    <option value="$">$</option>
                    <option value="€">€</option>
                    <option value="RS">RS</option>
                  </select>
                            <label>Contact No :</label><input type="text" id="contact" class="form-items" name="acontact" placeholder="<?php echo $amobileNO; ?>" value="<?php echo $amobileNO; ?>" required>
                            <label>Floor No :</label><input type="text" id="floor" class="form-items" name="floor">
                            <label>Division :</label><select name="division" class="form-items" id="f-div">
                    <option value="Dhaka">Dhaka</option>
                    <option value="Chittagong">Chittagong</option>
                    <option value="Khulna">Khulna</option>
                    <option value="Barisal">Barisal</option>
                    <option value="Sylhet">Sylhet</option>
                    <option value="Rajshahi">Rajshahi</option>
                    <option value="Mymensingh">Mymensingh</option>
                    <option value="Rangpur">Rangpur</option>
                  </select>
                            <label>District :</label><input type="text" id="district" class="form-items" name="district" placeholder="<?php echo $district; ?>" value="<?php echo $district; ?>" required>
                            <label>Location :</label><input type="text" id="location" class="form-items" name="location" placeholder="<?php echo $location; ?>" value="<?php echo $location; ?>" required>
                            <label>Short Description :</label><textarea rows="5" cols="50" id="indetails" class="form-items" name="indetails" value="<?php echo $inDetail; ?>"></textarea>
                            <label>Date :</label><input type="text" id="date" class="form-items" name="date" placeholder="<?php echo $date; ?>" readonly>
                            <label>Choose File (Max 5) :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input id='upload' name="upload[]" type="file" multiple="multiple" value="Add Photo" />

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
    
    //better create 3 different page for seerent, seeadds & seesale!!
    if (isset($_GET['seerent'])) {

    }
    
    if (isset($_GET['seeadds'])) {

    }
    
    if (isset($_GET['seesale'])) {

    }
    
    if (isset($_GET['logout'])) {

        session_destroy();
        //unset($_SESSION['Username']);
        header("Location: index.php");
        exit;
    }
?>
   
   <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Shondhan.com</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
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
            <li class="nav-item active">
              <a class="nav-link" href="myprofile.php"><?php echo $userName; ?></a>
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
    
    <!--MAIN HTML of myprofile.php File -->
    
    <section id="profile-body">
        <div id="profile-info">
            <div id="profile-pic" style="">
               
                <?php
                    
                    //---------- Get Profile Pic From Directory ------------//
                    
                    // ROOT Directory
                    $dir = "uploads\\shondhan_users\\";
                
                    // Set User Folder
                    $userPath = $dir . "$userName";
                
                    // Go to User Dir
                    $userDir = $dir . "$userName\\";
                
                    // Set Pic Name For User's Profile Pic
                    $picName = $userName;
                
                    // Store The pic name in Another temp Variable! 
                    $tempName = $userName;
                
                    //Set Full Path of the pic with pic name as well as file extension! EX: D:\MyFolder\myPic.jpg
                    $userPP = $userDir . "$userName" . ".jpg";
                
                    
                    //Check if .jpg file exist!
                    if (file_exists($userPP)) {
                        //echo "The file $filename exists";
                        $userPP = $userDir . "\\$userName" . ".jpg";
                        $picName = $tempName . ".jpg";
                    } else {
                        //echo "The file $filename does not exist";
                        $userPP = $userDir . "\\$userName" . ".jpeg";  // EX: D:\MyFolder\myPic.jpeg
                        
                        //Check if .jpeg file exist!
                        if (file_exists($userPP)) {
                            //echo "The file $filename exists";
                            $userPP = $userDir . "\\$userName" . ".jpeg";
                            $picName = $tempName . ".jpeg";
                        } else {
                            //echo "The file $filename does not exist";
                            $userPP = $userDir . "\\$userName" . ".png"; // EX: D:\MyFolder\myPic.png
                            
                            //Check if .png file exist!
                            if (file_exists($userPP)) {
                                //echo "The file $filename exists";
                                $userPP = $userDir . "\\$userName" . ".png";
                                $picName = $tempName . ".png";
                            } else {
                                //echo "The file $filename does not exist";
                                $userPP = $userDir . "\\$userName" . ".gif"; // EX: D:\MyFolder\myPic.gif
                                
                                //Check if .gif file exist!
                                if (file_exists($userPP)) {
                                    //echo "The file $filename exists";
                                    $userPP = $userDir . "\\$userName" . ".gif";
                                    $picName = $tempName . ".gif";
                                } else {
                                    //echo "The file does not exist";
                                }
                            }
                        }
                    }
                    
                
                    //Sending User Profile Photo File Directory information to imageupload.php file using session!
                    $_SESSION["userdir"]=$userDir;
                    $_SESSION["userpath"]=$userPath;
                    $_SESSION["fullpath"]=$userPP;
                    $_SESSION["picname"]=$picName;

                    //echo "<br> $userPP </br>";
                    //echo "<br> $extn </br>"; 
                
                ?>
                <!--<img src="<?php echo $userPP; ?>" alt="Profile Pic" width="230" height="230" />-->
                <img src="<?php echo $userPP; ?>" alt="Profile Pic" />
                <?php 
                    if(isset($_SESSION['username']))
                    {
                ?>
                <a href="?propic=<?php echo $userPP; ?> " class="abtn-choose" name="abtn_choose">Upload Profile Pic</a>
                <?php
                    }
                ?>
            </div>
            <div id="personal-info">
               <div id="info-text">
                   <h4>@<?php echo $userName; ?></h4>
                    <!--<p class="information"> username : <span class="t-rooms"><?php echo $userName; ?></span></p>-->
                    <p class="information"> Full Name : <span class="fname"><?php echo $firsName." ".$lastName; ?></span></p>
                    <p class="information"> Email: <span class="email"><?php echo $emailID; ?></span></p>
                    <p class="information"> Mobile NO : <span class="mobile"><?php echo $mobileNO; ?></span></p>
                    <p class="information"> Gender : <span class="gender"><?php echo $accountType; ?></span></p>
               </div>
               <div id="info-btn">
                  <?php 
                    if(isset($_SESSION['username']))
                    {
                ?>
                   <a href="?cngpss=<?php echo $userID; ?> " class="abtn abtn-dlt" name="abtn_dlt">Change Password</a>
                    <a href="?edit=<?php echo $userID; ?> " class="abtn abtn-updt" name="abtn_updt">Edit Profile</a>
                  <?php
                    }
                ?>
               </div>
            </div>
        </div>
        <div id="profile-details" class="mycontainer">
           <div id="profile-stat" class="mycontainer">
               profile stat will be here!
           </div>
           <div id="profile-postadd" class="mycontainer">
               <div id="profile-postaddrent" class="mycontainer">
                   <h2>&nbsp;&nbsp;&nbsp;POST ADD</h2>
                   <a href="?postfor=<?php echo "Rent"; ?>"  class="Clickable"></a>
               </div>
               <div id="profile-postaddsale" class="mycontainer">
                   <h2>&nbsp;&nbsp;POST ADD</h2>
                   <a href="?postfor=<?php echo "Sale"; ?>"  class="Clickable"></a>
               </div>
           </div>
           <div id="profile-myadds" class="mycontainer">
                <div id="profile-myaddsrent" class="mycontainer">
                   can see rent adds from here!
                   <a href="?seerent"  class="Clickable"></a>
               </div>
               <div id="profile-myaddsall" class="mycontainer">
                  <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SEE ALL OF YOUR POSTED ADDS</h3>
                   <a href="userAdds.php"  class="Clickable"></a>
               </div>
               <div id="profile-myaddssale" class="mycontainer">
                   can see sale adds from here!
                   <a href="?seesale"  class="Clickable"></a>
               </div>
           </div>
            
        </div>
    </section>
    <div id="profile-footer">
        <h3>&copy; Shondhan.com </h3>
    </div>
    <script type="text/javascript" src="js/myprofile.js">
            
    </script>
    <script type="text/javascript">
        var stat = "<?php echo $status; ?>";
        var clic = "<?php echo $click; ?>";
        var usrpp = "<?php echo $userPP; ?>";
        
        //alert(usrpp);
        if(stat == "Updated")
        {
            //alert("closing");
            document.location.href='myprofile.php';
            alert(stat);
        }else if(stat == "eml")
            {
                alert("This email already Taken!");
            }else if(clic == "true"){
            alert(stat);
        }

    </script>
</body>
</html>