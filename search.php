<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">

	<header class="page-header">
		<?php if ( have_posts() ) : ?>
			<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyseventeen' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		<?php else : ?>
			<h1 class="page-title"><?php _e( 'Nothing Found', 'twentyseventeen' ); ?></h1>
		<?php endif; ?>
	</header><!-- .page-header -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php

		if ( have_posts() ) {

			?>
			<div class="posts-archive-wrapper">

				<?php

				$num_post = 1;
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					$post_thumbnail_id = 0;

					if ( '' !== get_the_post_thumbnail() ){

						$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );

					}

					$img = get_sed_attachment_image_html( $post_thumbnail_id , "" , "500X330" );

					if ( ! $img ) {
						$img = array();
						$img['thumbnail'] = '<img class="sed-image-placeholder sed-image" src="' . sed_placeholder_img_src() . '" />';
					}

					$excerpt_length = 440;

					$content_post = apply_filters( 'the_excerpt', get_the_excerpt() );

					if( strlen( $content_post ) > $excerpt_length )
						$content_post = mb_substr( $content_post , 0 , $excerpt_length - 3 ) . '...';
					?>


						<div class="posts-archive-item">
							<div class="tme-wrapper row">

								<?php if( $num_post % 2 == 1 ) { ?>

									<div class="col-sm-6">

										<div class="tme-img">

											<?php echo $img['thumbnail'];?>

										</div>

									</div>

								<?php } ?>

								<div class="col-sm-6">
									<div class="tme-heading">
										<div class="tme-heading-inner">
											<h4><?php the_title();?></h4>
											<div><?php echo __("Updated On:" , "omid") . " " .twentyseventeen_time_link();?></div>
										</div>
									</div>
									<div class="tme-content">
										<div class="tme-content-inner">
											<?php echo $content_post;?>
										</div>
										<div class="tme-btn"><a href="<?php the_permalink();?>" class="text-first-main"><?php echo __("Read More","omid");?></a></div>
									</div>
								</div>


								<?php if( $num_post % 2 == 0 ) { ?>

									<div class="col-sm-6">

										<div class="tme-img">

											<?php echo $img['thumbnail'];?>

										</div>

									</div>

								<?php } ?>

							</div>
						</div>

					<?php

					$num_post++;

				endwhile;

				?>

			</div>

		<?php

			the_posts_pagination( array(
				'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
				'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
			) );

		}else{

			?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentyseventeen' ); ?></p>
			<?php
				get_search_form();

		}
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();
