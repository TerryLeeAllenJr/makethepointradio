<?php
/*
 Template Name: Page - Blank
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
            <li class="current"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        </ul><!--breadcrumbs-->


        <div class="row content">
        <?php if (has_post_thumbnail()): ?>
            <div class="medium-8 columns">
                <?php the_content(); ?>
            </div>
            <div class="medium-4 columns">
                <?php the_post_thumbnail('host_profile_image'); ?>
            </div>
        <?php else: ?>
            <div class="medium-12 columns">
                <?php the_content(); ?>
            </div>
        <?php endif;?>
        </div><!--row content-->
    </div><!--row-->
<?php endwhile;endif;?>
<?php get_footer(); ?>