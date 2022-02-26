<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="og:url"           content="<?= base_url('surf_cameras') ?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="כל מצלמות הגלישה במקום אחד" />
    <meta property="og:description"   content="דף המרכז את כל המצלמות והתחזיות גלישה" />
    <meta property="og:image"         content="<?= base_url('resources/images/oris-image.jpg') ?>" />
    <meta property="og:site_name"     content="Surf Cameras" />
    <meta property='fb:app_id' content='355759517911502' />


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
            height: 676px;
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
        .display-inline-block {
            display:inline-block;
            width:100%;
            height:100%;
        }
    </style>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <? /*<script type="text/javascript" src="http://server1.reali-tech.com/livestreamflash/demo/jwp6primum/jwplayer-6.8/jwplayer.js"></script>*/ ?>
    <script type="text/javascript" src="<?= base_url('resources/js/surf/jwplayer-6.8/jwplayer.js') ?>"></script>
<!--    <script type="text/javascript" src="https://content.jwplatform.com/libraries/OhtIhj2U.js"></script>-->

    <? /*<script class="script-to-remove" type="text/javascript">jwplayer.key = "gDs1KJKxZ2kDvRyuLROZoefFLcZ44qf487KcT6vQ52I=";</script>*/ ?>
    <? /*<script type="text/javascript">jwplayer.key = "awFbaaaaaaaaaaaaaaa01KD//x8gzkdJ/cMb2s=";</script>*/ ?>
    <? /*<script type="text/javascript">jwplayer.key = "awFbaaaaaaaaaaaaaaa01KD\/\/x8gzkdJ\/cMb2s=";</script>*/ ?>
    <? /*<script type="text/javascript">jwplayer.key = "OOD7GkWbyNXOL6MbstF2Sa/YrQPgtNUPqxm5NA==";</script>*/ ?>
    <? /*<script type="text/javascript">jwplayer.key = "ABCDEFGHIJKLMOPQ";</script>*/ ?>



    <?/*
    <script type="text/javascript">
        function refresh(iframe){
            console.log(iframe);
            document.getElementById(iframe).src = document.getElementById(iframe).src;
        }
    </script>
    */ ?>

    <script type="text/javascript">
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-66849348-1', 'auto');
        ga('send', 'pageview');

    </script>
    <script>
        $(function(){
            setTimeout(function(){
                $('.script-to-remove').remove();
            });
        })
    </script>
</head>
<body>
    <div class="wrapper">
        <!-- Load Facebook SDK for JavaScript -->
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=355759517911502";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <div class="" style="max-width: 720px;margin: 10px auto;">
            <a href="javascript:SharePopup('<?= base_url('surf_cameras') ?>', '', '', '', 520, 350, 'fb')">
                <img src="<?= base_url('resources/images/fb-share-icon.png') ?>"/>
            </a>
            <div class="fb-share-button"
                 data-href="<?= base_url('surf_cameras') ?>"
                 data-layout="button_count">
            </div>
        </div>
<!--        <div class="wrap">-->
<!--            <h2>test stream</h2>-->
<!--            <div class="display-inline-block">-->
<!--                <div id='test-stream'></div>-->
<!--            </div>-->
<!--        </div>-->
        <div class="wrap">
            <h2>מצלמת תל אביב חוף הילטון צפון</h2>
            <div class="display-inline-block">
                <div id='hilton-north'></div>
            </div>
        </div>
        <div class="wrap">
            <h2>מצלמת תל אביב חוף הילטון דרום</h2>
            <div class="display-inline-block">
                <div id='hilton-south'></div>
            </div>
        </div>
        <div class="wrap">
            <h2>מצלמת תל אביב חוף הילטון דרום 2</h2>
            <div class="display-inline-block">
                <div id='hilton-south-2'></div>
            </div>
        </div>
        <div class="wrap">
            <h2>מצלמת תל אביב חוף הדולפינריום</h2>
            <div class="display-inline-block">
                <div id='dolphin'></div>
            </div>
        </div>
        <div class="wrap">
            <h2>מצלמת תל אביב חוף מעריב</h2>
            <div class="display-inline-block">
                <div id='maaravi'></div>
            </div>
        </div>
        <div class="wrap">
            <h2>מצלמת חיפה חוף נירוונה</h2>
            <div class="display-inline-block">
                <div id='haifa'></div>
            </div>
        </div>
