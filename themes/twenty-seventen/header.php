<?php
/**
 * The template for displaying the header.
 *
 * @package Louis Casale Photography - Twenty Seventen
 * @since 0.1.0
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
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
