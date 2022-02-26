$(function() {
        //$.ajax({
        //    url: "http://api.surfline.com/v1/cams/115813",
        //    type: "GET",
        //    dataType: "jsonp",
        //    success: function (responseData) {
        //        var data = responseData.streamInfo.stream[0];
        //        camStatusToggle = data.camStatus
        //        if(data.camStatus != "up"){
        //            // camera down text
        //            //streamDown(data.messageText)
        //            //streamStatus = false;
        //            //cameraImage = data.camImage;
        //            //tzo = data.camTzo;
        //            streamStatus = false;
        //        } else {
        //            hostingText = "<span id='cameraTimestamp'>00:00:00</span>&nbsp;"+data.messageText,
        //            streamStatus = true;
        //        }
        //        if(data.camImage.indexOf('small') != -1 ){
        //            camImage = data.camImage.replace('small','full')
        //        }else{
        //            camImage = data.camImage
        //        }
        //        cameraImage = data.camImage;
        //        tzo = data.camTzo;
        //        sitepage = "www.surfline.com"+data.oas_virtualurl_temp;
        //        externalCompanionSitepage = data.oas_virtualurl_temp;
        //        // background image
        //        if(data.camImage.indexOf('small') != -1 ){
        //            camImage = data.camImage.replace('small','full')
        //        }else{
        //            camImage = data.camImage
        //        }
        //        noTag = true;
        //        // since no ad, we start time here instead of onAdComplete
        //        adStatus = true;
        //        cameraCurrentTime = 600000;
        //        cameraCurrentTimeReset = 600000;
        //        incompatible = false;
        //        if(responseData.streamInfo.stream[0] && incompatible == false && streamStatus == true){
        //            //adTag = "http://oascentral.surfline.com/RealMedia/ads/adstream_sx.ads/"+sitepage+"@x45?keyword="+userType;
        //            cameraStream = data.file
        //            // premium people on incompatiable devices dont get player
        //            //if((userType == "premium" || userType == "vip_adfree"|| userType == "vip-adfree") && incompatibleDeviceWidthAd == true){
        //                loadHTML5Player('nojwplayer')
        //            //}else{
        //            //    loadCameraPlayer(cameraStream);
        //            //    //Set the onAdError pointer to Try the same Ad again
        //            //    window.adErrorPointer = window.doFallBackonAdError;
        //            //    camLog.init({
        //            //        userId: userMongoId,
        //            //        entitlement: userType,
        //            //        streamUrl: cameraStream,
        //            //        spotId: spotid
        //            //    });
        //            //}
        //        }
        //        function loadHTML5Player(type){
        //            if(type != "nojwplayer"){
        //                jwplayer("test-stream").remove()
        //            }
        //            jQuery('#test-stream').html('<video id="html5Stream" autoplay controls width="640" height="360" poster="'+cameraImage+'"> <source    src="'+cameraStream+'"></video>')
        //            var mediaElement = document.getElementById("html5Stream");
        //            mediaElement.addEventListener('play', function(e) {
        //                cameraCurrentTime = cameraCurrentTimeReset;
        //                //camera_cdt.Timer.play();
        //            }, true);
        //        }
        //        console.log(data)
        //    }
        //});
    jwplayer.key = "MZ8f6uvPDtx4YxjuQt8ykUdzer9cPvWKC6KeRhKx8VOlUOHILUHgE85FrN0=";
    //jwplayer.defaults = {
    //    "aspectratio": "16:9",
    //    "autostart": false,
    //    "controls": true,
    //    "displaydescription": true,
    //    "displaytitle": true,
    //    "flashplayer": "//ssl.p.jwpcdn.com/player/v/7.12.6/jwplayer.flash.swf",
    //    "ga": {
    //        "idstring": "title"
    //    },
    //    "height": 270,
    //    "key": "r7PokcMTkJ4y2+gylndv1Gm8phNmGNPy0Mp00hgZ+3Eg5tnbFaW6l7TsTgQ=",
    //    "mute": false,
    //    "ph": 1,
    //    "pid": "OhtIhj2U",
    //    "plugins": {
    //        "https://assets-jpcust.jwpsrv.com/player/6/6124956/ping.js": {
    //            "pixel": "https://content.jwplatform.com/ping.gif"
    //        }
    //    },
    //    "preload": "metadata",
    //    "primary": "html5",
    //    "repeat": false,
    //    "skin": {
    //        "name": "bekle"
    //    },
    //    "stagevideo": false,
    //    "stretching": "uniform",
    //    "width": "100%"
    //};

    var streamName = "amor.stream";
    var playerTitle = 'Realitech-Poleg';
    var playerLogo = '';
    var playerLogoLink = '';
    var playerImage = '';
    var playerUrl_Web = 'rtmp://server1.reali-tech.com/live/' + streamName;
    var playerUrl_live_AND = 'http://server1.reali-tech.com:1935/live/' + streamName + '/playlist.m3u8';
    var playerWidth = '100%';
    var playerHeight = '576';
    var playerTimeOut = 90; // In Sec
    //my_jwplayer_setup('poleg');
    streamName = "batyam20";
    playerTitle = 'Realitech-Batyam20';
    playerUrl_Web = 'rtmp://server1.reali-tech.com/live/' + streamName;
    playerUrl_live_AND = 'http://server1.reali-tech.com:1935/live/' + streamName + '/playlist.m3u8';
    my_jwplayer_setup("bat-yam");
    streamName = "asdod.stream";
    playerTitle = 'Realitech-Ahsdod';
    playerUrl_Web = 'rtmp://server1.reali-tech.com/live/' + streamName;
    playerUrl_live_AND = 'http://server1.reali-tech.com:1935/live/' + streamName + '/playlist.m3u8';
    my_jwplayer_setup("ashdod");
    streamName = "inter20.stream";
    playerTitle = 'Realitech-HiltonSouth';
    playerUrl_Web = 'rtmp://server1.reali-tech.com/live/' + streamName;
    playerUrl_live_AND = 'http://server1.reali-tech.com:1935/live/' + streamName + '/playlist.m3u8';
    my_jwplayer_setup("hilton-south");
    streamName = "inter10.stream";
    playerTitle = 'Realitech-HiltonNorth';
    playerUrl_Web = 'rtmp://server1.reali-tech.com/live/' + streamName;
    playerUrl_live_AND = 'http://server1.reali-tech.com:1935/live/' + streamName + '/playlist.m3u8';
    my_jwplayer_setup("hilton-north");
    streamName = "hilton-south";
    playerTitle = 'hilton-south';
    playerUrl_Web = 'rtmp://server1.reali-tech.com/live/' + streamName;
    playerUrl_live_AND = 'https://edge01.balticlivecam.com/blc/Israel1/index.m3u8?token=9cd4ec0fa244e707fc6fae64501fb87e:1517830786610';
    my_jwplayer_setup("hilton-south-2");
    streamName = "il-dolphbeachcam.stream";
    playerTitle = 'Realitech-Dolphin';
    playerUrl_Web = 'rtmp://server1.reali-tech.com/live/' + streamName;
    playerUrl_live_AND = 'https://cams.cdn-surfline.com/wsc-east/' + streamName + '/playlist.m3u8';
    my_jwplayer_setup("dolphin");
    streamName = "il-maaravicam.stream";
    playerTitle = 'maaravi';
    playerUrl_Web = 'rtmp://server1.reali-tech.com/live/' + streamName;
    playerUrl_live_AND = 'https://cams.cdn-surfline.com/wsc-east/' + streamName + '/chunklist.m3u8';
    my_jwplayer_setup("maaravi");
    streamName = "il-haifacam.stream";
    playerTitle = 'Realitech-haifa';
    playerUrl_Web = 'rtmp://server1.reali-tech.com/live/' + streamName;
    playerUrl_live_AND = 'https://cams.cdn-surfline.com/wsc-east/' + streamName + '/chunklist.m3u8';
    my_jwplayer_setup("haifa");
    streamName = "il-dromimarinacam.stream";
    playerTitle = 'herzeliya-dromi';
    playerUrl_Web = 'rtmp://server1.reali-tech.com/live/' + streamName;
    playerUrl_live_AND = 'https://cams.cdn-surfline.com/wsc-east/' + streamName + '/chunklist.m3u8';
    my_jwplayer_setup("herzeliya-dromi");
    streamName = "il-gazebbocam.stream";
    playerTitle = 'herzeliya-gazebbo';
    playerUrl_Web = 'rtmp://server1.reali-tech.com/live/' + streamName;
    playerUrl_live_AND = 'https://cams.cdn-surfline.com/wsc-east/' + streamName + '/chunklist.m3u8';
    my_jwplayer_setup("herzeliya-gazebbo");
    streamName = "il-gutebeachcam.stream";
    playerTitle = 'gute-ashkelon';
    playerUrl_Web = 'rtmp://server1.reali-tech.com/live/' + streamName;
    playerUrl_live_AND = 'https://cams.cdn-surfline.com/wsc-east/' + streamName + '/chunklist.m3u8';
    my_jwplayer_setup("gute-ashkelon");

    //streamName = "dolphin.stream";
    //playerTitle = 'Marina HD Cam';
    //playerUrl_Web = 'rtmp://livestream.cdn-surfline.com/cdn-live';
    //playerUrl_live_AND = 'https://wowzaprod3-i.akamaihd.net/hls/live/252823/2c79a63c/playlist.m3u8';
    //my_jwplayer_setup("test-stream");
    function my_jwplayer_setup(id) {
        if (navigator.userAgent.match(/android/i) != null) {
            jwplayer(id).setup({
                logo: {
                    file: playerLogo,
                    link: playerLogoLink,
                    hide: 'true',
                    //position: 'top left',
                    margin: '10'
                },
                image: playerImage,
                file: playerUrl_live_AND,
                type: "mp4",
                primary: "html5",
                title: playerTitle,
                width: playerWidth,
                height: playerHeight,
                androidhls: true,
                //            aspectratio:'16:9',
                fallback: 'false',
                autostart: 'true',
                ga: '{}',
                events: {
                    onPlay: function () {
                        stopThePlayTimeOut();
                    },
                    onIdle: function () {
                        //
                    },
                    onError: function () {
                        //
                    }
                }
            });

        } else {
            jwplayer(id).setup({
                logo: {
                    file: playerLogo,
                    link: playerLogoLink,
                    hide: 'true',
                    //position: 'top left',
                    margin: '10'
                },
                playlist: [{
                    image: playerImage,
                    title: playerTitle,
                    sources: [{
                        file: playerUrl_Web
                    }, {
                        file: playerUrl_live_AND
                    }]
                }],
                width: playerWidth,
                height: playerHeight,
                fallback: 'false',
                autostart: 'true',
                mute: 'true',
                repeat: true,
                primary: 'flash',
                ga: '{}',
                events: {
                    onPlay: function () {
                        stopThePlayTimeOut();
                    },
                    onIdle: function () {
                        //
                    },
                    onError: function () {
                        //
                    }
                }
            });
        }

        function stopThePlay() {
            jwplayer(id).stop();
        }

        function stopThePlayTimeOut() {
            if (playerTimeOut > 0) {
                setTimeout(stopThePlay, playerTimeOut * 1000);
            }
        }
    }
});
