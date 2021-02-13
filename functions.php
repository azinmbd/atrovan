<?php

//load stylesheet

function load_stylesheets(){

    wp_register_style('bootstrap',get_stylesheet_directory_uri(). '/css/bootstrap.min.css', array(),1,'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('fontiran',get_stylesheet_directory_uri(). '/css/fontiran.css', array(),1,'all');
    wp_enqueue_style('fontiran');

    wp_register_style('font_awesome',get_stylesheet_directory_uri(). '/css/all.min.css', array(),1,'all');
    wp_enqueue_style('font_awesome');

    wp_register_style('style',get_stylesheet_directory_uri(). '/css/style.css?v=2', array(),1,'all');
    wp_enqueue_style('style');

    wp_register_style('animation',get_stylesheet_directory_uri(). '/css/animation.css?v=2.2', array(),1,'all');
    wp_enqueue_style('animation');

    wp_register_style('costume',get_stylesheet_directory_uri(). '/costume.css', array(),1,'all');
    wp_enqueue_style('costume');

}

add_action('wp_enqueue_scripts','load_stylesheets');







//load script

function addjs() {
    wp_enqueue_script('jquery', get_template_directory_uri().'/js/jquery-3.4.1.min.js', array(), '1.11.2', 1 );
    // wp_enqueue_script('modernizr', get_template_directory_uri().'/js/modernizr.js', array() );
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array(), '1.0', true );
    wp_enqueue_script('leaflet', get_template_directory_uri().'/js/leaflet.js', array(),"1.6.0", 1 );
    wp_enqueue_script('animation', get_template_directory_uri().'/js/animation.js', array(),"1:199", 1 );
    wp_enqueue_script('fleet', get_template_directory_uri().'/js/fleet.js',  array('jquery'), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'addjs' );








//menu support
add_theme_support( 'menus' );



//register main menu
register_nav_menus(

    array(
        'blog-tab' => __( 'Blog Tab' ),	

    )
);


//title
add_theme_support( 'title-tag' );


//post support feature image
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 760, 350, array( 'center', 'center')  );

//activate widget
function mytheme_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Scrisoft Sidebar', 'scrisoft' ),
        'id'            => 'sidebar-1',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<div id="cat">',
        'after_title'   => '</div>',
    ) );
}

add_action( 'widgets_init', 'mytheme_widgets_init' );