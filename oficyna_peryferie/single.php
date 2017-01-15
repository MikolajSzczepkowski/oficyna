<?php get_header(); ?>

<section id="content" class="content-section section">
	<div class="container container-table">

		<div class="main-section" role="main">

			<?php get_template_part( 'loop' ); ?>

			<?php if ( willow_option( 'enable_related_posts' ) ) : ?>

				<?php global $wp_query;
				$cat_arr = array();
				foreach ( get_the_category() as $category ) {
					array_push( $cat_arr, $category->term_id );
				}

				$temp = $wp_query;
				$wp_query = new WP_Query( array(
					'orderby'        => 'rand',
					'order'          => 'DESC',
					'post_type'      => 'post',
					'posts_per_page' => 4,
					'post__not_in'   => array( get_the_ID() ),
					'category__in'   => $cat_arr,
					'post_status'    => 'publish',
				) );

				if ( have_posts() ) : ?>
					<div class="related-posts">
						<h3 class="widget-title"><span><?php _e( 'INNE POWIĄZANE WPISY', 'willow' ); ?></span></h3>
						<ul class="related-posts-list row">
							<?php while ( have_posts() ) : the_post(); ?>
								<li <?php post_class( 'grid-post related-post col-sm-3 col-md-6 col-lg-3' ); ?>>
									<div class="related-post-date">
										<?php echo get_the_date(); ?>
										<hr>
									</div>
									<p class="related-post-category">
										kategoria
										<?php $categories = get_the_category();
											echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>'; ?>
									</p>
									<h3 class="related-post-title">
										<a href="<?php the_permalink(); ?>">
											<?php the_title(); ?>
										</a>
									</h3>
									<p class="related-post-excerpt">
										<?php the_excerpt(); ?>
									</p>
									<a class="related-post-read-more" href="<?php the_permalink(); ?>">CZYTAJ DALEJ</a>
								</li>
							<?php endwhile; ?>
						</ul>
					</div>
				<?php endif;

				$wp_query = $temp;
				wp_reset_postdata(); ?>

			<?php endif; ?>

			<?php comments_template(); ?>

		</div>

		<?php get_sidebar(); ?>

	</div>
</section>

<?php get_footer(); ?>
