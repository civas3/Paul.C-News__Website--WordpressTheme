<?php get_header(); ?>

<main id="homepage-body">

<!-- SECTION CAROUSEL -->
<section class=" default-holder d-grid d-sm-grid  p-3 gap-2 gap-sm-2 carousel-section ">

    <div class="carousel">
        <!--CAROUSEL SLIDER-->
        <div id="carouselExampleCaptions" class="carousel slide " data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner rounded-2 ">
                <?php
                    $count=0; // here we add a variable
                    $args = array(
                    'posts_per_page'=>'3',
                    'cat'=>'5'
                    );
                    $wp_query = new WP_Query( $args );

                    if ( $wp_query->have_posts()) : while ( $wp_query->have_posts()) : $wp_query->the_post();
                    $count ++; // here we implement the increment
                ?>
                <div class="carousel-item image-overlay <?php if($count==" 1") {echo 'active' ; } ?>">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'medium'); ?>" class="d-block w-100"
                        alt="...">
                    <div class="carousel-caption d-md-block">
                        <div class="carousel-caption-title ">
                            <a class="white hov__red-underile" href="<?php echo get_permalink();?>">
                                <h2 class="h5">
                                    <?php echo get_the_title(); ?>
                                </h2>
                            </a>
                        </div>
                        <div class="post-meta d-flex ">
                            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"
                                title="<?php echo esc_attr( get_the_author() ); ?>"
                                class="me-3 d-flex align-items-center white hov__red-underile">
                                <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="#c61521" class="bi bi-person-circle lrt " viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd"
                                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg>
                                <span>
                                    <?php echo get_the_author();?>
                                </span>
                            </a>
                            <a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'));  ?>"
                                class="d-flex align-items-center white hov__red-underile">
                                <svg class="me-1 " xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="#c61521" class="bi bi-clock" viewBox="0 0 16 16">
                                    <path
                                        d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                </svg>
                                <span>
                                    <?php echo get_the_date();?>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endwhile;  endif; ?>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!--carousel slider ends-->

    <!--CAROUSEL SPONSORED POSTS-->
    <div class="carousel-posts d-sm-flex flex-md-column gap-sm-1 ">
        <?php $query = new WP_Query( 'category_name=sport&posts_per_page=2' ); ?>
        <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
        <div class="card  image-overlay border-0 rounded-2 p-0 m-0 mb-2 mb-sm-2 mb-md-0 ">
            <img src=" <?php echo get_the_post_thumbnail_url(get_the_ID(),'medium'); ?>"
                class="card-img-top card-image-overlay rounded-2" alt="<?php echo get_the_title(); ?>">
            <div class="card-body ">
                <div class="card-body-title">
                    <a class="white hov__red-underile" href="<?php echo get_permalink();?>">
                        <h3 class="h5 ">
                            <?php echo get_the_title(); ?>
                        </h3>
                    </a>
                </div>
                <div class="post-meta d-flex">
                    <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"
                        title="<?php echo esc_attr( get_the_author() ); ?>"
                        class="me-3 d-flex align-items-center white hov__red-underile">
                        <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#c61521"
                            class="bi bi-person-circle lrt " viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                        <span>
                            <?php echo get_the_author();?>
                        </span>
                    </a>
                    <a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'));  ?>"
                        class="d-flex align-items-center white hov__red-underile">
                        <svg class="me-1 " xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#c61521"
                            class="bi bi-clock" viewBox="0 0 16 16">
                            <path
                                d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                        </svg>
                        <span>
                            <?php echo get_the_date();?>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <?php endwhile; 
                    wp_reset_postdata();
                else : ?>
        <p>
            <?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?>
        </p>
        <?php endif; ?>
    </div>
    <!--carousel sponsored posts end-->
</section>


