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
											<li><a href="map.php">Spot Map</a></li>
											<!--<li><a href="semester-parking.html">Semester Parking</a></li>-->
											<li><a href="flash-pass.php">Flash Pass (Beta)</a></li>
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
							<h2>Flash Passes</h2>
							<!--<p>Aliquam ut ex ut interdum donec amet imperdiet eleifend</p>-->
						</header>
						<section class="wrapper style5">

								<?php
								require('connect.php');
								$query = mysqli_query($conn, "SELECT * FROM spots");
								$checkMaxID = mysqli_query($conn, "SELECT MAX(id) AS maxID FROM spots");
								$num_rows = mysqli_fetch_array($checkMaxID);
								$maxID = $num_rows['maxID'];
								while($row = mysqli_fetch_array($query)) {
									$id = $row['id'];
									$spoturl = $row['spoturl'];
									$price = $row['price'];
									$distance = $row['distance'];
									$restrictions = $row['restrictions'];
									$features = $row['features'];
									$status = $row['status'];
									$hasFlashPass = $row['hasFlashPass'];

									if($status == 'Avaliable') {
										$statusColor = 'green';
									} else {
										$statusColor = 'red';
									}
										if($hasFlashPass != 0) {
										echo '
										<div class="inner" style="width: 50%">
										<iframe src="'.$spoturl.'"
											width="500" height="350" frameborder="0" style="border:0" allowfullscreen>
										</iframe>
											<p><br>
											Distance: About '.$distance.' minute walk<br>
											Special Restrictions: '.$restrictions.'<br>
											Special Features: '.$features.'<br>
											Status: <b style="color: '.$statusColor.';">'.$status.'</b></p>
										<a href="check-flash-pass.php?spotID='.$id.'">
											<button style="font-size: 12px; padding-left: 10px; padding-right: 10px;">Flash Pass Availability</button></a>
									</div>
										';
										if($id != $maxID) {
											echo '<center><hr style="width: 80%"></center>';
										}
									}
								}
								?>

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
