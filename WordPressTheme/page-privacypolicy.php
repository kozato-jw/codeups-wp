<?php get_header(); ?>
<main>
  <section class="mv-sub privacy-mv">
    <h1 class="mv-sub__title">privacy
      <span class="mv-sub__title-privacy">p</span>olicy
    </h1>
    <picture>
      <source media="(min-width:768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/under-common-mv_pc.jpg">
      <img class="mv-sub__image" src="<?php echo get_theme_file_uri(); ?>/assets/images/common/under-common-mv_sp.jpg" alt="海中で無数の小魚が泳いでいる画像">
    </picture>
  </section>
  <div class="breadcrumbs privacy-breadcrumbs">
    <div class="breadcrumbs__inner inner"><?php get_template_part('parts/breadcrumb'); ?></div>
  </div>
  <div class="inner">
    <div class="privacy privacy-content icon-fish">
      <div class="privacy__inner">
        <?php the_content() ?>
      </div>
    </div>
  </div>
  <?php get_template_part('parts/common-contact'); ?>
</main>
<?php get_footer(); ?>