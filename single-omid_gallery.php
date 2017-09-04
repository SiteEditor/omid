<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">

	<div id="primary" class="content-area">

		<main id="main" class="site-main" role="main">

			<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					//var_dump( get_field('omid_images_gallery') );

					//var_dump( get_post_meta( get_the_ID() , 'omid_images_gallery' , true ) );

					//var_dump( get_post_meta( get_the_ID() , 'show_in_services' , true ) );

					//var_dump( get_field('show_in_top_services') );

					//var_dump( get_field('show_in_top_galery') );

					if( isset( $_REQUEST['is_service'] ) && $_REQUEST['is_service'] == 1 ){

						get_template_part( 'template-parts/custom-post-type/single-service-gallery' );

					}else{

						get_template_part( 'template-parts/custom-post-type/single-post-gallery' );

					}

					?>
					
					<div class="hide"><?php the_content(); ?></div>

					<?php

				endwhile; // End of the loop.
			?>

		</main><!-- #main -->

	</div><!-- #primary -->

	<?php get_sidebar(); ?>

</div><!-- .wrap -->

<?php get_footer();
