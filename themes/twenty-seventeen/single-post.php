<?php
/**
 * Template for displaying the blog single template.
 *
 * @package LouisCasale - Twenty Seventeen
 * @since 0.1.0
 */

namespace LouisCasale;

get_header();

global $post; ?>

<section class="col-xs-12 col-sm-offset-3 col-sm-9">
	<?php while ( have_posts() ) { ?>
		<?php the_post(); ?>
		<?php $image = get_featured_image( $id ); ?>
		<div class="blog-item">
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<span><?php echo date_format( date_create( get_the_date() ), 'F jS, Y' ); ?></span>
			<?php if ( $image ) { ?>
				<div class="photo-container">
					<figure class="photo unloaded">
						<div style="background-image: url( <?php echo esc_attr( $image ); ?> );"></div>
					</figure>
				</div>
			<?php } ?>
			<?php the_content(); ?>
		</div>
	<?php } ?>
	<?php wp_reset_postdata(); ?>
</section>

<?php get_footer(); ?>
