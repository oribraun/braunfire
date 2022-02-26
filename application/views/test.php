
<!DOCTYPE html>
<html lang="en">
<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>מצלמות חופים</title>
    <style>
        iframe, object, embed {
            width: 100%;
            height: 592px;
            border: none;
            /* border: 1px solid #ccc; */
        }
        iframe {
            width: 100%;
            height: 592px;
        }
        h2 {
            text-align:center;
        }
        .wrap {
            box-shadow: 0px 0px 5px #ccc;
            padding:8px;
            max-width:720px;
            margin: 10px auto;
            min-height: 676px;
        }
        .tab {
            border:solid 1px #ccc;
            padding:8px;
            text-align:center;
        }
        .active {
            background:#ccc;
        }
        .tab-wrap {
            margin:10px 0;
            padding:0;
            margin-right:0 !important;
            margin-left:0 !important;
        }
    </style>
    <!-----------------------------code key-------------------------------------------------->
    <script type="text/javascript" src="http://server1.reali-tech.com/livestreamflash/demo/jwp6primum/jwplayer-6.8/jwplayer.js"></script>
    <script type="text/javascript">jwplayer.key = "gDs1KJKxZ2kDvRyuLROZoefFLcZ44qf487KcT6vQ52I=";</script>
</head>
<body>
<div class="wrapper">
    <div class="wrap">
        <h2>מצלמת חוף הילטון</h2>
        <div style="display:inline-block;width:100%;">
            <div id='playernyVofErlTvsr'></div>
        </div>
    </div>
<script type='text/javascript'>
    var streamName = "inter20.stream";
    var playerTitle = 'Realitech-HiltonSouth';
    var playerLogo = 'intersurfLogoForCam50x80.png';
    var playerLogoLink = 'http://www.reali-tech.com/';
    var playerImage = '../realitech.png';
    var playerUrl_Web = 'rtmp://server1.reali-tech.com/live/'+streamName;
    var playerUrl_IOS_AND = 'http://server1.reali-tech.com:1935/live/'+streamName+'/playlist.m3u8';
    var playerWidth = '704';
    var playerHeight = '576';
    var playerTimeOut = 90; // In Sec

    if (navigator.userAgent.match(/android/i) != null){

        jwplayer("playernyVofErlTvsr").setup({
            logo:
            {
                file: playerLogo,
                link: playerLogoLink,
                hide: 'false',
                //position: 'top left',
                margin: '10'
            },
            image: playerImage,
            file: playerUrl_IOS_AND,
            type: "mp4",
            primary: "html5",
            title: playerTitle,
            width: playerWidth,
            height: playerHeight,
            fallback: 'false',
            autostart: 'true',
            ga: '{}',
            events:{
                onPlay: function() {
                    stopThePlayTimeOut();
                },
                onIdle: function() {
                    //
                },
                onError: function() {
                    //
                }
            }
        });

    } else {
        jwplayer('playernyVofErlTvsr').setup({
            logo:
            {
                file: playerLogo,
                link: playerLogoLink,
                hide: 'false',
                //position: 'top left',
                margin: '10'
            },
            playlist: [{
                image: playerImage,
                title: playerTitle,
                sources: [{
                    file: playerUrl_Web
                },{
                    file: playerUrl_IOS_AND
                }]
            }],
            width: playerWidth,
            height: playerHeight,
            fallback: 'false',
            autostart: 'true',
            primary: 'flash',
            ga: '{}',
            events:{
                onPlay: function() {
                    stopThePlayTimeOut();
                },
                onIdle: function() {
                    //
                },
                onError: function() {
                    //
                }
            }
        });
    }

    function stopThePlay(){
        jwplayer("playernyVofErlTvsr").stop();
    }
    function stopThePlayTimeOut(){
        if(playerTimeOut > 0) {
            setTimeout(stopThePlay,playerTimeOut * 1000);
        }
    }

</script>
</body>
</html>

