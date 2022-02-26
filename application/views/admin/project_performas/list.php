<?php
/*  */
?>
<form ng-controller="AdminCtrl">

    <h1><?= ucwords(str_replace("_"," ",$this->ctrl_name)) ?></h1>
	<div class="row" style="margin-bottom:15px">
		<div class="col-sm-4">
			<input type="text" class="form-control" ng-keyup="search()" ng-model="searching.text" placeholder="חיפוש.."/>
		</div>
	</div>
	<table class="table table-striped table-bordered table-hover table-condensed">
		<thead>
		<tr>
			<th class="hidden-xs">#</th>
			<th>פרוייקט</th>
			<th>פרפורמה</th>
			<th>צריך לשלוח</th>
			<th>נשלח</th>
			<th>משתמש ששלח</th>
			<th>שולם</th>
		</tr>
		</thead>
		<tbody>
		<tr ng-repeat="e in entities | filter:searchText">
			<td class="hidden-xs">{{e.id}}</td>
			<td>{{e.project_name}}</td>
			<td>{{e.text}}</td>
			<td>{{e.need_to_send}}</td>
			<td>{{e.is_delivered}}</td>
			<td>{{e.delivered_user_name}}</td>
			<td>{{e.payed}}</td>
			<td>
				<a href="<?= admin_url($this->ctrl_name.'/edit')?>/{{e.id}}" class="btn btn-sm btn-default" title="edit"><i class="fa fa-pencil"></i></a>
				<a href="" class="btn btn-sm btn-danger" ng-click="delete_user(e,$event)"><i class="fa fa-trash-o"></i></a>
			</td>
		</tr>
		</tbody>
	</table>

	<a href="<?= admin_url($this->ctrl_name.'/add')?>" class="btn btn-primary">הוספה</a>
</form>