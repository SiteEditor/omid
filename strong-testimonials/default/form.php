<?php
/**
 * Template Name: Default Form
 * Description: The default form template.
 */
?>
<div class="strong-view strong-form <?php wpmtst_container_class(); ?>"<?php wpmtst_container_data(); ?>>

	<div id="wpmtst-form">

        <div class="strong-form-inner">

            <?php wpmtst_field_required_notice(); ?>

            <form <?php wpmtst_form_info(); ?>>

                <?php wpmtst_form_setup(); ?>

                <?php do_action( 'wpmtst_form_before_fields' ); ?>

                <?php

                $fields = wpmtst_get_form_fields( WPMST()->atts( 'form_id' ) );

                $num = 1;

                foreach ( $fields as $key => $field ) {

                    if( $num == 1 ){

                    }

                    wpmtst_single_form_field( $field );

                    if( $num == 2 ){

                    }

                    if( $num == 4 ){

                    }

                    $num++;
                }

                ?>

                <?php do_action( 'wpmtst_form_after_fields' ); ?>

                <?php wpmtst_form_submit_button(); ?>

            </form>

        </div>

	</div>

</div>
