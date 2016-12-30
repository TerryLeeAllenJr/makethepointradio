<?php
/*
Plugin Name: Embrace - Weathr
Plugin URI: http://www.embracewebsolutions.com
Description: A plugin to display weather data via the Forecast.IO API
Version: 1.2
Author: Lee Allen
Author URI: http://www.lee-allen.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
class Weathr extends WP_Widget {

    /* Endpoints and such... */
    const GOOGLE_GEOCODE_ENDPOINT = "http://maps.googleapis.com/maps/api/geocode/json?";
    const WEATHER_ENDPOINT = 'https://api.forecast.io/forecast/';
    const SUN_ENDPOINT = "http://www.earthtools.org/sun/";
    const UV_ENDPOINT = "http://iaspub.epa.gov/enviro/efservice/getEnvirofactsUVDAILY/ZIP/";
    const POLLEN_ENDPOINT = "http://airquality.webmd.com/AirQuality/Pollen.aspx?zipcode=";

    function __construct() {
        parent::__construct(
            'weather', // Base ID
            __('Weathr', 'text_domain'), // Name
            array( 'description' => __( 'This is the weather app for the homepage.', 'text_domain' ), ) // Args
        );
    }

    private function getLocationFromIP($ip){
        return array(
            'countryCode'=>"US",
            'countryName'=>'United States',
            'regionName' => 'South Carolina',
            'cityName' => 'Columbia',
            'zip' =>'29229',
            'latitude'=>"34.0298",
            'longitude'=>'-80.8966',
            'timeZone' => '-05:00'
        );
    }

    private function requestWeather($latitude, $longitude, $time = null, $options = array())
    {
        $request_url = self::WEATHER_ENDPOINT
            . $this->api_key
            . '/'
            . $latitude
            . ','
            . $longitude
            . ((is_null($time)) ? '' : ','. $time);

        if (!empty($options)) {
            $request_url .= '?'. http_build_query($options);
        }

        $response = json_decode(file_get_contents($request_url));
        $response->headers = $http_response_header;
        return $response;
    }

    private function requestUVIndex($zipcode){
        $request_url= self::UV_ENDPOINT
            . $zipcode
            . "/JSON";
        $response = json_decode(file_get_contents($request_url));
        //$response->headers = $http_response_header;
        return $response[0];
    }
    private function scrapePollen($zipcode){

        // TODO: Change weather app to make all calls to one location. Disabling this as no longer working.

        return "N/A";
        try{
            $request_url = self::POLLEN_ENDPOINT.$zipcode;
            if(!$file = file_get_contents($request_url)){
                throw new Exception("Unable to scrape pollen index at this time.");
            }
            $xpath = new DOMXPath(@DOMDocument::loadHTML($file));
            $pollenIndex = $xpath->query('//span[@id="lblOverall"]')->item(0)->nodeValue;
            return $pollenIndex;
        }catch(Exception $e){
            return "N/A";
        }


    }

    private function getWeather($time = null, $options = array())
    {
        $location = $this->getLocationFromIP($_SERVER['REMOTE_ADDR']);
        // Get Weather and set thermometer.
        $forecast = $this->requestWeather(
            $location['latitude'],
            $location['longitude'],
            $time,
            $options
        );

        if($forecast->currently->temperature < 50){$forecast->currently->thermometer ='cold';}
        elseif($forecast->currently->temperature < 80){$forecast->currently->thermometer ='warm';}
        else{$forecast->currently->thermometer ='warm';}

        // Get Sunrise and Sunset
        $forecast->sunrise = date(
            "g:i a",
            strtotime(
                date_sunrise(
                    time(),
                    SUNFUNCS_RET_STRING,
                    $location['latitude'],
                    $location['longitude'],
                    90,
                    $forecast->offset
                )
            )
        );
        $forecast->sunset = date(
            "g:i a",
            strtotime(
                date_sunset(
                    time(),
                    SUNFUNCS_RET_STRING,
                    $location['latitude'],
                    $location['longitude'],
                    90,
                    $forecast->offset
                )
            )
        );

        // Get UV Data
        $data = $this->requestUVIndex('29072');
        $forecast->currently->uvIndex = $data->UV_INDEX;
        $uvText = array('LOW','LOW','LOW',
            'MEDIUM','MEDIUM','MEDIUM',
            'HIGH','HIGH','VERY-HIGH',
            'VERY-HIGH','VERY-HIGH',
            'EXTREME','EXTREME','EXTREME');
        $forecast->currently->uvText = $uvText[$data->UV_INDEX];

        // Scrape Pollen Index.
        $forecast->currently->pollenIndex = "N/A";      // Removed due to non functioning.
        return $forecast;
    }

    public function readJSON(){
        if(!$data = json_decode(file_get_contents(plugin_dir_path( __FILE__ )."json/weathr-cache.json"))){
            throw new Exception('Could not read contents of json/weathr-cache.json');
        }
        return $data;
    }

    public function writeJSON($data){
        $data->timestamp = time();
        $fileName = plugin_dir_path( __FILE__ )."json/weathr-cache.json";
        if(!file_put_contents($fileName,$data)){

        }
        return $data;
    }

    public function weatherCache(){
        $data = $this->getWeather();
        $this->writeJSON($data);
        return $data;
    }

    public function widget( $args, $instance ) {
        $location = $this->getLocationFromIP($_SERVER['REMOTE_ADDR']);
        $title = apply_filters( 'widget_title', $instance['title'] );
        $this->api_key = apply_filters( 'widget_module', $instance['api_key'] );

        $weatherConditions = $this->weatherCache();

        echo $args['before_widget'];
        if ( ! empty( $title ) ) {echo $args['before_title'] . $title . $args['after_title'];} ?>
        <?php // TODO: Move this and CSS to another file for extendability. */ ?>

        <div class="small-12 module weather">
            <div class="small-12 columns content">
                <div class="head">
                    <div class="small-8 columns date">
                        <?php echo date('l');?>
                        <span class="black">
                        <?php echo date('M');?>
                            <span class="numbers"><?php echo date('j');?>, <?php echo date('Y');?></span>
                    </span>
                    </div><!--date-->

                    <div class="small-4 columns time">
                        <span class="black numbers"><?php echo date('g:i');?></span>
                        <span class="meridiem"><?php echo date('A');?></span>&nbsp;
                        EST
                    </div><!--time-->

                    <div class="clearfix"></div>
                </div><!--head-->

                <!--
                <div class="small-12 city-search">
                    <form action="" method="post">
                        <div class="row collapse">
                            <label for="search">Search</label>
                            <div class="small-10 columns search-box"><input type="search" name="location" placeholder="City or Zip"></div>

                            <div class="small-2 columns search-submit"><input type="submit" name="search-submit" value="" class="postfix"></div>
                        </div
                    </form>
                </div>
                -->
                <div class="small-12 city-info">
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <td colspan="1" class="thermometer <?php echo $weatherConditions->currently->thermometer;?>"></td>

                            <td colspan="1" class="main-stats">
                                <table cellpadding="0" cellspacing="0">
                                    <tr class="location">
                                        <td>
                                            <p class="city"><?php echo $location['cityName'];?>, <span class="black"><?php echo $location['regionName'];?></span></p>

                                            <p class="latlong">Lon. <?php echo sprintf('%0.2f',$weatherConditions->longitude);?>
                                                Lat. <?php echo sprintf('%0.2f',$weatherConditions->latitude);?></p>
                                        </td>
                                    </tr><!--location-->

                                    <tr class="forecast">
                                        <td>
                                            <table cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td colspan="1" class="current-stats">
                                                        <table cellpadding="0" cellspacing="0">
                                                            <tr>
                                                                <td colspan="2" class="temperature">
                                                                    <h2 class="white">
                                                                        <?php echo round($weatherConditions->currently->temperature);?>&deg;F
                                                                    </h2>
                                                                    <h2 class="light"> /
                                                                        <?php echo round(($weatherConditions->currently->temperature-32)*5/9);?>&deg;C
                                                                    </h2>

                                                                    <div class="feels-like">
                                                                        <span class="small">Feels Like </span>
                                                                <span class="white">
                                                                    <?php echo round($weatherConditions->currently->apparentTemperature);?>&deg;F
                                                                </span>
                                                                        / <?php echo round(($weatherConditions->currently->apparentTemperature-32)*5/9);?>&deg;C
                                                                    </div><!--feel like-->
                                                                </td><!--temperature-->
                                                            </tr>

                                                            <tr>
                                                                <td colpsan="1" class="sunrise">
                                                                    <h6>Sunrise</h6>
                                                                    <h4><?php echo date('g:ia',strtotime($weatherConditions->sunrise));?></h4>
                                                                </td><!--sunrise-->

                                                                <td colpsan="1" class="sunset">
                                                                    <h6>Sunset</h6>
                                                                    <h4><?php echo date('g:ia',strtotime($weatherConditions->sunset));?></h4>
                                                                </td><!--sunset-->
                                                            </tr>

                                                            <tr>
                                                                <td colspan="2" class="chances">
                                                                    <table cellpadding="0" cellspacing="0">
                                                                        <tr>
                                                                            <td class="precipitation">
                                                                                <p>Chance of</p>
                                                                                <p>Precipitation</p>
                                                                                <h5>
                                                                                    <?php echo $weatherConditions->currently->precipProbability;?>%
                                                                                </h5>
                                                                            </td><!--precipitation-->

                                                                            <td class="uv">
                                                                                <p>UV</p>
                                                                                <p>Index</p>
                                                                                <h5><?php echo $weatherConditions->currently->uvText;?></h5>
                                                                            </td><!--uv-->
                                                                            <!-- REMOVING DUE TO NON FUNCTIONALITY...
                                                                            <td class="pollen">
                                                                                <p>Pollen</p>
                                                                                <p>Count</p>
                                                                                <h5><?php echo $weatherConditions->currently->pollenIndex;?></h5>
                                                                            </td>--><!--pollen-->
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td><!--current stats-->

                                                    <td class="current-weather">
                                                        <img src="<?php bloginfo('template_directory');?>/library/images/weather/<?php echo $weatherConditions->currently->icon;?>.png"
                                                             alt="<?php echo $weatherConditions->currently->summary;?>"/>

                                                        <h3><?php echo $weatherConditions->currently->summary;?></h3>
                                                    </td><!--current weather-->
                                                </tr>
                                            </table>
                                        </td>
                                    </tr><!--forecast-->
                                </table>
                            </td><!--main stats-->
                        </tr>

                        <tr>
                            <td colspan="2" class="other-stats">
                                <table cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td class="category">Wind</td>
                                        <td class="category">Humidity</td>
                                        <td class="category">Pressure</td>
                                        <td class="category">Dew Point</td>
                                        <td class="category visibility">Visibility</td>
                                    </tr>

                                    <tr>
                                        <td class="info">
                                            <h4>
                                                <?php
                                                $compass = array("N","NNE","NE","NEE","E","SEE","SE","SSE","S","SSW","SW","SWW","W"
                                                ,"NWW","NW","NNW");
                                                $compcount = round($weatherConditions->currently->windBearing / 22.5);
                                                echo $compass[$compcount];
                                                ?>
                                            </h4>
                                            <h4 class="light"><?php echo $weatherConditions->currently->windSpeed;?> mph</h4>
                                        </td>

                                        <td class="info">
                                            <h4><?php echo round($weatherConditions->currently->humidity*100);?>%</h4>
                                        </td>

                                        <td class="info">
                                            <?php //TODO: Make arrow move up or down depending on pressure.?>
                                            <h4><?php echo round($weatherConditions->currently->pressure);?> &#8673;</h4>
                                        </td>

                                        <td class="info">
                                            <h4><?php echo round($weatherConditions->currently->dewPoint);?>&deg;</h4>
                                        </td>

                                        <td class="info visibility">
                                            <h4><?php echo $weatherConditions->currently->visibility;?> mi</h4>
                                        </td>
                                    </tr>
                                </table>
                            </td><!--other stats-->
                        </tr>
                    </table>
                </div><!--info-->
            </div><!--columns-->

            <div class="clearfix"></div>
        </div><!--weather-->

        <?php echo $args['after_widget'];

    }
    /**
     * Back-end widget form.
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        $title = (isset($instance['title']))?$instance['title']: __( 'New Module', 'text_domain' );
        $api_key = (isset($instance['api_key']))?$instance['api_key']: __( 'New', 'text_domain' );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Display Title:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'api_key' ); ?>">ForecastIO API Key:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('api_key'); ?>"
                   name="<?php echo $this->get_field_name('api_key'); ?>" type="text"
                   value="<?php echo $api_key; ?>" />
        </p>
    <?php
    }

    /**
     * @see WP_Widget::update()
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['api_key'] = ( ! empty( $new_instance['api_key'] ) ) ? strip_tags( $new_instance['api_key'] ) : '';
        return $instance;
    }

}


function register_weathr_widget() {
    register_widget( 'Weathr' );
}
add_action( 'widgets_init', 'register_weathr_widget' );

?>