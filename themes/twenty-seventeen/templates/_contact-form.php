<?php
/**
 * Contact Form HTML
 *
 * @package LouisCasale - Twenty Seventeen
 * @since 0.1.0
 * @uses louiscasale_breadcrumbs(), is_page()
 */

namespace LouisCasale;

?>

<section class="contact content col-xs-12 col-sm-offset-4 col-sm-8 col-md-offset-3 col-md-9">

	<?php louiscasale_breadcrumbs(); ?>

	<?php if ( is_page( 'developer' ) ) { ?>
		<input type="hidden" value="developer" />
	<?php } ?>

	<?php while ( have_posts() ) { ?>
		<?php the_post(); ?>
		<?php $image = get_featured_image( $id ); ?>

		<?php if ( $image ) { ?>
			<div class="photo-container">
				<figure class="photo unloaded">
					<div style="background-image: url( <?php echo esc_attr( $image ); ?> );"></div>
				</figure>
			</div>
		<?php } ?>

		<?php $excerpt = get_the_excerpt(); ?>
		<?php if ( $excerpt ) { ?>
			<div class="excerpt">
				<?php echo $excerpt; ?>
				<p class="pull-left">If you'd like to contact me, please fill out the following form...</p>
			</div>
		<?php } ?>

		<div class="field-container row">
			<div class="form-group col-md-6">
				<label for="firstname">First Name *</label>
				<input type="text" class="form-control" id="firstname">
			</div>
			<div class="form-group col-md-6">
				<label for="lastname">Last Name *</label>
				<input type="text" class="form-control" id="lastname">
			</div>
		</div>

		<div class="field-container row">
			<div class="form-group col-md-12">
				<label for="email">Email Address *</label>
				<input type="email" class="form-control" id="email">
			</div>
		</div>

		<div class="field-container row">
			<div class="form-group col-md-12">
				<label for="subject">Subject *</label>
				<input type="text" class="form-control" id="subject">
			</div>
		</div>

		<div class="field-container row">
			<div class="form-group col-md-12">
				<label for="message">Message *</label>
				<textarea class="form-control" id="message"></textarea>
			</div>
		</div>

		<button class="btn btn-info contact-btn">Submit</button>

	<?php } ?>
	<?php wp_reset_postdata(); ?>
</section>
