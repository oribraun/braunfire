<?php

?>
<div ng-controller="AdminCtrl">
    <form class="form-horizontal">
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">פרוייקט</label>
            <div class="col-sm-6">
                <select class="form-control" ng-model="entity.project_id" ng-options="p.value as p.text for p in project_options">
                    <option value="" ng-show="!entity.project_id">- בחר -</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">טקסט</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.text" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label" style="padding-top: 0;">צריך להישלח</label>
            <div class="col-sm-6">
<!--                <input type="checkbox" name="" ng-model="entity.need_to_send" ng-true-value="1" ng-false-value="0" id="" />-->
                <input class="form-control" ng-model="entity.need_to_send" type="number" min="0" step="1" max="1" onkeypress="event.preventDefault()"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label" style="padding-top: 0;">נשלח</label>
            <div class="col-sm-6">
<!--                <input type="checkbox" name="" ng-model="entity.is_delivered" ng-true-value="1" ng-false-value="0" id="" />-->
                <input class="form-control" ng-model="entity.is_delivered" type="number" min="0" step="1" max="1" onkeypress="event.preventDefault()"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label" style="padding-top: 0;">שולם</label>
            <div class="col-sm-6">
<!--                <input type="checkbox" name="" ng-model="entity.payed" ng-true-value="1" ng-false-value="0" id="" />-->
                <input class="form-control" ng-model="entity.payed" type="number" min="0" step="1" max="1" onkeypress="event.preventDefault()"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">משתמש ששלח</label>
            <div class="col-sm-6">
                <select disabled class="form-control" ng-model="entity.delivered_user_id" ng-options="p.value as p.text for p in user_options">

                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">משתמש שעדכן</label>
            <div class="col-sm-6">
                <select disabled class="form-control" ng-model="entity.need_send_user_id" ng-options="p.value as p.text for p in user_options">

                </select>
            </div>
        </div>
        <button class="btn btn-primary" ng-click="save()">שמור</button>
    </form>
</div>