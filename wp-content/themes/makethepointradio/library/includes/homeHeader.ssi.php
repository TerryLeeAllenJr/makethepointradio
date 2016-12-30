<div class="row">
<!-- TODO: Write now playing as a plugin. -->
    <?php
    $table = $table_prefix."postmeta";
    $post_table = $table_prefix."posts";
    $day = date('D',time());
    $time = current_time('timestamp');
    $currentShow = null;

    // Get today's shows.
    $query = "SELECT post_id FROM {$table} WHERE meta_value = '{$day}' GROUP BY post_id";
    global $wpdb;
    $shows = $wpdb->get_results( $query, ARRAY_A );
  
    // Get the number of showtimes to build meta_keys.
    foreach ($shows AS $key => $show){

        $query = "SELECT meta_value FROM {$table} WHERE post_id = {$show['post_id']} AND meta_key = 'showtimes'";
        $shows[$key]['count']=$wpdb->get_var($query);

        $query = "SELECT meta_value FROM {$table} WHERE post_id = {$show['post_id']} AND meta_key = 'header_time'";
        $shows[$key]['header_time']=$wpdb->get_var($query);
    }
    // Loop through each show and showtime, build meta keys and check if time() falls between each showtime.
    foreach ($shows AS $show){

        // Get show info and check if it is published.
        $query = "SELECT * FROM {$post_table} WHERE id = {$show['post_id']}";
        $data = $wpdb->get_results($query,ARRAY_A);
        
        // Make sure that data returned, and make sure post is published.
        if(!isset($data[0]['post_status']) || $data[0]['post_status']!='publish'){continue;}

        // Loop through each showtime.
        for ($i=0; $i<$show['count']; $i++){

            $startKey = 'showtimes_'.$i."_start_time";
            $endKey = 'showtimes_'.$i."_end_time";

            $query = "SELECT meta_value FROM {$table} WHERE post_id = {$show['post_id']} AND meta_key = '{$startKey}'";
            $startTime = strtotime(date('H:i:s',$wpdb->get_var($query)),$time);

            $query = "SELECT meta_value FROM {$table} WHERE post_id = {$show['post_id']} AND meta_key = '{$endKey}'";
            $endTime = strtotime(date('H:i:s',$wpdb->get_var($query)),$time);

            if($startTime < time() && time() < $endTime){
                $currentShow = $data[0];
                $currentShow['header_time'] = $show['header_time'];
                break;
            }
        }
        if(isset($currentShow)){break;}
    }
    ?>

    <div class="feature">

        <div class="row">
            <div class="small-10 large-6 small-centered columns now-playing">
                <div class="medium-4 columns dj-img">
                    <?php
                        echo (isset($currentShow)) ?
                            get_the_post_thumbnail($currentShow['ID'], 'now_playing' ) :
                            "<img src='".get_template_directory_uri()."/library/images/logo.png'>";

                    ?>
                </div>
                <div class="medium-8 columns dj-info">
                    <h2 class="extralight"><?= isset($currentShow)?'Now Playing':'Show Information'; ?><!-- Now Playing --></h2>
                    <h1 class="gray black"><?= isset($currentShow)?$currentShow['post_title']:'Coming Soon'; ?></h1>
                    <h3 class="airtime"><?= isset($currentShow)?$currentShow['header_time']:''; ?></h3>


                    <div class="show-links">
                        <a href="javascript:;" onClick="javascript:window.open('http://v5.player.abacast.com/v5.1/player/index.php?uid=6825','ppv5','height=530,width=800,menubar=no,scrollbars=no,toolbar=no,status=no,resizable=no')" class="medium-5 small-centered medium-uncentered columns listen-now"><span>Listen Now</span></a>

                        <?php if(isset($currentShow)){ ?>
                            <a href="<?= site_url('/shows/').$currentShow['post_name']; ?>" class="medium-4 columns button box">Bio</a>
                        <?php } ?>

                    </div><!--show links-->

                </div><!--dj info-->

                <div class="clearfix"></div>
            </div><!--now playing-->
        </div><!--row-->

        <div class="row">
            <?php // TODO: Hook up form. ?>

            <form class="small-10 medium-10 large-6 small-centered columns subscribe" id="subscribe">
                <?php echo do_shortcode( '[contact-form-7 id="564" title="Subscribe - Home Page"]' ); ?>
            </form>

        </div><!--row-->

        <?php /* ?>
        <div id="myElement" data-link="<?php echo get_template_directory_uri(); ?>">Loading the player...</div>
        <?php */ ?>
    </div><!--feature-->
</div>
