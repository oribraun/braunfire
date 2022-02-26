app.controller('loginCtrl',function($scope,$http,$timeout){
	$scope.email = '';
	$scope.password = '';
	$scope.remember = false;

	$scope.loginErrText = '';
	$scope.busy = false;
	$scope.success = false;

	$scope.submit = function(){
		if($scope.busy){
			return;
		}
		var formData = {
			'email':$scope.email,
			'password': $scope.password,
			'remember': $scope.remember ? 1 : 0
		};
		if($scope.email == ''){
			$scope.loginErrText = 'נא למלא אימייל';
			return;
		}
		if($scope.password == ''){
			$scope.loginErrText = 'נא למלא סיסמה';
			return;
		}

		$scope.success = false;
		$scope.loginErrText = '';
		$scope.busy = true;
		$http.post(ADMIN_PATH + 'login/ajax_submit', formData)
		.success(function(response){
			if (response.err == 0){
				window.location.reload();

			} else{
				$scope.loginErrText = response.errdesc;
				$scope.busy = false;
				$timeout(function(){
					$scope.loginErrText = '';
				}, 5000);

			}
		})
			.error(function(){
				$scope.loginErrText = 'קרתה תקלה';
				$scope.busy = false;
				$timeout(function(){
					$scope.loginErrText = '';
				}, 5000);
			});
	};

	$scope.clearError = function(){
		$scope.loginErrText = '';
	}
});