<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mediafish
 */

?>

	</div><!-- #content -->
	<footer id="colophon" class="container-fluid site-footer">
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					<div class="col-lg-12 my-4 text-center">
						<div class="d-md-inline-block d-block mx-2">
							<a href="https://www.linkedin.com/in/david-sanders-9929378b/" target="_blank"><i class="fab fa-linkedin px-2"></i></a>
							<a href="https://twitter.com/hjr_dave" target="_blank"><i class="fab fa-twitter-square px-2"></i></a>
							<a href="https://github.com/hjrdave" target="_blank"><i class="fab fa-github-square px-2"></i></a>
						</div>
					</div>
				</div>
				<div class="row d-none">
					<div class="col-lg-12 mt-4">
					<?= wp_nav_menu(array('menu' => 'Menu Name', 'menu_id' => 'footer-menu')); ?>
						<p class="pt-4"></p>
					</div>
				</div>
			</div>
		</div>
		<div class="row site-info">
			<div class="col-lg-12">
				<p class="mb-3">Copyright <?=date("Y", time());?>  David A. Sanders.  All Rights Reserved.</p>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer();?>

</body>
</html>
