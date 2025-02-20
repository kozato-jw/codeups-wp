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
  return 90;
}
add_filter('excerpt_length', 'custom_excerpt_length');

function custom_excerpt_more($more)
{
  return '...'; //記号を三点リーダーに変更
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
// カスタム投稿の表示件数（ボイス）と文字数制限
// ---表示件数
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

// ---文字数
function custom_excerpt($content, $length = 300)
{
  if (is_archive()) {
    return $content;
  } else {
    return mb_strimwidth(strip_tags($content), 0, $length, '...', 'UTF-8');
  }
}



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
// 料金一覧の金額のフィールドは数値の入力のみ許可（フィールド増減にも対応）
// 管理画面での入力時にinputのtypeをtextからnumberに変更する
function scf_number_field_admin_script()
{
  $screen = get_current_screen();

  if ($screen && $screen->taxonomy === 'price_category') {
?>
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        function applyNumberField() {
          document.querySelectorAll('input[name^="smart-custom-fields[course_price]"]').forEach(function(input) {
            input.setAttribute('type', 'number'); // 数字のみ入力可能にする
            input.setAttribute('oninput', "this.value = this.value.replace(/[^0-9]/g, '');"); // 数字以外を削除
          });
        }

        applyNumberField();

        // 追加されたフィールドにも適用
        const observer = new MutationObserver(function(mutationsList) {
          mutationsList.forEach(function(mutation) {
            mutation.addedNodes.forEach(function(node) {
              if (node.nodeType === 1) {
                if (node.matches('input[name^="smart-custom-fields[course_price]"]') || node.querySelector('input[name^="smart-custom-fields[course_price]"]')) {
                  applyNumberField();
                }
              }
            });
          });
        });

        // 繰り返しフィールドのコンテナを監視
        const scfContainer = document.querySelector('.smart-cf-field');
        if (scfContainer) {
          observer.observe(scfContainer, {
            childList: true,
            subtree: true
          });
        }
      });
    </script>
  <?php
  }
}
add_action('admin_footer', 'scf_number_field_admin_script');



/* ===================================================== */
// ブロックエディタ内で使用可能なブロックのみ表示（ブログ）
function my_allowed_block_types($allowed_blocks, $editor_context)
{
  return [
    'core/paragraph',      // 段落ブロック
    'core/heading',        // 見出しブロック
    'core/image',          // 画像ブロック
    'core/list',           // リストブロック
  ];
}
add_filter('allowed_block_types_all', 'my_allowed_block_types', 10, 2);



/* ===================================================== */
// カスタム投稿タイプのエディターを非表示
add_action('init', 'my_remove_post_support');
function my_remove_post_support()
{
  remove_post_type_support('campaign', 'editor');
  remove_post_type_support('voice', 'editor');
}

// 固定ページのエディターを非表示
add_filter('use_block_editor_for_post', function ($use_block_editor, $post) {
  if ($post->post_type === 'page') {
    if (in_array($post->post_name, ['faq', 'about-us', 'price', 'top', 'contact', 'thanks', 'blog', 'information', 'sitemap', '404-2'])) { 
      remove_post_type_support('page', 'editor');
      return false;
    }
  }
  return $use_block_editor;
}, 10, 2);

// エディター以外に残るパーツを非表示
add_action('admin_menu', 'my_remove_meta_boxes');
function my_remove_meta_boxes()
{
  remove_meta_box('slugdiv', 'campaign', 'normal');      // カスタム投稿スラッグ
  remove_meta_box('slugdiv', 'voice', 'normal');         // カスタム投稿スラッグ
  remove_meta_box('commentstatusdiv', 'page', 'normal'); // 固定ページディスカッション
  remove_meta_box('authordiv', 'page', 'normal');        // 固定ページ作成者
  remove_meta_box('revisionsdiv', 'page', 'normal');     // 固定ページリビジョン
  remove_meta_box('slugdiv', 'page', 'normal');          // 固定ページスラッグ
  remove_meta_box('commentsdiv', 'page', 'normal');      // 固定ページコメント
}



/* ===================================================== */
// カテゴリーページで親カテゴリーを非表示（CSSも追加する）
function add_edit_tags_page_styles()
{
  wp_enqueue_style(
    'edit_tags_page_styles', // ハンドル名
    get_template_directory_uri() . '/assets/css/style.css' // CSSファイルのパス
  );
}
add_action('admin_print_styles-edit-tags.php', 'add_edit_tags_page_styles');



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


/* ===================================================== 
  --------------- ContactForm7関連 --------------------
 ===================================================== */

