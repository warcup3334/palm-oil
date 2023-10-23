<?php
$servername = "localhost";
$username = "s642021134";
$password = "0878916040";
$dbname = "db642021134";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
?>

