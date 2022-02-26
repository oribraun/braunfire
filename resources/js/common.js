/**
 * Created by private on 19/06/2015.
 */

/** General Functions **/


function redirect(url){
    window.location = url;
}
function refresh(){
    window.location.reload();
}


function htmlEntities(str) {
    return str.replace(/&/g, '&amp;').replace(/"/g, '&quot;').replace(/'/g, '&#39;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
//	return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}


function formatDate(o){
    var d = o.getDate();
    var m = o.getMonth()+1;
    return ((d<10) ? '0' : '') + d + '/' + ((m<10)?'0':'') + m + '/' + o.getFullYear();
}

function setCookie(c_name,value,exdays){
    var exdate = new Date();
    var prevdate = new Date();
    exdate.setDate(exdate.getDate() + exdays);

//	prevdate.setDate(prevdate.getDate() -1);
//	document.cookie = c_name + "=a; expires=" + prevdate.toUTCString() + "; path=/";

    var c_value = escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString()) +"; path=/";
    document.cookie = c_name + "=" + c_value;
}

function getCookie(c_name){
    var c_value = document.cookie;
    var c_start = c_value.indexOf(" " + c_name + "=");
    if (c_start == -1){
        c_start = c_value.indexOf(c_name + "=");
    }
    if (c_start == -1){
        c_value = null;
    } else {
        c_start = c_value.indexOf("=", c_start) + 1;
        var c_end = c_value.indexOf(";", c_start);
        if (c_end == -1){
            c_end = c_value.length;
        }
        c_value = unescape(c_value.substring(c_start,c_end));
    }
    return c_value;
}


function stringToDate(s){
    var parsed = s.split('/');
    if (parsed.length!=3){
        return false;
    }
    return new Date(parseInt(parsed[2]), parseInt(parsed[1])-1, parseInt(parsed[0]));
}

function isArray(v){
    return ( Object.prototype.toString.call( v ) === '[object Array]' );
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
