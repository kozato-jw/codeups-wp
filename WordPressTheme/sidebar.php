<?php
global  $campaign, $blog, $voice;
?>
<aside class="sidebar">
  <div class="sidebar__inner">

    <!-- 人気記事 -->
    <section class="sidebar__content">
      <h2 class="sidebar__title sidebar__title--article">人気記事</h2>
      <div class="sidebar__blog-cards">
        <!-- サブループ開始／ブログ人気3件 -->
        <?php
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => 3,
          'meta_key' => 'post_views_count',
          'orderby' => 'meta_value_num',
          'order' => 'DESC',
        );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()):
        ?>
          <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
            <article class="sidebar__blog-card blog-card">
              <a href="<?php the_permalink(); ?>" class="blog-card__link blog-card__link--sidebar">
                <div class="blog-card__image blog-card__image--sidebar">
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
                <div class="blog-card__meta">
                  <time class="blog-card__date blog-card__date--sidebar" datetime="<?php the_time('c'); ?>"><?php the_time('Y.m/d'); ?></time>
                  <h3 class="blog-card__title blog-card__title--sidebar"><?php the_title(); ?></h3>
                </div>
              </a>
            </article>
        <?php endwhile;
          wp_reset_postdata();
        endif; ?>
        <!-- サブループ終了 -->
      </div>
    </section>
    <!-- /人気記事 -->


    <!-- 口コミ -->
    <section class="sidebar__content">
      <h2 class="sidebar__title">口コミ</h2>
      <!-- サブループ開始／ボイス最新1件 -->
      <?php
      $args = array(
        'post_type' => 'voice',
        'posts_per_page' => 1,
      );
      $the_query = new WP_Query($args);
      if ($the_query->have_posts()):
      ?>
        <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
          <article class="sidebar__voice-card voice-card voice-card--sidebar">
            <div class="voice-card__head voice-card__head--sidebar">
              <div class="voice-card__info voice-card__info--sidebar">
                <div class="voice-card__inner">
                  <?php
                  $age = get_field('age');
                  $gender = get_field('gender');
                  ?>
                  <?php if (!empty($age) && !empty($gender)): ?>
                    <p class="voice-card__age">
                      <?php echo esc_html($age); ?>
                      &lpar;<?php echo esc_html($gender); ?>&rpar;
                    </p>
                  <?php endif; ?>
                </div>
                <h3 class="voice-card__title voice-card__title--sidebar"><?php the_title(); ?></h3>
              </div>
              <div class="voice-card__image voice-card__image--sidebar">
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
          </article>
      <?php endwhile;
        wp_reset_postdata();
      endif; ?>
      <!-- サブループ終了 -->
      <div class="sidebar__btn">
        <a class="btn" href="<?php echo $voice; ?>">
          <span class="btn__inner">view&nbsp;more </span>
        </a>
      </div>
    </section>
    <!-- /口コミ -->


    <!-- キャンペーン -->
    <section class="sidebar__content">
      <h2 class="sidebar__title sidebar__title--campaign">キャンペーン</h2>
      <div class="sidebar__campaign-cards">
        <!-- サブループ開始／キャンペーン最新2件 -->
        <?php
        $args = array(
          'post_type' => 'campaign',
          'posts_per_page' => 2,
        );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()):
        ?>
          <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
            <div class="sidebar__campaign-card campaign-card">
              <div class="campaign-card__image campaign-card__image--sidebar">
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
              <div class="campaign-card__content campaign-card__content--sidebar">
                <h3 class="campaign-card__title campaign-card__title--sidebar"><?php the_title(); ?></h3>
                <p class="campaign-card__text campaign-card__text--sidebar">全部コミコミ(お一人様)</p>
                <?php
                $regular_price = get_field('regular-price');
                $special_price = get_field('special-price');
                ?>
                <p class="campaign-card__price campaign-card__price--sidebar">
                  <?php if ($regular_price): ?>
                    <span class="campaign-card__price-disabled campaign-card__price-disabled--sidebar">&yen;<?php echo esc_html($regular_price); ?></span>
                  <?php endif; ?>
                  <?php if ($special_price): ?>
                    <span class="campaign-card__price-current campaign-card__price-current--sidebar">&yen;<?php echo esc_html($special_price); ?></span>
                  <?php endif; ?>
                </p>
              </div>
            </div>
        <?php endwhile;
          wp_reset_postdata();
        endif; ?>
        <!-- サブループ終了 -->
      </div>
      <div class="sidebar__btn">
        <a class="btn" href="<?php echo $campaign; ?>">
          <span class="btn__inner">view&nbsp;more </span>
        </a>
      </div>
    </section>
    <!-- /キャンペーン -->


    <!-- アーカイブ(ブログ) -->
    <section class="sidebar__content">
      <h2 class="sidebar__title">アーカイブ</h2>
      <ol class="sidebar__archive-lists">
        <?php
        $years = $wpdb->get_results("
          SELECT DISTINCT YEAR(post_date) AS year, MONTH(post_date) AS month
          FROM $wpdb->posts
          WHERE post_status = 'publish'
          AND post_type = 'post'
          ORDER BY post_date DESC
        ");

        $current_year = null;

        foreach ($years as $year) {
          if ($current_year !== $year->year) {
            if ($current_year !== null) {
              echo '</ol></li>';
            }
            $current_year = $year->year;
            echo '<li class="sidebar__archive-list">';
            echo '<p class="sidebar__archive-year">' . esc_html($year->year) . '</p>';
            echo '<ol class="sidebar__archive-months">';
          }

          $month_name = date_i18n('F', mktime(0, 0, 0, $year->month, 10));
          echo '<li class="sidebar__archive-month">';
          echo '<a href="' . get_month_link($year->year, $year->month) . '">' . esc_html($year->month) . '月</a>';
          echo '</li>';
        }
        if ($current_year !== null) {
          echo '</ol></li>';
        }
        ?>
      </ol>
    </section>
    <!-- /アーカイブ（ブログ） -->

  </div>
</aside>