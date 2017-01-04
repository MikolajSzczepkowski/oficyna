<div class="blog-loop">
	<?php if ( have_posts() ) : while( have_posts() ) : the_post() ; ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'content-post' ); ?>>
			<ul class="post-info blue-text">
				<li class="post-info-date"><?php echo get_the_date(); ?><hr></li>
				<li class="post-info-category"><span>KATEGORIA </span> <?php echo the_category(); ?></li>
				<li class="post-info-author"><span>AUTOR </span> <?php echo the_author_posts_link(); ?></li>
			</ul>

			<h2 class="post-title bigger-text">
				<?php if ( ! is_single( get_the_ID() ) ) : ?>
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
				<?php else : ?>
					<?php the_title(); ?>
				<?php endif; ?>
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

			<?php if ( is_single() ) : ?>

					<?php wp_link_pages(array(
						'before' => '<p class="post-pagination">',
						'after ' => '</p>',
						'link_before' => '',
						'link_after' => '',
						'next_or_number' => 'next',
						'nextpagelink' => '<span class="next">' . __( 'Next Page &raquo;', 'willow' ) . '</span>',
						'previouspagelink' => '<span class="prev">' . __( '&laquo; Previous Page', 'willow' ) . '</span>',
					)); ?>
				<div class="share-buttons">
					<h4>PODZIEL SIĘ</h4>
					<?php echo do_shortcode('[addtoany buttons="facebook,twitter,linkedin,pinterest"]'); ?>
				</div>
				<div class="post-tags tagcloud">
					<?php the_tags( '', '', '' ); ?>
				</div>
			<?php endif; ?>

		</article>

	<?php endwhile; endif; ?>
</div>
