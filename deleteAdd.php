<?php
//include('dbconnect.php'); 
require_once('connection.php');
$addIdNo = $_GET['id'];
//if(isset($_GET['id']))
//{

	$sql="DELETE FROM advertises WHERE aid='$addIdNo' ";
	$query=mysql_query($sql);
	if($query)
	{
		echo "Deleted";
		header('Refresh:0; portfolio-1-col.php');
	}else{
		echo " :( ";
	}

//}
?>