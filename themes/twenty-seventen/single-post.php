<?php
/**
 * Template for displaying the blog single template.
 *
 * @package Louis Casale Photography - Twenty Seventeen
 * @since   0.1.0
 */

get_header();

global $post; ?>

<section class="col-xs-12 col-sm-offset-3 col-sm-9">
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="blog-item">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<span><?php echo date_format( date_create( get_the_date() ), 'F jS, Y' ); ?></span>
			<?php the_content(); ?>
		</div>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
</section>

<?php get_footer(); ?>
