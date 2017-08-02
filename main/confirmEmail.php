<?php
require('connect.php');
$email = $_GET['email'];
$userConfirmed = $_GET['userConfirmed'];
$sql = "UPDATE users SET accountActivated=1 WHERE email='$email'";
if ($conn->query($sql) === TRUE && $userConfirmed == 'true') {
    //session_start();
    //$_SESSION['email']=$email;
    //header('Location: index.php');
    echo $sql.'       ';
    echo $sql2;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