<div class="d-flex flex-wrap">

    <!-- CONTENT -->
    <div class="left-side col-lg-8 col-sm-12 p-0">
        <!-- SECTION NEWS -->
        <section class="default-holder d-flex flex-column p-3 flex-lg-row section-news">
            <div class=" p-0">
                <!--section header-->
                <header class="section-header m-0 p-0 d-flex justify-content-between ">
                    <a class="white" href="<?php echo site_url();?>/category/news/">
                        <h2 class="section-header__title h6 m-0 how-bg__red ">NEWS</h2>
                    </a>
                    <div class="section-header__navigation"><a href="<?php echo site_url();?>/category/news/">View All</a>
                    </div>
                </header>
                <div class="row">
                    <!--section content-->
                    <div
                        class="post-group d-flex flex-column flex-sm-row flex-sm-wrap gap-sm-2 justify-content-sm-between align-items-start flex-lg-column ">
                        <?php $query = new WP_Query( 'category_name=news&posts_per_page=4' ); ?>
                        <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

                        <div class="post-group-item d-flex flex-column-reverse flex-md-row lign-content-center  ">
                            <div
                                class="col-lg-8 col-md-8 d-flex flex-column  justify-content-between p-1 pt-2 pb-2 mb-3 mt-1 mb-sm-3 mt-sm-3 pe-lg-3 pt-lg-3  ">
                                <div class="post-title">
                                    <a class="hov__red-underile hov__red" href="<?php echo get_permalink();?>">
                                        <h3>
                                            <?php echo get_the_title(); ?>
                                        </h3>
                                    </a>
                                </div>
                                <div class="post-excerpt ">
                                    <p>
                                        <?php echo get_the_excerpt(); ?>
                                    </p>
                                </div>
                                <div class="post-meta d-flex ">
                                    <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"
                                        title="<?php echo esc_attr( get_the_author() ); ?>"
                                        class="me-3 d-flex align-items-center hov__red-underile">
                                        <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="#c61521" class="bi bi-person-circle lrt " viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                            <path fill-rule="evenodd"
                                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                        </svg>
                                        <span>
                                            <?php echo get_the_author();?>
                                        </span>
                                    </a>
                                    <a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'));  ?>"
                                        class="d-flex align-items-center hov__red-underile">
                                        <svg class="me-1 " xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="#c61521" class="bi bi-clock" viewBox="0 0 16 16">
                                            <path
                                                d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                        </svg>
                                        <span>
                                            <?php echo get_the_date();?>
                                        </span>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 d-lg-flex align-items-lg-center ">
                                <div class="post-image ">
                                    <a href="<?php echo get_permalink(); ?>">
                                        <img class="img-fluid rounded-3 mt-3 "
                                            src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'medium'); ?>"
                                            alt="<?php echo get_the_title(); ?>">
                                    </a>
                                    <span class="post-category d-block p-0">
                                        <?php // ID's of the categories you want to be excluded.
                                            $exclude = array( 4,5 );

                                            // The categories list.
                                            $cat_list = array();

                                            foreach ( get_the_category() as $cat ) {
                                                if ( ! in_array( $cat->term_id, $exclude ) ) {
                                                    $cat_list[] = '<a href="' . esc_url( get_category_link( $cat->term_id ) ) .
                                                        '">' . $cat->name . '</a>';
                                                }
                                            }

                                            // Display a simple comma-separated list of links.
                                            echo implode( ', ', $cat_list ); ?>
                                    </span>
                                </div>


                            </div>
                        </div>

                        <?php endwhile; 
                            wp_reset_postdata();
                        else : ?>
                        <p>
                            <?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?>
                        </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECION TECH -->
        <section class="default-holder d-flex flex-column p-3 flex-lg-row section-tech">
            <div class=" p-0">
                <!--section header-->
                <header class="section-header m-0 p-0 d-flex justify-content-between">
                    <a class="white" href="<?php echo site_url();?>/category/tech/">
                        <h2 class="section-header__title h6 m-0 how-bg__red">TECH</h2>
                    </a>
                    <div class="section-header__navigation"><a href="<?php echo site_url();?>/category/tech/">View All</a>
                    </div>
                </header>
                <div class="row">
                    <!--section content-->
                    <div
                        class="post-group d-flex flex-column flex-sm-row flex-sm-wrap gap-sm-2 justify-content-sm-between align-items-start flex-lg-column ">
                        <?php $query = new WP_Query( 'category_name=tech&posts_per_page=2' ); ?>
                        <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

                        <div class="post-group-item d-flex flex-column-reverse flex-md-row lign-content-center  ">
                            <div
                                class="col-lg-8 col-md-8 d-flex flex-column  justify-content-between p-1 pt-2 pb-2 mb-3 mt-1 mb-sm-3 mt-sm-3 pe-lg-3 pt-lg-3   ">
                                <div class="post-title">
                                    <a class="hov__red-underile hov__red" href="<?php echo get_permalink();?>">
                                        <h3>
                                            <?php echo get_the_title(); ?>
                                        </h3>
                                    </a>
                                </div>
                                <div class="post-excerpt ">
                                    <p>
                                        <?php echo get_the_excerpt(); ?>
                                    </p>
                                </div>
                                <div class="post-meta d-flex ">
                                    <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"
                                        title="<?php echo esc_attr( get_the_author() ); ?>"
                                        class="me-3 d-flex align-items-center hov__red-underile">
                                        <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="#c61521" class="bi bi-person-circle lrt " viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                            <path fill-rule="evenodd"
                                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                        </svg>
                                        <span>
                                            <?php echo get_the_author();?>
                                        </span>
                                    </a>
                                    <a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'));  ?>"
                                        class="d-flex align-items-center hov__red-underile">
                                        <svg class="me-1 " xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="#c61521" class="bi bi-clock" viewBox="0 0 16 16">
                                            <path
                                                d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                        </svg>
                                        <span>
                                            <?php echo get_the_date();?>
                                        </span>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 d-lg-flex align-items-lg-center">
                                <div class="post-image">
                                    <a href="<?php echo get_permalink(); ?>">
                                        <img class="img-fluid rounded-3 mt-3 "
                                            src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'medium'); ?>"
                                            alt="<?php echo get_the_title(); ?>">
                                    </a>
                                    <span class="post-category d-block p-0">
                                        <?php
                                            // The categories list.
                                            $cat_list = array();

                                            foreach (get_the_category() as $cat) {
                                                $cat_list[] = '<a href="' . esc_url(get_category_link($cat->term_id)) . '">' . esc_html($cat->name) . '</a>';
                                            }

                                            // Display a simple comma-separated list of links.
                                            echo implode(', ', $cat_list);
                                            ?>
                                    </span>
                                </div>


                            </div>
                        </div>

                        <?php endwhile; 
                            wp_reset_postdata();
                        else : ?>
                        <p>
                            <?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?>
                        </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION SPORTS -->
        <section class="default-holder d-flex flex-column p-3 flex-lg-row section-sports">
            <div class=" p-0">
                <!--section header-->
                <header class="section-header m-0 p-0 d-flex justify-content-between">
                    <a class="white" href="<?php echo site_url();?>/category/sport/">
                        <h2 class="section-header__title h6 m-0 how-bg__red ">SPORT</h2>
                    </a>
                    <div class="section-header__navigation"><a href="<?php echo site_url();?>/category/sport/">View All</a>
                    </div>
                </header>
                <div class="row">
                    <!--section content-->
                    <div
                        class="post-group d-flex flex-column flex-sm-row flex-sm-wrap gap-sm-2 justify-content-sm-between align-items-start flex-lg-column ">
                        <?php $query = new WP_Query( 'category_name=sport&posts_per_page=2' ); ?>
                        <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

                        <div class="post-group-item d-flex flex-column-reverse flex-md-row lign-content-center  ">
                            <div
                                class="col-lg-8 col-md-8 d-flex flex-column  justify-content-between p-1 pt-2 pb-2 mb-3 mt-1 mb-sm-3 mt-sm-3 pe-lg-3 pt-lg-3  ">
                                <div class="post-title">
                                    <a class="hov__red-underile hov__red" href="<?php echo get_permalink();?>">
                                        <h3>
                                            <?php echo get_the_title(); ?>
                                        </h3>
                                    </a>
                                </div>
                                <div class="post-excerpt ">
                                    <p>
                                        <?php echo get_the_excerpt(); ?>
                                    </p>
                                </div>
                                <div class="post-meta d-flex ">
                                    <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"
                                        title="<?php echo esc_attr( get_the_author() ); ?>"
                                        class="me-3 d-flex align-items-center hov__red-underile">
                                        <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="#c61521" class="bi bi-person-circle lrt " viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                            <path fill-rule="evenodd"
                                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                        </svg>
                                        <span>
                                            <?php echo get_the_author();?>
                                        </span>
                                    </a>
                                    <a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'));  ?>"
                                        class="d-flex align-items-center hov__red-underile">
                                        <svg class="me-1 " xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="#c61521" class="bi bi-clock" viewBox="0 0 16 16">
                                            <path
                                                d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                        </svg>
                                        <span>
                                            <?php echo get_the_date();?>
                                        </span>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 d-lg-flex align-items-lg-center">
                                <div class="post-image">
                                    <a href="<?php echo get_permalink(); ?>">
                                        <img class="img-fluid rounded-3 mt-3 "
                                            src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'medium'); ?>"
                                            alt="<?php echo get_the_title(); ?>">
                                    </a>
                                    <span class="post-category d-block p-0">
                                        <?php // ID's of the categories you want to be excluded.
                                            $exclude = array( 8 );

                                            // The categories list.
                                            $cat_list = array();

                                            foreach ( get_the_category() as $cat ) {
                                                if ( ! in_array( $cat->term_id, $exclude ) ) {
                                                    $cat_list[] = '<a href="' . esc_url( get_category_link( $cat->term_id ) ) .
                                                        '">' . $cat->name . '</a>';
                                                }
                                            }

                                            // Display a simple comma-separated list of links.
                                            echo implode( ', ', $cat_list ); ?>
                                    </span>
                                </div>


                            </div>
                        </div>

                        <?php endwhile; 
                            wp_reset_postdata();
                        else : ?>
                        <p>
                            <?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?>
                        </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- SIDEBAR  -->
    <div class="right-side col-12 col-lg-4 col-sm-12 d-flex flex-column align-items-center">
        <?php dynamic_sidebar( 'sidebar' ) ?>
    </div>
