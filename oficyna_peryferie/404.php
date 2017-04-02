<?php get_header(); ?>

<section id="content" class="content-section section">
	<div class="container">

		<div class="page-not-found">
			<h1>Ups, coś poszło nie tak</h1>
			<p>Strona o podanym adresie nie istnieje.<br>
			<a href='<?php echo home_url(); ?>'>Wróć do strony głównej</a></p>
			<a href='<?php echo home_url(); ?>'>
				<img src="<?php echo willow_option( 'preloader_logo' ); ?>" alt="<?php bloginfo( 'name' ); ?>" >
			</a>
		</div>
	</div
</section>


<?php get_footer(); ?>
