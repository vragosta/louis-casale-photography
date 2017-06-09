<?php
/**
 * Template for displaying the about template.
 *
 * @package Louis Casale Photography - Twenty Seventeen
 * @since   0.1.0
 */

get_header();

global $post; ?>

<!-- <section class="about content col-xs-12 col-sm-offset-3 col-sm-9"> -->
<section class="about content col-xs-12 col-sm-offset-4 col-sm-8 col-md-offset-3 col-md-9">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'center top' )[0]; ?>

		<?php if ( $image ) : ?>
			<div class="photo-container">
				<figure class="photo unloaded">
					<div style="background-image: url( <?php echo esc_attr( $image ); ?> );"></div>
				</figure>
			</div>
		<?php endif; ?>

		<?php the_content(); ?>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
</section>

<?php get_footer(); ?>
