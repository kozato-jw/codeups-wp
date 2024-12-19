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
  <div class="breadcrumbs sitemap-breadcrumbs">
    <div class="breadcrumbs__inner inner"><?php get_template_part('parts/breadcrumb'); ?></div>
  </div>
  <div class="sitemap sitemap-content icon-fish icon-fish--sitemap">
    <div class="inner">
      <nav class="sitemap__nav gnav">
        <ul class="gnav__items gnav__items--sitemap">
          <li class="gnav__item gnav__item--main-sitemap">
            <a href="<?php echo $campaign; ?>#category-tab-1">キャンペーン</a>
          </li>
          <li class="gnav__item gnav__item--sub">
            <a href="<?php echo $campaign; ?>#category-tab-2">ライセンス取得</a>
          </li>
          <li class="gnav__item gnav__item--sub">
            <a href="<?php echo $campaign; ?>#category-tab-3">貸切体験ダイビング</a>
          </li>
          <li class="gnav__item gnav__item--sub gnav__item--mb40">
            <a href="<?php echo $campaign; ?>#category-tab-4">ファンダイビング</a>
          </li>
          <li class="gnav__item gnav__item--main-sitemap">
            <a href="<?php echo $aboutus; ?>">私たちについて</a>
          </li>
        </ul>
        <ul class="gnav__items gnav__items--sitemap">
          <li class="gnav__item gnav__item--main-sitemap gnav__item--mb40">
            <a href="<?php echo $voice; ?>">お客様の声 </a>
          </li>
          <li class="gnav__item gnav__item--main-sitemap">
            <a href="<?php echo $price; ?>">料金一覧 </a>
          </li>
          <li class="gnav__item gnav__item--sub">
            <a href="<?php echo $price; ?>#licensediving">ライセンス講習</a>
          </li>
          <li class="gnav__item gnav__item--sub">
            <a href="<?php echo $price; ?>#trialdiving">体験ダイビング</a>
          </li>
          <li class="gnav__item gnav__item--sub gnav__item--mb40">
            <a href="<?php echo $price; ?>#fundiving">ファンダイビング</a>
          </li>
        </ul>
        <ul class="gnav__items gnav__items--sitemap">
          <li class="gnav__item gnav__item--main-sitemap">
            <a href="<?php echo $information; ?>">ダイビング情報 </a>
          </li>
          <li class="gnav__item gnav__item--sub">
            <a href="<?php echo $information; ?>#tab-license">ライセンス講習</a>
          </li>
          <li class="gnav__item gnav__item--sub">
            <a href="<?php echo $information; ?>#tab-trialdiving">体験ダイビング</a>
          </li>
          <li class="gnav__item gnav__item--sub gnav__item--mb40">
            <a href="<?php echo $information; ?>#tab-fundiving">ファンダイビング</a>
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
            <a href="<?php echo $contact; ?>">お問い合わせ</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
  <?php get_template_part('parts/common-contact'); ?>
</main>
<?php get_footer(); ?>