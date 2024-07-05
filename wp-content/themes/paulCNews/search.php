<?php get_header(); ?>

<!-- SECION TECH -->
<section class="default-holder d-flex flex-column p-3 flex-lg-row section-category">
    <div class="col-lg-8 col-sm-12 p-0">
        <!--section header-->
   
        <header>
            <div class="section-header footer-header m-0 p-0 d-flex justify-content-between white  ">
                  <h1 class="section-header__title footer-header__title h6 m-0">Search Results for: <?php echo get_search_query( ); ?></h1>
            </div>
        </header>
           
        <div class="row">
            <!--section content-->
            <div
                class="post-group d-flex flex-column flex-sm-row flex-sm-wrap gap-sm-2 justify-content-sm-between align-items-start flex-lg-column ">
               
                <?php if ( have_posts() ) : while ( have_posts() )  : the_post(); ?>

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
                                            echo '<img class="img-fluid rounded-3 mt-3 video-image " src="' . esc_url($thumbnail_url) . '" alt="' . esc_attr(get_the_title()) . '" />';
                                        
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

            <!-- PAGINATION -->
            <div class="pagination">
                    <?php
                    // Display pagination
                    the_posts_pagination(array(
                        'mid_size' => 2,
                        'prev_text' => __('« Previous', 'textdomain'),
                        'next_text' => __('Next »', 'textdomain'),
                    ));
                    ?>
            </div>
        </div>
    </div>
       <!-- SIDEBAR  -->
       <div class="right-side col-12 col-lg-4 col-sm-12 d-flex flex-column align-items-center">
            <?php dynamic_sidebar( 'sidebar' ) ?>
        </div>
</section>


<?php get_footer(); ?>

</div>
<!--wrap ends here-->