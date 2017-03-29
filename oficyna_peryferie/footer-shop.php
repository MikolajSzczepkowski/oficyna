			<footer>
				<section class="shop-footer">
					<div class="container lines-container">
						<div class="col-sm-3 ">
							<div class="lines">
							</div>
						</div>
						<div class="col-sm-3 hidden-xs ">
							<div class="lines">
							</div>
						</div>
						<div class="col-sm-3 hidden-xs">
							<div class="lines">
							</div>
						</div>
						<div class="col-sm-3 hidden-xs">
							<div class="lines">
							</div>
						</div>
					</div>
					<div class="container">
						<div class="col-xs-12 col-sm-3">
							<h4>mapa sklepu</h4>
							<?php wp_nav_menu( array(
								'menu' 				=> 'map-menu',
								'depth'             => 0,
								'container'         => false,
							) ); ?>
						</div>
						<div class="col-xs-12 col-sm-3">
							<h4>pomoc</h4>
							<?php wp_nav_menu( array(
								'menu' 				=> 'help-menu',
								'depth'             => 0,
								'container'         => false,
							) ); ?>
						</div>
						<div class="col-xs-12 col-sm-3">
							<h4>warunki zakupów</h4>
							<?php wp_nav_menu( array(
								'menu' 				=> 'terms-menu',
								'depth'             => 0,
								'container'         => false,
							) ); ?>
						</div>
						<div class="col-xs-12 col-sm-3">
							<h4>oficyna peryferie</h4>
							<?php wp_nav_menu( array(
								'menu' 				=> 'oficyna-footer-shop-menu',
								'depth'             => 0,
								'container'         => false,
							) ); ?>
						</div>
					</div>
				</section>
				<section class="newsteller-section">
					<div class="newsletter-wrapper">
						<h3>Chcesz być na bieżąco?</h3>
						<p>
							Zapisz się do naszego newslettera, aby otrzymać informacje o aktualnych warsztatach i kursach oraz nowych publikacjach.
						</p>
						<?php mc4wp_show_form(); ?>
						<h5>OBIECUJEMY NIE SPAMOWAĆ. W KAŻDEJ CHWILI MOŻESZ WYPISAĆ SIĘ Z NEWSLETTERA.</h5>
					</div>
				</section>
				<section class="footer-wrapper">
					<ul>
						<li>
							<a href="https://www.instagram.com/oficyna_peryferie/"><i class="fa fa-instagram"></i></a>
						</li>
						<li>
							<a href="https://www.facebook.com/oficynaperyferie/"><i class="fa fa-facebook-square"></i></a>
						</li>
					</ul>
					<div>
						<h5>
							©2016 <a href='<?php the_permalink(); ?>'>Oficyna peryferie</a>, ul. Stalowa 3, Warszawa<br>
							<span>kontakt@oficynaperyferie.pl</span>
						</h5>
					</div>
					<ul>
						<li>
							<h5>KREACJA</h5><a href="https://www.behance.net/neilan" target="_blank"><div class="creation"></div></a>
						</li>
						<li>
							<h5>REALIZACJA</h5><a href="https://github.com/MikolajSzczepkowski" target="_blank"><div class="realization">m</div></a>
						</li>
					</ul>
				</section>
				<section>
					<a href='<?php echo home_url(); ?>'>
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
