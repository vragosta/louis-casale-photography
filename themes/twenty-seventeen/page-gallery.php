<?php
/**
 * Template for displaying the bird archive.
 *
 * @package LouisCasale - Twenty Seventeen
 * @since 0.1.0
 */

namespace LouisCasale;

get_header();

$families = get_terms( [
	'taxonomy' => 'family',
	'hide_empty' => false,
] );

$count = 0;

?>

<section class="archive content col-xs-12 col-sm-offset-4 col-sm-8 col-md-offset-3 col-md-9">

	<?php louiscasale_breadcrumbs(); ?>

	<?php if ( ! empty( $families ) ) { ?>
		<div class="row">
			<?php foreach( $families as $family ) { ?>
			<?php $image = get_term_meta( $family->term_id, 'cover_photo_url', true ); ?>
				<?php if ( $count !== 0 && $count % 3 === 0 ) { ?>
					</div>
					<div class="row">
				<?php } ?>

				<div class="archive-item col-xs-12 col-sm-4 col-md-4">
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
	<?php } else { ?>
		<p class="not-set">There are no bird families currently set up.</p>
	<?php } ?>
</section>

<?php get_footer(); ?>
