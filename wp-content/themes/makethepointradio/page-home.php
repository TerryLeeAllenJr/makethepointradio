<?php
/*
 Template Name: Page - Home
*/
?>

<?php get_header(); ?>

<?php include("library/includes/homeHeader.ssi.php"); ?>

<div class="row module-area">

    <div class="small-12 medium-7 columns left">

       <!-- <div class="small-12 columns ad">
            <img src="http://placehold.it/468x60&text=1"/>
        </div>
        <div class="clearfix"></div>-->


        <?php if (is_active_sidebar('home-left')) {dynamic_sidebar('home-left');} ?>

        <div class="small-12 columns ad">
            <div class="row">
                <div class="large-5 med-5 small-12 columns">
                    <?php echo do_shortcode('[kads group="medium-rectangle"]'); ?>
                </div>
                <div class="large-2 med-2 small-12 columns">

                </div>
                <div class="large-5 med-5 small-12 columns">
                    <?php echo do_shortcode('[kads group="medium-rectangle"]'); ?>
                </div>
            </div>
        </div><!--ad-->
        <div class="clearfix"></div>

    </div><!--left column-->

    <div class="small-12 medium-5 columns right">

        <?php if (is_active_sidebar('home-right')) {dynamic_sidebar('home-right');} ?>

        <div class="small-12 columns ad">
           <?php echo do_shortcode('[kads group="banner-full"]'); ?>
        </div><!--ad-->
        <div class="clearfix"></div>

    </div><!--right column-->
</div><!--row-->
<?php get_footer(); ?>