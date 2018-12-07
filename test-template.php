<?php
/*
  Template Name: Test Page template
  Template Post Type: page
*/
 ?>

<?php get_header('home'); ?>

<h2>TEST</h2>



<?php

        $args = array(
          'post_type' => 'services',
          'order' => 'ASC',
          'orderby' => 'title'
        );

        $services = new WP_Query($args);

       ?>

  <?php if($services->have_posts()): ?>


            <div class="swiper-container">
                <div class="swiper-wrapper">


                    <?php while($services->have_posts()): $services->the_post(); ?>
                      <?php if(has_post_thumbnail() ): ?>

                        <div class="swiper-slide">
                          <a href="<?= esc_url(get_permalink()) ?>"><?php the_post_thumbnail('full', ['class'=>'service-thumbnail', 'alt'=>'thumbnail image']); ?></a>
                          <h6 class="service-title"><a href="<?= esc_url(get_permalink()) ?>"><?php the_title(); ?></a></h6>
                        </div>

                        <?php endif; ?>
                    <?php endwhile; ?>


                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
              </div>


  <?php endif; ?>

<?php get_footer(); ?>
