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


?><div id="post-<?php the_ID(); ?>" <?php post_class("custom-post-type-single"); ?>>

	<div class="single-wrapper">

		<?php
		$post_thumbnail_id = 0;

		if ( '' !== get_the_post_thumbnail() ){

			$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );

		}

		$img = get_sed_attachment_image_html( $post_thumbnail_id , "" , "1200X400" );

		if ( ! $img ) {
			$img = array();
			$img['thumbnail'] = '<img class="sed-image-placeholder sed-image" src="' . sed_placeholder_img_src() . '" />';
		}
		?>

		<div class="single-img">
			<?php echo $img['thumbnail'];?>
		</div>

		<div class="single-heading">
			<div class="single-heading-inner">
				<h3><?php the_title();?></h3>
				<div><?php echo __("Updated On:" , "omid") . " " .twentyseventeen_time_link();?></div>
			</div>
		</div>

		<div class="single-content">
			<div class="single-content-inner">
				<?php the_content();?>
			</div>
		</div>

	</div>

</div><!-- #post-## -->