<!DOCTYPE HTML>
<!--
	Twenty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html lang="en">

<head>
	<title>The Sepsis Game</title>
	<link rel="shorcut icon" href="favicon.ico" type="image/x-icon">
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="assets/css/main.css" />
	<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->

	<!-- Start Google Analytics - REPLACE WITH CORRECT ANALYTICS -->
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-87156234-5"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag() { dataLayer.push(arguments); }
		gtag('js', new Date());


		gtag('config', 'UA-87156234-5');
	</script>
	<!-- End Google Analytics -->

	<!-- Newsletter Pop-Up -->
	<script type="text/javascript" src="./assets/js/adverts.js"></script>
	<script type="text/javascript" src="//downloads.mailchimp.com/js/signup-forms/popup/unique-methods/embed.js"
		data-dojo-config="usePlainJson: true, isDebug: false"></script>
	<script
		type="text/javascript">window.dojoRequire(["mojo/signup-forms/Loader"], function (L) { L.start({ "baseUrl": "mc.us9.list-manage.com", "uuid": "2c4d68a11009e2e50552fcd9f", "lid": "a4a6eafaec", "uniqueMethods": true }) })</script>
	<!-- Facebook Pixel Code -->
	<script>
		!function (f, b, e, v, n, t, s) {
			if (f.fbq) return; n = f.fbq = function () {
				n.callMethod ?
					n.callMethod.apply(n, arguments) : n.queue.push(arguments)
			};
			if (!f._fbq) f._fbq = n; n.push = n; n.loaded = !0; n.version = '2.0';
			n.queue = []; t = b.createElement(e); t.async = !0;
			t.src = v; s = b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t, s)
		}(window, document, 'script',
			'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '907978272928555');
		fbq('track', 'PageView');

		fbq('track', 'ViewContent');
	</script>
	<noscript><img height="1" width="1" style="display:none"
			src="https://www.facebook.com/tr?id=907978272928555&ev=PageView&noscript=1" /></noscript>
	<!-- End Facebook Pixel Code -->
<?php

//setting the parameters for the database connection
$db = mysqli_connect('localhost', 'flubeescot', 'Sweden99', 'dasboard_ad');
//setting a error message about the database connection
if (!$db) {
	die("Connection failed: " . mysqli_connect_error());
}

//go pick the data needed for the first query( NOT NULL datas with the date filter by the closest date )
$slot_object_query = "SELECT * FROM date WHERE website_id=2 AND end IS NOT NULL ORDER BY end asc ";
$result = mysqli_query($db, $slot_object_query);
$data= mysqli_fetch_assoc($result);
//go pick the info needed for the second query( Selected only the NULL data )
$slot_object_query = "SELECT * FROM date WHERE website_id=2 AND end IS NULL ";
$result = mysqli_query($db, $slot_object_query);
$info= mysqli_fetch_assoc($result);

//setting a condition, if the data (NOT NULL) is empty show the NULL one
	if ($data == true && $data['end'] == TRUE) {
		$advert1 = getAdvert($db, $data['slot1']);
		$advert2 = getAdvert($db, $data['slot2']);
		$advert3 = getAdvert($db, $data['slot3']);
	}else{
	if ($info == true) {
		$advert1 = getAdvert($db, $info['slot1']);
		$advert2 = getAdvert($db, $info['slot2']);
		$advert3 = getAdvert($db, $info['slot3']);
	}
	}
	//setting the current date to filter the data
	$currentDate = date('Y-m-d');
	//setting a delete parameter that filter with the end date. If the end date is already passed, deleted the datas.
	$sql = "DELETE FROM date WHERE end <= '$currentDate' AND website_id=2 AND end IS NOT NULL ";
	if (mysqli_query($db, $sql)) {
                echo " ";
              } else {
                echo "Error deleting record: " . mysqli_error($db);
              }
          

//making a function that pick what we want from the adverts table with the ID specified higher 
        function getAdvert($db, $id){
                $slot_object_query = "SELECT * FROM adverts WHERE id=$id";
                $result = mysqli_query($db, $slot_object_query);
                $advert = mysqli_fetch_assoc($result);
                return $advert;
        }

?>
</head>


<body class="index">
	<div id="page-wrapper">
		<!-- Header - Logo and Navigation -->
		<header id="header" class="alt">
			<!-- Space for specific Game Logo -->
			<h1 id="logo"><a tabindex="1" href="http://www.focusgames.com/" target="_blank"><img
						src="images/Focus_Games_logo.png"
						alt="Focus Games Logo, click here to go to Focus Games website"></a></h1>
			<!-- End of space for specific Game Logo. 
                    If wanting to insert an Image, create a div class= image fit within this space -->
			<!-- Nav Bar -->
			<nav id="nav">
				<ul>
					<li><a href="index.html" class="button">Home</a></li>
					<li><a href="https://games.focusgames.co.uk/SepsisGameGeneral/focus-game-admin-SepsisGameGeneral/index.html"
							target="_blank">Digital Game</a></li>
					<!--<li><a href="challenge.html">Digital Challenge</a></li>-->
					<li><a href="https://focusgames.com/find_a_game.html" target="_blank">Other games</a></li>
					<li><a href="contact.html">Contact</a></li>
					<li><a href="https://shop.focusgames.com/products/the-sepsis-game" target="_blank"
							class="button special">Buy Now</a></li>
				</ul>
				<ul>
					<li class="current">
						<div id="skip"><a href="#main_h" tabindex="1"><b>Skip to main content</b></a></div>
					</li>
				</ul>
			</nav>
		</header>

		<!-- Banner -->
		<section id="banner">
			<div class="inner">
				<header>
					<center>
						<img src="images/gameee.png" class="image fit" alt="Game Name" />
					</center>
				</header>
				<p>
					A Unique blended learning<br>
					toolkit that is reinventing<br>
					sepsis training.<br>
					<br>
				</p>
				<span class="icon-stack"><i class="icon fa-users"></i></span>&nbsp;&nbsp;2 - 12 players
				<br />
				<span class="icon-stack"><i class="icon fa-clock-o"></i></span>&nbsp;&nbsp;&nbsp;45-60 minutes of play
				<br />
				<span class="icon-stack"><i class="icon fa-briefcase"></i></span>&nbsp;&nbsp;&nbsp;No facilitator
				required
				<footer>
					<ul class="buttons vertical">
						<li><a href="#main_h" class="button special scrolly">Tell me more</a></li>
					</ul>
				</footer>
			</div>
		</section>
		<!--END OF BANNER-->

		<!-- Start of Main Content -->
		<article id="main_h" style="margin-bottom: 0em;">
			<center>
				<h1><strong>In association with</strong></h1><a><img src="images/nhs-sepsis-logo.png" width="30%;"
						alt="#"></a>
			</center>
			<!-- Separate section inserted within Game Info Section to contain Game Info and image -->

			<!-- Adverts section -->

		<div class="flex-container-mobile">
				<div class="adverts">
					<span class="item1">
							<a class="advertLinks" href="<?=$advert1['website_link']?>" target="_blank"">
								<img class="adGifs" src="<?=$advert1['type_image']?>">
							</a>
					</span>
					<span class="item2">
							<a class="advertLinks" href="<?=$advert2['website_link']?>" target="_blank"">
								<img class="adGifs" src="<?=$advert2['type_image']?>">
							</a>
					</span>
					<span class="item3" >
							<a class="advertLinks" href="<?=$advert3['website_link']?>" target="_blank"">
								<img class="adGifs" src="<?=$advert3['type_image']?>">
							</a>
					</span>
				</div>

					<section class="wrapper style5 container special" style="background-color: #e32526; color: #fff;">
						<p><b>We have developed a unique range of blended-learning tools that make sepsis training more
								engaging and effective.</b></p>
						<ul>
							<li><b>Sepsis Game: a board game for group learning with a supporting digital Sepsis
									Quiz</b>
							</li>
							<li><b>Sepsis Challenge is a brand-new online game-based educational app</b></li>
						</ul>
						<p><b>These resources help staff and students to recognise the signs of sepsis and gives them
								the confidence to respond quickly and effectively.</b></p>
						<br>
					</section>
				<div class="advert2">
					<span>
							<a class="advertLinks" href="<?=$advert2['website_link']?>" target="_blank"">
								<img class="adGifs" src="<?=$advert2['type_image']?>">
							</a>
					</span>
				</div>
					<section class="wrapper style3 container special">
						<header>
							<p>Sepsis is a life-threatening condition that arises when the body’s response to an
								infection becomes
								uncontrolled and
								injures its own tissues and organs. Sepsis can lead to shock, multiple
								organ failure and death if it is not recognised early and treated effectively. Fixing
								sepsis is a
								multi-disciplinary
								responsibility because sepsis crosses boundaries. Relevant and effective
								staff training is essential.</p>
							<p>These educational resources are evidence-based and were developed in partnership with NHS
								England, Health
								Education
								England, e-Learning for Healthcare and the UK Sepsis Trust.<br></p>

							<div class="speech-bubble2">
								<center>
									<h3><strong>The Sepsis Game</strong></h3>
								</center>

								<div class="row">
									<div class="3u 12u(narrower) ">
										<img src="images/sepsis-image-2.png" alt="#"
											style="margin-top:28px; margin-left: -20px; ">
									</div>
									<div class="8u 12u(narrower)">
										<p>The box contains everything you need to run a successful training session.
											Each game contains
											a pack of
											scenario cards designed to stimulate discussions that raise
											awareness and improve care delivery skills. The scenarios and questions vary
											in complexity
											which allows you
											to structure games that meet the needs of each group.
											Just pop it in your bag for team meetings, study days, workshops, lunch
											meetings and events.
										</p>
									</div>
								</div>
							</div>
				<div class="speech-bubble">
					<h3><strong>How to play</strong> </h3>
					<ol style="text-align: left; list-style: decimal; padding-left: 7%; padding-right: 5%;">
						<p>The game is designed for between 2 and 12 players divided into two competing teams.
							It
							takes around 45 minutes to play and can be used in any care setting; all you need is
							a
							table and some chairs. The rules are very simple and the facilitator doesn’t need
							sepsis
							expertise. The game is essentially self-regulating and the facilitator can take a
							passive role in the game. </p>
					</ol>
				</div>
				<a class="image featured"><img src="images/info_box.jpg" alt="" /></a>

				<section>
					<div class="row">
						<div class="6u 12u(narrower)">
							<section>
								<a class="image featured"><img src="images/game_card.jpg" alt="" /></a>
							</section>
						</div>
						<div class="6u 12u(narrower)">
							<section>
								<div id="skiptweet"><a href="#skipped"
										style="color: #373737; font-family: 'lato', sans-serif;"><b>Skip
											the Twitter
											Feed</b></a></div>
								<div class="intrinsic-container">
									<a class="twitter-timeline" data-height="320" data-theme="light"
										href="https://twitter.com/FocusGames">Tweets by Sepsis Game</a>
									<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
									<!--                                       <div id="skiptweetback"><a href="#main_h" style="color: #373737; font-family: 'lato', sans-serif;"><b>Skip the Twitter Feed</b></a></div>-->
								</div>
							</section>
						</div>
					</div>
				</section>

				<div class="row">
					<div class="12u 12u(narrower)">
						<section>
							<div class="speech-bubble2">
								<h3><strong>Digital Game</strong></h3>
								<a href="https://games.focusgames.co.uk/SepsisGameGeneral/focus-game-admin-SepsisGameGeneral/index.html"
									target="_blank">
									<img src="images/online.png"
										alt="Online Game, click here to go to The Sepsis Game website" align="left"
										style="margin-right:20px; margin-top: -32px;"></a>
								<p>
									We've created a simplified digital version of the game. It works on any
									device through a web browser and it's free to use. It only takes a few
									minutes to play. Why not try it now?
								</p>
								<a href="https://games.focusgames.co.uk/SepsisGameGeneral/focus-game-admin-SepsisGameGeneral/index.html"
									target="_blank" class="button special">Play Now</a>
							</div>
						</section>
					</div>
					<!--<div class="6u 12u(narrower)">
									<section>
									 <div class="speech-bubble">
	              	    
						  <h3><strong>Digital Challenge</strong></h3>
						  
						  <div class="intrinsic-container">
								
								<video id="video" style="border: 4px solid #404041" width="100%" controls muted autoplay loop src="images/Sepsis HEE video.mp4"></video>
																
								</div>
								
								<p>The Sepsis Challenge is a brand-new online game-based educational app. Why not try it now?</p>
						  
		              
						  
						<a href="challenge.html" class="button special">Play Now</a>
						  
								</div>											
									</section>
								</div>-->

				</div>

				<div class="speech-bubble2">
					<h3><strong>Topics covered in the game include:</strong></h3>
					<div class="row">
						<div class="1u 12u(narrower)"></div>
						<div class="6u 12u(narrower)">
							<ul class="default" style="text-align: left">
								<li>Prevalence and impact of sepsis</li>
								<li>Causes of sepsis</li>
								<li>Recognising sepsis</li>
								<li>Treatment (including Sepsis Six)</li>
								<li>What to do when sepsis is suspected</li>
							</ul>
						</div>
						<div class="3u 12u(narrower)">
							<img src="images/Hospital_Bedd.png" alt="">
						</div>
					</div>
				</div>
				<!-- End of section that contains info and images/videos -->
				</header>
				</section>
				<div class="advert3">
					<span>
							<a class="advertLinks" href="<?=$advert3['website_link']?>" target="_blank"">
								<img class="adGifs" src="<?=$advert3['type_image']?>">
							</a>
					</span>
				</div>
		</article>

	</div>
	<!-- End of Info article, start of buy now article -->
	<article id="buy" style="padding-top: 0em;">
		<!-- Buy Now -->
		<section class="wrapper style1 container special">
			<!--   <header>
								 <h2><strong>The Jobs that Care programme launches in January 2019 with a unique and highly memorable suite of blended learning solutions</strong></h2>
					</header>-->
		</section>

		<section class="wrapper style3 container special">
			<header>
				<h2><strong>What's in the box?</strong>
				</h2><br />
				<section>
					<div class="row">
						<div class="6u 12u(narrower)">
							<section>
								<div class="intrinsic-container">
									<!-- All videos should sit within an "intrinsic-container" in order to scale responsively for mobile -->
									<video width="100%" controls muted autoplay loop>
										<source src="images/Sepsis Unboxing.mp4" type="video/mp4"></video>
								</div>
								<br>
							</section>
						</div>
						<div class="6u 12u(narrower)">
							<section>
								<h3 style="text-align: left"><b>A BETTER WAY TO LEARN</b></h3>
								<p style="">Games make face-to-face training more engaging and effective.</p>
								<p style="">Games encourage people to talk and learn from each other.</p>
								<p style="">Games can be used anywhere, by anyone with no external support.</p>
								<p style=""><b>Games = a workshop in a box.</b></p>
							</section>
						</div>
					</div>
				</section>
			</header>
		</section>
	</div>

			<section class="wrapper style2 container">
				<div class="row 50%">
					<div class="4u 12u(narrower) important(narrower)">
						<a class="image fit"><img src="images/sepsis-game-board-box.png" alt="" /></a>
						<br>
						<h3>Price of the sepsis game:
							<br />
							<strong>£60.00 EXC Vat</strong></h3>
						<footer>
							<ul class="buttons">
								<li><a href="https://shop.focusgames.com/products/the-sepsis-game" target="_blank"
										class="button special">Buy Now</a></li>
							</ul>
						</footer>
						<br>
						<span class="icon-stack"><i class="icon fa-users"></i></span>&nbsp;&nbsp;2 - 12 players
						<br />
						<span class="icon-stack"><i class="icon fa-clock-o"></i></span>&nbsp;&nbsp;&nbsp;45-60 minutes
						of play
						<br />
						<span class="icon-stack"><i class="icon fa-briefcase"></i></span>&nbsp;&nbsp;&nbsp;No
						facilitator required
					</div>
					<div class="8u 12u(narrower)">
						<header>
							<br>
							<h2><strong>How the Sepsis game works </strong></h2>
						</header>
						<br>
						<p>The game is very flexible and meets the needs of a modern organisation. It is in effect a
							‘pop-up workshop’ that can be used anywhere at any time. The game can be used as an informal
							activity in the workplace, or as part of more structured training and workshops. </p>
						<p>Team take turns to move their counters around the board by answering questions correctly. The
							first team to get to the end wins the game or if the time runs out whoever is closest to the
							end is the winner. The discussions that the teams have between themselves are what make the
							game effective.</p>
					</div>
				</div>
			</section>
	</article>
	<section class="wrapper style5 container special">
		<header>
			<h3><strong>More from Focus Games</strong></h3>
		</header>
		<br />
		<div class="row">
			<div class="4u 12u(narrower)">
				<section>
					<a href="http://www.infectionmanagementgame.co.uk/" target="_blank" class="image featured"><img
							src="images/Care-cert-2T.png" alt="" /></a>
				</section>

			</div>
			<div class="4u 12u(narrower)">
				<section>
					<a href="http://strokegame.com/#!/" target="_blank" class="image featured"><img
							src="images/Stroke_game.png" alt="" /></a>
				</section>
			</div>
			<div class="4u 12u(narrower)">
				<section>
					<a href="http://www.stoolsgame.com/" target="_blank" class="image featured"><img
							src="images/FMH-2T.png" alt="" /></a>

				</section>
			</div>
		</div>
	</section>

	<!-- Footer Nav -->
	<section id="cta">
		<header>
			<h2>Ready to <strong>buy the Sepsis Game?</strong></h2>
		</header>
		<p><strong>Or perhaps you'd like to get in touch?</strong></p>

		<footer>
			<ul class="buttons">
				<li><a href="#buy" class="button special scrolly">Buy Now</a></li>
				<li><a href="contact.html" class="button">Contact Focus Games</a></li>
			</ul>
		</footer>
	</section>

	<!-- Footer -->
	<footer id="footer">
		<section class="wrapper style1 container special">
			<div class="row">
				<div class="4u 12u(narrower)">
					<section>
						<header>
							<h3><strong>STUDIO:</strong></h3>
						</header>
						<p><strong>The White Studios, <br />309 Templeton Business Centre
								Glasgow<br />G40 1DA</strong></p>
					</section>
				</div>
				<div class="4u 12u(narrower)">
					<section>
						<header>
							<h3><strong>CUSTOMER SERVICE:</strong></h3>
						</header>
						<p><strong>E-mail: <a class="footerlinks"
									href="mailto:info@focusgames.com">info@focusgames.com</a><br />
								Telephone: +44 (0)141 554 5476</strong></p>
					</section>
				</div>
				<div class="4u 12u(narrower)">
					<section>
						<header>
							<h3><strong>OFFICE:</strong></h3>
						</header>
						<p><strong>20-22 Wenlock Road London N1 7GU <br />Telephone: +44 (0)207 038 2939</strong>
						</p>
					</section>

				</div>
			</div>
		</section>

		<ul class="icons">
			<li><a href="https://twitter.com/FocusGames" target="_blank" class="icon circle fa-twitter"><span
						class="label">Twitter</span></a></li>
		</ul>
		<ul class="copyright">
			<li>&copy; Focus Games 2020</li>
			<li>All Rights Reserved</li>
			<li><a href="data_privacy.html">Data Privacy</a></li>
		</ul>
	</footer>
	</div>

	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.dropotron.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/jquery.scrollgress.min.js"></script>
	<script src="assets/js/skel.min.js"></script>
	<script src="assets/js/util.js"></script>
	<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
	<script src="assets/js/main.js"></script>

	<!-- begin olark code -->
	<script type="text/javascript" async>
		; (function (o, l, a, r, k, y) {
			if (o.olark) return;
			r = "script"; y = l.createElement(r); r = l.getElementsByTagName(r)[0];
			y.async = 1; y.src = "//" + a; r.parentNode.insertBefore(y, r);
			y = o.olark = function () { k.s.push(arguments); k.t.push(+new Date) };
			y.extend = function (i, j) { y("extend", i, j) };
			y.identify = function (i) { y("identify", k.i = i) };
			y.configure = function (i, j) { y("configure", i, j); k.c[i] = j };
			k = y._ = { s: [], t: [+new Date], c: {}, l: a };
		})(window, document, "static.olark.com/jsclient/loader.js");
		/* Add configuration calls bellow this comment */
		olark.identify('7503-414-10-6761');</script>
	<!-- end olark code -->

</body>

</html>