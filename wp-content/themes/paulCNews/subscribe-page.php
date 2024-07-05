<?php 
/**
* Template Name: Subscribe Page
*/
get_header(); ?>

<div id="advertise" class="d-flex flex-column flex-md-row">
    <section class="advertise-info col-md-8 p-3">
        <div class="advertise-info__title">
            <h1><?php echo esc_html(get_field('page_title')); ?></h1>      
                
        </div>
        <div class="advertise-info__content">
            <?php echo wp_kses_post(get_field('page_content')); ?>
        </div>
    </section>

    <section class="advertise-form col-md-4 p-3 d-flex justify-content-center flex-column   ">
            <h2>Subscribe Form</h2>
            <?php dynamic_sidebar( 'subscribe_form' ); ?>
    </section>
</div>


<?php get_footer(); ?>

</div>
<!--wrap ends here-->