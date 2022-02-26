<?php
/* @var $this \MY_Controller */
/* @var $page_data object */
/* @var $CI \MY_Controller */
$CI =& get_instance();

?>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--[if lte IE 8]>
<![endif]-->
<title>basic</title>
<meta charset="utf-8">
<meta property="og:title" content="basic"/>
<meta property="og:image" content="<?= base_url('basic'); ?>"/>
<meta property="og:site_name" content="basic"/>
<meta property="og:description" content="basic"/>

<script type="text/javascript">
	var WR_ROOT_PATH = "<?= rel_url() ?>";
	var WR_ABS_PATH = "<?= base_url() ?>";
	var WR_API_PATH = "<?= js_api_url() ?>/";

</script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>


<link rel="shortcut icon" href="<?= base_url('images/favicon.ico')?>" >


<?/*<script type="text/javascript" src="<?= rel_url('wr-common/tools/html5.js') ?>"></script>*/?>
<script src="<?= rel_url('resources/tools/bootstrap-3.1.1/js/bootstrap.js') ?>" type="text/javascript"></script>

<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.js"></script>

<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular-sanitize.min.js"></script>

<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<script src="<?= rel_url('resources/js/app.js') ?>" type="text/javascript"></script>
<script src="<?= rel_url('resources/js/controllers/loginCtrl.js') ?>" type="text/javascript"></script>

<link rel="stylesheet" href="<?= rel_url('resources/tools/bootstrap-3.1.1/css/bootstrap.min.css') ?>">
<link rel="stylesheet" href="<?= rel_url('resources/css/default.css')?>"/>
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">


<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

