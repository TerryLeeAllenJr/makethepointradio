<footer>
    <nav class="medium-7 small-centered columns">
        <ul class="medium-3 medium-offset-2 columns">
            <li><a href="<?php get_site_url(); ?>/">Home</a></li>
            <!--            <li><a href="--><?php //echo URL;?><!--podcasts" class="disabled">Podcasts</a></li>-->
            <li><a href="<?php get_site_url(); ?>/shows/">Shows</a></li>
            <!--            <li><a href="--><?php //echo URL;?><!--calendar" class="disabled">Calendar</a></li> -->
        </ul>

        <ul class="medium-3 columns center">
            <!--            <li><a href="--><?php //echo URL;?><!--ask-the-politician" class="disabled">Ask the Politician</a></li>-->
            <li><a href="<?php get_site_url(); ?>/blog/">Blog</a></li>
            <li><a href="<?php get_site_url(); ?>/contact/">Contact</a></li>
            <li><a href="<?php get_site_url(); ?>/advertise-with-us/">Advertise with Us</a></li>
        </ul>

        <ul class="medium-3 columns">
            <li><a href="<?php get_site_url(); ?>/news/">News</a></li>
            <li><a href="<?php get_site_url(); ?>/featured/">Featured</a></li>
        </ul>

        <div class="clearfix"></div>
    </nav>

    <div class="social">
        <a href="javascript:;" onclick="javascript:window.open('http://v5.player.abacast.com/v5.1/player/index.php?uid=6825','ppv5','height=530,width=800,menubar=no,scrollbars=no,toolbar=no,status=no,resizable=no')" class="thepoint" title="Listen Now"><span>The Point</span></a>
        <a href="http://www.facebook.com/makethepointcae" target="_blank" class="facebook"><span>Facebook</span></a>
        <a href="http://twitter.com/pointradiosc" target="_blank" class="twitter"><span>Twitter</span></a>
        <!--<a href="" class="instagram"><span>Instagram</span></a>
        <a href="" class="youtube"><span>YouTube</span></a>-->
    </div><!--social-->

    <div class="medium-6 small-centered columns copyright">
        <p>Copyright &copy; <?php echo date('Y'); ?> Capital City Media, LLC. P0 Box 50433. Columbia, SC 29250. <span class="bold">803-563-8558</span></p>

        <p class="para">Website crafted by <a href="http://www.lee-allen.com" target="_blank">Lee Allen</a> & Tyler Youngblood.</p>
    </div><!-- copyright -->
</footer>
</div><!-- wrapper -->
<?php wp_footer(); ?>
</body>
</html>