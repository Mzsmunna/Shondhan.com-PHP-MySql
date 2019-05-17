<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shondhan Login Page</title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <style>
        body {
            background: url(images/3.jpg) no-repeat 0px 0px;
            background-size: cover;
            font-family: "Roboto", sans-serif;
        }

    </style>
</head>

<body class="bg-dark">
   <?php
    
        session_start();
    
        if (isset($_SESSION['username'])) {
            $user = $_SESSION['username'];
            //unset($_SESSION['Username']);
          header("Location: myprofile.php");
          //exit;
        }
    
    	if( isset($_POST['login']) ) {
            
            require_once 'connection.php';
		
		$username = $_POST['username'];
		$password = $_POST['password'];
        $status = "";
		
		$username = strip_tags(trim($username));
		$password = strip_tags(trim($password));
		
		//$pass = hash('sha256', $Password); // password hashing using SHA256
		
		$res=mysql_query("SELECT * FROM users WHERE username='$username' OR email='$username'");
		
		$row=mysql_fetch_array($res);
		
		$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
            
        if( $count == 1 && $row['password']==$password ) {
            session_start();
            $_SESSION['username'] = $row['username'];
            $_SESSION['userID'] = $row['uid'];
            header("Location: myprofile.php");
        } else {
            //echo "<br>Wrong Username Or Password, Try again...";
            $status="Error";

        }
		
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
            <li class="nav-item active">
              <a class="nav-link" href="logreg.php">Login/Register<span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
   
   
    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Login</div>
            <div class="card-body">
                <form method="post" action="#">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username / Email address</label>
                        <input name="username" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter username / email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="password" class="form-control" id="exampleInputPassword1" type="password" placeholder="Enter Password">
                    </div>
                    <input class="btn btn-primary btn-block" type="submit" name="login" value="Log In" />
<!--                    <a class="btn btn-primary btn-block" href="index.html">Login</a>-->
                </form>
                <div class="text-center">
                    <a class="d-block small mt-3" href="register.php">Register an Account</a>
                    <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script type="text/javascript">
    var stat = "<?php echo $status; ?>";
      if(stat == "Error")
        {
            alert("Wrong username/email or Password!");
            //alert(stat);
        }
    </script>
</body>

</html>
