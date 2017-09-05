<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>
<div id="post-<?php the_ID(); ?>" <?php post_class("single-video-wrapper"); ?>>

	<div class="current-video-wrapper">

		<?php

		$self_hosted_video = get_field( "self_hosted_video_url" );

		if( !empty( $self_hosted_video ) ){

			$poster_url = get_the_post_thumbnail_url( get_the_ID() , "full" );

			if ( ! $poster_url ) {
				$poster_url = "";
			}

			echo do_shortcode('[video src="' . $self_hosted_video["url"] . '" poster="' . $poster_url . '"]');

		}else{

			$external_video_code = get_field( "external_video_url" );

			echo $external_video_code;

		}

		?>

	</div>

	<div class="video-slider-wrapper">

		<?php
		$args = array(
			'post_type'         =>  'omid_video',
			'offset'            =>  0 ,
			'posts_per_page'    =>  -1,
			'post_status'       => 'publish',
		);

		$current_id = get_the_ID();

		$custom_query = new WP_Query( $args );

		if ( $custom_query->have_posts() ) {

			// Start the Loop.
			while ($custom_query->have_posts()) {

				$custom_query->the_post();

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

				<div class="video-slider-item <?php if( $current_id == get_the_ID() ) echo "active";?>">

					<div class="tme-wrapper">

						<div class="tme-img">

							<?php echo $img['thumbnail']; ?>

							<div class="tme-img-info">
								<a class="play-btn" href="<?php the_permalink();?>"></a>
							</div>

						</div>

					</div>

				</div>

				<?php

			}

		}
		?>

	</div>

	<div class="video-cat-wrapper">

		<div class="video-cat-item active"><a href="<?php echo get_post_type_archive_link('omid_video');?>" class=""><?php _e("All" , "omid");?></a></div>
		
		<?php

		$terms = get_terms( 'video_cat' , array(
			'hide_empty' => true,
		) );

		if( !empty( $terms ) && is_array( $terms ) ) {

			foreach ( $terms AS $term ) {
				?>

				<div class="video-cat-item"><a href="<?php echo get_term_link( $term );?>" class=""><?php echo $term->name;?></a></div>

				<?php
			}

		}
		?>

	</div>

</div>

