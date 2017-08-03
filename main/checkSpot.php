<!DOCTYPE HTML>
<!--
	Spectral by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Swift Park</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body>

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="index.php">Swift Park</a></h1>
						<nav id="nav">
							<ul>
								<li class="special">
									<a href="#menu" class="menuToggle"><span>Menu</span></a>
									<div id="menu">
										<ul>
											<?php
											session_start();
											//Doesn't allow user to access login page if logged in
											if(!$_SESSION['email']) {
												header("Location: index.php");
											}
											error_reporting(0);
											if(!$_SESSION['email']) {
												echo '
												<li><a href="login.php">Login</a></li>
												<li><a href="register.php">Register Account</a></li>
												<li><a href="how-it-works.php">How it works</a></li>
												<li><a href="privacy-and-disclaimer.php">Privacy and Disclaimer</a></li>
												';
											} else {
											echo '
											<li><a href="index.php">Home</a></li>
											<li><a href="map.php">Spot Map</a></li>
											<li><a href="flash-pass.php">Flash Pass (Beta)</a></li>
											<li><a href="sell.php">Sell a Spot</a></li>
											<li><a href="how-it-works.php">How it works</a></li>
											<li><a href="privacy-and-disclaimer.php">Privacy and Disclaimer</a></li>
											<li><a href="logout.php">Log Out</a></li>
											';
											}
											?>
											<!--<li><a href="#">Sign Up</a></li>
											<li><a href="#">Log In</a></li>-->
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</header>

				<!-- Main -->
					<article id="main">
            <section class="wrapper style5" style="padding-top: 30px;">
							<a href="map.php"><button style="padding-left: 10px; padding-right: 10px; padding-top: 0px; padding-bottom: 2px; font-size: 12px; margin-left: 30px; position: absolute;">Back to Map</button></a>
              <div class="inner" style="width: 60%">
                <!--<h3>Street Name</h3>-->
								<?php
								require('connect.php');
								$spotID = $_GET['spotID'];
								$query = mysqli_query($conn, "SELECT * FROM spots WHERE id=".$spotID);
								$row = mysqli_fetch_array($query);
								$priceperday = $row['priceperday'];
								$spoturl = $row['spoturl'];
								$price = $row['price'];
								$distance = $row['distance'];
								$restrictions = $row['restrictions'];
								$features = $row['features'];
								$status = $row['status'];
                echo '<iframe src="'.$spoturl.'"
                  width="500" height="375" frameborder="0" style="border:0" allowfullscreen>';
								?>
                </iframe>
                <div style="width:30%; float: right;">
                        <h2 style="padding-left: 20px; padding-bottom: 0px!important; color: #8c8c8c;">Bidding:</h2>
												<h5 style="padding-left: 20px; font-size: 18px; font-family: Avenir; color: #8c8c8c;">Highest Bid: <br><span id="highestPrice">$<?php echo $price;?></span></h5>
												<p style="padding-left: 20px; font-size: 18px; font-family: Avenir; padding-bottom: 30px; color: #8c8c8c;">Time Left: 1 hr 23 min</p>
												<input type="text" placeholder="Your bid" style="width: 70%; margin-left: 20px;" id="bidInput" onclick="addDollarSign()"/><br>
												<input type="submit" value="Bid" style="margin-left: 20px; margin-bottom: 20px;" onclick="submitBid()" />
                </div>
								<script>
								function addDollarSign() {
									document.getElementById('bidInput').value = '$';
								}
								</script>
								<?php
									if($status == 'Avaliable') {
										$statusColor = 'green';
									} else {
										$statusColor = 'red';
									}
                  echo 'Distance: About a '.$distance.' minute walk<br>';
                  echo 'Special Restrictions: '.$restrictions.'<br>';
                  echo 'Special Features: '.$features.'<br>';
                  echo 'Status: <b style="color: '.$statusColor.';">'.$status.'</b></p>';
                	/*echo '<a href="buy.php?spotID='.$spotID.'">
                  <button style="font-size: 12px; padding-left: 10px; padding-right: 10px;">Contact Seller</button></a>';*/
									?>
              </div>
            </section>
					</article>

				<!-- Footer -->
					<footer id="footer">
						<ul class="icons">
							<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<!--<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>-->
							<!--<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>-->
							<li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
						</ul>
						<ul class="copyright">
							<li>&copy; Swift Park 2017.  All rights reserved.<br><br>Created by <a href="http://bitbybite.co" style="color: white;">BitByBite Inc.</a></li>
						</ul>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

      <!-- <script type="text/javascript" src="jquery-1.3.2.js"> </script> -->

       <script type="text/javascript">
      //  ajax call to bids
       $(document).ready(function() {
          var interval;
          function submitBid() {
            $.ajax({    //create an ajax request to load_page.php
              type: "GET",
              url: "checkSpot.php",
              dataType: "html",   //expect html to be returned
              success: function(response){
                  $("#highestPrice").html(response);
                  interval = setTimeout(submitBid, 1000);
                  //alert(response);
                  console.log(response);
                }
            });
          }

            submitBid();
      });

      </script>
			<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	</body>
</html>
