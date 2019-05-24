<?php 

	$hostname = "localhost";
	$user = "root";
	$password = "chrys";
	$bd = "mydb";

	$conexion = mysqli_connect($hostname,$user,$password,$bd) or die (mysql_errno());

?>