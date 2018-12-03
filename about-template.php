<?php
/*
  Template Name: About Page template
  Template Post Type: page
*/
 ?>

 <?php get_header(); ?>

 <?php if(have_posts()): ?>

           <?php while(have_posts()): the_post(); ?>

              <div class="profile-photo-container">
                <?php the_post_thumbnail('full', ['class'=>'profile-photo', 'alt'=>'Profile photo']); ?>
              </div>

               <div class="content-about"><?php the_content(); ?></div>

           <?php endwhile; ?>

 <?php endif; ?>

 <?php get_footer(); ?>
