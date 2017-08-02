<?php
  //Starts Session So It Can End it
  session_start();
  session_destroy();
  //Sends User to Index Page After Being Logged Out
  header("Location: index.php");
?>
