<?php
/*
Template Name: お問い合わせ(送信完了)
*/
get_header(); ?>
<main>
  <section class="mv-sub contact-mv">
    <h1 class="mv-sub__title">contact</h1>
    <picture>
      <source media="(min-width:768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/contact-mv_pc.jpg">
      <img class="mv-sub__image" src="<?php echo get_theme_file_uri(); ?>/assets/images/common/contact-mv_sp.jpg" alt="青い波と白い砂浜の波打ち際の画像">
    </picture>
  </section>
  <div class="breadcrumbs contact-breadcrumbs">
    <div class="breadcrumbs__inner inner"><?php get_template_part('parts/breadcrumb'); ?></div>
  </div>
  <div class="complete contact-complete icon-fish icon-fish--complete">
    <div class="inner">
      <p class="complete__text complete__text--top">お問い合わせ内容を送信完了しました。</p>
      <p class="complete__text">このたびは、お問い合わせ頂き
        <br class="u-mobile">誠にありがとうございます。
        <br>お送り頂きました内容を確認の上、
        <br class="u-mobile">3営業日以内に折り返しご連絡させて頂きます。
        <br>また、ご記入頂いたメールアドレスへ、
        <br class="u-mobile">自動返信の確認メールをお送りしております。
      </p>
    </div>
  </div>
</main>
<?php get_footer(); ?>