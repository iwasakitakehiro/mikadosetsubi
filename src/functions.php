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
