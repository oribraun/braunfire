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
    <title>ממשק ניהול</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript">
		var ROOT_PATH = "<?= rel_url() ?>";
		var ABS_PATH = "<?= base_url() ?>";
		var API_PATH = "<?= js_api_url() ?>";
		var ADMIN_PATH = "<?= admin_url() .'/' ?>";
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
        var water_specs_options = <?= isset($water_specs_options) ? json_encode($water_specs_options) : json_encode('') ?>;
        var committee_approve_options = <?= isset($committee_approve_options) ? json_encode($committee_approve_options) : json_encode('') ?>;
        var project_status_options = <?= isset($project_status_options) ? json_encode($project_status_options) : json_encode('') ?>;
        var project_options = <?= isset($project_options) ? json_encode($project_options) : json_encode('') ?>;
        var company_options = <?= isset($company_options) ? json_encode($company_options) : json_encode('') ?>;
        var print_shop_link_options = <?= isset($print_shop_link_options) ? json_encode($print_shop_link_options) : json_encode('') ?>;
        var performa_text_options = <?= isset($performa_text_options) ? json_encode($performa_text_options) : json_encode('') ?>;
        var project_payment_level_options = <?= isset($project_payment_level_options) ? json_encode($project_payment_level_options) : json_encode('') ?>;
        var user_options = <?= isset($user_options) ? json_encode($user_options) : json_encode('') ?>;
        var consultant_type_options = <?= isset($consultant_type_options) ? json_encode($consultant_type_options) : json_encode('') ?>;

        var ctrl_name = '<?= isset($this->ctrl_name) ? $this->ctrl_name : '' ?>';
        var current_country = <?= isset($country) ? $country : 0 ?>;
        var current_state = <?= isset($state) ? $state : 0 ?>;
        var current_user = <?= isset($user) ? json_encode($user) : 0 ?>;
        var current_conversation = <?= isset($conversation) ? $conversation : 0 ?>;
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
	<script src="<?= rel_url('resources/js/services.js') ?>" type="text/javascript"></script>
    <? if($this->ctrl_name == 'users'): ?>
	<? /*<script src="<?= rel_url('resources/js/controllers/usersCtrl.js') ?>" type="text/javascript"></script>*/ ?>
    <? endif; ?>
    <script src="<?= rel_url('resources/js/controllers/adminCtrl.js') ?>" type="text/javascript"></script>
    <? if($this->ctrl_name == 'panel'): ?>
        <script src="<?= rel_url('resources/js/controllers/panelCtrl.js') ?>" type="text/javascript"></script>
    <? endif; ?>

	<link rel="stylesheet" href="<?= base_url('resources/css/default.css') ?>"/>

	<script type="text/javascript" src="<?= rel_url('resources/tools/ckeditor-4.3.1/ckeditor.js') ?>"></script>
	<script type="text/javascript" src="<?= rel_url('resources/tools/ckeditor-4.3.1/adapters/jquery.js') ?>"></script>

	<script type="text/javascript" src="<?= rel_url('resources/tools/bootstrap-datepicker/js/bootstrap-datepicker.js') ?>"></script>
	<script type="text/javascript" src="<?= rel_url('resources/tools/bootstrap-datepicker/js/locales/bootstrap-datepicker.he.js') ?>"></script>
	<link rel="stylesheet" type="text/css" href="<?= rel_url('resources/tools/bootstrap-datepicker/css/datepicker.css') ?>"/>

	<script type="text/javascript" src="<?= rel_url('resources/tools/bootstrap-timepicker/js/bootstrap-timepicker.min.js') ?>"></script>
	<link rel="stylesheet" type="text/css" href="<?= rel_url('resources/tools/bootstrap-timepicker/css/bootstrap-timepicker.min.css') ?>"/>

	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= rel_url('resources/tools/bootstrap-rtl-3.0.0/bootstrap-rtl.min.css') ?>">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		var ckEditorConfigSimple = {
			toolbar : 'Basic',
			width	: 400
		};

		var ckEditorConfigFull = {
			toolbar : 'Full',
			width : 670
		};
		$(function(){


			$('.ckeditor_simple').each(function(){
				$(this).ckeditor(ckEditorConfigSimple);
			});
			$('.ckeditor_full').each(function(){
				$(this).ckeditor(ckEditorConfigFull);
			});

		});

		app.directive('wrCkeditor', function(){
			return {
				require: '?ngModel',
				link: function(scope, elm, attr, ngModel) {
					var ck;
					if (attr.wrCkeditor=='full'){
						ck = CKEDITOR.replace(elm[0],ckEditorConfigFull);
					} else {
						ck = CKEDITOR.replace(elm[0], ckEditorConfigSimple);
					}


					if (!ngModel) return;

					ck.on('instanceReady', function() {
						ck.setData(ngModel.$viewValue);
					});

					function updateModel() {
						scope.$apply(function() {
							ngModel.$setViewValue(ck.getData());
						});
					}

					ck.on('change', updateModel);
					ck.on('key', updateModel);
					ck.on('dataReady', updateModel);

					ngModel.$render = function(value) {
						ck.setData(ngModel.$viewValue);
					};
				}
			};
		});
	</script>
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
			<a class="navbar-brand" href="<?= admin_url("") ?>">ממשק ניהול</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right  visible-xs">
                <li><a href="<?= admin_url('panel') ?>">פאנל</a></li>
                <li><a href="<?= admin_url('projects')?>">פרוייקטים</a></li>
                <li><a href="<?= admin_url('companies')?>">חברות/יזמים</a></li>
                <li><a href="<?= admin_url('managers')?>">מנהלים</a></li>
                <li><a href="<?= admin_url('consultants')?>">יועצים</a></li>
                <li><a href="<?= admin_url('buildings')?>">בניינים</a></li>
                <li><a href="<?= admin_url('architects')?>">ארכיטקטים</a></li>
                <li><a href="<?= admin_url('building_statuses')?>">סטטוס בניינים</a></li>
                <li><a href="<?= admin_url('building_types')?>">סוגי בניינים</a></li>
                <li><a href="<?= admin_url('manager_types')?>">סוגי מנהלים</a></li>
                <li><a href="<?= admin_url('consultant_types')?>">סוגי יועצים</a></li>
                <li><a href="<?= admin_url('project_statuses')?>">סטטוס פרוייקט</a></li>
                <li><a href="<?= admin_url('print_shop_links')?>">מכון העתקות</a></li>
                <li><a href="<?= admin_url('reports/payments')?>">דוח הוצאת פרפורמות</a></li>
                <li><a href="<?= admin_url('logout')?>">יציאה</a></li>
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
	<div class="col-sm-3 col-md-2 hidden-xs" style="border-left:solid 1px #ccc">
		<ul class="nav nav-sidebar">
            <li><a href="<?= admin_url('panel') ?>">פאנל</a></li>
            <li><a href="<?= admin_url('projects')?>">פרוייקטים</a></li>
            <li><a href="<?= admin_url('companies')?>">חברות/יזמים</a></li>
            <li><a href="<?= admin_url('managers')?>">מנהלים</a></li>
			<li><a href="<?= admin_url('consultants')?>">יועצים</a></li>
            <li><a href="<?= admin_url('buildings')?>">בניינים</a></li>
            <li><a href="<?= admin_url('architects')?>">ארכיטקטים</a></li>
			<li><a href="<?= admin_url('building_statuses')?>">סטטוס בניינים</a></li>
			<li><a href="<?= admin_url('building_types')?>">סוגי בניינים</a></li>
			<li><a href="<?= admin_url('manager_types')?>">סוגי מנהלים</a></li>
			<li><a href="<?= admin_url('consultant_types')?>">סוגי יועצים</a></li>
			<li><a href="<?= admin_url('project_statuses')?>">סטטוס פרוייקט</a></li>
            <li><a href="<?= admin_url('print_shop_links')?>">מכון העתקות</a></li>
			<li><a href="<?= admin_url('reports/payments')?>">דוח הוצאת פרפורמות</a></li>
			<li><a href="<?= admin_url('logout')?>">יציאה</a></li>
		</ul>
		<? /*<ul class="nav nav-sidebar">
			<li><a href="">עוד</a></li>
		</ul>*/ ?>
	</div>
	<div class="col-sm-9 col-md-10" style=" padding-top:10px;" ng-cloak>
		<?= $page_data->content ?>
	</div>
</div>

<? /*<script type="text/javascript" src="<?= base_url('resources/tools/animation-lib/wow.js')?>"></script>*/ ?>
<link rel="stylesheet" href="<?= base_url('resources/tools/animation-lib/animate.css')?>"/>
</body>
</html>

