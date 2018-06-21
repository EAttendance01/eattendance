<?php
session_start();
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "attendance";
$con = mysql_connect($hostname, $username, $password) or die("could not connect");
if($con){
      mysql_select_db($dbname) or die(mysql_error());
}
?>