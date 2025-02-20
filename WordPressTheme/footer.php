<?php
global $home, $campaign, $aboutus, $information, $blog, $voice, $price, $faq, $contact, $privacy, $termsofservice, $sitemap;
?>
<!-- 共通コンタクトエリア -->
<?php if (!is_page('contact')): ?>
  <section class="common-contact contact-margin">
    <div class="inner">
      <div class="common-contact__inner">
        <div class="common-contact__content">
          <div class="common-contact__logo">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/logo-blue.png" alt="ブルーホライゾンのロゴ">
          </div>
          <div class="common-contact__item">
            <div class="common-contact__address">
              <p class="common-contact__address-item">沖縄県那覇市1-1</p>
              <p class="common-contact__address-item">
                <a href="tel:01200000000">TEL:0120-000-0000</a>
              </p>
              <p class="common-contact__address-item">営業時間:8:30-19:00</p>
              <p class="common-contact__address-item">定休日:毎週火曜日</p>
            </div>
            <iframe class="common-contact__map"
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d128399.76253516936!2d127.7251281218775!3d26.367773122738253!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34e50e1eac275ad7%3A0x33c571838dc11528!2z5rKW57iE55yM5rKW57iE5biC!5e0!3m2!1sja!2sjp!4v1716380107153!5m2!1sja!2sjp"
              style="border:0;" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
        <div class="common-contact__title-area">
          <div class="common-contact__title">
            <p class="common-contact__title-en">contact</p>
            <h2 class="common-contact__title-ja">お問い合わせ</h2>
          </div>
          <p class="common-contact__text">ご予約・お問い合わせはコチラ</p>
          <div class="common-contact__btn">
            <a class="btn" href="<?php echo $contact; ?>">
              <span class="btn__inner">contact&nbsp;us </span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

<!-- フッター -->
<footer id="footer" class="footer">
  <div class="footer__inner inner">
    <div class="footer__head">
      <div class="footer__logo">
        <a href="<?php echo $home; ?>">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/logo-white.png" alt="ブルーホライゾンのロゴ">
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
  <p class="footer__copyright">Copyright &copy; 2021 - 2023 Blue Horizon. All Rights Reserved.</p>
  <div id="page-top" class="page-top">
    <a class="page-top__btn" href="#">
      <img class="page-top__arrow" src="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-top-arrow.png" alt="">
    </a>
  </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>