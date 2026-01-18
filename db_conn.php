<?php

$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "zoo_parc";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}//check the database connection