<?php
/**
 * Template for displaying the bird archive.
 *
 * @package Louis Casale Photography - Twenty Seventeen
 * @since   0.1.0
 */

$family = $_GET['family'];

get_header();

$birds = new WP_Query( [
	'post_type'      => 'bird',
	'posts_per_page' => 16,
	'orderby'        => 'title',
	'order'          => 'ASC',
	'tax_query'      => [
		[
			'taxonomy' => 'family',
			'field'    => 'slug',
			'terms'    => [ $family ]
		]
	]
] );

$count = 0;

?>

<section class="archive content col-xs-12 col-sm-offset-4 col-sm-8 col-md-offset-3 col-md-9">
	<?php if ( $birds->have_posts() ) { ?>
		<div class="row">
			<?php while ( $birds->have_posts() ) { ?>
				<?php $birds->the_post(); ?>
				<?php if ( $count !== 0 && $count % 4 === 0 ) { ?>
					</div>
					<div class="row">
				<?php } ?>

				<div class="archive-item col-xs-12 col-sm-6 col-md-3">
					<a href="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'full' )[0]; ?>" data-rel="lightbox" title="<?php the_excerpt(); ?>">
						<figure class="photo unloaded">
							<div style="background-image: url( <?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'large' )[0]; ?> );"></div>
						</figure>
					</a>
					<h5 class="unloaded"><?php the_title(); ?></h5>
				</div>
				<?php $count++; ?>
			<?php } ?>
			<?php wp_reset_postdata(); ?>
		</div>
	<?php } else { ?>
			<p class="not-set">There are no birds currently in this family.</p>
	<?php } ?>
</section>

<?php get_footer(); ?>
