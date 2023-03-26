<?php
$host = "db";
$username = "root";
$password = "12345678";
$db = "jongq";
// $db = "jongq_new";

 

// Create connection
$conn = mysqli_connect($host, $username, $password, $db);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}