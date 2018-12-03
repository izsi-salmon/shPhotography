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

    <div id="hamburger-container">
      <div id="hamburger-content">
        <h1 class="site-title-small"><a href="<?= site_url(); ?>"><?= get_bloginfo('name'); ?></a> </h1>
        <?php wp_nav_menu( array(
            'theme_location' => 'header_nav',
            'container_class' => 'menu-hamburger-menu'
          ) ); ?>
      </div>

      <div class="hamburger" id="burger">
        <i class="fas fa-bars"></i>
      </div>
    </div>

    <div class="hamburger secret-hamburger">
      <i class="fas fa-bars"></i>
    </div>

  <div id="dropshadow"></div>
  <div class="container">
