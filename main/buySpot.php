<?php
//Connecting to DB and Getting Spot Info
require('connect.php');
$spotID = $_GET['spotID'];
$query = mysqli_query($conn, "SELECT * FROM spots WHERE id=".$spotID);
$row = mysqli_fetch_array($query);
$spoturl = $row['spoturl'];
$price = $row['price'];

//Form Vars
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$phonenumber = $_POST['phonenumber'];


//Email Vars
$to = 'contact@bitbybite.co';
$subject = $name.' Spot Purchase';
$message = '
<html>
  <body>
    <div style="width: 80%; margin-left: 20%;">
      <p style="font-family: Avenir; font-size: 16px;">
        Name: '.$name.'<br>
        Email: '.$email.'<br>
        Address: '.$address.'<br>
        Phone Number: '.$phonenumber.'<br>
      </p>
      <h4>Spot</h4>
      <iframe src="'.$spoturl.'"
        width="500" height="350" frameborder="0" style="border:0" allowfullscreen>
      </iframe>
      <p style="font-family: Avenir;" font-size: 18px;>Price: '.$price.'</p>
    </div>
  </body>
</html>
';
//Send the email (not sure if works due to localhost)
mail ($to, $subject, $message);
//Debugging Stuff
/*echo $name;
echo $email;
echo $address;
echo $phonenumber;
*/
header("Location: successfulPurchase.html"); /* Redirect browser */
?>
