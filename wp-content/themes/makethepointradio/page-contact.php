<?php
/*
 Template Name: Page - Contact Us
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
            <li class="current"><a href="<?php echo site_url(); ?>/contact-us/">Contact</a></li>
        </ul><!--breadcrumbs-->

        <div class="row">
            <div class="small-12 columns instructions">
                <h2>Please fill out the form below and click submit and we will get back with you
                    as soon as possible.</h2>
            </div>
        </div>


        <div class="row content">
            <div class="medium-7 columns contact">
            <?php the_content(); ?>
            </div>
            <?php /* ?>
            <div class="medium-7 columns contact">
                <form method="post" action="#"><!-- TODO: Hook up form! -->
                    <label for="name">Name or alias</label>
                    <input type="text" name="name" placeholder="Name or alias" required>

                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Email" required>

                    <label for="message">Message</label>
                    <textarea name="message" placeholder="Message" required></textarea>

                    <input type="submit" name="submit" value="Submit" class="button">
                </form>
            </div><!--contact-->
            <?php */ ?>
            <div class="medium-5 columns contact-info">
                <h3>You can reach us at</h3>

                <h3 class="light">Studio Line: <span class="red">803-799-8255</span></h3>
                <h3 class="light">Business Line: <span class="red">803-563-8558</span></h3>

                <h3 class="light">Email: <a href="mailto:kev@makethepointradio.com" class="red">kev@makethepointradio.com</a></h3>
            </div><!--contact info-->
        </div><!--row content-->
    </div><!--row-->
<?php endwhile;endif;?>
<?php get_footer(); ?>