<?php
/**
 * Template for displaying the bird archive.
 *
 * @package Louis Casale Photography - Twenty Seventeen
 * @since   0.1.0
 */

$family = $_GET['family'];
$page_num = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

get_header();

global $wp_query;

$args = [
	'post_type' => 'bird',
	'paged' => $page_num,
	'posts_per_page' => 16,
	'orderby' => 'title',
	'order' => 'ASC'
];

if ( isset( $family ) ) {
	$args['tax_query'] = [
		[
			'taxonomy' => 'family',
			'field'    => 'slug',
			'terms'    => [ $family ]
		]
	];
}

$birds = new WP_Query( $args );
$count = 0;
$total = $wp_query->found_posts;
$total_pages = ceil( $total / 16 );

?>

<section class="archive content col-xs-12 col-sm-offset-4 col-sm-8 col-md-offset-3 col-md-9">

	<?php \LouisCasalePhotography\TwentySeventeen\Helpers\louis_casale_photography_breadcrumbs(); ?>

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
			<p class="not-set">There are no published birds.</p>
	<?php } ?>

	<?php if ( $total > 16 ) { ?>
		<div class="paginate row">
			<?php echo paginate_links( array(
				'total'    => $total_pages,
				'current'  => $page_num,
			) ); ?>
		</div>
	<?php } ?>

</section>

<?php get_footer(); ?>
