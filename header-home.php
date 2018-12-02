<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
    <title><?= get_bloginfo('name'); ?></title>
  </head>
  <body>

      <h1 class="site-title"><?= get_bloginfo('name'); ?></h1>

      <div class="hamburger-container">
        <?php wp_nav_menu( array(
            'theme_location' => 'header_nav',
            'container_class' => 'menu-hamburger-menu'
          ) ); ?>

        <div class="hamburger">
          <i class="fas fa-bars"></i>
        </div>
      </div>
      
    <div class="container">