<!--        <div class="wrap">-->
<!--            <h2>מצלמת חוף הדולפינריום</h2>-->
<!--            <div class="display-inline-block">-->
<!--                <img src="http://216.172.164.89/"width="100%" alt="Camera Image" id="camimage" onError="this.src=null;this.src='http://216.172.164.89/';">-->
<!--                <button onclick="moveSeaSchool('down')">Down</button>-->
<!--                <button onclick="moveSeaSchool('up')">Up</button>-->
<!--                <button onclick="moveSeaSchool('left')">Left</button>-->
<!--                <button onclick="moveSeaSchool('right')">Right</button>-->
<!--                <button onclick="moveSeaSchool('in')">+</button>-->
<!--                <button onclick="moveSeaSchool('out')">-</button>-->
<!--            </div>-->
<!--        </div>-->
	<? /*
        <div class="wrap">
            <h2>מצלמות חוף בילבונג</h2>
            <div>
                <div class="row tab-wrap">
                    <? /*
                    <div class="col-sm-2 col-xs-2 tab active" style="width:20%"><a href="javascript:void(0);" onclick="setCurrentCamera(4,this)">הילטון סיילינג</a></div>
                    * / ?>
                    <div class="col-sm-2 col-xs-2 tab active" style="width:20%"><a href="javascript:void(0);" onclick="setCurrentCamera(1,this)">זבולון הרצליה</a></div>
                    <div class="col-sm-2 col-xs-2 tab" style="width:20%"><a href="javascript:void(0);" onclick="setCurrentCamera(2,this)">תל אביב</a></div>
                    <div class="col-sm-2 col-xs-2 tab" style="width:20%"><a href="javascript:void(0);" onclick="setCurrentCamera(3,this)">קונטיקי נתניה</a></div>
                    <div class="col-sm-2 col-xs-2 tab" style="width:20%"><a href="javascript:void(0);" onclick="setCurrentCamera(5,this)">סטלה בת ים</a></div>
                </div>
                <img width="100%" src="" class="webcam" id="webcam4" alt="Live Stream">
            </div>
        </div>
        */ ?>
        <div class="wrap">
            <h2>מצלמת חוף בת ים</h2>
            <div class="display-inline-block">
                <div id='bat-yam'></div>
            </div>
        </div>
        <div class="wrap">
            <h2>מצלמת סטלה בת ים</h2>
            <iframe id="iframe9" src="" style="width:100%;"  scrolling="no"></iframe>
        </div>
        <? /*
        <div class="wrap">
            <h2>מצלמת פולג נתניה</h2>
            <div class="display-inline-block">
                <div id='poleg'></div>
            </div>
        </div>
        */ ?>
        <div class="wrap">
            <h2>מצלמת אשדוד חוף הקשתות</h2>
            <div class="display-inline-block">
                <div id='ashdod'></div>
            </div>
        </div>
        <div class="wrap">
            <h2>מצלמת הרצליה דרומי</h2>
            <div class="display-inline-block">
                <div id='herzeliya-dromi'></div>
            </div>
        </div>
        <div class="wrap">
            <h2>מצלמת אשקלון גוטה</h2>
            <div class="display-inline-block">
                <div id='gute-ashkelon'></div>
            </div>
        </div>
        <div class="wrap">
            <h2>מצלמת הרצליה גזיבו</h2>
            <div class="display-inline-block">
                <div id='herzeliya-gazebbo'></div>
            </div>
        </div>
        <div class="wrap">
            <h2>מצלמת הרצליה מרינה</h2>
            <iframe id="iframe6" src="" style="width:100%;"  scrolling="no"></iframe>
        </div>
        <? /*
        <div class="wrap">
            <h2>מצלמת אשקלון</h2>
            <object id="player_api" data="http://wac.4203.go-live.co.il/004203/flowplayer.commercial-3.2.7.swf" type="application/x-shockwave-flash">
                <param name="allowfullscreen" value="true">
                <param name="allowscriptaccess" value="always">
                <param name="seamlesstabbing" value="true">
                <param name="quality" value="high">
                <param name="WMODE" value="OPAQUE">
                <param name="flashvars" value="config={&quot;key&quot;:&quot;#$21f554ae7b993e33c1e&quot;,&quot;logo&quot;:{&quot;url&quot;:&quot;http://wac.4203.go-live.co.il/004203/Tzalam_Logo.png&quot;,&quot;linkUrl&quot;:&quot;http://go-live.co.il&quot;,&quot;linkWindow&quot;:&quot;_blank&quot;,&quot;fullscreenOnly&quot;:false,&quot;displayTime&quot;:9000},&quot;playlist&quot;:[{&quot;url&quot;:&quot;http://wac.4203.go-live.co.il/004203/Eldan.jpg&quot;,&quot;duration&quot;:3,&quot;scaling&quot;:&quot;fit&quot;,&quot;linkUrl&quot;:&quot;http://www.eldan.co.il/landing/sale/2013-04-01/&quot;,&quot;linkWindow&quot;:&quot;_blank&quot;},{&quot;url&quot;:&quot;http://wac.4203.go-live.co.il/004203/SponSors_July_2013.jpg&quot;,&quot;duration&quot;:2,&quot;scaling&quot;:&quot;fit&quot;},{&quot;provider&quot;:&quot;rtmp2&quot;,&quot;url&quot;:&quot;mp4:tzalamyam&quot;,&quot;live&quot;:true}],&quot;plugins&quot;:{&quot;controls&quot;:{&quot;url&quot;:&quot;http://wac.4203.go-live.co.il/004203/flowplayer.controls-3.2.5.swf&quot;,&quot;all&quot;:false,&quot;play&quot;:true,&quot;volume&quot;:false,&quot;mute&quot;:false,&quot;scrubber&quot;:false,&quot;fullscreen&quot;:true,&quot;autoHide&quot;:false,&quot;buttonColor&quot;:&quot;rgba(0, 0, 0, 0.9)&quot;,&quot;buttonOverColor&quot;:&quot;#FF9900&quot;,&quot;backgroundColor&quot;:&quot;#6699CC&quot;,&quot;backgroundGradient&quot;:&quot;medium&quot;,&quot;sliderColor&quot;:&quot;#FFFFFF&quot;,&quot;sliderBorder&quot;:&quot;1px solid #808080&quot;,&quot;volumeSliderColor&quot;:&quot;#FFFFFF&quot;,&quot;volumeBorder&quot;:&quot;1px solid #CC9966&quot;,&quot;timeColor&quot;:&quot;#000000&quot;,&quot;durationColor&quot;:&quot;#9900FF&quot;,&quot;bufferColor&quot;:&quot;CC6633&quot;},&quot;rtmp&quot;:{&quot;url&quot;:&quot;http://wac.4203.go-live.co.il/004203/flowplayer.rtmp-3.2.3.swf&quot;,&quot;netConnectionUrl&quot;:&quot;rtmp://playertzalamyam.go-live.co.il/2009E3/&quot;,&quot;subscribe&quot;:true},&quot;rtmp2&quot;:{&quot;url&quot;:&quot;http://wac.4203.go-live.co.il/004203/flowplayer.rtmp-3.2.3.swf&quot;,&quot;netConnectionUrl&quot;:&quot;rtmp://fml.4203.edgecastcdn.net/204203/&quot;,&quot;subscribe&quot;:true}},&quot;playerId&quot;:&quot;player&quot;,&quot;clip&quot;:{}}">
            </object>
        </div> */ ?>
        <? /*
        <div class="wrap">
            <h2>חוף תל אביב מנטה ריי</h2>
            <div>
                <object type="application/x-shockwave-flash" data="http://www.neocam.co.il/ipvcast/player/player.swf" id="swf_YUboFuQvmz">
                    <param name="quality" value="high">
                    <param name="allowFullScreen" value="true">
                    <param name="allowscriptaccess" value="Always">
                    <param name="wmode" value="opaque">
                    <param name="flashvars" value="width=447&amp;height=356&amp;streamer=rtmp://stream.neocam.co.il/live&amp;file=280d158cacad8081.sdp&amp;title=Title&amp;controlbar=none&amp;autostart=true&amp;loop=true&amp;displayclick=fullscreen&amp;menu=true&amp;logo=&amp;logo.file=&amp;logo.link=http://www.neocam.co.il/&amp;logo.linktarget=_blank&amp;logo.hide=true&amp;logo.margin=8&amp;logo.position=bottom-left&amp;logo.timeout=10">
                </object>
            </div>
        </div> */ ?>
        <? /*
        <div class="wrap">
            <video id=example-video width=600 height=300 class="video-js vjs-default-skin" controls>
                <source
                    src="http://solutions.brightcove.com/jwhisenant/hls/apple/bipbop/bipbopall.m3u8"
                    type="application/x-mpegURL">
            </video>
        </div> */ ?>
    </div>
    <hr>
    <div>
        <h2 style="text-align: center;">תחזית לאיזורי המרכז</h2>
        <iframe id="iframe7" style="height:1000px" src="" frameborder="0"></iframe>
    </div>
    <div>
        <h2 style="text-align: center;">מפת גלים</h2>
        <iframe id="iframe8" style="height:1000px" src="" frameborder="0"></iframe>
    </div>
</body>

<script type="text/javascript" src="<?= base_url('resources/js/surf/common.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('resources/js/surf/jwplayer-setup.js') ?>"></script>



</html>

