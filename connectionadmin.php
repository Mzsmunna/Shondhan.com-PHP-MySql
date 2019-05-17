<?php

	// this will avoid mysql_connect() deprecation error, 
	error_reporting( ~E_ALL & ~E_DEPRECATED &  ~E_NOTICE );
	// I strongly suggest you to use PDO or MySQLi.
	
	define('ServerName', 'localhost');
	define('username', 'root');
	define('password', '');
	//define('DatabaseName', 'shondhan');
    $database = "shondhan";
    $table = "admin";
	
	$conn = mysql_connect(ServerName,username,password);
	//$dbcon = mysql_select_db(DatabaseName);
	
	if ( !$conn ) {
		die("Connection failed : " . mysql_error());
	}else{
        echo "Connection Successful! ";
    }
	
    // Create database
    $sql = "CREATE DATABASE IF NOT EXISTS $database";
    if (mysql_query($sql)) {
        echo "<br>Database created successfully";
    } else {
        echo "<br>Error creating database: " . mysqli_error($conn);
    }

    $dbcon = mysql_select_db($database);

	if ( !$dbcon ) {
		die("<br>Database Connection failed : " . mysql_error());
	}else{
        echo "<br>DB Connection Successful!";
    }
    
        // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS `admin` (
 `adminID` int(10) NOT NULL AUTO_INCREMENT,
 `adminName` varchar(20) NOT NULL,
 `aFirstName` varchar(20) NOT NULL,
 `aLastName` varchar(20) NOT NULL,
 `aPassword` varchar(30) NOT NULL,
 `aEmail` varchar(30) NOT NULL,
 `aMobileNo` varchar(15) NOT NULL,
 PRIMARY KEY (`adminID`)
)";

    $results = mysql_query($sql) or die (mysql_error());

    echo "<br>The table '$table' have been created";
