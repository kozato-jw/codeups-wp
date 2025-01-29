<?php get_header(); ?>
<main>

  <!-- MV -->
  <section class="mv top-mv">
    <div class="mv__loading">
      <div class="mv__loading-inner js-mv__loading-inner">
        <div class="mv__loading-image mv__loading-image--left"></div>
        <div class="mv__loading-image mv__loading-image--right"></div>
      </div>
      <div class="mv__title js-mv__title">
        <h2 class="mv__title-big">diving</h2>
        <p class="mv__title-small">into&nbsp;the&nbsp;ocean</p>
      </div>
    </div>
    <div class="mv__swiper swiper js-mv__swiper">
      <div class="mv__swiper-wrapper swiper-wrapper">
        <!-- 繰り返しフィールド開始（MVスライダー画像） -->
        <?php
        $mv = SCF::get('mv');
        if (!empty($mv)) :
          foreach ($mv as $index => $mv_item):
            $mv_image_pc = isset($mv_item['mv_image_pc']) ? $mv_item['mv_image_pc'] : '';
            $mv_image_sp = isset($mv_item['mv_image_sp']) ? $mv_item['mv_image_sp'] : '';
            // 画像のURLを取得
            $image_url_pc = wp_get_attachment_url($mv_image_pc);
            $image_url_sp = wp_get_attachment_url($mv_image_sp);
            // 画像のaltを取得
            $alt_text_pc = !empty($mv_image_pc) ? get_post_meta($mv_image_pc, '_wp_attachment_image_alt', true) : '';
            $alt_text_sp = !empty($mv_image_sp) ? get_post_meta($mv_image_sp, '_wp_attachment_image_alt', true) : '';

            // 両方の画像が設定されている場合のみ出力
            if (!empty($mv_image_pc) && !empty($mv_image_sp)):
        ?>
              <div class="mv__swiper-item swiper-slide">
                <picture>
                  <source media="(min-width:768px)" srcset="<?php echo esc_url($image_url_pc); ?>">
                  <img src="<?php echo esc_url($image_url_sp); ?>" alt="<?php echo esc_attr($alt_text_sp); ?>">
                </picture>
              </div>
        <?php
            endif;
          endforeach;
        endif;
        ?>
        <!-- 繰り返しフィールド終了 -->
      </div>
    </div>
  </section>

  <!-- キャンペーン -->
  <section class="campaign top-campaign">
    <div class="inner">
      <div class="campaign__title section-title">
        <p class="section-title__en">campaign</p>
        <h2 class="section-title__ja">キャンペーン</h2>
      </div>
      <div class="campaign__swiper-button u-desktop">
        <div class="campaign__swiper-button-prev">
          <span class="campaign__swiper-button-arrow campaign__swiper-button-arrow--prev"></span>
        </div>
        <div class="campaign__swiper-button-next">
          <span class="campaign__swiper-button-arrow campaign__swiper-button-arrow--next"></span>
        </div>
      </div>
      <div class="campaign__swiper swiper js-campaign__swiper">
        <div class="campaign__swiper-wrapper swiper-wrapper">
          <!-- サブループ開始（カスタム投稿 campaign） -->
          <?php
          $args = array(
            'post_type' => 'campaign',
            'posts_per_page' => 8,
          );
          $the_query = new WP_Query($args);

          if ($the_query->have_posts()):
          ?>
            <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
              <?php
              // カテゴリー情報の取得
              $categories = get_the_terms(get_the_ID(), 'campaign_category');
              ?>
              <div class="campaign__item swiper-slide">
                <div class="campaign-card">
                  <div class="campaign-card__image">
                    <!-- アイキャッチここから -->
                    <figure class="blog-post__eyecatch">
                      <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>のアイキャッチ画像">
                      <?php else : ?>
                        <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/noimage.jpg')); ?>" alt="noimage">
                      <?php endif; ?>
                    </figure>
                    <!-- アイキャッチここまで -->
                  </div>
                  <div class="campaign-card__content">
                    <p class="campaign-card__category">
                      <?php echo esc_html($categories[0]->name ?? '未分類'); ?>
                    </p>
                    <h3 class="campaign-card__title"><?php echo esc_html(get_the_title()); ?></h3>
                    <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                    <?php
                    $regular_price = get_field('regular-price');
                    $special_price = get_field('special-price');
                    ?>
                    <p class="campaign-card__price">
                      <?php if ($regular_price): ?>
                        <span class="campaign-card__price-disabled">&yen;<?php echo esc_html($regular_price); ?></span>
                      <?php endif; ?>
                      <?php if ($special_price): ?>
                        <span class="campaign-card__price-current">&yen;<?php echo esc_html($special_price); ?></span>
                      <?php endif; ?>
                    </p>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>
          <!-- サブループ終了 -->
        </div>
      </div>
      <div class="campaign__btn">
        <a class="btn" href="<?php echo $campaign; ?>">
          <span class="btn__inner">view&nbsp;more </span>
        </a>
      </div>
    </div>
  </section>

  <!-- 私たちについて -->
  <section class="about top-about">
    <div class="about__inner inner">
      <div class="about__title section-title">
        <p class="section-title__en">about&nbsp;us</p>
        <h2 class="section-title__ja">私たちについて</h2>
      </div>
      <div class="about__image">
        <img class="about__image-small" src="<?php echo get_theme_file_uri(); ?>/assets/images/common/top-about_1.jpg" alt="屋根の上のシーサーの置物の画像">
        <img class="about__image-big" src="<?php echo get_theme_file_uri(); ?>/assets/images/common/top-about_2.jpg" alt="水中を漂う魚の画像">
      </div>
      <div class="about__content">
        <h3 class="about__head">
          <span class="about__initial">d</span>ive&nbsp;into&nbsp;
          <br>the
          <span class="about__initial">o</span>cean
        </h3>
        <div class="about__text-wrapper">
          <p class="about__text">ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
            <br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
          </p>
          <div class="about__btn">
            <a class="btn" href="<?php echo $aboutus; ?>">
              <span class="btn__inner">view&nbsp;more </span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ダイビング情報 -->
  <section class="information top-information">
    <div class="inner">
      <div class="information__title section-title">
        <p class="section-title__en">information</p>
        <h2 class="section-title__ja">ダイビング情報</h2>
      </div>
      <div class="information__content-wrapper">
        <div class="information__image colorbox js-colorbox">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/top-info.jpg" alt="水中にいる無数の魚の画像">
        </div>
        <div class="information__content">
          <h3 class="information__head">ライセンス講習</h3>
          <p class="information__text">当店はダイビングライセンス（Cカード）世界最大の教育機関PADIの「正規店」として店舗登録されています。
            <br>正規登録店として、安心安全に初めての方でも安心安全にライセンス取得をサポート致します。
          </p>
          <div class="information__btn">
            <a class="btn" href="<?php echo $information; ?>">
              <span class="btn__inner">view&nbsp;more </span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ブログ -->
  <section class="blog top-blog">
    <div class="blog__inner inner">
      <div class="blog__title section-title">
        <p class="section-title__en section-title__en--white">blog</p>
        <h2 class="section-title__ja section-title__ja--white">ブログ</h2>
      </div>
      <div class="blog__card-wrapper blog-cards">
        <!-- サブループ開始（通常投稿 blog） -->
        <?php
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => 3,
        );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()):
        ?>
          <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
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
                  <h3 class="blog-card__title"><?php the_title(); ?></h3>
                </div>
                <p class="blog-card__text"><?php the_excerpt(); ?></p>
              </a>
            </article>
        <?php endwhile;
          wp_reset_postdata();
        endif; ?>
        <!-- サブループ終了 -->
      </div>
      <div class="blog__btn">
        <a class="btn" href="<?php echo $blog; ?>">
          <span class="btn__inner">view&nbsp;more </span>
        </a>
      </div>
    </div>
  </section>

  <!-- お客様の声 -->
  <section class="voice top-voice icon-fish icon-fish--voice">
    <div class="voice__inner inner">
      <div class="voice__title section-title">
        <p class="section-title__en">voice</p>
        <h2 class="section-title__ja">お客様の声</h2>
      </div>
      <div class="voice__card-wrapper voice-cards">
        <!-- サブループ開始（カスタム投稿 voice） -->
        <?php
        $args = array(
          'post_type' => 'voice',
          'posts_per_page' => 2,
        );
        $query = new WP_Query($args);
        ?>
        <?php if ($query->have_posts()) : ?>
          <?php while ($query->have_posts()) : $query->the_post(); ?>
            <?php
            $categories = get_the_terms(get_the_ID(), 'voice_category');
            $category_classes = '';

            if ($categories && !is_wp_error($categories)) {
              foreach ($categories as $category) {
                $category_classes .= ' js-tab-' . esc_attr($category->term_id);
              }
            }
            ?>
            <article class="voice-cards__item voice-card <?php echo $category_classes; ?>">
              <div class="voice-card__head">
                <div class="voice-card__info">
                  <div class="voice-card__inner">
                    <?php
                    $age = get_field('age');
                    $gender = get_field('gender');
                    $voicetext = get_field('voice-text');
                    ?>
                    <?php if (!empty($age) && !empty($gender)): ?>
                      <p class="voice-card__age">
                        <?php echo esc_html($age); ?>
                        &lpar;<?php echo esc_html($gender); ?>&rpar;
                      </p>
                    <?php endif; ?>
                    <p class="voice-card__category"><?php echo esc_html($categories[0]->name ?? '未分類'); ?></p>
                  </div>
                  <h2 class="voice-card__title"><?php the_title(); ?></h2>
                </div>
                <div class="voice-card__image colorbox js-colorbox">
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
              </div>
              <?php if ($voicetext): ?>
                <p class="voice-card__text">
                  <!-- 文字数制限300文字 -->
                  <?php echo custom_excerpt($voicetext); ?>
                </p>
              <?php endif; ?>
            </article>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php endif; ?>
        <!-- サブループ終了 -->
      </div>
      <div class="voice__btn">
        <a class="btn" href="<?php echo $voice; ?>">
          <span class="btn__inner">view&nbsp;more </span>
        </a>
      </div>
    </div>
  </section>

  <!-- 料金一覧 -->
  <section class="price top-price">
    <div class="inner">
      <div class="price__title section-title">
        <p class="section-title__en">price</p>
        <h2 class="section-title__ja">料金一覧</h2>
      </div>
      <div class="price__content">
        <div class="price__image colorbox js-colorbox">
          <picture>
            <source media="(min-width:768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-pc.jpg">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-sp.jpg" alt="ウミガメの画像">
          </picture>
        </div>
        <!-- 下層プライスページの内容を正としてSCF出力 -->
        <div class="price__list-wrapper">
          <?php
          // カスタムタクソノミーの情報取得
          $terms = get_terms(array(
            'taxonomy' => 'price_category',
            'hide_empty' => false,
          ));

          if (!empty($terms) && !is_wp_error($terms)) :
            foreach ($terms as $term) :
              $term_name = $term->name;
              $term_slug = $term->slug;
              $course_names = get_term_meta($term->term_id, 'course_name', false);
              $course_prices = get_term_meta($term->term_id, 'course_price', false);

              $courses = array();
              if (is_array($course_names) && is_array($course_prices)) {
                for ($i = 0; $i < count($course_names); $i++) {
                  $courses[] = array(
                    'course_name' => isset($course_names[$i]) ? $course_names[$i] : '',
                    'course_price' => isset($course_prices[$i]) ? $course_prices[$i] : ''
                  );
                }
              }
          ?>
              <div class="price__list">
                <h3 class="price__list-title"><?php echo esc_html($term_name); ?></h3>
                <?php if (!empty($courses)) : ?>
                  <?php foreach ($courses as $course) : ?>
                    <dl class="price__list-item price__list-item--top">
                      <!-- コース名とプライスを両方取得できた場合のみ表示 -->
                      <?php if (!empty($course['course_name']) && !empty($course['course_price'])): ?>
                        <dt><?php echo wp_kses_post($course['course_name']); ?></dt>
                        <dd>&yen;<?php echo esc_html($course['course_price']); ?></dd>
                      <?php endif; ?>
                    </dl>
                  <?php endforeach; ?>
                <?php endif; ?>
              </div>
          <?php
            endforeach;
          endif;
          ?>
        </div>

      </div>
      <div class="price__btn">
        <a class="btn" href="<?php echo $price; ?>">
          <span class="btn__inner">view&nbsp;more </span>
        </a>
      </div>
    </div>
  </section>

</main>
<?php get_footer(); ?>