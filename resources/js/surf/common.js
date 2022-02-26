$(window).load(function(){

    $('#iframe6').attr('src','http://62.219.45.26:140/mjpg/video.mjpg');
    //
    $('#iframe7').attr('src','http://magicseaweed.com/Central-Tel-Aviv-Surfing/113/');

    $('#iframe8').attr('src','http://isramar.ocean.org.il/isramar2009/wave_model/default.aspx?region=coarse&model=wam');

    $('#iframe9').attr('src','http://82.81.235.100/axis-cgi/mjpg/video.cgi');

    $('#iframe9').contents().find("head")
        .append($("<style type='text/css'>  img{width:100%;}  </style>"));
    console.log($('#iframe9').contents().find("head"))

});



function detectmob() {

    if( navigator.userAgent.match(/Android/i)

        || navigator.userAgent.match(/webOS/i)

        || navigator.userAgent.match(/iPhone/i)

        || navigator.userAgent.match(/iPad/i)

        || navigator.userAgent.match(/iPod/i)

        || navigator.userAgent.match(/BlackBerry/i)

        || navigator.userAgent.match(/Windows Phone/i)

    ){

        return true;

    }

    else {

        return false;

    }

};

$(function(){

    if(detectmob()){

        $('.header').show();

    }



// 1 zvulun beach

// 2 tel aviv unknown

// 3 kontiki beach

// 4 hilton saling beach

// 5 stela beach

//////////////////////////////////    currentCamera= 1;

//    errorimg4= 0;

//    document.images.webcam4.onload = DoIt4;

//    document.images.webcam4.src = 'http://195.188.87.186:8888/cam_'+currentCamera+'.jpg?uniq=0.29369425610639155';

//    document.images.webcam4.onerror = ErrorImage4;

});

function setCurrentCamera(index, event) {

    $('.tab-wrap div').removeClass('active');

    $(event).parent().addClass('active');

    currentCamera = index;

    errorimg4 = 0;

    document.images.webcam4.onload = DoIt4;

    document.images.webcam4.src = 'http://195.188.87.186:8888/cam_'+currentCamera+'.jpg?uniq=0.29369425610639155';

    document.images.webcam4.onerror = ErrorImage4;

}

function LoadImage4()
{

    uniq4 = Math.random();

    document.images.webcam4.src = "http://195.188.87.186:8888/cam_" + currentCamera + ".jpg?uniq="+uniq4;

    document.images.webcam4.onload = DoIt4;

}

function ErrorImage4()

{

    errorimg4++;

    if (errorimg4>3){

        document.images.webcam4.onload = "";

        document.images.webcam4.onerror = "";

        document.images.webcam4.src = "offline.jpg";

    }else{

        uniq4 = Math.random();

        document.images.webcam4.src = "http://195.188.87.186:8888/cam_" + currentCamera + ".jpg?uniq="+uniq4;

    }

}

function DoIt4()

{

    errorimg4=0;

    window.setTimeout("LoadImage4();", 40);

}



function SharePopup(url, title, descr, image, winWidth, winHeight, type) {

    var winTop = (screen.height / 2) - (winHeight / 2);

    var winLeft = (screen.width / 2) - (winWidth / 2);

    url = encodeURIComponent(url);

    if(type == 'fb') {

        window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);

    }

    if(type == 'tw') {

        window.open('https://twitter.com/share?url=' + url + '&text=' + descr, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);

    }

    if(type == 'gp') {

        window.open('https://plus.google.com/share?url=' + url , 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);

    }

    if(type == 'ln') {

        window.open('https://www.linkedin.com/cws/share?url=' + url , 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);

    }

}


//
//$.ajax({
//    type:'post',
//    url:'https://seaschool.co.il/camera/control/aj.php',
//    success:function(response) {
//        var res = response.split(";");
//        console.log(res);
//    }
//})

//function moveSeaSchool(direction){
//    $.ajax({
//        type:'get',
//        url:'https://seaschool.co.il/camera/cameraMove.php?move='+direction,
//        success:function(response){
//        }
//    })
//}