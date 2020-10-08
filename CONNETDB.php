<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	try {
	 $Conn = new PDO("mysql:host=$servername;dbname=sanpham",$username, $password);
	 // set the PDO error mode to exception
	 $Conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	 $Conn->exec('set names utf8mb4');
	 //echo "Connected successfully";
	 }
	catch(PDOException $e)
	 {
	 echo "Connection failed: " . $e->getMessage();
	 }
?>