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
			<select class="form-control" ng-model="searching.consultant_type_id" ng-options="b.value as b.text for b in consultant_type_options">
				<option value="">- סוג יועץ -</option>
			</select>
		</div>
	</div>
	<table class="table table-striped table-bordered table-hover table-condensed">
		<thead>
		<tr>
			<th ng-init="searching.order_by.column = 'id';searching.order_by.direction = '-'" class="hidden-xs">
				<a ng-click="searching.order_by.column = 'id';searching.order_by.direction == '-' && (searching.order_by.direction = '+') || (searching.order_by.direction = '-')" href="">#</a>
				<i class="fa"
				   ng-show="searching.order_by.column == 'id'"
				   ng-style="searching.order_by.direction != '+' && {'margin-top':'-15px','vertical-align':'middle'}"
				   ng-class="{'fa-sort-desc':searching.order_by.direction != '+','fa-sort-asc':searching.order_by.direction == '+'}"></i>
			</th>
			<th>
				<a ng-click="searching.order_by.column = 'first_name';searching.order_by.direction == '-' && (searching.order_by.direction = '+') || (searching.order_by.direction = '-')" href="">שם פרטי</a>
				<i class="fa" ng-show="searching.order_by.column == 'first_name'"
				   ng-style="searching.order_by.direction != '+' && {'margin-top':'-15px','vertical-align':'middle'}"
				   ng-class="{'fa-sort-desc':searching.order_by.direction != '+','fa-sort-asc':searching.order_by.direction == '+'}"></i>
			</th>
			<th>
				<a ng-click="searching.order_by.column = 'last_name';searching.order_by.direction == '-' && (searching.order_by.direction = '+') || (searching.order_by.direction = '-')" href="">שם משפחה</a>
				<i class="fa" ng-show="searching.order_by.column == 'last_name'"
				   ng-style="searching.order_by.direction != '+' && {'margin-top':'-15px','vertical-align':'middle'}"
				   ng-class="{'fa-sort-desc':searching.order_by.direction != '+','fa-sort-asc':searching.order_by.direction == '+'}"></i>
			</th>
			<th class="hidden-xs">
				<a ng-click="searching.order_by.column = 'email';searching.order_by.direction == '-' && (searching.order_by.direction = '+') || (searching.order_by.direction = '-')" href="">אימייל</a>
				<i class="fa" ng-show="searching.order_by.column == 'email'"
				   ng-style="searching.order_by.direction != '+' && {'margin-top':'-15px','vertical-align':'middle'}"
				   ng-class="{'fa-sort-desc':searching.order_by.direction != '+','fa-sort-asc':searching.order_by.direction == '+'}"></i>
			</th>
			<th>
				<a ng-click="searching.order_by.column = 'mobile';searching.order_by.direction == '-' && (searching.order_by.direction = '+') || (searching.order_by.direction = '-')" href="">נייד</a>
				<i class="fa" ng-show="searching.order_by.column == 'mobile'"
				   ng-style="searching.order_by.direction != '+' && {'margin-top':'-15px','vertical-align':'middle'}"
				   ng-class="{'fa-sort-desc':searching.order_by.direction != '+','fa-sort-asc':searching.order_by.direction == '+'}"></i>
			</th>
			<th class="hidden-xs">סוג יועץ</th>
		</tr>
		</thead>
		<tbody>
		<tr ng-repeat="e in entities | filter:searchText | filter:{'consultant_type_id':searching.consultant_type_id} | orderBy:searching.order_by.direction + searching.order_by.column">
			<td class="hidden-xs">{{e.id}}</td>
			<td>{{e.first_name}}</td>
			<td>{{e.last_name}}</td>
			<td class="hidden-xs">{{e.email}}</td>
			<td>{{e.mobile}}</td>
			<td class="hidden-xs">{{ConsultantTypeOptionsText(e.consultant_type_id)}}</td>
			<td>
				<a href="<?= admin_url($this->ctrl_name.'/edit')?>/{{e.id}}" class="btn btn-sm btn-default" title="edit"><i class="fa fa-pencil"></i></a>
				<a href="" class="btn btn-sm btn-danger" ng-click="delete_user(e,$event)"><i class="fa fa-trash-o"></i></a>
			</td>
		</tr>
		</tbody>
	</table>

	<a href="<?= admin_url($this->ctrl_name.'/add')?>" class="btn btn-primary">הוספה</a>
</form>