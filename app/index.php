<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDBPDO";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



?>