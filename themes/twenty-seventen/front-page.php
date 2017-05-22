<?php
/**
 * Template for displaying the front page.
 *
 * @package Louis Casale Photography - Twenty Seventeen
 * @since   0.1.0
*/

get_header(); ?>

<section class="container">
	<div class="col-xs-12 col-sm-3">
		<nav>
			<h1>Louis Casale Photography</h1>
			<ul>
				<li><a href="<?php echo home_url(); ?>">Home</a></li>
				<li><a href="<?php echo home_url( '/about/' ); ?>">About</a></li>
				<li><a href="<?php echo home_url( '/gallery/' ); ?>">Bird Gallery</a></li>
				<li><a href="<?php echo home_url( '/blog/' ); ?>">Blog</a></li>
				<li><a href="<?php echo home_url( '/contact/' ); ?>">Contact</a></li>
			</ul>
		</nav>
	</div>
	<div class="col-xs-12 col-sm-9">

	</div>
</section>

<?php get_footer(); ?>
