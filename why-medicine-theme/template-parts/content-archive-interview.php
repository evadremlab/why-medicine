<?php
/**
 * Template part for displaying Interview on list page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WHY_Medicine
 */

?>

<article id="post-<?php the_ID(); ?>" class="interview-content" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

			if (get_field('title') ): ?>
				<span class="doctor-title"><?php the_field('title'); ?></span>
			<?php
			endif;
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php why_medicine_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<?php why_medicine_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
			the_excerpt();
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
