<?php
/**
 * Template for displaying the front page.
 *
 * @package Louis Casale Photography - Twenty Seventeen
 * @since   0.1.0
*/

get_header(); ?>

<div class="container">
	<section class="navigation col-xs-12 col-sm-2">
		<h1><a href="<?php echo home_url(); ?>">Louis Casale Photography</a></h1>
		<ul>
			<li><a href="<?php echo home_url(); ?>">Home</a></li>
			<li><a href="<?php echo home_url( '/about/' ); ?>">About</a></li>
			<li><a href="<?php echo home_url( '/gallery/' ); ?>">Bird Gallery</a></li>
			<li><a href="<?php echo home_url( '/blog/' ); ?>">Blog</a></li>
			<li><a href="<?php echo home_url( '/contact/' ); ?>">Contact</a></li>
		</ul>
		<div class="social">
			<a href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
			<a href="https://www.twitter.com" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
			<a href="https://www.instagram.com" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
		</div>
	</section>
	<section class="col-xs-12 col-sm-offset-3 col-sm-9">
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
			<a href="<?php echo home_url( '/gallery/' ); ?>">View more photographs >></a>
		</div>
	</section>
</div>

<?php get_footer(); ?>
