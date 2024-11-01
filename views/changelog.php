<div class="wrap">
	<h1><?php esc_html_e( 'Simple Google Content Experiments Changelog' ); ?></h1>

	<h3>Version 1.1</h3>
	<ul>
		<li><?php esc_html_e( 'Updated WordPress version supported', 'pj-sgce' ); ?></li>
	</ul>

	<h3>Version 1.0</h3>
	<ul>
		<li><?php esc_html_e( 'Initial version', 'pj-sgce' ); ?></li>
	</ul>

	<div class="pixel-jar-ads">
		<h3><?php esc_html_e( 'More from Pixel Jar', 'pj-sgce' ); ?></h3>

		<div class="ad-flex-container">
			<div class="ad">
				<a href="https://www.pixeljar.com/" target="_blank">
					<img
						src="<?php echo PJ_SGCE_ASSETS . 'images/pixel-jar.svg' ?>" 
						alt="<?php esc_attr_e( 'Pixel Jar logo', 'pj-sgce' ); ?>"
					/>
				</a>
				<p><?php
					printf(
						wp_kses(
							__( 'Simple Google Content Experiments is proudly powered by %1$s. We’re a small web development agency that focuses on %2$s as a development platform for websites. %1$s started in 2004. It grew out of the desire to be free to choose projects that challenge us and work with clients that inspire us. Read more about us <a href="%3$s" target="_blank">here</a>.', 'pj-sgce' ),
							array( 'a' => array(
								'href'   => array(),
								'target' => array(),
							) )
						),
						'Pixel Jar',
						'WordPress',
						esc_url( 'https://www.pixeljar.com' )
					);
				?></p>
			</div>

			<div class="ad">
				<a href="https://adsanityplugin.com/" target="_blank">
					<img
						src="<?php echo PJ_SGCE_ASSETS . 'images/adsanity.svg' ?>" 
						alt="<?php esc_attr_e( 'AdSanity logo', 'pj-sgce' ); ?>"
					/>
				</a>
				<p><?php
					printf(
						wp_kses(
							__( '%1$s also makes %2$s, a light ad rotator plugin for %3$s. It allows the user to create and manage ads shown on a website as well as keep statistics on views and clicks through a robust set of features. You can read all about it on the <a href="%4$s" target="_blank">%2$s site</a>.', 'pj-sgce' ),
							array( 'a' => array(
								'href'   => array(),
								'target' => array(),
							) )
						),
						'Pixel Jar',
						'AdSanity',
						'WordPress',
						esc_url( 'https://adsanityplugin.com/' )
					);
				?></p>
			</div>

			<div class="ad">
				<a href="https://www.clickrangerpro.com/" target="_blank">
					<img
						src="<?php echo PJ_SGCE_ASSETS . 'images/click-ranger-pro.svg' ?>"
						alt="<?php esc_attr_e( 'Click Ranger Pro logo', 'pj-sgce' ); ?>"
					/>
				</a>
				<p><?php
					printf(
						wp_kses(
							__( '%1$s helps you easily track user clicks, downloads, and events of your %2$s website to %3$s. Get the data you need without the fuss of JavaScript or PHP. You can read all about it on the <a href="%4$s" target="_blank">%1$s site</a>.', 'pj-sgce' ),
							array( 'a' => array(
								'href'   => array(),
								'target' => array(),
							) )
						),
						'Click Ranger Pro',
						'WordPress',
						'Google Analytics',
						esc_url( 'https://www.clickrangerpro.com/' )
					);
				?></p>
			</div>
		</div>
	</div>
</div>
