<?php
$post_id = get_the_ID();
?>
<article class="featured-interview">
  <a href="<?php the_permalink(); ?>" rel="bookmark" style="background-image: url('<?php the_field('hospital') ?>');"></a>
</article>
