<?php

/*
 * Template Name: One Page
 * Description: Create the famous One Page site with binding scrolling navigation
 */

?>

<?php get_header(); ?>

<?php $is_using_vc = get_post_meta( get_the_ID(), '_wpb_vc_js_status', true ); ?>

<section id="title" class="title-section section <?php echo willow_option( 'title_section_color_scheme', 'dark' ); ?>-scheme">

    <?php if ( ! empty( $title_section_background_image ) ) : ?>
        <div class="section-background <?php echo ( ! empty( $background_overlay ) ) ? $background_overlay : ''; ?> <?php echo $enable_parallax ? 'parallax-background js-parallax' : ''; ?>" style="background-image: url(<?php echo $title_section_background_image; ?>); <?php echo willow_build_background_repeat_style( $background_repeat ); ?>;" data-parallax="background"></div>
    <?php endif; ?>

    <div class="container">
        <h1 class="wpb_willow_big_title wpb_content_element text-center">
            <div class="wpb_wrapper">
                <span><?php echo get_the_title(); ?></span>
            </div class="wpb_wrapper">
        </h1>
    </div>
</section>

<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>

	<?php if ( $is_using_vc === 'true' ) : ?>

		<div id="content" <?php post_class( 'visual-composer-page' ); ?>>

			<div class="section-anchor" data-anchor="remove" data-section="#header"></div>

			<?php the_content(); ?>

		</div>

	<?php else : ?>

		<section id="content" class="content-section section">
			<div class="container container-table">

				<div class="main-section" role="main">

					<div class="page-loop">

						<article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
							<?php the_content(); ?>
						</article>

					</div>

					<?php comments_template(); ?>

				</div>

				<?php get_sidebar(); ?>

			</div>
		</section>

	<?php endif; ?>

<?php endwhile; endif; ?>

<?php if ( willow_option( 'enable_preloader', 1 ) ) : ?>
	<div id="jpreContent">
		<div class="site-logo">
			<?php $preloader_logo = willow_option( 'preloader_logo' ); ?>

			<?php if ( ! empty( $preloader_logo ) ) : ?>
				<img src="<?php echo $preloader_logo; ?>" alt="<?php bloginfo( 'name' ); ?>" />
			<?php else : ?>
				<span><?php bloginfo( 'name' ); ?></span>
			<?php endif ?>
		</div>
	</div>
<?php endif; ?>

<?php get_footer(); ?>
