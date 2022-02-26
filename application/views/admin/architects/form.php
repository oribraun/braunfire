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
<!--        <div class="form-group">-->
<!--            <label for="" class="col-sm-2 control-label">שם אחראי</label>-->
<!--            <div class="col-sm-6">-->
<!--                <input class="form-control" ng-model="entity.manager_name" type="text"/>-->
<!--            </div>-->
<!--        </div>-->
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">אימייל אחראי</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.manager_email" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">נייד אחראי</label>
            <div class="col-sm-6">
                <input class="form-control" ng-keypress="only_numbers($event)" ng-model="entity.manager_mobile" type="text"/>
            </div>
        </div>
        <? /*
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">שם מנהל</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.manager_name" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">אימייל מנהל</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.manager_email" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">נייד מנהל</label>
            <div class="col-sm-6">
                <input class="form-control"ng-keypress="only_numbers($event)" ng-model="entity.manager_mobile" type="text"/>
            </div>
        </div>*/ ?>
        <button class="btn btn-primary" ng-click="save()">שמור</button>
    </form>
</div>