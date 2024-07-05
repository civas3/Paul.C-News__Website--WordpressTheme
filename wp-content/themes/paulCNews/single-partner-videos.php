<?php get_header(); ?>

<section class="default-holder d-flex flex-column p-3 flex-lg-row mb-5 dark-mode-page ">
    <article class="col-lg-8 col-sm-12 p-0">
        <!--article content-->
        <main class="d-flex flex-column ">
            
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <!-- progress bar -->
            <div class="article-progress-bar sticky-top progress  ">
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-text">0%</div>
                </div>     
            </div>
            <!--article header-->
            <header class="article-header d-flex flex-column  ">
                <!-- breadcrubs -->
                <?php
                    if ( function_exists('yoast_breadcrumb') ) {
                        yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                    }
                ?>
                <h1><?php echo get_the_title(); ?></h1>

                <!-- meta data -->
                <div class="d-flex mt-3 article-meta">
                    <!-- author -->
                    <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"
                        title="<?php echo esc_attr( get_the_author() ); ?>"
                        class="me-3 d-flex align-items-center hov__red-underile ">
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
                    <!-- date -->
                    <a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'));  ?>"
                        class="d-flex align-items-center hov__red-underile ">
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

                <!-- feature image -->
                <div class="img-fluid rounded-3 mt-2 featured-video-image">
                    <?php the_field('video_link');?>
    
                </div>    


                <!-- categories -->
                <div class="d-flex justify-content-end ">
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
        
            </header>
            <!-- article contente -->
            <section class="article-body d-flex flex-column-reverse flex-md-row ">
                <!-- social icon share buttons -->
                <div class="col-lg-1 z_index_up pe-md-2 pe-lg-0">
                    <div class="d-flex flex-md-column gap-2 flex-wrap  sticky-md-top">
                        <!-- SHARE -->
                        <div class="article-share-icon__sidebar article-share-icon__share mt-md-3 ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-share" viewBox="0 0 16 16">
                                <path
                                    d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.5 2.5 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5m-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3" />
                            </svg>
                        </div>
                        <!-- facebook -->
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink();?>"
                            target="_blank"
                            rel="noopener noreferrer"
                            title="Share on Facebook">
                            <div class="article-share-icon__sidebar article-share-icon__facebook ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white"
                                    class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                                </svg>
                            </div>
                        </a>
                        <!-- twitter -->
                        <a href="https://twitter.com/intent/tweet?url=<?php echo get_permalink();?>&text=Check%20out%20this%20awesome%20article%21&via=your_twitter_account"
                            target="_blank"
                            rel="noopener noreferrer"
                            title="Share on Twitter">
                                <div class="article-share-icon__sidebar article-share-icon__twitter">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white"
                                        class="bi bi-twitter" viewBox="0 0 16 16">
                                        <path
                                            d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334q.002-.211-.006-.422A6.7 6.7 0 0 0 16 3.542a6.7 6.7 0 0 1-1.889.518 3.3 3.3 0 0 0 1.447-1.817 6.5 6.5 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.32 9.32 0 0 1-6.767-3.429 3.29 3.29 0 0 0 1.018 4.382A3.3 3.3 0 0 1 .64 6.575v.045a3.29 3.29 0 0 0 2.632 3.218 3.2 3.2 0 0 1-.865.115 3 3 0 0 1-.614-.057 3.28 3.28 0 0 0 3.067 2.277A6.6 6.6 0 0 1 .78 13.58a6 6 0 0 1-.78-.045A9.34 9.34 0 0 0 5.026 15" />
                                    </svg>
                                </div>
                        </a>
                        <!--linkedIn -->
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo get_permalink();?>&title=Your%20Article%20Title&summary=Your%20Article%20Summary&source=Your%20Source"
                            target="_blank"
                            rel="noopener noreferrer"
                            title="Share on linkeIn">
                            <div class="article-share-icon__sidebar article-share-icon__linkedIn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white"
                                    class="bi bi-linkedin" viewBox="0 0 16 16">
                                    <path
                                        d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z" />
                                </svg>
                            </div>
                        </a>
                        <!-- WhatsApp -->
                        <a href="https://api.whatsapp.com/send?text=<?php echo get_permalink();?>"
                            target="_blank"
                            rel="noopener noreferrer"
                            title="Share on WhatApp">
                            <div class="article-share-icon__sidebar article-share-icon__whatsApp">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white"
                                    class="bi bi-whatsapp" viewBox="0 0 16 16">
                                    <path
                                        d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                                </svg>
                            </div>
                        </a>
                        <!-- Mail -->
                        <a href="mailto:recipient@example.com?subject=<?php echo get_permalink();?>&body=Hi%20there,%0A%0ACheck%20out%20this%20awesome%20article%20at%20https%3A%2F%2Fyour-article-url.com%2F"
                            target="_blank"
                            rel="noopener noreferrer"
                            title="Share on Email">
                            <div class="article-share-icon__sidebar article-share-icon__mail">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white"
                                    class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path
                                        d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                                </svg>
                            </div>
                        </a>    
                        <!-- Print -->
                        <a href="javascript:void(0);" onclick="printPage()" title="Print">
                            <div class="article-share-icon__sidebar article-share-icon__print">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white"
                                    class="bi bi-printer" viewBox="0 0 16 16">
                                    <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                                    <path
                                        d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1" />
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- article -->
                <div class="col-lg-11">

                    <!-- article accesability bar -->
                     <div class="article-accesabilty-nav mt-4 mb-2 mt-md-4 mb-md-5 d-flex justify-content-between p-2">
                    <!-- font size toggle -->
                     <div class="article-accesabilty-nav__toggle d-flex justify-content-center align-content-center">
                        <span class="me-2">Increase text size:</span>
                        <button id="textSizeToggle" onclick="toggleTextSize()" class="d-flex border-0 bg__blue rounded-1 ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="28" fill="#fff" class="bi bi-type" viewBox="0 0 16 16">
                            <path d="m2.244 13.081.943-2.803H6.66l.944 2.803H8.86L5.54 3.75H4.322L1 13.081zm2.7-7.923L6.34 9.314H3.51l1.4-4.156zm9.146 7.027h.035v.896h1.128V8.125c0-1.51-1.114-2.345-2.646-2.345-1.736 0-2.59.916-2.666 2.174h1.108c.068-.718.595-1.19 1.517-1.19.971 0 1.518.52 1.518 1.464v.731H12.19c-1.647.007-2.522.8-2.522 2.058 0 1.319.957 2.18 2.345 2.18 1.06 0 1.716-.43 2.078-1.011zm-1.763.035c-.752 0-1.456-.397-1.456-1.244 0-.65.424-1.115 1.408-1.115h1.805v.834c0 .896-.752 1.525-1.757 1.525"/>
                        </svg>
                        </button>
                    </div>
                    <!-- background / font color toggle -->
                    <div class="article-accesabilty-nav__toggle d-flex justify-content-center align-content-center">
                        <span class="me-2 ">Dark Mode:</span>
                        <button id="darkModeToggle" onclick="toggleDarkMode()" class="d-flex border-0 bg__blue rounded-1 ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="28" fill="#fff" class="bi bi-heptagon-half" viewBox="0 0 16 16">
                            <path d="M7.779.052a.5.5 0 0 1 .442 0l6.015 2.97a.5.5 0 0 1 .267.34l1.485 6.676a.5.5 0 0 1-.093.415l-4.162 5.354a.5.5 0 0 1-.395.193H4.662a.5.5 0 0 1-.395-.193L.105 10.453a.5.5 0 0 1-.093-.415l1.485-6.676a.5.5 0 0 1 .267-.34zM8 15h3.093l3.868-4.975-1.383-6.212L8 1.058z"/>
                        </svg>
                        </button>
                    </div>

                    </div>
                    <!-- advertising -->
                    <div class="mt-4 mb-2 mt-md-4 mb-md-5">
                        <?php dynamic_sidebar( 'post_body_banner' ) ?>
                    </div>

                    <!-- article content-->
                    <div id="article-body__content">
                    <?php the_content();?>

                    <div class="article-body__content--tags">
                        <?php the_tags( 'Tags: ', ', ', '<br>' ); ?>
                    </div>
                    </div>

                    <!-- social icon share buttons -->
                    <div class=" d-none d-md-flex mt-5 justify-content-end gap-2">
                        <!-- SHARE -->
                        <div class="article-share-icon__bottom article-share-icon__share z_index_up">
                            <span style="color: #000; font-weight: bold;">Share by:</span>
                        </div>
                        <!-- facebook -->
                        <a class="z_index_up" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink();?>"
                            target="_blank"
                            rel="noopener noreferrer"
                            title="Share on Facebook">
                                <div class="article-share-icon__bottom article-share-icon__facebook ">
                                    <span>Facebook</span>
                                </div>
                        </a>

                        <!-- twitter -->
                        <a class="z_index_up" href="https://twitter.com/intent/tweet?url=<?php echo get_permalink();?>&text=Check%20out%20this%20awesome%20article%21&via=your_twitter_account"
                            target="_blank"
                            rel="noopener noreferrer"
                            title="Share on Twitter">
                                <div class="article-share-icon__bottom article-share-icon__twitter">
                                    <span>Twitter</span>
                                </div>
                        </a>

                        <!--linkedIn -->
                        <a class="z_index_up" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo get_permalink();?>&title=Your%20Article%20Title&summary=Your%20Article%20Summary&source=Your%20Source"
                            target="_blank"
                            rel="noopener noreferrer"
                            title="Share on linkeIn">
                                <div class="article-share-icon__bottom article-share-icon__linkedIn">
                                    <span>LinkeIn</span>
                                </div>
                        </a>

                        <!-- WhatsApp -->
                        <a class="z_index_up" href="https://api.whatsapp.com/send?text=<?php echo get_permalink();?>"
                        target="_blank"
                        rel="noopener noreferrer"
                        title="Share on WhatApp">
                            <div class="article-share-icon__bottom article-share-icon__whatsApp">
                                <span>WhatsApp</span>
                            </div>
                        </a>

                         <!-- Mail -->
                         <a class="z_index_up" href="mailto:recipient@example.com?subject=<?php echo get_permalink();?>&body=Hi%20there,%0A%0ACheck%20out%20this%20awesome%20article%20at%20https%3A%2F%2Fyour-article-url.com%2F"
                            target="_blank"
                            rel="noopener noreferrer"
                            title="Share on Email">
                                <div class="article-share-icon__bottom article-share-icon__mail">
                                    <span>Email</span>
                                </div>
                         </a>
                         
                         <!-- Print -->
                        <a class="z_index_up" href="javascript:void(0);" onclick="printPage()" title="Print">
                            <div class="article-share-icon__bottom article-share-icon__print">
                                <span>Print</span>
                            </div>
                        </a>
               
                    </div>

                </div>
            </section>

            <?php endwhile; 
                    wp_reset_postdata();
                else : ?>
            <p>
                <?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?>
            </p>
            <?php endif; ?>



        </main>

    </article>
       <!-- sidebar -->
       <div class=" col-lg-4 col-sm-12 d-flex flex-column align-items-center pt-5 flex-md-row justify-content-md-around flex-lg-column justify-content-lg-start pt-lg-0">
        <?php dynamic_sidebar( 'post_skyscraper_banner' ) ?>
        <section class="most-popular-posts sticky-lg-top">
            <!--section header-->
            <header class="section-header footer-header m-0 p-0 d-flex justify-content-between white pt-4">
                <h2 class="section-header__title footer-header__title h6 m-0 ">MOST POPULAR</h2>
            </header>

            <div class="row pt-3">
                <!--section content-->
                <div class="">
                    <?php $args = array(
                        'post_type'      => 'post',
                        'posts_per_page' => 2, // Set to -1 to retrieve all posts
                        'category_name'  => 'sport', // Replace 'videos' with your category slug
                        'offset'         => 1,  // Skip the first three posts
                    ); 
                    
                    $query = new WP_Query($args);
                    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

                    <div class="d-flex flex-column-reverse flex-wrap mb-3  ">

                        <div class="d-flex p-1 pb-2  ">
                            <div class="post-title">
                                <a class="hov__red-underile" href="<?php echo get_permalink();?>">
                                    <h3>
                                        <?php echo get_the_title(); ?>
                                    </h3>
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

        </section>
    </div>


