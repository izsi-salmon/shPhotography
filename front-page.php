<?php get_header('home'); ?>

<?php

        $args = array(
          'post_type' => 'services',
          'order' => 'ASC',
          'orderby' => 'title'
        );

        $services = new WP_Query($args);

       ?>

  <?php if($services->have_posts()): ?>
        <?php while($services->have_posts()): $services->the_post(); ?>
          <?php if(has_post_thumbnail() ): ?>

                <a href="<?= esc_url(get_permalink()) ?>"><?php the_post_thumbnail('full', ['class'=>'service-thumbnail', 'alt'=>'thumbnail image']); ?></a>
                <h6 class="service-title"><a href="<?= esc_url(get_permalink()) ?>"><?php the_title(); ?></a></h6>
              
            <?php endif; ?>
        <?php endwhile; ?>
  <?php endif; ?>

<?php get_footer(); ?>
