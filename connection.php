<?php

	// this will avoid mysql_connect() deprecation error, 
	error_reporting( ~E_ALL & ~E_DEPRECATED &  ~E_NOTICE );
	// I strongly suggest you to use PDO or MySQLi.
	
	define('ServerName', 'localhost');
	define('username', 'root');
	define('password', '');
	//define('DatabaseName', 'shondhan');
    $database = "shondhan";
    $table = "users";
	
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
    $sql = "CREATE TABLE IF NOT EXISTS `users` (
 `uid` int(10) NOT NULL AUTO_INCREMENT,
 `username` varchar(20) NOT NULL,
 `firstName` varchar(20) NOT NULL,
 `lastName` varchar(20) NOT NULL,
 `password` varchar(30) NOT NULL,
 `email` varchar(30) NOT NULL,
 `mobileNo` varchar(15) NOT NULL,
 `accountType` varchar(10) NOT NULL,
 PRIMARY KEY (`uid`)
)";

    $results = mysql_query($sql) or die (mysql_error());

    //echo "<br>The table '$table' have been created";
