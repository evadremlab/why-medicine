<?php

$post_id = get_the_ID();
$anam_event_date = get_post_meta( $post_id, 'event_date', true);
$anam_event_time = get_post_meta( $post_id, 'event_time', true);
$anam_event_datetime = date("l, F j, Y", strtotime($anam_event_date)) . ' ' . $anam_event_time;

if ( has_post_thumbnail() ) {
  $anam_event_thumbnail = get_the_post_thumbnail( $post_id, array( 100, 100 ) );
} else {
  $anam_event_thumbnail = '';
}
?>
<article class="event">
  <em>
    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo $anam_event_datetime . ' &mdash; ' . get_the_title() ?></a>
  </em>
  <div class="summary">
    <span class="alignleft"><?php echo $anam_event_thumbnail; ?></span>
    <?php the_excerpt(); ?>
  </div>
</article>
