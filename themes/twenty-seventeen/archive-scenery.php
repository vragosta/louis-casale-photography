<?php
/**
 * Template for displaying the 'Scenery' archive.
 *
 * @package LouisCasale - Twenty Seventeen
 * @since 0.1.0
 */

namespace LouisCasale;

get_header();

$posts = new \WP_Query( array(
	'post_type'      => SCENERY_POST_TYPE,
	'posts_per_page' => -1,
	'orderby'        => 'title',
	'order'          => 'ASC',
) );
$count = 0;

?>

<section class="archive content col-xs-12 col-sm-offset-4 col-sm-8 col-md-offset-3 col-md-9">

	<?php louiscasale_breadcrumbs(); ?>

	<?php if ( $posts->have_posts() ) { ?>
		<div class="row">
		<?php while ( $posts->have_posts() ) { ?>
			<?php $posts->the_post(); ?>

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

			<?php $count++; ?>
		<?php } ?>
		<?php wp_reset_postdata(); ?>
		</div>

	<?php } else { ?>
		<p class="not-set">There are no published scenery.</p>
	<?php } ?>

	<i id="swipebox-prev" class="custom-arrow left ion-chevron-left"></i>
	<i id="swipebox-next" class="custom-arrow right ion-chevron-right"></i>

</section>

<?php get_footer(); ?>
