<?php
/**
 * Mex Banner Slide
 *
 * @wordpress-plugin
 * Plugin Name:   Mex Banner Slide
 * Plugin URI:    https://www.mex.com/
 * Description:   Search For website use to Dev mex
 * Version:       1.0.1
 * Author:        Dev Team 
 * Update URI:    https://www.mex.com/
 * Text Domain:   mex
 */
  
date_default_timezone_set('Asia/Bangkok');

if(!defined('MEX_SLIDEBANNER_PATH')){
    define('MEX_SLIDEBANNER_PATH', plugin_dir_path(__FILE__).'dist');
}

if(!defined('MEX_SLIDEBANNER_URL')){
    define('MEX_SLIDEBANNER_URL', plugin_dir_url(__FILE__).'dist');
}

if(!function_exists('mex_bannerslide')){
    function mex_bannerslide($atts)
    {

        $a = shortcode_atts( array(
            'get_field'  =>  ''
        ), $atts );
        if(\Elementor\Plugin::$instance->editor->is_edit_mode()) {
            echo '[mex_banner_slides]';
            return true;
        }elseif (\Elementor\Plugin::$instance->preview->is_preview_mode() ){
            return false;
        }else{
            wp_enqueue_style(
                'mex-slide-style', MEX_SLIDEBANNER_URL. '/css/app.css',
                [],
                filemtime(MEX_SLIDEBANNER_PATH. '/css/app.css')
            );
            wp_enqueue_script(
                'mex-slide-js', MEX_SLIDEBANNER_URL. '/js/app.js',
                [],
                filemtime(MEX_SLIDEBANNER_PATH. '/js/app.js')
            );
            require_once(plugin_dir_path(__DIR__). 'mex-banner-slide/template/mex-banner.php');
        }
    }
}
add_shortcode('mex_banner_slides','mex_bannerslide');


function hide_html_content_on_edit_page() {
    global $pagenow;
    
    if ($pagenow == 'post.php' && isset($_GET['post']) && get_post_type($_GET['post']) == 'page') {
        echo '<style>.slides {display: none;}</style>';
    }
}

add_action('admin_head', 'hide_html_content_on_edit_page');