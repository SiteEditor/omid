<div <?php echo $sed_attrs; ?> class="module module-gallery module-gallery-default <?php echo $class; ?> ">

    <div class="simple-gallery-wrapper">

        <div class="row">

            <?php

            if ( !is_home() && is_front_page() ){

                $gallery = get_field('images_gallery_settings'); //var_dump( $gallery );

                $lightbox_id = "omid_home_page_gallery";

                if( is_array( $gallery ) && !empty( $gallery ) ) {

                    foreach ( $gallery AS $item ) {

                        $attachment_id = $item['gallery_image_single']['id'];

                        $img = get_sed_attachment_image_html( $attachment_id , "" , "250X250" );

                        $attachment_full_src = wp_get_attachment_image_src( $attachment_id , 'full' );

                        $attachment_full_src = $attachment_full_src[0];

                        if ( ! $img ) {
                            $img = array();
                            $img['thumbnail'] = '<img class="sed-image-placeholder sed-image" src="' . sed_placeholder_img_src() . '" />';
                        }

                        if ( ! $attachment_full_src ) {
                            $attachment_full_src = sed_placeholder_img_src();
                        }

                        $title = $item['gallery_image_single_title'];

                        ?>

                        <div class="simple-gallery-item col-xs-6">

                            <div class="tme-img">

                                <a class="img" href="<?php echo $attachment_full_src;?>" data-lightbox="<?php if( !empty($lightbox_id) ) echo $lightbox_id;else echo "sed-lightbox";?>" data-title="<?php echo $title;?>" title="<?php echo $title;?>">
                                    <?php echo $img['thumbnail'];?>
                                </a>

                            </div>

                        </div>

                        <?php

                    }

                }

            }

            ?>

        </div>

    </div>
    
</div>