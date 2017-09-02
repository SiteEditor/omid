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

$lightbox_id = "omid_images_gallery_single_page";

?>

<div id="post-<?php the_ID(); ?>" <?php post_class("single-gallery-wrapper"); ?>>

	<div class="single-gallery-content">

		<div class="single-heading">
			<div class="single-heading-inner">
				<h4>
					<?php
					$in_top = get_field('show_in_top_services');

					if( $in_top ){
						_e( 'Images Gallery' , 'omid' );
					}else{
						the_title();
					}
					?>
				</h4>
			</div>
		</div>

		<div class="general-separator"></div>

		<?php omid_the_top_list_gallery_items( get_the_ID() , "gallery" );?>

		<div class="single-content">
			<div class="single-content-inner">

				<div class="gallery-slider-wrapper">

					<?php  //var_dump( $gallery );
					$num = 1;

					foreach( $gallery AS $attachment ) {

						$attachment_id = $attachment['id'];

						$img = get_sed_attachment_image_html( $attachment_id , "" , "289X289" );

						$attachment_full_src = wp_get_attachment_image_src( $attachment_id , 'full' );

						$attachment_full_src = $attachment_full_src[0];

						if ( ! $img ) {
							$img = array();
							$img['thumbnail'] = '<img class="sed-image-placeholder sed-image" src="' . sed_placeholder_img_src() . '" />';
						}

						if ( ! $attachment_full_src ) {
							$attachment_full_src = sed_placeholder_img_src();
						}

						$title = isset( $attachment['title'] ) && !empty( $attachment['title'] ) ? $attachment['title'] : "";

						?>
						<div class="gallery-slider-item">
							<div class="tme-wrapper">
								<div class="tme-img">

									<?php echo $img['thumbnail'];?>

									<div class="info">

										<div class="box-with-corner">
											<div class="box-with-corner-inner">
												<a class="lightbox-btn" href="<?php echo $attachment_full_src;?>" data-lightbox="<?php if( !empty($lightbox_id) ) echo $lightbox_id;else echo "sed-lightbox";?>" data-title="<?php echo $title;?>" title="<?php echo $title;?>">

												</a>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
						<?php

						$num++;
					}
					?>

				</div>

			</div>
		</div>

	</div>

</div> <!-- #post-## -->