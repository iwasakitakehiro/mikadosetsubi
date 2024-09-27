<?php get_header(); ?>
<main>
  <div>
    <div>
      <div>
        <div>
          <p><?php the_time('Y.m.d'); ?></p>
          <p><?php the_title(); ?></p>
        </div>
        <?php if (has_post_thumbnail()) : ?>
          <?php the_post_thumbnail('thumbnail'); ?>
        <?php endif; ?>
        <div>
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>