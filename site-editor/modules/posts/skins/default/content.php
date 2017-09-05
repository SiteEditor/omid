<?php

$post_thumbnail_id = 0;

if ( '' !== get_the_post_thumbnail() ){

    $post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );

}

$img = get_sed_attachment_image_html( $post_thumbnail_id , "" , "400X300" );

if ( ! $img ) {
    $img = array();
    $img['thumbnail'] = '<img class="sed-image-placeholder sed-image" src="' . sed_placeholder_img_src() . '" />';
}

$link = get_field('portfolio_gallery_link');

$link = !$link ? "#" : $link;

//$excerpt_length = 50;

$content_post = apply_filters('the_excerpt', get_the_excerpt());

# FILTER EXCERPT LENGTH
if( strlen( $content_post ) > $excerpt_length )
    $content_post = mb_substr( $content_post , 0 , $excerpt_length - 3 ) . '...';

?>

<div class="portfolio-gallery-item">

    <div class="tme-wrapper row">

        <?php if( $num_post % 2 == 1 ) { ?>

            <div class="col-sm-6 tme-img-wrap">

                <div class="tme-img">

                    <?php echo $img['thumbnail'];?>

                </div>

            </div>

        <?php } ?>

        <div class="col-sm-6">

            <div class="tme-heading">
                <div class="tme-heading-inner">
                    <h4><?php the_title();?></h4>
                </div>
            </div>

            <div class="tme-content">

                <div class="tme-content-inner">
                    <p><?php echo $content_post;?></p>
                </div>

                <div class="tme-btn"><a href="<?php echo esc_url( $link );?>" class="text-first-main"><?php echo __("Enter","omid");?></a></div>

            </div>

        </div>

        <?php if( $num_post % 2 == 0 ) { ?>

            <div class="col-sm-6 tme-img-wrap">

                <div class="tme-img">

                    <?php echo $img['thumbnail'];?>

                </div>

            </div>

        <?php } ?>

    </div>

</div>

