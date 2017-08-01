<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "bbb-parking";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
/*
Show successful connection
echo "Connected successfully"; */
?>
