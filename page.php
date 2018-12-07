
 <?php get_header(); ?>

  <?php if(have_posts()): ?>

            <?php while(have_posts()): the_post(); ?>

              <div class="top-of-page">
                <h2 class="page-title"><?php the_title(); ?></h2>
                <div class="page-content"><?php the_content(); ?></div>
              </div>

            <?php endwhile; ?>

  <?php endif; ?>

  <?php get_footer(); ?>
