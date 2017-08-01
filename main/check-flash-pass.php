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
            <section class="wrapper style5" style="padding-top: 30px;">
              <div class="inner" style="width: 80%">
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
								$statusColor = $row['statusColor'];
                echo '<iframe src="'.$spoturl.'"
                  width="500" height="370" frameborder="0" style="border:0" allowfullscreen>';
								?>
                </iframe>
                <div class="calendar">
                  <div class="month">
                    <ul>
                      <li>
                        August<br>
                        <span style="font-size:18px">2017</span>
                      </li>
                    </ul>
                  </div>

                  <ul class="weekdays">
                    <li>Su</li>
                    <li>Mo</li>
                    <li>Tu</li>
                    <li>We</li>
                    <li>Th</li>
                    <li>Fr</li>
                    <li>Sa</li>
                  </ul>

                  <ul class="days">
                    <li> </li>
                    <li> </li>
                    <li><span><button class="flashPassButton" onclick="highlight(this.id)" id="1">1</button></span></li>
                    <li><span><button class="inactive flashPassButton" id="2">2</button></span></li>
                    <li><span><button class="flashPassButton" onclick="highlight(this.id)" id="3">3</button></span></li>
                    <li><span><button class="flashPassButton" onclick="highlight(this.id)" id="4">4</button></span></li>
                    <li><span><button class="flashPassButton" onclick="highlight(this.id)" id="5">5</button></span></li>
                    <li><span><button class="flashPassButton" onclick="highlight(this.id)" id="6">6</button></span></li>
                    <li><span><button class="flashPassButton" onclick="highlight(this.id)" id="7">7</button></span></li>
                    <li><span><button class="flashPassButton" onclick="highlight(this.id)" id="8">8</button></span></li>
                    <li><span><button class="flashPassButton" onclick="highlight(this.id)" id="9">9</button></span></li>
                    <li><span><button class="flashPassButton" onclick="highlight(this.id)" id="10">10</button></span></li>
                    <li><span><button class="flashPassButton" onclick="highlight(this.id)" id="11">11</button></span></li>
                    <li><span><button class="flashPassButton" onclick="highlight(this.id)" id="12">12</button></span></li>
                    <li><span><button class="flashPassButton" onclick="highlight(this.id)" id="13">13</button></span></li>
                    <li><span><button class="flashPassButton" onclick="highlight(this.id)" id="14">14</button></span></li>
                    <li><span><button class="flashPassButton" onclick="highlight(this.id)" id="15">15</button></span></li>
                    <li><span><button class="flashPassButton" onclick="highlight(this.id)" id="16">16</button></span></li>
                    <li><span><button class="flashPassButton" onclick="highlight(this.id)" id="17">17</button></span></li>
                    <li><span><button class="inactive flashPassButton" id="18">18</button></span></li>
                    <li><span><button class="inactive flashPassButton" id="19">19</button></span></li>
                    <li><span><button class="flashPassButton" onclick="highlight(this.id)" id="20">20</button></span></li>
                    <li><span><button class="flashPassButton" onclick="highlight(this.id)" id="21">21</button></span></li>
                    <li><span><button class="flashPassButton" onclick="highlight(this.id)" id="22">22</button></span></li>
                    <li><span><button class="flashPassButton" onclick="highlight(this.id)" id="23">23</button></span></li>
                    <li><span><button class="flashPassButton" onclick="highlight(this.id)" id="24">24</button></span></li>
                    <li><span><button class="flashPassButton" onclick="highlight(this.id)" id="25">25</button></span></li>
                    <li><span><button class="flashPassButton" onclick="highlight(this.id)" id="26">26</button></span></li>
                    <li><span><button class="flashPassButton" onclick="highlight(this.id)" id="27">27</button></span></li>
                    <li><span><button class="flashPassButton" onclick="highlight(this.id)" id="28">28</button></span></li>
                    <li><span><button class="flashPassButton" onclick="highlight(this.id)" id="29">29</button></span></li>
                    <li><span><button class="flashPassButton" onclick="highlight(this.id)" id="30">30</button></span></li>
                    <li><span><button class="flashPassButton" onclick="highlight(this.id)" id="31">31</button></span></li>
                  </ul>
									<?php
									echo '<p><b>Price: $'.$priceperday.'/day</b><br>';
									?>
										<b>Current Cost: <b id="currentCostDollarSign"></b><b id="currentCost">N/A</b></b><br>
										<b style="color: red;">Red</b>: Unavailable during this day<br>
										<b style="color: green;">Green</b>: Days selected to buy space<br>
                </div>
								<?php

                  echo 'Distance: About a '.$distance.' minute walk<br>';
                  echo 'Special Restrictions: '.$restrictions.'<br>';
                  echo 'Special Features: '.$features.'<br>';
                  echo 'Status: <b style="color: '.$statusColor.';">'.$status.'</b></p>';
                	echo '<a href="buy.php?spotID='.$spotID.'">
                  <button style="font-size: 12px; padding-left: 10px; padding-right: 10px;">Contact Seller</button></a>';
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
			<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
      <script>
        function highlight(id) {
          var x = document.getElementById(id);
          x.classList.toggle("MyClass");

					//Current Cost Stuff
					var setZero = parseInt(0);
					var perDayCost = parseInt("<?php echo $priceperday ?>");
					if(document.getElementById("currentCost").innerHTML == 'N/A') {
						document.getElementById("currentCostDollarSign").textContent = '$';
						document.getElementById("currentCost").textContent = setZero;
					}
					var currentCost = parseInt(document.getElementById("currentCost").textContent);

					if (document.getElementById(id).classList == 'flashPassButton MyClass') {
						document.getElementById("currentCost").innerHTML = currentCost + perDayCost;
					}
					if (document.getElementById(id).classList == 'flashPassButton') {
						document.getElementById("currentCost").innerHTML = currentCost - perDayCost;
						if(document.getElementById("currentCost").innerHTML == 0) {
							document.getElementById("currentCost").textContent = 'N/A';
							document.getElementById("currentCostDollarSign").textContent = '';
						}
					}

      	}
      </script>
	</body>
</html>
