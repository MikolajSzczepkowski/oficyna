			<footer>
				<section>
					<h3>Chcesz być na bieżąco?</h3>
					<p>
						Zapisz się do naszego newslettera, aby otrzymać informacje o aktualnych warsztatach i kursach oraz nowych publikacjach.
					</p>
					<?php echo do_shortcode( '[contact-form-7 id="102" title="Footer form"]' ); ?>
					<h5>Zapisz się do naszego newslettera, aby otrzymać informacje o aktualnych warsztatach i kursach oraz nowych publikacjach.</h5>
				</section>
				<section>
					<div>
						<a href="#">fb</a>
						<a href="#">insta</a>
					</div>
					<div>
						<h5>
							<span>©2016 <a href='<?php the_permalink(); ?>'>Oficyna peryferie</a>, ul. Stalowa 3, warszawa</span>
							oficynaperyferiE@gmail.com
						</h5>
					</div>
					<div>
						<a href="#" target="_blank">KREACJA</a>
					</div>
				</section>
				<section>
					<a href='<?php the_permalink(); ?>'>
						<img src="<?php echo willow_option( 'preloader_logo' ); ?>" alt="<?php bloginfo( 'name' ); ?>" >
					</a>
				</section>
			</footer>

		</div>

		<div id="popup-document" class="popup-document">
			<div class="markup hidden">
				<div class="mfp-iframe-scaler">
					<iframe src="" class="mfp-iframe" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
		</div>

		<!-- BEGIN CUSTOM FOOTER SCRIPTS -->
		<?php echo willow_kses( willow_option( 'foot_script' ) ); ?>
		<!-- END CUSTOM FOOTER SCRIPTS -->

		<?php wp_footer(); ?>

	</body>

</html>
