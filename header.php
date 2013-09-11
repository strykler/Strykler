<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <title><?php bloginfo('name'); ?> | <?php if(is_home() || is_front_page()){ bloginfo("description"); } wp_title("",true,""); ?></title>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/bootstrap.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri();?>/assets/css/style.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="<?php echo get_template_directory_uri();?>/assets/scripts/script.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <?php wp_head(); ?>
</head>
<body>
<div id="header">
    <div class="site-title">
        <a href="<?php echo site_url(); ?>" class="logo"><img src="<?php echo get_template_directory_uri();?>/assets/img/nordic.png" alt="Nordic"></a>
    </div>
    <p class="site-description">A theme for artists!</p>
    <div class="main-menu-holder">
        <?php wp_nav_menu(array("theme_location" => "main_menu","menu_id"=>"main_menu","menu_class"=>"main_menu")); ?>
    </div>
</div>
<div id="inner-content">