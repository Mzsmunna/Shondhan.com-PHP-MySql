<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Shondhan Register Page</title>
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
    <?php
    
        session_start();
        if (isset($_SESSION['username'])) {
            $user = $_SESSION['username'];
            //unset($_SESSION['Username']);
          header("Location: myprofile.php");
          //exit;
        }
        
            $validation = true;
            $username="";
            $firstName="";
            $lastName="";
            $email="";
            $password="";
            $CPassword="";
            $accountType="";
            $mobileNo="";
            $status="";

            if(isset($_POST['Confirm'])) {
                
                require_once 'connection.php';
                
                function checkUserByName($username)
                {
                    global $validation;
                    global $status;
                    
                    $resN=mysql_query("SELECT * FROM users WHERE username='$username'");
                
                    $rowN=mysql_fetch_array($resN);
                    
                    if( $rowN['username'] == $username ) {
                        //echo "<br>This username name already exist! Try a different one!";
                        $validation = false;
                        $status ="usr";
                        
                    }
                }
                
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
                    }
                }
                
                //if (!empty($_POST["user_name"])) {
                    $username = trim($_POST['user_name']);
                    $username = strip_tags($username);
                    checkUserByName($username);
                    //$empty = false;
                    /*if(preg_match('/^[A-Za-z]{3,20}$/', $username))
                    {
                        //$validation = true;
                        echo "<br>user_name : Verified by Only letters!";
                        checkUserByName($username);
                    }elseif(preg_match('/^[a-zA-Z]{3,16}[0-9]{0,4}$/', $username))
                    {
                        //$validation = true;
                        echo "<br>user_name : Verified by letters along with numbers upto 4!";
                        checkUserByName($username);
                    }else{
                        $validation = false;
                    }*/
//                }else{
//                    $empty = true;
//                }
                
                //if (!empty($_POST["first_name"])) {
                
                    $firstName = trim($_POST['first_name']);
                    $firstName = strip_tags($firstName);
                    //$empty = false;
//                    if (!preg_match("/^[A-Za-z]{3,20}$/",$firstName)) {
//                        //$nameErr = "Only letters and white space allowed"; 
//                        echo "<br>first_name : Only letters allowed with minimum 3 letters!";
//                        $validation = false;
//                    }else{
//                        //$validation = true;
//                        echo "<br>first_name : Verified by Only letters!";
//                    }
//                }else{
//                    $empty = true;
//                }
                
//                if (!empty($_POST["last_name"]))
//                {
                    $lastName = trim($_POST['last_name']);
                    $lastName = strip_tags($lastName);
                    //$empty = false;
//                    if (!preg_match("/^[A-Za-z]{3,20}$/",$lastName)) {
//                        //$nameErr = "Only letters and white space allowed"; 
//                        echo "<br>last_name : Only letters allowed with minimum 3 letters!";
//                        $validation = false;
//                    }else{
//                        //$validation = true;
//                        echo "<br>last_name : Verified by Only letters!";
//                    }
//                }else{
//                    $empty = true;
//                }
                
//                if ((!empty($_POST["password"])) && (!empty($_POST["confirmPassword"])))
//                {
                    $password = trim($_POST['password']);
                    $password = strip_tags($password);
                    $CPassword = trim($_POST['confirmPassword']);
                    $CPassword = strip_tags($CPassword);
                    //echo "<br> password : ". $password;
                    //echo "<br> retyp password : ". $CPassword;
                    if ( strcasecmp( "$password", "$CPassword" ) == 0 ){

                        //echo "<br>Password matched!";
                        
                        // password encrypt using SHA256();
                        //$pass = hash('sha256', $password);
                        //$empty = false;
                    }else{
                        //echo "<br>password didn't match!";
                        $validation = false;
                        $status = "pwd";
                        //$empty = true;
                    }
                    
//                }else{
//                    $empty = true;
//                }
                
//                if (!empty($_POST["email"]))
//                {
                    $email = trim($_POST['email']);
                    $email = strip_tags($email);
                    checkUserByEmail($email);
                    //$empty = false;
//                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//                        //$emailErr = "Invalid email format";
//                        echo "<br>Invalid email format";
//                        $validation = false;
//                    }else{
//                        //$validation= true;
//                        checkUserByEmail($email);
//                    }
//                }else{
//                    $empty = true;
//                }
                
//                if (!empty($_POST["phone"]))
//                {
                    $mobileNo = trim($_POST['phone']);
                    $mobileNo = strip_tags($mobileNo);
                    //$empty = false;
                    
                    /*if(preg_match('/^[0-9]{8,15}$/', $mobileNo))
                    {
                        //$validation = true;
                        echo "<br>Number Varified!";
                    }*/
//                    if(preg_match('/^\(?\+?([0-9]{1,4})\)?[-\. ]?(\d{3})[-\. ]?([0-9]{7})$/', $mobileNo))
//                    {
//                        //$validation = true;
//                        echo "<br>Number Varified!";
//                    }else{
//                        $validation = false;
//                        echo "<br>Number Length is not Correct or Invalid Number!";
//                    }
                    
//                }else{
//                    $empty = true;
//                }
                
//                if (!empty($_POST["AT"]))
//                {
                    $accountType = trim($_POST['AT']);
                    $accountType = strip_tags($accountType);
                
                    //$empty = false;
