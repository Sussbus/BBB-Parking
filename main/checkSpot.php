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
						<h1><a href="index.html">Swift Park</a></h1>
						<nav id="nav">
							<ul>
								<li class="special">
									<a href="#menu" class="menuToggle"><span>Menu</span></a>
									<div id="menu">
										<ul>
											<li><a href="index.html">Home</a></li>
											<li><a href="map.html">Spot Map</a></li>
											<!--<li><a href="semester-parking.html">Semester Parking</a></li>-->
											<li><a href="flash-pass.html">Flash Pass (Beta)</a></li>
											<li><a href="sell.html">Sell a Spot</a></li>
											<li><a href="how-it-works.html">How it works</a></li>
											<li><a href="privacy-and-disclaimer.html">Privacy and Disclaimer</a></li>
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
							<h2>Spot</h2>
							<!--<p>Aliquam ut ex ut interdum donec amet imperdiet eleifend</p>-->
						</header>
						<section class="wrapper style5" style="padding-top: 30px;">
							<a href="map.html"><button style="font-size: 12px; padding-left: 10px; padding-right: 10px; margin-left: 30px; margin-bottom: 30px;">Back to Map</button></a>
							<div class="inner" style="width: 55%">
										<?php
										//Variables being read from the URL
										$spoturl = $_GET['spoturl'];
										$price = $_GET['price'];
										$distance = $_GET['distance'];
										$restrictions = $_GET['restrictions'];
										$features = $_GET['features'];
										$status = $_GET['status'];
										$statusColor = $_GET['statusColor'];
										//The map of the route being rendered
										echo '
										<iframe src="'.$spoturl.'"
											width="500" height="350" frameborder="0" style="border:0" allowfullscreen>
										</iframe>
										';
										//Description of the spot being rendered
										echo '<h4>$'.$price.' per semester</h4>';
										echo '<p>Distance: '.$distance.'<br>';
										echo 'Special Restrictions: '.$restrictions.'<br>';
										echo 'Special Features: '.$features.'<br>';
										echo 'Status: <b style="color: '.$statusColor.';">'.$status.'</b></p>';
										echo '
										<br>
										<a href="buy.php?spoturl='.$spoturl.'&price='.$price.'"><input type="submit" value="Contact Seller" style="font-size: 12px; padding-left: 11px; padding-right: 11px;" />';
										?>
								</form>

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

	</body>
</html>
