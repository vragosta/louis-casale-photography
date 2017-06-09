<?php
/**
 * The template for displaying the header.
 *
 * @package Louis Casale Photography - Twenty Seventen
 * @since 0.1.0
 */

$user = get_user_by( 'login', 'lcasale' );

$facebook  = get_user_meta( $user->ID, 'facebook', true ) ? get_user_meta( $user->ID, 'facebook', true ) : 'https://www.facebook.com';
$twitter   = get_user_meta( $user->ID, 'twitter', true ) ? get_user_meta( $user->ID, 'twitter', true ) : 'https://www.twitter.com';
$instagram = get_user_meta( $user->ID, 'instagram', true ) ? get_user_meta( $user->ID, 'instagram', true ) : 'https://www.instagram.com';

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div class="container">
			<section class="navigation col-xs-12 col-sm-3 col-md-2">
				<h1><a href="<?php echo home_url(); ?>">Louis Casale Photography</a></h1>
				<ul>
					<li><a href="<?php echo home_url(); ?>">Home</a></li>
					<li><a href="<?php echo home_url( '/about/' ); ?>">About</a></li>
					<li><a href="<?php echo home_url( '/gallery/' ); ?>">Bird Gallery</a></li>
					<li><a href="<?php echo home_url( '/blog/' ); ?>">Blog</a></li>
					<li><a href="<?php echo home_url( '/contact/' ); ?>">Contact</a></li>
				</ul>
				<div class="social">
					<a href="<?php echo esc_attr( $facebook ); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					<a href="<?php echo esc_attr( $twitter ); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
					<a href="<?php echo esc_attr( $instagram ); ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
				</div>
			</section>
