<?php get_header(); ?>
<main>
  <section class="mv-sub voice-mv">
    <h1 class="mv-sub__title">voice</h1>
    <picture>
      <source media="(min-width:768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/voice-mv_pc.jpg">
      <img class="mv-sub__image" src="<?php echo get_theme_file_uri(); ?>/assets/images/common/voice-mv_sp.jpg" alt="ダイビングをしている人の画像">
    </picture>
  </section>

  <!-- パンクズリスト -->
  <?php get_template_part('parts/breadcrumb'); ?>

  <div class="voice-sub voice-sub-content icon-fish">
    <div class="inner">

      <!-- カスタムタクソノミー -->
      <div class="voice-sub__category category" data-target="voice-card">
        <!-- "All" ボタン -->
        <a href="<?php echo esc_url(get_post_type_archive_link('voice')); ?>"
          class="category__btn <?php if (!is_tax('voice_category')) echo 'active'; ?>"
          aria-current="<?php echo (!is_tax('voice_category')) ? 'page' : 'false'; ?>"
          data-tab="all">all</a>

        <?php
        $terms = get_terms(array(
          'taxonomy' => 'voice_category',
          'hide_empty' => true,
        ));

        if (!empty($terms) && !is_wp_error($terms)) {
          foreach ($terms as $term) :
            $is_active = (is_tax('voice_category', $term->slug)) ? 'active' : '';
        ?>
            <a href="<?php echo esc_url(get_term_link($term)); ?>"
              class="category__btn <?php echo esc_attr($is_active); ?>"
              aria-current="<?php echo $is_active ? 'page' : 'false'; ?>"
              data-tab="<?php echo esc_attr($term->slug); ?>">
              <?php echo esc_html($term->name); ?>
            </a>
        <?php
          endforeach;
        } else {
          echo '<p>カテゴリーはありません。</p>';
        }
        ?>
      </div>
      <!-- カスタムタクソノミーここまで -->

      <div class="voice-sub__card-wrapper voice-cards">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php
            $categories = get_the_terms(get_the_ID(), 'voice_category');
            $category_classes = '';

            if ($categories && !is_wp_error($categories)) {
              foreach ($categories as $category) {
                $category_classes .= ' js-tab-' . esc_attr($category->slug);
              }
            }
            ?>
            <article class="voice-cards__item voice-card<?php echo $category_classes; ?>">
              <div class="voice-card__head">
                <div class="voice-card__info">
                  <div class="voice-card__inner">
                    <?php
                    $age = get_field('age');
                    $gender = get_field('gender');
                    $voicetext = get_field('voice-text');
                    ?>
                    <?php if (!empty($age) && !empty($gender)): ?>
                      <p class="voice-card__age">
                        <?php echo esc_html($age); ?>
                        &lpar;<?php echo esc_html($gender); ?>&rpar;
                      </p>
                    <?php endif; ?>
                    <p class="voice-card__category"><?php echo esc_html($categories[0]->name ?? '未分類'); ?></p>
                  </div>
                  <h2 class="voice-card__title"><?php the_title(); ?></h2>
                </div>
                <div class="voice-card__image colorbox js-colorbox">
                  <figure class="blog-post__eyecatch">
                    <?php if (has_post_thumbnail()) : ?>
                      <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
                    <?php else : ?>
                      <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/noimage.jpg" alt="noimage">
                    <?php endif; ?>
                  </figure>
                </div>
              </div>
              <?php if ($voicetext): ?>
                <p class="voice-card__text">
                  <!-- 文字数制限の関数を適用（custom_excerpt） -->
                  <?php echo custom_excerpt($voicetext); ?>
                </p>
              <?php endif; ?>
            </article>
        <?php endwhile;
        endif; ?>
      </div>

      <!-- ページネーション取得 -->
      <?php wp_pagenavi(); ?>
      
    </div>
  </div>

</main>
<?php get_footer(); ?>