<div <?php echo $sed_attrs; ?> class="module module-services module-services-default <?php echo $class; ?> ">

    <?php

    $custom_query = new WP_Query( $args );

    if ( $custom_query->have_posts() ){

        ?>

        <div class="services-slider-wrapper">

            <?php
            // Start the Loop.
            while ( $custom_query->have_posts() ){

                $custom_query->the_post();

                $post_thumbnail_id = 0;

                if ( '' !== get_the_post_thumbnail() ){

                    $post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );

                }

                $img = get_sed_attachment_image_html( $post_thumbnail_id , "" , "289X289" );

                if ( ! $img ) {
                    $img = array();
                    $img['thumbnail'] = '<img class="sed-image-placeholder sed-image" src="' . sed_placeholder_img_src() . '" />';
                }

                ?>

                <div class="services-slider-item">

                    <div class="tme-wrapper">

                        <a href="<?php echo esc_url( add_query_arg( 'is_service', '1', get_permalink() ) );?>">

                            <div class="tme-heading">
                                <div class="tme-heading-inner">
                                    <h4><?php the_title();?></h4>
                                </div>
                            </div>

                            <div class="general-separator"></div>

                            <div class="tme-img">

                                <?php echo $img['thumbnail'];?>

                                <div class="info">
                                    <div class="info-inner">
                                    </div>
                                </div>

                            </div>

                        </a>

                    </div>

                </div>

                <?php

            }

            ?>

        </div>

        <?php

        wp_reset_postdata();

    }else{ ?>
        
        <div class="not-found-post">
            <p><?php echo __("Not found result" , "site-editor" ); ?> </p>
        </div>
        
    <?php 
        
    }
    
    wp_reset_query();
    
    ?>
    
</div>