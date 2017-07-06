<?php
/**
 * The template for displaying the header.
 *
 * @package Louis Casale Photography - Twenty Seventen
 * @since 0.1.0
 */

$user = get_user_by( 'login', 'lcasale' );

$facebook  = get_user_meta( $user->ID, 'facebook', true );
$twitter   = get_user_meta( $user->ID, 'twitter', true );
$instagram = get_user_meta( $user->ID, 'instagram', true );

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
					<li>
						<div class="btn-group">
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Contact
								<i class="ion ion-chevron-down"></i>
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="<?php echo home_url( '/contact/' ); ?>">Louis Casale</a><br />
								<a class="dropdown-item" href="<?php echo home_url( '/contact/' ); ?>">Web Developer</a>
							</div>
						</div>
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