/* ===================================================== */
// Contact Form 7で自動挿入されるPタグ、brタグを削除
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false()
{
  return false;
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



/* ===================================================== 
  --------------- 管理画面のカスタム --------------------
 ===================================================== */

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



/* ===================================================== */
//管理画面 通常投稿の名称変更（初期値”投稿”）
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
// 管理画面ログインページのロゴ変更
function custom_login_logo()
{
?>
  <style type="text/css">
    #login h1 a {
      display: block;
      background-repeat: no-repeat;
      background-size: contain;
      background-image: url(<?php echo get_theme_file_uri(); ?>/assets/images/common/logo-blue.png);
      width: 250px;
      height: auto;
    }
  </style>
<?php
}
add_action('login_head', 'custom_login_logo');



/* ===================================================== */
// 管理画面ログインページのロゴからの遷移先変更
function custom_login_logo_url()
{
  return get_bloginfo('url');
}
add_filter('login_headerurl', 'custom_login_logo_url');


/* ===================================================== */
// 管理画面ログインページの下部にある言語選択を非表示
function remove_login_language_switcher()
{
  echo '<style>.language-switcher { display: none !important; }</style>';
}
add_action('login_init', 'remove_login_language_switcher');



/* ===================================================== */
// 管理画面ヘッダーの不要項目削除
function remove_admin_bar_items($wp_admin_bar)
{
  $wp_admin_bar->remove_menu('wp-logo');
  $wp_admin_bar->remove_menu('new-content');
  $wp_admin_bar->remove_menu('comments');
  $wp_admin_bar->remove_menu('updates');
}
add_action('admin_bar_menu', 'remove_admin_bar_items', 999);



/* ===================================================== */
// 管理画面サイドバーの項目名称変更
function change_menu_label()
{
  global $menu, $submenu;
  $menu[10][0] = '画像・ファイル';
  $submenu['upload.php'][5][0] = '画像・ファイル一覧';
  $submenu['upload.php'][10][0] = '画像・ファイルを追加';
}
add_action('admin_menu', 'change_menu_label');



/* ===================================================== */
// 管理画面ダッシュボード内の不要ウィジェット削除
function remove_dashboard_widget()
{
  remove_meta_box('dashboard_right_now', 'dashboard', 'normal'); // 概要
  remove_meta_box('dashboard_activity', 'dashboard', 'normal'); // アクティビティ
  remove_meta_box('dashboard_quick_press', 'dashboard', 'side'); // クイックドラフト
  remove_meta_box('dashboard_primary', 'dashboard', 'side'); // WordPress イベントとニュース
  remove_action('welcome_panel', 'wp_welcome_panel'); // ウェルカムパネル
}
add_action('wp_dashboard_setup', 'remove_dashboard_widget');



/* ===================================================== */
// 管理画面ダッシュボード内に独自のウィジェット追加

// 【ブログ】ウィジェット
function add_dashboard_widgets()
{
  wp_add_dashboard_widget(
    'quick_action_dashboard_widget', // ウィジェットのスラッグ名
    'ブログの管理', // ウィジェットに表示するタイトル
    'dashboard_widget_function' // 実行する関数
  );
}
add_action('wp_dashboard_setup', 'add_dashboard_widgets');

function dashboard_widget_function()
{
?>
  <ul class="quick-action">
    <?php if (current_user_can('administrator')) : ?>
      <li>
        <a href="<?php echo admin_url() . 'post-new.php'; ?>" class="quick-action-button">
          <span class="dashicons-before dashicons-arrow-right"></span>
          ブログを新しく投稿する
        </a>
      </li>
      <li>
        <a href="<?php echo admin_url() . 'edit.php'; ?>" class="quick-action-button">
          <span class="dashicons-before  dashicons-arrow-right"></span>
          ブログの一覧を見る
        </a>
      </li>
    <?php endif; ?>
  </ul>
<?php
}

// 【キャンペーン】ウィジェット
function add_dashboard_widgets_2()
{
  wp_add_dashboard_widget(
    'quick_action_dashboard_widget_2', // ウィジェットのスラッグ名
    'キャンペーン情報の管理', // ウィジェットに表示するタイトル
    'dashboard_widget_function_2' // 実行する関数
  );
}
add_action('wp_dashboard_setup', 'add_dashboard_widgets_2');

function dashboard_widget_function_2()
{
?>
  <ul class="quick-action">
    <?php if (current_user_can('administrator')) : ?>
      <li>
        <a href="<?php echo admin_url() . 'post-new.php?post_type=campaign'; ?>" class="quick-action-button">
          <span class="dashicons-before dashicons-arrow-right"></span>
          キャンペーン情報を新しく投稿する
        </a>
      </li>
      <li>
        <a href="<?php echo admin_url() . 'edit.php?post_type=campaign'; ?>" class="quick-action-button">
          <span class="dashicons-before  dashicons-arrow-right"></span>
          キャンペーン情報の一覧を見る
        </a>
      </li>
      <li>
        <a href="<?php echo admin_url() . 'edit-tags.php?taxonomy=campaign_category&post_type=campaign'; ?>" class="quick-action-button">
          <span class="dashicons-before dashicons-arrow-right"></span>
          カテゴリーを追加する
        </a>
      </li>
    <?php endif; ?>
  </ul>
<?php
}

