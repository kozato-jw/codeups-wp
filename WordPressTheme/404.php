<?php get_header(); ?>
<main>
  <div class="error404">
    <div class="breadcrumbs error404-breadcrumbs">
      <div class="breadcrumbs__inner breadcrumbs__inner--404 inner">
        <?php get_template_part('parts/breadcrumb'); ?>
      </div>
    </div>
    <div class="error404__wrapper">
      <h1 class="error404__title">404</h1>
      <p class="error404__text">申し訳ありません。
        <br>お探しのページが見つかりません。
      </p>
      <div class="error404__btn">
        <a class="btn btn--404" href="<?php echo $home; ?>">
          <span class="btn__inner btn__inner--404">page
            <span class="btn__404">top</span>
          </span>
        </a>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>