<?php
  require('connect.php');
  //Pulling Form Info
  $email = $_POST['email'];
  $password = $_POST['password'];

  //Encrypts Password Input So it Can Match the Encrypted Password In DB
  $password = md5($password);

  //error_reporting(0); <- Uncomment to Get Yelled at

  //Gather Users From DB
  $query = mysqli_query($conn, "SELECT * FROM users WHERE email='".$email."'");
  $row = mysqli_fetch_array($query);
  $isActivated = $row['accountActivated'];
  $dbemail = $row['email'];
  $dbpassword = $row['password'];

  if($isActivated == '0') {
    header("Location: login.php?isActivated=false");
  }
  //Checks if Submitted Email & Password Match the Ones in DB
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
