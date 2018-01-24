<?php
/*
Template Name: Custom Contact Template
*/
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */

        ?>
				<div id="contact-container">
				  <div class="left">
						<?php
	          get_template_part( 'template-parts/content', get_post_format() );
	          ?>
						<div class="contact-container">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/email-icon.jpg" />
							<div class="contact-text-container">
								<?php the_field('email'); ?>
							</div>
						</div>
						<div class="contact-container">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/facebook-icon.png" />
							<div class="contact-text-container">
								<a href="<?php the_field('facebook'); ?>" target="_blank"><?php the_field('facebook'); ?></a>
							</div>
						</div>
						<div class="contact-container">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/linkedin-icon.png" />
							<div class="contact-text-container">
								<a href="<?php the_field('linkedin'); ?>" target="_blank"><?php the_field('linkedin'); ?></a>
							</div>
						</div>
				  </div>
					<div class="right">
						<!-- shortcode for the live site -->
						<?php echo do_shortcode('[contact-form-7 id="69" title="Contact form"]'); ?>
			    </div>
			  </div>
				<?php
			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
