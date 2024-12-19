<!DOCTYPE html>
<html lang="ja">

<?php
global $home, $campaign, $aboutus, $information, $blog, $voice, $price, $faq, $contact, $privacy, $termsofservice, $sitemap;
?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <meta name="format-detection" content="telephone=no" />
  <meta name="robots" content="noindex" />
  <?php wp_head(); ?>
</head>

<body>
  <header class="<?php echo is_front_page() ? 'header js-top-header' : 'header header--sub'; ?>">
    <div class="header__inner">
      <?php if (is_front_page()): ?>
        <h1 class="header__logo">
          <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/logo-white.png" alt="コードアップス">
          </a>
        </h1>
      <?php else: ?>
        <div class="header__logo">
          <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/logo-white.png" alt="コードアップス">
          </a>
        </div>
      <?php endif; ?>
      <nav class="header__menu main-nav u-desktop">
        <ul class="main-nav__items">
          <li class="main-nav__item">
            <a class="main-nav__link" href="<?php echo $campaign; ?>">
              <p class="main-nav__link-en">campaign</p>
              <p class="main-nav__link-ja">キャンペーン</p>
            </a>
          </li>
          <li class="main-nav__item">
            <a class="main-nav__link" href="<?php echo $aboutus; ?>">
              <p class="main-nav__link-en">about
                <span class="main-nav__link--initial">u</span>s
              </p>
              <p class="main-nav__link-ja">私たちについて</p>
            </a>
          </li>
          <li class="main-nav__item">
            <a class="main-nav__link" href="<?php echo $information; ?>">
              <p class="main-nav__link-en">information</p>
              <p class="main-nav__link-ja">ダイビング情報</p>
            </a>
          </li>
          <li class="main-nav__item">
            <a class="main-nav__link" href="<?php echo $blog; ?>">
              <p class="main-nav__link-en">blog</p>
              <p class="main-nav__link-ja">ブログ</p>
            </a>
          </li>
          <li class="main-nav__item">
            <a class="main-nav__link" href="<?php echo $voice; ?>">
              <p class="main-nav__link-en">voice</p>
              <p class="main-nav__link-ja">お客様の声</p>
            </a>
          </li>
          <li class="main-nav__item">
            <a class="main-nav__link" href="<?php echo $price; ?>">
              <p class="main-nav__link-en">price</p>
              <p class="main-nav__link-ja">料金一覧</p>
            </a>
          </li>
          <li class="main-nav__item">
            <a class="main-nav__link" href="<?php echo $faq; ?>">
              <p class="main-nav__link-en main-nav__link-en--faq">faq</p>
              <p class="main-nav__link-ja">よくある質問</p>
            </a>
          </li>
          <li class="main-nav__item">
            <a class="main-nav__link main-nav__link--contact" href="<?php echo $contact; ?>">
              <p class="main-nav__link-en">contact</p>
              <p class="main-nav__link-ja">お問い合わせ</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- ハンバーガーメニュー -->
      <div class="header__hamburger hamburger js-hamburger u-mobile" id="hamburger">
        <span class="hamburger__bar"></span>
        <span class="hamburger__bar"></span>
        <span class="hamburger__bar"></span>
      </div>
    </div>
    <!-- ハンバーガーメニュー内部 -->
    <div class="header__nav-wrapper js-header__nav-wrapper u-mobile">
      <nav class="header__nav gnav inner">
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
  </header>