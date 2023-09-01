<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "Blog";

$connection = mysqli_connect($servername, $username, $password, $database);

if (!$connection) {
    // die("Database connection failed: " . mysqli_connect_error());
    echo "not connected";
}else{
  // echo "Connected";
}



?>
