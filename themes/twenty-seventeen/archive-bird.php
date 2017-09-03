<?php
/**
 * Template for displaying the bird archive.
 *
 * @package LouisCasale - Twenty Seventeen
 * @since 0.1.0
 */

namespace LouisCasale;

get_header();

global $wp_query;
$family = $_GET['family'];
$birds = get_birds_by_family( $family );
$count = 0;

?>

<section class="archive content col-xs-12 col-sm-offset-4 col-sm-8 col-md-offset-3 col-md-9">

	<?php louiscasale_breadcrumbs(); ?>

	<?php if ( $birds->have_posts() ) { ?>
		<div class="row">
			<?php while ( $birds->have_posts() ) { ?>
				<?php $birds->the_post(); ?>

				<?php if ( $count !== 0 && $count % 4 === 0 ) { ?>
					</div>
					<div class="row">
				<?php } ?>

				<div class="archive-item col-xs-12 col-sm-6 col-md-3">
					<a href="<?php echo get_featured_image( $id, 'full' ); ?>" data-rel="lightbox" title="<?php echo get_the_excerpt(); ?>" data-id="<?php echo $post->ID; ?>">
						<figure class="photo unloaded">
							<div style="background-image: url( <?php echo get_featured_image( $id, 'large' ); ?> );"></div>
						</figure>
					</a>
					<h5 class="unloaded"><?php the_title(); ?></h5>
				</div>

				<?php if ( get_the_excerpt() ) { ?>
					<div class="custom-caption unloaded" data-id="<?php echo $post->ID; ?>">
						<?php the_excerpt(); ?>
					</div>
				<?php } ?>
				<?php $count++; ?>
			<?php } ?>
			<?php wp_reset_postdata(); ?>
		</div>

	<?php } else { ?>
			<p class="not-set">There are no published birds.</p>
	<?php } ?>

	<i id="swipebox-prev" class="custom-arrow left ion-chevron-left"></i>
	<i id="swipebox-next" class="custom-arrow right ion-chevron-right"></i>

</section>

<?php get_footer(); ?>