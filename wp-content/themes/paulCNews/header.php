<!doctype html>
<html <?php language_attributes();?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?> &raquo; <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>

    
</head>

<body <?php body_class(); ?>>
    <div class="wrap">
        <header>
            <!-- navbar -->
            <nav class="navbar navbar-expand-lg p-0 navbar-dark custom-nav d-flex flex-column">
                <!-- top menu -->
                <div class="m-0 navbar-top-menu w-100 d-none d-md-block  ">
                    <?php dynamic_sidebar( 'nav_bar_top_nav' ); ?>
                </div>
                <!-- advertising -->
                <div class=" p-0 border-bottom border-top border-1 border-secondary-subtle navbar-advertising">
                    <?php dynamic_sidebar( 'header_banner' ) ?>
                </div>
                <!-- main menu -->
                <div class="m-0 navbar-main-menu w-100">
                    <nav class="navbar bg-body-tertiary flex-nowrap">
                        <div class="navbar-brand d-lg-none">
                            <?php if (function_exists('the_custom_logo')) {the_custom_logo();}?>  
                        </div>

                        <button class="navbar-toggler ms-md-auto" style="background: white;" type="button"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                            aria-labelledby="offcanvasNavbarLabel">
                            <div class="offcanvas-header">
                            <?php if (function_exists('the_custom_logo')) {the_custom_logo();}?>  

                                <!-- <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5> -->
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <?php
                                  wp_nav_menu(array(
                                      'theme_location' => 'main-menu',
                                      'container' => false,
                                      'menu_class' => '',
                                      'fallback_cb' => '__return_false',
                                      'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
                                      'depth' => 2,
                                      'walker' => new bootstrap_5_wp_nav_menu_walker()
                                  ));
                                  ?>
                                <!-- search menu section for mobile menu -->
                                <form class="d-flex mt-3 d-lg-none " role="search" method="get" action="<?php echo home_url( '/' ); ?>">
                                    <input type="text" class="form-control me-2"
                                    placeholder="<?php echo esc_attr_x( 'Search for…', 'placeholder' ) ?>"
                                    value="<?php echo get_search_query() ?>" name="s"
                                    title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>">
                                    <button class="btn text-bg-light " type="submit">Search</button>
                                </form>
                           
                                <!-- social media section for mobile -->
                                <div class="nav-social-media d-none d-lg-flex flex-wrap gap-2 me-5">
                                    <a href="#telegram">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#ffffff"
                                            class="bi bi-telegram" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z" />
                                        </svg>
                                    </a>
                                    <a href="#twitter">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#ffffff"
                                            class="bi bi-twitter" viewBox="0 0 16 16">
                                            <path
                                                d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15" />
                                        </svg>
                                    </a>
                                    <a href="#youtube">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#ffffff"
                                            class="bi bi-youtube" viewBox="0 0 16 16">
                                            <path
                                                d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408z" />
                                        </svg>
                                    </a>
                                    <a href="#facebook">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#ffffff"
                                            class="bi bi-facebook" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                                        </svg>
                                    </a>
                                </div>
                                
                                <!-- search menu section for desktop version-->
                                <div class="search-menu d-none d-lg-flex">
                                        <!-- SEARCH Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            <svg style=" margin-top: -3;" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                <path
                                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                            </svg>
                                        </button>
                                        <!-- SEARCH Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                            aria-labelledby="searchModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-body">

                                                        <form class="d-flex nav-search-form" role="search" method="get"
                                                            action="<?php echo home_url( '/' ); ?>">
                                                            <div class="input-group mb-3 d-flex ">
                                                                <input type="text" class="form-control"
                                                                    placeholder="<?php echo esc_attr_x( 'Search for…', 'placeholder' ) ?>"
                                                                    value="<?php echo get_search_query() ?>" name="s"
                                                                    title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>">
                                                                <button class="btn btn-primary" type="subsmit"
                                                                    id="button-addon2">
                                                                    <svg style=" margin-top: -3;" xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" fill="currentColor" class="bi bi-search"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                                                    </svg>
                                                                </button>
                                                                <button
                                                                    style="padding-top: 20px; margin-left: 10px; fill: blue;"
                                                                    type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <!-- social media section -->
                                   <div class="nav-social-media d-flex flex-wrap justify-content-around d-lg-none">
                                    <span class="w-100 mt-4 mb-1 text-center "
                                        style="font-size: 18px; color: white; font-weight: 400;">Follow us on:</span>
                                    <a href="#telegram">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ffffff"
                                            class="bi bi-telegram" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z" />
                                        </svg>
                                    </a>
                                    <a href="#twitter">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ffffff"
                                            class="bi bi-twitter" viewBox="0 0 16 16">
                                            <path
                                                d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15" />
                                        </svg>
                                    </a>
                                    <a href="#youtube">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ffffff"
                                            class="bi bi-youtube" viewBox="0 0 16 16">
                                            <path
                                                d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408z" />
                                        </svg>
                                    </a>
                                    <a href="#facebook">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ffffff"
                                            class="bi bi-facebook" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                                        </svg>
                                    </a>
                                </div>

                                <!-- top menu bar for mobile menu -->
                                <div class="mobile__navbar-top-menu  d-md-none">
                                    <?php dynamic_sidebar( 'nav_bar_top_nav' ); ?>
                                </div>                             
                            </div>
                        </div>

                    </nav>
                </div>              
                <!-- low menu -->
                    <div class="pb-3 pt-3 bg-white navbar-low-menu w-100 d-flex">
                        <div
                            class="d-none col-lg-4 col-md-4 navbar-logo p-2 d-lg-flex justify-content-center align-items-center">
                            <!--site logo-->
                            <?php if (function_exists('the_custom_logo')) {the_custom_logo();}?>  
                        </div>
                        <div class="col-lg-8 col-md-12 text-center navbar-banner ">                         
                            <!--advertising banner-->
                            <?php dynamic_sidebar( 'top_nav_banner' ) ?>                         
                        </div>
                    </div>
            </nav>
        </header>