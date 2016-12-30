<?php
/*
 Template Name: Page - Blog
*/
?>

<?php get_header(); ?>


    <div class="row content">

        <div class="medium-8 columns"><!-- Latest Blog Post -->
            <?php query_posts('showposts=1'); ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="small-12 columns content entry blog">
                    <h3 class="headline"><?php the_title(); ?></h3>
                    <p>
                        <?php if (has_post_thumbnail()): ?>
                        <div class="blog-preview"><?php the_post_thumbnail('blog_preview'); ?></div>
                        <?php endif; ?>
                        <?php the_content(); ?>
                    </p>
                    <?php /* ?><a href=" <?php the_permalink(); ?>" class="red">Read More</a><?php */ ?>
                </div><!--entry-->
            <?php endwhile; ?>
        </div>

        <div class="medium-4 columns sidebar"><!-- Blog sidebar -->
            <?php include ('sidebar-blog.php'); ?>
        </div>

    </div>
</div><!--row-->
<?php get_footer(); ?>