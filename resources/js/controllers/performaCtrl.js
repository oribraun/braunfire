app.controller('PerformaCtrl',['$scope','$http','$rootScope','$timeout','ajaxService',function($scope,$http,$rootScope,$timeout,ajaxService){
    //$scope.searchText = '';
    //$scope.entities = '';
    $scope.building_type_options = building_type_options;
    $scope.building_status_options = building_status_options;
    $scope.architect_options = architect_options;
    $scope.manager_type_options = manager_type_options;
    $scope.project_manager_options = project_manager_options;
    $scope.account_manager_options = account_manager_options;
    $scope.water_specs_options = water_specs_options;
    $scope.committee_approve_options = committee_approve_options;
    $scope.project_status_options = project_status_options;
    $scope.project_options = project_options;
    $scope.company_options = company_options;
    $scope.level_options = level_options;
    $scope.print_shop_link_options = print_shop_link_options;
    $scope.performa_text_options = print_shop_link_options;
    $scope.project_payment_level_options = project_payment_level_options;

    $scope.restricted_fields = ['password','created','modified'];


    $scope.lowerThan = function(prop, val){
        return function(item){
            if (item[prop] < val) return true;
        }
    }

    $scope.only_numbers = function(e){
        if(!(e.charCode >= 48 && e.charCode <= 57)) {
            e.preventDefault();
        }
        // onkeypress='return event.charCode >= 48 && event.charCode <= 57'
    }

    $scope.entity = current_entity;

    console.log($scope.entity);

    $scope.busy = false;
    $scope.success = false;
    $scope.delay = (function(){
        var timer = 0;
        return function(callback, ms){
            $timeout.cancel(timer);
            timer = $timeout(callback, ms);
        };
    })();

    $scope.save = function(close_window){
        //console.log(angular.copy($scope.entity))
        $http.post(ADMIN_PATH + ctrl_name + '/ajax_save',angular.copy($scope.entity))
            .success(function(response){
                if (response.err==0){
                    if(close_window) {
                        window.close();
                        return;
                    }
                    refresh();
                } else {
                    $rootScope.entityErrText = response.errdesc;
                }
            })
            .error(function(){
                $rootScope.entityErrText = response.errdesc;
            })
    }
    $scope.prices = [];
    $scope.getTotal = function(payed){
        var total = 0;
        for(key in $scope.entity.performas){
            var obj = $scope.entity.performas[key];
            //console.log(obj);
            if(payed == 'total') {
                total += obj.price * (obj.percent / 100);
            }
            else if(payed == 'to_pay' && (!parseInt(obj.payed_no_fee) && !parseInt(obj.payed_with_fee) && !parseInt(obj.more_payed) || parseInt(obj.partial_payed) || parseInt(obj.more_payed))) {
                if(parseInt(obj.partial_payed)){
                    //total += (obj.price * (obj.percent / 100)) - parseInt(obj.partial_payed_price);
                } else if(parseInt(obj.more_payed)) {
                    total -= parseInt(obj.more_payed_price);
                } else {
                    var last = 2;
                    if(is_view) {
                        last = 1;
                    }
                    if(key == $scope.entity.performas.length-last) {
                        total += obj.price * (obj.percent / 100);
                    }
                }
            }
            else if(payed == 'payed' && parseInt(obj.payed_no_fee) || parseInt(obj.payed_with_fee) || parseInt(obj.more_payed) || parseInt(obj.partial_payed)) {
                if(parseInt(obj.more_payed)) {
                    total += parseInt(obj.more_payed_price);
                } else {
                    total += obj.price * (obj.percent / 100);
                }
            }
        }
        if(total < 0) {
            return 0;
        }
        return total;
    }

    $scope.filterSumArray = function(i) {
        return i;
    }

    $scope.formatDate = function(date){
        var dateOut = '';
        if(date) {
            dateOut = new Date(date);
        } else {
            dateOut = new Date();
        }
        return dateOut;
    };

    $scope.preformaText = [
        'מקדמה בקבלת תוכניות',
        'בגמר יעוץ מקדים',
        'בגמר יעוץ סופי וקבלת חתימה מכיבוי אש על תוכניות',
        'בגמר פיקוח עליון ומתן אישור לרשות הכיבוי'
    ];
    $scope.addPerforma = function(){
        $scope.entity.performas.push({
            project_payment_level_id:$scope.entity.id,
            payment_days:0,
            name:'',
            price:1000,
            percent:10
        })
    }

    $('.datepicker').datepicker({
        option:'',
        format:'dd/mm/yyyy',
        dateFormat:'dd/mm/yyyy',

    }).on('changeDate', function(e){
        $(this).datepicker('hide');
    });
}]);

/**
 * Created by private on 17/08/14.
 */