</div>


<!-- SECTION INTERVIEWS -->
<section class="default-holder d-flex flex-column p-3 flex-lg-row interviews-section">
    <div class=" p-0">
        <!--section header-->
        <header class="section-header m-0 p-0 d-flex justify-content-between">
            <a class="white" href="<?php echo site_url();?>/category/interview">
                <h2 class="section-header__title h6 m-0 ">LATEST INTERVIEWS</h2>
            </a>
            <div class="section-header__navigation"><a href="<?php echo site_url();?>/category/interview">View
                    All</a>
            </div>
        </header>
        <div class="row">
            <!--section content-->
            <div class="post-group d-flex flex-column flex-sm-column flex-md-row gap-sm-2 gap-md-4 align-items-start ">
                <?php $query = new WP_Query( 'category_name=interview&posts_per_page=3' ); ?>
                <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

                <div class="post-group-item d-flex flex-sm-column-reverse justify-content-between w-100 ">
                    <div class="d-flex flex-column justify-content-between p-1 pt-2 pb-2 mb-3 mt-1 mb-sm-3 mt-sm-0  ">
                        <div class="post-title">
                            <a class="hov__red-underile hov__red" href="<?php echo get_permalink();?>">
                                <h3>
                                    <?php echo get_the_title(); ?>
                                </h3>
                            </a>
                        </div>
                        <div class="post-meta d-flex flex-column flex-sm-row">
                            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"
                                title="<?php echo esc_attr( get_the_author() ); ?>"
                                class="me-3 d-flex align-items-center hov__red-underile ">
                                <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="#c61521" class="bi bi-person-circle lrt " viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd"
                                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg>
                                <span>
                                    <?php echo get_the_author();?>
                                </span>
                            </a>
                            <a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'));  ?>"
                                class="d-flex align-items-center hov__red-underile ">
                                <svg class="me-1 " xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="#c61521" class="bi bi-clock" viewBox="0 0 16 16">
                                    <path
                                        d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                </svg>
                                <span>
                                    <?php echo get_the_date();?>
                                </span>
                            </a>
                        </div>
                    </div>

                    <div class="d-lg-flex align-items-lg-center">
                        <div class="post-image">
                            <a href="<?php echo get_permalink(); ?>">
                                <img class="img-fluid rounded-3 mt-3 "
                                    src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'medium'); ?>"
                                    alt="<?php echo get_the_title(); ?>">
                            </a>

                        </div>


                    </div>
                </div>

                <?php endwhile; 
                    wp_reset_postdata();
                else : ?>
                <p>
                    <?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?>
                </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- SECTION VIDEOS -->
