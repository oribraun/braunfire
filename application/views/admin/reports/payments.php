<?php
/**
 * Created by PhpStorm.
 * User: private
 * Date: 04/12/2015
 * Time: 15:34
 */
?>

<script>
    app.controller('ReportCtrl',function($http,$scope){
        $scope.payments = <?= json_encode($payments) ?>;
        $scope.update = function(p){
            var formData = {
                id : p.id,
                is_delivered : p.is_delivered ? 1 : 0,
            }
            $http.post('<?= admin_url('reports/ajax_update') ?>',formData)
                .success(function(response){
                    $scope.loadData();
                })
                .error(function(){

                })
        };
        $scope.type = 0;
        $scope.loadData = function(){
            var formData = {
                type :$scope.type,
            }
            $http.post('<?= admin_url('reports/ajax_list') ?>',formData)
                .success(function(response){
                    $scope.payments = response.payments;
                })
                .error(function(){

                })
        }
        $scope.updatePayed = function(p){
            var formData = {
                id : p.id,
                payed : p.payed ? 1 : 0,
            }
            $http.post('<?= admin_url('reports/ajax_update_payed') ?>',formData)
                .success(function(response){
                    $scope.loadData();
                })
                .error(function(){

                })
        };
    });
</script>
<style>
    td,th {
        padding:10px;
    }
</style>
<div ng-controller="ReportCtrl">
    <div class="row" style="margin:0;">
        <ul class="list-unstyled">
            <li class="pull-right"><div class="btn btn-default" ng-class="{'btn-primary':type == 0}" ng-click="type = 0; loadData();">לא נשלחו</div></li>
            <li class="pull-right"><div class="btn btn-default" ng-class="{'btn-primary':type == 1}"  ng-click="type = 1; loadData();">נשלחו</div></li>
            <li class="pull-right"><div class="btn btn-default" ng-class="{'btn-primary':type == 2}"  ng-click="type = 2; loadData();">שולמו</div></li>
        </ul>
    </div>
    <div class="" ng-show="!payments.length">
        <p class="text-center">לא נמצאו רשומות</p>
    </div>
    <table border="1" cellspacing="3" width="100%" ng-show="payments.length">
        <thead>
            <th>שם פרוייקט</th>
            <th>תיאור</th>
            <th>צריך לשלוח</th>
            <th>נשלח</th>
            <th>שולם</th>
            <th>נוצר</th>
        </thead>
        <tr ng-repeat="p in payments" ng-style="p.is_delivered == 0 && {'background':'red'} ">
            <td>{{p.project_name}}</td>
            <td>{{p.text}}</td>
            <td>{{(p.need_to_send ? 'כן' : 'לא')}}</td>
            <td>
                <input type="checkbox" ng-change="update(p)" ng-checked="p.is_delivered == 1" ng-model="p.is_delivered">
            </td>
            <td>
                <input type="checkbox" ng-disabled="p.is_delivered != 1" ng-change="updatePayed(p)" ng-checked="p.payed == 1" ng-model="p.payed">
            </td>
            <td>{{p.created}}</td>
        </tr>
    </table>
</div>
