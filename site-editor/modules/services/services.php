<?php
/*
Module Name: Omid Services
Module URI: http://www.siteeditor.org/modules/posts
Description: Module Omid Services For Page Builder Application
Author: Site Editor Team
Author URI: http://www.siteeditor.org
Version: 1.0.0
*/

/**
 * Class PBOmidServicesShortcode
 */
class PBOmidServicesShortcode extends PBShortcodeClass{

    /**
     * Register module with siteeditor.
     */
    function __construct() {
        parent::__construct( array(
                "name"        => "sed_omid_services",                               //*require
                "title"       => __("Omid Services","site-editor"),                 //*require for toolbar
                "description" => __("List of Omid Services","site-editor"),
                "icon"        => "icon-services",                               //*require for icon toolbar
                "module"      =>  "services"         //*require
                //"is_child"    =>  "false"       //for childe shortcodes like sed_tr , sed_td for table module
            ) // Args
        );

    }

    function get_atts(){

        $atts = array(

        );

        return $atts;

    }

    function add_shortcode( $atts , $content = null ){

        extract( $atts );

        $args = array(
            'post_type'         =>  'omid_gallery',
            'offset'            =>  0 ,
            'posts_per_page'    =>  -1
        );

        $args = apply_filters( 'sed_omid_services_module_query_args_filter' , $args , $this );

        $this->set_vars( array( "args" => $args ) );

    }

    function shortcode_settings(){

        /*$this->add_panel( 'omid_services_settings_panel' , array(
            'title'               =>  __('Omid Services Settings',"site-editor")  ,
            'capability'          => 'edit_theme_options' ,
            'type'                => 'inner_box' ,
            'priority'            => 9 ,
            'btn_style'           => 'menu' ,
            'has_border_box'      => false ,
            'icon'                => 'sedico-setting' ,
            'field_spacing'       => 'sm'
        ) );*/

        $params = array();

        $params['animation'] =  array(
            "type"                => "animation" ,
            "label"               => __("Animation Settings", "site-editor"),
            'button_style'        => 'menu' ,
            'has_border_box'      => false ,
            'icon'                => 'sedico-animation' ,
            'field_spacing'       => 'sm' ,
            'priority'            => 530 ,
        );

        $params['row_container'] = array(
            'type'          => 'row_container',
            'label'         => __('Module Wrapper Settings', 'site-editor')
        );

        return $params;

    }

}

new PBOmidServicesShortcode();

global $sed_pb_app;                      

$sed_pb_app->register_module(array(
    "group"                 =>  "basic" ,
    "name"                  =>  "services",
    "title"                 =>  __("Omid Services","site-editor"),
    "description"           =>  __("List of Omid Services","site-editor"),
    "icon"                  =>  "icon-services",
    "type_icon"             =>  "font",
    "shortcode"             =>  "sed_omid_services",
    //"priority"              =>  10 ,
    "transport"             =>  "ajax" ,
));


