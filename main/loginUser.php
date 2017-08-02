<?php
  require('connect.php');
  $email = $_POST['email'];
  $password = $_POST['password'];

  //error_reporting(0);
  $query = mysqli_query($conn, "SELECT * FROM users WHERE email='".$email."'");
  $row = mysqli_fetch_array($query);
  $dbemail = $row['email'];
  $dbpassword = $row['password'];

  if($email == $dbemail && $password == $dbpassword) {
    echo 'success';
    session_start();
    $_SESSION['email'] = $dbemail;
    header("Location: index.php");
  } else {
    echo 'unsuccessful';
    header("Location: login.php?login=failed");
  }

?>
