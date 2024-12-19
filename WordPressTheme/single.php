<?php get_header(); ?>
<main>
  <section class="mv-sub blog-mv">
    <div class="mv-sub__title">blog</div>
    <picture>
      <source media="(min-width:768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-mv_pc.jpg">
      <img class="mv-sub__image" src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-mv_sp.jpg" alt="海中を泳ぐ魚の画像">
    </picture>
  </section>
  <div class="breadcrumbs blog-single-breadcrumbs">
    <div class="breadcrumbs__inner inner"><?php get_template_part('parts/breadcrumb'); ?></div>
  </div>
  <div class="blog-sub inner blog-sub-content">
    <div class="blog-sub__inner inner">
      <div class="blog-sub__post-wrapper">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="blog-post" class="blog-sub__post blog-post">
              <time class="blog-post__time" datetime="<?php the_time('c'); ?>"><?php the_time('Y.m/d'); ?></time>
              <h1 class="blog-post__title"><?php the_title(); ?></h1>
              <!-- アイキャッチここから -->
              <figure class="blog-post__eyecatch">
                <?php if (has_post_thumbnail()) : ?>
                  <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
                <?php else :  ?>
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/noimage.jpg" alt="noimage">
                <?php endif; ?>
              </figure>
              <!-- アイキャッチここまで -->
              <div class="blog-post__content">
                <?php the_content(); ?>
              </div>
            </article>
        <?php endwhile;
        endif; ?>
        <!-- 記事前後のボタン -->
        <?php
        $prev = get_previous_post();
        $prev_url = get_permalink($prev->ID);
        $next = get_next_post();
        $next_url = get_permalink($next->ID);
        ?>
        <div class="wp-pagenavi">
          <?php if ($prev_url): ?>
            <a class="previouspostslink" rel="prev" href="<?php echo $prev_url; ?>"></a>
          <?php endif; ?>
          <?php if ($next_url): ?>
            <a class="nextpostslink" rel="next" href="<?php echo $next_url; ?>"></a>
          <?php endif; ?>
        </div>
        <!-- 記事前後のボタンここまで -->
      </div>
      <aside class="blog-sub__sidebar sidebar">
        <div class="sidebar__inner">
          <section class="sidebar__content">
            <h2 class="sidebar__title sidebar__title--article">人気記事</h2>
            <div class="sidebar__blog-cards">
              <article class="sidebar__blog-card blog-card">
                <a href="single.html" class="blog-card__link blog-card__link--sidebar">
                  <div class="blog-card__image blog-card__image--sidebar">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog_4.jpg" alt="黄色の熱帯魚の画像">
                  </div>
                  <div class="blog-card__meta">
                    <time class="blog-card__date blog-card__date--sidebar" datetime="2023-11-17">2023.11/17</time>
                    <h3 class="blog-card__title blog-card__title--sidebar">ライセンス取得</h3>
                  </div>
                </a>
              </article>
              <article class="sidebar__blog-card blog-card">
                <a href="single.html" class="blog-card__link blog-card__link--sidebar">
                  <div class="blog-card__image blog-card__image--sidebar">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog_2.jpg" alt="ウミガメの画像">
                  </div>
                  <div class="blog-card__meta">
                    <time class="blog-card__date blog-card__date--sidebar" datetime="2023-11-17">2023.11/17</time>
                    <h3 class="blog-card__title blog-card__title--sidebar">ウミガメと泳ぐ</h3>
                  </div>
                </a>
              </article>
              <article class="sidebar__blog-card blog-card">
                <a href="single.html" class="blog-card__link blog-card__link--sidebar">
                  <div class="blog-card__image blog-card__image--sidebar">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog_3.jpg" alt="カクレクマノミの画像">
                  </div>
                  <div class="blog-card__meta">
                    <time class="blog-card__date blog-card__date--sidebar" datetime="2023-11-17">2023.11/17</time>
                    <h3 class="blog-card__title blog-card__title--sidebar">カクレクマノミ</h3>
                  </div>
                </a>
              </article>
            </div>
          </section>
          <section class="sidebar__content">
            <h2 class="sidebar__title">口コミ</h2>
            <article class="sidebar__voice-card voice-card voice-card--sidebar">
              <div class="voice-card__head voice-card__head--sidebar">
                <div class="voice-card__info voice-card__info--sidebar">
                  <div class="voice-card__inner">
                    <p class="voice-card__age voice-card__age--sidebar">30代(カップル)</p>
                  </div>
                  <h3 class="voice-card__title voice-card__title--sidebar">ここにタイトルが入ります。ここにタイトル</h3>
                </div>
                <div class="voice-card__image voice-card__image--sidebar">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/voice_3.jpg" alt="カップルが腕を組んでいる画像">
                </div>
              </div>
            </article>
            <div class="sidebar__btn">
              <a class="btn" href="<?php echo $voice; ?>">
                <span class="btn__inner">view&nbsp;more </span>
              </a>
            </div>
          </section>
          <section class="sidebar__content">
            <h2 class="sidebar__title sidebar__title--campaign">キャンペーン</h2>
            <div class="sidebar__campaign-cards">
              <div class="sidebar__campaign-card campaign-card">
                <div class="campaign-card__image campaign-card__image--sidebar">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign_1.jpg" alt="海中で無数の小魚が泳いでいる画像">
                </div>
                <div class="campaign-card__content campaign-card__content--sidebar">
                  <h3 class="campaign-card__title campaign-card__title--sidebar">ライセンス取得</h3>
                  <p class="campaign-card__text campaign-card__text--sidebar">全部コミコミ(お一人様)</p>
                  <p class="campaign-card__price campaign-card__price--sidebar">
                    <span class="campaign-card__price-disabled campaign-card__price-disabled--sidebar">¥56,000</span>
                    <span class="campaign-card__price-current campaign-card__price-current--sidebar">¥46,000</span>
                  </p>
                </div>
              </div>
              <div class="sidebar__campaign-card campaign-card">
                <div class="campaign-card__image campaign-card__image--sidebar">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign_2.jpg" alt="海面に浮かぶ船の画像">
                </div>
                <div class="campaign-card__content campaign-card__content--sidebar">
                  <h3 class="campaign-card__title campaign-card__title--sidebar">貸切体験ダイビング</h3>
                  <p class="campaign-card__text campaign-card__text--sidebar">全部コミコミ(お一人様)</p>
                  <p class="campaign-card__price campaign-card__price--sidebar">
                    <span class="campaign-card__price-disabled campaign-card__price-disabled--sidebar">¥24,000</span>
                    <span class="campaign-card__price-current campaign-card__price-current--sidebar">¥18,000</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="sidebar__btn">
              <a class="btn" href="<?php echo $campaign; ?>">
                <span class="btn__inner">view&nbsp;more </span>
              </a>
            </div>
          </section>
          <section class="sidebar__content">
            <h2 class="sidebar__title">アーカイブ</h2>
            <ol class="sidebar__archive-lists">
              <li class="sidebar__archive-list">
                <a class="sidebar__archive-year js-sidebar__archive-year js-active" href="#">2023</a>
                <ol class="sidebar__archive-months js-sidebar__archive-months js-active">
                  <li class="sidebar__archive-month">
                    <a href="single.html">3月</a>
                  </li>
                  <li class="sidebar__archive-month">
                    <a href="single.html">2月</a>
                  </li>
                  <li class="sidebar__archive-month">
                    <a href="single.html">1月</a>
                  </li>
                </ol>
              </li>
              <li class="sidebar__archive-list">
                <a class="sidebar__archive-year js-sidebar__archive-year" href="#">2022</a>
                <ol class="sidebar__archive-months js-sidebar__archive-months">
                  <li class="sidebar__archive-month">
                    <a href="single.html">12月</a>
                  </li>
                  <li class="sidebar__archive-month">
                    <a href="single.html">11月</a>
                  </li>
                  <li class="sidebar__archive-month">
                    <a href="single.html">10月</a>
                  </li>
                  <li class="sidebar__archive-month">
                    <a href="single.html">9月</a>
                  </li>
                  <li class="sidebar__archive-month">
                    <a href="single.html">8月</a>
                  </li>
                  <li class="sidebar__archive-month">
                    <a href="single.html">7月</a>
                  </li>
                  <li class="sidebar__archive-month">
                    <a href="single.html">6月</a>
                  </li>
                  <li class="sidebar__archive-month">
                    <a href="single.html">5月</a>
                  </li>
                  <li class="sidebar__archive-month">
                    <a href="single.html">4月</a>
                  </li>
                  <li class="sidebar__archive-month">
                    <a href="single.html">3月</a>
                  </li>
                  <li class="sidebar__archive-month">
                    <a href="single.html">2月</a>
                  </li>
                  <li class="sidebar__archive-month">
                    <a href="single.html">1月</a>
                  </li>
                </ol>
              </li>
            </ol>
          </section>
        </div>
      </aside>
    </div>
  </div>
  <?php get_template_part('parts/common-contact'); ?>
</main>
<?php get_footer(); ?>