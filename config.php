<?php
session_start();
$host = "localhost:3306"; /* Host name */
$user = "root"; /* User */
$password = "8778"; /* Password */
$dbname = "mydb"; /* Database name */

$db = mysqli_connect($host, $user, $password, $dbname);
// Check connection
if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}
/*
else {
    echo ("successfuly connect ");
}
*/