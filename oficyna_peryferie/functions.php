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
		wp_register_script('oficyna_typographer', get_stylesheet_directory_uri() . '/js/jquery.typographer.min.pack.js', array('jquery'), NULL, 'screen');
		wp_register_script('oficyna_typographer_hyph', get_stylesheet_directory_uri() . '/js/hyph-pl.min.js', array('jquery'), NULL, 'screen');

		wp_enqueue_script('oficyna_typographer');
		wp_enqueue_script('oficyna_typographer_hyph');
		wp_enqueue_script('oficyna_js');
	}
	add_action('wp_enqueue_scripts', 'oficyna_enqueue_scripts',999);

//oficyna

	include 'custom_post_types/warsztat.php';
	include 'custom_post_types/usluga.php';

	add_action( 'woocommerce_before_shop_loop_item_title', 'oficyna_add_product_cat', 25);
	function oficyna_add_product_cat()
	{
	    global $product;
	    $product_cats = wp_get_post_terms($product->id, 'product_cat');
	    $count = count($product_cats);
	    foreach($product_cats as $key => $cat)
	    {
	        echo '<span class="shop-category">'.$cat->name.'</span>';
	        if($key < ($count-1))
	        {
	            echo ' ';
	        }
	        else
	        {
	            echo ' ';
	        }
	    }
	}

	function stock_diaplay() {
	    global $product;
	    if ( $product->is_in_stock() ) {
	        echo '<p class="stock" >' . $product->get_stock_quantity() . __( ' Na stanie', 'envy' ) . '</p>';
	    } else {
	        echo '<p class="out-of-stock" >' . __( 'Brak', 'envy' ) . '</p>';
	    }
	}
	add_action( 'woocommerce_after_shop_loop_item_title', 'stock_diaplay' );


	add_filter( 'woocommerce_breadcrumb_home_url', 'woo_custom_breadrumb_home_url' );
	function woo_custom_breadrumb_home_url() {
	    return 'http://oficynaperyferie.pl/sklep/';
	}

	function woo_related_products_limit() {
	  global $product;

		$args['posts_per_page'] = 3;
		return $args;
	}
	add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
	  function jk_related_products_args( $args ) {
		$args['posts_per_page'] = 3; // 4 related products
		$args['columns'] = 4; // arranged in 2 columns
		return $args;
	}

	// remove wp version number in head
	remove_action('wp_head', 'wp_generator');

?>
