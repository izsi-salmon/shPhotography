<?php
/*
  Template Name: Contact Page template
  Template Post Type: page
*/
 ?>

 <?php get_header(); ?>

 <?php if(have_posts()): ?>

           <?php while(have_posts()): the_post(); ?>

              <div class="top-of-page">
                <h2><?php the_title(); ?></h2>
                <p><?php the_content(); ?></p>
              </div>

              <div class="form">
                <form class="" action="" method="post">

                  <input type="text" name="name" class="text-input">

                  <input type="text" name="email" class="text-input">

                  <input type="text" name="enquiry" class="text-input">

                  <textarea name="message" class="text-input text-area-input"></textarea>

                  <button type="submit" name="button" class="button-input">send</button>

                </form>
              </div>

           <?php endwhile; ?>

 <?php endif; ?>

 <?php get_footer(); ?>
