<section>
    <?php
    $thePost = get_post($postID);
    $title = $thePost->post_title;
    $showDate = get_post_meta($postID, 'header_time', true);
    $showDates = explode(" ", $showDate);
    $bioExcerpt = apply_filters('the_excerpt', get_post_field('post_excerpt', $postID));
    $showImage = wp_get_attachment_image_src( get_post_thumbnail_id( $postID ), 'single-post-thumbnail' );
    $postURL = esc_url( get_permalink($postID));
    $Showtimes = get_post_meta($postID, 'Showtimes', true);
    $thisDateName = get_the_title();

    if ($thisDateName == "Shows") {
        if (date("N") < 6 && $thisNameChange != true) {
            $thisDateName = "Monday-Friday";
        } else {
            $thisDateName = date("l");
        }
    }

    ?>
    <a href="<?php echo $postURL; ?>">
        <div class="image" style="background: url('<?php echo $showImage[0]; ?>') center center no-repeat;"></div>

        <div class="info">
            <h3><?php echo $title; ?></h3>
            <h4><?php echo $thisDateName; ?></h4>

            <h3 class="time"><?php echo $showDates[1]; ?></h3>
        </div>
        <!--info-->

        <div class="bio">
            <p><?php echo $bioExcerpt; ?></p>
        </div>
        <!--bio-->
    </a>
</section>