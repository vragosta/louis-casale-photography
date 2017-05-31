<?php
/**
 * Template for displaying the front page.
 *
 * @package Louis Casale Photography - Twenty Seventeen
 * @since   0.1.0
*/

get_header();

// $featured = new WP_Query( [
// 	'post_Type'      => 'bird',
// 	'posts_per_page' => 6,
// 	'meta_query'     => [
// 		'key'     =>
// 		'value'   =>
// 		'compare' =>
// 	]
// ] );

?>

<section class="content col-xs-12 col-sm-offset-3 col-sm-9">
	<div class="carousel main">
		<figure>
			<div style="background-image: url( <?php echo esc_attr( LOUIS_CASALE_PHOTOGRAPHY_TEMPLATE_URL . '/assets/images/1008x667.jpg' ); ?> );"></div>
		</figure>
		<figure>
			<div style="background-image: url( <?php echo esc_attr( LOUIS_CASALE_PHOTOGRAPHY_TEMPLATE_URL . '/assets/images/1280x960.jpg' ); ?> );"></div>
		</figure>
		<figure>
			<div style="background-image: url( <?php echo esc_attr( LOUIS_CASALE_PHOTOGRAPHY_TEMPLATE_URL . '/assets/images/1400x900.jpg' ); ?> );"></div>
		</figure>
		<figure>
			<div style="background-image: url( <?php echo esc_attr( LOUIS_CASALE_PHOTOGRAPHY_TEMPLATE_URL . '/assets/images/1920x1080.jpg' ); ?> );"></div>
		</figure>
	</div>
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
	<div class="recent-photographs">
		<h2>Recent Photographs</h2>
		<div class="carousel">
			<figure>
				<div style="background-image: url( <?php echo esc_attr( LOUIS_CASALE_PHOTOGRAPHY_TEMPLATE_URL . '/assets/images/1008x667.jpg' ); ?> );"></div>
			</figure>
			<figure>
				<div style="background-image: url( <?php echo esc_attr( LOUIS_CASALE_PHOTOGRAPHY_TEMPLATE_URL . '/assets/images/1280x960.jpg' ); ?> );"></div>
			</figure>
			<figure>
				<div style="background-image: url( <?php echo esc_attr( LOUIS_CASALE_PHOTOGRAPHY_TEMPLATE_URL . '/assets/images/1400x900.jpg' ); ?> );"></div>
			</figure>
			<figure>
				<div style="background-image: url( <?php echo esc_attr( LOUIS_CASALE_PHOTOGRAPHY_TEMPLATE_URL . '/assets/images/1920x1080.jpg' ); ?> );"></div>
			</figure>
		</div>
		<a class="pull-right" href="<?php echo home_url( '/gallery/' ); ?>">View more photographs >></a>
	</div>
	<div class="latest-posts">
		<h2>Latest Blog Posts</h2>
		<div class="row">
			<div class="blog-post col-xs-12 col-sm-6">
				<h4>This is an example title.</h4>
				<span>May 30, 2017</span>
				<p>Nullam quis risus eget urna mollis ornare vel eu leo. Curabitur blandit tempus porttitor. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Nullam id dolor id nibh ultricies vehicula ut id elit. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
			</div>
			<div class="blog-post col-xs-12 col-sm-6">
				<h4>This is an example title.</h4>
				<span>May 27, 2017</span>
				<p>Nullam quis risus eget urna mollis ornare vel eu leo. Curabitur blandit tempus porttitor. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Nullam id dolor id nibh ultricies vehicula ut id elit. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
			</div>
		</div>
		<a class="pull-right" href="<?php echo home_url( '/blog/' ); ?>">View more posts >></a>
	</div>
	<div class="copyright">
		<span>Copyright &copy; 2017 Louis Casale Photography</span>
	</div>
</section>

<?php get_footer(); ?>
