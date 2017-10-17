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
if ( pll_current_language() == 'pl' ) : get_header( 'shop' ); else : get_header( 'shop-en' ); endif;
?>
   <?php if ( pll_current_language() == 'pl' ) : else : pll_the_languages(array('show_flags'=>1,'hide_current'=>1)); endif; ?>
	<div class="shop-header">

		<?php if ( is_shop() ) :?>
			<div class="logo-container">
				<img src="<?php echo willow_option( 'preloader_logo' ); ?>" alt="<?php bloginfo( 'name' ); ?>" >
			</div>
		<?php endif; ?>
		<?php
		/**
		* woocommerce_archive_description hook.
		*
		* @hooked woocommerce_taxonomy_archive_description - 10
		* @hooked woocommerce_product_archive_description - 10
		*/
		do_action( 'woocommerce_archive_description' );
		?>
	</div>
	<div class="shop-container container">
		<?php
		/**
		* woocommerce_before_main_content hook.
		*
		* @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		* @hooked woocommerce_breadcrumb - 20
		*/
		do_action( 'woocommerce_before_main_content' );


		?>

		<div class="col-md-9 col-md-push-3 shop-main">

			<?php if ( is_shop() ) :?>

				<h3 class="widget-title">
					<span><?php if ( pll_current_language() == 'pl' ) : ?>Nowości<?php else : ?>New Releases<?php endif; ?></span>
				</h3>
				<?php if ( pll_current_language() == 'pl' ) : ?>
					<?php echo do_shortcode('[product_category category="nowosci"]'); ?>
				<?php else : ?>
					<?php echo do_shortcode('[product_category category="new-releases"]'); ?>
				<?php endif; ?>

				<h3 class="widget-title">
					<span><?php if ( pll_current_language() == 'pl' ) : ?>Bestsellery<?php else : ?>Bestsellers<?php endif; ?></span>
				</h3>
				<?php if ( pll_current_language() == 'pl' ) : ?>
					<?php echo do_shortcode('[product_category category="bestsellery"]'); ?>
				<?php else : ?>
					<?php echo do_shortcode('[product_category category="bestsellers"]'); ?>
				<?php endif; ?>
			<?php else: ?>

				<h3 class="widget-title">
					<span><?php single_cat_title(); ?></span>
				</h3>

				<?php if ( have_posts() ) : ?>

					<?php woocommerce_product_loop_start(); ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php  the_category(); ?>
						<?php wc_get_template_part( 'content', 'product' ); ?>

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

<?php get_footer( 'shop' ); ?>
