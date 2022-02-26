if (typeof(angularJsDependencies) == 'undefined' || !angularJsDependencies){
    angularJsDependencies = [];
}

var app = angular.module("braun",angularJsDependencies);

app.config(['$httpProvider',function($httpProvider){
	$httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';
	$httpProvider.defaults.transformRequest = function(data){
		if (data === undefined) {
			return data;
		}
		return $.param(data);
	};
}]);

app.run(['$rootScope','$timeout',function($rootScope, $timeout){
    $rootScope.entityErrText = '';
    $rootScope.searching = {
        text:'',
        architect_id:0,
        project_status_id:0,
        water_specs:0,
        committee_approve:0
    };
    $rootScope.entities = [];
    $rootScope.clearError = function(){
        $rootScope.entityErrText = '';
    }

    var errorTimeout = false;
    $rootScope.$watch("entityErrText",function(){
        $timeout.cancel(errorTimeout);
        errorTimeout = $timeout(function(){
            $rootScope.entityErrText = '';
        },5000);
    })
}])