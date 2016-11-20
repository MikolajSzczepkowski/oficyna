<?php get_header('site'); ?>
  <section class="workshop-container container single-workshop">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <div>
        <h2><?php the_title(); ?></h2>
        <div class="workshop-logo" style="background-image: url( <?php the_post_thumbnail_url(); ?>) ;"></div>
        <p>
          <?php the_excerpt(); ?>
        </p>
        <a href="<?php the_permalink(); ?>">Sprawdź</a>
      </div>
      <!-- post -->
    <?php endwhile; ?>
    <!-- post navigation -->
    <?php else: ?>
      <!-- no posts found -->
    <?php endif; ?>
  </section>
<?php get_footer(); ?>
