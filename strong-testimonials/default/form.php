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

                <div class="row">

                    <?php do_action( 'wpmtst_form_before_fields' ); ?>

                    <div class="col-sm-6">

                        <?php

                        $fields = wpmtst_get_form_fields( WPMST()->atts( 'form_id' ) );

                        $num = 1;

                        foreach ( $fields as $key => $field ) {

                            if( $num == 1 ){

                                ?>
                                <div class="row">

                                    <div class="col-sm-6">

                                <?php

                            }

                            wpmtst_single_form_field( $field );

                            if( $num == 1 ){

                                ?>
                                    </div>

                                    <div class="col-sm-6">

                                <?php

                            }

                            if( $num == 2 ){

                                ?>

                                    </div>
                                </div>
                                <?php
                            }

                            if( $num == 4 ){
                                echo '</div><div class="col-sm-6">';
                            }

                            $num++;
                        }

                        ?>

                        <?php wpmtst_form_submit_button(); ?>

                    </div>

                    <?php do_action( 'wpmtst_form_after_fields' ); ?>

                </div>

            </form>

        </div>

	</div>

</div>
