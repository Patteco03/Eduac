<!DOCTYPE HTML>
<html>
<head><meta name="viewport" content="width=device-width"/>
	<title>Plataforma de Ensino Eduac</title>
<!-- STYLES & JQUERY 
	================================================== -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/site/"?>css/style.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/site/"?>css/icons.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/site/"?>css/slider.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/site/"?>css/skinblue.css"/><!-- change skin color -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/site/"?>css/responsive.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/site/"?>css/site.css"/>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/site/"?>css/bootstrap.min.css"/>
	<script src="<?php echo base_url()."assets/site/" ?>js/jquery-1.9.0.min.js"></script><!-- the rest of the scripts at the bottom of the document -->



</head>
<body>
<!-- TOP LOGO & MENU
	================================================== -->
	<div class="grid">
		<div class="row space-bot">
			<!--Logo-->
			<div class="c4">
				<a href="<?php echo site_url('') ;?>">
					<img class="img-responsive logo" src="<?php echo base_url('assets/images/logoedu-mini.png') ?>" class="logo" alt="" >
				</a>
			</div>
			<!--Menu-->
			<div class="c8">
				<nav id="topNav">
					<ul id="responsivemenu">
						<li class="active"><a href="<?php echo site_url('') ;?>"><i class="icon-home homeicon"></i><span class="showmobile">Home</span></a></li>
						<li><a href="<?php echo site_url('page/nossosprecos') ?>">Nossos Preços</a>
                        <li><a href="<?php echo site_url('page/lojacurso') ?>">Como Funciona ?</a>
						</li>
						<li><a href="#">Sobre</a>
							<ul style="display: none;">					
								<li><a href="team.html">Team</a></li>
								<li><a href="pricing.html">Pricing Tables</a></li>
								<li><a href="columns.html">Columns</a></li>
								<li><a href="rightsidebar.html">Right Sidebar</a></li>
								<li><a href="leftsidebar.html">Left Sidebar</a></li>					

							</ul>
						</li>
						<li><a href="#">Consultória</a>
							<ul>
								<li><a href="portfolio2.html">Two Columns</a></li>
								<li><a href="portfolio3.html">Three Columns</a></li>
								<li><a href="portfolio4.html">Four Columns</a></li>
								<li><a href="portfolio5.html">Five Columns</a></li>					
								<li><a href="portfolio-masonry3.html">Three Masonry</a></li>
								<li><a href="portfolio-masonry4.html">Four Masonry</a></li>
								<li><a href="portfolio-masonry5.html">Five Masonry</a></li>					
								<li><a href="singleproject.html">Project Details</a></li>
							</ul>
						</li>				
						<li class="last"><a href="<?php echo site_url('page/contact') ;?>">CONTATO</a></li>

					</ul>
				</nav>
			</div>
		</div>
	</div>

	<div>
		<div class="shadowundertop"></div>
		{MENSAGEM_SISTEMA_ERRO}
		{MENSAGEM_SISTEMA_SUCESSO}
		{CONTEUDO}
	</div>

