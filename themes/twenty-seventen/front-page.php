<?php
/**
 * Template for displaying the front page.
 *
 * @package Louis Casale Photography - Twenty Seventeen
 * @since   0.1.0
 */

get_header();

# Get the featured birds for the main carousel.
$featured_birds = new WP_Query( [
	'post_type'      => 'bird',
	'posts_per_page' => 6,
	'meta_query'     => [
		[
			'key'     => 'featured',
			'value'   => 'on',
			'compare' => '='
		]
	]
] );

if ( $featured_birds->post_count === 0 ) :
	$featured_birds = new WP_Query( [
		'post_type'      => 'bird',
		'posts_per_page' => 6
	] );
endif;

# Get the most recent birds for the secondary carousel.
$recent_birds = new WP_Query( [
	'post_type'      => 'bird',
	'posts_per_page' => 6
] );

$blog_posts = new WP_Query( [
	'post_type'      => 'post',
	'posts_per_page' => 2
] );

?>

<section class="content col-xs-12 col-sm-offset-3 col-sm-9">

	<?php if ( $featured_birds->have_posts() ) : ?>
		<div class="carousel main">
			<?php while ( $featured_birds->have_posts() ) : $featured_birds->the_post(); ?>
				<div>
					<figure>
						<div style="background-image: url( <?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'large' )[0]; ?> );"></div>
					</figure>
				</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	<?php endif; ?>

	<div class="about-excerpt">
		<p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
		<p>Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
		<p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
		<p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
		<p><a href="<?php echo home_url( '/about/' ); ?>">Learn more about Louis.</a></p>
	</div>

	<div class="inline-navigation">
		<h2><a href="<?php echo home_url( '/gallery/' ); ?>">Browse Bird Gallery</a></h2>
		<div class="vertical-line"></div>
		<h2><a href="<?php echo home_url( '/contact/' ); ?>">Contact Louis</a></h2>
		<div class="vertical-line"></div>
		<h2><a href="<?php echo home_url( '/blog/' ); ?>">Read The Blog</a></h2>
	</div>

	<?php if ( $recent_birds->have_posts() ) : ?>
		<div class="recent-photographs">
			<h2>Recent Photographs</h2>
			<div class="carousel secondary">
				<?php while ( $recent_birds->have_posts() ) : $recent_birds->the_post(); ?>
					<div>
						<figure>
							<div style="background-image: url( <?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'large' )[0]; ?> );"></div>
						</figure>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</div>
			<a class="pull-right" href="<?php echo home_url( '/gallery/' ); ?>">View more photographs >></a>
		</div>
	<?php endif; ?>

	<?php if ( $blog_posts->have_posts() ) : ?>
		<div class="latest-posts">
			<h2>Latest Blog Posts</h2>
			<div class="row">
				<?php while ( $blog_posts->have_posts() ) : $blog_posts->the_post(); ?>
					<div class="blog-post col-xs-12 col-sm-6">
						<h4>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h4>
						<span><?php echo date_format( date_create( get_the_date() ), 'F jS, Y' ); ?></span>
						<?php $content = get_the_content(); ?>
						<p><?php echo wp_trim_words( $content, '60', '<a href="' . get_the_permalink() . '">...Read More</a>' ); ?></p>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</div>
			<a class="pull-right" href="<?php echo home_url( '/blog/' ); ?>">View more posts >></a>
		</div>
	<?php endif; ?>

</section>

<?php get_footer(); ?>
