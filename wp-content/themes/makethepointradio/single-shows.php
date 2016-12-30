<?php
/*
 * Shows Post Type Template.
*/
?>

<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="row page">
    <div class="title dj">
        <h2><?php the_title(); ?></h2>
        <div class="clearfix"></div>
    </div><!--title-->

    <ul class="breadcrumbs">
        <li><a href="<?php get_site_url(); ?>">Home</a></li>
        <li><a href="<?php get_site_url();?>/shows/">Shows</a></li>
        <li class="current"><a href="<?php get_site_url();?>/"><?php the_title(); ?></a></li>
    </ul><!--breadcrumbs-->

    <div class="row content">
        <div class="medium-12 columns dj-bio">
            <div class="medium-3 columns">
                <?php
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail('host_profile_image');
                }else{?>
                    <img src="http://placehold.it/283x329&text=No+Photo" alt="<?php the_title(); ?>">
                <?php } ?>
            </div>
            <section class="medium-9 columns">
                <?php the_content();?>
            </section>
        </div><!--dj bio-->
    </div><!--row-->
</div><!--row-->
<?php endwhile; endif; ?>
<?php get_footer(); ?>