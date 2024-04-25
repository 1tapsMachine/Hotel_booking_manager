<!DOCTYPE html>
<html lang="en">
	<head>
		<title>AgileSphere</title>
		<!-- Meta -->
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta
			name="description"
			content="Bootstrap 5 page template for developers and startups"
		/>
		<meta name="author" content="Xiaoying Riley at 3rd Wave Media" />
		<link rel="shortcut icon" href="favicon.ico" />
		<link
			href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
			rel="stylesheet"
			type="text/css"
		/>
		<!-- FontAwesome JS-->
		<script defer src="assets/fontawesome/js/all.min.js"></script>
		<!-- Global CSS -->
		<link
			rel="stylesheet"
			href="assets/plugins/bootstrap/css/bootstrap.min.css"
		/>
		<!-- Theme CSS -->
		<link id="theme-style" rel="stylesheet" href="assets/css/styles.css" />
	</head>

	<body>
		<!-- ******HEADER****** -->
		<header id="header" class="header">
			<nav class="main-nav navbar-expand-md" role="navigation">
				<div class="container-fluid position-relative">
					<a class="logo navbar-brand scrollto" href="#hero">
						<span class="logo-icon-wrapper"
							><img
								class="logo-icon"
								src="assets/images/logo-icon.svg"
								alt="icon"
						/></span>
						<span class="text"><span class="highlight">AGILE</span>SPHERE</span>
					</a>
					<!--//logo-->

					<button
						class="navbar-toggler"
						type="button"
						data-bs-toggle="collapse"
						data-bs-target="#navbar-collapse"
						aria-controls="navbar-collapse"
						aria-expanded="false"
						aria-label="Toggle navigation"
					>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span></button
					><!--//nav-toggle-->

					<div id="navbar-collapse" class="navbar-collapse collapse">
						<ul class="nav navbar-nav ms-md-auto">
							<li class="nav-item">
								<a class="nav-link scrollto" href="#about">About</a>
							</li>
							<li class="nav-item">
								<a class="nav-link scrollto" href="#testimonials"
									>Testimonials</a
								>
							</li>
							<li class="nav-item">
								<a class="nav-link scrollto" href="#features">Features</a>
							</li>
							<li class="nav-item">
								<a class="nav-link scrollto" href="#team">Team</a>
							</li>
							<li class="nav-item">
								<a class="nav-link scrollto" href="#pricing">Login</a>
							</li>
							<li class="nav-item">
								<a class="nav-link scrollto" href="#contact">Contact</a>
							</li>
						</ul>
						<!--//nav-->
					</div>
					<!--//navabr-collapse-->
				</div>
				<!--//container-->
			</nav>
			<!--//main-nav-->
		</header>
		<!--//header-->

		<div id="hero" class="hero-section">
			<div
				id="hero-carousel"
				class="hero-carousel carousel carousel-fade slide"
				data-bs-ride="carousel"
				data-bs-interval="10000"
			>
				<div class="figure-holder-wrapper">
					<div class="container">
						<div class="row justify-content-end">
							<div class="figure-holder">
								<img
									class="figure-image img-fluid"
									src="assets/images/imac.png"
									alt="image"
								/>
							</div>
							<!--//figure-holder-->
						</div>
						<!--//row-->
					</div>
					<!--//container-->
				</div>
				<!--//figure-holder-wrapper-->

				<!-- Indicators -->
				<div class="carousel-indicators">
					<button
						type="button"
						class="active"
						data-bs-slide-to="0"
						data-bs-target="#hero-carousel"
						aria-current="true"
						aria-label="Slide 1"
					></button>
					<button
						type="button"
						data-bs-slide-to="1"
						data-bs-target="#hero-carousel"
						aria-label="Slide 2"
					></button>
					<button
						type="button"
						data-bs-slide-to="2"
						data-bs-target="#hero-carousel"
						aria-label="Slide 3"
					></button>
				</div>

				<!-- Wrapper for slides -->
				<div class="carousel-inner">
					<div class="carousel-item item-1 active">
						<div class="item-content container">
							<div class="item-content-inner">
								<h2 class="heading">
									AgileSphere is a dynamic project management platform
									<br class="d-none d-md-block" />
									engineered to revolutionize the way teams collaborate plan,
									and execute projects.
									<h2 class="heading">
										<br class="d-none d-md-block" />
									</h2>
								</h2>
								<p class="intro">
									AgileSphere streamlines complex workflows, promoting
									transparency, flexibility, and efficiency across projects.
								</p>
								<a class="btn btn-primary btn-cta" href="#pricing">Login Now</a>
							</div>
							<!--//item-content-inner-->
						</div>
						<!--//item-content-->
					</div>
					<!--//item-->

					<div class="carousel-item item-2">
						<div class="item-content container">
							<div class="item-content-inner">
								<h2 class="heading">You love efficacity?</h2>
								<p class="intro">
									AgileSphere embodies efficacy at its core. It's designed to
									streamline processes and maximize productivity, ensuring
									projects are delivered with optimal efficiency.
								</p>
								<a class="btn btn-primary btn-cta" href="#about"
									>Find out more</a
								>
							</div>
							<!--//item-content-inner-->
						</div>
					</div>
					<!--//item-->

					<div class="carousel-item item-3">
						<div class="item-content container">
							<div class="item-content-inner">
								<h2 class="heading">Ready to build outstanding product?</h2>
								<p class="intro">
									Get AgileSphere today and it will help you promote your
									product effectively!
								</p>
								<a class="btn btn-primary btn-cta" href="#features" target=""
									>See it features</a
								>
							</div>
							<!--//item-content-inner-->
						</div>
					</div>
					<!--//item-->
				</div>
				<!--//carousel-inner-->
			</div>
			<!--//carousel-->
		</div>
		<!--//hero-->

		<div id="about" class="about-section">
			<div class="container text-center">
				<h2 class="section-title">Why Use AgileSphere?</h2>
				<p class="intro">
					AgileSphere uses modern front-end technologies and is packed with
					useful components and widgets to speed up your development
				</p>
				<ul class="technologies list-inline">
					<li class="list-inline-item">
						<img src="assets/images/logo-html5.svg" alt="HTML5" />
					</li>
					<li class="list-inline-item">
						<img src="assets/images/logo-css3.svg" alt="CSS3" />
					</li>
					<li class="list-inline-item">
						<img src="assets/images/logo-bootstrap.svg" alt="Bootstrap" />
					</li>
					<li class="list-inline-item">
						<img src="assets/images/logo-js.svg" alt="JavaScript" />
					</li>
					<li class="list-inline-item">
						<img src="assets/images/logo-sass.svg" alt="Sass" />
					</li>
				</ul>

				<div class="items-wrapper row">
					<div class="item col-md-4 col-12">
						<div class="item-inner">
							<div class="figure-holder">
								<img
									class="figure-image"
									src="assets/images/figure-1.png"
									alt="image"
								/>
							</div>
							<!--//figure-holder-->
							<h3 class="item-title">Simple design</h3>
							<div class="item-desc mb-3">
								Agile Sphere is designed with simplicity in mind to ensure ease
								of use and a seamless user experience.
							</div>
							<!--//item-desc-->
							<a class="btn btn-primary" href="#features">Find out more</a>
						</div>
						<!--//item-inner-->
					</div>
					<!--//item-->
					<div class="item col-md-4 col-12">
						<div class="item-inner">
							<div class="figure-holder">
								<img
									class="figure-image"
									src="assets/images/figure-2.png"
									alt="image"
								/>
							</div>
							<!--//figure-holder-->
							<h3 class="item-title">Facilites time management</h3>
							<div class="item-desc mb-3">
								AgileSphere helps you manage your time effectively, ensuring you
								meet your project deadlines.
							</div>
							<!--//item-desc-->
							<a class="btn btn-primary" href="#features">Find out more</a>
						</div>
						<!--//item-inner-->
					</div>
					<!--//item-->
					<div class="item col-md-4 col-12">
						<div class="item-inner">
							<div class="figure-holder">
								<img
									class="figure-image"
									src="assets/images/figure-3.png"
									alt="image"
								/>
							</div>
							<!--//figure-holder-->
							<h3 class="item-title">Access from any platform</h3>
							<div class="item-desc mb-3">
								AgileSphere is fully responsive and can be accessed from any
								device, ensuring you can work on the go.
							</div>
							<!--//item-desc-->
							<a class="btn btn-primary" href="#features">Find out more</a>
						</div>
						<!--//item-inner-->
					</div>
					<!--//item-->
				</div>
				<!--//items-wrapper-->
			</div>
			<!--//container-->
		</div>
		<!--//about-section-->

		<div id="testimonials" class="testimonials-section">
			<div class="container">
				<h2 class="section-title text-center">Many Happy Customers</h2>
				<div class="item mx-auto">
					<div class="profile-holder">
						<img
							class="profile-image"
							src="assets/images/profile-1.png"
							alt="profile"
						/>
					</div>
					<div class="quote-holder">
						<blockquote class="quote">
							<p>
								Agile Sphere is a great tool for managing projects. It's
								efficient, easy to use, and has helped me stay on top of my
								workload.
							</p>

							<div class="quote-source">
								<span class="name">@JohnK,</span>
								<span class="meta">San Francisco</span>
							</div>
							<!--//quote-source-->
						</blockquote>
					</div>
					<!--//quote-holder-->
				</div>
				<!--//item-->
				<div class="item item-reversed mx-auto">
					<div class="profile-holder">
						<img
							class="profile-image"
							src="assets/images/profile-2.png"
							alt="profile"
						/>
					</div>
					<div class="quote-holder">
						<blockquote class="quote">
							<p>
								Agile Sphere has been a game-changer for me. It's helped me
								manage my projects more effectively and has saved me a lot of
								time.
							</p>
							<div class="quote-source">
								<span class="name">@LisaWhite,</span>
								<span class="meta">London</span>
							</div>
							<!--//quote-source-->
						</blockquote>
					</div>
					<!--//quote-holder-->
				</div>
				<!--//item-->
				<div class="item mx-auto">
					<div class="profile-holder">
						<img
							class="profile-image"
							src="assets/images/profile-3.png"
							alt="profile"
						/>
					</div>
					<div class="quote-holder">
						<blockquote class="quote">
							<p>
								Im grateful for Agile Sphere. It has helped me stay organized
								and on top of my projects. I highly recommend it to anyone
								looking to improve their project management skills.
							</p>
							<div class="quote-source">
								<span class="name">@MattH,</span>
								<span class="meta">Berlin</span>
							</div>
							<!--//quote-source-->
						</blockquote>
					</div>
					<!--//quote-holder-->
				</div>
				<!--//item-->
				<div class="item item-reversed mx-auto">
					<div class="profile-holder">
						<img
							class="profile-image"
							src="assets/images/profile-4.png"
							alt="profile"
						/>
					</div>
					<div class="quote-holder">
						<blockquote class="quote">
							<p>
								Thanks to the devlopers of Agile Sphere. It's a fantastic tool
								that has helped me manage my projects more effectively. I
								couldn't be happier with it.
							</p>
							<div class="quote-source">
								<span class="name">@RyanW,</span>
								<span class="meta">Paris</span>
							</div>
							<!--//quote-source-->
						</blockquote>
					</div>
					<!--//quote-holder-->
				</div>
				<!--//item-->
				<div class="text-center mt-4">
					<a class="btn btn-inverse btn-cta" href="#pricing">Get it now</a>
				</div>
			</div>
			<!--//container-->
		</div>
		<!--//testimonials-->

		<div id="features" class="features-section">
			<div class="container text-center">
				<h2 class="section-title">Discover Features</h2>
				<p class="intro">
					AgileSphere is packed with useful features and components to help you
					build your project faster and more efficiently.
				</p>

				<div class="tabbed-area row">
					<!-- Nav tabs -->
					<div
						class="feature-nav nav nav-pill flex-column col-lg-4 col-md-6 col-12 order-0 order-md-1"
						role="tablist"
						aria-orientation="vertical"
					>
						<a
							class="nav-link active mb-lg-3"
							href="#feature-1"
							aria-controls="feature-1"
							data-bs-toggle="pill"
							role="tab"
							aria-selected="true"
							><i class="fa-solid fa-magic me-2"></i>20+ Use Case-based App
							Pages</a
						>
						<a
							class="nav-link mb-lg-3"
							href="#feature-2"
							aria-controls="feature-2"
							data-bs-toggle="pill"
							role="tab"
							aria-selected="false"
							><i class="fa-solid fa-cubes me-2"></i>100+ Components and
							Widgets</a
						>
						<a
							class="nav-link mb-lg-3"
							href="#feature-3"
							aria-controls="feature-3"
							data-bs-toggle="pill"
							role="tab"
							aria-selected="false"
							><i class="fa-solid fa-chart-bar me-2"></i>Useful Chart
							Libraries</a
						>
						<a
							class="nav-link mb-lg-3"
							href="#feature-4"
							aria-controls="feature-4"
							data-bs-toggle="pill"
							role="tab"
							aria-selected="false"
							><i class="fa-solid fa-code me-2"></i>Valid HTML5 + CSS3</a
						>
						<a
							class="nav-link mb-lg-3"
							href="#feature-5"
							aria-controls="feature-5"
							data-bs-toggle="pill"
							role="tab"
							aria-selected="false"
							><i class="fa-solid fa-rocket me-2"></i>Built on Bootstrap 5 &amp;
							SCSS</a
						>
						<a
							class="nav-link mb-lg-3"
							href="#feature-6"
							aria-controls="feature-6"
							data-bs-toggle="pill"
							role="tab"
							aria-selected="false"
							><i class="fa-solid fa-mobile-alt me-2"></i>Fully Responsive</a
						>
						<a
							class="nav-link mb-lg-3"
							href="#feature-7"
							aria-controls="feature-7"
							data-bs-toggle="pill"
							role="tab"
							aria-selected="false"
							><i class="fa-solid fa-star me-2"></i>Beautiful UI</a
						>
						<a
							class="nav-link mb-lg-3"
							href="#feature-8"
							aria-controls="feature-8"
							data-bs-toggle="pill"
							role="tab"
							aria-selected="false"
							><i class="fa-solid fa-heart me-2"></i>Free Updates &amp;
							Support</a
						>
					</div>

					<!-- Tab panes -->
					<div
						class="feature-content tab-content col-lg-8 col-md-6 col-12 order-1 order-md-0"
					>
						<div
							role="tabpanel"
							class="tab-pane fade show active"
							id="feature-1"
						>
							<a href="" target="_blank"
								><img
									class="img-fluid"
									src="assets/images/feature-1.png"
									alt="screenshot"
							/></a>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="feature-2">
							<a href="" target="_blank"
								><img
									class="img-fluid"
									src="assets/images/feature-2.png"
									alt="screenshot"
							/></a>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="feature-3">
							<a href="" target="_blank"
								><img
									class="img-fluid"
									src="assets/images/feature-3.png"
									alt="screenshot"
							/></a>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="feature-4">
							<a href="" target="_blank"
								><img
									class="img-fluid"
									src="assets/images/feature-4.png"
									alt="screenshot"
							/></a>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="feature-5">
							<a href="" target="_blank"
								><img
									class="img-fluid"
									src="assets/images/feature-5.png"
									alt="screenshot"
							/></a>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="feature-6">
							<a href="" target="_blank"
								><img
									class="img-fluid"
									src="assets/images/feature-6.png"
									alt="screenshot"
							/></a>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="feature-7">
							<a href="" target="_blank"
								><img
									class="img-fluid"
									src="assets/images/feature-7.png"
									alt="screenshot"
							/></a>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="feature-8">
							<a href="" target="_blank"
								><img
									class="img-fluid"
									src="assets/images/feature-8.png"
									alt="screenshot"
							/></a>
						</div>
					</div>
					<!--//feature-content-->
				</div>
				<!--//tabbed-area-->
			</div>
			<!--//container-->
		</div>
		<!--//features-->

		<div class="team-section" id="team">
			<div class="container text-center">
				<h2 class="section-title">The Team</h2>
				<div class="story">
					<p>
						I dedicatd my time to this project to ensure it meets the needs of
						developers and startups. I hope you find it useful and enjoyable to
						use. If you have any questions or feedback, please don't hesitate to
						get in touch.
					</p>
				</div>
				<div class="members-wrapper row flex justify-content-center">
					<div class="item col-md-6 col-12">
						<div class="item-inner">
							<div class="profile mb-3">
								<img
									class="profile-image"
									src="assets/images/team-1.png"
									alt="image"
								/>
							</div>

							<div class="member-content">
								<h3 class="member-name">Aziz SAM</h3>
								<div class="member-title">
									Fullstack devloper / Desktop app devloper
								</div>
								<ul class="social list-inline">
									<li class="list-inline-item">
										<a
											class="twitter"
											href="https://twitter.com/10kFbi"
											target="_blank"
											><i class="fab fa-twitter"></i
										></a>
									</li>
									<li class="list-inline-item">
										<a
											class="linkedin"
											href="https://www.linkedin.com/in/aziz-sami-53ab46278/"
											target="_blank"
											><i class="fa-brands fa-linkedin-in"></i
										></a>
									</li>
									<li class="list-inline-item">
										<a
											class="github"
											href="https://github.com/1tapsMachine"
											target="_blank"
											><i class="fab fa-github"></i
										></a>
									</li>
								</ul>
								<div class="member-desc">
									<p>
										I'm a full-stack developer with a passion for building
										innovative web and desktop applications. I'm always looking
										for new challenges and opportunities to learn. You can take
										a look at my work on
										<a href="https://github.com/1tapsMachine">Github</a>
										or follow me on
										<a href="https://twitter.com/10kFbi">Twitter</a>
										if you want to know more about me.
									</p>
								</div>
								<!--//member-desc-->
							</div>
							<!--//member-content-->
						</div>
						<!--//item-inner-->
					</div>
				</div>
				<!--//members-wrapper-->
				<div class="text-center mt-5">
					<a class="btn btn-cta btn-primary" href="https://twitter.com/10kFbi"
						>Contact Us</a
					>
				</div>
			</div>
		</div>
		<!--//team-section-->

		<div id="pricing" class="pricing-section">
			<div class="container text-center">
				<h2 class="section-title">Login</h2>
				<div class="intro">AgileSphere's future updates are 100% FREE</div>
				<div class="pricing-wrapper row justify-content-center">
					<div class="item item-1 col-md-4 col-12">
						<div class="item-inner">
							<h3 class="item-heading">
								AgileSphere Account
							</h3>
							<div class="price-figure">
								<span class="number">FREE</span>
							</div>
							<!--//price-figure-->
							<ul class="list-unstyled mb-3">
								<li class="mb-2">
									<i class="fa-solid fa-check"></i> Track tasks and projects in real-time
								</li>
								<li class="mb-2">
									<i class="fa-solid fa-check"></i> Efficient task management
								</li>
								<li class="mb-2">
									<i class="fa-solid fa-check"></i> User-friendly interface
								</li>
							</ul>
							<a class="btn btn-inverse btn-cta" href="/login">Get in now</a>
						</div>
						<!--//item-inner-->
					</div>
					<!--//item-->
				</div>
				<!--//pricing-wrapper-->
			</div>
			<!--//container-->
		</div>		<!--//pricing-section-->
		<div id="contact" class="contact-section">
			<div class="container text-center">
				<h2 class="section-title">Contact Us</h2>
				<div class="contact-content">
					<p>
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean
						commodo ligula eget dolor. Aenean massa. Cum sociis natoque
						penatibus et magnis dis parturient montes, nascetur ridiculus mus.
						Donec quam felis.
					</p>
				</div>
				<a class="btn btn-cta btn-primary" href="">Get in Touch</a>
			</div>
			<!--//container-->
		</div>
		<!--//contact-section-->

		<footer class="footer text-center">
			<div class="footer-content">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<h3 class="footer-title">About Us</h3>
							<p>
								AgileSphere is a dynamic project management platform engineered
								to revolutionize the way teams collaborate, plan, and execute
								projects.
							</p>
						</div>
						<div class="col-md-4">
							<h3 class="footer-title">Contact Us</h3>
							<p>
								Email: <a href="mailto:aziz.sami_business@outlook.com">
									aziz.sami_business@outlook.com
								</a>
							</p>
						</div>
						<div class="col-md-4">
							<h3 class="footer-title">Follow Us</h3>
							<ul class="social list-inline">
								<li class="list-inline-item">
									<a
										class="twitter"
										href="https://twitter.com/10kFbi"
										target="_blank"
										><i class="fab fa-twitter"></i
									></a>
								</li>
								<li class="list-inline-item">
									<a
										class="linkedin"
										href="https://www.linkedin.com/in/aziz-sami-53ab46278/"
										target="_blank"
										><i class="fa-brands fa-linkedin-in"></i
									></a>
								</li>
								<li class="list-inline-item">
									<a
										class="github"
										href="https://github.com/1tapsMachine"
										target="_blank"
										><i class="fab fa-github"></i
									></a>
								</li>
							</ul>
						</div>
		</footer>

		<!-- Javascript -->
		<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="assets/plugins/gumshoe/gumshoe.polyfills.min.js"></script>
		<script src="assets/js/main.js"></script>
	</body>
</html>
