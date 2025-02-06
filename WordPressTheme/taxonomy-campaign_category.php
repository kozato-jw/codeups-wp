<?php get_header(); ?>
<main>
  <section class="mv-sub campaign-mv">
    <h1 class="mv-sub__title">campaign</h1>
    <picture>
      <source media="(min-width:768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign-mv_pc.jpg">
      <img class="mv-sub__image" src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign-mv_sp.jpg" alt="海中を泳ぐ黄色い魚の画像">
    </picture>
  </section>

  <!-- パンクズリスト -->
  <?php get_template_part('parts/breadcrumb'); ?>

  <section class="campaign-sub campaign-sub-content icon-fish">
    <div class="inner">

      <!-- カスタムタクソノミー -->
      <div class="campaign-sub__category category" data-target="campaign-card">
        <!-- "All" ボタン -->
        <a href="<?php echo esc_url(get_post_type_archive_link('campaign')); ?>"
          class="category__btn <?php if (!is_tax('campaign_category')) echo 'active'; ?>"
          aria-current="<?php echo (!is_tax('campaign_category')) ? 'page' : 'false'; ?>"
          data-tab="all">all</a>

        <?php
        $terms = get_terms(array(
          'taxonomy' => 'campaign_category',
          'hide_empty' => true,
        ));

        if (!empty($terms) && !is_wp_error($terms)) {
          foreach ($terms as $term) :
            $is_active = (is_tax('campaign_category', $term->slug)) ? 'active' : '';
        ?>
            <a href="<?php echo esc_url(get_term_link($term)); ?>"
              class="category__btn <?php echo esc_attr($is_active); ?>"
              aria-current="<?php echo $is_active ? 'page' : 'false'; ?>"
              data-tab="<?php echo esc_attr($term->slug); ?>">
              <?php echo esc_html($term->name); ?>
            </a>
        <?php
          endforeach;
        } else {
          echo '<p>カテゴリーはありません。</p>';
        }
        ?>
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
                $start = get_field('start');
                $end = get_field('end');
                ?>
                <p class="campaign-card__price campaign-card__price--sub">
                  <?php if ($regular_price): ?>
                    <span class="campaign-card__price-disabled">&yen;<?php echo number_format($regular_price); ?></span>
                  <?php endif; ?>
                  <?php if ($special_price): ?>
                    <span class="campaign-card__price-current">&yen;<?php echo number_format($special_price); ?></span>
                  <?php endif; ?>
                </p>
                <?php if ($campaign_details): ?>
                  <p class="campaign-card__description u-desktop"><?php echo esc_html($campaign_details); ?></p>
                <?php endif; ?>
                <!-- 開始日と終了日が両方も入力されている場合のみ表示  -->
                <?php if (!empty($start) && !empty($end)) : ?>
                  <p class="campaign-card__description-date u-desktop"><?php echo esc_html($start); ?> &ndash;<?php echo esc_html($end); ?></p>
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

      <!-- ページネーション取得 -->
      <?php wp_pagenavi(); ?>

    </div>
  </section>

</main>
<?php get_footer(); ?>