</section>
<!-- SECTION RELATED ARTICLES -->
<section class="default-holder d-flex flex-column p-3 flex-lg-row related-articles-section mt-5 ">
    <div class=" p-0">
        <!--section header-->
        <header class="section-header footer-header m-0 p-0 d-flex justify-content-between white  ">
            <h2 class="section-header__title footer-header__title h6 m-0 ">RELATED ARTICLES</h2>
        </header>
        <div class="row">
            <!--section content-->
            <div class="post-group d-flex flex-column flex-sm-column flex-md-row gap-sm-2 gap-md-4 align-items-start ">
                <?php $query = new WP_Query( 'category_name=interview&posts_per_page=3' ); ?>
                <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

                <div class="post-group-item d-flex flex-column-reverse">
                    <div class="d-flex flex-column justify-content-between p-1 pt-2 pb-2 mb-3 mt-1 mb-sm-3 mt-sm-0  ">
                        <div class="post-title">
                            <a class="hov__red-underile hov__red" href="<?php echo get_permalink();?>">
                                <h3>
                                    <?php echo get_the_title(); ?>
                                </h3>
                            </a>
                        </div>
                        <!-- post meta info -->
                        <div class="post-meta d-flex flex-row">
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


<?php get_footer(); ?>

</div>
<!--wrap ends here-->