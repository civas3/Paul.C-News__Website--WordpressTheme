<?php wp_footer(); ?>
<footer class="bg-body-secondary bg-body-tertiary mt-5 pt-5">
    <!-- SECTION DONWLOADABLE CONTENT + USEFULL LINKS-->
    <div class=" d-flex flex-column flex-md-row p-3 gap-4 gap-sm-4 latest-videos mt-2">
        <!-- SECTION DOWNLOADABLES -->
        <section class="downloadables default-holder d-flex col-md-8">
            <div class=" p-0">
                <!--section header-->
                <header class="section-header footer-header m-0 p-0 d-flex justify-content-between white  ">
                    <h2 class="section-header__title footer-header__title h6 m-0 ">DOWNLOADABLES</h2>
                </header>
                <div class="row">
                    <!--section content-->
                    <div class="post-group d-flex justify-content-between justify-content-md-start  gap-sm-0 gap-md-4 align-items-start ">

                        <?php $query = new WP_Query( 'post_type=downloadables&posts_per_page=3' ); ?>
                        <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

                        <div
                            class="footer-post-group-item__downladables post-group-item d-flex flex-column-reverse w-25  ">
                            <div class="d-lg-flex flex-column align-items-lg-center">

                                <div class="footer-post-image__downladables post-image">                             
                                    <a href="<?php echo esc_url(get_field('downloadable_url')); ?>" target="_blank">
                                        <img class="img-fluid rounded-3 mt-3 "
                                            src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'medium'); ?>"
                                            alt="<?php echo get_the_title(); ?>">
                                    </a>

                                    

                                </div>
                                <div class="footer-post-title__downladables post-title text-center ">
                                    <a class="hov__red-underile hov__red" href="<?php echo esc_url(get_field('downloadable_file')); ?>" download="<?php echo esc_url(get_field('downloadable_file')); ?>">
                                        <h3>
                                            <?php echo get_the_title(); ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                                            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
                                            </svg>
                                        </h3>
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

        <!-- SECTION USEFULL LINKS -->
        <section class="default-holder d-flex flex-column flex-lg-row w-100 mt-3 mt-md-0 ">
            <div class=" p-0 w-100 ">
                <!--section header-->
                <header class="section-header footer-header m-0 p-0 d-flex justify-content-between white">
                    <h2 class="section-header__title footer-header__title h6 m-0 ">USEFULL LINKS</h2>
                </header>
                <div class="row">
                    <!--section content-->
                    <div class="footer-usefull-links mt-3">
                            <?php dynamic_sidebar( 'footer_isefull_links' ); ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- SECTION PARTNER LOGOS -->
    <section class="default-holder d-flex flex-column p-3 flex-lg-row mt-3 pb-5 mt-sm-5">
        <div class=" p-0 w-100 pb-5 ">
            <!--section header-->
            <header class="section-header footer-header m-0 p-0 d-flex justify-content-between white ">
                <h2 class="section-header__title footer-header__title h6 m-0">PARTNERS</h2>
            </header>
            <div class="row ">
                    <div class="partner-logos  mt-3 d-flex flex-wrap justify-content-between justify-content-sm-start gap-5 ">
                            <?php dynamic_sidebar( 'footer_partners_logo' ); ?>
                    </div>
            </div>
        </div>
    </section>
    <!-- SECTION RIGHTS -->
    <section class="default-holder d-flex p-3 flex-lg-row footer-section-rights bg__red justify-content-end align-items-end white">
        <div class=" p-0 w-100 ">
            <div class="row ">
                    <div class=" d-flex justify-content-center justify-content-md-end  ">
                    © <?php echo date('Y'); ?> Paul C News. All right reserved.
                    </div>
               
            </div>
        </div>
    </section>
</footer>



</body>

</html>