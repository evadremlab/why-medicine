<?php
require get_template_directory() . '/inc/widgets/featured-posts-widget.php';

/**
 * Create and register WHY Medicine widgets.
 */
function why_medicine_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'why-medicine' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'why-medicine' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Homepage', 'why-medicine' ),
		'id'            => 'homepage-1',
		'description'   => esc_html__( 'Add widgets here.', 'why-medicine' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '',
		'after_title'   => '',
	) );

  // Register and load the widget(s)
  why_medicine_create_featured_posts_widget();
}

add_action( 'widgets_init', 'why_medicine_widgets_init' );
