<?php get_header(); ?>

<?php if(have_posts()): ?>

          <?php while(have_posts()): the_post(); ?>

              <h2 class="title-single"><?php the_title(); ?></h2>
              <div class="content-single"><?php the_content(); ?></div>

          <?php endwhile; ?>

          <?php

            $args = array(
                'post_type' => 'servicesimages',
                'posts_per_page' => -1
            );
            $allImages = new WP_Query($args);
            // var_dump($allImages);

            // var_dump($image);

           ?>

           <?php if( $allImages->have_posts() ): ?>

            <?php while($allImages->have_posts()): $allImages->the_post(); ?>
              <?php $id = get_the_id(); ?>
              <h3><?php the_title(); ?></h3>
              <p><?php the_id(); ?></p>
              <?php $image =  get_post_meta( $id, 'service_type', true ); ?>
              <p><?php echo $image; ?></p>
            <?php endwhile; ?>
           <?php endif; ?>

<?php endif; ?>

<?php get_footer(); ?>
