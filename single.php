<?php get_header(); ?>

<?php if(have_posts()): ?>

          <?php while(have_posts()): the_post(); ?>

              <h2 class="title-single"><?php the_title(); ?></h2>
              <div class="content-single"><?php the_content(); ?></div>

          <?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>
