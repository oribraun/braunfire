<?php
/*  */
?>
<form ng-controller="AdminCtrl">

    <h1><?= ucwords(str_replace("_"," ",$this->ctrl_name)) ?></h1>
	<div class="row" style="margin-bottom:15px">
		<div class="col-sm-4">
			<input type="text" class="form-control" ng-keyup="search()" ng-model="searching.text" placeholder="חיפוש.."/>
		</div>
        <div class="col-sm-2">
            <select class="form-control" ng-change="search()" ng-model="searching.project_id" ng-options="p.value as p.text for p in project_options">
                <option value="" ng-show="!entity.project_id">- פרוייקט -</option>
            </select>
        </div>
        <div class="col-sm-2">
            <select class="form-control" ng-change="search()" ng-model="searching.building_type_id" ng-options="p.value as p.text for p in building_type_options">
                <option value="" ng-show="!entity.building_type_id">- סוג בניין -</option>
            </select>
        </div>
	</div>
	<table class="table table-striped table-bordered table-hover table-condensed">
		<thead>
		<tr>
			<th class="hidden-xs">#</th>
			<th>שם פרוייקט</th>
			<th>כינוי בניין</th>
			<th class="hidden-xs">כתובת בניין</th>
			<th class="hidden-xs">סוג בניין</th>
			<th class="hidden-xs">מספר בניין</th>
			<th class="hidden-xs">גוש</th>
			<th class="hidden-xs">חלקה</th>
			<th class="hidden-xs">מגרש</th>
		</tr>
		</thead>
		<tbody>
		<tr ng-repeat="e in entities | filter:searchText">
			<td class="hidden-xs">{{e.id}}</td>
			<td>{{e.project_name}}</td>
			<td>{{e.building_name}}</td>
			<td>{{e.building_address}}</td>
			<td class="hidden-xs">{{e.building_type_name}}</td>
			<td class="hidden-xs">{{e.building_num}}</td>
			<td class="hidden-xs">{{e.building_block}}</td>
			<td class="hidden-xs">{{e.building_lot}}</td>
			<td class="hidden-xs">{{e.building_ground}}</td>
			<td>
				<a href="<?= admin_url($this->ctrl_name.'/edit')?>/{{e.id}}" class="btn btn-sm btn-default" title="edit"><i class="fa fa-pencil"></i></a>
				<a href="" class="btn btn-sm btn-danger" ng-click="delete_user(e,$event)"><i class="fa fa-trash-o"></i></a>
			</td>
		</tr>
		</tbody>
	</table>

	<a href="<?= admin_url($this->ctrl_name.'/add')?>" class="btn btn-primary">הוספה</a>
</form>
