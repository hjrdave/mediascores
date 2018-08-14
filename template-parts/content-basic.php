<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mediafish
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header text-center text-lg-left">
	
		<?php
		if ( is_singular() ) :
			the_title( '<h4 class="entry-title py-4">', '</h4>' );
		else :
			the_title( '<h2 class="entry-title py-4"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		 ?>

	</header><!-- .entry-header -->

	<?php //mediafish_post_thumbnail(); ?>

	<div class="entry-content text-center text-lg-left pb-4">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'mediafish' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mediafish' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->


</article><!-- #post-<?php the_ID(); ?> -->
