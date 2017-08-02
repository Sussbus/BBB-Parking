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
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $phonenumber = $_POST['phonenumber'];
  $password = $_POST['password'];
  $passwordConfirmed = $_POST['passwordConfirmed'];
  /*
  $fullname = mysqli_escape_string($conn, $_POST['fullname']);
  $email = mysqli_escape_string($conn, $_POST['email']);
  $phonenumber = mysqli_escape_string($conn, $_POST['phonenumber']);
  $password = mysqli_escape_string($conn, $_POST['password']);
  $fullname = strip_tags($fullname);
  $password = strip_tags($password);
  $fullname = stripslashes($username);
  $password = stripcslashes($password);
  */
  if (!preg_match("/^[0-9_a-zA-Z]*$/", $email)) {
      header("Location: register.php?forbiddenSymbols=true");
      exit();
  }
  if (!preg_match("/^[0-9_a-zA-Z]*$/", $fullname)) {
      header("Location: register.php?forbiddenSymbols=true");
      exit();
  }
  if (!preg_match("/^[0-9_a-zA-Z]*$/", $password)) {
      header("Location: register.php?forbiddenSymbols=true");
      exit();
  }
  if (!preg_match("/^[0-9_a-zA-Z]*$/", $phonenumber)) {
      header("Location: register.php?forbiddenSymbols=true");
      exit();
  }
  if($password != $passwordConfirmed) {
    header("Location: register.php?passwordsMatch=false");
    exit();
  }
  $sql = "INSERT INTO users(fullname, email, phonenumber, password) VALUES('$fullname', '$email', '$phonenumber','$password')";
    if ($conn->query($sql) === TRUE) {
        session_start();
        $_SESSION['email']=$email;
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>
