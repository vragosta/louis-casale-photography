<?php
/**
 * Template for displaying the blog single template.
 *
 * @package Louis Casale Photography - Twenty Seventeen
 * @since   0.1.0
 */

get_header();

global $post;

?>

<section class="content col-xs-12 col-sm-offset-3 col-sm-6">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'large' )[0]; ?>
		<div class="blog-item">
			<?php if ( $image ) : ?>
				<a href="<?php the_permalink(); ?>">
					<figure class="photo unloaded">
						<div style="background-image: url( <?php echo esc_attr( $image ); ?> );"></div>
					</figure>
				</a>
			<?php endif; ?>
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<span><?php echo date_format( date_create( get_the_date() ), 'F jS, Y' ); ?></span>
			<?php the_content(); ?>
		</div>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
</section>

<?php if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>
	<aside class="col-xs-12 col-sm-3">
		<?php dynamic_sidebar( 'blog-sidebar' ); ?>
	</aside>
<?php endif; ?>

<?php get_footer(); ?>
