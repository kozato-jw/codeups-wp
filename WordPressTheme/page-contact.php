<?php get_header(); ?>
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

  <div class="contact contact-form icon-fish icon-fish--contact">
    <div class="inner-sub">
      <?php echo do_shortcode('[contact-form-7 id="243da08" title="お問い合わせ"]'); ?>
    </div>
  </div>

</main>
<?php get_footer(); ?>