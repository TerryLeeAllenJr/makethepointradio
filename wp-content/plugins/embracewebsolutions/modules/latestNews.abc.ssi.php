<?php
function getABCNews($genre = 'national')
{
    $feedBase = "http://abcnewsradioonline.com/";
    $feedEnd = "rss.xml";

    switch ($genre) {
        case 'sports':
            $feedMiddle = "sports-news/";
            break;
        case 'entertainment':
            $feedMiddle = "entertainment-news/";
            break;
        case 'national':
            $feedMiddle = "national-news/";
            break;
        case 'national':
            $feedMiddle = "politics-news/";
            break;
        case 'national':
            $feedMiddle = "world-news/";
            break;
        case 'national':
            $feedMiddle = "business-news/";
            break;
        case 'national':
            $feedMiddle = "health-news/";
            break;
        default:
            $feedMiddle = "national-news/";
    }

    $feed = $feedBase . $feedMiddle . $feedEnd;
    $rss = simplexml_load_file($feed);

    $data = new stdClass();
    $data->title = $rss->channel->title;
    $data->link = $rss->channel->link;
    $data->items = array();

    foreach ($rss->channel->item AS $node) {
        $item = array(
            'title' => $node->title->__toString(),
            'link' => $node->link->__toString(),
            'date' => $node->pubDate->__toString()
        );
        array_push($data->items, $item);
    }
    return $data;
}

$feed = getABCNews();
?>

<ul class="small-block-grid-1 columns news">
    <?php
    $story = $feed->items;
    for ($i = 0; $i <= 7; $i++) {
        ?>
        <li>
            <a href="<?php echo $story[$i]['link']; ?>" alt="<?php echo $story[$i]['title']; ?>" target="_blank">
                <img class="img-small"
                     src="<?php echo get_home_url(); ?>/wp-content/themes/makethepointradio/library/images/abc-news-radio.png"/>
                <h4 class="headline"><?php echo $story[$i]['title']; ?></h4>
            </a>
        </li>
    <?php } ?>
</ul>
