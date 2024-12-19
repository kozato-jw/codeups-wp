<?php get_header(); ?>
<main>
  <section class="mv-sub campaign-mv">
    <h1 class="mv-sub__title">campaign</h1>
    <picture>
      <source media="(min-width:768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign-mv_pc.jpg">
      <img class="mv-sub__image" src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign-mv_sp.jpg" alt="海中を泳ぐ黄色い魚の画像">
    </picture>
  </section>
  <div class="breadcrumbs campaign-breadcrumbs">
    <div class="breadcrumbs__inner inner"><?php get_template_part('parts/breadcrumb'); ?></div>
  </div>
  <section class="campaign-sub campaign-sub-content icon-fish">
    <div class="inner">

      <!-- カスタムタクソノミー -->
      <div class="campaign-sub__category category">
        <a href="<?php echo get_post_type_archive_link('campaign'); ?>" class="category__btn <?php if (!is_tax()) echo 'active'; ?>">all</a>
        <?php
        $terms = get_terms(array(
          'taxonomy' => 'campaign_category',
          'hide_empty' => true,
        ));

        foreach ($terms as $term) :
          $is_active = (is_tax('campaign_category', $term->slug)) ? 'active' : ''; // 現在のタクソノミーを判定
        ?>
          <a href="<?php echo esc_url(get_term_link($term)); ?>" class="category__btn <?php echo esc_attr($is_active); ?>">
            <?php echo esc_html($term->name); ?>
          </a>
        <?php endforeach; ?>
      </div>
      <!-- カスタムタクソノミーここまで -->

      <div class="campaign-sub__cards">
        <!-- メインループ開始 -->
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php
            $categories = get_the_terms(get_the_ID(), 'campaign_category');
            $category_classes = '';

            if ($categories && !is_wp_error($categories)) {
              foreach ($categories as $category) {
                $category_classes .= ' js-tab-' . esc_attr($category->term_id);
              }
            }
            ?>
            <div class="campaign-card<?php echo $category_classes; ?>">
              <div class="campaign-card__image">
                <!-- アイキャッチここから -->
                <figure class="blog-post__eyecatch">
                  <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
                  <?php else : ?>
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/noimage.jpg" alt="noimage">
                  <?php endif; ?>
                </figure>
                <!-- アイキャッチここまで -->
              </div>
              <div class="campaign-card__content campaign-card__content--sub">
                <p class="campaign-card__category">
                  <?php echo esc_html($categories[0]->name ?? '未分類'); ?>
                </p>
                <h2 class="campaign-card__title campaign-card__title--sub"><?php the_title(); ?></h2>
                <p class="campaign-card__text campaign-card__text--sub">全部コミコミ(お一人様)</p>

                <?php
                $regular_price = get_field('regular-price');
                $special_price = get_field('special-price');
                $campaign_details = get_field('campaign-details');
                $period = get_field('period');
                ?>
                <?php if ($regular_price || $special_price || $campaign_details || $period): ?>
                  <p class="campaign-card__price campaign-card__price--sub">
                    <span class="campaign-card__price-disabled">&yen;<?php echo esc_html($regular_price); ?></span>
                    <span class="campaign-card__price-current">&yen;<?php echo esc_html($special_price); ?></span>
                  </p>
                  <p class="campaign-card__description u-desktop"><?php echo esc_html($campaign_details); ?></p>
                  <p class="campaign-card__description-date u-desktop"><?php echo esc_html($period); ?></p>
                <?php endif; ?>

                <p class="campaign-card__description-cta u-desktop">ご予約・お問い合わせはコチラ</p>
                <div class="campaign-card__btn u-desktop">
                  <a class="btn" href="<?php echo $contact; ?>">
                    <span class="btn__inner">contact&nbsp;us </span>
                  </a>
                </div>
              </div>
            </div>
        <?php endwhile;
        endif; ?>
        <!-- メインループ終了 -->

      </div>
      <?php wp_pagenavi(); ?>
    </div>
  </section>

  <?php get_template_part('parts/common-contact'); ?>

</main>
<?php get_footer(); ?>