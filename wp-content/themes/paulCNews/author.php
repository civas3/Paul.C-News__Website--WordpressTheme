<?php get_header(); ?>

<!-- SECION TECH -->
<section class="default-holder d-flex flex-column p-3 flex-lg-row section-category">
    <div class="col-lg-8 col-sm-12 p-0">
        <!--section header-->
   
        <header>
            <div class="section-header footer-header m-0 p-0 d-flex justify-content-between white  ">
                  <h1 class="section-header__title footer-header__title h6 m-0">Articles by: <?php echo get_the_author_meta('display_name'); ?></h1>
            </div>
            
            <!-- user meta -->
            <div class="mt-3 mb-4 p-1 d-flex flex-column justify-content-between small flex-sm-row">
                <div class="col-lg-2 d-flex flex-column align-items-center pb-2 pe-sm-3">
                    <!-- user role -->
                    <?php echo implode(', ', array_map('ucfirst', get_userdata(get_the_author_meta('ID'))->roles)); ?>

                     <!-- user photo -->
                    <?php echo get_avatar(get_the_author_meta('user_email')); ?>  
                </div>

                <div class="col-lg-10 ">
                    <!-- user bio -->
                    <?php echo get_the_author_meta('description'); ?>

                    <!-- user links -->
                    <div class="d-flex flex-wrap justify-content-between gap-1 border-top mt-2 pt-1">

                        <!-- user email -->
                        <p class="m-0"> Contact: <a class="red" href="mailto:<?php echo get_the_author_meta( 'email'); ?>"><?php echo get_the_author_meta( 'email'); ?></a>   </p>     
                        
                        <!-- user linkedIn profiles -->
                        <?php
                                // Get the author's LinkedIn profile URL
                                $linkedin_profile_url = get_the_author_meta('linkedin');

                                // Check if the URL exists
                                if ($linkedin_profile_url) {
                                    ?>
                                    <p> Connect: 
                                        <a class="red" target="_blank" href="<?php echo esc_url($linkedin_profile_url); ?>"> 
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#c61521" class="bi bi-linkedin" viewBox="0 0 16 16">
                                                <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
                                            </svg>
                                        </a>
                                    </p>
                                    <?php
                                }
                         ?>
                    </div>

                </div>
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
                        <div class="post-image ">
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
                                            echo '<img class="img-fluid rounded-3 mt-3 video-image  " src="' . esc_url($thumbnail_url) . '" alt="' . esc_attr(get_the_title()) . '" />';
                                        
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