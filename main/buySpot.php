<?php
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$phonenumber = $_POST['phonenumber'];

/*echo $name;
echo $email;
echo $address;
echo $phonenumber;
*/
header("Location: successfulPurchase.html"); /* Redirect browser */

?>
