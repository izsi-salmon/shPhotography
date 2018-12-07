<?php
/*
  Template Name: Prices Page template
  Template Post Type: page
*/
 ?>

  <?php get_header(); ?>

  <?php if(have_posts()): ?>

            <?php while(have_posts()): the_post(); ?>

               <div class="top-of-page">
                 <h2 class="page-title"><?php the_title(); ?></h2>
                 <div class="page-content"><?php the_content(); ?></div>
               </div>

               <div>
                 <?php

                         $args = array(
                           'post_type' => 'prices',
                           'order' => 'ASC',
                           'orderby' => 'title'
                         );

                         $prices = new WP_Query($args);

                        ?>

                   <?php if($prices->have_posts()): ?>
                     <?php while($prices->have_posts()): $prices->the_post(); ?>
                       <?php if(has_post_thumbnail() ): ?>

                         <div class="price-section">
                           <a href="<?= esc_url(get_permalink()) ?>"><?php the_post_thumbnail('full', ['class'=>'price-thumbnail', 'alt'=>'thumbnail image']); ?></a>
                           <h5 class="price-title"><?php the_title(); ?></h5>
                           <div class="price-content">
                             <?php the_content(); ?>
                           </div>
                         </div>
                         
                           <?php endif; ?>
                       <?php endwhile; ?>

                     <?php endif; ?>
               </div>

            <?php endwhile; ?>

  <?php endif; ?>

  <?php get_footer(); ?>