// 【お客様の声】ウィジェット
function add_dashboard_widgets_3()
{
  wp_add_dashboard_widget(
    'quick_action_dashboard_widget_3', // ウィジェットのスラッグ名
    'お客様の声の管理', // ウィジェットに表示するタイトル
    'dashboard_widget_function_3' // 実行する関数
  );
}
add_action('wp_dashboard_setup', 'add_dashboard_widgets_3');

function dashboard_widget_function_3()
{
?>
  <ul class="quick-action">
    <?php if (current_user_can('administrator')) : ?>
      <li>
        <a href="<?php echo admin_url() . 'post-new.php?post_type=voice'; ?>" class="quick-action-button">
          <span class="dashicons-before dashicons-arrow-right"></span>
          お客様の声を新しく投稿する
        </a>
      </li>
      <li>
        <a href="<?php echo admin_url() . 'edit.php?post_type=voice'; ?>" class="quick-action-button">
          <span class="dashicons-before  dashicons-arrow-right"></span>
          お客様の声の一覧を見る
        </a>
      </li>
      <li>
        <a href="<?php echo admin_url() . 'edit-tags.php?taxonomy=voice_category&post_type=voice'; ?>" class="quick-action-button">
          <span class="dashicons-before dashicons-arrow-right"></span>
          カテゴリーを追加する
        </a>
      </li>
    <?php endif; ?>
  </ul>
<?php
}

// 【固定ページ】ウィジェット
function add_dashboard_widgets_4()
{
  wp_add_dashboard_widget(
    'quick_action_dashboard_widget_4', // ウィジェットのスラッグ名
    '固定ページの管理', // ウィジェットに表示するタイトル
    'dashboard_widget_function_4' // 実行する関数
  );
}
add_action('wp_dashboard_setup', 'add_dashboard_widgets_4');

function dashboard_widget_function_4()
{
?>
  <ul class="quick-action">
    <?php if (current_user_can('administrator')) : ?>
      <li>
        <a href="<?php echo admin_url() . 'post.php?post=9&action=edit'; ?>" class="quick-action-button">
          <span class="dashicons-before dashicons-arrow-right"></span>
          【私たちについて】のギャラリー画像を追加・編集する
        </a>
      </li>
      <li>
        <a href="<?php echo admin_url() . 'edit-tags.php?taxonomy=price_category&post_type=page'; ?>" class="quick-action-button">
          <span class="dashicons-before  dashicons-arrow-right"></span>
          【料金一覧】の金額とカテゴリーを追加・編集する
        </a>
      </li>
      <li>
        <a href="<?php echo admin_url() . 'post.php?post=19&action=edit'; ?>" class="quick-action-button">
          <span class="dashicons-before  dashicons-arrow-right"></span>
          【よくある質問】を追加・編集する
        </a>
      </li>
      <li>
        <a href="<?php echo admin_url() . 'post.php?post=23&action=edit'; ?>" class="quick-action-button">
          <span class="dashicons-before dashicons-arrow-right"></span>
          【プライバシーポリシー】を編集する
        </a>
      </li>
      <li>
        <a href="<?php echo admin_url() . 'post.php?post=25&action=edit'; ?>" class="quick-action-button">
          <span class="dashicons-before dashicons-arrow-right"></span>
          【利用規約】を編集する
        </a>
      </li>

    <?php endif; ?>
  </ul>
<?php
}

// 【画像】ウィジェット
function add_dashboard_widgets_5()
{
  wp_add_dashboard_widget(
    'quick_action_dashboard_widget_5', // ウィジェットのスラッグ名
    '画像の管理', // ウィジェットに表示するタイトル
    'dashboard_widget_function_5' // 実行する関数
  );
}
add_action('wp_dashboard_setup', 'add_dashboard_widgets_5');

function dashboard_widget_function_5()
{
?>
  <ul class="quick-action">
    <?php if (current_user_can('administrator')) : ?>
      <li>
        <a href="<?php echo admin_url() . 'media-new.php'; ?>" class="quick-action-button">
          <span class="dashicons-before dashicons-arrow-right"></span>
          画像を新しく登録する
        </a>
      </li>
      <li>
        <a href="<?php echo admin_url() . 'upload.php'; ?>" class="quick-action-button">
          <span class="dashicons-before dashicons-arrow-right"></span>
          画像の一覧を見る
        </a>
      </li>

    <?php endif; ?>
  </ul>
<?php
}



/* ===================================================== */
// 管理画面css変更
function my_custom_admin_css()
{
  echo '<style>
    #wpadminbar,
    #adminmenu,
    #adminmenuback,
    #adminmenuwrap {
      background: #408F95;
    }
    .postbox-header{ 
      background: #ddf0f1;
    }
    </style>';
}
add_action('admin_head', 'my_custom_admin_css');

