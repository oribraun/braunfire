<?php
/*  */
?>
<form ng-controller="AdminCtrl">

    <h1><?= ucwords(str_replace("_"," ",$this->ctrl_name)) ?></h1>
	<div class="row" style="margin-bottom:15px">
		<div class="col-sm-2">
			<input type="text" class="form-control" ng-keyup="search()" ng-model="searching.text" placeholder="חיפוש.."/>
		</div>
        <div class="col-sm-2">
            <select class="form-control" ng-change="search()" ng-model="searching.project_status_id" ng-options="a.value as a.text for a in project_status_options">
                <option value="" >- סטטוס פרוייקט -</option>
            </select>
        </div>
        <div class="col-sm-2">
            <select class="form-control" ng-change="search()" ng-model="searching.water_specs" ng-options="a.value as a.text for a in water_specs_options">
                <option value="" >- אפיון רשת מים -</option>
            </select>
        </div>
        <div class="col-sm-2">
            <select class="form-control" ng-change="search()" ng-model="searching.committee_approve" ng-options="a.value as a.text for a in committee_approve_options">
                <option value="" >- החלטת ועדה -</option>
            </select>
        </div>
        <div class="col-sm-2">
            <select class="form-control" ng-change="search()" ng-model="searching.architect_id" ng-options="a.value as a.text for a in architect_options">
                <option value="" >- ארכיטקט -</option>
            </select>
        </div>
        <div class="col-sm-2">
            <select class="form-control" ng-change="search()" ng-model="searching.company_id" ng-options="a.value as a.text for a in company_options">
                <option value="" >- חברה/יזם -</option>
            </select>
        </div>
		<div class="col-sm-2">
			<select class="form-control" ng-change="search()" ng-model="searching.working_user_id" ng-options="u.value as u.text for u in user_options">
				<option value="" >- שם המטפל -</option>
			</select>
		</div>
	</div>
	<table class="table table-striped table-bordered table-hover table-condensed">
		<thead>
		<tr>
			<th class="hidden-xs"><a href="" ng-click="orderBy('id')">#<i class="fa fa-fw" ng-show="order_by.column == 'id'" ng-class="{'fa-sort-desc':!order_by.order,'fa-sort-asc':order_by.order}"></i></a></th>
			<th><a href="" ng-click="orderBy('name')">שם<i class="fa fa-fw" ng-show="order_by.column == 'name'" ng-class="{'fa-sort-desc':!order_by.order,'fa-sort-asc':order_by.order}"></i></a></th>
			<th>כתובת</th>
			<th class="hidden-xs">סטטוס פרוייקט</th>
			<th class="hidden-xs">חברה/יזם</th>
			<th>מספר פרוייקט</th>
			<th>שם המטפל</th>
			<th>תאריך עדכון</th>
		</tr>
		</thead>
		<tbody>
		<tr ng-repeat="e in entities | filter:searchText">
			<td class="hidden-xs">{{e.id}}</td>
			<td>{{e.name}}</td>
			<td>{{e.address}}</td>
			<td class="hidden-xs">{{e.project_status_name}}</td>
			<td class="hidden-xs">{{e.company_name}}</td>
			<td>{{e.project_serial}}</td>
			<td>{{UserOptionsText(e.working_user_id)}}</td>
			<td>{{formatDate(e.modified)}}</td>
			<td>
				<a href="<?= admin_url($this->ctrl_name.'/edit')?>/{{e.id}}" class="btn btn-sm btn-default" title="edit"><i class="fa fa-pencil"></i></a>
				<a href="" class="btn btn-sm btn-danger" ng-click="delete_user(e,$event)"><i class="fa fa-trash-o"></i></a>
			</td>
		</tr>
		</tbody>
	</table>

	<a href="<?= admin_url($this->ctrl_name.'/add')?>" class="btn btn-primary">הוספה</a>
</form>