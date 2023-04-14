<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php mary_theme_schema_type(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<?php wp_head(); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/css/style.css' ); ?>">
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="wrapper" class="hfeed">
<header class="main-header">
    <div class="container">
        <div class="row">
            <div class="col-md-2 search-column">
                <div class="woo-search-bar">
                    <?php aws_get_search_form( true ); ?>
                </div>
            </div>
            <div class="col-md-8 navigation-column">
                <div class="logo-container">
                    <a href="<?php echo get_site_url(); ?>">
                <?php dynamic_sidebar( 'logo-area' ); ?>
                </a>
                </div>    
                <nav id="menu" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
                <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_class' => 'nav', 'add_li_class' => 'nav-item', 'link_before' => '<span class="nav-link" itemprop="name">', 'link_after' => '</span>' ) ); ?>
                </nav>
            </div>
            <div class="col-md-2">
                <div class="cart-action-link">
                    <ul>                     
                        <li class="cart-action-item mt-1"><?php echo do_shortcode( '[yith_wcwl_items_count]' ); ?></li>
                        <li class="cart-action-item"><a href="/my-account"><i class="bi bi-person-circle"></i></a></li>
                        <?php echo do_shortcode("[woo_cart_but]"); ?>
                    </ul>
                </div>
        </div>
            </div>
            
    </div>
</header>
<header class="mobile-menu">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="logo-container">
                    <a href="<?php echo get_site_url(); ?>">
                        <?php dynamic_sidebar( 'logo-area' ); ?>
                    </a>
                </div>   
            </div>
            <div class="col-6">
                <div class="cart-action-link">
                    <ul>                     
                        <!-- <li class="cart-action-item mt-1"><?php // echo do_shortcode( '[yith_wcwl_items_count]' ); ?></li>
                        <li class="cart-action-item"><a href="/my-account"><i class="bi bi-person-circle"></i></a></li> -->
                        <?php echo do_shortcode("[woo_cart_but]"); ?>
                        <li class="cart-action-item search-icon"><i class="dashicons-search dashicons"></i></li>
                        <li class="menu-icon cart-action-item"><i class="dashicons-menu-alt3 dashicons"></i></li>
                    </ul>
                </div>                 
            </div>
            <div class="menu-bottom">
                <div class="col-12 navigation-column">                    
                    <nav id="menu" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
                        <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_class' => 'nav', 'add_li_class' => 'nav-item', 'link_before' => '<span class="nav-link" itemprop="name">', 'link_after' => '</span>' ) ); ?>
                    </nav>
                </div>
                <div class="col-12 search-column">
                    <div class="woo-search-bar">
                        <?php aws_get_search_form( true ); ?>
                    </div>
                </div>
                
            </div>            
        </div>            
    </div>
</header>
<div id="container">
<div class="page-loader">
	<div class="spinner"></div>
	<div class="sitename"><?php echo get_bloginfo( 'name' ); ?></div>
</div>
<main id="content" role="main">