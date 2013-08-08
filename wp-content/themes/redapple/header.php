<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>redapple</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <?php wp_head(); ?>

    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />

    <style type="text/css">
    header[role=banner]{
    background-image: url(<?php header_image(); ?>);
    background-size: cover;
        }</style>
  
</head>
<body>
<!--[if lt IE 7]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->

    <header role="banner">

        <h1><a href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>

        <?php wp_nav_menu( array(
                'theme_location' => 'utility-menu',
                'container' => 'false',
                'menu_class' => 'utilities',
            ) ); ?>
                
            <?php wp_nav_menu( array(
                'theme_location' => 'primary-menu',
                'container' => 'nav',
                'menu_class' => 'main-nav clearfix cf',
            ) ); ?>

           
    </header>

<?php 
if(function_exists('ra_days_bar'))
    ra_days_bar(); 
?>