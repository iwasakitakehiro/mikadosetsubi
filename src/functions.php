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
      'supports' => array('title', 'editor')
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
}
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
