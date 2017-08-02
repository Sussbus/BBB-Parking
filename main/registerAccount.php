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

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //header("Location: register.php?forbiddenSymbols=true");
    echo $email;
    exit();
  }
  if (!preg_match("/^[a-zA-Z ]*$/",$fullname)) {
    //header("Location: register.php?forbiddenSymbols=true");
    echo $fullname;
    exit();
  }

  if (!preg_match("/^[0-9_a-zA-Z]*$/", $password)) {
      //header("Location: register.php?forbiddenSymbols=true");
      echo $password;
      exit();
  }
  if (!preg_match("/^[0-9_a-zA-Z]*$/", $phonenumber)) {
      //header("Location: register.php?forbiddenSymbols=true");
      echo $phonenumber;
      exit();
  }
  if($password != $passwordConfirmed) {
    header("Location: register.php?passwordsMatch=false");
    exit();
  }
  //Hashes password
  $password = md5($password);
  $query = "SELECT * FROM users WHERE email='".$email."'";
  $result = mysqli_query($conn, $query);
  //Number of rows in the table, 0 rows = user doesn't exist
  $rowcount = mysqli_num_rows($result);
    //Checks if there's an account with the same email
    if($rowcount != 0) {
      header("Location: register.php?userTaken=true");
      exit();
    }
    //Where the new users info will be inserted (in users table)
    $sql = "INSERT INTO users(fullname, email, phonenumber, password) VALUES('$fullname', '$email', '$phonenumber','$password')";
    if ($conn->query($sql) === TRUE) {
        session_start();
        $_SESSION['email']=$email;
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>
