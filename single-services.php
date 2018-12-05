<?php get_header(); ?>

<?php if(have_posts()): ?>

          <?php while(have_posts()): the_post(); ?>

              <h2 class="title-single"><?php the_title(); ?></h2>
              <div class="content-single"><?php the_content(); ?></div>

          <?php endwhile; ?>

<?php endif; ?>

<?php

  $args = array(
      'post_type' => 'servicesimages',
      'posts_per_page' => -1
  );
  $allImages = new WP_Query($args);
  // GET meta data and create new variable with selected service type

 ?>

 <?php if( $allImages->have_posts() ): ?>

  <?php while($allImages->have_posts()): $allImages->the_post(); ?>
    <h3><?php the_title(); ?></h3>
  <?php endwhile; ?>
 <?php endif; ?>

<?php get_footer(); ?>
