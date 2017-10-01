<div class="blog-loop">
	<div class="blog-main-link">
		<h1>
			<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">
				<span>oficyna peryferie blog</span>
				<span class="blog-title"><?php if ( pll_current_language() == 'pl' ) : ?>ciekawsza strona druku<?php else : ?>make print great again<?php endif; ?></span>
			</a>
		</h1>
	</div>
	<?php if ( have_posts() ) : while( have_posts() ) : the_post() ; ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'row content-post' ); ?>>

			<?php if ( !is_single() ) : ?>
				<div class="blog-post">
					<?php if ( has_post_thumbnail() ) : ?>

						<div class="post-thumbnail">
							<a href="<?php the_permalink(); ?>">
								<img src="<?php echo willow_aq_resize( get_post_thumbnail_id(), 790, 500, true, true ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" />
							</a>
						</div>
					<?php else : ?>
						<div class="post-thumbnail blank"></div>
					<?php endif; ?>

					<ul class="post-info blue-text">
						<li class="post-info-date"><?php echo get_the_date(); ?><hr></li>
						<li class="post-info-category"><span><?php if ( pll_current_language() == 'pl' ) : ?>KATEGORIA<?php else : ?>CATEGORY<?php endif; ?> </span> <?php echo the_category(); ?></li>
					</ul>

					<div class="col-lg-8 col-lg-offset-4 blog-post-text">
						<h2 class="post-title bigger-text">
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</h2>
						<div class="post-content blue-text">
							<?php the_excerpt(); ?>
						</div>
						<a class="blog-post-read-more" href="<?php the_permalink(); ?>"><?php if ( pll_current_language() == 'pl' ) : ?>CZYTAJ DALEJ<?php else : ?>READ MORE<?php endif; ?></a>
						<div class="post-tags tagcloud">
							<?php the_tags( '', '', '' ); ?>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<?php if ( is_single() ) : ?>
				<ul class="post-info blue-text">
					<li class="post-info-date"><?php echo get_the_date(); ?><hr></li>
					<li class="post-info-category"><span><?php if ( pll_current_language() == 'pl' ) : ?>KATEGORIA<?php else : ?>CATEGORY<?php endif; ?> </span> <?php echo the_category(); ?></li>
				</ul>

				<h2 class="post-title bigger-text">
					<?php the_title(); ?>
				</h2>

				<?php if ( has_post_thumbnail() ) : ?>

					<div class="post-thumbnail">
						<img src="<?php echo willow_aq_resize( get_post_thumbnail_id(), 790, 500, true, true ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" />
					</div>
				<?php else : ?>
					<div class="post-thumbnail blank"></div>
				<?php endif; ?>

				<div class="post-content">
					<?php ob_start(); ?>
					<p class="read-more text-center">
						<a href="<?php the_permalink(); ?>" class="btn btn-black"><?php _e( 'Read More', 'willow' ); ?></a>
					</p>
					<?php $read_more = ob_get_clean(); ?>

					<?php the_content( $read_more ); ?>

				</div>

				<?php wp_link_pages(array(
					'before' => '<p class="post-pagination">',
					'after ' => '</p>',
					'link_before' => '',
					'link_after' => '',
					'next_or_number' => 'next',
					'nextpagelink' => '<span class="next">' . __( 'Next Page &raquo;', 'willow' ) . '</span>',
					'previouspagelink' => '<span class="prev">' . __( '&laquo; Previous Page', 'willow' ) . '</span>',
				)); ?>
				<div class="post-tags tagcloud">
					<?php the_tags( '', '', '' ); ?>
				</div>
				<div class="share-buttons">
					<h4><?php if ( pll_current_language() == 'pl' ) : ?>PODZIEL SIĘ<?php else : ?>SHARE<?php endif; ?></h4>
					<?php echo do_shortcode('[addtoany buttons="facebook,twitter,linkedin,pinterest"]'); ?>
				</div>

			<?php endif; ?>

		</article>

	<?php endwhile; endif; ?>
</div>
