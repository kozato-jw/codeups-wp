<?php get_header(); ?>
<main>
  <section class="mv-sub information-mv">
    <h1 class="mv-sub__title">information</h1>
    <picture>
      <source media="(min-width:768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/info-mv_pc.jpg">
      <img class="mv-sub__image" src="<?php echo get_theme_file_uri(); ?>/assets/images/common/info-mv_sp.jpg" alt="海中を泳ぐ魚の画像">
    </picture>
  </section>
  <div class="breadcrumbs information-breadcrumbs">
    <div class="breadcrumbs__inner inner"><?php get_template_part('parts/breadcrumb'); ?></div>
  </div>
  <section class="information-sub information-sub-content icon-fish icon-fish--information">
    <div class="inner">
      <div class="information-sub__tab tab">
        <!-- タブボタンの href を #tab- プレフィックスに変更 -->
        <a href="#tab-license" class="tab__btn active">ライセンス<br class="u-mobile">講習</a>
        <a href="#tab-fundiving" class="tab__btn">ファン<br class="u-mobile">ダイビング</a>
        <a href="#tab-trialdiving" class="tab__btn">体験<br class="u-mobile">ダイビング</a>
      </div>

      <div class="information-sub__cards">
        <!-- カードの id を #tab- プレフィックスに変更 -->
        <div id="tab-license" class="information-sub__card information-card">
          <div class="information-card__inner">
            <div class="information-card__text-wrapper">
              <h2 class="information-card__title">ライセンス講習</h2>
              <p class="information-card__text">
                泳げない人も、ちょっと水が苦手な人も、ダイビングを「安全に」楽しんでいただけるよう、スタッフがサポートいたします！スキューバダイビングを楽しむためには最低限の知識とスキルが要求されます。知識やスキルと言ってもそんなに難しい事ではなく、安全に楽しむ事を目的としたものです。プロダイバーの指導のもと知識とスキルを習得しCカードを取得して、ダイバーになろう！
              </p>
            </div>
            <div class="information-card__image">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/info-license.jpg" alt="ダイビングをしている人の画像">
            </div>
          </div>
        </div>

        <div id="tab-fundiving" class="information-sub__card information-card">
          <div class="information-card__inner">
            <div class="information-card__text-wrapper">
              <h2 class="information-card__title">ファンダイビング</h2>
              <p class="information-card__text">
                ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！
              </p>
            </div>
            <div class="information-card__image">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/info-diving.jpg" alt="海中で無数の小魚が泳いでいる画像">
            </div>
          </div>
        </div>

        <div id="tab-trialdiving" class="information-sub__card information-card">
          <div class="information-card__inner">
            <div class="information-card__text-wrapper">
              <h2 class="information-card__title">体験ダイビング</h2>
              <p class="information-card__text">
                ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！
              </p>
            </div>
            <div class="information-card__image">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/info-experience.jpg" alt="海中を泳ぐ魚の画像">
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <?php get_template_part('parts/common-contact'); ?>
</main>
<?php get_footer(); ?>