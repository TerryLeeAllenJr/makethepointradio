<ul>
    <li>
        Recent Posts
        <ul>
            <?php $the_query = new WP_Query('showposts=10'); ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
            <?php endwhile; ?>
        </ul>
    </li>
    <?php wp_list_categories(); ?>

</ul>