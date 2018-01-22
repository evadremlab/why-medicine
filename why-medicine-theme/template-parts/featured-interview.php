<?php

$post_id = get_the_ID();

if ( has_post_thumbnail() ) {
  $anam_event_thumbnail = get_the_post_thumbnail( $post_id, 'thumbnail' );
} else {
  $anam_event_thumbnail = '';
}
?>
<article class="featured-interview">
  <div><?php echo $anam_event_thumbnail; ?></div>
  <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title() ?></a>
</article>
