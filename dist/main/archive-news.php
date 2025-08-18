<?php get_header(); ?>
<!-- ページとコンテンツを取得 -->
<?php
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$the_query = new WP_Query(array(
  'post_status' => 'publish',
  'post_type' => 'news', // ページの種類（例、page、post、カスタム投稿タイプ）
  'paged' => $paged,
  'posts_per_page' => 1, // 表示件数
  'orderby' => 'date',
  'order' => 'DESC',
)); ?>
<main>
  <ul>
    <?php
    while ($the_query->have_posts()) : $the_query->the_post(); ?>
      <li>
        <?php the_post_thumbnail() ?>
        <?php the_time('Y.m.d'); ?>
        <?php the_title(); ?>
        <?php echo wp_trim_words(get_the_content(), 45, '…'); ?>
      </li>
    <?php endwhile; ?>
  </ul>
  <div>
    <?php
    if (function_exists('wp_pagenavi')) {
      // wp_pagenavi(array('query' => $the_query));
    }
    wp_reset_postdata();
    ?>
  </div>
</main>
<?php get_footer(); ?>