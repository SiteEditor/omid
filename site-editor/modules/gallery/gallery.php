<?php
/*
Module Name: Omid Gallery
Module URI: http://www.siteeditor.org/modules/omid-services
Description: Module Omid Gallery For Page Builder Application
Author: Site Editor Team
Author URI: http://www.siteeditor.org
Version: 1.0.0
*/

/**
 * Class PBOmidGalleryShortcode
 */
class PBOmidGalleryShortcode extends PBShortcodeClass{

    /**
     * Register module with siteeditor.
     */
    function __construct() {
        parent::__construct( array(
            "name"        => "sed_omid_gallery",                               //*require
            "title"       => __("Omid Gallery","site-editor"),                 //*require for toolbar
            "description" => __("List of Omid Gallery","site-editor"),
            "icon"        => "icon-gallery",                               //*require for icon toolbar
            "module"      =>  "gallery"         //*require
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

    }

    function shortcode_settings(){

        /*$this->add_panel( 'omid_services_settings_panel' , array(
            'title'               =>  __('Omid Gallery Settings',"site-editor")  ,
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

new PBOmidGalleryShortcode();

global $sed_pb_app;

$sed_pb_app->register_module(array(
    "group"                 =>  "basic" ,
    "name"                  =>  "gallery",
    "title"                 =>  __("Omid Gallery","site-editor"),
    "description"           =>  __("List of Omid Gallery","site-editor"),
    "icon"                  =>  "icon-gallery",
    "type_icon"             =>  "font",
    "shortcode"             =>  "sed_omid_gallery",
    //"priority"              =>  10 ,
    "transport"             =>  "ajax" ,
));


