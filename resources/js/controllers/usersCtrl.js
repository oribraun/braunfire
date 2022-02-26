/**
 * Created by private on 17/08/14.
 */

app.controller('UsersCtrl',['$scope','$http','$rootScope','$timeout','ajaxService',function($scope,$http,$rootScope,$timeout,ajaxService){
	$scope.searchText = '';
	$scope.entities = '';
	$scope.level_options = level_options;

	$scope.lowerThan = function(prop, val){
		return function(item){
			if (item[prop] < val) return true;
		}
	}
    //console.log(current_entity);
    //console.log($scope.user);
	$scope.user = {
        id:parseInt(current_entity.id),
		first_name:current_entity.first_name,
		last_name:current_entity.last_name,
		email:current_entity.email,
		password:'',
		level:parseInt(current_entity.level),
		update_password : 0,
		current_password: '',
		new_password: '',
		confirm_password: ''

	};
	$scope.busy = false;
	$scope.success = false;
	$scope.entityErrText = '';
	$scope.loadData = function(){
		if ($scope.busy){
		}
		$scope.busy = true;
		$scope.entityErrText = '';
		$scope.success = false;
		$http.post(ADMIN_PATH + "/" + ctrl_name + '/ajax_load')
		.success(function(response){
			$scope.busy = false;
			if (response.err==0){
				$scope.entities = response.entities;
			} else {
				$scope.entityErrText = response.errdesc;
			}
		})
        .error(function(){
            $scope.busy = false;
            $scope.entityErrText = "קרתה תקלה";
        });
	};
	$scope.loadData();

	$scope.save = function(){
		if ($scope.busy){
		}
        //console.log($('form').serialize());
        //return;
		var formData = $scope.user;

		$scope.busy = true;
		$scope.entityErrText = '';
		$scope.success = false;

		$http.post(ADMIN_PATH + "/" + ctrl_name + '/ajax_save',formData)
			.success(function(response){
				$scope.busy = false;
				if (response.err==0){
					window.location.href = ADMIN_PATH + 'users';
				} else {
					$scope.entityErrText = response.errdesc;
				}
			})
			.error(function(){
				$scope.busy = false;
				$scope.entityErrText = "קרתה תקלה";
			});

	}

	$scope.delete_user = function(element , event){
//		var popoverContent = $('<form><label>Are You Sure ?</label>' +
//			'<div class="form-actions">' +
//			'<input type="button" class="btn btn-danger btn-delete" id="delete" value="delete" />' +
//			'<input type="button" class="btn btn-cancel" id="cancel" value="cancel" />' +
//			'</div></form>');
//		var de = $(event.target);
//		de.popover({
//			animation : true,
//			html : true,
//			content : popoverContent,
//			title : 'Approve Delete',
//			placement : 'bottom',
//			container : 'body'
//		}).popover('show');
//		popoverContent.find('#cancel').click(function(){
//			de.popover('destroy');
//		});
//		popoverContent.find('#delete').click(function(){
//
//		});
			if ($scope.busy){
				return;
			}

			var formData = {
				id:element.id,
				email:element.email
			};

			$scope.busy = true;
			$scope.entityErrText = '';
			$scope.success = false;

			$http.post(ADMIN_PATH + "/" + ctrl_name + '/ajax_delete' , formData)
				.success(function(response){
					if(response.err > 0){
						alert(response.errdesc);
//						de.popover('destroy');
						return;
					}
					$scope.loadData();
//					console.log($scope);
//					de.popover('destroy');
				})
				.error(function(){

				})
//			$.ajax({
//				'type' : 'POST', 'dataType' : 'json', 'data' : formData,
//				'url' : ADMIN_PATH +'users/ajax_delete',
//				'success' : function(response){
//					if (response.err > 0){
//						alert(response.errdesc);
//						de.popover('destroy');
//						return;
//					}
//					console.log($scope);
//					$scope.loadData();
//					de.popover('destroy');
//				},
//				'error' : function(){
//				}
//			});


	}

	$scope.clearError = function(){
		$scope.entityErrText = '';
	}
}]);
