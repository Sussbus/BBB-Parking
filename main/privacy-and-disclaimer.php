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
						<header>
							<h2>Privacy and Disclaimer</h2>
							<!--<p>Aliquam ut ex ut interdum donec amet imperdiet eleifend</p>-->
						</header>
						<section class="wrapper style5">
							<div class="inner" style="width: 70%">

								<h2>Privacy Disclaimer</h2>
								<p>Personal information collected on this website will only be shared under the following circumstances:</p>
								<li style="padding-bottom: 10px;">once a parking spot lessor and lessee are matched and both parties have agreed to the annual cost</li>
								<li style="padding-bottom: 10px;">once the commission is received, each party will receive the name, address, phone number and e-mail of the party with whom they are ‘matched.’</li>
								<p>  Note that any personal information entered on the site will not be disclosed to anyone else using this site.</p>
								<br>
								<h2>Limitations of Obligation</h2>
								<p>Note that my role is to broker the agreement between the lessor and lessee.
									The parking terms for the year will need to be worked out between both parties.
									This includes but is not limited to:</p>
									<li style="padding-bottom: 10px;">window of times to leave and arrive with vehicle</li>
									<li style="padding-bottom: 10px;">payment terms - monthly, semester, etc</li>
									<li style="padding-bottom: 10px;">form of payment - check or cash</li>
									<li style="padding-bottom: 10px;">spare key for lessor to move vehicle as needed</li>
									<li style="padding-bottom: 10px;">driveway  or street parking; typically cars will need to parked on a driveway until 11am due to street parking restrictions</li>
									<br><br>
									<p><b>Please note that The Swift Park cannot be held liable for any damages, physical or other.
										Swift Park Company is a private business and is not associated with New Trier High School</b><p>

							</div>

						</section>
					</article>

				<!-- Footer -->
					<footer id="footer">
						<ul class="icons">
							<li><a href="https://twitter.com/bitbybiteco" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="https://www.facebook.com/bitbybite/" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<!--<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>-->
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
