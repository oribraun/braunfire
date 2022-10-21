<?php
/* @var $this \MY_Controller */
/* @var $page_data stdClass */
//$bootstrap_url = rel_url('tools/bootstrap/css/bootstrap.min.css');
//$bootstrap_url = rel_url('tools/bootstrap-rtl/css/bootstrap-rtl.min.css');
//$bootstrap_url = rel_url('tools/custom/css/bootstrap-rtl.css');

?><!DOCTYPE html>
<html ng-app="braun">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>Admin Panel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript">
		var ROOT_PATH = "<?= rel_url() ?>";
		var ABS_PATH = "<?= base_url() ?>";
		var API_PATH = "<?= js_api_url() ?>";
		var ADMIN_PATH = "<?= admin_url() .'/' ?>";

        angularJsDependencies = ['ui.bootstrap'];
	</script>

    <script>
        var current_entity = <?= isset($entity) ? json_encode($entity) : json_encode('') ?>;
        var level_options = <?= isset($level_options) ? json_encode($level_options) : json_encode('') ?>;
        var building_type_options = <?= isset($building_type_options) ? json_encode($building_type_options) : json_encode('') ?>;
        var building_status_options = <?= isset($building_status_options) ? json_encode($building_status_options) : json_encode('') ?>;
        var architect_options = <?= isset($architect_options) ? json_encode($architect_options) : json_encode('') ?>;
        var manager_type_options = <?= isset($manager_type_options) ? json_encode($manager_type_options) : json_encode('') ?>;
        var project_manager_options = <?= isset($project_manager_options) ? json_encode($project_manager_options) : json_encode('') ?>;
        var account_manager_options = <?= isset($account_manager_options) ? json_encode($account_manager_options) : json_encode('') ?>;
        var foreman_manager_options = <?= isset($foreman_manager_options) ? json_encode($foreman_manager_options) : json_encode('') ?>;
        var water_specs_options = <?= isset($water_specs_options) ? json_encode($water_specs_options) : json_encode('') ?>;
        var committee_approve_options = <?= isset($committee_approve_options) ? json_encode($committee_approve_options) : json_encode('') ?>;
        var project_status_options = <?= isset($project_status_options) ? json_encode($project_status_options) : json_encode('') ?>;
        var status_description_options = <?= isset($status_description_options) ? json_encode($status_description_options) : json_encode('') ?>;
        var project_options = <?= isset($project_options) ? json_encode($project_options) : json_encode('') ?>;
        var project_serial_options = <?= isset($project_serial_options) ? json_encode($project_serial_options) : json_encode('') ?>;
        var company_options = <?= isset($company_options) ? json_encode($company_options) : json_encode('') ?>;
        var print_shop_link_options = <?= isset($print_shop_link_options) ? json_encode($print_shop_link_options) : json_encode('') ?>;
        var performa_text_options = <?= isset($performa_text_options) ? json_encode($performa_text_options) : json_encode('') ?>;
        var user_options = <?= isset($user_options) ? json_encode($user_options) : json_encode('') ?>;
        var consultant_options = <?= isset($consultant_options) ? json_encode($consultant_options) : json_encode('') ?>;
        var consultant_type_options = <?= isset($consultant_type_options) ? json_encode($consultant_type_options) : json_encode('') ?>;

        var ctrl_name = '<?= isset($this->ctrl_name) ? $this->ctrl_name : '' ?>';
    </script>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

	<script type="text/javascript" src="<?= rel_url('resources/tools/angular.min.js') ?>"></script>
	<script type="text/javascript" src="<?= rel_url('resources/tools/angular-strap.min.js') ?>"></script>
<!--	<link rel="stylesheet" href="--><?//= $bootstrap_url ?><!--" />-->
	<script type="text/javascript" src="<?= rel_url('resources/tools/angular-ui-0.4.0/angular-ui.js') ?>"></script>
	<link type="text/css" href="<?= rel_url('resources/tools/angular-ui-0.4.0/angular-ui.min.css') ?>" rel="stylesheet" />

	<script src="<?= rel_url('resources/js/app.js') ?>" type="text/javascript"></script>
	<script src="<?= rel_url('resources/js/directives.js') ?>" type="text/javascript"></script>
	<script src="<?= rel_url('resources/js/filters.js') ?>" type="text/javascript"></script>
	<script src="<?= rel_url('resources/js/common.js') ?>" type="text/javascript"></script>
    <script src="<?= rel_url('resources/js/controllers/panelCtrl.js') ?>" type="text/javascript"></script>

	<link rel="stylesheet" href="<?= rel_url('resources/css/panel.css') ?>"/>

	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= rel_url('resources/tools/bootstrap-rtl-3.0.0/bootstrap-rtl.min.css') ?>">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.4.0.js"></script>

</head>
<body>


<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?= admin_url("panel") ?>">ממשק פרוייקטים</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-lef">
                <li><a target="_blank" href="<?= admin_url('')?>">חזרה לממשק ניהול</a></li>
            </ul>
        </div>
	</div>
    <div id="alert-container">
        <div class="alert alert-error text-center" ng-class="{'alert-open': entityErrText}">
            <button type="button" class="close" ng-click="clearError()"">&times;</button>
            {{entityErrText}}
        </div>
    </div>
</div>
<?/*
<? $this->load->view('ng-templates/panel/toolbar') ?>
*/ ?>
<div class="container-fluid" style="margin-top:50px;">
	<div class="" ng-cloak>
		<?= $page_data->content ?>
	</div>
</div>

<? /*<script type="text/javascript" src="<?= rel_url('resources/tools/animation-lib/wow.js')?>"></script>*/ ?>
<link rel="stylesheet" href="<?= rel_url('resources/tools/animation-lib/animate.css')?>"/>
</body>
</html>

