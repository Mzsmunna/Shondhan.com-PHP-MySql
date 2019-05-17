<?php
//include('dbconnect.php'); 
//require_once('connection.php');
//$error="";
//echo 'Thank you '. $_POST['firstname'] . ' ' . $_POST['lastname'] . ', says the PHP file';
$username = $_GET['usr'];
session_start();
$_SESSION['username'] = $username;
//$_SESSION['userID'] = $row['uid'];
header("Location: myprofile.php");
//if(isset($_GET['delete']))
//{

	//$sql="DELETE FROM advertises WHERE aid='$addIdNo' ";
	//$query=mysql_query($sql);
//	if($query)
//	{
//		echo "Deleted";
//		header('Refresh:0; portfolio-1-col.php');
//	}else{
//		echo " :( ";
//	}

//}
?>