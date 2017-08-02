<?php
require('connect.php');
error_reporting(0);
$email = $_GET['email'];
$userConfirmed = $_GET['userConfirmed'];
$sql = "UPDATE users SET accountActivated=1 WHERE email='.$email.'";
//Prevent people form starting any session they want
if ($conn->query($sql) === TRUE && $userConfirmed == 'true') {
    session_start();
    $_SESSION['email']=$email;
    header('Location: index.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
