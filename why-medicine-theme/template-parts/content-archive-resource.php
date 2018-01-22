<?php
/**
 * Template part for displaying Interview on list page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WHY_Medicine
 */

?>

<article id="post-<?php the_ID(); ?>" class="content-resource" <?php post_class(); ?>>
	<?php why_medicine_post_thumbnail(); ?>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php why_medicine_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->
</article><!-- #post-<?php the_ID(); ?> -->
