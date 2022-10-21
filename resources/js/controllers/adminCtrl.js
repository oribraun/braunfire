app.controller('AdminCtrl',['$scope','$http','$rootScope','$timeout','ajaxService',function($scope,$http,$rootScope,$timeout,ajaxService){
    //$scope.searchText = '';
    //$scope.entities = '';
    $scope.building_type_options = building_type_options;
    $scope.building_status_options = building_status_options;
    $scope.architect_options = architect_options;
    $scope.manager_type_options = manager_type_options;
    $scope.project_manager_options = project_manager_options;
    $scope.status_description_options = status_description_options;
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
    $scope.user_options = user_options;
    $scope.consultant_type_options = consultant_type_options;

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
    console.log(current_entity);
    for(var key in current_entity) {
        if($scope.restricted_fields.indexOf(key) == -1) {
            //console.log(key + " ->" + (current_entity[key] === parseInt(current_entity[key])));
            console.log('entity - ' + current_entity[key]);
            console.log('length - ' + current_entity[key].length);
            console.log('isString - ' +(isNaN(current_entity[key]) || !current_entity[key].length));
            console.log('isZero - ' +(current_entity[key].length > 1 && current_entity[key].charAt(0) == 0));
            //$scope.entity[key] = (current_entity[key].length == undefined || !isNaN(current_entity[key]))  ? parseInt(current_entity[key]) : current_entity[key];
            $scope.entity[key] = (isNaN(current_entity[key]) || !current_entity[key].length)  ? current_entity[key] : ((current_entity[key].length > 1 && current_entity[key].charAt(0) == 0) ? current_entity[key] : parseInt(current_entity[key]));
        }
    }
    console.log($scope.entity);
    $scope.extraFields = {
        update_password : 0,
        current_password: '',
        new_password: '',
        confirm_password: ''
    }

    $scope.order_by = {
        column:'id',
        order:0
    }

    if(ctrl_name == 'users') {
        jQuery.extend($scope.entity, $scope.extraFields);
    }
    $scope.busy = false;
    $scope.success = false;
    $scope.delay = (function(){
        var timer = 0;
        return function(callback, ms){
            $timeout.cancel(timer);
            timer = $timeout(callback, ms);
        };
    })();
    $scope.search = function(){
        //console.log($rootScope.searchText.val);
        $scope.delay(function(){
            //console.log($rootScope.searchText);
            ajaxService.resetPage();
            ajaxService.loadData(ctrl_name);
        },500);
    };

    $scope.orderBy = function(column) {
        ajaxService.resetPage();
        if($scope.order_by.column == column) {
            $scope.order_by.order = !$scope.order_by.order;
        } else {
            $scope.order_by.order = 0;
        }
        $scope.order_by.column = column;
        ajaxService.setSortBy(ctrl_name,column);
    }

    if(!current_entity) {
        ajaxService.loadData(ctrl_name);
    }

    $scope.save = function(close_window){
        //console.log(angular.copy($scope.entity))
        ajaxService.saveData(ctrl_name, angular.copy($scope.entity),close_window).then(function (data) {
            console.log(data);
            if(data.err > 0) {
                $rootScope.entityErrText = data.errdesc;
            }
        });
    }

    $scope.delete_user = function(element , event){
        var formData = {
            id:element.id,
            email:element.email
        };
        ajaxService.deleteData(event, ctrl_name, formData);
    }

    $scope.formatDate = function(date){
        var dateOut = '';
        if(date) {
            dateOut = new Date(date);
        } else {
            dateOut = new Date();
        }
        var day = dateOut.getDate();
        var month = dateOut.getMonth()+1;
        var year = dateOut.getFullYear();
        var hour = dateOut.getHours();
        var minute = dateOut.getMinutes();
        var seconds = dateOut.getSeconds();
        return $scope.addZero(day) + '/' + $scope.addZero(month) + '/' + year + ' ' + $scope.addZero(hour) + ':' + $scope.addZero(minute) + ':' + $scope.addZero(seconds);
        //return dateOut;
    };

    $scope.addZero = function(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }

    $scope.UserOptionsText = function(id) {
        var obj = $.grep($scope.user_options, function(e){ return e.value == id; });
        if(obj.length) {
            return obj[0].text;
        }
        return 'לא נבחר';
    }

    $scope.ConsultantTypeOptionsText = function(id) {
        var obj = $.grep($scope.consultant_type_options, function(e){ return e.value == id; });
        if(obj.length) {
            return obj[0].text;
        }
        return 'לא נבחר';
    }

    $scope.openNewPerforma = function(evt){
        $('#project_id_to_add').on('change',function(){
            if($(this).val() > 0) {$('#payment_level_id_to_add').show();$("#payment_level_id_to_add[project_id=" + $(this).val() + "]").show();} else {$("#payment_level_id_to_add[project_id=" + $(this).val() + "]").hide();$('#payment_level_id_to_add').hide();}
        })
        var content = '';
        content += '<form><div>';
        content += '<select class="form-control" id="project_id_to_add">';
        content += '<option value="">- בחר -</option>';
        for(var p in $scope.project_options)
        {
            content += '<option value="'+ $scope.project_options[p].value+'">'+ $scope.project_options[p].text+'</option>';
        }
        content += '</select></div>';
        content += '<select class="form-control" id="payment_level_id_to_add" style="display: none">';
        content += '<option value="">- בחר -</option>';
        for(var p in $scope.project_payment_level_options)
        {
            content += '<option style="display: none" project_id="'+ $scope.project_payment_level_options[p].project_id+'" value="'+ $scope.project_payment_level_options[p].value+'">'+ $scope.project_payment_level_options[p].text+'</option>';
        }
        content += '</select></div>';
        content += '<div class="form-actions">';
        content += '<input type="button" class="btn btn-primary btn-approve" value="בחר" />';
        content += '<input type="button" class="btn btn-default btn-cancel" value="ביטול" />';
        content += '</div></form>';
        content += '<script>';
        content += '$("#project_id_to_add").on("change",function(){';
        content += 'console.log("asdf");';
        content += "if($(this).val() > 0) {$('#payment_level_id_to_add').show();$('#payment_level_id_to_add option[project_id=' + $(this).val() + ']').show();} else {$('#payment_level_id_to_add option[project_id=' + $(this).val() + ']').hide();$('#payment_level_id_to_add').hide();}";
        content += '})';
        content += '</script>';
        var popoverContent = $(content);
        var de = $(evt.target);
        de.popover({
            animation : true,
            html : true,
            content : popoverContent,
            title : 'בחר פרוייקט',
            placement : 'left',
            container : 'body'
        }).popover('show');
        popoverContent.find('.btn-cancel').on('click',(function(){
            de.popover('destroy');
        }));
        popoverContent.find('.btn-approve').on('click',(function() {
            var project_id = $('#project_id_to_add').val();
            var payment_level_id = $('#payment_level_id_to_add').val();
            if(project_id == 0) {
                $rootScope.entityErrText = 'נא לבחור פרוייקט';
                $rootScope.$apply();
            }else if(payment_level_id == 0) {
                $rootScope.entityErrText = 'נא לבחור שלב תשלום';
                $rootScope.$apply();
            } else {
                redirect(ADMIN_PATH + ctrl_name + '/view/0/'+project_id);
            }
        }));
    }
}]);

/**
 * Created by private on 17/08/14.
 */
