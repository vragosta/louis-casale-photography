<?php
/**
 * Template for displaying the blog archive.
 *
 * @package Louis Casale Photography - Twenty Seventeen
 * @since   0.1.0
 */

get_header();

$blog_posts = new WP_Query( [ 'post_type' => 'post' ] ); ?>

<?php if ( $blog_posts->have_posts() ) { ?>
	<section class="blog content col-xs-12 col-sm-offset-4 col-sm-8 col-md-offset-3 col-md-9">
		<?php while ( $blog_posts->have_posts() ) { ?>
			<?php $blog_posts->the_post(); ?>
			<div class="blog-item">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<span><?php echo date_format( date_create( get_the_date() ), 'F jS, Y' ); ?></span>
				<?php $content = get_the_content(); ?>
				<p><?php echo wp_trim_words( $content, '60', '<a href="' . get_the_permalink() . '">...Read More</a>' ); ?></p>
			</div>
		<?php } ?>
		<?php wp_reset_postdata(); ?>
	</section>
<?php } else { ?>
	<p class="not-set">There have been no blog posts created.</p>
<?php } ?>

<?php get_footer(); ?>
