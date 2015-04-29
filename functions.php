<?php

require( get_template_directory() . '/post-types/books.php' );


add_action( 'wp_enqueue_scripts', 'twentytwelve_parent_theme_enqueue_styles' );

function twentytwelve_parent_theme_enqueue_styles() {
    wp_enqueue_style( 'twentytwelve-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( '-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('twentytwelve-style')
    );

}

