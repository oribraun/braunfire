<?php


function js_api_url($url = ''){
	$CI =& get_instance();
	return rel_url(rtrim($CI->config->item('js_api_path'), '/') . '/' . ltrim($url,'/'));
}

function production_url($url = ''){
	return base_url($url);
}

function rel_url($url=''){
	return parse_url(base_url($url), PHP_URL_PATH);
}

function rel_static_url($url=''){
	return (ENVIRONMENT == 'production') ? rel_url($url) : production_url($url);
}

if ( ! function_exists('ssl_url'))
{
	function ssl_url($uri = '')
	{
		return str_replace('http://', 'https://', base_url($uri));
	}
}
if ( ! function_exists('no_ssl_url'))
{
	function no_ssl_url($uri = '')
	{
		return str_replace('https://', 'http://', base_url($uri));
	}
}

function admin_url($url=''){
	$CI =& get_instance();
	return rel_url($CI->config->item('admin_path') . '/' . ltrim($url,'/'));
}


function oc_url_encode($url){
	$url = str_replace(',','', $url);
	$url = str_replace(' ','-', $url);
	return urlencode($url);
}


function view_url_encode($url){
	$url = str_replace("'", "", $url);
	$url = str_replace('"', "", $url);
	$url = str_replace('\\', "", $url);
	$url = str_replace('/', " ", $url);
	$url = str_replace('%', "", $url);
	$url = str_replace('!', "", $url);
	$url = str_replace('+', ' ', $url);
	$url = str_replace(',', ' ', $url);
	while (strpos($url,'  ') !== false){
		$url = str_replace('  ', ' ', $url);
	}
	$url = str_replace(' ', '-', trim($url));
	return urlencode($url);
}

function webroot_real_path($dir=''){
	$CI =& get_instance();
	return $CI->config->item('webroot_real_path') . ltrim($dir,'/');
}