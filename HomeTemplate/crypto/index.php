<!DOCTYPE html>
<html lang="en" class="no-js">


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

	<link rel="stylesheet" href="./HomeTemplate/crypto/css/main.min.css">

	<!-- Load google font
	================================================== -->
	<script type="text/javascript">
		WebFontConfig = {
			google: { families: [ 'Catamaran:300,400,600,700,900', 'Raleway:100,700', 'Roboto:700,900'] }
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
				<a href="#" class="telegram-link">
					<img src="./HomeTemplate/crypto/img/telegram-link.png" alt="">
				</a>

				<!-- <select class="select">
					<option value="ru">ru</option>
					<option value="ua">ua</option>
					<option value="en">en</option>
				</select> -->
				<a href="register.php" class="btn-sign-in">Register</a>	
			</div>

			<div class="btn-menu">
				<div class="one"></div>
				<div class="two"></div>
				<div class="three"></div>
			</div>
		</header>
	
		<div class="fixed-menu">
			<div class="fixed-menu__header">
				<a href="#" class="logo logo--color">
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

		<section class="first-screen section section--no-pad-top" style="background-image: url(./HomeTemplate/crypto/img/main_bg.png);" id="main">
			<div class="container">
				<div class="row">
					<div class="col">
						<h1 data-aos="fade-up" data-aos-anchor="#main" data-aos-delay="200"><?php ahkweb('webname'); ?>   <span></span></h1>
						<p data-aos="fade-up" data-aos-anchor="#main" data-aos-delay="300">
							All Service Pan Card Aadhar card Licence Voter Card Vehicle Insurance Pollution
						</p>

						<div class="progress-bar" data-aos="fade-up" data-aos-anchor="#main" data-aos-delay="400">
							<div class="progress-bar__line">
								<span style="width: 50%;"></span>
								<p>17M USD MAX</p>
								<div style="left: 5%;" class="progress-bar__metka">800K</div>
								<div style="left: 25%;" class="progress-bar__metka">2.3M</div>
								<div style="left: 45%;" class="progress-bar__metka">5M</div>
								<div style="left: 75%;" class="progress-bar__metka">10.5M</div>
							</div>
							<div class="progress-bar__footer">
								<p></p>
								<p>
							</div>
						</div>

						<div class="first-screen__btns-wrap" data-aos="fade-up" data-aos-anchor="#main" data-aos-delay="500">
							<a href="register.php" class="btn btn--medium btn--orange"><span>Register Now</span></a>
							<a href="login.php" class="btn btn--big btn--blue">Sign In</a>
						</div>

						<div class="payments" data-aos="fade-up" data-aos-anchor="#main" data-aos-delay="600">
							<img src="./HomeTemplate/crypto/img/visa.png" alt="">
							<img src="./HomeTemplate/crypto/img/mc.png" alt="">
							<img src="./HomeTemplate/crypto/img/bitcoin.png" alt="">
							<img src="./HomeTemplate/crypto/img/paypal.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</section>
	
		<section class="about section section--no-pad-bot" id="about" style="background-image: url(./HomeTemplate/crypto/img/bg_1.jpg);">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<img data-aos="fade-right" src="./HomeTemplate/crypto/img/about-img-1.png" class="img-responsive" alt="">
					</div>
					<div class="col-lg-6" data-aos="fade-left">
						<div class="section-header section-header--tire section-header--small-margin">
							<h4>About ICO</h4>
							<h2>
							<?php ahkweb('webname'); ?> Website <span>is the best for your Online Business</span>  									
							</h2>
						</div>

						<p class="text-margin-bot">
							All Service Pan Card Aadhar card Licence Voter Card Vehicle Insurance Pollution .
						

						
							
								<img src="./HomeTemplate/crypto/img/play.svg" alt="">
							</a>
							<div class="
						</div>
					
					</div>					
				</div>
				<div class="row">
					<div class="col">
						<div class="partners-logo__block" data-aos="fade-up">
							<div class="partners-logo__item">
								<img src="./HomeTemplate/crypto/img/partners-logo-1.png" alt="">
								<p><span>4.3/5</span></p>
							</div>
							<div class="partners-logo__item">
								<img src="./HomeTemplate/crypto/img/partners-logo-2.png" alt="">
								<p><span>4.5/5</span></p>
							</div>
							<div class="partners-logo__item">
								<img src="./HomeTemplate/crypto/img/partners-logo-3.png" alt="">
								<ul class="rating">
									<li style="background-image: url(./HomeTemplate/crypto/img/star-gold.svg)"></li>
									<li style="background-image: url(./HomeTemplate/crypto/img/star-gold.svg)"></li>
									<li style="background-image: url(./HomeTemplate/crypto/img/star-gold.svg)"></li>
									<li style="background-image: url(./HomeTemplate/crypto/img/star-gold.svg)"></li>
									<li style="background-image: url(./HomeTemplate/crypto/img/star.svg)"></li>
								</ul>
							</div>
							<div class="partners-logo__item">
								<img src="./HomeTemplate/crypto/img/partners-logo-4.png" alt="">
								<p>risk: low</p>
							</div>							
							
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="section services" id="services" style="background-image: url(./HomeTemplate/crypto/img/bg_2.jpg);">
			<div class="container">
				<img src="./HomeTemplate/crypto/img/figure-blue.png" alt="" data-jarallax-element="-40" class="services__figure">
				<div class="row">
					<div class="col">
						<div class="section-header section-header--center section-header--medium-margin">
							<h4>services</h4>
							<h2><?php ahkweb('webname'); ?> </h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 col-lg-4" data-aos="fade-left" data-aos-delay="200">
						<div class="service-item">
							<div class="service-item__icon">
								<img src="./HomeTemplate/crypto/img/services-icon-1.svg" alt="">
							</div>
							<div class="service-item__title">Aadhar Service </div>
							<p>
								The Unique Identification Authority of India (UIDAI) offers a comprehensive suite of Aadhaar-related services, both online and offline, to ensure that residents can manage their Aadhaar information conveniently and securely.

 . 
							</p>
						</div>
					</div>
					<div class="col-sm-6 col-lg-4" data-aos="fade-left" data-aos-delay="300">
						<div class="service-item">
							<div class="service-item__icon">
								<img src="./HomeTemplate/crypto/img/services-icon-2.svg" alt="">
							</div>
							<div class="service-item__title">Pan Card </div>
							<p>
								  Apply for a new PAN card (India), Check PAN card status , 
 Correction or update of PAN details , 
 Link PAN with Aadhaar, Lost or duplicate PAN card,  Documents required for PAN

							</p>
						</div>
					</div>
					<div class="col-sm-6 col-lg-4" data-aos="fade-left" data-aos-delay="400">
						<div class="service-item">
							<div class="service-item__icon">
								<img src="./HomeTemplate/crypto/img/services-icon-3.svg" alt="">
							</div>
							<div class="service-item__title">Vehicle Insurance</div>
							<p>
								Liability: Covers damages you cause to others. Collision: Pays for your car if you hit something.
Comprehensive: Covers theft, vandalism, weather, etc.Uninsured/Underinsured Motorist: Protects you if the other driver lacks insurance.Personal Injury Protection (PIP) or Medical Payments: Covers medical expense
 
							</p>
						</div>
					</div>
					<div class="col-sm-6 col-lg-4" data-aos="fade-left" data-aos-delay="500">
						<div class="service-item">
							<div class="service-item__icon">
								<img src="./HomeTemplate/crypto/img/services-icon-4.svg" alt="">
							</div>
							<div class="service-item__title">Pollution</div>
							<p>
								  Mandatory for All Vehicles: Required for both two-wheelers and four-wheelers.
  Validity:
For new vehicles, the PUC is valid for 1 year.
After that, it needs to be renewed every 6 months or as specified based on emission levels.
  Where to Get It:
Authorized PUC centers at petrol pumps or RTO-approved locations.
Some states offer online services for renewal/checking status.
 Penalties:
Driving without a valid PUC certificate can lead to fines, typically ₹1,000 for the first offense and ₹2,000 for repeated offenses

							</p>
						</div>
					</div>
					<div class="col-sm-6 col-lg-4" data-aos="fade-left" data-aos-delay="600">
						<div class="service-item">
							<div class="service-item__icon">
								<img src="./HomeTemplate/crypto/img/services-icon-5.svg" alt="">
							</div>
							<div class="service-item__title">Income Tax Return (ITR) </div>
							<p>
								How to file an Income Tax Return (ITR)
  Which ITR form to use (e.g., ITR-1, ITR-2, etc.)
  Documents required for filing
  Deadline for filing
  Refund status

							</p>
						</div>
					</div>
					<div class="col-sm-6 col-lg-4" data-aos="fade-left" data-aos-delay="700">
						<div class="service-item">
							<div class="service-item__icon">
								<img src="./HomeTemplate/crypto/img/services-icon-5.svg" alt="">
							</div>
							<div class="service-item__title"> Vehicle Loan </div>
							<p>
								Understanding vehicle loans – What they are, how they work, and typical terms.
  Loan comparison – Help compare interest rates, tenures, or lenders.
  Loan eligibility – Criteria to qualify for a vehicle loan.
  Loan calculator – Calculate EMIs based on amount, interest rate, and tenure.
  Documents required – For salaried or self-employed applicants.
  Tips for getting approved – Improve your chances of approval or getting a better interest rate.
  Types of vehicle loans – For new vs. used cars, two-wheelers, commercial vehicles, etc.
 
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="section infoblock" style="background-image: url(./HomeTemplate/crypto/img/infoblock_bg.png);" id="stat">

			<div class="container">
				<div class="row">
					<div class="col">

						<div class="section-header section-header--center section-header--white section-header--medium-margin">
							<h4>Infoblock</h4>
							<h2>Huge and Diverse Market</h2>
						</div>

						<div class="infoblock__list">
							<div class="infoblock__item" data-aos="fade-up" data-aos-delay="100">
								<p>
									Sports fans world-wide
								</p>
								<span style="color: #f3d667;">1 billion</span>
							</div>
							<div class="infoblock__item" data-aos="fade-up" data-aos-delay="200">
								<p>
									Betting and fantasy sports cap
								</p>
								<span style="color: #f9778a;">1 trillion</span>
							</div>
							<div class="infoblock__item" data-aos="fade-up" data-aos-delay="300">
								<p>
									Sports events market cap
								</p>
								<span style="color: #77c0f6;">80 billion</span>
							</div>
						</div>

					</div>
				</div>
			</div>
		</section>

		<section class="section map" id="map" style="background-image: url(./HomeTemplate/crypto/img/bg_3.png);">
			<div class="container">
				<img src="./HomeTemplate/crypto/img/figure-blue.png" alt="" data-jarallax-element="-40" class="map__figure-1">
				<img src="./HomeTemplate/crypto/img/figure-pink.png" alt="" data-jarallax-element="-40" class="map__figure-2">
				<div class="row">
					<div class="col">

						<div class="section-header section-header--center section-header--medium-margin">
							<h4>our way</h4>
							<h2>Road Map</h2>
						</div>

						<div class="roadmap" data-aos="fade-up">

							<div class="roadmap__item roadmap__item--past">

								<div class="roadmap__item-title">
									July 2017
								</div>

								<div class="roadmap__item-marker">

								</div>

								<div class="roadmap__item-text">
									Performing Closed Beta testing, launching a pre-ICO campaing.
								</div>

							</div>		
							
							<div class="roadmap__item roadmap__item--active">

								<div class="roadmap__item-title">
									August 2017
								</div>

								<div class="roadmap__item-marker">

								</div>

								<div class="roadmap__item-text">
									Issuing JCR tokens into the Ethereum blockchain.
								</div>

							</div>		

							<div class="roadmap__item">

								<div class="roadmap__item-title">
									October 2017
								</div>

								<div class="roadmap__item-marker">

								</div>

								<div class="roadmap__item-text">
									Preparing for Open Beta launch. Basic Employment Smart Contracts Templates Development.
								</div>

							</div>		

							<div class="roadmap__item">

								<div class="roadmap__item-title">
									November 2017
								</div>

								<div class="roadmap__item-marker">

								</div>

								<div class="roadmap__item-text">
									Invoicing & billing system implementation. Channel partner program launch. 200+ companies in Open Beta.
								</div>

							</div>		

							<div class="roadmap__item">

								<div class="roadmap__item-title">
									December 2017
								</div>

								<div class="roadmap__item-marker">

								</div>

								<div class="roadmap__item-text">
									Running of the crowdfunding campaign, 500+ companies subscribed for Open Beta.
								</div>

							</div>		

							<div class="roadmap__item">

								<div class="roadmap__item-title">
									February 2018
								</div>

								<div class="roadmap__item-marker">

								</div>

								<div class="roadmap__item-text">
									Performing Closed Beta testing, launching a pre-ICO campaing.
								</div>

							</div>

							<div class="roadmap__item">

								<div class="roadmap__item-title">
									March 2018
								</div>

								<div class="roadmap__item-marker">

								</div>

								<div class="roadmap__item-text">
									Issuing JCR tokens into the Ethereum blockchain.
								</div>

							</div>

							<div class="roadmap__item">

								<div class="roadmap__item-title">
									April 2018
								</div>

								<div class="roadmap__item-marker">

								</div>

								<div class="roadmap__item-text">
									Preparing for Open Beta launch. Basic Employment Smart Contracts Templates Development.
								</div>

							</div>

							<div class="roadmap__item">

								<div class="roadmap__item-title">
									Q3 2018
								</div>

								<div class="roadmap__item-marker">

								</div>

								<div class="roadmap__item-text">
									Invoicing & billing system implementation. Channel partner program launch. 200+ companies in Open Beta.
								</div>

							</div>

							<div class="roadmap__item">

								<div class="roadmap__item-title">
									Q4 2018
								</div>

								<div class="roadmap__item-marker">

								</div>

								<div class="roadmap__item-text">
									Running of the crowdfunding campaign, 500+ companies subscribed for Open Beta.
								</div>

							</div>

						</div>

					</div>
				
				</div>
			</div>
		</section>

		<section class="section app" style="background-image: url(./HomeTemplate/crypto/img/app_bg-2.png);">
			<div class="container">
				<div class="row">
					<div class="col">

						<div class="col-lg-6 col-xl-5 col-md-8" data-aos="fade-right">
							<div class="section-header section-header--white section-header--tire">
								<h4>Mobile app</h4>
								<h2>Aadhaar services</h2>
							</div>
	
							<p>
								The Unique Identification Authority of India (UIDAI) offers a comprehensive suite of Aadhaar-related services, both online and offline, to ensure that residents can manage their Aadhaar information conveniently and securely. 
							</p>
	
							<div class="app__dowload-links">
								<a href="#" class="app__link">
									<img src="./HomeTemplate/crypto/img/gp.png" alt="">
								</a>
								<a href="#" class="app__link">
									<img src="./HomeTemplate/crypto/img/as.png" alt="">
								</a>
							</div>
						</div>
						<img src="./HomeTemplate/crypto/img/iphone.png" alt="" class="app__iphone" data-aos="fade-left">

					</div>
				</div>
			</div>
		</section>

		<section class="section process" style="background-image: url(./HomeTemplate/crypto/img/bg_4.png);">
			<div class="container">
				<img src="./HomeTemplate/crypto/img/figure-blue.png" alt="" data-jarallax-element="-40" class="process__figure-2">
				<img src="./HomeTemplate/crypto/img/figure-pink.png" alt="" data-jarallax-element="-40" class="process__figure-1">
				<div class="row">
					<div class="col">
						<div class="section-header section-header--center section-header--medium-margin">
							<h4>Awesome services</h4>
							<h2>How it Works?</h2>
						</div>
					</div>
				</div>
				<div class="row" data-aos="fade-up">
					<div class="col-sm-6 col-xl-3">
						<div class="process-item" style="border: 3px solid #16bf86;" >
							<div class="process-item__icon"><img src="./HomeTemplate/crypto/img/pr-icon-1.svg" alt=""></div>
							<div class="process-item__title">Vehicles Insurance</div>
							<p>Liability: Covers damages you cause to others. Collision: Pays for your car if you hit something. Comprehensive: Covers theft, vandalism, weather, etc.Uninsured/Underinsured Motorist: Protects you if .</p>
							<div class="process-item__arrow" style="background-color: #16bf86;"><img src="./HomeTemplate/crypto/img/arrow.png" alt=""></div>
						</div>
					</div>
					<div class="col-sm-6 col-xl-3">
						<div class="process-item" style="border: 3px solid #5775cf;" >
							<div class="process-item__icon"><img src="./HomeTemplate/crypto/img/pr-icon-2.svg" alt=""></div>
							<div class="process-item__title">Pollution</div>
							<p>Mandatory for All Vehicles: Required for both two-wheelers and four-wheelers. Validity: For new vehicles, the PUC is valid for 1 year. After that, it needs to be renewed every 6 .</p>
							<div class="process-item__arrow" style="background-color: #5775cf;"><img src="./HomeTemplate/crypto/img/arrow.png" alt=""></div>
						</div>
					</div>
					<div class="col-sm-6 col-xl-3">
						<div class="process-item" style="border: 3px solid #f2718b;">
							<div class="process-item__icon"><img src="./HomeTemplate/crypto/img/pr-icon-3.svg" alt=""></div>
							<div class="process-item__title">Income Tax Return</div>
							<p>How to file an Income Tax Return (ITR) Which ITR form to use (e.g., ITR-1, ITR-2, etc.) Documents required for filing Deadline for filing Refund status Last date income tax Return.</p>
							<div class="process-item__arrow" style="background-color: #f2718b;"><img src="./HomeTemplate/crypto/img/arrow.png" alt=""></div>
						</div>
					</div>
					<div class="col-sm-6 col-xl-3" >
						<div class="process-item" style="border: 3px solid #ff903e;">
							<div class="process-item__icon"><img src="./HomeTemplate/crypto/img/pr-icon-4.svg" alt=""></div>
							<div class="process-item__title">Pan Card
</div>
							<p>Apply for a new PAN card (India), Check PAN card status , Correction or update of PAN details , Link PAN with Aadhaar, Lost or duplicate PAN card, Documents required for PAN.</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="section data section--no-pad-top" id="token">
			<div class="container">
				<div class="row">
					
					<div class="col-lg-6">

						<div class="section-header section-header--tire section-header--medium-margin">
							<h4>Our data</h4>
							<h2>Aadhar Print Portal</h2>
						</div>

					</div>

				</div>
				<div class="row">
					<div class="col">

						<div class="data-progress" data-aos="fade-up">
							<div class="data-progress__item" style="box-shadow: 0 0 15px #16bf86; background-color: #16bf86; width: 50%;">
								<p><span>50%</span> - Distributed to community</p>
							</div>
							<div class="data-progress__item" style="box-shadow: 0 0 15px #5775cf; background-color: #5775cf; width: 25%;">
								<p><span>15%</span> - Team & Advisors</p>
							</div>
							<div class="data-progress__item" style="box-shadow: 0 0 15px #f2718b; background-color: #f2718b; width: 15%;">
								<p><span>15%</span> - Reserve</p>
							</div>
							<div class="data-progress__item" style="box-shadow: 0 0 15px #ff903e; background-color: #ff903e; width: 10%">
								<p><span>10%</span> - Bounty</p>
							</div>
						</div>

					</div>
				</div>
				<div class="row">
					<div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">

						<ul class="data__list">
							<li>
								<b>Name:</b>
								Ethereum ERC20
							</li>
							<li>
								<b>Purchase methods accepted:</b>
								BTC, ETH, LTC
							</li>
						</ul>

						<div class="data__info">
							<div class="data__info-item">
								Hard cap
								<b style="color: #16bf86;">24.000 ETH</b>
							</div>
							<div class="data__info-item">
								Soft cap
								<b style="color: #5775cf;">4.000 ETH</b>
							</div>
							<div class="data__info-item">
								Cost of 1 UBEX Token
								<b style="color: #f2718b;">0.00001 ETH</b>
							</div>
						</div>

						<ul class="data__list">
							<li>
								<b>New Token emissions: </b>
								Unavailable
							</li>
							<li>
								<b>Bonus system:</b>
								Yes
							</li>
							<li>
								<b>Presale of Private Sale:</b>
								Not held
							</li>
							<li>
								<b>Know Your Customer (KYC):</b>
								Yes
							</li>
							<li>
								<b>Min/Max Personal Cap:</b>
								0.01 ETH / No limit
							</li>
							<li>
								<b>Whitelist:</b>
								No
							</li>
						</ul>

						<a href="#" class="btn btn--blue btn--medium">Buy Tokens</a>

					</div>
					<div class="col-lg-6">
						<div class="data__images">
							<img class="data__images-bg" src="./HomeTemplate/crypto/img/bg_5.png" alt="">
							<div class="data__images-logo">
								<img src="./HomeTemplate/crypto/img/Logo_gradient.svg" alt="">
								<p>Cryptoland</p>
							</div>
						</div>
					</div>

				</div>
				<img src="./HomeTemplate/crypto/img/figure-pink.png" alt="" data-jarallax-element="-40" class="data__figure-1">
			</div>
		</section>

		<section id="docs" class="docs section" style="background-image: url(./HomeTemplate/crypto/img/ourfiles_bg.png);">
			<div class="container">
				<div class="row">
					<div class="col">

						<div class="section-header section-header--white section-header--center section-header--medium-margin">
							<h4>Our files</h4>
							<h2>Documents</h2>
						</div>

					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-6" data-aos="fade-left">
						<a href="#" download class="doc">
							<div class="doc__name">
								Terms & Conditions
							</div>
						</a>
					</div>
					<div class="col-lg-3 col-md-6" data-aos="fade-left" data-aos-delay="100">
						<a href="#" download class="doc">
							<div class="doc__name">
								White Pappers
							</div>
						</a>
					</div>
					<div class="col-lg-3 col-md-6"  data-aos="fade-left" data-aos-delay="200">
						<a href="#" download class="doc">
							<div class="doc__name">
								Privacy Policy
							</div>
						</a>
					</div>
					<div class="col-lg-3 col-md-6" data-aos="fade-left" data-aos-delay="300">
						<a href="#" download class="doc">
							<div class="doc__name">
								Business Profile
							</div>
						</a>
					</div>
				</div>
			</div>
		</section>

		<section class="section faq" id="faq">
			<div class="container">
				<img src="./HomeTemplate/crypto/img/figure-blue.png" alt="" data-jarallax-element="-40" class="faq__figure-1">
				<div class="row">
					<div class="col">
						<div class="section-header section-header--center section-header--medium-margin">
							<h4>FAQ</h4>
							<h2>Frequency Asked Questions</h2>
						</div>
		
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

		<section class="section team" id="team" style="background-image: url(./HomeTemplate/crypto/img/team_bg.png);">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="section-header section-header--tire section-header--white section-header--medium-margin">
							<h4>Our brain</h4>
							<h2>Awesome Team</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-xl-3 col-6" data-aos="fade-left" data-aos-delay="100">
						<div class="team-member">
							<img class="team-member__avatar" src="./HomeTemplate/crypto/img/ava1.png" alt="">
							<div class="team-member__content">
								<div class="team-member__name">David Drake</div>
								<div class="team-member__post">UI Designer</div>
								<ul class="team-member__social">
									<li><a href="#"><img src="./HomeTemplate/crypto/img/facebook.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/crypto/img/linkedin.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/crypto/img/google-plus.svg" alt=""></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-xl-3 col-6" data-aos="fade-left" data-aos-delay="200">
						<div class="team-member">
							<img class="team-member__avatar" src="./HomeTemplate/crypto/img/ava2.png" alt="">
							<div class="team-member__content">
								<div class="team-member__name">Allan Bellor</div>
								<div class="team-member__post">Analitics</div>
								<ul class="team-member__social">
									<li><a href="#"><img src="./HomeTemplate/crypto/img/facebook.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/crypto/img/linkedin.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/crypto/img/google-plus.svg" alt=""></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-xl-3 col-6" data-aos="fade-left" data-aos-delay="300">
						<div class="team-member">
							<img class="team-member__avatar" src="./HomeTemplate/crypto/img/ava3.png" alt="">
							<div class="team-member__content">
								<div class="team-member__name">Joe Doe</div>
								<div class="team-member__post">Tech Operation</div>
								<ul class="team-member__social">
									<li><a href="#"><img src="./HomeTemplate/crypto/img/facebook.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/crypto/img/linkedin.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/crypto/img/google-plus.svg" alt=""></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-xl-3 col-6" data-aos="fade-left" data-aos-delay="400">
						<div class="team-member">
							<img class="team-member__avatar" src="./HomeTemplate/crypto/img/ava4.png" alt="">
							<div class="team-member__content">
								<div class="team-member__name">Sam Tolder</div>
								<div class="team-member__post">CEO</div>
								<ul class="team-member__social">
									<li><a href="#"><img src="./HomeTemplate/crypto/img/facebook.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/crypto/img/linkedin.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/crypto/img/google-plus.svg" alt=""></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-xl-3 col-6" data-aos="fade-left" data-aos-delay="500">
						<div class="team-member">
							<img class="team-member__avatar" src="./HomeTemplate/crypto/img/ava5.png" alt="">
							<div class="team-member__content">
								<div class="team-member__name">Henry Polar</div>
								<div class="team-member__post">SEO Specialist</div>
								<ul class="team-member__social">
									<li><a href="#"><img src="./HomeTemplate/crypto/img/facebook.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/crypto/img/linkedin.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/crypto/img/google-plus.svg" alt=""></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-xl-3 col-6" data-aos="fade-left" data-aos-delay="600">
						<div class="team-member">
							<img class="team-member__avatar" src="./HomeTemplate/crypto/img/ava6.png" alt="">
							<div class="team-member__content">
								<div class="team-member__name">Sandra Pen</div>
								<div class="team-member__post">Humar Resources</div>
								<ul class="team-member__social">
									<li><a href="#"><img src="./HomeTemplate/crypto/img/facebook.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/crypto/img/linkedin.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/crypto/img/google-plus.svg" alt=""></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-xl-3 col-6" data-aos="fade-left" data-aos-delay="700">
						<div class="team-member">
							<img class="team-member__avatar" src="./HomeTemplate/crypto/img/ava7.png" alt="">
							<div class="team-member__content">
								<div class="team-member__name">Linda Gampton</div>
								<div class="team-member__post">UX Team Lead</div>
								<ul class="team-member__social">
									<li><a href="#"><img src="./HomeTemplate/crypto/img/facebook.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/crypto/img/linkedin.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/crypto/img/google-plus.svg" alt=""></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-xl-3 col-6" data-aos="fade-left" data-aos-delay="800">
						<div class="team-member">
							<img class="team-member__avatar" src="./HomeTemplate/crypto/img/ava8.png" alt="">
							<div class="team-member__content">
								<div class="team-member__name">John Smith</div>
								<div class="team-member__post">General Director</div>
								<ul class="team-member__social">
									<li><a href="#"><img src="./HomeTemplate/crypto/img/facebook.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/crypto/img/linkedin.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/crypto/img/google-plus.svg" alt=""></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-xl-3 col-6" data-aos="fade-left" data-aos-delay="900">
						<div class="team-member">
							<img class="team-member__avatar" src="./HomeTemplate/crypto/img/ava9.png" alt="">
							<div class="team-member__content">
								<div class="team-member__name">Sam Oldrich</div>
								<div class="team-member__post">Manager</div>
								<ul class="team-member__social">
									<li><a href="#"><img src="./HomeTemplate/crypto/img/facebook.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/crypto/img/linkedin.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/crypto/img/google-plus.svg" alt=""></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-xl-3 col-6" data-aos="fade-left" data-aos-delay="1000">
						<div class="team-member">
							<img class="team-member__avatar" src="./HomeTemplate/crypto/img/ava10.png" alt="">
							<div class="team-member__content">
								<div class="team-member__name">Denis Portlen</div>
								<div class="team-member__post">Programmer</div>
								<ul class="team-member__social">
									<li><a href="#"><img src="./HomeTemplate/crypto/img/facebook.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/crypto/img/linkedin.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/crypto/img/google-plus.svg" alt=""></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-xl-3 col-6" data-aos="fade-left" data-aos-delay="1100">
						<div class="team-member">
							<img class="team-member__avatar" src="./HomeTemplate/crypto/img/ava11.png" alt="">
							<div class="team-member__content">
								<div class="team-member__name">Den Miller</div>
								<div class="team-member__post">Economist</div>
								<ul class="team-member__social">
									<li><a href="#"><img src="./HomeTemplate/crypto/img/facebook.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/crypto/img/linkedin.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/crypto/img/google-plus.svg" alt=""></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-xl-3 col-6" data-aos="fade-left" data-aos-delay="1100">
						<div class="team-member">
							<img class="team-member__avatar" src="./HomeTemplate/crypto/img/ava12.png" alt="">
							<div class="team-member__content">
								<div class="team-member__name">Brawn Lee</div>
								<div class="team-member__post">Journalist</div>
								<ul class="team-member__social">
									<li><a href="#"><img src="./HomeTemplate/crypto/img/facebook.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/crypto/img/linkedin.svg" alt=""></a></li>
									<li><a href="#"><img src="./HomeTemplate/crypto/img/google-plus.svg" alt=""></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="section advisors">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="section-header section-header--center section-header--medium-margin">
							<h4>Family</h4>
							<h2>Advisors</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6" data-aos="fade-right" data-aos-delay="100">
						<div class="advisor">
							<a href="#" class="advisor__img">
								<img src="./HomeTemplate/crypto/img/advisor-avatar-1.jpg" alt="">
								<div class="advisor__sn">
									<img src="./HomeTemplate/crypto/img/facebook.svg" alt="">
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

					<div class="col-md-6" data-aos="fade-left" data-aos-delay="200">
						<div class="advisor">
							<a href="#" class="advisor__img">
								<img src="./HomeTemplate/crypto/img/advisor-avatar-2.png" alt="">
								<div class="advisor__sn">
									<img src="./HomeTemplate/crypto/img/linkedin.svg" alt="">
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

					<div class="col-md-6" data-aos="fade-right" data-aos-delay="300">
						<div class="advisor">
							<a href="#" class="advisor__img">
								<img src="./HomeTemplate/crypto/img/advisor-avatar-3.jpg" alt="">
								<div class="advisor__sn">
									<img src="./HomeTemplate/crypto/img/google-plus.svg" alt="">
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

					<div class="col-md-6" data-aos="fade-left" data-aos-delay="400">
						<div class="advisor">
							<a href="#" class="advisor__img">
								<img src="./HomeTemplate/crypto/img/advisor-avatar-4.jpg" alt="">
								<div class="advisor__sn">
									<img src="./HomeTemplate/crypto/img/facebook.svg" alt="">
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
				<img src="./HomeTemplate/crypto/img/figure-blue.png" alt="" data-jarallax-element="-40" class="advisors__figure-2">
				<img src="./HomeTemplate/crypto/img/figure-pink.png" alt="" data-jarallax-element="-40" class="advisors__figure-1">
			</div>
		</section>

		<section class="press section--no-pad-top section">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="section-header section-header--center section-header--medium-margin">
							<h4>Press About us</h4>
							<h2>Press About Cryptoland</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-12 col-sm-6">
						<a href="#" class="press__item" data-aos="flip-left" data-aos-delay="200">
							<div class="press__item-bg"></div>
							<img src="./HomeTemplate/crypto/img/Logo_1.png" alt="">
						</a>
					</div>
					<div class="col-lg-3 col-12 col-sm-6">
						<a href="#" class="press__item" data-aos="flip-left" data-aos-delay="300">
							<div class="press__item-bg"></div>
							<img src="./HomeTemplate/crypto/img/Logo_2.png" alt="">
						</a>
					</div>
					<div class="col-lg-3 col-12 col-sm-6">
						<a href="#" class="press__item" data-aos="flip-left" data-aos-delay="400">
							<div class="press__item-bg"></div>
							<img src="./HomeTemplate/crypto/img/Logo_3.png" alt="">
						</a>
					</div>
					<div class="col-lg-3 col-12 col-sm-6">
						<a href="#" class="press__item" data-aos="flip-left" data-aos-delay="500">
							<div class="press__item-bg"></div>
							<img src="./HomeTemplate/crypto/img/Logo_4.png" alt="">
						</a>
					</div>
				</div>
			</div>
		</section>

		<section class="news">
			<img src="./HomeTemplate/crypto/img/bg_6.png" alt="" class="news__bg">
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
				<img src="./HomeTemplate/crypto/img/figure-blue.png" alt="" data-jarallax-element="-40" class="news__figure-1">
			</div>
		</section>

		<section class="section partners">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="section-header section-header--animated section-header--tire section-header--medium-margin">
							<h4>Our friends</h4>
							<h2>Partners</h2>
						</div>

						<div class="logoes">
							<div>
								<img src="./HomeTemplate/crypto/img/partners-logo-1.png" alt="">		
							</div>
							<div>
								<img src="./HomeTemplate/crypto/img/partners-logo-2.png" alt="">
							</div>
							<div>
								<img src="./HomeTemplate/crypto/img/partners-logo-3.png" alt="">
							</div>
							<div>
								<img src="./HomeTemplate/crypto/img/partners-logo-4.png" alt="">
							</div>
							<div>
								<img src="./HomeTemplate/crypto/img/partners-logo-5.png" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="section contact" style="background-image: url(./HomeTemplate/crypto/img/footer_bg.png);">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="section-header section-header--white section-header--center section-header--medium-margin">
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
		</section>

		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-12">
						<a href="#" class="logo">
						<img class="" width="150px" src="<?php ahkweb('logo'); ?>" alt="">
						</a>
						<div class="copyright">© <?php  echo date('Y');?>, <?php ahkweb('webname'); ?> </div>
					</div>
					<div class="col-lg-3 col-md-6">
						<ul class="footer-menu">
							<li class="footer-menu__item">
								<a href="#" class="footer-menu__link">About</a>
							</li>
							<li class="footer-menu__item">
								<a href="#" class="footer-menu__link">Services</a>
							</li>
							<li class="footer-menu__item">
								<a href="#" class="footer-menu__link">Road Map</a>
							</li>
							<li class="footer-menu__item">
								<a href="#" class="footer-menu__link">Statistic</a>
							</li>
							<li class="footer-menu__item">
								<a href="#" class="footer-menu__link">Token</a>
							</li>
							<li class="footer-menu__item">
								<a href="#" class="footer-menu__link">WhitePappers</a>
							</li>
							<li class="footer-menu__item">
								<a href="#" class="footer-menu__link">Team</a>
							</li>
							<li class="footer-menu__item">
								<a href="#" class="footer-menu__link">FAQ</a>
							</li>
						</ul>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="social-block">
							<div class="social-block__title">
								Join our community
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
							</ul>
						</div>
					</div>
					<div class="col-lg-4 col-md-12">
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

	<script>window.jQuery || document.write('<script src="./HomeTemplate/crypto/js/jquery-2.2.4.min.html"><\/script>')</script>
	
	<script src="./HomeTemplate/crypto/js/scripts.min.js"></script>

</body>

</html>