<div class=" d-flex flex-column flex-sm-row p-3 gap-4 gap-sm-4 col-md-12 mt-2">
    <!-- SECTION Basketball Video -->
    <section class="default-holder d-flex flex-column flex-lg-row latest-videos-section ">
        <div class=" p-0 w-100 ">
            <!--section header-->
            <header class="section-header footer-header mb-3 p-0 d-flex justify-content-between white">
                    <h2 class="section-header__title footer-header__title h6 m-0">LATEST NBA VIDEO</h2>
            </header>
            <div class="row">
                <!--section content-->
                <div class="d-flex gap-sm-0 gap-md-4">
                    <?php dynamic_sidebar( 'nba_latest_video' ); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION UFC Video -->
    <section class="default-holder d-flex flex-column flex-lg-row latest-videos-section">
        <div class=" p-0 w-100 ">
            <!--section header-->
            <header class="section-header footer-header mb-3 p-0 d-flex justify-content-between white">
                    <h2 class="section-header__title footer-header__title h6 m-0 ">LATEST UFC VIDEO</h2>
            </header>
            <div class="row">
                <!--section content-->
                <div class="d-flex gap-sm-2 gap-md-4">
                    <?php dynamic_sidebar( 'ufc_latest_video' ); ?>
                </div>
            </div>
        </div>
    </section>
