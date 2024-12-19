<?php get_header(); ?>
<main>
  <section class="mv-sub price-mv">
    <h1 class="mv-sub__title">price</h1>
    <picture>
      <source media="(min-width:768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-mv_pc.jpg">
      <img class="mv-sub__image" src="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-mv_sp.jpg" alt="ダイバーが海面から頭を出している画像">
    </picture>
  </section>
  <div class="breadcrumbs price-breadcrumbs">
    <div class="breadcrumbs__inner inner"><?php get_template_part('parts/breadcrumb'); ?></div>
  </div>
  <section class="price-sub price-sub-content icon-fish icon-fish--price">
    <div class="inner-sub">
      <div class="price-sub__items price-lists">
        <div id="licensediving" class="price-lists__item price-list">
          <div class="price-list__title">
            <h2 class="price-list__title-text">ライセンス講習</h2>
          </div>
          <table class="price-list__list">
            <tr>
              <th class="price-list__head">オープンウォーター
                <br class="u-mobile">ダイバーコース
              </th>
              <td class="price-list__price">¥50,000</td>
            </tr>
            <tr>
              <th class="price-list__head">アドバンスド
                <br class="u-mobile">オープンウォーターコース長い項目が入る長い項目が入る長い項目が入る
              </th>
              <td class="price-list__price">¥60,000</td>
            </tr>
            <tr>
              <th class="price-list__head">レスキュー＋EFRコース</th>
              <td class="price-list__price">¥70,000</td>
            </tr>
          </table>
        </div>
        <div id="trialdiving" class="price-lists__item price-list">
          <div class="price-list__title">
            <h2 class="price-list__title-text">体験ダイビング</h2>
          </div>
          <table class="price-list__list">
            <tr>
              <th class="price-list__head">ビーチ体験ダイビング
                <br class="u-mobile">(半日)
              </th>
              <td class="price-list__price">¥7,000</td>
            </tr>
            <tr>
              <th class="price-list__head">ビーチ体験ダイビング
                <br class="u-mobile">(1日)
              </th>
              <td class="price-list__price">¥14,000</td>
            </tr>
            <tr>
              <th class="price-list__head">ボート体験ダイビング
                <br class="u-mobile">(半日)
              </th>
              <td class="price-list__price">¥10,000</td>
            </tr>
            <tr>
              <th class="price-list__head">ボート体験ダイビング
                <br class="u-mobile">(1日)
              </th>
              <td class="price-list__price">¥18,000</td>
            </tr>
          </table>
        </div>
        <div id="fundiving" class="price-lists__item price-list">
          <div class="price-list__title">
            <h2 class="price-list__title-text">ファンダイビング</h2>
          </div>
          <table class="price-list__list">
            <tr>
              <th class="price-list__head">ビーチダイビング
                <br class="u-mobile">(2ダイブ)
              </th>
              <td class="price-list__price">¥14,000</td>
            </tr>
            <tr>
              <th class="price-list__head">ボートダイビング
                <br class="u-mobile">(2ダイブ)
              </th>
              <td class="price-list__price">¥18,000</td>
            </tr>
            <tr>
              <th class="price-list__head">スペシャルダイビング
                <br class="u-mobile">(2ダイブ)
              </th>
              <td class="price-list__price">¥24,000</td>
            </tr>
            <tr>
              <th class="price-list__head">ナイトダイビング
                <br class="u-mobile">(1ダイブ)
              </th>
              <td class="price-list__price">¥10,000</td>
            </tr>
          </table>
        </div>
        <div class="price-lists__item price-list">
          <div class="price-list__title">
            <h2 class="price-list__title-text">スペシャルダイビング</h2>
          </div>
          <table class="price-list__list">
            <tr>
              <th class="price-list__head">貸切ダイビング
                <br class="u-mobile">(2ダイブ)
              </th>
              <td class="price-list__price">¥24,000</td>
            </tr>
            <tr>
              <th class="price-list__head">1日ダイビング
                <br class="u-mobile">(3ダイブ)
              </th>
              <td class="price-list__price">¥32,000</td>
            </tr>
            <tr>
              <th class="price-list__head">ナイトダイビング
                <br class="u-mobile">(2ダイブ)
              </th>
              <td class="price-list__price">¥14,000</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </section>
  <?php get_template_part('parts/common-contact'); ?>
</main>
<?php get_footer(); ?>