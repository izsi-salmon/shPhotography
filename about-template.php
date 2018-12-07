<?php
/*
  Template Name: About Page template
  Template Post Type: page
*/
 ?>

 <?php get_header(); ?>

 <?php if(have_posts()): ?>

           <?php while(have_posts()): the_post(); ?>

             <?php


              $postID = get_the_id();
              $link = get_post_meta($postID, 'social_link', true);


              ?>

              <div class="profile-photo-container">
                <?php the_post_thumbnail('full', ['class'=>'profile-photo', 'alt'=>'Profile photo']); ?>
              </div>

               <div class="content-about"><?php the_content(); ?></div>

               <?php if($link): ?>
                 <div class="social-media">
                   <a href="<?= $link ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                 </div>
              <?php endif; ?>

           <?php endwhile; ?>

 <?php endif; ?>



 <?php get_footer(); ?>
