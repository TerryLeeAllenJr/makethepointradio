<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function getLocalNews()
{
    $rss = new DOMDocument();
    $rss->load('http://www.wistv.com/Global/category.asp?C=70687&clienttype=rss');
    $feed = array();
    foreach ($rss->getElementsByTagName('item') as $node) {

        $enclosure = $node->getElementsByTagName('enclosure');

        foreach ($enclosure as $enclosure){
            $img = $enclosure->getAttribute('url');
        }

        $item = array(
            'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
            'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
            'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
            'img' => $img
        );
        array_push($feed, $item);
    }
    return $feed;
}

$feed = getLocalNews();
?>


<ul class="small-block-grid-2 columns news">
    <?php
    for ($i = 0; $i <= 7; $i++) {
        ?>
        <li>
            <a href="<?php echo $feed[$i]['link']; ?>" alt="<?php echo $feed[$i]['title']; ?>" target="_blank">
                <?php if ($feed[$i]['img'] == ''): ?>
                    <img
                        src="<?php echo get_home_url(); ?>/wp-content/themes/makethepointradio/library/images/no-image.jpg"
                        alt="No Image Availble"/>
                <?php else: ?>
                    <img src="<?php echo $feed[$i]['img']; ?>" alt="<?php echo $feed[$i]['title']; ?>">
                <?php endif; ?>

                <h4 class="headline"><?php echo $feed[$i]['title']; ?></h4>
            </a>
        </li>
    <?php } ?>
</ul>
