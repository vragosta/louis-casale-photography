<?php
/**
 * Template for displaying the bird archive.
 *
 * @package Louis Casale Photography - Twenty Seventeen
 * @since   0.1.0
 */

get_header();

$families = get_terms( [
	'taxonomy' => 'family',
	'hide_empty' => false,
] );

// echo '<pre>';
// var_dump( $families );
// echo '</pre>';

// $count = 0;
?>

<section class="archive content col-xs-12 col-sm-offset-3 col-sm-8 col-md-offset-3 col-md-9">
	<div class="row">
		<?php foreach( $families as $family ) { ?>
		<?php $image = get_term_meta( $family->term_id, 'cover_photo_url', true ); ?>
			<?php if ( $count !== 0 && $count % 3 === 0 ) { ?>
				</div>
				<div class="row">
			<?php } ?>

			<div class="archive-item col-xs-12 col-sm-6 col-md-4">
				<a href="<?php echo home_url( "/birds?family=$family->slug/" ); ?>">
					<figure class="photo unloaded">
						<div style="background-image: url( <?php echo $image ?> );"></div>
					</figure>
				</a>
				<h5 class="unloaded"><?php echo esc_html( $family->name ); ?></h5>
			</div>
			<?php $count++; ?>
		<?php } ?>
	</div>
</section>

<?php get_footer(); ?>
