<?php
if ( ! function_exists( 'why_medicine_create_featured_posts_widget' ) ) :
  /**
   * Register WHY Medicine Featured Posts widget.
   */
  function why_medicine_create_featured_posts_widget() {

    // Define the widget class

    class featured_posts_widget extends WP_Widget {

      function __construct() {
        parent::__construct(
          // Base ID of your widget
          'featured_posts_widget',

          // Widget name will appear in UI
          __('Featured Posts', 'why-medicine'),

          // Widget description
          array( 'description' => __( 'Display featured posts on the home page', 'why-medicine' ), )
        );
      }

      // Define rendering function

      public function widget( $args, $instance ) {
        extract( $args );
        $post_limit = $instance['limit'];

        $query_args = array(
    			'posts_per_page'	=> $post_limit,
    			'post_type'		=> 'interview',
    			'meta_key'		=> 'featured_on_home_page',
    			'meta_compare'	=> 'EXISTS'
    		);

        $query = new WP_Query($query_args);

        if ( $query->have_posts() ) {
          echo $before_widget;

          while ( $query->have_posts() ) {
            $query->the_post();
            get_template_part( 'template-parts/featured-interview' );
          }

          echo $after_widget;
        }

        wp_reset_query();
      }

      // Define widget admin form

      public function form( $instance ) {
        if ( isset( $instance[ 'limit' ] ) ) {
          $limit = $instance[ 'limit' ];
        } else {
          $limit = __( 3, 'why-medicine' );
        }

        if ( isset( $instance[ 'title' ] ) ) {
          $title = $instance[ 'title' ];
        } else {
          $title = __( 'Featured Posts', 'why-medicine' );
        }

        ?>
        <p>
          <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
          <label for="<?php echo $this->get_field_id( 'limit' ); ?>"><?php _e( 'Number of posts to feature on the home page:' ); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>" type="number" min="1" max="10" value="<?php echo esc_attr( $limit ); ?>" />
        </p>
        <?php
      }

      // Updating widget replacing old instances with new

      public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['limit'] = ( ! empty( $new_instance['limit'] ) ) ? $new_instance['limit'] : 3;
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
      }
    } // Class featured_posts_widget ends here

    // Register and load the widget

	  register_widget( 'featured_posts_widget' );
  }

endif; // why_medicine_create_featured_posts_widget
?>
