(function($) {
    // Docs at http://simpleweatherjs.com
    /* Does your browser support geolocation? */
    if ("geolocation" in navigator) {
       $('.js-geolocation').show();
    } else {
       $('.js-geolocation').hide();
    }
    var userCoordsLat = '29212',
        userCoordsLng = '';

    // console.log($.cookie('myLocationLat'));
    /*if ($.cookie('myLocationLat') != '') {
       userCoordsLat = $.cookie('myLocationLat');
       userCoordsLng = $.cookie('myLocationLng');
    }*/

    $('.locationSubmit').click(function() {
       submitNewLocal();
    });

    $('.findButton').click(function() {
       $('.findLocal').stop().slideToggle("fast");
       $('.locationSubmit').css({'padding': ($('#location').outerHeight() - $('.locationSubmit').height()) / 2 });
    })

    function submitNewLocal() {
       userCoordsLat = $('#location').val();
       userCoordsLng = '';
       getWeather(userCoordsLat + ',' + userCoordsLng); //load weather using your lat/lng coordinates
       //$.cookie('myLocationLat', userCoordsLat, { expires: 365, path: '/' });
       //$.cookie('myLocationLng', userCoordsLng, { expires: 365, path: '/' });
       $('#location').val('');
    }

    /* Where in the world are you? */
    $('.js-geolocation').click(function() {
       navigator.geolocation.getCurrentPosition(function(position) {
          userCoordsLat = position.coords.latitude;
          userCoordsLng = position.coords.longitude;
          getWeather(userCoordsLat + ',' + userCoordsLng); //load weather using your lat/lng coordinates
          $.cookie('myLocationLat', userCoordsLat, { expires: 365, path: '/' });
          $.cookie('myLocationLng', userCoordsLng, { expires: 365, path: '/' });
       });
    });

    $(document).ready(function() {
       getWeather(userCoordsLat + ',' + userCoordsLng); //Get the initial weather.
    });

    $(document).keypress(function(e) {
        if(e.which == 13 && $('#location').val() != '') {
            submitNewLocal();
        }
    });

    function getWeather(location, woeid) {
       var d = new Date(),
           days = [
              'Sunday', //Sunday starts at 0
              'Monday',
              'Tuesday',
              'Wednesday',
              'Thursday',
              'Friday',
              'Saturday'
           ],
           x = d.getDay(),
           today = days[x];

       $.simpleWeather({
          location: location,
          woeid: woeid,
          unit: 'f',
          success: function(weather) {
             var thisCountry = (weather.region != '') ? weather.region :weather.country;
             html = '<h2 title="This weather update is for ' + weather.city + ', ' + thisCountry + '">' + weather.city + ', ' + thisCountry + '</h2>';
             html += '<div class="today"><div class="iconT" title="The weather is currently ' + weather.currently + '"><i class="icon-' + weather.code + '"></i><p class="currentT">' + weather.currently + '</p></div><p class="tempT" title="Currently ' + weather.temp + ' degrees">' + weather.temp + '<sup>&deg;' + weather.units.temp + '</sup></p><p class="thisDay" title="Today is ' + today + '">' + today + '</p></div>';
             html += '<div class="statsT">';
             html += '<ul><li class="riseT" title="Today\'s sunrise is at ' + weather.sunrise + '"><i>7</i> ' + weather.sunrise + '</li><li class="setT" title="Today\'s sunset is at ' + weather.sunset + '"><i>8</i> ' + weather.sunset + '</li></ul>';
             html += '<ul><li class="maxT" title="Today\'s high will be ' + weather.high + ' degrees.">High : ' + weather.high + '<sup>&deg;'+weather.units.temp+'</sup></li><li class="minT" title="Today\'s low will be ' + weather.low + ' degrees.">Low : ' + weather.low + '<sup>&deg;'+weather.units.temp+'</sup></li></ul>';
             html += '<ul><li class="humT" title="The humidity is currently ' + weather.humidity + ' percent."><i>5</i> ' + weather.humidity + '%</li><li class="presT" title="The barometric pressure is currently ' + weather.pressure + '"><i>\\</i> ' + weather.pressure + ' ' + weather.units.pressure + '</li><li class="windT" title="The windspeed is currently ' + weather.wind.speed + ' miles per hour."><i>,</i>' + weather.wind.direction + ' ' + weather.wind.speed + ' ' + weather.units.speed + '</li></ul>';
             html += '</div>';
             html += '<ul class="forecast">';

             for(var i=1; i < weather.forecast.length; i++) {
                var y = x + i;
                if (y > 6) { y -= 7; }
                var stripe = i%2 == 0 ? 'odd' : 'even';
                html += '<li class="day ' + stripe + '" title="The forecast for ' + days[y] + ' is ' + (weather.forecast[i].text).toLowerCase() + ' with a high of ' + weather.forecast[i].high + ' and a low of ' + weather.forecast[i].low + '."><span>' + days[y] + '</span><ul class="dailycast"><li class="iconF"><i class="icon-' + weather.forecast[i].code + '"/></li><li class="high">' + weather.forecast[i].high + '<sup>&deg;' + weather.units.temp + '</sup></li><li class="low">' + weather.forecast[i].low + '<sup>&deg;' + weather.units.temp + '</sup></li></ul></li>';
             }

             html += '</ul><div class="clearFix"></div>';

             $(".data").html(html);

             $('.tempT, .iconT').equalCols();
          },
          error: function(error) {
             $("#weather").html('<p>' + error + '</p>');
          }
       });
       setTimeout(function(){
          getWeather(userCoordsLat + ',' + userCoordsLng);
       }, 600000);
    }

    jQuery.fn.equalCols = function () {
        $(this).css({'height' : ''});

        // Array Sorter
        var sortNumber = function (a, b) {
            return b - a;
        };

        // Create array for the different heights
        var heights = [];

        // Push each height into an array
        $(this).each(function () {
            heights.push($(this).outerHeight());
        });

        // Sort the array using the Sorter
        heights.sort(sortNumber);

        // Grab Largest Height
        var maxHeight = heights[0];

        return this.each(function () {
            // Set each column to the max height
            $(this).css({'height': maxHeight});
        });
    };
})(jQuery);