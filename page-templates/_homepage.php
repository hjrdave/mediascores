<?php
/*
	Template Name: Homepage
*/
get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?= do_shortcode("[banner]"); ?>
			<div class="container-fluid">
				<div class="row homepage-section">
					<div class="col-lg-8 mx-auto text-center">
						<h2>Policies We Write</h2>
						<p class="mt-4">S&O Farmers Mutual was originally founded in 1878 under the name of Switzerland & Ohio Counties Patrons Mutual Fire Insurance Company.</p>
						<div class="row icon-set mt-4">
							<div class="col-lg-12">
								<div class="row"> 
									<div class="col-12 col-lg-3">
										<img src="<?= content_url() ?>/uploads/2018/03/ico_mobilehomes.png" class="img-fluid"/>
										<p class="pt-4">Mobile Homes</p>
									</div>
									<div class="col-12 col-lg-3">
										<img src="<?= content_url() ?>/uploads/2018/03/ico_farmowners.png" class="img-fluid"/>
										<p class="pt-4">Farm Owners</p>
									</div>
									<div class="col-12 col-lg-3">
										<img src="<?= content_url() ?>/uploads/2018/03/ico_rentalproperty.png" class="img-fluid icon3"/>
										<p class="pt-4">Rental Property</p>
									</div>
									<div class="col-12 col-lg-3">
										<img src="<?= content_url() ?>//uploads/2018/03/ico_homeowners.png" class="img-fluid"/>
										<p class="pt-4">Home Owners</p>
									</div>
								</div>
							</div>
						</div>
						<a href="/about/" class="btn btn-primary mt-md-4">Learn More</a>
					</div>
				</div>
				
				<div class="row homepage-section">
					<div class="col-lg-8 mx-auto text-center">
					<h2>Our History</h2>
						<p class="mt-4">S&O Farmers Mutual was originally founded in 1878 under the name of Switzerland Ohio Counties Patrons Mutual Fire Insurance Company. S&O Farmers Mutual was originally founded in 1878 under the name of Switzerland and Ohio Counties Patrons Mutual Fire Insurance Company.</p>
						<a href="/about/" class="btn btn-secondary mt-4">Learn More</a>
					</div>
				</div>
				
				<div class="row homepage-section board-members">
					<div class="col-lg-8 mx-auto text-center">
					<h2>Our Sponsors</h2>
						<!--Sponsors Slider-->
						<ul id="lightslider">
							<li>
								<a href="https://www.hummelinsurance-milan.com/" target="_blank"><img src="<?= content_url() ?>/uploads/2018/04/logo_hummelwinters.png" width="225" alt="Hummel Winters Insurance | Hummel Insurance Group Member"></a>
								
							</li>
							<li>
							<a href="http://www.hummelinsurancevevay.com/" target="_blank"><img src="<?= content_url() ?>/uploads/2018/04/logo_hummelvevay.png" width="225" alt="Hummel Vevay Insurance | Hummel Insurance Group Member"></a>
								
							</li>
							<li>
							<a href="https://www.friendshipstatebank.com/" target="_blank"><img src="<?= content_url() ?>/uploads/2018/04/logo_friendshipstatebank.png" width="225" alt="The Friendship State Bank"></a>
								
							</li>
							<li>
							<a href="http://www.boohertaylor.com/" target="_blank"><img src="<?= content_url() ?>/uploads/2018/04/logo_boohertaylor.png" width="225" alt="Booher and Taylor | Insurance Agencies Inc."></a>
								
							</li>
														
							</ul>
					</div>
				</div>
				
				
				
				<div class="row homepage-section contact-us">
					<div class="col-lg-6 mx-auto text-center">
						<h2>Contact Us</h2>
						<div class="homepage-contact-form">
							<?= do_shortcode("[ninja_form id=1]"); ?>
						</div>	
					</div>
				</div>
				
			</div>
			
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
