<?php get_header( 'shop' ); ?>

<?php $is_using_vc = get_post_meta( get_the_ID(), '_wpb_vc_js_status', true ); ?>

<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>

		<section id="content" class="content-section section" <?php post_class( 'visual-composer-page' ); ?>>
			<div class="container container-table shop-container">

				<div class="col-md-9 col-md-push-3 shop-page" role="main">

					<div class="page-loop">

						<article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
							<?php the_content(); ?>
							<ul>
								<?php

								$authors = get_terms( 'pa_autor', array(
								    'orderby'    => 'ASC',
								    'hide_empty' => 0
								) );
								foreach( $authors as $author ) {
									$author_link = get_term_link( $author->slug, 'pa_autor' );
									echo '<li class=""><a href="' . $author_link . '">' . $author->name . '</a></li>';
								}

	 							?>
							</ul>
						</article>

					</div>

					<?php comments_template(); ?>

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
		</section>

<?php endwhile; endif; ?>

<?php get_footer( 'shop' ); ?>
