<!DOCTYPE html>
<html lang="ru">

<head>

	<meta charset="utf-8">
	<!-- <base href="/"> -->

	<title><?php ahkweb('webname'); ?></title>
	<meta name="description" content="">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<!-- Template Basic Images Start -->
	<meta property="og:image" content="path/to/image.html">
	<link rel="icon" type="image/png" href="<?php ahkweb('logo'); ?>">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php ahkweb('logo'); ?>">
	<!-- Template Basic Images End -->
	
	<!-- Custom Browsers Color Start -->
	<meta name="theme-color" content="#000">
	<!-- Custom Browsers Color End -->

	<link rel="stylesheet" href="./HomeTemplate/realworld/css/main.min.css">

	<!-- Load google font
	================================================== -->
	<script type="text/javascript">
		WebFontConfig = {
			google: { families: [ 'Catamaran:300,400,600,700', 'Raleway:100,700', 'Roboto:700,900'] }
		};
		(function() {
			var wf = document.createElement('script');
			wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + 
			'://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
			wf.type = 'text/javascript';
			wf.async = 'true';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(wf, s);
		})();
	</script>

	<!-- Load other scripts
	================================================== -->
	<script type="text/javascript">
		var _html = document.documentElement;
		_html.className = _html.className.replace("no-js","js");
	</script>

	<style>.preloader{width: 100%;height: 100%;position: fixed;background-color: #fff;z-index: 9999;}</style>

</head>

<body>

	<div class="preloader"></div>

	<div class="wrapper">

		<header class="header">
			<a href="#" class="logo">
				<div class=""><img width="200px" src="<?php ahkweb('logo'); ?>" alt="Web Logo "></div>
				<div class="logo__title"><?php ahkweb('webname'); ?></div>
			</a>

			<ul class="menu">
				<li class="menu__item">
					<a href="#about" class="menu__link">About</a>
				</li>
				<li class="menu__item">
					<a href="#services" class="menu__link">Services</a>
				</li>
				<li class="menu__item">
					<a href="#map" class="menu__link">Road Map</a>
				</li>
				<li class="menu__item">
					<a href="#stat" class="menu__link">Statistic</a>
				</li>
				<li class="menu__item">
					<a href="#token" class="menu__link">Token</a>
				</li>
				<li class="menu__item">
					<a href="#docs" class="menu__link">WhitePappers</a>
				</li>
				<li class="menu__item">
					<a href="#team" class="menu__link">Team</a>
				</li>
				<li class="menu__item">
					<a href="#faq" class="menu__link">FAQ</a>
				</li>
			</ul>

			<div class="header__right">
				<!-- <select class="select">
					<option value="ru">ru</option>
					<option value="ua">ua</option>
					<option value="en">en</option>
				</select> -->
				<div class="sign-in-wrap">
					<a href="register.php" class="btn-sign-in">Registration</a>	
				</div>
			</div>

			<div class="btn-menu">
				<div class="one"></div>
				<div class="two"></div>
				<div class="three"></div>
			</div>
		</header>

		<div class="fixed-menu">
			<div class="fixed-menu__header">
				<a href="#" class="logo">
					<div class="logo__img"></div>
					<div class="logo__title"><?php ahkweb('webname'); ?></div>
				</a>
	
				<div class="btn-close">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 47.971 47.971" style="enable-background:new 0 0 47.971 47.971;" xml:space="preserve" width="512px" height="512px">
							<path d="M28.228,23.986L47.092,5.122c1.172-1.171,1.172-3.071,0-4.242c-1.172-1.172-3.07-1.172-4.242,0L23.986,19.744L5.121,0.88   c-1.172-1.172-3.07-1.172-4.242,0c-1.172,1.171-1.172,3.071,0,4.242l18.865,18.864L0.879,42.85c-1.172,1.171-1.172,3.071,0,4.242   C1.465,47.677,2.233,47.97,3,47.97s1.535-0.293,2.121-0.879l18.865-18.864L42.85,47.091c0.586,0.586,1.354,0.879,2.121,0.879   s1.535-0.293,2.121-0.879c1.172-1.171,1.172-3.071,0-4.242L28.228,23.986z" fill="#006DF0"/></svg>
				</div>
			</div>
	
			<div class="fixed-menu__content">
	
				<ul class="mob-menu">
					<li class="mob-menu__item">
						<a href="#about" class="mob-menu__link">About</a>
					</li>
					<li class="mob-menu__item">
						<a href="#services" class="mob-menu__link">Services</a>
					</li>
					<li class="mob-menu__item">
						<a href="#map" class="mob-menu__link">Road Map</a>
					</li>
					<li class="mob-menu__item">
						<a href="#stat" class="mob-menu__link">Statistic</a>
					</li>
					<li class="mob-menu__item">
						<a href="#token" class="mob-menu__link">Token</a>
					</li>
					<li class="mob-menu__item">
						<a href="#docs" class="mob-menu__link">WhitePappers</a>
					</li>
					<li class="mob-menu__item">
						<a href="#team" class="mob-menu__link">Team</a>
					</li>
					<li class="mob-menu__item">
						<a href="#faq" class="mob-menu__link">FAQ</a>
					</li>
				</ul>
	
				<!-- <select class="select">
					<option value="ru">ru</option>
					<option value="ua">ua</option>
					<option value="en">en</option>
				</select> -->
	
				<div class="btn-wrap">
					<a href="register.php" class="btn-sign-in">Register</a>
				</div>
				
	
			</div>
		</div>

		<section class="promo">
			<div class="container">
				<div class="row">
					<div class="col-12 promo__content" data-aos="fade-right">
						<h1><?php ahkweb('webname'); ?> <span>the Real World</span></h1>
						<p>
							Spend real fights effective anything extra by leading. Mouthwatering leading how real formula also locked-in have can mountain thought. Jumbo plus shine sale.
						</p>

						<div class="timer-wrap">
							<div id="timer" class="timer"></div>
							<div class="timer__titles">
								<div>Days</div>
								<div>Hours</div>
								<div>Minutes</div>
								<div>Seconds</div>
							</div>
						</div>

						<div class="promo__btns-wrap">
							<a href="register.php" class="btn btn--medium btn--orange"><span>Register Now</span></a>
							<a href="login.php" class="btn btn--big btn--blue">Sign In Now</a>
						</div>

						<div class="payments">
							<img src="./HomeTemplate/realworld/img/visa.png" alt="">
							<img src="./HomeTemplate/realworld/img/mc.png" alt="">
							<img src="./HomeTemplate/realworld/img/bitcoin.png" alt="">
							<img src="./HomeTemplate/realworld/img/paypal.png" alt="">
						</div>
					</div>
				</div>
				<img src="./HomeTemplate/realworld/img/promo-bg.png" data-aos="fade-up"  alt="" class="promo__img">
				
			</div>
			<div class="scroll-down">
				<img src="./HomeTemplate/realworld/img/scroll-down.png" alt="">
			</div>
		</section>

		<section class="economy">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 offset-lg-4">

						<a data-jarallax-element="-40" href="https://www.youtube.com/watch?v=3cZjVFKzugY&amp;list=PLcpkKchW7Xe5K578xRCwQbPbeVQGN5K9h&amp;index=10" class="economy__video-btn video-btn popup-youtube">
							<img src="./HomeTemplate/realworld/img/video-btn.png" alt="">
						</a>

						<div class="economy__block">
							<div class="economy__block-content">
								<div class="section-header section-header--white section-header--tire section-header--small-margin">
									<h4>decentralised economy</h4>
									<h2>
										A banking platform that <span>enables developer solutions</span>
									</h2>
								</div>
								<p>
									Spend real fights effective anything extra by leading. Mouthwatering leading how real formula also locked-in have can mountain thought. Jumbo plus shine sale.
								</p>
								<ul>
									<li>
										<span>Modular structure </span> enabling easy implementation for different softwares
									</li>
									<li>
										<span>Advanced payment</span> and processing technologies, fine-tuned from more than 3 years of development testing
									</li>
									<li>
										<span>Unified AppStore</span> for retail cryptocurrency solutions with a Crypterium products audience
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<img src="./HomeTemplate/realworld/img/video-bg.png"  alt="" class="economy__bg">
		</section>

		<section class="section about" id="about">
			<div class="container">
				<div class="row">
					<div data-aos="fade-right" class="col-lg-5">
						<div class="section-header section-header--animated section-header--tire section-header--small-margin">
							<h4>About Us</h4>
							<h2><?php ahkweb('webname'); ?> PORTAL <span>is the best for your Online Business</span>
								  </h2>
						</div>
						<div class="about__animated-content">
							<p>
								Spend real fights effective anything extra by leading. Mouthwatering leading how real formula also locked-in have can mountain thought. Jumbo plus shine sale.
							</p>
							<ul>
								<li>
									Mouthwatering leading how real formula also 
								</li>
								<li>Locked-in have can mountain thought</li>
								<li>Locked-in have can mountain thought</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-6 offset-lg-1 align-items-center">
						<img src="./HomeTemplate/realworld/img/about-img.png" class="about__img img-responsive" alt="">
					</div>
				</div>
			</div>
			<img src="./HomeTemplate/realworld/img/about-bg.png" data-jarallax-element="40" alt="" class="about__bg">
		</section>

		<section class="section section--no-pad-bot services" id="services">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="section-header section-header--animated section-header--center section-header--medium-margin">
							<h4>Awesome services</h4>
							<h2>Why it needs?</h2>
						</div>

						<div class="services__items">
							<div class="services__left">
								<div data-aos="fade-up" class="service">
									<div class="service__bg" style="background-color: #e85f70; box-shadow: 0 0 51px rgba(232, 95, 112, 0.74); box-shadow: 0 0 51px rgba(232, 95, 112, 0.74);"></div>
									<img src="./HomeTemplate/realworld/img/service-icon-1.svg" alt="">
									<div class="service__title">
										Mining Service
									</div>
								</div>
								<div data-aos="fade-up" data-aos-delay="200" class="service">
									<div class="service__bg" style="background-color: #fa8936; background-image: linear-gradient(-234deg, #ea9d64 0%, #fa8936 100%); box-shadow: 0 0 51px rgba(250, 137, 54, 0.74);"></div>
									<img src="./HomeTemplate/realworld/img/service-icon-2.svg" alt="">
									<div class="service__title">
									<?php ahkweb('webname'); ?> App
									</div>
								</div>
							</div>
							<div class="services__right">
								<div data-aos="fade-up" data-aos-delay="400" class="service" >
									<div class="service__bg" style="background-image: linear-gradient(-234deg, #6ae472 0%, #4bc253 100%); box-shadow: 0 0 51px rgba(75, 194, 83, 0.74);"></div>
									<img src="./HomeTemplate/realworld/img/service-icon-3.svg" alt="">
									<div class="service__title">
										Blockchain
									</div>
								</div>
								<div data-aos="fade-up" data-aos-delay="600" class="service">
									<div class="service__bg" style="background-color: #0090d5; background-image: linear-gradient(-234deg, #29aceb 0%, #0090d5 100%); box-shadow: 0 0 51px rgba(0, 144, 213, 0.74);"></div>
									<img src="./HomeTemplate/realworld/img/service-icon-4.svg" alt="">
									<div class="service__title">
										Exchange
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<img src="./HomeTemplate/realworld/img/services-bg1.png" alt="" class="services__bg">
			<img src="./HomeTemplate/realworld/img/services-bg-1.png" class="services__cosmos" alt="">
		</section>

		<section class="section map" id="map">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="section-header section-header--animated section-header--center section-header--medium-margin">
							<h4>Our way</h4>
							<h2>Road Map</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 offset-lg-4 col-sm-8 offset-sm-4">

						<div class="road">
							<div class="road__item">
								<div class="road__item-metka"></div>
								<div class="road__item-content">
									<div class="road__item-title">
										June 2017
									</div>
									<p>
										Dolly Varden trout flathead tui chub bigmouth buffalo golden loach ghost flathead sauger amur pike, jewel tetra roosterfish mora herring 
											Pacific lamprey
									</p>
								</div>
								
							</div>

							<div class="road__item">
								<div class="road__item-metka"></div>
								<div class="road__item-content">
									<div class="road__item-title">
										July 2017
									</div>
									<p>
										Pirate perch smooth dogfish, flagblenny delta smelt, gopher rockfish bramble shark Sevan trout queen triggerfish basslet. Redtooth triggerfish prickly shark tarwhine tube-eye Reef triggerfish rohu longfin dragonfish
									</p>
								</div>
								
							</div>

							<div class="road__item">
								<div class="road__item-metka"></div>
								<div class="road__item-content">
									<div class="road__item-title">
										December 2017
									</div>
									<p>
										Pacific argentine. Lined sole masu salmon wolffish cutthroat trout mustard eel huchen, sea toad grenadier madtom yellow moray Shingle Fish wrymouth giant 
									</p>
								</div>
							</div>

							<div class="road__item">
								<div class="road__item-metka"></div>
								<div class="road__item-content">
									<div class="road__item-title">
										December 2017
									</div>
									<p>
										Pacific argentine. Lined sole masu salmon wolffish cutthroat trout mustard eel huchen, sea toad grenadier madtom yellow moray Shingle Fish wrymouth giant 
									</p>
								</div>
							</div>

							<div class="road__item road__item-active">
								<div class="road__item-metka"></div>
								<div class="road__item-content">
									<div class="road__item-title">
										January 2018
									</div>
									<p>
										Walleye silverside American sole rockweed gunnel, handfishyellowtail clownfish, rocket danio; blue gourami, ayu gulper eel false trevally longjaw mudsucker bonytail chub. Yellow moray french angelfish sand stargazer northern squawfish shiner dab mola yellow moray sea lamprey torrent catfish sauger blue gourami handfish Sacramento blackfish
									</p>
								</div>
							</div>

							<div class="road__item road__item-next">
								<div class="road__item-metka"></div>
								<div class="road__item-content">
									<div class="road__item-title">
										April 2018
									</div>
									<p>
										Blue gourami, ayu gulper eel false trevally longjaw mudsucker bonytail chub. Yellow moray french angelfish sand stargazer 
									</p>
								</div>
							</div>

							<div class="road__item road__item-next">
								<div class="road__item-metka"></div>
								<div class="road__item-content">
									<div class="road__item-title">
										May 2018
									</div>
									<p>
										Livebearer greeneye barred danio mosquitofish king of herring. Sturgeon tenpounder-píntano tiger shark harelip sucker
									</p>
								</div>
							</div>

						</div>

					</div>
				</div>
				<img src="./HomeTemplate/realworld/img/road_map.png" data-jarallax-element="-40" alt="" class="map__title-bg">
			</div>
		</section>

		<section class="partners-logo" id="partners-logo">
			<div class="container">
				<div class="row">
					<div data-aos="fade-up" class="col">
						<div class="partners-logo__block">
							<div class="partners-logo__item">
								<img src="./HomeTemplate/realworld/img/partners-logo-1.png" alt="">
								<p>Escrow</p>
							</div>
							<div class="partners-logo__item">
								<img src="./HomeTemplate/realworld/img/partners-logo-2.png" alt="">
								<p>risk: low</p>
							</div>
							<div class="partners-logo__item">
								<img src="./HomeTemplate/realworld/img/partners-logo-3.png" alt="">
								<ul class="rating">
									<li style="background-image: url(./HomeTemplate/realworld/img/star-gold.svg)"></li>
									<li style="background-image: url(./HomeTemplate/realworld/img/star-gold.svg)"></li>
									<li style="background-image: url(./HomeTemplate/realworld/img/star-gold.svg)"></li>
									<li style="background-image: url(./HomeTemplate/realworld/img/star-gold.svg)"></li>
									<li style="background-image: url(./HomeTemplate/realworld/img/star.svg)"></li>
								</ul>
							</div>
							<div class="partners-logo__item">
								<img src="./HomeTemplate/realworld/img/partners-logo-4.png" alt="">
								<p>risk: low</p>
							</div>							
							
						</div>
					</div>
				</div>
			</div>
			<img src="./HomeTemplate/realworld/img/partenrs-bg.png" data-jarallax-element="20" alt="" class="partners-logo__bg">
		</section>

		<section class="section cases">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="section-header section-header--animated section-header--center section-header--medium-margin">
							<h4>Some facts</h4>
							<h2>Use Cases</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col cases__list">
						<div data-aos="fade-right" class="cases__item">
							<img src="./HomeTemplate/realworld/img/cases-icon-1.png" alt="" class="cases__item-icon">
							<div class="cases__item-content">
								<div class="cases__item-title">
									Cryptoland App
								</div>
								<p class="cases__item-text">
									Asiatic glassfish pilchard sandburrower, orangestriped triggerfish hamlet Molly Miller trunkfish spiny dogfish! Jewel tetra frigate mackerel
								</p>
							</div>
						</div>
						<div data-aos="fade-left" data-aos-delay="200" class="cases__item">
							<img src="./HomeTemplate/realworld/img/cases-icon-2.png" alt="" class="cases__item-icon">
							<div class="cases__item-content">
								<div class="cases__item-title">
									Mining Service
								</div>
								<p class="cases__item-text">
									Spend real fights effective anything extra by leading. Mouthwatering leading how real formula also locked-in have can mountain thought. Jumbo
								</p>
							</div>
						</div>
						<div data-aos="fade-right" class="cases__item">
							<img src="./HomeTemplate/realworld/img/cases-icon-3.png" alt="" class="cases__item-icon">
							<div class="cases__item-content">
								<div class="cases__item-title">
									Blockchain
								</div>
								<p class="cases__item-text">
									Clownfish catfish antenna codlet alfonsino squirrelfish deepwater flathead sea lamprey. Bombay duck sand goby snake mudhead
								</p>
							</div>
						</div>
						<div data-aos="fade-left" data-aos-delay="200" class="cases__item">
							<img src="./HomeTemplate/realworld/img/cases-icon-4.png" alt="" class="cases__item-icon">
							<div class="cases__item-content">
								<div class="cases__item-title">
									Exchange
								</div>
								<p class="cases__item-text">
									Barbelless catfish pelican gulper candlefish thornfishGulf menhaden ribbonbearer riffle dace black dragonfish denticle herring
								</p>
							</div>
						</div>
						<div data-aos="fade-right" class="cases__item">
							<img src="./HomeTemplate/realworld/img/cases-icon-5.png" alt="" class="cases__item-icon">
							<div class="cases__item-content">
								<div class="cases__item-title">
									Cryptoland
								</div>
								<p class="cases__item-text">
									Clownfish catfish antenna codlet alfonsino squirrelfish deepwater flathead sea lamprey. Bombay duck sand goby snake mudhead
								</p>
							</div>
						</div>
						<div data-aos="fade-left" data-aos-delay="200" class="cases__item">
							<img src="./HomeTemplate/realworld/img/cases-icon-6.png" alt="" class="cases__item-icon">
							<div class="cases__item-content">
								<div class="cases__item-title">
								<?php ahkweb('webname'); ?> App
								</div>
								<p class="cases__item-text">
									Asiatic glassfish pilchard sandburrower, orangestriped triggerfish hamlet Molly Miller trunkfish spiny dogfish!
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<a href="#" class="btn btn--orange btn--uppercase"><span>Join <?php ahkweb('webname'); ?></span></a>
				</div>
			</div>
			<img src="./HomeTemplate/realworld/img/cases-bg.png"  class="cases__bg" alt="">
			<img src="./HomeTemplate/realworld/img/cases-imgs.png"  class="cases__elements" alt="">
		</section>

		<section class="data" id="stat">
			<div class="container data__container">
				<div class="row">
					<div class="col">
						<img src="./HomeTemplate/realworld/img/data-bg.png" class="data__img" alt="">
						<div class="counter__item counter__item-1">
							<div class="counter__item-title">Current elixit price (BTC)</div>
							<div class="counter counter__item-value counter__item-value--blue numscroller">0.052646</div>
						</div>
						<div class="counter__item counter__item-2">
							<div class="counter__item-title">Avarage batches used</div>
							<div class="counter counter__item-value counter__item-value--pink">5.658</div>
						</div>
						<div class="counter__item counter__item-3">
							<div class="counter__item-title">Total batches remaining</div>
							<div class="counter counter__item-value counter__item-value--green">20.324</div>
						</div>
						<div class="counter__item counter__item-4">
							<div class="counter__item-title">Percentage batches</div>
							<div class="counter counter__item-value counter__item-value--percent counter__item-value--purpure">65</div>
						</div>
					</div>
				</div>
			</div>
			<img src="./HomeTemplate/realworld/img/data-bg-space.png" class="data__bg" alt="">
		</section>

		<section class="section section--no-pad-bot facts">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="section-header section-header--animated section-header--center section-header--small-margin">
							<h4>Some facts</h4>
							<h2>Smart Contract API</h2>
						</div>
					</div>
				</div>
			</div>
			<div class="facts__line">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="facts__line-list">
								<div class="facts__item">
										<img src="./HomeTemplate/realworld/img/bitcon-round.png" class="facts__icon" alt="">
										<div class="facts__title">
											Bitcoin + RSK
										</div>
									</div>
									<div class="facts__item">
										<img src="./HomeTemplate/realworld/img/stellar-round.png" class="facts__icon" alt="">
										<div class="facts__title">
											Stellar Lumens
										</div>
									</div>
									<div class="facts__item">
										<img src="./HomeTemplate/realworld/img/counterparty-round.png" class="facts__icon" alt="">
										<div class="facts__title">
											Counterparty
										</div>
									</div>
									<div class="facts__item">
										<img src="./HomeTemplate/realworld/img/lisk.png" class="facts__icon" alt="">
										<div class="facts__title">
											Lisk
										</div>
									</div>
									<div class="facts__item">
										<img src="./HomeTemplate/realworld/img/eos-round.png" class="facts__icon" alt="">
										<div class="facts__title">
											EOS
										</div>
									</div>
							</div>
						</div>
					</div>
				</div>
				<img src="./HomeTemplate/realworld/img/facts-bg.png" class="facts__bg" alt="">
			</div>
			
		</section>

		<section class="section token" id="token">
			<div class="container">
				<div class="row">
					<img src="./HomeTemplate/realworld/img/token-img.png" class="token__img" alt="">
					<div data-aos="fade-left" class="col-lg-6 offset-lg-6 token__animated-content">
						<div class="section-header section-header--tire section-header--small-margin">
							<h4>About token</h4>
							<h2>Token Sale</h2>
						</div>

						<ul class="token__info-list">
							<li>
								<span>Token name:</span> <?php ahkweb('webname'); ?> Token
							</li>
							<li>
								<span>Ticker Symbol:</span> <?php ahkweb('webname'); ?>
							</li>
							<li>
								<span>Currency Symbol Image	:</span> Currency Symbol Image
							</li>
							<li>
								<span>Starting Price Pre-ICO:</span> Cryptoland for USD 0.08
							</li>
							<li>
								<span>Maximum Eroiy produced:</span> Cryptoland for USD 0.12
							</li>
							<li>
								<span>Maximum Eroiy for Sale:</span> 2 billion (technical limit)
							</li>
							<li>
								<span>Fundraising Goal:</span> USD 48 million
							</li>
							<li>
								<span>Minimum Purchase:</span> 100 Cryptoland
							</li>
						</ul>

						<div class="token__desc">
							<div class="token__desc-title">General description</div>
							<div class="token__desc-text">
								<p>
								<?php ahkweb('webname'); ?> will be released on the basis of Ethereum platform and fully comply with ERC20* standard. 
								</p>
								<p>
									Support of this standard guarantees the compatibility of the token with third-party services (wallets, exchanges, listings, etc.), and provides easy integration.
								</p>
							</div>
						</div>

						<a href="#" class="btn btn--small btn--uppercase btn--orange"><span>Buy Token</span></a>

					</div>
				</div>
			</div>
		</section>

		<section class="docs" id="docs">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="section-header section-header--animated seaction-header--center section-header--tire section-header--medium-margin">
							<h4>Our files</h4>
							<h2>Documents</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div data-aos="fade-up" class="col-lg-3 col-md-6 col-sm-6 col-12">
						<a href="#" class="doc">
							<div class="doc__content">
								<img src="./HomeTemplate/realworld/img/pdf.svg" alt="">
								<div class="doc__title">
									Terms & Conditions
								</div>
							</div>
						</a>
					</div>
					<div data-aos="fade-up" data-aos-delay="200" class="col-lg-3 col-md-6 col-sm-6 col-12">
						<a href="#" class="doc">
							<div class="doc__content">
								<img src="./HomeTemplate/realworld/img/pdf.svg" alt="">
								<div class="doc__title">
									White Pappers
								</div>
							</div>
						</a>
					</div>
					<div data-aos="fade-up" data-aos-delay="400" class="col-lg-3 col-md-6 col-sm-6 col-12">
						<a href="#" class="doc">
							<div class="doc__content">
								<img src="./HomeTemplate/realworld/img/pdf.svg" alt="">
								<div class="doc__title">
									Privacy Policy
								</div>
							</div>
						</a>
					</div>
					<div data-aos="fade-up" data-aos-delay="600" class="col-lg-3 col-md-6 col-sm-6 col-12">
						<a href="#" class="doc">
							<div class="doc__content">
								<img src="./HomeTemplate/realworld/img/pdf.svg" alt="">
								<div class="doc__title">
									Business Profile
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
			<img src="./HomeTemplate/realworld/img/docs-bg.png" data-jarallax-element="40" alt="" class="docs__bg">
		</section>

		<section class="data token-data section section--no-pad-bot">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="section-header section-header--animated section-header--medium-margin section-header--center">
							<h4>Our data</h4>
							<h2>Token Distribution</h2>
							<div class="bg-title">
								Token Distribution
							</div>
						</div>
					</div>
				</div>
				<div class="row chart__row align-items-center">
					<div class="col-lg-6">
						<div class="chart">
							<img class="chart__bg" src="./HomeTemplate/realworld/img/chart-bg.png" alt="">
							<div class="chart__wrap">
								<canvas id="myChart" width="400" height="400"></canvas>
							</div>
						</div>
					</div>
					<div data-aos="fade-left" class="col-lg-6 token-data__animated-content">
						<div class="chart__title">
							Allocation of funds
						</div>
						<p class="chart__text">
							Total token supply  - 152,358
						</p>
						<ul class="chart__legend">
							<li>
								<span style="width: 101px;"></span>
								9% Founders and Team
							</li>
							<li>
								<span style="width: 153px;"></span>
								13% Reserved Funding
							</li>
							<li>
								<span style="width: 34px;"></span>
								2% Advisors
							</li>
							<li>
								<span style="width: 289px;"></span>
								25% Distribute to Community
							</li>
							<li>
								<span style="width: 22px;"></span>
								1% Bounty campaign
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section>

		<section class="section faq" id="faq">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="section-header section-header--center section-header--medium-margin">
							<h4>FAQ</h4>
							<h2>Frequency Asked Questions</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-8 offset-lg-2">

							<ul class="accordion">
								<li>
									<a>Can American citizens take part in the crowdsale?</a>
									<p>
										JavaScript is also used in environments that aren’t web-based, such as PDF documents, site-specific browsers, and desktop widgets. Newer and faster JavaScript virtual machines (VMs) and platforms built upon them have also increased the popularity of JavaScript for server-side web applications. On the client side, JavaScript has been traditionally implemented as an interpreted language, but more recent browsers perform just-in-time compilation.
									</p>
								</li>
								<li>
									<a>Does the crowdsale comply with legal regulations?</a>
									<p>
										JavaScript is also used in environments that aren’t web-based, such as PDF documents, site-specific browsers, and desktop widgets. Newer and faster JavaScript virtual machines (VMs) and platforms built upon them have also increased the popularity of JavaScript for server-side web applications. On the client side, JavaScript has been traditionally implemented as an interpreted language, but more recent browsers perform just-in-time compilation.
									</p>
								</li>
								<li>
									<a>Can I trade SCR at an exchange?</a>
									<p>
										JavaScript is also used in environments that aren’t web-based, such as PDF documents, site-specific browsers, and desktop widgets. Newer and faster JavaScript virtual machines (VMs) and platforms built upon them have also increased the popularity of JavaScript for server-side web applications. On the client side, JavaScript has been traditionally implemented as an interpreted language, but more recent browsers perform just-in-time compilation.
									</p>
								</li>
								<li>
									<a>What is the difference between Coin tokens and Power tokens?</a>
									<p>
										JavaScript is also used in environments that aren’t web-based, such as PDF documents, site-specific browsers, and desktop widgets. Newer and faster JavaScript virtual machines (VMs) and platforms built upon them have also increased the popularity of JavaScript for server-side web applications. On the client side, JavaScript has been traditionally implemented as an interpreted language, but more recent browsers perform just-in-time compilation.
									</p>
								</li>
								<li>
									<a>Why is Cryptonet economic model sustainable?</a>
									<p>
										JavaScript is also used in environments that aren’t web-based, such as PDF documents, site-specific browsers, and desktop widgets. Newer and faster JavaScript virtual machines (VMs) and platforms built upon them have also increased the popularity of JavaScript for server-side web applications. On the client side, JavaScript has been traditionally implemented as an interpreted language, but more recent browsers perform just-in-time compilation.
									</p>
								</li>
								<li>
									<a>Can I mine SCR?</a>
									<p>
										JavaScript is also used in environments that aren’t web-based, such as PDF documents, site-specific browsers, and desktop widgets. Newer and faster JavaScript virtual machines (VMs) and platforms built upon them have also increased the popularity of JavaScript for server-side web applications. On the client side, JavaScript has been traditionally implemented as an interpreted language, but more recent browsers perform just-in-time compilation.
									</p>
								</li>
							</ul>

					</div>
				</div>
			</div>
		</section>

		<section class="advisors">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="section-header section-header--animated section-header--center section-header--big-margin">
							<h4>Family</h4>
							<h2>Advisors</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div data-aos="fade-right" class="col-md-6">
						<div class="advisor">
							<a href="#" class="advisor__img">
								<img src="./HomeTemplate/realworld/img/advisor-avatar-1.jpg" alt="">
								<div class="advisor__sn">
									<img src="./HomeTemplate/realworld/img/facebook.svg" alt="">
								</div>
							</a>
							<div class="advisor__content">
								<div class="advisor__title">
									David Drake
								</div>
								<div class="advisor__post">
									CEO Capital Limited
								</div>
								<p class="advisor__text">
									JavaScript virtual machines (VMs) and platforms built upon them have also increased the popularity of JavaScript for server-side web 
								</p>
							</div>
						</div>
					</div>

					<div data-aos="fade-left" data-aos-delay="200" class="col-md-6">
						<div class="advisor">
							<a href="#" class="advisor__img">
								<img src="./HomeTemplate/realworld/img/advisor-avatar-2.jpg" alt="">
								<div class="advisor__sn">
									<img src="./HomeTemplate/realworld/img/linkedin.svg" alt="">
								</div>
							</a>
							<div class="advisor__content">
								<div class="advisor__title">
									Ann Balock
								</div>
								<div class="advisor__post">
									Cryptonet Speaker
								</div>
								<p class="advisor__text">
									JavaScript virtual machines (VMs) and platforms built upon them have also increased the popularity of JavaScript for server-side web 
								</p>
							</div>
						</div>
					</div>

					<div data-aos="fade-right" class="col-md-6">
						<div class="advisor">
							<a href="#" class="advisor__img">
								<img src="./HomeTemplate/realworld/img/advisor-avatar-3.jpg" alt="">
								<div class="advisor__sn">
									<img src="./HomeTemplate/realworld/img/google-plus.svg" alt="">
								</div>
							</a>
							<div class="advisor__content">
								<div class="advisor__title">
									Vladimir Nikitin
								</div>
								<div class="advisor__post">
									Cryptonet Team Lead
								</div>
								<p class="advisor__text">
									Giant wels roach spotted danio Black swallower cowfish bigscale flagblenny central mudminnow. Lighthousefish combtooth blenny
								</p>
							</div>
						</div>
					</div>

					<div data-aos="fade-left" data-aos-delay="200" class="col-md-6">
						<div class="advisor">
							<a href="#" class="advisor__img">
								<img src="./HomeTemplate/realworld/img/advisor-avatar-4.jpg" alt="">
								<div class="advisor__sn">
									<img src="./HomeTemplate/realworld/img/facebook.svg" alt="">
								</div>
							</a>
							<div class="advisor__content">
								<div class="advisor__title">
									Sam Peters
								</div>
								<div class="advisor__post">
									Team Lead Advisor
								</div>
								<p class="advisor__text">
									Lampfish combfish, roundhead lemon sole armoured catfish saw shark northern stargazer smooth dogfish cod icefish scythe butterfish
								</p>
							</div>
						</div>
					</div>

				</div>
			</div>
		</section>

		<section class="section section--no-pad-top team" id="team">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="section-header section-header--tire section-header--medium-margin">
							<h4>Our brain</h4>
							<h2>Awesome Team</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div data-aos="fade-right" class="col-lg-4 col-xl-3 col-6">
						<div class="team-member">
							<img class="team-member__avatar" src="img/ava1.png" alt="">
							<div class="team-member__content">
								<div class="team-member__name">David Drake</div>
								<div class="team-member__post">UI Designer</div>
								<ul class="team-member__social">
									<li><a href="#"><img src="./HomeTemplate/realworld/img/facebook.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/realworld/img/linkedin.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/realworld/img/google-plus.svg" alt=""></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div data-aos="fade-right" data-aos-delay="100" class="col-lg-4 col-xl-3 col-6">
						<div class="team-member">
							<img class="team-member__avatar" src="img/ava2.png" alt="">
							<div class="team-member__content">
								<div class="team-member__name">Allan Bellor</div>
								<div class="team-member__post">Analitics</div>
								<ul class="team-member__social">
									<li><a href="#"><img src="./HomeTemplate/realworld/img/facebook.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/realworld/img/linkedin.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/realworld/img/google-plus.svg" alt=""></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div data-aos="fade-right" data-aos-delay="200" class="col-lg-4 col-xl-3 col-6">
						<div class="team-member">
							<img class="team-member__avatar" src="img/ava3.png" alt="">
							<div class="team-member__content">
								<div class="team-member__name">Joe Doe</div>
								<div class="team-member__post">Tech Operation</div>
								<ul class="team-member__social">
									<li><a href="#"><img src="./HomeTemplate/realworld/img/facebook.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/realworld/img/linkedin.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/realworld/img/google-plus.svg" alt=""></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div data-aos="fade-right" data-aos-delay="300" class="col-lg-4 col-xl-3 col-6">
						<div class="team-member">
							<img class="team-member__avatar" src="./HomeTemplate/realworld/img/ava4.png" alt="">
							<div class="team-member__content">
								<div class="team-member__name">Sam Tolder</div>
								<div class="team-member__post">CEO</div>
								<ul class="team-member__social">
									<li><a href="#"><img src="./HomeTemplate/realworld/img/facebook.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/realworld/img/linkedin.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/realworld/img/google-plus.svg" alt=""></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div data-aos="fade-right" class="col-lg-4 col-xl-3 col-6">
						<div class="team-member">
							<img class="team-member__avatar" src="./HomeTemplate/realworld/img/ava5.png" alt="">
							<div class="team-member__content">
								<div class="team-member__name">Henry Polar</div>
								<div class="team-member__post">SEO Specialist</div>
								<ul class="team-member__social">
									<li><a href="#"><img src="./HomeTemplate/realworld/img/facebook.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/realworld/img/linkedin.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/realworld/img/google-plus.svg" alt=""></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div data-aos="fade-right" data-aos-delay="100" class="col-lg-4 col-xl-3 col-6">
						<div class="team-member">
							<img class="team-member__avatar" src="./HomeTemplate/realworld/img/ava6.png" alt="">
							<div class="team-member__content">
								<div class="team-member__name">Sandra Pen</div>
								<div class="team-member__post">Humar Resources</div>
								<ul class="team-member__social">
									<li><a href="#"><img src="./HomeTemplate/realworld/img/facebook.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/realworld/img/linkedin.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/realworld/img/google-plus.svg" alt=""></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div data-aos="fade-right" data-aos-delay="200" class="col-lg-4 col-xl-3 col-6">
						<div class="team-member">
							<img class="team-member__avatar" src="./HomeTemplate/realworld/img/ava7.png" alt="">
							<div class="team-member__content">
								<div class="team-member__name">Linda Gampton</div>
								<div class="team-member__post">UX Team Lead</div>
								<ul class="team-member__social">
									<li><a href="#"><img src="./HomeTemplate/realworld/img/facebook.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/realworld/img/linkedin.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/realworld/img/google-plus.svg" alt=""></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div data-aos="fade-right" data-aos-delay="300" class="col-lg-4 col-xl-3 col-6">
						<div class="team-member">
							<img class="team-member__avatar" src="./HomeTemplate/realworld/img/ava8.png" alt="">
							<div class="team-member__content">
								<div class="team-member__name">John Smith</div>
								<div class="team-member__post">General Director</div>
								<ul class="team-member__social">
									<li><a href="#"><img src="./HomeTemplate/realworld/img/facebook.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/realworld/img/linkedin.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/realworld/img/google-plus.svg" alt=""></a></li>								
								</ul>
							</div>
						</div>
					</div>
					<div data-aos="fade-right" class="col-lg-4 col-xl-3 col-6">
						<div class="team-member">
							<img class="team-member__avatar" src="./HomeTemplate/realworld/img/ava9.png" alt="">
							<div class="team-member__content">
								<div class="team-member__name">Sam Oldrich</div>
								<div class="team-member__post">Manager</div>
								<ul class="team-member__social">
									<li><a href="#"><img src="./HomeTemplate/realworld/img/facebook.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/realworld/img/linkedin.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/realworld/./HomeTemplate/realworld//google-plus.svg" alt=""></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div data-aos="fade-right" data-aos-delay="100" class="col-lg-4 col-xl-3 col-6">
						<div class="team-member">
							<img class="team-member__avatar" src="./HomeTemplate/realworld/img/ava10.png" alt="">
							<div class="team-member__content">
								<div class="team-member__name">Denis Portlen</div>
								<div class="team-member__post">Programmer</div>
								<ul class="team-member__social">
									<li><a href="#"><img src="./HomeTemplate/realworld/img/facebook.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/realworld/img/linkedin.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/realworld/img/google-plus.svg" alt=""></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div data-aos="fade-right" data-aos-delay="200" class="col-lg-4 col-xl-3 col-6">
						<div class="team-member">
							<img class="team-member__avatar" src="./HomeTemplate/realworld/img/ava11.png" alt="">
							<div class="team-member__content">
								<div class="team-member__name">Den Miller</div>
								<div class="team-member__post">Economist</div>
								<ul class="team-member__social">
									<li><a href="#"><img src="./HomeTemplate/realworld/img/facebook.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/realworld/img/linkedin.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/realworld/img/google-plus.svg" alt=""></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div data-aos="fade-right" data-aos-delay="300" class="col-lg-4 col-xl-3 col-6">
						<div class="team-member">
							<img class="team-member__avatar" src="./HomeTemplate/realworld/img/ava12.png" alt="">
							<div class="team-member__content">
								<div class="team-member__name">Brawn Lee</div>
								<div class="team-member__post">Journalist</div>
								<ul class="team-member__social">
									<li><a href="#"><img src="./HomeTemplate/realworld/img/facebook.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/realworld/img/linkedin.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/realworld/img/google-plus.svg" alt=""></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<img src="./HomeTemplate/realworld/img/team-bg.png" data-jarallax-element="40" alt="" class="team__bg">
		</section>

		<section class="news">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="section-header section-header--center section-header--small-margin">
							<h4>In the world</h4>
							<h2>Latest News</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col">

						<div class="news-carousel owl-carousel">
							<a data-aos="fade-up" href="#" class="news-carousel__item">
								<div class="news-carousel__item-body">
									<div class="news-carousel__item-subtitle"><?php ahkweb('webname'); ?></div>
									<h3 class="news-carousel__item-title">
										New trends in UI/UX Design World Integration
									</h3>
									<p>
										Specially for our VIP customers the LH Crypto team representatives Alexander Smirnov and Antonis Lapos will conduct a number of personal meet-
									</p>
									<div class="news-carousel__item-data">
										September, 15 2017
									</div>
								</div>
							</a>

							<a data-aos="fade-up" data-aos-delay="200" href="#" class="news-carousel__item">
								<div class="news-carousel__item-body">
									<div class="news-carousel__item-subtitle">Cryptocurrency</div>
									<h3 class="news-carousel__item-title">
										New trends in UI/UX Design World Integration
									</h3>
									<p>
										Specially for our VIP customers the LH Crypto team representatives Alexander Smirnov and Antonis Lapos will conduct a number of personal meet-
									</p>
									<div class="news-carousel__item-data">
										September, 15 2017
									</div>
								</div>
							</a>

							<a data-aos="fade-up" data-aos-delay="200" href="#" class="news-carousel__item">
								<div class="news-carousel__item-body">
									<div class="news-carousel__item-subtitle">Cryptocurrency</div>
									<h3 class="news-carousel__item-title">
										New trends in UI/UX Design World Integration
									</h3>
									<p>
										Specially for our VIP customers the LH Crypto team representatives Alexander Smirnov and Antonis Lapos will conduct a number of personal meet-
									</p>
									<div class="news-carousel__item-data">
										September, 15 2017
									</div>
								</div>
							</a>

							<a href="#" class="news-carousel__item">
								<div class="news-carousel__item-body">
									<div class="news-carousel__item-subtitle">Cryptocurrency</div>
									<h3 class="news-carousel__item-title">
										New trends in UI/UX Design World Integration
									</h3>
									<p>
										Specially for our VIP customers the LH Crypto team representatives Alexander Smirnov and Antonis Lapos will conduct a number of personal meet-
									</p>
									<div class="news-carousel__item-data">
										September, 15 2017
									</div>
								</div>
							</a>
							
						</div>
						
					</div>
				</div>
			</div>
		</section>

		<section class="press section">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="section-header section-header--center section-header--medium-margin">
							<h4>Press About us</h4>
							<h2>Press About <?php ahkweb('webname'); ?></h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-12 col-sm-6">
						<a href="#" class="press__item">
							<img src="./HomeTemplate/realworld/img/press-logo-1.png" alt="">
						</a>
					</div>
					<div class="col-lg-3 col-12 col-sm-6">
						<a href="#" class="press__item">
							<img src="./HomeTemplate/realworld/img/press-logo-2.png" alt="">
						</a>
					</div>
					<div class="col-lg-3 col-12 col-sm-6">
						<a href="#" class="press__item">
							<img src="./HomeTemplate/realworld/img/press-logo-3.png" alt="">
						</a>
					</div>
					<div class="col-lg-3 col-12 col-sm-6">
						<a href="#" class="press__item">
							<img src="./HomeTemplate/realworld/img/press-logo-4.png" alt="">
						</a>
					</div>
				</div>
			</div>
		</section>

		<section class="partners">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="section-header section-header--tire section-header--medium-margin">
							<h4>Our friends</h4>
							<h2>Partners</h2>
						</div>

						<div class="logoes">
							<div>
								<img src="./HomeTemplate/realworld/img/partners-logo-1.png" alt="">
							</div>
							<div>
								<img src="./HomeTemplate/realworld/img/partners-logo-2.png" alt="">
							</div>
							<div>
								<img src="./HomeTemplate/realworld/img/partners-logo-3.png" alt="">
							</div>
							<div>
								<img src="./HomeTemplate/realworld/img/partners-logo-4.png" alt="">
							</div>
							<div>
								<img src="./HomeTemplate/realworld/img/partners-logo-5.png" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="section contact">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="section-header section-header--center section-header--medium-margin">
							<h4>Contact us</h4>
							<h2>Get in Touch</h2>
						</div>
						<form action="#" class="form contact-form" id="contact-form">
							<input type="text" name="Name" class="form__input" placeholder="Name">
							<input type="email" name="Email" class="form__input" placeholder="Email">
							<textarea name="Message" class="form__textarea" placeholder="Message"></textarea>
							<button class="form__btn btn btn--uppercase btn--orange"><span>Send message</span></button>
						</form>
					</div>
				</div>
			</div>
			<img src="./HomeTemplate/realworld/img/subscribe-bg.png" class="contact-bg" alt="">
		</section>

		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<a href="#" class="logo">
							<img class="" width="200px" src="<?php ahkweb('logo'); ?>" alt="">
							<div class="logo__title"><?php ahkweb('webname'); ?></div>
						</a>
						<div class="copyright">© <?php echo date('Y'); ?>, <?php ahkweb('webname'); ?> </div>
					</div>
					<div class="col-lg-4">
						<div class="social-block">
							<div class="social-block__title">
								Stay connected:
							</div>

							<ul class="social-list">
								<li class="social-list__item">
									
									<a href="#" class="social-list__link">
										<i class="fontello-icon icon-twitter">&#xf309;</i>
									</a>
								</li>
								<li class="social-list__item">
									<a href="#" class="social-list__link">
										<i class="fontello-icon icon-facebook">&#xf30c;</i>
									</a>
								</li>
								<li class="social-list__item">
									<a href="#" class="social-list__link">
										<i class="fontello-icon icon-telegram">&#xf2c6;</i>
									</a>
								</li>
								<li class="social-list__item">
									<a href="#" class="social-list__link">
										<i class="fontello-icon icon-bitcoin">&#xf15a;</i>
									</a>
								</li>
								<li class="social-list__item">
									<a href="#" class="social-list__link">
										<i class="fontello-icon icon-youtube-play">&#xf16a;</i>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-4">
						<form action="#" class="form subscribe" id="subscribe-form">
							<div class="form__title">Subscribe</div>
							<div class="form__row">
								<input type="email" name="subscribe_email" class="form__input" placeholder="Email">
								<button class="form__btn btn btn--uppercase btn--orange btn--small"><span>Send</span></button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</footer>

	</div>

	<script>window.jQuery || document.write('<script src="./HomeTemplate/realworld/js/jquery-2.2.4.min.js"><\/script>')</script>

	<script src="./HomeTemplate/realworld/js/scripts.min.js"></script>

</body>

</html>
