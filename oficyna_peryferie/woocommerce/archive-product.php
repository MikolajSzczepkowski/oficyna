<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
	<div class="container">
		<div class="shop-inner">

			<?php
			/**
			* woocommerce_before_main_content hook.
			*
			* @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
			* @hooked woocommerce_breadcrumb - 20
			*/
			do_action( 'woocommerce_before_main_content' );
			?>

			<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

				<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>

			<?php endif; ?>
			<h2>przed archive description</h2>
			<?php
			/**
			* woocommerce_archive_description hook.
			*
			* @hooked woocommerce_taxonomy_archive_description - 10
			* @hooked woocommerce_product_archive_description - 10
			*/
			do_action( 'woocommerce_archive_description' );
			?>
			<div class="col-md-9 col-md-push-3 shop-main">

				<?php if ( have_posts() ) : ?>
					<h2>loop</h2>
					<?php
					/**
					* woocommerce_before_shop_loop hook.
					*
					* @hooked woocommerce_result_count - 20
					* @hooked woocommerce_catalog_ordering - 30
					*/
					do_action( 'woocommerce_before_shop_loop' );
					?>

					<?php woocommerce_product_loop_start(); ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php wc_get_template_part( 'content', 'product' ); ?>
						<h2>produkt loop</h2>

					<?php endwhile; // end of the loop. ?>

					<?php woocommerce_product_loop_end(); ?>

					<?php
					/**
					* woocommerce_after_shop_loop hook.
					*
					* @hooked woocommerce_pagination - 10
					*/
					do_action( 'woocommerce_after_shop_loop' );
					?>

				<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

					<?php wc_get_template( 'loop/no-products-found.php' ); ?>

				<?php endif; ?>

			</div>
			<div class="col-md-3 col-md-pull-9 shop-sidebar">
				<ul class="sidebar-categories">

				<?php
					$args = array(
					    'number'     => $number,
					    'orderby'    => 'ID',
					    'order'      => 'ASC',
					    'hide_empty' => true,
					    'include'    => $ids,
						'parent'     => 0,
					);
					$child_args = array(
					    'number'     => $number,
					    'orderby'    => 'ID',
					    'order'      => 'ASC',
					    'hide_empty' => true,
					    'include'    => $ids,
					);
					$product_categories = get_terms( 'product_cat', $args );
					$product_categories_children = get_terms( 'product_cat', $child_args );
					foreach( $product_categories as $cat ) {
						echo '<li>';
						echo '<a href="' . get_term_link( $cat ) . '">' . $cat->name . '</a>';

						foreach( $product_categories_children as $category ) {
							if( $cat->term_id == $category->parent ) {
								echo '<li class="subcategory"><a href="' . get_term_link( $category ) . '">' . $category->name . '</a></li>';
							}
						}

						echo '</li>';
					}
				?>
				</ul>
			</div>
			<?php
			/**
			* woocommerce_after_main_content hook.
			*
			* @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			*/
			do_action( 'woocommerce_after_main_content' );
			?>
		</div>


	</div>

<?php get_footer( 'shop' ); ?>
