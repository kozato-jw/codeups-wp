<?php get_header(); ?>
<main>
  <section class="mv-sub sitemap-mv">
    <h1 class="mv-sub__title">site
      <span class="mv-sub__title-sitemap">map</span>
    </h1>
    <picture>
      <source media="(min-width:768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/under-common-mv_pc.jpg">
      <img class="mv-sub__image" src="<?php echo get_theme_file_uri(); ?>/assets/images/common/under-common-mv_sp.jpg" alt="海中で無数の小魚が泳いでいる画像">
    </picture>
  </section>

  <!-- パンクズリスト -->
  <?php get_template_part('parts/breadcrumb'); ?>

  <div class="sitemap sitemap-content icon-fish icon-fish--sitemap">
    <div class="inner">
      <nav class="sitemap__nav gnav">
        <ul class="gnav__items gnav__items--sitemap">

          <!-- 以下 キャンペーンのカスタムタクソノミーを反映 -->
          <!-- 「キャンペーン」は「ALL」タブへ -->
          <li class="gnav__item gnav__item--main-sitemap">
            <a href="<?php echo esc_url(get_post_type_archive_link('campaign')); ?>">キャンペーン</a>
          </li>

          <?php
          // カスタムタクソノミーを取得
          $terms = get_terms(array(
            'taxonomy' => 'campaign_category',
            'hide_empty' => true,
          ));

          foreach ($terms as $term) :
          ?>
            <li class="gnav__item gnav__item--sub">
              <a href="<?php echo esc_url(get_term_link($term)); ?>">
                <?php echo esc_html($term->name); ?>
              </a>
            </li>
          <?php endforeach; ?>
          <!-- 以上 キャンペーンのカスタムタクソノミーを反映 -->

          <li class="gnav__item gnav__item--main-sitemap">
            <a href="<?php echo $aboutus; ?>">私たちについて</a>
          </li>
        </ul>
        <ul class="gnav__items gnav__items--sitemap">
          <li class="gnav__item gnav__item--main-sitemap gnav__item--mb40">
            <a href="<?php echo $voice; ?>">お客様の声 </a>
          </li>

          <!-- 以下 プライスのカスタムタクソノミーを反映 -->
          <?php
          $price_page_id = 17;
          $price_page_url = get_permalink($price_page_id);
          ?>
          <!-- 料金一覧（最上部へのリンク） -->
          <li class="gnav__item gnav__item--main-sitemap">
            <a href="<?php echo esc_url($price_page_url); ?>">料金一覧</a>
          </li>
          <?php
          // カスタムタクソノミーを取得
          $terms = get_terms(array(
            'taxonomy' => 'price_category',
            'hide_empty' => false,
          ));

          if (!empty($terms) && !is_wp_error($terms)) :
            foreach ($terms as $term) :
          ?>
              <li class="gnav__item gnav__item--sub">
                <a href="<?php echo esc_url($price_page_url . '#' . $term->slug); ?>">
                  <?php echo esc_html($term->name); ?>
                </a>
              </li>
          <?php
            endforeach;
          endif;
          ?>
          <!-- 以上 プライスのカスタムタクソノミーを反映 -->

        </ul>
        <ul class="gnav__items gnav__items--sitemap">
          <li class="gnav__item gnav__item--main-sitemap">
            <a href="<?php echo $information; ?>">ダイビング情報 </a>
          </li>
          <li class="gnav__item gnav__item--sub">
            <a href="<?php echo esc_url(home_url('information#tab-license')) ?>">ライセンス講習</a>
          </li>
          <li class="gnav__item gnav__item--sub">
            <a href="<?php echo esc_url(home_url('information#tab-trialdiving')) ?>">体験ダイビング</a>
          </li>
          <li class="gnav__item gnav__item--sub gnav__item--mb40">
            <a href="<?php echo esc_url(home_url('information#tab-fundiving')) ?>">ファンダイビング</a>
          </li>
          <li class="gnav__item gnav__item--main-sitemap">
            <a href="<?php echo $blog; ?>">ブログ</a>
          </li>
        </ul>
        <ul class="gnav__items gnav__items--sitemap">
          <li class="gnav__item gnav__item--main-sitemap gnav__item--mb40">
            <a href="<?php echo $faq; ?>">よくある質問</a>
          </li>
          <li class="gnav__item gnav__item--main-sitemap gnav__item--mb40">
            <a href="<?php echo $privacy; ?>">プライバシー
              <br class="u-mobile">ポリシー
            </a>
          </li>
          <li class="gnav__item gnav__item--main-sitemap gnav__item--mb40">
            <a href="<?php echo $termsofservice; ?>">利用規約</a>
          </li>
          <li class="gnav__item gnav__item--main-sitemap gnav__item--mb40">
            <a href="<?php echo $sitemap; ?>">サイトマップ</a>
          </li>
          <li class="gnav__item gnav__item--main-sitemap gnav__item--mb40">
            <a href="<?php echo $contact; ?>">お問い合わせ</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>

</main>
<?php get_footer(); ?>