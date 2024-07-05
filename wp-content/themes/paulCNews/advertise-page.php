
<?php 
/**
* Template Name: Advertise Page
*/
get_header(); ?>

<div id="advertise" class="d-flex flex-column flex-md-row">
    <section class="advertise-info col-md-6 p-3">
        <div class="advertise-info__title">
            <h1><?php echo esc_html(get_field('page_title')); ?></h1>      
        </div>
        <div class="advertise-info__content">
                <?php echo wp_kses_post(get_field('page_content')); ?>
        </div>
    </section>
    <section class="advertise-form col-md-6 p-3 d-flex flex-column  align-items-center  justify-content-center ">
    <h2>Enquiries Form</h2>
    <!-- advertise form -->
    <?php dynamic_sidebar( 'advertise_form' ); ?>
    </section>
</div>


<?php get_footer(); ?>

</div>
<!--wrap ends here-->