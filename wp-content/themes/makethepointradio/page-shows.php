<?php
/*
 Template Name: Page - Shows
*/
?>

<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="row page">
    <div class="title">
        <?php if ( get_the_title() != 'Shows' ) { ?>
        <h2>The <?php the_title(); ?> Lineup</h2>
        <?php } else { ?>
        <h2>Todays <?php the_title(); ?></h2>
        <?php } ?>
    </div>
    <!--title-->

    <ul class="breadcrumbs">
        <li><a href="<?php echo site_url(); ?>">Home</a></li>
        <li class="current"><a href="<?php echo site_url(); ?>/current-shows/">Shows</a></li>
    </ul><!--breadcrumbs-->

    <?php if (get_the_title() == "Shows") { ?>
    <div class="row">
        <div class="small-12 columns show-heading">
            <h2 class="light">Lineup for Today: &nbsp; </h2>
            <h2 class="red"><?php echo(date('D, F d, Y'));?></h2>
        </div>
    </div>
    <?php } ?>

<div class="row content">
    <div class="medium-6 columns shows">
        <?php
        $thisDate = date("N");
        $thisDateAbbr = date("D");
        $thisDateName = get_the_title();
        $thisNameChange = false;

        if ($thisDateName == "Shows") {
            if ($thisDate < 6 && $thisNameChange != true) {
                $thisDateName = "Monday-Friday";
            } else {
                $thisDateName = date("l");
            }
        }

        if (($thisDate == 6 && get_the_title() == "Shows") || get_the_title() == 'Saturday') {

            $thisDateName = 'Saturday';

            $postID = 248; // Doug Stephan
            include('library/includes/showcard.php');

            $postID = 709; // Free Talk
            include('library/includes/showcard.php');

            $postID = 188; // Return to Joy
            include('library/includes/showcard.php');

            $postID = 704; // The Costa Report
            include('library/includes/showcard.php');

            $postID = 208; // Take Point
            include('library/includes/showcard.php');

            $postID = 379; // Frontlines of Freedom
            include('library/includes/showcard.php');

            $postID = 260; // Todd Schnitt
            include('library/includes/showcard.php');

            $postID = 692; // Golden Age of Radio
            include('library/includes/showcard.php');

            $postID = 696; // Free Talk
            include('library/includes/showcard.php');

            $postID = 141; // Evolve with Tzima
            include('library/includes/showcard.php');

        } else if (($thisDate == 7 && get_the_title() == "Shows") || get_the_title() == 'Sunday') {

            $thisDateName = 'Sunday';

            $postID = 1104; // Talk Legal
            include('library/includes/showcard.php');

            $postID = 709; // Free Talk
            include('library/includes/showcard.php');

            $postID = 166; // Instant Replay
            include('library/includes/showcard.php');

            $postID = 676; // Golden Age of Radio
            include('library/includes/showcard.php');

            $postID = 680; // ABC Perspectives
            include('library/includes/showcard.php');

            $postID = 410; // Lars Larson
            include('library/includes/showcard.php');

            $postID = 414; // Dave Ramsey
            include('library/includes/showcard.php');

            $postID = 392; // Point of Pets
            include('library/includes/showcard.php');

            $postID = 145; // David Calef
            include('library/includes/showcard.php');

            $postID = 204; // This is Columbia
            include('library/includes/showcard.php');

            $postID = 395; // Principles
            include('library/includes/showcard.php');

            $postID = 398; // Freedom Feens
            include('library/includes/showcard.php');

        } else {

            $postID = 248; // Doug Stephan
            include('library/includes/showcard.php');

            $postID = 178; // Keven Cohen
            include('library/includes/showcard.php');

            if ($thisDate == 1 || get_the_title() == 'Monday') {
                $thisNameChange = true;
                $postID = 141; // Evolve with Tzima
                include('library/includes/showcard.php');
            }
            if ($thisDate == 2 || get_the_title() == 'Tuesday') {
                $thisNameChange = true;
                $postID = 202; // Holli Roberts
                include('library/includes/showcard.php');
            }
            if ($thisDate == 3 || get_the_title() == 'Wednesday') {
                $thisNameChange = true;
                $postID = 206; // Fit and Focused
                include('library/includes/showcard.php');
            }
            if ($thisDate == 4 || get_the_title() == 'Thursday') {
                $thisNameChange = true;
                $postID = 123; // Fran Halloran
                include('library/includes/showcard.php');
            }
            if ($thisDate == 5 || get_the_title() == 'Friday') {
                $thisNameChange = true;
                $postID = 79; // Frankie Griffin
                include('library/includes/showcard.php');
            }

            if (get_the_title() == 'Shows') {
                $thisDateName = "Monday-Friday";
                $thisNameChange = false;
            }

            $postID = 330; // Herman Cain
            include('library/includes/showcard.php');

            $postID = 272; // Laura Ingraham
            include('library/includes/showcard.php');

            $postID = 275; // Dave Ramsey
            include('library/includes/showcard.php');

            $postID = 269; // Keven Cohen
            include('library/includes/showcard.php');

            $postID = 214; // SportsTalk
            include('library/includes/showcard.php');

            $postID = 260; // The Schnitt
            include('library/includes/showcard.php');

            $postID = 278; // Michael Savage
            include('library/includes/showcard.php');

        }

        $postID = 316; // America Tonight
        include('library/includes/showcard.php');

        $postID = 256; // Red Eye Radio
        include('library/includes/showcard.php');
        ?>

    </div>
    <!--shows-->

    <div class="medium-4 columns show-list">
        <div class="subtitle">
            <h2>Shows List</h2>
        </div>
        <!--subtitle-->

        <table cellpadding="0" cellspacing="0">
        <?php
        if ($thisDate < 6) { $thisDateAbbr = "M-F"; ?>
            <tr>
                <td class="show-name"><a href="<?php echo esc_url( get_permalink(248)); ?>">Doug Stephan</a></td>
                <td class="days"><a href="<?php echo esc_url( get_permalink(248)); ?>"><?php echo $thisDateAbbr; ?></a></td>
                <td class="time"><a href="<?php echo esc_url( get_permalink(248)); ?>">6AM-7AM</a></td>
            </tr>

            <tr>
                <td class="show-name"><a href="<?php echo esc_url( get_permalink(178)); ?>">Keven Cohen</a></td>
                <td class="days"><a href="<?php echo esc_url( get_permalink(178)); ?>"><?php echo $thisDateAbbr; ?></a></td>
                <td class="time"><a href="<?php echo esc_url( get_permalink(178)); ?>">7AM-9AM</a></td>
            </tr>

            <tr>
                <td class="show-name"><a href="<?php echo esc_url( get_permalink(248)); ?>">Local Experts</a></td>
                <td class="days"><a href="<?php echo esc_url( get_permalink(248)); ?>"><?php echo $thisDateAbbr; ?></a></td>
                <td class="time"><a href="<?php echo esc_url( get_permalink(248)); ?>">9AM-10PM</a></td>
            </tr>

            <tr>
                <td class="show-name"><a href="<?php echo esc_url( get_permalink(330)); ?>">Herman Cain</a></td>
                <td class="days"><a href="<?php echo esc_url( get_permalink(330)); ?>"><?php echo $thisDateAbbr; ?></a></td>
                <td class="time"><a href="<?php echo esc_url( get_permalink(330)); ?>">10AM-12PM</a></td>
            </tr>

            <tr>
                <td class="show-name"><a href="<?php echo esc_url( get_permalink(272)); ?>">Laura Ingraham</a></td>
                <td class="days"><a href="<?php echo esc_url( get_permalink(272)); ?>"><?php echo $thisDateAbbr; ?></a></td>
                <td class="time"><a href="<?php echo esc_url( get_permalink(272)); ?>">12PM-2PM</a></td>
            </tr>

            <tr>
                <td class="show-name"><a href="<?php echo esc_url( get_permalink(414)); ?>">Dave Ramsey</a></td>
                <td class="days"><a href="<?php echo esc_url( get_permalink(414)); ?>"><?php echo $thisDateAbbr; ?></a></td>
                <td class="time"><a href="<?php echo esc_url( get_permalink(414)); ?>">2PM-4PM</a></td>
            </tr>

            <tr>
                <td class="show-name"><a href="<?php echo esc_url( get_permalink(178)); ?>">Keven Cohen</a></td>
                <td class="days"><a href="<?php echo esc_url( get_permalink(178)); ?>"><?php echo $thisDateAbbr; ?></a></td>
                <td class="time"><a href="<?php echo esc_url( get_permalink(178)); ?>">4PM-6PM</a></td>
            </tr>

            <tr>
                <td class="show-name"><a href="<?php echo esc_url( get_permalink(214)); ?>">Phil Kornblut</a></td>
                <td class="days"><a href="<?php echo esc_url( get_permalink(214)); ?>"><?php echo $thisDateAbbr; ?></a></td>
                <td class="time"><a href="<?php echo esc_url( get_permalink(214)); ?>">6PM-7PM</a></td>
            </tr>

            <tr>
                <td class="show-name"><a href="<?php echo esc_url( get_permalink(260)); ?>">Todd Schnitt</a></td>
                <td class="days"><a href="<?php echo esc_url( get_permalink(260)); ?>"><?php echo $thisDateAbbr; ?></a></td>
                <td class="time"><a href="<?php echo esc_url( get_permalink(260)); ?>">7PM-9PM</a></td>
            </tr>

            <tr>
                <td class="show-name"><a href="<?php echo esc_url( get_permalink(278)); ?>">Michael Savage</a></td>
                <td class="days"><a href="<?php echo esc_url( get_permalink(278)); ?>"><?php echo $thisDateAbbr; ?></a></td>
                <td class="time"><a href="<?php echo esc_url( get_permalink(278)); ?>">9PM-12AM</a></td>
            </tr>
        <?php } else if ($thisDate == 6) { ?>
            <tr>
                <td class="show-name"><a href="<?php echo esc_url( get_permalink(248)); ?>">Doug Stephan</a></td>
                <td class="days"><a href="<?php echo esc_url( get_permalink(248)); ?>"><?php echo $thisDateAbbr; ?></a></td>
                <td class="time"><a href="<?php echo esc_url( get_permalink(248)); ?>">6AM-7AM</a></td>
            </tr>

            <tr>
                <td class="show-name"><a href="<?php echo esc_url( get_permalink(709)); ?>">Free Talk Live</a></td>
                <td class="days"><a href="<?php echo esc_url( get_permalink(709)); ?>"><?php echo $thisDateAbbr; ?></a></td>
                <td class="time"><a href="<?php echo esc_url( get_permalink(709)); ?>">7AM-9AM</a></td>
            </tr>

            <tr>
                <td class="show-name"><a href="<?php echo esc_url( get_permalink(188)); ?>">Return to Joy</a></td>
                <td class="days"><a href="<?php echo esc_url( get_permalink(188)); ?>"><?php echo $thisDateAbbr; ?></a></td>
                <td class="time"><a href="<?php echo esc_url( get_permalink(188)); ?>">9AM-10AM</a></td>
            </tr>

            <tr>
                <td class="show-name"><a href="<?php echo esc_url( get_permalink(704)); ?>">The Costa Report</a></td>
                <td class="days"><a href="<?php echo esc_url( get_permalink(704)); ?>"><?php echo $thisDateAbbr; ?></a></td>
                <td class="time"><a href="<?php echo esc_url( get_permalink(704)); ?>">10AM-11AM</a></td>
            </tr>

            <tr>
                <td class="show-name"><a href="<?php echo esc_url( get_permalink(208)); ?>">Take Point</a></td>
                <td class="days"><a href="<?php echo esc_url( get_permalink(208)); ?>"><?php echo $thisDateAbbr; ?></a></td>
                <td class="time"><a href="<?php echo esc_url( get_permalink(208)); ?>">11PM-1PM</a></td>
            </tr>

            <tr>
                <td class="show-name"><a href="<?php echo esc_url( get_permalink(379)); ?>">Frontlines of Freedom</a></td>
                <td class="days"><a href="<?php echo esc_url( get_permalink(379)); ?>"><?php echo $thisDateAbbr; ?></a></td>
                <td class="time"><a href="<?php echo esc_url( get_permalink(379)); ?>">1PM-3PM</a></td>
            </tr>

            <tr>
                <td class="show-name"><a href="<?php echo esc_url( get_permalink(260)); ?>">Todd Schnitt</a></td>
                <td class="days"><a href="<?php echo esc_url( get_permalink(260)); ?>"><?php echo $thisDateAbbr; ?></a></td>
                <td class="time"><a href="<?php echo esc_url( get_permalink(260)); ?>">3PM-6PM</a></td>
            </tr>

            <tr>
                <td class="show-name"><a href="<?php echo esc_url( get_permalink(692)); ?>">Golden Age of Radio</a></td>
                <td class="days"><a href="<?php echo esc_url( get_permalink(692)); ?>"><?php echo $thisDateAbbr; ?></a></td>
                <td class="time"><a href="<?php echo esc_url( get_permalink(692)); ?>">6PM-7PM</a></td>
            </tr>

            <tr>
                <td class="show-name"><a href="<?php echo esc_url( get_permalink(709)); ?>">Free Talk Live</a></td>
                <td class="days"><a href="<?php echo esc_url( get_permalink(709)); ?>"><?php echo $thisDateAbbr; ?></a></td>
                <td class="time"><a href="<?php echo esc_url( get_permalink(709)); ?>">7PM-9PM</a></td>
            </tr>

            <tr>
                <td class="show-name"><a href="<?php echo esc_url( get_permalink(141)); ?>">Evolve with Tzima</a></td>
                <td class="days"><a href="<?php echo esc_url( get_permalink(141)); ?>"><?php echo $thisDateAbbr; ?></a></td>
                <td class="time"><a href="<?php echo esc_url( get_permalink(141)); ?>">9PM-12AM</a></td>
            </tr>
        <?php } else if ($thisDate == 7) { ?>
            <tr>
                <td class="show-name"><a ">Doug Stephan *</a></td>
                <td class="days"><a href="<?php echo esc_url( get_permalink(248)); ?>"><?php echo $thisDateAbbr; ?></a></td>
                <td class="time"><a href="<?php echo esc_url( get_permalink(248)); ?>">6AM-7AM</a></td>
            </tr>

            <tr>
                <td class="show-name"><a href="<?php echo esc_url( get_permalink(709)); ?>">Free Talk Live</a></td>
                <td class="days"><a href="<?php echo esc_url( get_permalink(709)); ?>"><?php echo $thisDateAbbr; ?></a></td>
                <td class="time"><a href="<?php echo esc_url( get_permalink(709)); ?>">7AM-8AM</a></td>
            </tr>

            <tr>
                <td class="show-name"><a href="<?php echo esc_url( get_permalink(166)); ?>">Instant Replay!</a></td>
                <td class="days"><a href="<?php echo esc_url( get_permalink(166)); ?>">Sun</a></td>
                <td class="time"><a href="<?php echo esc_url( get_permalink(166)); ?>">8AM-10AM</a></td>
            </tr>

            <tr>
                <td class="show-name"><a href="<?php echo esc_url( get_permalink(692)); ?>">Golden Age of Radio</a></td>
                <td class="days"><a href="<?php echo esc_url( get_permalink(692)); ?>"><?php echo $thisDateAbbr; ?></a></td>
                <td class="time"><a href="<?php echo esc_url( get_permalink(692)); ?>">10AM-11AM</a></td>
            </tr>

            <tr>
                <td class="show-name"><a href="<?php echo esc_url( get_permalink(680)); ?>">ABC Perspectives</a></td>
                <td class="days"><a href="<?php echo esc_url( get_permalink(680)); ?>"><?php echo $thisDateAbbr; ?></a></td>
                <td class="time"><a href="<?php echo esc_url( get_permalink(680)); ?>">11AM-12PM</a></td>
            </tr>

            <tr>
                <td class="show-name"><a href="<?php echo esc_url( get_permalink(410)); ?>">Lars Larson</a></td>
                <td class="days"><a href="<?php echo esc_url( get_permalink(410)); ?>"><?php echo $thisDateAbbr; ?></a></td>
                <td class="time"><a href="<?php echo esc_url( get_permalink(410)); ?>">12PM-3PM</a></td>
            </tr>

            <tr>
                <td class="show-name"><a href="<?php echo esc_url( get_permalink(414)); ?>">Dave Ramsey</a></td>
                <td class="days"><a href="<?php echo esc_url( get_permalink(414)); ?>"><?php echo $thisDateAbbr; ?></a></td>
                <td class="time"><a href="<?php echo esc_url( get_permalink(414)); ?>">3PM-5PM</a></td>
            </tr>

            <tr>
                <td class="show-name"><a href="<?php echo esc_url( get_permalink(392)); ?>">Point of Pets</a></td>
                <td class="days"><a href="<?php echo esc_url( get_permalink(392)); ?>"><?php echo $thisDateAbbr; ?></a></td>
                <td class="time"><a href="<?php echo esc_url( get_permalink(392)); ?>">5PM-6PM</a></td>
            </tr>

            <tr>
                <td class="show-name"><a href="<?php echo esc_url( get_permalink(145)); ?>">David Calef</a></td>
                <td class="days"><a href="<?php echo esc_url( get_permalink(145)); ?>"><?php echo $thisDateAbbr; ?></a></td>
                <td class="time"><a href="<?php echo esc_url( get_permalink(145)); ?>">6PM-7PM</a></td>
            </tr>

            <tr>
                <td class="show-name"><a href="<?php echo esc_url( get_permalink(204)); ?>">This is Columbia</a></td>
                <td class="days"><a href="<?php echo esc_url( get_permalink(204)); ?>"><?php echo $thisDateAbbr; ?></a></td>
                <td class="time"><a href="<?php echo esc_url( get_permalink(204)); ?>">7PM-8PM</a></td>
            </tr>

            <tr>
                <td class="show-name"><a href="<?php echo esc_url( get_permalink(395)); ?>">Principles</a></td>
                <td class="days"><a href="<?php echo esc_url( get_permalink(395)); ?>"><?php echo $thisDateAbbr; ?></a></td>
                <td class="time"><a href="<?php echo esc_url( get_permalink(395)); ?>">8PM-10PM</a></td>
            </tr>

            <tr>
                <td class="show-name"><a href="<?php echo esc_url( get_permalink(398)); ?>">Freedom Feens</a></td>
                <td class="days"><a href="<?php echo esc_url( get_permalink(398)); ?>"><?php echo $thisDateAbbr; ?></a></td>
                <td class="time"><a href="<?php echo esc_url( get_permalink(398)); ?>">10PM-12PM</a></td>
            </tr>
        <?php } ?>
            <tr>
                <td class="show-name"><a href="<?php echo esc_url( get_permalink(316)); ?>">America Tonight</a></td>
                <td class="days"><a href="<?php echo esc_url( get_permalink(316)); ?>"><?php echo $thisDateAbbr; ?></a></td>
                <td class="time"><a href="<?php echo esc_url( get_permalink(316)); ?>">12PM-1AM</a></td>
            </tr>

            <tr>
                <td class="show-name"><a href="<?php echo esc_url( get_permalink(256)); ?>">Red Eye Radio</a></td>
                <td class="days"><a href="<?php echo esc_url( get_permalink(256)); ?>"><?php echo $thisDateAbbr; ?></a></td>
                <td class="time"><a href="<?php echo esc_url( get_permalink(256)); ?>">1AM-6AM</a></td>
            </tr>
        </table>
    </div>
    <!--show list-->

    <div class="medium-2 columns">
        <div class="ad">
            <h4 class="extralight">Ad Space</h4>
        </div>
        <!--ad-->
    </div>
</div><!--row-->

</div><!--row-->
<?php endwhile;endif;?>
<?php get_footer(); ?>
