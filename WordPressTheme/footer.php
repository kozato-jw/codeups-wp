<?php
global $home, $campaign, $aboutus, $information, $blog, $voice, $price, $faq, $contact, $privacy, $termsofservice, $sitemap;
?>

<footer id="footer" class="footer">
  <div class="footer__inner inner">
    <div class="footer__head">
      <div class="footer__logo">
        <a href="<?php echo $home; ?>">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/logo-white.png" alt="コードアップスのロゴ">
        </a>
      </div>
      <div class="footer__sns">
        <a href="https://www.facebook.com/" target="_blank">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/facebook.svg" alt="フェイスブックのアイコン">
        </a>
        <a href="https://www.instagram.com/" target="_blank">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/instagram.svg" alt="インスタグラムのアイコン">
        </a>
      </div>
    </div>
    <nav class="footer__nav gnav">
      <ul class="gnav__items">

        <!-- 以下 キャンペーンのカスタムタクソノミーを反映 -->
        <!-- 「キャンペーン」は「ALL」タブへ -->
        <li class="gnav__item gnav__item--main">
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

        <li class="gnav__item gnav__item--main">
          <a href="<?php echo $aboutus; ?>">私たちについて</a>
        </li>
      </ul>
      <ul class="gnav__items">
        <li class="gnav__item gnav__item--main gnav__item--mb40">
          <a href="<?php echo $voice; ?>">お客様の声 </a>
        </li>

        <!-- 以下 プライスのカスタムタクソノミーを反映 -->
        <?php
        $price_page_id = 17;
        $price_page_url = get_permalink($price_page_id);
        ?>
        <!-- 料金一覧（最上部へのリンク） -->
        <li class="gnav__item gnav__item--main">
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
      <ul class="gnav__items">
        <li class="gnav__item gnav__item--main">
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
        <li class="gnav__item gnav__item--main">
          <a href="<?php echo $blog; ?>">ブログ</a>
        </li>
      </ul>
      <ul class="gnav__items">
        <li class="gnav__item gnav__item--main gnav__item--mb40">
          <a href="<?php echo $faq; ?>">よくある質問</a>
        </li>
        <li class="gnav__item gnav__item--main gnav__item--mb40">
          <a href="<?php echo $privacy; ?>">プライバシー
            <br class="u-mobile">ポリシー
          </a>
        </li>
        <li class="gnav__item gnav__item--main gnav__item--mb40">
          <a href="<?php echo $termsofservice; ?>">利用規約</a>
        </li>
        <li class="gnav__item gnav__item--main gnav__item--mb40">
          <a href="<?php echo $sitemap; ?>">サイトマップ</a>
        </li>
        <li class="gnav__item gnav__item--main gnav__item--mb40">
          <a href="<?php echo $contact; ?>">お問い合わせ</a>
        </li>
      </ul>
    </nav>
  </div>
  <p class="footer__copyright">Copyright &copy; 2021 - 2023 CodeUps LLC. All Rights Reserved.</p>
  <div id="page-top" class="page-top">
    <a class="page-top__btn" href="#">
      <img class="page-top__arrow" src="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-top-arrow.png" alt="">
    </a>
  </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>