</div>


<!-- SECTION WEB -->
<section class="default-holder d-flex flex-column p-3 flex-lg-row section-web bg__red mt-4  ">
    <div class=" p-0">
        <!--section header-->
        <header class="section-header m-0 p-0 d-flex justify-content-between col-lg-6 border__white">
            <a class="red" href="<?php echo site_url();?>/category/web/">
                <h2 class="section-header__title h6 m-0" style="background: white;">WEB</h2>
            </a>
            <div class="section-header__navigation"><a class="hov-underile" style="color: #fff;"
                    href="<?php echo site_url();?>/category/web/">View
                    All</a>
            </div>
        </header>

        <div class="d-flex flex-column gap-2 flex-sm-wrap gap-sm-4 flex-lg-row ">
            <div class="row row-1-post col-lg-6">
                <!--section content-->
                <div class="post-group align-items-start gap-sm-2 gap-md-4 ">
                    <?php $query = new WP_Query( 'category_name=sport&posts_per_page=1' ); ?>
                    <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

                    <div class="post-group-item d-flex flex-column position-relative image-overlay ">
                        <a class="post-image" href="<?php echo get_permalink(); ?>">
                            <img class="img-fluid rounded-3 mt-3 "
                                src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'medium'); ?>"
                                alt="<?php echo get_the_title(); ?>">
                        </a>
                        <div class="d-flex flex-column justify-content-between position-absolute ">
                            <div class="post-title">
                                <a class="white hov__red-underile" href="<?php echo get_permalink();?>">
                                    <h3>
                                        <?php echo get_the_title(); ?>
                                    </h3>
                                </a>
                            </div>
                            <div class="post-meta d-flex ">
                                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"
                                    title="<?php echo esc_attr( get_the_author() ); ?>"
                                    class="me-3 d-flex align-items-center white hov__red-underile">
                                    <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="#c61521" class="bi bi-person-circle lrt " viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                        <path fill-rule="evenodd"
                                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                    </svg>
                                    <span>
                                        <?php echo get_the_author();?>
                                    </span>
                                </a>
                                <a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'));  ?>"
                                    class="d-flex align-items-center white hov__red-underile">
                                    <svg class="me-1 " xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="#c61521" class="bi bi-clock" viewBox="0 0 16 16">
                                        <path
                                            d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                        <path
                                            d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                    </svg>
                                    <span>
                                        <?php echo get_the_date();?>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <?php endwhile; 
                    wp_reset_postdata();
                else : ?>
                    <p>
                        <?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?>
                    </p>
                    <?php endif; ?>
                </div>
            </div>


            <div class="row row-2-post col-lg-6">
                <!--section content-->
                <div class="post-group align-items-start gap-sm-2 gap-md-4 d-flex flex-column flex-sm-row">

                    <?php $args = array(
                        'post_type'      => 'post',
                        'posts_per_page' => 2, // Set to -1 to retrieve all posts
                        'category_name'  => 'sport', // Replace 'videos' with your category slug
                        'offset'         => 1,  // Skip the first
                    ); 
                    
                    $query = new WP_Query($args);
                    
                     if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

                    <div class="post-group-item d-flex flex-column-reverse ">
                        <div
                            class="d-flex flex-column justify-content-between p-1 pt-2 pb-2 mt-1 mb-sm-3 mt-sm-3 mt-md-0  ">
                            <div class="post-title">
                                <a class="white hov-underile" href="<?php echo get_permalink();?>">
                                    <h3>
                                        <?php echo get_the_title(); ?>
                                    </h3>
                                </a>
                            </div>
                            <div class="post-meta d-flex ">
                                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"
                                    title="<?php echo esc_attr( get_the_author() ); ?>"
                                    class="me-3 d-flex align-items-center white hov-underile">
                                    <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="#fff" class="bi bi-person-circle lrt " viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                        <path fill-rule="evenodd"
                                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                    </svg>
                                    <span>
                                        <?php echo get_the_author();?>
                                    </span>
                                </a>
                                <a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'));  ?>"
                                    class="d-flex align-items-center white hov-underile">
                                    <svg class="me-1 " xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="#fff" class="bi bi-clock " viewBox="0 0 16 16">
                                        <path
                                            d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                        <path
                                            d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                    </svg>
                                    <span>
                                        <?php echo get_the_date();?>
                                    </span>
                                </a>
                            </div>
                        </div>

                        <div class="d-lg-flex align-items-lg-center">
                            <div class="post-image">
                                <a href="<?php echo get_permalink(); ?>">
                                    <img class="img-fluid rounded-3 mt-3 "
                                        src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'medium'); ?>"
                                        alt="<?php echo get_the_title(); ?>">
                                </a>

                            </div>


                        </div>
                    </div>

                    <?php endwhile; 
                    wp_reset_postdata();
                else : ?>
                    <p>
                        <?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?>
                    </p>
                    <?php endif; ?>
                </div>
            </div>


            <div class="row row-3-post">
                <!--section content-->
                <div class="post-group align-items-start gap-4 gap-sm-2 gap-md-4 d-flex flex-column flex-lg-row  ">
                    <?php $args = array(
                        'post_type'      => 'post',
                        'posts_per_page' => 3, // Set to -1 to retrieve all posts
                        'category_name'  => 'sport', // Replace 'videos' with your category slug
                        'offset'         => 3,  // Skip the first three posts
                    ); 
                    
                    $query = new WP_Query($args);
                    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

                    <div class="post-group-item d-flex flex-row-reverse justify-content-end  gap-2 align-items-center ">
                        <div class="d-flex flex-column justify-content-between p-1 pt-2 pb-2  ">
                            <div class="post-title">
                                <a class="white hov-underile" href="<?php echo get_permalink();?>">
                                    <h3>
                                        <?php echo get_the_title(); ?>
                                    </h3>
                                </a>
                            </div>
                            <div class="post-meta d-flex ">
                                <a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'));  ?>"
                                    class="d-flex align-items-center white hov-underile">
                                    <svg class="me-1 " xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="#fff" class="bi bi-clock" viewBox="0 0 16 16">
                                        <path
                                            d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                        <path
                                            d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                    </svg>
                                    <span>
                                        <?php echo get_the_date();?>
                                    </span>
                                </a>
                            </div>
                        </div>

                        <div class="d-lg-flex align-items-lg-center">
                            <div class="post-image">
                                <a href="<?php echo get_permalink(); ?>">
                                    <img class="img-fluid rounded-3"
                                        src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'medium'); ?>"
                                        alt="<?php echo get_the_title(); ?>">
                                </a>

                            </div>


                        </div>
                    </div>

                    <?php endwhile; 
                    wp_reset_postdata();
                else : ?>
                    <p>
                        <?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?>
                    </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
