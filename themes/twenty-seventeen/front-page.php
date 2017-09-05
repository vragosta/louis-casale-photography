<?php
/**
 * Template for displaying the front page.
 *
 * @package LouisCasale - Twenty Seventeen
 * @since 0.1.0
 */

namespace LouisCasale;

get_header();

$featured_birds = get_featured_birds();
$recent_birds = get_recent_birds( 2 );
$favorite_birds = get_favorite_birds( 2 );
$blog_posts = get_recent_posts();

$page = get_page_by_path( 'about' );
$about_page_excerpt = $page->post_excerpt; ?>

<section class="front-page content col-xs-12 col-sm-offset-4 col-sm-8 col-md-offset-3 col-md-9">

	<?php if ( $featured_birds->have_posts() ) { ?>
		<div class="carousel main">
			<?php while ( $featured_birds->have_posts() ) { ?>
				<?php $featured_birds->the_post(); ?>
				<div>
					<figure class="unloaded">
						<div style="background-image: url( <?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'large' )[0]; ?> );"></div>
					</figure>
				</div>
			<?php } ?>
			<?php wp_reset_postdata(); ?>
		</div>
	<?php }; ?>

	<?php if ( $about_page_excerpt ) { ?>
		<div class="about-excerpt">
			<?php echo $about_page_excerpt; ?>
		</div>
	<?php } ?>

	<div class="inline-navigation">
		<h2><a href="<?php echo home_url( '/birds/' ); ?>">Browse Bird Gallery</a></h2>
		<div class="vertical-line"></div>
		<h2><a href="<?php echo home_url( '/contact/' ); ?>">Contact Louis</a></h2>
		<div class="vertical-line"></div>
		<h2><a href="<?php echo home_url( '/blog/' ); ?>">Read The Blog</a></h2>
	</div>

	<?php if ( $recent_birds->have_posts() ) { ?>
		<div class="recent-photographs">
			<h2>Recent Additions</h2>
			<div class="row">
				<?php while ( $recent_birds->have_posts() ) { ?>
					<?php $recent_birds->the_post(); ?>
					<div class="recent-item col-xs-12 col-sm-12 col-md-6">
						<a href="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'large' )[0]; ?>" data-rel="lightbox" title="<?php echo get_the_excerpt(); ?>" data-id="<?php echo $post->ID; ?>">
							<figure class="photo unloaded">
								<div style="background-image: url( <?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'large' )[0]; ?> );"></div>
							</figure>
						</a>
						<h5 class="unloaded"><?php the_title(); ?></h5>
					</div>

					<?php if ( get_the_excerpt() ) { ?>
						<div class="custom-caption unloaded" data-id="<?php echo $post->ID; ?>">
							<?php the_excerpt(); ?>
						</div>
					<?php } ?>
				<?php } ?>
				<?php wp_reset_postdata(); ?>
			</div>
			<a class="align-right" href="<?php echo home_url( '/recent-additions/' ); ?>">View more recent additions >></a>
		</div>
	<?php } ?>

	<?php if ( $favorite_birds->have_posts() ) { ?>
		<div class="recent-photographs">
			<h2>Personal Favorites</h2>
			<div class="row">
				<?php while ( $favorite_birds->have_posts() ) { ?>
					<?php $favorite_birds->the_post(); ?>
					<div class="recent-item col-xs-12 col-sm-12 col-md-6">
						<a href="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'large' )[0]; ?>" data-rel="lightbox" title="<?php echo get_the_excerpt(); ?>" data-id="<?php echo $post->ID; ?>">
							<figure class="photo unloaded">
								<div style="background-image: url( <?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'large' )[0]; ?> );"></div>
							</figure>
						</a>
						<h5 class="unloaded"><?php the_title(); ?></h5>
					</div>

					<?php if ( get_the_excerpt() ) { ?>
						<div class="custom-caption unloaded" data-id="<?php echo $post->ID; ?>">
							<?php the_excerpt(); ?>
						</div>
					<?php } ?>
				<?php } ?>
				<?php wp_reset_postdata(); ?>
			</div>
			<a class="align-right" href="<?php echo home_url( '/favorites/' ); ?>">View more personal favorites >></a>
		</div>
	<?php } ?>

	<?php if ( $blog_posts->have_posts() ) { ?>
		<div class="latest-posts">
			<h2>Latest Blog Posts</h2>
			<div class="row">
				<?php while ( $blog_posts->have_posts() ) { ?>
					<?php $blog_posts->the_post(); ?>
					<div class="blog-post col-xs-12 col-sm-12 col-md-6">
						<h4>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h4>
						<span><?php echo date_format( date_create( get_the_date() ), 'F jS, Y' ); ?></span>
						<?php $content = get_the_content(); ?>
						<p><?php echo wp_trim_words( $content, '60', '<a href="' . get_the_permalink() . '">...Read More</a>' ); ?></p>
					</div>
				<?php } ?>
				<?php wp_reset_postdata(); ?>
			</div>
			<a class="align-right" href="<?php echo home_url( '/blog/' ); ?>">View more posts >></a>
		</div>
	<?php } ?>

	<i id="swipebox-prev" class="custom-arrow left ion-chevron-left"></i>
	<i id="swipebox-next" class="custom-arrow right ion-chevron-right"></i>

</section>

<?php get_footer(); ?>
