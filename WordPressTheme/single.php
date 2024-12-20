<?php get_header(); ?>
<main>
  <section class="mv-sub blog-mv">
    <div class="mv-sub__title">blog</div>
    <picture>
      <source media="(min-width:768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-mv_pc.jpg">
      <img class="mv-sub__image" src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-mv_sp.jpg" alt="海中を泳ぐ魚の画像">
    </picture>
  </section>
  <div class="breadcrumbs blog-single-breadcrumbs">
    <div class="breadcrumbs__inner inner"><?php get_template_part('parts/breadcrumb'); ?></div>
  </div>
  <div class="blog-sub inner blog-sub-content">
    <div class="blog-sub__inner inner">
      <div class="blog-sub__post-wrapper">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="blog-post" class="blog-sub__post blog-post">
              <time class="blog-post__time" datetime="<?php the_time('c'); ?>"><?php the_time('Y.m/d'); ?></time>
              <h1 class="blog-post__title"><?php the_title(); ?></h1>
              <!-- アイキャッチここから -->
              <figure class="blog-post__eyecatch">
                <?php if (has_post_thumbnail()) : ?>
                  <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
                <?php else :  ?>
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/noimage.jpg" alt="noimage">
                <?php endif; ?>
              </figure>
              <!-- アイキャッチここまで -->
              <div class="blog-post__content">
                <?php the_content(); ?>
              </div>
            </article>
        <?php endwhile;
        endif; ?>
        <!-- 記事前後のボタン -->
        <?php
        $prev = get_previous_post();
        $prev_url = get_permalink($prev->ID);
        $next = get_next_post();
        $next_url = get_permalink($next->ID);
        ?>
        <div class="wp-pagenavi">
          <?php if ($prev_url): ?>
            <a class="previouspostslink" rel="prev" href="<?php echo $prev_url; ?>"></a>
          <?php endif; ?>
          <?php if ($next_url): ?>
            <a class="nextpostslink" rel="next" href="<?php echo $next_url; ?>"></a>
          <?php endif; ?>
        </div>
        <!-- 記事前後のボタンここまで -->
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>
  <?php get_template_part('parts/common-contact'); ?>
</main>
<?php get_footer(); ?>