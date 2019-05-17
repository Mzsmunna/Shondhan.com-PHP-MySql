<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shondhan.com - Advertise Item</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

  </head>

  <body>
    <?php
        require_once 'connectionadds.php';
        session_start();
      
        if (!isset($_SESSION['username'])) {
            //header("Location: home.html");
        }else{
            //header("Location: home.php");
            $username = $_SESSION['username'];
            $userId = $_SESSION['userID'];
        }
    
        if (isset($_GET['logout'])) {

            session_destroy();
            //unset($_SESSION['Username']);
            header("Location: portfolio-1-col.php");
            exit;
        }
      
        if (isset($_GET['interest'])) {
            $sql="SELECT * FROM advertises where aid='{$_GET['aid']}' ";
            $query=mysql_query($sql);
            $row=mysql_fetch_object($query);
        }
      
            $sql="SELECT * FROM advertises where aid='{$_GET['aid']}' ";
            $query=mysql_query($sql);
            $row=mysql_fetch_object($query);
            //if(mysql_num_rows($query)>0)
            //{
                //while($row=mysql_fetch_object($query))
                //{ 
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
      
                //Get all the Image of Particular Add using file directory!
                $dir = "uploads\\shondhan_users\\";  //ROOT Directory!
                $addPath = $dir . "$addOwner\\" . "$addID"; //ADD Directory accortding to username & addID
                $addDir = $dir . "$addOwner\\"."$addID\\"; //Go to the directory
                $picName = "$addOwner"."$addID"; // Pic Name incomplete with Full directory!
      
                // HARD CODED!!!!!!!!!!! 
                // Very Bad Practice! 
                // Use Loop and Array!
                $picPath1 = "$addDir"."$picName"."0"; // 1st pic name without file extension!
      $picPath2 = "$addDir"."$picName"."1"; // 2nd pic name without file extension!
      $picPath3 = "$addDir"."$picName"."2"; // 3rd pic name without file extension!
      $picPath4 = "$addDir"."$picName"."3"; // 4th pic name without file extension!
      $picPath5 = "$addDir"."$picName"."4"; // 5th pic name without file extension!
                
                    $getPic1 = $picPath1 . ".jpg"; // 1st pic name with file extension!
                    $getPic2 = $picPath2 . ".jpg"; // 2nd pic name with file extension!
                    $getPic3 = $picPath3 . ".jpg"; // 3rd pic name with file extension!
                    $getPic4 = $picPath4 . ".jpg"; // 4th pic name with file extension!
                    $getPic5 = $picPath5 . ".jpg"; // 5th pic name with file extension!
                    
      
                    //Check if .jpg file exiat
                    if ((file_exists($getPic1))||(file_exists($getPic2))||(file_exists($getPic3))||(file_exists($getPic4))||(file_exists($getPic5))) {
                        //echo "The file $filename exists";
                        $getPic1 = $picPath1 . ".jpg";
                        $getPic2 = $picPath2 . ".jpg";
                        $getPic3 = $picPath3 . ".jpg";
                        $getPic4 = $picPath4 . ".jpg";
                        $getPic5 = $picPath5 . ".jpg";
                        //$picName = $tempName . ".jpg";
                    } else {
                        //echo "The file $filename does not exist";
                        $getPic1 = $picPath1 . ".jpeg"; // 1st pic name with file extension!
                        $getPic2 = $picPath2 . ".jpeg"; // 2nd pic name with file extension!
                        $getPic3 = $picPath3 . ".jpeg"; // 3rd pic name with file extension!
                        $getPic4 = $picPath4 . ".jpeg"; // 4th pic name with file extension!
                        $getPic5 = $picPath5 . ".jpeg"; // 5th pic name with file extension!
                        
                        //Check if .jpeg file exiat
                        if (file_exists($getPic)) {
                            //echo "The file $filename exists";
                            $getPic1 = $picPath1 . ".jpeg";
                        $getPic2 = $picPath2 . ".jpeg";
                        $getPic3 = $picPath3 . ".jpeg";
                        $getPic4 = $picPath4 . ".jpeg";
                        $getPic5 = $picPath5 . ".jpeg";
                            //$picName = $tempName . ".jpeg";
                        } else {
                            //echo "The file $filename does not exist";
                            $getPic1 = $picPath1 . ".png"; // 1st pic name with file extension!
                            $getPic2 = $picPath2 . ".png"; // 2nd pic name with file extension!
                            $getPic3 = $picPath3 . ".png"; // 3rd pic name with file extension!
                            $getPic4 = $picPath4 . ".png"; // 4th pic name with file extension!
                            $getPic5 = $picPath5 . ".png"; // 5th pic name with file extension!
                            
                            //Check if .png file exiat
                            if (file_exists($getPic)) {
                                //echo "The file $filename exists";
                                $getPic1 = $picPath1 . ".png";
                            $getPic2 = $picPath2 . ".png";
                            $getPic3 = $picPath3 . ".png";
                            $getPic4 = $picPath4 . ".png";
                            $getPic5 = $picPath5 . ".png";
                            } else {
                                //echo "The file $filename does not exist";
                                $getPic1 = $picPath1 . ".gif"; // 1st pic name with file extension!
                                $getPic2 = $picPath2 . ".gif"; // 2nd pic name with file extension!
                                $getPic3 = $picPath3 . ".gif"; // 3rd pic name with file extension!
                                $getPic4 = $picPath4 . ".gif"; // 4th pic name with file extension!
                                $getPic5 = $picPath5 . ".gif"; // 5th pic name with file extension!
                                
                                //Check if .gif file exiat
                                if (file_exists($getPic)) {
                                    //echo "The file $filename exists";
                                    $getPic1 = $picPath1 . ".gif";
                                $getPic2 = $picPath2 . ".gif";
                                $getPic3 = $picPath3 . ".gif";
                                $getPic4 = $picPath4 . ".gif";
                                $getPic5 = $picPath5 . ".gif";
                                } else {
                                    //echo "The file does not exist";
                                    
                                    // If no no found then set a default pic for all!
                                    $getPic1 ="http://placehold.it/700x300";
                                    $getPic2 ="http://placehold.it/700x300";
                                    $getPic3 ="http://placehold.it/700x300";
                                    $getPic4 ="http://placehold.it/700x300";
                                    $getPic5 ="http://placehold.it/700x300";
                                }
                            }
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

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3"><?php echo $addType; ?>
        <small> For <?php echo $addFor; ?></small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Advertise Item - Details</li>
      </ol>

      <!-- Portfolio Item Row -->
      <div class="row">

        <div class="col-md-8">
          <img class="img-fluid" src="<?php echo $getPic1; ?>" alt="">
        </div>

<!--
        <div class="col-md-4">
          <h3 class="my-3">Project Description</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
          <h3 class="my-3">Project Details</h3>
          <ul>
            <li>Lorem Ipsum</li>
            <li>Dolor Sit Amet</li>
            <li>Consectetur</li>
            <li>Adipiscing Elit</li>
          </ul>
        </div>
-->
        <div class="col-md-4" id="<?php echo $addID; ?>">
        <div class="my-3">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo $getPic; ?>" alt="">
          </a>
        </div>
        <div class="my-3">
          <h3><?php echo $addFor; ?> Amount : <a class="btn btn-danger disabled ml-4" href=""><?php echo $price; ?>
<!--            <span class="glyphicon glyphicon-chevron-right"></span>-->
          </a></h3>
          <p><?php echo $inDetail; ?></p>
          <p class="information"> Number of Rooms : <span class="t-rooms"><?php echo $bed; ?></span></p>
          <p class="information"> Number of Master Bed : <span class="mb-rooms"><?php echo $mstrBed; ?></span></p>
          <p class="information"> Number of Belcony : <span class="belcony"><?php echo $belcony; ?></span></p>
          <p class="information"> Attatched Drawing and Dining : <span class="a-dd"><?php echo $dAd; ?></span></p>
          <p class="information"> Square feets : <span class="sqr-ft"><?php echo $sqr_ft; ?></span></p>
          <p class="information"> Division : <span class="division"><?php echo $division; ?></span></p>
          <p class="information"> District : <span class="district"><?php echo $district; ?></span></p>
          <p class="information"> Contact Number : <span class="contact"><?php echo $mobileNO; ?></span></p>
          <?php
                        if($username!=$addOwner)
                        {
                    ?>
          <a class="btn btn-success" href="?interest=<?php echo $addID; ?> ">Interested
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
                              <?php
                        }
                    ?>
        </div>
      </div>

      </div>
      <!-- /.row -->

      <!-- Adds More Phott Row -->
      <h3 class="my-4">More Photos</h3>

      <div class="row">

        <div class="col-md-3 col-sm-6 mb-4">
          <a href="<?php echo $getPic2; ?>">
            <img class="img-fluid" src="<?php echo $getPic2; ?>" alt="">
          </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
          <a href="<?php echo $getPic3; ?>">
            <img class="img-fluid" src="<?php echo $getPic3; ?>" alt="">
          </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
          <a href="<?php echo $getPic4; ?>">
            <img class="img-fluid" src="<?php echo $getPic4; ?>" alt="">
          </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
          <a href="<?php echo $getPic5; ?>">
            <img class="img-fluid" src="<?php echo $getPic5; ?>" alt="">
          </a>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Shondhan.com 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
