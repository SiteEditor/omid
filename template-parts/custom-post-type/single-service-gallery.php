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


$gallery = get_field('omid_images_gallery');

?>

<div id="post-<?php the_ID(); ?>" <?php post_class("single-services-container"); ?>>

	<div class="box-with-corner">
		<div class="box-with-corner-inner">

			<div class="single-services-wrapper">

				<div class="single-services-content">

					<div class="single-heading">
						<div class="single-heading-inner">
							<h4>
								<?php
								$is_services = get_field('show_in_services');

								if( $is_services ){
									_e( 'Services' , 'omid' );
								}else{
									the_title();
								}
								?>
							</h4>
						</div>
					</div>

					<div class="general-separator"></div>

					<?php omid_the_top_list_gallery_items( get_the_ID() );?>

					<div class="single-content">
						<div class="single-content-inner">
							<?php the_content();?>
						</div>
					</div>

				</div>

			</div>

		</div>
	</div>

	<div class="single-services-gallery-wrapper">

		<div class="row single-services-gallery-inner">

			<?php  //var_dump( $gallery );
			$num = 1;

			foreach( $gallery AS $attachment ) {

				$img = get_sed_attachment_image_html( $attachment['id'] , "" , "400X294" );

				if ( ! $img ) {

					$img = array();

					$img['thumbnail'] = '<img class="sed-image-placeholder sed-image" src="' . sed_placeholder_img_src() . '" />';

				}

				?>
				<div class="single-services-gallery-item col-sm-4">

					<div class="tme-img">

						<?php echo $img['thumbnail'];?>

					</div>

				</div>
				<?php

				if( $num === 3 ){
					break;
				}

				$num++;
			}
			?>

		</div>

		<div class="divider-link">
			<div class="divider-content">
				<button><a href="<?php the_permalink();?>" class=""><?php _e( 'View Gallery' , 'omid' );?></a></button>
			</div>
		</div>

	</div>

</div><!-- #post-## -->       