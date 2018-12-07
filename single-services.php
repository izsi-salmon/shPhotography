<?php get_header(); ?>

<?php if(have_posts()): ?>

          <?php while(have_posts()): the_post(); ?>

            <?php $servicePage = get_the_title(); ?>

              <div class="content-single">
                <h2 class="title-single"><?php the_title(); ?></h2>
                <div class="text-single"><?php the_content(); ?></div>
              </div>

          <?php endwhile; ?>

          <?php

            $args = array(
                'post_type' => 'servicesimages',
                'posts_per_page' => -1
            );
            $serviceImgPosts = new WP_Query($args);

           ?>

           <?php if( $serviceImgPosts->have_posts() ): ?>

             <div class="service-gallery">
               <?php while($serviceImgPosts->have_posts()): $serviceImgPosts->the_post(); ?>

                 <?php $id = get_the_id(); ?>
                 <?php $alt = get_the_title(); ?>
                 <?php $serviceType =  get_post_meta( $id, 'service_type', true ); ?>

                 <?php if($serviceType === $servicePage): ?>
                   <?php
                   $imageID =  get_post_meta( $id, 'service_image', true );

                   if($imageID){
                      $image = wp_get_attachment_image_url($imageID, 'large', false);
                    }

                    ?>

                     <img src="<?= $image ?>" alt="<?= $alt ?>" class="service-image">

                 <?php endif; ?>


               <?php endwhile; ?>
             </div>

           <?php endif; ?>

<?php endif; ?>

<?php get_footer(); ?>
