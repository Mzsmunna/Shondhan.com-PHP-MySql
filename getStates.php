<?php
    //require_once('connection.php');
    //require_once 'connectionadds.php';

    session_start();
    $username = "";
    $userId = "";
    $src="";

    if (!isset($_SESSION['username'])) {
        //header("Location: home.html");
    }else{
        //header("Location: home.php");
        $username = $_SESSION['username'];
        $userId = $_SESSION['userID'];
    }

    $mysqli = new mysqli("localhost", "root", "", "shondhan");

    $partialState=$_POST['partialState'];
    $resultset = $mysqli->query("SELECT * FROM advertises WHERE price LIKE '%".$partialState."%' OR addFor like '%".$partialState."%' OR addType like '%".$partialState."%' OR bed like '%".$partialState."%' OR masterBeed like '%".$partialState."%' OR belcony like '%".$partialState."%' OR squareFeet like '%".$partialState."%' OR division like '%".$partialState."%' OR district like '%".$partialState."%' OR location like '%".$partialState."%' ORDER BY aid DESC");

    if($resultset->num_rows > 0){
		while ($rows = $resultset->fetch_assoc())
		{   
            $addID = $rows['aid'];
            $addOwner = $rows['addOwner'];
            $addOwnerID = $rows['addOwnerID'];
            $addFor = $rows['addFor']; 
            $addType = $rows['addType'];
            $bed = $rows['bed'];
            $mstrBed = $rows['masterBeed'];
            $belcony = $rows['belcony'];
            $dAd = $rows['attachedDD'];
            $sqr_ft = $rows['squareFeet'];
            $price = $rows['price'];
            $mobileNO = $rows['contactNo'];
            $floor = $rows['floor'];
            $division = $rows['division'];
            $district = $rows['district'];
            $location = $rows['location'];
            $inDetail = $rows['inDetail'];
            $date = $rows['date'];
            
                $dir = "uploads\\shondhan_users\\";
                $addPath = $dir . "$addOwner\\" . "$addID";
                $addDir = $dir . "$addOwner\\"."$addID\\";
                $picName = "$addOwner"."$addID";
                $picPath = "$addDir"."$picName"."0";
                
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
                                    //echo "The file does not exist";
                                    $getPic ="http://placehold.it/700x300";
                                }
                            }
                        }
                    }
            
            //echo "<div>".$price."</div>";
            //echo "<div>".$addFor."</div>";
            
            if($username==$addOwner)
            {  
                
              echo  '<div class="row" id="'.$addID.'">
                        <div class="col-md-7">
                          <a href="#">
                            <img class="img-fluid rounded mb-3 mb-md-0" src="'.$getPic.'" alt="">
                          </a>
                        </div>
                        <div class="col-md-5">
                          <h3>'.$addType.' For '.$addFor.'<a class="btn btn-danger disabled float-right" href="">'.$price.'
                            <span class="glyphicon glyphicon-chevron-right"></span>
                          </a></h3>
                          <p>'.$inDetail.'</p>
                          <p class="information"> Number of Rooms : <span class="t-rooms">'.$bed.'</span></p>
                          <p class="information"> Number of Master Bed : <span class="mb-rooms">'.$mstrBed.'</span></p>
                          <p class="information"> Number of Belcony : <span class="belcony">'.$belcony.'</span></p>
                          <p class="information"> Attatched Drawing and Dining : <span class="a-dd">'.$dAd.'</span></p>
                          <p class="information"> Square feets : <span class="sqr-ft">'.$sqr_ft.'</span></p>
                          <p class="information"> Division : <span class="division">'.$division.'</span></p>
                          <p class="information"> District : <span class="district">'.$district.'</span></p>
                          <p class="information"> Contact Number : <span class="contact">'.$mobileNO.'</span></p>
                          <a class="btn btn-primary" href="portfolio-item.php?aid='.$addID.'">View More
                            <span class="glyphicon glyphicon-chevron-right"></span>
                          </a>
                          <a class="btn btn-success" href="?btnUpdt='.$addID.'">Update
                            <span class="glyphicon glyphicon-chevron-right"></span>
                          </a>
                          <a class="btn btn-danger" href="?deleteAdd='.$addID.'">Delete
                            <span class="glyphicon glyphicon-chevron-right"></span>
                          </a>
                        </div>
                      </div>
                      <!-- /.row -->

                      <hr>';
                
            }else{
                
                echo  '<div class="row" id="'.$addID.'">
                        <div class="col-md-7">
                          <a href="#">
                            <img class="img-fluid rounded mb-3 mb-md-0" src="'.$getPic.'" alt="">
                          </a>
                        </div>
                        <div class="col-md-5">
                          <h3>'.$addType.' For '.$addFor.'<a class="btn btn-danger disabled float-right" href="">'.$price.'
                            <span class="glyphicon glyphicon-chevron-right"></span>
                          </a></h3>
                          <p>'.$inDetail.'</p>
                          <p class="information"> Number of Rooms : <span class="t-rooms">'.$bed.'</span></p>
                          <p class="information"> Number of Master Bed : <span class="mb-rooms">'.$mstrBed.'</span></p>
                          <p class="information"> Number of Belcony : <span class="belcony">'.$belcony.'</span></p>
                          <p class="information"> Attatched Drawing and Dining : <span class="a-dd">'.$dAd.'</span></p>
                          <p class="information"> Square feets : <span class="sqr-ft">'.$sqr_ft.'</span></p>
                          <p class="information"> Division : <span class="division">'.$division.'</span></p>
                          <p class="information"> District : <span class="district">'.$district.'</span></p>
                          <p class="information"> Contact Number : <span class="contact">'.$mobileNO.'</span></p>
                          <a class="btn btn-primary" href="portfolio-item.php?aid='.$addID.'">View More
                            <span class="glyphicon glyphicon-chevron-right"></span>
                          </a>
                        </div>
                      </div>
                      <!-- /.row -->

                      <hr>';
            }

		}
	}else{
        echo '<div class="jumbotron">
        <h1 class="display-1">404</h1>
        <p>The Advertise you\'re looking for could not be found!</p>
        <ul>
          <li>
              <a href="portfolio-1-col.php">Go Back</a>
          </li>
        </ul>
      </div>
      <!-- /.jumbotron -->';
    }
?>