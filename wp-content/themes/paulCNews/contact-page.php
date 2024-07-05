<?php get_header(); 
/**
* Template Name: Contact
*/
?>

<div id="contact-us" class="d-flex flex-column">
    <!-- page title -->
    <section class="contact-us__title p-3">
        <h1><?php echo get_the_title(); ?></h1>
    </section>
    <!-- Map -->
    <section class="contact-us__map p-3">
        <div class="container">
            <iframe class=" rounded-3 "
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d9931.331463942577!2d-0.0809644!3d51.5162822!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761cb296f1fb8b%3A0x105009a373c43f23!2sSUSHISAMBA%20London!5e0!3m2!1sen!2suk!4v1706027319896!5m2!1sen!2suk"
                width="100%" height="350px" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <section class="contact-main-content p-3 mt-4">
        <div class="container">
            <div class="row d-flex justify-content-between ">

                <!-- contact form -->
                <div class="col-lg-5 col-md-5 d-flex flex-column">
                <h2><?php echo esc_html(get_field('contact_form_header')); ?></h2>      
                <?php echo wp_kses_post(get_field('contact_form_description')); ?>
                <?php dynamic_sidebar( 'contact_form' ); ?>
                </div>


                <!-- operational information table -->
                <div class="col-lg-6 col-md-6  mt-5 mt-md-0 ">
                    <h2><?php echo esc_html(get_field('operational_hours_header')); ?></h2>
                    <?php echo wp_kses_post(get_field('operational_hours_description')); ?>
                    <?php 
                    
                    $table = get_field( 'opening_information' );

                    if ( ! empty ( $table ) ) {
                        echo '<table border="0" class="table border table-sm table-hover mt-5">';
                            if ( ! empty( $table['caption'] ) ) {
                                echo '<caption>' . $table['caption'] . '</caption>';
                            }
                            if ( ! empty( $table['header'] ) ) {
                                echo '<thead>';
                                    echo '<tr>';
                                        foreach ( $table['header'] as $th ) {
                                            echo '<th>';
                                                echo $th['c'];
                                            echo '</th>';
                                        }
                                    echo '</tr>';
                                echo '</thead>';
                            }
                            echo '<tbody>';
                                foreach ( $table['body'] as $tr ) {
                                    echo '<tr>';
                                        foreach ( $tr as $td ) {
                                            echo '<td>';
                                                echo $td['c'];
                                            echo '</td>';
                                        }
                                    echo '</tr>';
                                }
                            echo '</tbody>';
                        echo '</table>';
                    }
                    ?>
                </div>


            </div>
        </div>
    </section>

</div>


<?php get_footer(); ?>

</div>
<!--wrap ends here-->