<?php get_header(); ?>
<main>
  <section class="mv-sub price-mv">
    <h1 class="mv-sub__title">price</h1>
    <picture>
      <source media="(min-width:768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-mv_pc.jpg">
      <img class="mv-sub__image" src="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-mv_sp.jpg" alt="ダイバーが海面から頭を出している画像">
    </picture>
  </section>

  <!-- パンクズリスト -->
  <?php get_template_part('parts/breadcrumb'); ?>

  <section class="price-sub price-sub-content icon-fish icon-fish--price">
    <div class="inner-sub">
      <div class="price-sub__items price-lists">
        <!-- 以下 カスタムタクソノミーとカスタムフィールドを紐づけてループ -->
        <div class="price-lists">
          <?php
          // カスタムタクソノミーの情報取得
          $terms = get_terms(array(
            'taxonomy' => 'price_category',
            'hide_empty' => false,
          ));

          if (!empty($terms) && !is_wp_error($terms)) :
            foreach ($terms as $term) :
              // ターム名とそのスラッグを取得
              $term_name = $term->name;
              $term_slug = $term->slug;
              // タームと紐づけたカスタムフィールドの情報取得
              $course_names = get_term_meta($term->term_id, 'course_name', false);
              $course_prices = get_term_meta($term->term_id, 'course_price', false);

              $courses = array();
              if (is_array($course_names) && is_array($course_prices)) {
                for ($i = 0; $i < count($course_names); $i++) {
                  $courses[] = array(
                    'course_name' => isset($course_names[$i]) ? $course_names[$i] : '',
                    'course_price' => isset($course_prices[$i]) ? $course_prices[$i] : ''
                  );
                }
              }
          ?>
              <div id="<?php echo esc_attr($term_slug); ?>" class="price-lists__item price-list">
                <div class="price-list__title">
                  <h2 class="price-list__title-text"><?php echo esc_html($term_name); ?></h2>
                </div>
                <table class="price-list__list">
                  <?php if (!empty($courses)) : ?>
                    <?php foreach ($courses as $course) : ?>
                      <tr>
                        <th class="price-list__head">
                          <?php echo wp_kses_post($course['course_name']); ?>
                        </th>
                        <td class="price-list__price">
                          &yen;<?php echo esc_html($course['course_price']); ?>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </table>
              </div>
          <?php
            endforeach;
          endif;
          ?>
        </div>
        <!-- 以上 カスタムタクソノミーとカスタムフィールドをループ -->
      </div>
    </div>
  </section>

</main>
<?php get_footer(); ?>