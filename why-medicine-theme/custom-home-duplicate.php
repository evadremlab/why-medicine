<?php
/*
Template Name: Custom Home Template
*/
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		$query_args = array(
			'posts_per_page'	=> 2,
			'post_type'		=> 'interview',
			'meta_key'		=> 'featured_on_home_page',
			'meta_compare'	=> 'EXISTS'
		);

		$query = new WP_Query($query_args);

		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) : $query->the_post();
         get_template_part( 'template-parts/featured-interview' );
			endwhile;
		else : ?>
			<h1>no featured interviews found</h1>
		<?php
		endif;

		wp_reset_query();
		?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
