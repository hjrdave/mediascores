<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mediafish
 */

get_header();
?>

	<div id="primary" class="content-area pb-4">
		<div id="page-header" class="container-fluid">
			<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
			<div class="row" style="background-image:url('<?= $backgroundImg[0] ?>');">
			</div> 
		</div>
		<div id="page-title" class="container">
			<div class="row">
				<div class="col-lg-12 d-flex">
					<h1 class="align-self-end text-uppercase"><?= get_the_title() ?></h1>
				</div>
			</div>
		</div>
		<main id="main" class="container site-main">
		<div class="row">
			<div class="col-lg-12">
			<?php
				while (have_posts()):
					the_post();

					get_template_part('template-parts/content', 'page');

					// If comments are open or we have at least one comment, load up the comment template.
					if (comments_open() || get_comments_number()):
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
			</div>
		</div>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
