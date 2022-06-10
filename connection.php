<?php

//connection to the Database
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "pusl2020";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
?>