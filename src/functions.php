<?php
add_action('init', 'create_post_type');
function create_post_type()
{
  register_post_type(
    'news',
    array(
      'labels' => array('name' => '新着情報'),
      'public' => true,
      'has_archive' => true,
      'menu_position' => 100,
      'supports' => array('title', 'editor', 'thumbnail'),
    )
  );
  register_taxonomy(
    'news_category',
    'news',
    array(
      'hierarchical' => true,
      'update_count_callback' => '_update_post_term_count',
      'label' => 'カテゴリー',
      'public' => true,
      'show_ui' => true,
    )
  );
  register_post_type(
    'case',
    array(
      'labels' => array('name' => '施工事例'),
      'public' => true,
      'has_archive' => true,
      'menu_position' => 100,
      'supports' => array('title', 'editor', 'thumbnail'),
    )
  );
  register_taxonomy(
    'case_category',
    'case',
    array(
      'hierarchical' => true,
      'update_count_callback' => '_update_post_term_count',
      'label' => 'カテゴリー',
      'public' => true,
      'show_ui' => true,
    )
  );
}
add_theme_support('post-thumbnails');
//記事のURLを数字にする
function news_post_type_link($link, $post)
{
  if ($post->post_type === 'news') {
    return home_url('/news/' . $post->ID);
  } else {
    return $link;
  }
}
add_filter('post_type_link', 'news_post_type_link', 1, 2);

function news_rewrite_rules_array($rules)
{
  $new_rewrite_rules = array(
    'news/([0-9]+)/?$' => 'index.php?post_type=news&p=$matches[1]',
  );
  return $new_rewrite_rules + $rules;
}
add_filter('rewrite_rules_array', 'news_rewrite_rules_array');

function my_theme_enqueue_scripts()
{
  wp_enqueue_script('my-theme-script', get_template_directory_uri() . '/js/my-script.js', array(), null, true);
  wp_localize_script('my-theme-script', 'themeData', array(
    'themeUrl' => get_template_directory_uri(),
  ));
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts');


/* ------------------------------
管理者以外では表示するサイドメニューを制限
------------------------------ */
add_action('admin_menu', 'remove_menus');
function remove_menus()
{
  global $menu;
  if (!current_user_can('level_10')) {
    unset($menu[5]);  // 投稿
    unset($menu[20]); // ページ
    unset($menu[25]); // コメント
    unset($menu[65]); // プラグイン
    unset($menu[70]); // プロフィール
    unset($menu[75]); // ツール
  }
}
/* ------------------------------
フッター部分のテキストを変更
------------------------------ */
add_filter('admin_footer_text', 'mse_admin_footer_text');
function mse_admin_footer_text()
{
  echo '';
}
/* ==================================================
■ ログイン画面
================================================== */
/* ------------------------------
ロゴのリンク先URLを変更
------------------------------ */
add_filter('login_headerurl', 'my_login_headerurl');
function my_login_headerurl()
{
  return '';
}
add_filter('allow_major_auto_core_updates', '__return_true');


/*
 * タイトルの区切り線を | にする
 */
function nendebcom_title_separator($sep)
{
  $sep = '|';
  return $sep;
}
add_filter('document_title_separator', 'nendebcom_title_separator');

/*
 * og:tyleを動的に記述
 */
function og_type()
{
  if (is_page()) {
    echo "website";
  } elseif (is_archive() || is_single()) {
    echo "article";
  }
}

/*
 * ?author=X を無効化
 */
function disable_author_archive_query()
{
  if (preg_match('/author=([0-9]*)/i', $_SERVER['QUERY_STRING']) && !preg_match('/post_author=/i', $_SERVER['QUERY_STRING'])) {
    wp_redirect(home_url());
    exit;
  }
}
add_action('init', 'disable_author_archive_query');
