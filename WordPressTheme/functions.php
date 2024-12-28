<?php

// css/jsの読み込み
function my_theme_enqueue_styles_and_scripts()
{
  // Google Fonts
  wp_enqueue_style(
    'google-fonts',
    'https://fonts.googleapis.com/css2?family=Gotu&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Noto+Sans+JP&family=Noto+Serif+JP:wght@200..900&display=swap',
    array(),
    null
  );

  // Swiper CSS
  wp_enqueue_style(
    'swiper-css',
    'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css',
    array(),
    null
  );

  // テーマのスタイルシート
  wp_enqueue_style(
    'theme-style',
    get_theme_file_uri('/assets/css/style.css'),
    array(),
    filemtime(get_theme_file_path('/assets/css/style.css'))
  );

  // jQuery
  wp_enqueue_script(
    'jquery',
    'https://code.jquery.com/jquery-3.7.1.js',
    array(),
    null,
    true
  );

  // Swiper JavaScript
  wp_enqueue_script(
    'swiper-js',
    'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js',
    array(),
    null,
    true
  );

  // jQuery Inview Plugin
  wp_enqueue_script(
    'jquery-inview',
    get_theme_file_uri('/assets/js/jquery.inview.min.js'),
    array('jquery'),
    filemtime(get_theme_file_path('/assets/js/jquery.inview.min.js')),
    true
  );

  // テーマのJavaScript
  wp_enqueue_script(
    'theme-script',
    get_theme_file_uri('/assets/js/script.js'),
    array('jquery'),
    filemtime(get_theme_file_path('/assets/js/script.js')),
    true
  );
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles_and_scripts');



// （ナビメニュー）グローバル変数の定義
global $home, $campaign, $aboutus, $information, $blog, $voice, $price, $faq, $contact, $privacy, $termsofservice, $sitemap;

$home = esc_url(home_url('/'));
$campaign = esc_url(home_url('/campaign/'));
$aboutus = esc_url(home_url('/about-us/'));
$information = esc_url(home_url('/information/'));
$blog = esc_url(home_url('/blog/'));
$voice = esc_url(home_url('/voice/'));
$price = esc_url(home_url('/price/'));
$faq = esc_url(home_url('/faq/'));
$contact = esc_url(home_url('/contact/'));
$privacy = esc_url(home_url('/privacypolicy/'));
$termsofservice = esc_url(home_url('/terms-of-service/'));
$sitemap = esc_url(home_url('/sitemap/'));




// アイキャッチの有効化
function my_setup()
{
  add_theme_support('post-thumbnails'); /* アイキャッチ */
  add_theme_support('automatic-feed-links'); /* RSSフィード */
  add_theme_support('title-tag'); /* タイトルタグ自動生成 */
  add_theme_support(
    'html5',
    array( /* HTML5のタグで出力 */
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    )
  );
}
add_action('after_setup_theme', 'my_setup');



// カスタム投稿の表示件数（キャンペーン）
function change_campaign_posts_per_page($query)
{
  if (is_admin() || !$query->is_main_query()) {
    return;
  }
  if ($query->is_post_type_archive('campaign')) {
    $query->set('posts_per_page', 4);
  }
}
add_action('pre_get_posts', 'change_campaign_posts_per_page');



// カスタム投稿の表示件数（ボイス）
function change_voice_posts_per_page($query)
{
  if (is_admin() || !$query->is_main_query()) {
    return;
  }
  if ($query->is_post_type_archive('voice')) {
    $query->set('posts_per_page', 6);
  }
}
add_action('pre_get_posts', 'change_voice_posts_per_page');



//通常投稿の名称変更
function Change_menulabel()
{
  global $menu;
  global $submenu;
  $name = 'ブログ';
  $menu[5][0] = $name;
  $submenu['edit.php'][5][0] = $name . '一覧';
  $submenu['edit.php'][10][0] = '新しい' . $name;
}
function Change_objectlabel()
{
  global $wp_post_types;
  $name = 'お知らせ';
  $labels = &$wp_post_types['post']->labels;
  $labels->name = $name;
  $labels->singular_name = $name;
  $labels->add_new = _x('追加', $name);
  $labels->add_new_item = $name . 'の新規追加';
  $labels->edit_item = $name . 'の編集';
  $labels->new_item = '新規' . $name;
  $labels->view_item = $name . 'を表示';
  $labels->search_items = $name . 'を検索';
  $labels->not_found = $name . 'が見つかりませんでした';
  $labels->not_found_in_trash = 'ゴミ箱に' . $name . 'は見つかりませんでした';
}
add_action('init', 'Change_objectlabel');
add_action('admin_menu', 'Change_menulabel');



// Contact Form 7で自動挿入されるPタグ、brタグを削除
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false()
{
  return false;
}



// カスタムタクソノミーをフォームのセレクトボックスに反映
add_filter('wpcf7_form_tag', 'add_custom_taxonomy_to_cf7', 10, 2);

function add_custom_taxonomy_to_cf7($tag, $unused)
{
  // フィールドタイプが 'select*' または 'select' の場合のみ処理
  if (in_array($tag['name'], ['custom-taxonomy-select'], true)) {
    $taxonomy = 'campaign_category'; 
    // カスタムタクソノミーからタームを取得
    $terms = get_terms([
      'taxonomy' => $taxonomy,
      'hide_empty' => false,
    ]);

    if (!is_wp_error($terms) && !empty($terms)) {
      $options = [];
      foreach ($terms as $term) {
        $options[] = $term->name;
      }

      $tag['raw_values'] = $options;
      $tag['values'] = $options;
    }
  }
  return $tag;
}



// Contact Form7の送信ボタンをクリックした後の遷移先設定
add_action('wp_footer', 'add_origin_thanks_page');
function add_origin_thanks_page()
{
  $thanks = esc_url(home_url('/contact/thanks/'));
  echo <<< EOC
     <script>
       var thanksPage = {
        326: '{$thanks}',
         
       };
     document.addEventListener( 'wpcf7mailsent', function( event ) {
       location = thanksPage[event.detail.contactFormId];
     }, false );
     </script>
   EOC;
}