<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <meta name="format-detection" content="telephone=no" />
  <meta name="robots" content="noindex" />
  <!-- meta情報 -->
  <title>CodeUps-diving</title>
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <!-- ogp -->
  <meta property="og:title" content="" />
  <meta property="og:type" content="" />
  <meta property="og:url" content="" />
  <meta property="og:image" content="" />
  <meta property="og:site_name" content="" />
  <meta property="og:description" content="" />
  <!-- ファビコン -->
  <link rel="icon" href="" />
  <!-- googleフォント -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Gotu&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Noto+Sans+JP&family=Noto+Serif+JP:wght@200..900&display=swap"
    rel="stylesheet">
  <!-- css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="<?php echo get_theme_file_uri(); ?>/assets/css/style.css" />
  <!-- JavaScript -->
  <script defer src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script defer src="<?php echo get_theme_file_uri(); ?>/assets/js/jquery.inview.min.js"></script>
  <script defer src="<?php echo get_theme_file_uri(); ?>/assets/js/script.js"></script>
</head>

<body>
  <header class="header header--sub">
    <div class="header__inner">
      <div class="header__logo">
        <a href="index.html">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/logo-white.png" alt="コードアップス">
        </a>
      </div>
      <nav class="header__menu main-nav u-desktop">
        <ul class="main-nav__items">
          <li class="main-nav__item">
            <a class="main-nav__link" href="archive-campaign.html">
              <p class="main-nav__link-en">campaign</p>
              <p class="main-nav__link-ja">キャンペーン</p>
            </a>
          </li>
          <li class="main-nav__item">
            <a class="main-nav__link" href="page-about-us.html">
              <p class="main-nav__link-en">about
                <span class="main-nav__link--initial">u</span>s
              </p>
              <p class="main-nav__link-ja">私たちについて</p>
            </a>
          </li>
          <li class="main-nav__item">
            <a class="main-nav__link" href="page-information.html">
              <p class="main-nav__link-en">information</p>
              <p class="main-nav__link-ja">ダイビング情報</p>
            </a>
          </li>
          <li class="main-nav__item">
            <a class="main-nav__link" href="home.html">
              <p class="main-nav__link-en">blog</p>
              <p class="main-nav__link-ja">ブログ</p>
            </a>
          </li>
          <li class="main-nav__item">
            <a class="main-nav__link" href="archive-voice.html">
              <p class="main-nav__link-en">voice</p>
              <p class="main-nav__link-ja">お客様の声</p>
            </a>
          </li>
          <li class="main-nav__item">
            <a class="main-nav__link" href="page-price.html">
              <p class="main-nav__link-en">price</p>
              <p class="main-nav__link-ja">料金一覧</p>
            </a>
          </li>
          <li class="main-nav__item">
            <a class="main-nav__link" href="page-faq.html">
              <p class="main-nav__link-en main-nav__link-en--faq">faq</p>
              <p class="main-nav__link-ja">よくある質問</p>
            </a>
          </li>
          <li class="main-nav__item">
            <a class="main-nav__link main-nav__link--contact" href="page-contact.html">
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
            <a href="archive-campaign.html#category-tab-1">キャンペーン</a>
          </li>
          <li class="gnav__item gnav__item--sub">
            <a href="archive-campaign.html#category-tab-2">ライセンス取得</a>
          </li>
          <li class="gnav__item gnav__item--sub">
            <a href="archive-campaign.html#category-tab-3">貸切体験ダイビング</a>
          </li>
          <li class="gnav__item gnav__item--sub gnav__item--mb40">
            <a href="archive-campaign.html#category-tab-4">ファンダイビング</a>
          </li>
          <li class="gnav__item gnav__item--main">
            <a href="page-about-us.html">私たちについて</a>
          </li>
        </ul>
        <ul class="gnav__items">
          <li class="gnav__item gnav__item--main gnav__item--mb40">
            <a href="archive-voice.html">お客様の声 </a>
          </li>
          <li class="gnav__item gnav__item--main">
            <a href="page-price.html">料金一覧 </a>
          </li>
          <li class="gnav__item gnav__item--sub">
            <a href="page-price.html#licensediving">ライセンス講習</a>
          </li>
          <li class="gnav__item gnav__item--sub">
            <a href="page-price.html#trialdiving">体験ダイビング</a>
          </li>
          <li class="gnav__item gnav__item--sub gnav__item--mb40">
            <a href="page-price.html#fundiving">ファンダイビング</a>
          </li>
        </ul>
        <ul class="gnav__items">
          <li class="gnav__item gnav__item--main">
            <a href="page-information.html">ダイビング情報 </a>
          </li>
          <li class="gnav__item gnav__item--sub">
            <a href="page-information.html#tab-license">ライセンス講習</a>
          </li>
          <li class="gnav__item gnav__item--sub">
            <a href="page-information.html#tab-trialdiving">体験ダイビング</a>
          </li>
          <li class="gnav__item gnav__item--sub gnav__item--mb40">
            <a href="page-information.html#tab-fundiving">ファンダイビング</a>
          </li>
          <li class="gnav__item gnav__item--main">
            <a href="home.html">ブログ</a>
          </li>
        </ul>
        <ul class="gnav__items">
          <li class="gnav__item gnav__item--main gnav__item--mb40">
            <a href="page-faq.html">よくある質問</a>
          </li>
          <li class="gnav__item gnav__item--main gnav__item--mb40">
            <a href="page-privacypolicy.html">プライバシー
              <br class="u-mobile">ポリシー
            </a>
          </li>
          <li class="gnav__item gnav__item--main gnav__item--mb40">
            <a href="page-terms-of-service.html">利用規約</a>
          </li>
          <li class="gnav__item gnav__item--main gnav__item--mb40">
            <a href="page-sitemap.html">サイトマップ</a>
          </li>
          <li class="gnav__item gnav__item--main gnav__item--mb40">
            <a href="page-contact.html">お問い合わせ</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>
  <main>
    <section class="mv-sub voice-mv">
      <h1 class="mv-sub__title">voice</h1>
      <picture>
        <source media="(min-width:768px)" srcset="./assets/images/common/voice-mv_pc.jpg">
        <img class="mv-sub__image" src="<?php echo get_theme_file_uri(); ?>/assets/images/common/voice-mv_sp.jpg" alt="ダイビングをしている人の画像">
      </picture>
    </section>
    <div class="breadcrumbs voice-breadcrumbs">
      <div class="breadcrumbs__inner inner">パンくずリストが入る</div>
    </div>
    <div class="voice-sub voice-sub-content icon-fish">
      <div class="inner">
        <!-- カスタムタクソノミー/Custom Post Type UI -->
        <div class="voice-sub__category category">
          <!-- hrefとdata-tabを #category- プレフィックスに変更 -->
          <a href="#category-tab-1" class="category__btn active" data-tab="tab-1">all</a>
          <a href="#category-tab-2" class="category__btn" data-tab="tab-2">ライセンス講習</a>
          <a href="#category-tab-4" class="category__btn" data-tab="tab-4">ファンダイビング</a>
          <a href="#category-tab-3" class="category__btn" data-tab="tab-3">体験ダイビング</a>
        </div>
        <!-- カスタムタクソノミー/Custom Post Type UI/ここまで -->

        <div class="voice-sub__card-wrapper voice-cards">
          <!-- js-tab-クラスを持つ要素を修正 -->
          <article class="voice-cards__item voice-card js-tab-2">
            <div class="voice-card__head">
              <div class="voice-card__info">
                <div class="voice-card__inner">
                  <p class="voice-card__age">20代(女性)</p>
                  <p class="voice-card__category">ライセンス講習</p>
                </div>
                <h2 class="voice-card__title">ここにタイトルが入ります。ここにタイトル</h2>
              </div>
              <div class="voice-card__image colorbox js-colorbox">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/voice_1.jpg" alt="女性の画像">
              </div>
            </div>
            <p class="voice-card__text">
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
              <br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
              <br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
            </p>
          </article>

          <article class="voice-cards__item voice-card js-tab-4">
            <div class="voice-card__head">
              <div class="voice-card__info">
                <div class="voice-card__inner">
                  <p class="voice-card__age">30代(女性)</p>
                  <p class="voice-card__category">ファンダイビング</p>
                </div>
                <h2 class="voice-card__title">ここにタイトルが入ります。ここにタイトル長いタイトル長いタイトル長いタイトル</h2>
              </div>
              <div class="voice-card__image colorbox js-colorbox">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/voice_2.jpg" alt="男性の画像">
              </div>
            </div>
            <p class="voice-card__text">
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
              <br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
              <br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。長いテキスト
            </p>
          </article>

          <article class="voice-cards__item voice-card js-tab-3">
            <div class="voice-card__head">
              <div class="voice-card__info">
                <div class="voice-card__inner">
                  <p class="voice-card__age">30代(女性)</p>
                  <p class="voice-card__category">体験ダイビング</p>
                </div>
                <h2 class="voice-card__title">ここにタイトルが入ります。ここにタイトル</h2>
              </div>
              <div class="voice-card__image colorbox js-colorbox">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/voice_2.jpg" alt="男性の画像">
              </div>
            </div>
            <p class="voice-card__text">
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
              <br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
              <br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
            </p>
          </article>

          <article class="voice-cards__item voice-card js-tab-4">
            <div class="voice-card__head">
              <div class="voice-card__info">
                <div class="voice-card__inner">
                  <p class="voice-card__age">30代(女性)</p>
                  <p class="voice-card__category">ファンダイビング</p>
                </div>
                <h2 class="voice-card__title">ここにタイトルが入ります。ここにタイトル</h2>
              </div>
              <div class="voice-card__image colorbox js-colorbox">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/voice_2.jpg" alt="男性の画像">
              </div>
            </div>
            <p class="voice-card__text">
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
              <br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
              <br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
            </p>
          </article>

          <article class="voice-cards__item voice-card js-tab-2">
            <div class="voice-card__head">
              <div class="voice-card__info">
                <div class="voice-card__inner">
                  <p class="voice-card__age">30代(女性)</p>
                  <p class="voice-card__category">ライセンス講習</p>
                </div>
                <h2 class="voice-card__title">ここにタイトルが入ります。ここにタイトル</h2>
              </div>
              <div class="voice-card__image colorbox js-colorbox">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/voice_2.jpg" alt="男性の画像">
              </div>
            </div>
            <p class="voice-card__text">
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
              <br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
              <br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
            </p>
          </article>

          <article class="voice-cards__item voice-card js-tab-2">
            <div class="voice-card__head">
              <div class="voice-card__info">
                <div class="voice-card__inner">
                  <p class="voice-card__age">30代(女性)</p>
                  <p class="voice-card__category">ライセンス講習</p>
                </div>
                <h2 class="voice-card__title">ここにタイトルが入ります。ここにタイトル</h2>
              </div>
              <div class="voice-card__image colorbox js-colorbox">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/voice_2.jpg" alt="男性の画像">
              </div>
            </div>
            <p class="voice-card__text">
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
              <br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
              <br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
            </p>
          </article>
        </div>

        <!-- Wp-PageNavi -->
        <div class="voice-sub__pagenav wp-pagenavi">
          <a class="previouspostslink" rel="prev" href=""></a>
          <span class="current">1</span>
          <a href="page larger">2</a>
          <a href="page larger">3</a>
          <a href="page larger">4</a>
          <a href="page larger" class="u-desktop">5</a>
          <a href="page larger" class="u-desktop">6</a>
          <a class="nextpostslink" rel="next" href=""></a>
        </div>
        <!-- Wp-PageNaviここまで -->
      </div>
    </div>

    <!-- 共通コンタクトエリア -->
    <section class="common-contact top-contact">
      <div class="inner">
        <div class="common-contact__inner">
          <div class="common-contact__content">
            <div class="common-contact__logo">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/logo-blue.svg" alt="コードアップスのロゴ">
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
              <a class="btn" href="page-contact.html">
                <span class="btn__inner">contact&nbsp;us </span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <footer id="footer" class="footer">
    <div class="footer__inner inner">
      <div class="footer__head">
        <div class="footer__logo">
          <a href="index.html">
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
            <a href="archive-campaign.html#category-tab-1">キャンペーン</a>
          </li>
          <li class="gnav__item gnav__item--sub">
            <a href="archive-campaign.html#category-tab-2">ライセンス取得</a>
          </li>
          <li class="gnav__item gnav__item--sub">
            <a href="archive-campaign.html#category-tab-3">貸切体験ダイビング</a>
          </li>
          <li class="gnav__item gnav__item--sub gnav__item--mb40">
            <a href="archive-campaign.html#category-tab-4">ファンダイビング</a>
          </li>
          <li class="gnav__item gnav__item--main">
            <a href="page-about-us.html">私たちについて</a>
          </li>
        </ul>
        <ul class="gnav__items">
          <li class="gnav__item gnav__item--main gnav__item--mb40">
            <a href="archive-voice.html">お客様の声 </a>
          </li>
          <li class="gnav__item gnav__item--main">
            <a href="page-price.html">料金一覧 </a>
          </li>
          <li class="gnav__item gnav__item--sub">
            <a href="page-price.html#licensediving">ライセンス講習</a>
          </li>
          <li class="gnav__item gnav__item--sub">
            <a href="page-price.html#trialdiving">体験ダイビング</a>
          </li>
          <li class="gnav__item gnav__item--sub gnav__item--mb40">
            <a href="page-price.html#fundiving">ファンダイビング</a>
          </li>
        </ul>
        <ul class="gnav__items">
          <li class="gnav__item gnav__item--main">
            <a href="page-information.html">ダイビング情報 </a>
          </li>
          <li class="gnav__item gnav__item--sub">
            <a href="page-information.html#tab-license">ライセンス講習</a>
          </li>
          <li class="gnav__item gnav__item--sub">
            <a href="page-information.html#tab-trialdiving">体験ダイビング</a>
          </li>
          <li class="gnav__item gnav__item--sub gnav__item--mb40">
            <a href="page-information.html#tab-fundiving">ファンダイビング</a>
          </li>
          <li class="gnav__item gnav__item--main">
            <a href="home.html">ブログ</a>
          </li>
        </ul>
        <ul class="gnav__items">
          <li class="gnav__item gnav__item--main gnav__item--mb40">
            <a href="page-faq.html">よくある質問</a>
          </li>
          <li class="gnav__item gnav__item--main gnav__item--mb40">
            <a href="page-privacypolicy.html">プライバシー
              <br class="u-mobile">ポリシー
            </a>
          </li>
          <li class="gnav__item gnav__item--main gnav__item--mb40">
            <a href="page-terms-of-service.html">利用規約</a>
          </li>
          <li class="gnav__item gnav__item--main gnav__item--mb40">
            <a href="page-sitemap.html">サイトマップ</a>
          </li>
          <li class="gnav__item gnav__item--main gnav__item--mb40">
            <a href="page-contact.html">お問い合わせ</a>
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
</body>

</html>