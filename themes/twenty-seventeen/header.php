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
					<li><a href="<?php echo home_url(); ?>" <?php echo is_front_page() ? 'class="active"' : ''; ?>>Home</a></li>
					<li><a href="<?php echo home_url( '/about/' ); ?>" <?php echo is_page( 'about' ) ? 'class="active"' : ''; ?>>About</a></li>
					<li>
						<a id="galleries">Galleries</a>
						<ul class="galleries <?php echo \LouisCasale\is_gallery() ? 'display' : ''; ?>">
							<li><a href="<?php echo home_url( '/recent-additions/' ); ?>" <?php echo \LouisCasale\is_bird_recent_additions() ? 'class="active"' : ''; ?>>Recent Additions</a></li>
							<li><a href="<?php echo home_url( '/favorites/' ); ?>" <?php echo \LouisCasale\is_bird_favorites() ? 'class="active"' : ''; ?>>Personal Favorites</a></li>
							<li><a href="<?php echo home_url( '/families/' ); ?>" <?php echo \LouisCasale\is_bird_families() ? 'class="active"' : ''; ?>>Birds by Family</a></li>
							<li><a href="<?php echo home_url( '/birds/' ); ?>" <?php echo is_post_type_archive( 'bird' ) ? 'class="active"' : ''; ?>>All Birds</a></li>
							<li><a href="<?php echo home_url( '/wildlife/' ); ?>" <?php echo is_post_type_archive( 'wildlife' ) ? 'class="active"' : ''; ?>>Wildlife</a></li>
							<li><a href="<?php echo home_url( '/scenery/' ); ?>" <?php echo is_post_type_archive( 'scenery' ) ? 'class="active"' : ''; ?>>Scenery</a></li>
						</ul>
					</li>
					<li><a href="<?php echo home_url( '/blog/' ); ?>" <?php echo \LouisCasale\is_blog() ? 'class="active"' : ''; ?>>Blog</a></li>
					<li>
						<a id="contact">Contact</a>
						<ul class="contact <?php echo is_page( 'contact' ) || is_page( 'developer' ) ? 'display' : ''; ?>">
							<li><a href="<?php echo home_url( '/contact/' ); ?>" <?php echo is_page( 'contact' ) ? 'class="active"' : ''; ?>>Louis Casale</a></li>
							<li><a href="<?php echo home_url( '/contact/developer' ); ?>" <?php echo is_page( 'developer' ) ? 'class="active"' : ''; ?>>Web Developer</a></li>
						</ul>
					</li>
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
