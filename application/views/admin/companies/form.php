<?php

?>
<div ng-controller="AdminCtrl">
    <form class="form-horizontal">
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">שם פרטי/שם חברה</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.first_name" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">שם משפחה/אחראי</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.last_name" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">אימייל</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.email" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">ת.ז</label>
            <div class="col-sm-6">
                <input class="form-control" ng-keypress="only_numbers($event)" ng-model="entity.social_id" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">כתובת</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.address" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">ת"ד</label>
            <div class="col-sm-6">
                <input class="form-control" ng-keypress="only_numbers($event)" ng-model="entity.post_box" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">מיקוד</label>
            <div class="col-sm-6">
                <input class="form-control" ng-keypress="only_numbers($event)" ng-model="entity.post_code" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">טלפון</label>
            <div class="col-sm-6">
                <input class="form-control" ng-keypress="only_numbers($event)" ng-model="entity.phone" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">נייד</label>
            <div class="col-sm-6">
                <input class="form-control" ng-keypress="only_numbers($event)" ng-model="entity.mobile" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">פקס</label>
            <div class="col-sm-6">
                <input class="form-control" ng-keypress="only_numbers($event)" ng-model="entity.fax" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">מנהל פרוייקט</label>
            <div class="col-sm-6">
                <select class="form-control" ng-model="entity.project_manager_id" ng-options="a.value as a.text for a in project_manager_options">
                    <option value="" ng-show="!entity.project_manager_id">- בחר -</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">מנהל חשבונות</label>
            <div class="col-sm-6">
                <select class="form-control" ng-model="entity.account_manager_id" ng-options="a.value as a.text for a in account_manager_options">
                    <option value="" ng-show="!entity.account_manager_id">- בחר -</option>
                </select>
            </div>
        </div>
        <button class="btn btn-primary" ng-click="save()">שמור</button>
    </form>
</div>