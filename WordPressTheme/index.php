<?php
get_header();

if (have_posts()) :
  while (have_posts()) : the_post();
?>
    <article>
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <div><?php the_excerpt(); ?></div>
    </article>
  <?php
  endwhile;
else :
  ?>
  <p>投稿が見つかりませんでした。</p>
<?php
endif;

get_footer();
?>