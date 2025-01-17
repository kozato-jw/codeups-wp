<?php

/* ===================================================== */
// cssとjsの読み込み
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



//jQuery Migrateを無効化
function disable_jquery_migrate($scripts)
{
  if (!is_admin() && isset($scripts->registered['jquery'])) {
    $scripts->registered['jquery']->deps = array_diff(
      $scripts->registered['jquery']->deps,
      ['jquery-migrate']
    );
  }
}
add_action('wp_default_scripts', 'disable_jquery_migrate');



/* ===================================================== */
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



/* ===================================================== */
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



/* ===================================================== */
// 通常投稿（ブログ）の本文抜粋文字数と末尾記号の変更
function custom_excerpt_length($length)
{
  return 90; // 100文字
}
add_filter('excerpt_length', 'custom_excerpt_length');

function custom_excerpt_more($more)
{
  return '…'; //記号を三点リーダーに変更
}
add_filter('excerpt_more', 'custom_excerpt_more');



/* ===================================================== */
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



/* ===================================================== */
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



/* ===================================================== */
//サイドバーのブログ人気記事の設定（閲覧数をカウントして多い投稿を表示）
function set_post_views($post_id)  // 閲覧数を保存
{
  $count_key = 'post_views_count';
  $count = get_post_meta($post_id, $count_key, true);
  if ($count == '') {
    $count = 0;
    delete_post_meta($post_id, $count_key);
    add_post_meta($post_id, $count_key, '0');
  } else {
    $count++;
    update_post_meta($post_id, $count_key, $count);
  }
}

function track_post_views($post_id)  // 閲覧数をカウント（シングルページの閲覧時に実行）
{
  if (!is_single()) return;
  if (empty($post_id)) {
    global $post;
    $post_id = $post->ID;
  }
  set_post_views($post_id);
}
add_action('wp_head', 'track_post_views');

function get_post_views($post_id)  // 閲覧数を取得する関数
{
  $count_key = 'post_views_count';
  $count = get_post_meta($post_id, $count_key, true);
  if ($count == '') {
    delete_post_meta($post_id, $count_key);
    add_post_meta($post_id, $count_key, '0');
    return "0";
  }
  return $count;
}



/* ===================================================== */
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
  $name = 'ブログ';
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



/* ===================================================== */
// Contact Form 7で自動挿入されるPタグ、brタグを削除
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false()
{
  return false;
}



/* ===================================================== */
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


/* ===================================================== */
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



/* ===================================================== */
// Contact Form 7のデフォルトメッセージを削除
add_action('wp_footer', 'custom_disable_default_cf7_messages');
function custom_disable_default_cf7_messages()
{
?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      document.addEventListener('wpcf7invalid', function() {
        var responseOutput = document.querySelector('.wpcf7-response-output.wpcf7-validation-errors');
        if (responseOutput) {
          responseOutput.style.display = 'none';
        }
      });
    });
  </script>
<?php
}



/* ===================================================== */
// Contact Form 7に独自エラーメッセージ表示
add_action('wp_footer', 'custom_error_message_script');
function custom_error_message_script()
{
?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const form = document.querySelector('.wpcf7-form');
      const errorDiv = document.getElementById('custom-error-message');

      // MutationObserverを使ってwpcf7-not-validクラスが追加されるのを監視
      if (form && errorDiv) {
        const observer = new MutationObserver(function(mutations) {
          let errorExists = false;

          mutations.forEach(function(mutation) {
            // wpcf7-not-validクラスが追加された場合にエラーメッセージを表示
            if (mutation.type === 'attributes' && mutation.target.classList.contains('wpcf7-not-valid')) {
              errorExists = true;
            }
          });

          // もしwpcf7-not-validクラスが1つでもあればエラーメッセージを表示
          if (errorExists) {
            errorDiv.style.display = 'block';
          } else {
            errorDiv.style.display = 'none'; // 全ての必須項目が埋まってエラーがなくなったら非表示
          }
        });

        // 監視対象の要素と属性を設定
        const config = {
          attributes: true,
          subtree: true
        };
        const inputs = form.querySelectorAll('input, textarea, select'); // フォーム内の各入力要素を監視

        inputs.forEach(function(input) {
          observer.observe(input, config); // 各入力要素の変更を監視
        });

        // フォームの送信時にエラーメッセージを非表示にする処理（必要に応じて）
        form.addEventListener('submit', function() {
          if (errorDiv) {
            errorDiv.style.display = 'none';
          }
        });
      }
    });
  </script>
<?php
}



/* ===================================================== */
// 管理画面 メニューの並び替え
function my_custom_menu_order($menu_order)
{
  if (!$menu_order) return true;
  return array(
    'index.php', //ダッシュボード
    'separator1', //セパレータ
    'edit.php', //通常投稿
    'edit.php?post_type=campaign', //カスタムポスト
    'edit.php?post_type=voice', //カスタムポスト
    'edit.php?post_type=page', //固定ページ
    'separator-last', //最後のセパレータ
    'themes.php', //外観
    'plugins.php', //プラグイン
    'users.php', //ユーザー
    'tools.php', //ツール
    'options-general.php', //設定
    'edit-comments.php', //コメント
    'upload.php', //メディア
  );
}
add_filter('custom_menu_order', 'my_custom_menu_order');
add_filter('menu_order', 'my_custom_menu_order');