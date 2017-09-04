<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">

	<?php

	$show_blog_archive_title = (bool)get_theme_mod( 'sed_show_blog_archive_title' , '1' );

	if( $show_blog_archive_title === true || site_editor_app_on() ) {

		$hide_class = ($show_blog_archive_title === false) ? "hide" : "";

		?>

		<?php if (is_home() && !is_front_page()) : ?>
			<header class="page-header <?php echo esc_attr( $hide_class ) ;?>">
				<h1 class="page-title"><?php single_post_title(); ?></h1>
			</header>
		<?php else : ?>
			<header class="page-header <?php echo esc_attr( $hide_class ) ;?>">
				<h2 class="page-title"><?php _e('Blog', 'twentyseventeen'); ?></h2>
			</header>
		<?php endif; ?>

	<?php

	}

	?>

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

				<div class="not-found-post">
					<p><?php echo __("Not found result" , "site-editor" ); ?> </p>
				</div>

				<?php

			}

			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();
