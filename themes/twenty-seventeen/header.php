<?php
/**
 * The template for displaying the header.
 *
 * @package LouisCasale - Twenty Seventen
 * @since 0.1.0
 */

$user = get_user_by( 'login', 'lcasale' );
$facebook = get_user_meta( $user->ID, '_facebook', true );
$twitter = get_user_meta( $user->ID, '_twitter', true );
$instagram = get_user_meta( $user->ID, '_instagram', true );

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="<?php echo home_url( 'wp-content/themes/twenty-seventeen/assets/images/favicon.ico' ); ?>" type="image/x-icon">
		<link rel="icon" href="<?php echo home_url( 'wp-content/themes/twenty-seventeen/assets/images/favicon.ico' ); ?>" type="image/x-icon">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div class="container">
			<section class="navigation col-xs-12 col-sm-3 col-md-2">
				<h1><a href="<?php echo home_url(); ?>">Louis Casale Photography</a></h1>
				<ul>
					<li><a href="<?php echo home_url(); ?>">Home</a></li>
					<li><a href="<?php echo home_url( '/about/' ); ?>">About</a></li>
					<li><a name="galleries">Galleries</a></li>
					<ul class="galleries">
						<li><a href="<?php echo home_url( '/recent-additions/' ); ?>">Recent Additions</a></li>
						<li><a href="<?php echo home_url( '/favorites/' ); ?>">Personal Favorites</a></li>
						<li><a href="<?php echo home_url( '/families/' ); ?>">Birds by Family</a></li>
						<li><a>All Birds</a></li>
					</ul>
					<li><a href="<?php echo home_url( '/blog/' ); ?>">Blog</a></li>
					<li><a name="contact">Contact</a></li>
					<ul class="contact">
						<li><a>Louis Casale</a></li>
						<li><a>Web Developer</a></li>
					</ul>
				</ul>
				<?php if ( ! empty( $facebook ) || ! empty( $twitter ) || ! empty( $instagram ) ) { ?>
					<div class="social">
						<?php if ( ! empty( $facebook ) ) { ?>
							<a href="<?php echo esc_url( $facebook ); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
						<?php } ?>
						<?php if ( ! empty( $twitter ) ) { ?>
							<a href="<?php echo esc_url( $twitter ); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						<?php } ?>
						<?php if ( ! empty( $instagram ) ) { ?>
							<a href="<?php echo esc_url( $instagram ); ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
						<?php } ?>
					</div>
				<?php } ?>
			</section>
