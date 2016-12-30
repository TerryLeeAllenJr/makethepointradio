jQuery(document).ready(function($) {

    var requestURL = "https://www.googleapis.com/youtube/v3/search?key=AIzaSyBjdYFBT9h22qGZjPhX0WRx7mceSJ9xHJ8&channelId=UCov6MR3opX0YnnZ8aLYcIZw&part=snippet,id&order=date&maxResults=20";
    var vidURL = "";
    var imgURL = "";
    var pageURL = "";

    $.getJSON( requestURL, function( data ) {
        $.each( data.items, function( i, item ) {
            var v = 0;
            if (item.id.kind === "youtube#video") {
                v++;
                pageURL = $('#myElement').data('link');
                vidURL = "https://www.youtube.com/watch?v=" + item.id.videoId;
                //imgURL = "http://img.youtube.com/vi/" + item.id.videoId + "/hqdefault.jpg";
                imgURL = pageURL + "/library/images/WTP.png";


                //console.log(pageURL + "/library/images/WTP.png");
                console.log(vidURL);
                console.log(imgURL);

                var playerInstance = jwplayer("myElement");
                playerInstance.setup({
                    file: vidURL,
                    image: imgURL,
                    width: 640,
                    height: 360,
                    skin: {
                        name: "vapor",
                        active: "#375C6A"
                    }
                });
            }
            if ( v === 1 ) {
                return false;
            }
        });
    });

    var youtube = "https://www.youtube.com/watch?v=5Be5StEUKus";
    var youImage = "http://img.youtube.com/vi/5Be5StEUKus/hqdefault.jpg";
});