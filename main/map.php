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
						<!--
						<header>
							<h2>Map</h2>
							<h5>find a spot</h5>
						</header>
					-->

						<style>
						/* Removes the x From The infoWindow */
						.scrollFix {
							line-height:1.35;
							overflow:hidden;
							white-space:nowrap;
							width:73px;
							z-index:99999999999;
							height:15px;
							text-align: center;
							font-family: Avenir;
							font-size: 14px;
							padding-left: 5px;
						}
						/*.gm-style-iw + div{ display: none; }
						.gm-style-iw + div + img{ display: none; }
						*/
						#map-canvas div{
						line-height:1.35;
						overflow:hidden;
						white-space:nowrap;
						}
						</style>
            <!-- MAIN CONTENT SECTION -->
						<section class="wrapper style5" style="padding-top: 0px;">
							<div style="height: 55px;">
								<center><p style="font-family: Avenir; font-size: 23px; padding-top: 15px;">Search for a spot and click on it to check it out</p></center>
							</div>
							<div id="googleMap" style="width:100%;height:500px;"></div>
              <script>
              function myMap() {
	              var newTrier = {lat: 42.094575, lng: -87.718974};
	              var mapProp= {
	                  center: newTrier,
	                  zoom:16,
	              };

								//New Trier Marker
	              var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
	              var newTrierMarker = new google.maps.Marker({
	                  position: newTrier,
	                  map: map,
	                  animation: google.maps.Animation.DROP,
	                  url: 'http://newtrier.k12.il.us',
	              });
								//New Trier Hover
								var hoverContent = '<div class="scrollFix">New Trier</div>';
								var newTrierInfowindow = new google.maps.InfoWindow({
									content: hoverContent,
									maxHeight: 10,
								});
								newTrierMarker.addListener('mouseover', function() {
								    newTrierInfowindow.open(map, this);
								});
								newTrierMarker.addListener('mouseout', function() {
								    newTrierInfowindow.close();
								});
	              google.maps.event.addListener(newTrierMarker, 'click', function () {
	                window.location = newTrierMarker.url;
	              });
									<?php
									//Doesn't allow user to access login page if logged in
									session_start();
									if(!$_SESSION['email']) {
										header("Location: index.php");
									}

									require('connect.php');
									$query = mysqli_query($conn, "SELECT * FROM spots");
										while($row = mysqli_fetch_array($query)) {
										$spotID = $row['id'];
										$price = $row['price'];
										$latitude = $row['latitude'];
										$longitude = $row['longitude'];
										$houseNumber = 'house'.$spotID;
										$houseNumberMarker = $houseNumber.'Marker';
										$houseNumberHover = $houseNumber.'hoverContent';
										$houseNumberInfoWindow = $houseNumber.'infoWindow';
										echo "
										var ".$houseNumber." = {lat: ".$latitude.", lng: ".$longitude."}
			              var ".$houseNumberMarker." = new google.maps.Marker({
			                  position: ".$houseNumber.",
			                  map: map,
			                  animation: google.maps.Animation.DROP,
												url: 'checkSpot.php?spotID=".$spotID."',
			              });
										google.maps.event.addListener(".$houseNumberMarker.", 'click', function () {
											window.location = ".$houseNumberMarker.".url;
										});
										var ".$houseNumberHover." = '<div class=\"scrollFix\" style=\"width: 78px;\">$".$price."/sem</div>';
										var ".$houseNumberInfoWindow." = new google.maps.InfoWindow({
											content: ".$houseNumberHover.",
											maxHeight: 10,
										});
										".$houseNumberMarker.".addListener('mouseover', function() {
										    ".$houseNumberInfoWindow.".open(map, this);
										});
										".$houseNumberMarker.".addListener('mouseout', function() {
										    ".$houseNumberInfoWindow.".close();
										});
										";
									}
									?>
									/*
								//House 2 Marker
	              var houseTwo = {lat: 42.094000, lng: -87.716000}
	              var houseTwoMarker = new google.maps.Marker({
	                  position: houseTwo,
	                  map: map,
	                  animation: google.maps.Animation.DROP,
										url: 'checkSpot.php?spoturl=https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d2960.072049847086!2d-87.74598503513526!3d42.10592770910596!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e2!4m5!1s0x880fc459e0380681%3A0x493d7fd327d0cb19!2s972+Elm+Street%2C+Winnetka%2C+IL!3m2!1d42.1056399!2d-87.74079069999999!4m5!1s0x880fc4f7f980710f%3A0xc9c2e067b4695869!2sNew+Trier+Township%2C+IL!3m2!1d42.105579399999996!2d-87.7468071!5e0!3m2!1sen!2sus!4v1494369059898&price=1800&distance=About%2018%20minute%20walk&restrictions=N%2FA&features=Easy%20in%20and%20out%20parking&status=Available&statusColor=green',
	              });
								google.maps.event.addListener(houseTwoMarker, 'click', function () {
									window.location = houseTwoMarker.url;
								});
								//House 3 Marker
								var houseThree = {lat: 42.097000, lng: -87.725000}
								var houseThreeMarker = new google.maps.Marker({
										position: houseThree,
										map: map,
										animation: google.maps.Animation.DROP,
										url: 'checkSpot.php?spoturl=https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d7572.108106674997!2d-87.74512909865025!3d42.103163266889545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e2!4m5!1s0x880fc4f8cdafb133%3A0xe278cf86619fc9ae!2sChestnut+St%2C+Winnetka%2C+IL+60093!3m2!1d42.1009852!2d-87.7352622!4m5!1s0x880fc4f7f980710f%3A0xc9c2e067b4695869!2sNew+Trier+Township%2C+IL!3m2!1d42.105579399999996!2d-87.7468071!5e0!3m2!1sen!2sus!4v1494368773063&price=1250&distance=About%2018%20minute%20walk&restrictions=N%2FA&features=Easy%20in%20and%20out%20parking&status=Available&statusColor=green',
								});
								google.maps.event.addListener(houseThreeMarker, 'click', function () {
									window.location = houseThreeMarker.url;
								});

								//House 4 Marker
								var houseFour = {lat: 42.091000, lng: -87.724000}
								var houseFourMarker = new google.maps.Marker({
										position: houseFour,
										map: map,
										animation: google.maps.Animation.DROP,
										url: 'checkSpot.php?spoturl=https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d7572.108106674997!2d-87.74512909865025!3d42.103163266889545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e2!4m5!1s0x880fc4f8cdafb133%3A0xe278cf86619fc9ae!2sChestnut+St%2C+Winnetka%2C+IL+60093!3m2!1d42.1009852!2d-87.7352622!4m5!1s0x880fc4f7f980710f%3A0xc9c2e067b4695869!2sNew+Trier+Township%2C+IL!3m2!1d42.105579399999996!2d-87.7468071!5e0!3m2!1sen!2sus!4v1494368773063&price=1250&distance=About%2018%20minute%20walk&restrictions=N%2FA&features=Easy%20in%20and%20out%20parking&status=Available&statusColor=green',
								});
								google.maps.event.addListener(houseFourMarker, 'click', function () {
									window.location = houseFourMarker.url;
								});
								*/
              }
              </script>

              <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6KMFLc1QwOXX0v0EQDKltTefWNx7sfSA&callback=myMap"></script>
						</section>
					</article>

				<!-- Footer -->
					<footer id="footer">
						<ul class="icons">
							<li><a href="https://twitter.com/bitbybiteco" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="https://www.facebook.com/bitbybite/" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
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

	</body>
</html>
