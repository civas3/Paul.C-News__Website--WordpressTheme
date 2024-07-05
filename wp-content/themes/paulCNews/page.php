
<?php 
get_header(); ?>

<div id="page" class="d-flex ">
    <section class="page p-3">
        <div class="page__title mb-5 mt-3">
            <h1><?php echo get_the_title(); ?></h1>
        </div>
        <div class="page__content">
            <?php the_content();?>
        </div>
    </section>
</div>


<?php get_footer(); ?>

</div>
<!--wrap ends here-->