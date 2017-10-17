<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
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
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( pll_current_language() == 'pl' ) : get_header( 'shop' ); else : get_header( 'shop-en' ); endif;
?>
<div class="shop-container container">
	<div class="col-md-9 col-md-push-3 shop-main">
		<?php
			/**
			 * woocommerce_before_main_content hook.
			 *
			 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
			 * @hooked woocommerce_breadcrumb - 20
			 */
			do_action( 'woocommerce_before_main_content' );
		?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php wc_get_template_part( 'content', 'single-product' ); ?>

			<?php endwhile; // end of the loop. ?>

		<?php
			/**
			 * woocommerce_after_main_content hook.
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action( 'woocommerce_after_main_content' );
		?>
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
</div>
<?php get_footer( 'shop' ); ?>
