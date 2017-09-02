<?php
/**
 * Template for displaying the about template.
 *
 * @package LouisCasale - Twenty Seventeen
 * @since 0.1.0
 */

namespace LouisCasale;

get_header();

global $post; ?>

<section class="about content col-xs-12 col-sm-offset-4 col-sm-8 col-md-offset-3 col-md-9">

	<?php louiscasale_breadcrumbs(); ?>

	<?php while ( have_posts() ) { ?>
		<?php the_post(); ?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'center top' )[0]; ?>

		<?php if ( $image ) { ?>
			<div class="photo-container">
				<figure class="photo unloaded">
					<div style="background-image: url( <?php echo esc_attr( $image ); ?> );"></div>
				</figure>
			</div>
		<?php } ?>

		<?php the_content(); ?>
	<?php } ?>
	<?php wp_reset_postdata(); ?>
</section>

<?php get_footer(); ?>