<!-- FOOTER
	================================================== -->
	<div id="wrapfooter">
		<div class="grid">
			<div class="row" id="footer">
				<!-- to top button  -->
				<p class="back-top floatright">
					<a href="#top"><span></span></a>
				</p>
				<!-- 1st column -->
				<div class="c3">
					<img class="img-responsive" src="<?php echo base_url('assets/images/logoed.png') ?>" style="padding-top: 70px;" alt="">
				</div>
				<!-- 2nd column -->
				<div class="c3">
					<h2 class="title"><i class="icon-twitter"></i> Follow us</h2>
					<hr class="footerstress">
					<div id="ticker" class="query">
					</div>
				</div>
				<!-- 3rd column -->
				<div class="c3">
					<h2 class="title"><i class="icon-envelope-alt"></i> Contact</h2>
					<hr class="footerstress">
					<dl>
						<dt>2536 Zamora Road, Missisipi, 74C</dt>
						<dd><span>Telephone:</span>+1 348 271 9483</dd>
						<dd>E-mail: <a href="more.html">mail@yourweb.com</a></dd>
					</dl>
					<ul class="social-links" style="margin-top:15px;">
						<li class="twitter-link smallrightmargin">
							<a href="#" class="twitter has-tip" target="_blank" title="Follow Us on Twitter">Twitter</a>
						</li>
						<li class="facebook-link smallrightmargin">
							<a href="#" class="facebook has-tip" target="_blank" title="Join us on Facebook">Facebook</a>
						</li>
						<li class="google-link smallrightmargin">
							<a href="#" class="google has-tip" title="Google +" target="_blank">Google</a>
						</li>
						<li class="linkedin-link smallrightmargin">
							<a href="#" class="linkedin has-tip" title="Linkedin" target="_blank">Linkedin</a>
						</li>
						<li class="pinterest-link smallrightmargin">
							<a href="#" class="pinterest has-tip" title="Pinterest" target="_blank">Pinterest</a>
						</li>
					</ul>
				</div>
				<!-- 4th column -->
				<div class="c3">
					<h2 class="title"><i class="icon-link"></i> Links</h2>
					<hr class="footerstress">
					<ul>
						<li>Services</li>
						<li>Privacy Policy</li>
						<li>Shortcodes</li>
						<li>Columns</li>
						<li>Portfolio</li>
						<li>Blog</li>
						<li>Contact</li>
						<li>Font Awesome</li>
						<li>Single Project</li>
						<li>Home</li>
					</ul>
				</div>
				<!-- end 4th column -->
			</div>
		</div>
	</div>
	<!-- copyright area -->
	<div class="copyright">
		<div class="grid">
			<div class="row">
				<div class="c6">
					Eduac &copy; 2018. Todos os direitos Reservados.
				</div>
				<div class="c6">
					<span class="right">
					by Eduac </span>
				</div>
			</div>
		</div>
	</div>

	<input type="hidden" id="siteURL" class="siteURL" name="siteURL" value="<?php echo site_url() ;?> ">
	<!-- END CONTENT AREA -->
<!-- JAVASCRIPTS
	================================================== -->
	<!-- all -->
	<script src="<?php echo base_url()."assets/site/" ?>js/modernizr-latest.js"></script>

	<!-- menu & scroll to top -->
	<script src="<?php echo base_url()."assets/site/" ?>js/common.js"></script>

	<!-- slider -->
	<script src="<?php echo base_url()."assets/site/" ?>js/jquery.cslider.js"></script>

	<!-- cycle -->
	<script src="<?php echo base_url()."assets/site/" ?>js/jquery.cycle.js"></script>

	<!-- carousel items -->
	<script src="<?php echo base_url()."assets/site/" ?>js/jquery.carouFredSel-6.0.3-packed.js"></script>

	<!-- twitter -->
	<script src="<?php echo base_url()."assets/site/" ?>js/bootstrap.min.js"></script>

	<!-- Call Showcase - change 4 from min:4 and max:4 to the number of items you want visible -->
	<script type="text/javascript">
		$(window).load(function(){			
			$('#recent-projects').carouFredSel({
				responsive: true,
				width: '100%',
				auto: true,
				circular	: true,
				infinite	: false,
				prev : {
					button		: "#car_prev",
					key			: "left",
				},
				next : {
					button		: "#car_next",
					key			: "right",
				},
				swipe: {
					onMouse: true,
					onTouch: true
				},
				scroll : 2000,
				items: {
					visible: {
						min: 4,
						max: 4
					}
				}
			});
		});	
	</script>

	<!-- Call opacity on hover images from carousel-->
	<script type="text/javascript">
		$(document).ready(function(){
			$("img.imgOpa").hover(function() {
				$(this).stop().animate({opacity: "0.6"}, 'slow');
			},
			function() {
				$(this).stop().animate({opacity: "1.0"}, 'slow');
			});
		});
	</script>
</body>
</html>