</section>


<!-- SECTION PARTNER VIDEOS -->
<section class="default-holder d-flex flex-column p-3 flex-lg-row interviews-section mt-5 ">
    <div class=" p-0">
        <!--section header-->
        <header class="section-header m-0 p-0 d-flex justify-content-between">
            <a class="white" href="<?php echo site_url();?>/partner-videos">
                <h2 class="section-header__title h6 m-0 ">PARTNER VIDEOS</h2>
            </a>
            <div class="section-header__navigation"><a href="<?php echo site_url();?>/partner-videos">View
                    All</a>
            </div>
        </header>
        <div class="row">
            <!--section content-->
            <div class="post-group d-flex flex-column flex-sm-column flex-md-row gap-sm-2 gap-md-4 align-items-start ">
                <?php $query = new WP_Query( 'post_type=partner-videos&posts_per_page=3' ); ?>
                <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

                <div class="post-group-item d-flex flex-sm-column-reverse justify-content-between w-100 ">
                    <div class="d-flex flex-column justify-content-between p-1 pt-2 pb-2 mb-3 mt-1 mb-sm-3 mt-sm-0  ">
                        <div class="post-title">
                            <a class="hov__red-underile hov__red" href="<?php echo get_permalink();?>">
                                <h3>
                                    <?php echo get_the_title(); ?>
                                </h3>
                            </a>
                        </div>
                        <div class="post-meta d-flex flex-column flex-sm-row">
                            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"
                                title="<?php echo esc_attr( get_the_author() ); ?>"
                                class="me-3 d-flex align-items-center hov__red-underile ">
                                <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="#c61521" class="bi bi-person-circle lrt " viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd"
                                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg>
                                <span>
                                    <?php echo get_the_author();?>
                                </span>
                            </a>
                            <a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'));  ?>"
                                class="d-flex align-items-center hov__red-underile ">
                                <svg class="me-1 " xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="#c61521" class="bi bi-clock" viewBox="0 0 16 16">
                                    <path
                                        d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                </svg>
                                <span>
                                    <?php echo get_the_date();?>
                                </span>
                            </a>
                        </div>
                    </div>

                    <div class="d-lg-flex align-items-lg-center">
                        <div class="post-image">
                            <a href="<?php echo get_permalink(); ?>">
                                <?php 
                                    // Get the video_links field value
                                    $video_url = get_field('video_link');

                                    // Check if there is a default post thumbnail
                                    $default_thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium','custom_size');

                                    // Display default post thumbnail if available, otherwise check for YouTube thumbnail
                                    if ($default_thumbnail_url) {
                                        // Display default post thumbnail
                                        echo '<img class="img-fluid rounded-3 mt-3 " src="' . esc_url($default_thumbnail_url) . '" alt="' . esc_attr(get_the_title()) . '" />';
                                    } elseif ($video_url && strpos($video_url, 'youtube.com') !== false) {
                                        // Extract YouTube video ID
                                        $video_id = get_youtube_video_id($video_url);

                                        // Check if video_id is not empty
                                        if ($video_id) {
                                            // Construct the YouTube thumbnail URL
                                            $thumbnail_url = 'http://img.youtube.com/vi/' . $video_id . '/0.jpg';

                                            // Display the YouTube thumbnail
                                            echo '<img class="img-fluid rounded-3 mt-3 " src="' . esc_url($thumbnail_url) . '" alt="' . esc_attr(get_the_title()) . '" />';
                                        
                                        } else {
                                            // Display a message if there's an issue with the YouTube URL
                                            echo 'Invalid YouTube URL';
                                        }
                                    } else {
                                        // Display a message if no thumbnail is available
                                        echo 'No Thumbnail Available';
                                    }      
                                ?> 
                            </a>
                        </div>
                    </div>
                </div>

                <?php endwhile; 
                    wp_reset_postdata();
                else : ?>
                <p>
                    <?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?>
                </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
</main>


<?php get_footer(); ?>

</div>
<!--wrap ends here-->