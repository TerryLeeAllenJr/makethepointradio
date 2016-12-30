<?php
/*
 Template Name: Page - Advertise With Us
*/
?>

<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="row page">
        <div class="title">
            <h2><?php the_title(); ?></h2>
        </div><!--title-->

        <ul class="breadcrumbs">
            <li><a href="<?php echo site_url(); ?>">Home</a></li>
            <li class="current"><a href=" <?php echo site_url(); ?>/advertise-with-us ">Advertise with Us</a></li>
        </ul><!--breadcrumbs-->

        <div class="row content">
            <div class="medium-9 columns advertise">
                <section>
                    <h3>Our Advertising Options</h3>

                    <section>
                        <?php the_content();?>
                    </section>
                </section>
            </div><!--shows-->

            <aside class="medium-3 columns sidebar">
                <h3>Point of Contact</h3>

                <section>
                    <h6><?php echo get_post_meta($post->ID, 'contact_name', true);?></h6>
                    <p>Phone: <?php echo get_post_meta($post->ID, 'contact_phone', true);?></p>
                    <p>Email: <a href="mailto:<?php echo get_post_meta($post->ID, 'contact_email', true);?>"><?php echo get_post_meta($post->ID, 'contact_email', true);?></a></p>
                </section>
            </aside><!--sidebar-->
        </div><!--row-->
    </div><!--row-->

<?php endwhile;endif;?>
<?php get_footer(); ?>