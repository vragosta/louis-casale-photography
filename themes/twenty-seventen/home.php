<?php
/**
 * Template for displaying the blog archive.
 *
 * @package Louis Casale Photography - Twenty Seventeen
 * @since   0.1.0
 */

get_header();

$blog_posts = new WP_Query( [ 'post_type' => 'post' ] ); ?>

<?php if ( $blog_posts->have_posts() ) : ?>
	<section class="blog content col-xs-12 col-sm-offset-4 col-sm-8 col-md-offset-3 col-md-9">
		<?php while ( $blog_posts->have_posts() ) : $blog_posts->the_post(); ?>
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
				<?php $content = get_the_content(); ?>
				<p><?php echo wp_trim_words( $content, '60', '<a href="' . get_the_permalink() . '">...Read More</a>' ); ?></p>
			</div>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</section>
<?php endif; ?>

<?php get_footer(); ?>
