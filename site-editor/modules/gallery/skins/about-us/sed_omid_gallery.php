<div <?php echo $sed_attrs; ?> class="module module-posts module-posts-skin1 <?php echo $class; ?> ">

    <div class="box-with-corner">

        <div class="box-with-corner-inner">

            <div class="about-gallery-wrapper row">

                <?php

                $gallery = get_field('images_gallery_settings'); //var_dump( $gallery );

                if( is_array( $gallery ) && !empty( $gallery ) ) {

                    $num = 1;

                    foreach ( $gallery AS $item ) {

                        $attachment_id = $item['gallery_image_single']['id'];

                        $img = get_sed_attachment_image_html( $attachment_id , "" , "400X294" );

                        if ( ! $img ) {
                            $img = array();
                            $img['thumbnail'] = '<img class="sed-image-placeholder sed-image" src="' . sed_placeholder_img_src() . '" />';
                        }

                        $title =  apply_filters( 'the_title' , $item['gallery_image_single_title'] );

                        $description = $item['gallery_image_single_description'];

                        $class = $num % 3 == 1 && $num > 1 ? "clear" : "";

                        ?>

                        <div class="about-gallery-item col-sm-4 <?php echo esc_attr( $class );?>">

                            <div class="tme-wrapper">

                                <div class="tme-img">

                                    <?php echo $img['thumbnail'];?>

                                    <div class="info">
                                        <div class="info-inner">

                                            <div class="divider-link">
                                                <span class="divider-content">
                                                    <button><a href="javascript:void(0);" class=""><?php echo $title;?></a></button>
                                                </span>
                                            </div>

                                            <div class="general-separator sm"></div>

                                            <div class="info-content">
                                                <p><?php echo apply_filters( 'omid_short_description' , $description ); ?></p>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <?php
                        $num++;
                    }
                }
                ?>

            </div>

        </div>

    </div>
    
</div>