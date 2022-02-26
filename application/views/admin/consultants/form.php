<?php

?>
<div ng-controller="AdminCtrl">
    <form class="form-horizontal">
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">שם פרטי</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.first_name" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">שם משפחה</label>
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
            <label for="" class="col-sm-2 control-label">כתובת</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.address" type="text"/>
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
                <input class="form-control" ng-model="entity.phone" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">נייד</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.mobile" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">סוג יועץ</label>
            <div class="col-sm-6">
                <select class="form-control" ng-model="entity.consultant_type_id" ng-options="b.value as b.text for b in consultant_type_options">
                    <option value="" ng-show="!entity.consultant_type_id">- בחר -</option>
                </select>
            </div>
        </div>
        <button class="btn btn-primary" ng-click="save(<?= $this->input->get("close_on_save") ? 'true' : '' ?>)">שמור</button>
    </form>
</div>