<?php get_header(); ?>
<main>
    <h1 class="text-red-500">front page</h1>
    <!-- news -->
    <!-- <ul>
        <?php
        $posts = get_posts("post_type=news&posts_per_page=4");
        if ($posts) : ?>
            <?php
            foreach ($posts as $post) {
                setup_postdata($post);
                $terms = get_the_terms($post->ID, 'news_category');
            ?>
                <li>
                    <a href="<?php the_permalink(); ?>">
                        <div>
                            <?php if (the_post_thumbnail()) : ?>
                                <img src="<?php the_post_thumbnail(); ?>" alt="">
                            <?php else : ?>
                                <amp-img src="<?php echo get_template_directory_uri(); ?>/img/global/no-image.png" width="100" height="100" layout="responsive"></amp-img>
                            <?php endif; ?>
                        </div>
                        <div>
                            <div>
                                <span><?php the_time('Y.m.d'); ?></span>
                                <span><?php the_title(); ?></span>
                            </div>
                            <span><?php echo wp_trim_words(get_the_content(), 15, '…'); ?></span>
                        </div>
                    </a>
                </li>
            <?php
            }
            wp_reset_postdata();
            ?>
        <?php else : ?>
            <li>
                <p>お知らせはまだありません</p>
            </li>
        <?php endif; ?>
    </ul> -->
</main>
<?php get_footer(); ?>