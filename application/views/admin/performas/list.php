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
            <select class="form-control" ng-change="search()" ng-model="searching.project_id" ng-options="a.value as a.text for a in project_options">
                <option value="" ng-show="!entity.project_id">- פרוייקט -</option>
            </select>
        </div>
	</div>
	<table class="table table-striped table-bordered table-hover table-condensed">
		<thead>
		<tr>
			<th class="hidden-xs"><a href="" ng-click="orderBy('id')">#<i class="fa fa-fw" ng-show="order_by.column == 'id'" ng-class="{'fa-sort-desc':!order_by.order,'fa-sort-asc':order_by.order}"></i></a></th>
			<th><a href="" ng-click="orderBy('project_id')">פרוייקט<i class="fa fa-fw" ng-show="order_by.column == 'project_id'" ng-class="{'fa-sort-desc':!order_by.order,'fa-sort-asc':order_by.order}"></i></a></th>
			<th>שוטף</th>
			<th class="hidden-xs">נשלח</th>
			<th class="hidden-xs">אושר</th>
			<th>שולם ללא מע"מ</th>
			<th>שולם כולל מע"מ</th>
			<th>חשבונית</th>
		</tr>
		</thead>
		<tbody>
		<tr ng-repeat="e in entities | filter:searchText">
			<td class="hidden-xs">{{e.id}}</td>
			<td>{{e.project_name}}</td>
			<td>{{e.payment_days}}</td>
			<td class="hidden-xs">{{e.delivered}}</td>
			<td class="hidden-xs">{{e.approved}}</td>
			<td>{{e.payed_no_fee}}</td>
			<td>{{e.payed_with_fee}}</td>
			<td>{{e.invoice}}</td>
			<td>
				<a href="<?= admin_url($this->ctrl_name.'/view')?>/{{e.id}}" class="btn btn-sm btn-default" title="edit"><i class="fa fa-pencil"></i></a>
				<a href="" class="btn btn-sm btn-danger" ng-click="delete_user(e,$event)"><i class="fa fa-trash-o"></i></a>
			</td>
		</tr>
		</tbody>
	</table>

	<? /*<a href="<?= admin_url($this->ctrl_name.'/add')?>" class="btn btn-primary">הוספה</a>*/?>
	<a href="" ng-click="openNewPerforma($event)" class="btn btn-primary">הוספה</a>
</form>