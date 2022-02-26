<?php

?>
<div ng-controller="AdminCtrl">
    <form class="form-horizontal">
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">פרוייקט</label>
            <div class="col-sm-6">
                <select class="form-control" ng-model="entity.project_id" ng-options="a.value as a.text for a in project_options">
                    <option value="" ng-show="!entity.project_id">- בחר -</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">מחיר</label>
            <div class="col-sm-6">
                <input class="form-control" ng-keypress="only_numbers($event)" ng-model="entity.price" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">מספר בניינים</label>
            <div class="col-sm-6">
                <input class="form-control" ng-keypress="only_numbers($event)" ng-model="entity.total_buildings" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">מגרש</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.lot" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">הערות</label>
            <div class="col-sm-6">
                <textarea name="" class="form-control" maxlength="255" ng-model="entity.notes" id="" rows="5"></textarea>
            </div>
        </div>

        <button class="btn btn-primary" ng-click="save()">שמור</button>
    </form>
</div>