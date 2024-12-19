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
        <a href="#">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/facebook.svg" alt="フェイスブックのアイコン">
        </a>
        <a href="#">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/instagram.svg" alt="インスタグラムのアイコン">
        </a>
      </div>
    </div>
    <nav class="footer__nav gnav">
      <ul class="gnav__items">
        <li class="gnav__item gnav__item--main">
          <a href="<?php echo esc_url(home_url('campaign#category-tab-1')) ?>">キャンペーン</a>
        </li>
        <li class="gnav__item gnav__item--sub">
          <a href="<?php echo esc_url(home_url('campaign#category-tab-2')) ?>">ライセンス取得</a>
        </li>
        <li class="gnav__item gnav__item--sub">
          <a href="<?php echo esc_url(home_url('campaign#category-tab-3')) ?>">貸切体験ダイビング</a>
        </li>
        <li class="gnav__item gnav__item--sub gnav__item--mb40">
          <a href="<?php echo esc_url(home_url('campaign#category-tab-4')) ?>">ファンダイビング</a>
        </li>
        <li class="gnav__item gnav__item--main">
          <a href="<?php echo $aboutus; ?>">私たちについて</a>
        </li>
      </ul>
      <ul class="gnav__items">
        <li class="gnav__item gnav__item--main gnav__item--mb40">
          <a href="<?php echo $voice; ?>">お客様の声 </a>
        </li>
        <li class="gnav__item gnav__item--main">
          <a href="<?php echo $price; ?>">料金一覧 </a>
        </li>
        <li class="gnav__item gnav__item--sub">
          <a href="<?php echo esc_url(home_url('price#licensediving')) ?>">ライセンス講習</a>
        </li>
        <li class="gnav__item gnav__item--sub">
          <a href="<?php echo esc_url(home_url('price#trialdiving')) ?>">体験ダイビング</a>
        </li>
        <li class="gnav__item gnav__item--sub gnav__item--mb40">
          <a href="<?php echo esc_url(home_url('price#fundiving')) ?>">ファンダイビング</a>
        </li>
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