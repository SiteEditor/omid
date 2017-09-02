<?php
/**
 * The template for displaying archive pages
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

	<?php if ( have_posts() ) : ?>

		<?php

		$show_blog_archive_title = (bool)get_theme_mod( 'sed_show_blog_archive_title' , '1' );

		$show_blog_archive_description = (bool)get_theme_mod( 'sed_show_blog_archive_description' , '1' );

		if( $show_blog_archive_title === true || $show_blog_archive_description === true || site_editor_app_on() ) {

			$hide_class = ($show_blog_archive_title === false && $show_blog_archive_description === false) ? "hide" : "";
		?>

			<header class="page-header <?php echo esc_attr( $hide_class ) ;?>">

				<?php

				if( $show_blog_archive_title === true || site_editor_app_on() ) {

					$hide_class = ($show_blog_archive_title === false) ? "hide" : "";

					the_archive_title('<h1 class="page-title '. esc_attr( $hide_class ) .'">', '</h1>');

				}

				if( $show_blog_archive_description === true || site_editor_app_on() ) {

					$hide_class = ($show_blog_archive_description === false) ? "hide" : "";

					the_archive_description( '<div class="taxonomy-description '. esc_attr( $hide_class ) .'">', '</div>' );

				}

				?>

			</header><!-- .page-header -->

		<?php } ?>

	<?php endif; ?>

	<div id="primary" class="content-area">

		<main id="main" class="site-main" role="main">

			<div class="video-archive-inner-content-container">

				<?php

				$video_active_id = isset( $_REQUEST['video_active_id'] ) ? (int)$_REQUEST['video_active_id'] : 0;

				$current_term_id = 0;

				if( is_tax('video_cat') ){

					$current_term = get_queried_object();

					$current_term_id = $current_term->term_id;

				}

				$num = 1;

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					if( ( $video_active_id && $video_active_id == get_the_ID() ) || ( !$video_active_id && $num ==  1 ) ) {

						?>
						<div class="current-video-wrapper">

							<?php

							$self_hosted_video = get_field("self_hosted_video_url");

							if (!empty($self_hosted_video)) {

								echo do_shortcode('[video src="' . $self_hosted_video["url"] . '"]');

							} else {

								$external_video_code = get_field("external_video_url");

								echo $external_video_code;

							}

							?>

						</div>

						<?php

						$video_active_id = get_the_ID();

					}

					$num++;

				endwhile;
				?>

				<div class="video-slider-wrapper">

					<?php

					/* Start the Loop */
					while ( have_posts() ) : the_post();

						$post_thumbnail_id = 0;

						if ( '' !== get_the_post_thumbnail() ){

							$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );

						}

						$img = get_sed_attachment_image_html( $post_thumbnail_id , "", "400X294");

						if (!$img) {

							$img = array();

							$img['thumbnail'] = '<img class="sed-image-placeholder sed-image" src="' . sed_placeholder_img_src() . '" />';

						}

						?>

						<div class="video-slider-item <?php if( $video_active_id == get_the_ID() ) echo "active";?>">

							<div class="tme-wrapper">

								<div class="tme-img">

									<?php echo $img['thumbnail']; ?>

									<div class="tme-img-info">

										<?php
										if( $current_term_id ){

											$link = add_query_arg( 'video_active_id' , get_the_ID() , get_term_link( $current_term ) );

										}else{

											$link = get_permalink();

										}
										?>

										<a class="play-btn" href="<?php echo esc_attr( esc_url( $link ) );?>"></a>
									</div>

								</div>

							</div>

						</div>

						<?php

						endwhile;

					?>

				</div>

				<div class="video-cat-wrapper">

					<div class="video-cat-item <?php if( is_post_type_archive('omid_video') ) echo "active";?>"><a href="<?php echo get_post_type_archive_link('omid_video');?>" class=""><?php _e("All" , "omid");?></a></div>

					<?php

					$terms = get_terms( 'video_cat' , array(
						'hide_empty' => true,
					) );

					if( !empty( $terms ) && is_array( $terms ) ) {

						foreach ( $terms AS $term ) {
							?>

							<div class="video-cat-item <?php if( $current_term_id == $term->term_id ) echo "active";?>"><a href="<?php echo get_term_link( $term );?>" class=""><?php echo $term->name;?></a></div>

							<?php
						}

					}
					?>

				</div>

			</div>

		</main><!-- #main -->

	</div><!-- #primary -->

	<?php get_sidebar(); ?>

</div><!-- .wrap -->

<?php get_footer();
