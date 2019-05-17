<?php

	// this will avoid mysql_connect() deprecation error, 
	error_reporting( ~E_ALL & ~E_DEPRECATED &  ~E_NOTICE );
	// I strongly suggest you to use PDO or MySQLi.
	
	define('ServerName', 'localhost');
	define('username', 'root');
	define('password', '');
	//define('DatabaseName', 'shondhan');
    $database = "shondhan";
    $table = "advertises";
	
	$conn = mysql_connect(ServerName,username,password);
	//$dbcon = mysql_select_db(DatabaseName);
	
	if ( !$conn ) {
		die("Connection failed : " . mysql_error());
	}else{
        //echo "Connection Successful! ";
    }
	
    // Create database
    $sql = "CREATE DATABASE IF NOT EXISTS $database";
    if (mysql_query($sql)) {
        //echo "<br>Database created successfully";
    } else {
        //echo "<br>Error creating database: " . mysqli_error($conn);
    }

    $dbcon = mysql_select_db($database);

	if ( !$dbcon ) {
		die("<br>Database Connection failed : " . mysql_error());
	}else{
        //echo "<br>DB Connection Successful!";
    }
    
        // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS `advertises` (
 `aid` int(10) NOT NULL AUTO_INCREMENT,
 `addOwner` varchar(20) NOT NULL,
 `addOwnerID` int(10) NOT NULL,
 `addFor` varchar(10) NOT NULL,
 `addType` varchar(15) DEFAULT NULL,
 `bed` int(4) NOT NULL,
 `masterBeed` int(4) NOT NULL,
 `belcony` int(4) NOT NULL,
 `attachedDD` varchar(5) NOT NULL,
 `squareFeet` int(5) DEFAULT NULL,
 `price` varchar(15) NOT NULL,
 `contactNo` varchar(15) NOT NULL,
 `floor` varchar(4) DEFAULT NULL,
 `division` varchar(20) NOT NULL,
 `district` varchar(20) NOT NULL,
 `location` varchar(50) DEFAULT NULL,
 `inDetail` varchar(200) DEFAULT NULL,
 `date` varchar(12) DEFAULT NULL,
 PRIMARY KEY (`aid`)
)";

    $results = mysql_query($sql) or die (mysql_error());

    //echo "<br>The table '$table' have been created";
