<?php

	add_theme_support( 'post-thumbnails' );

//load scripts
	function oficyna_enqueue_styles() {
		wp_register_style('oficyna_style', get_stylesheet_directory_uri() . '/css/main.css', array(), NULL, 'screen');

	    $parent_style = 'parent-style';

	    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	    wp_enqueue_style( 'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		wp_get_theme()->get('Version')
	    );
		wp_enqueue_style('oficyna_style');
	}
	add_action( 'wp_enqueue_scripts', 'oficyna_enqueue_styles' );

	function oficyna_enqueue_scripts() {
		wp_register_script('oficyna_js', get_stylesheet_directory_uri() . '/js/main.js', array('jquery'), NULL, 'screen');

		wp_enqueue_script('oficyna_js');
	}
	add_action('wp_enqueue_scripts', 'oficyna_enqueue_scripts',999);

//oficyna

	include 'custom_post_types/warsztat.php';

?>
