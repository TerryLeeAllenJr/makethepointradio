<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

        <style>
            #myElement {
                margin: 0 auto;
                width: 640px;
                height: 360px;
                /*width: 100% !important;*/
                /*padding-bottom: 56.25% !important;*/
                /*height : auto !important;*/
            }
        </style>

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
        <script src="<?php echo get_template_directory_uri(); ?>/library/js/vendor/jwplayer.js"></script>
        <script>jwplayer.key="Ug0f9qG6S0AULqLY85X4uKLtiafgwj8/c5gojA==";</script>
        <script src="<?php echo get_template_directory_uri(); ?>/library/js/vendor/video.js"></script>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

	</head>

	<body <?php body_class(); ?>>

    <div class="wrapper">
        <header>
            <div class="ad">
                <!-- TODO: INSERT ADS -->
                <?php echo do_shortcode('[kads group="header-full-width"]'); ?>
            </div><!--ad-->

            <div class="row logo-tagline">
                <div class="small-12 medium-9 small-centered columns">
                    <a href="<?php echo home_url(); ?>" rel="nofollow" class="small-12 medium-6 columns logo"><img src="http://makethepointradio.com/wp-content/uploads/2014/07/logo.png" alt="The Point | 95.9 FM | 1470 AM"></a>

                    <div class="small-12 medium-6 columns tagline">
                        <h3>Columbia's LOCAL</h3>
                        <h3>Talk Radio Experience</h3>

                        <div class="phone">
                            <h3><span class="studio-line gray light">Studio Line:</span> 803-799-Talk</h3>
                            <h3 class="numbers gray">(8255)</h3>

                        </div><!--phone-->
                    </div><!--tagline-->
                </div><!--columns-->
            </div><!--row logo tagline-->

            <div class="row">


                <nav role="navigation">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'main-nav',
                        'menu_class' => 'small-12 small-centered columns'
                    ) );
                    ?>
                </nav>
            </div><!--row-->
