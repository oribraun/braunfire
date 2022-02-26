<!DOCTYPE html>
<html lang="he" ng-app="braun">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript">
		var ROOT_PATH = "<?= rel_url() ?>";
		var ABS_PATH = "<?= base_url() ?>";
		var API_PATH = "<?= js_api_url() ?>/";
		var ADMIN_PATH = "<?= admin_url() ?>/";

	</script>
	<title>Login</title>
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
	<link rel="stylesheet" href="<?= rel_url('resources/tools/bootstrap-rtl-3.0.0/bootstrap-rtl.min.css') ?>">
	<link rel="stylesheet" href="<?= rel_url('resources/css/login.css')?>"/>

	<script src="http://connect.facebook.net/en_US/all.js"></script>
	<style>
		html {
			font-family: avenir,"Times New Roman",Georgia,Serif;
		}
	</style>

	<script>

	</script>
</head>
<body>
	<div class="container" ng-controller="loginCtrl">
		<form ng-submit="submit()">
			<div class="form col-sm-4 col-sm-offset-4 login-form well">
				<h2>כניסה למערכת</h2>
				<div class="from-group">
					<label for="">אימייל</label>
					<input class="form-control" ng-model="email" name="email" type="email"/>
				</div>
				<div class="from-group">
					<label for="">סיסמה</label>
					<input class="form-control" ng-model="password" name="password" type="password"/>
				</div>
				<div class="form-group">
					<input type="checkbox" ng-model="remember" id="remember"/>
					<label for="remember">זכור אותי</label>
				</div>
				<input type="submit" class="btn btn-primary" value="התחבר">

				<div id="alert-container" ng-show="loginErrText!=''">
					<div class="alert alert-error">
						<button type="button" class="close" ng-click="clearError()"">&times;</button>
						{{loginErrText}}
					</div>
				</div>
			</div>
		</form>
	</div>
</body>
</html>