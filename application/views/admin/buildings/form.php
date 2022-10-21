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
			<label for="" class="col-sm-2 control-label">שם בניין</label>
			<div class="col-sm-6">
				<input class="form-control" ng-model="entity.building_name" type="text"/>
			</div>
		</div>
		<div class="form-group">
            <label for="" class="col-sm-2 control-label">כתובת בניין</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.building_address" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">סוג בניין</label>
            <div class="col-sm-6">
                <select class="form-control" ng-model="entity.building_type_id" ng-options="b.value as b.text for b in building_type_options">
                    <option value="" ng-show="!entity.building_type_id">- בחר -</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">גוש</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.building_block" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">חלקה</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.building_lot" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">מגרש</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.building_ground" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">מס' תיק בניין</label>
            <div class="col-sm-6">
                <input class="form-control" ng-keypress="only_numbers($event)" ng-model="entity.muni_num" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">מס' בניין</label>
            <div class="col-sm-6">
                <input class="form-control" ng-keypress="only_numbers($event)" ng-model="entity.building_num" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">מס' תיק כיבוי</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.fire_num" type="text"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 control-label" for="">מס' החלטת ועדה</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="b.committee_approve_num" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">החלטת ועדה</label>
            <div class="col-sm-6">
                <select class="form-control" ng-model="entity.committee_approve" ng-options="a.value as a.text for a in committee_approve_options">
                    <option value="" ng-show="!entity.committee_approve">- בחר -</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">סטטוס בניין</label>
            <div class="col-sm-6">
                <select class="form-control" ng-model="entity.building_status_id" ng-options="b.value as b.text for b in building_status_options">
                    <option value="" ng-show="!entity.building_status_id">- בחר -</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">ארכיטקט</label>
            <div class="col-sm-6">
                <select class="form-control" ng-model="entity.architect_id" ng-options="a.value as a.text for a in architect_options">
                    <option value="" ng-show="!entity.architect_id">- בחר -</option>
                </select>
            </div>
        </div>
		<button class="btn btn-primary" ng-click="save()">שמור</button>
	</form>
</div>
