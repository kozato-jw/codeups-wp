<?php get_header(); ?>
<main>
  <section class="mv-sub blog-mv">
    <h1 class="mv-sub__title">blog</h1>
    <picture>
      <source media="(min-width:768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-mv_pc.jpg">
      <img class="mv-sub__image" src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-mv_sp.jpg" alt="海中を泳ぐ魚の画像">
    </picture>
  </section>
  <div class="breadcrumbs blog-breadcrumbs">
    <div class="breadcrumbs__inner inner"><?php get_template_part('parts/breadcrumb'); ?></div>
  </div>
  <div class="blog-sub blog-sub-content icon-fish">
    <div class="blog-sub__inner inner">
      <div class="blog-sub__content">
        <div class="blog-sub__cards blog-cards blog-cards--sub">

          <!-- メインループ開始 -->
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
              <article class="blog-cards__item blog-card">
                <a href="<?php the_permalink(); ?>" class="blog-card__link">
                  <div class="blog-card__image">
                    <!-- アイキャッチここから -->
                    <?php if (has_post_thumbnail()) : ?>
                      <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
                    <?php else : ?>
                      <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/noimage.jpg" alt="noimage">
                    <?php endif; ?>
                    <!-- アイキャッチここまで -->
                  </div>
                  <div class="blog-card__meta">
                    <time class="blog-card__date" datetime="<?php the_time('c'); ?>"><?php the_time('Y.m/d'); ?></time>
                    <h2 class="blog-card__title blog-card__title--sub"><?php the_title(); ?></h2>
                  </div>
                  <p class="blog-card__text"><?php the_excerpt(); ?></p>
                </a>
              </article>
          <?php endwhile;
          endif; ?>
          <!-- メインループ終了 -->
        </div>
        <?php wp_pagenavi(); ?>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>
  <?php get_template_part('parts/common-contact'); ?>
</main>
<?php get_footer(); ?>