//                }else{
//                    $empty = true;
//                }
                
                //if(($empty==false)&&($validation==true))
                if($validation==true)    
                {
                    $sql="INSERT INTO users(username, firstName, lastName, password, email, mobileNo, accountType) VALUES('$username', '$firstName', '$lastName', '$password', '$email', '$mobileNo', '$accountType')";
                    $query=mysql_query($sql);
                    if($query)
                    {
                        //echo "<br>Added";
                        mysql_close($conn);
                        $status = "Updated";
                        //header('Refresh:0; index.php');
                    }else{
                        $status = "Error";
                        //echo "<br> Couldn't add! :( ";
                    }
                }else{
                    //echo "<br>Either Some or All Fields are Empty or You given some invalid input!";
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
        
<!-- Main Body -->
<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form method="post" action="" id="reg_form">
          <div class="form-group">
            <div class="form-row">
             <div class="col-md-12">
                <label for="exampleInputName">Username</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Enter username" name="user_name" value="<?php echo isset($_POST['user_name']) ? $username : "" ; ?>" min="3" max="20" required>
              </div>
              <div class="col-md-6 mt-3">
                <label for="exampleInputName">First name</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Enter first name" name="first_name" value="<?php echo isset($_POST['first_name']) ? $firstName : "" ; ?>" min="3" max="20" required>
              </div>
              <div class="col-md-6 mt-3">
                <label for="exampleInputLastName">Last name</label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" placeholder="Enter last name" name="last_name" value="<?php echo isset($_POST['last_name']) ? $lastName : "" ; ?>" min="3" max="20" required>
              </div>
            </div>
          </div>
          <div class="form-group">
              <label for="sel1">Gender:</label><select name="AT" id="gender" class="form-control">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                              </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="<?php echo isset($_POST['email']) ? $email : "" ; ?>" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPhone">Phone Number</label>
            <input class="form-control" id="exampleInputPhone" type="text" aria-describedby="phoneHelp" placeholder="Enter phone number" name="phone" max="15" value="<?php echo isset($_POST['phone']) ? $mobileNo : "" ; ?>" required>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6 has-feedback">
                <label for="exampleInputPassword1">Password</label>
                <input class="form-control" id="exampleInputPassword" min="3" type="password" placeholder="Password" name="password" required>
              </div>
              <div class="col-md-6 has-feedback">
                <label for="exampleConfirmPassword">Confirm password</label>
                <input class="form-control" id="exampleConfirmPassword" min="3" type="password" placeholder="Confirm password"  name="confirmPassword">
              </div>
            </div>
          </div>
          <input class="btn btn-primary btn-block" type="Submit" name="Confirm" value="Register" />
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="logreg.php">Login Page</a>
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
<!--  <script src="vendor/jquery/jqBootstrapValidation.js"></script>-->
  
  <script type="text/javascript">
      var stat = "<?php echo $status; ?>";
      if(stat == "Updated")
        {
            alert("Registration Successful!");
            var r = confirm("Press OK to login right away!");
            if (r == true) {
                var user = "<?php echo $username; ?>";
                document.location.href="instant_login.php?usr=" + user;
            } else {
                //window.location.href = "somepage.php?w1=" + hello + "&w2=" + world;
                document.location.href='logreg.php';
            }
            
        }else if(stat == "Error")
            {
                alert("Registration Unsuccessful!");
            }else if(stat == "usr")
                {
                    alert("Username already exist!");
                }else if(stat == "eml")
                    {
                        alert("email already exist!");
                    }else if(stat == "pwd")
                        {
                            alert("password didnt matched!");
                        }
//   $(document).ready(function() {
//    $('#reg_form').bootstrapValidator({
//        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
//        feedbackIcons: {
//            valid: 'glyphicon glyphicon-ok',
//            invalid: 'glyphicon glyphicon-remove',
//            validating: 'glyphicon glyphicon-refresh'
//        },
//        fields: {
//            user_name: {
//                validators: {
//                        stringLength: {
//                        min: 3,
//                    },
//                        notEmpty: {
//                        message: 'Please supply your user name'
//                    }
//                }
//            },
//            
//            first_name: {
//                validators: {
//                        stringLength: {
//                        min: 3,
//                    },
//                        notEmpty: {
//                        message: 'Please supply your first name'
//                    }
//                }
//            },
//             last_name: {
//                validators: {
//                     stringLength: {
//                        min: 3,
//                    },
//                    notEmpty: {
//                        message: 'Please supply your last name'
//                    }
//                }
//            },
//           
//            phone: {
//                validators: {
//                    notEmpty: {
//                        message: 'Please supply your phone number'
//                    },
//                    phone: {
//                        country: 'US',
//                        message: 'Please supply a vaild phone number with area code'
//                    }
//                }
//            },
//            
//	 email: {
//                validators: {
//                    notEmpty: {
//                        message: 'Please supply your email address'
//                    },
//                    emailAddress: {
//                        message: 'Please supply a valid email address'
//                    }
//                }
//            },
//					
//	password: {
//            validators: {
//                identical: {
//                    field: 'confirmPassword',
//                    message: 'Confirm your password below - type same password please'
//                }
//            }
//        },
//        confirmPassword: {
//            validators: {
//                identical: {
//                    field: 'password',
//                    message: 'The password and its confirm are not the same'
//                }
//            }
//         },
//			
//            
//            }
//        })
//		
// 	
////        .on('success.form.bv', function(e) {
////            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
////                $('#reg_form').data('bootstrapValidator').resetForm();
//// 
////            // Prevent form submission
////            e.preventDefault();
//// 
////            // Get the form instance
////            var $form = $(e.target);
//// 
////            // Get the BootstrapValidator instance
////            var bv = $form.data('bootstrapValidator');
//// 
////            // Use Ajax to submit form data
////            $.post($form.attr('action'), $form.serialize(), function(result) {
////                console.log(result);
////            }, 'json');
////        });
//});
 
 </script>
</body>

</html>
