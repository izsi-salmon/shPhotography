
 <?php get_header(); ?>

  <?php if(have_posts()): ?>

            <?php while(have_posts()): the_post(); ?>

               <div class="top-of-page">
                 <h2><?php the_title(); ?></h2>
                 <p><?php the_content(); ?></p>
               </div>

            <?php endwhile; ?>

  <?php endif; ?>

  <?php get_footer(); ?>
