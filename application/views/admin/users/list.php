<?php
/*  */
?>
<script>
	var current_user = '';
	var level_options = '';
</script>
<form ng-controller="AdminCtrl">

    <h1>משתמשים</h1>
	<div class="row" style="margin-bottom:15px">
		<div class="col-sm-4">
			<input type="text" class="form-control" ng-keyup="search()" ng-model="searching.text" placeholder="חיפוש.."/>
		</div>
	</div>
	<table class="table table-striped table-bordered table-hover table-condensed">
		<thead>
		<tr>
			<th class="hidden-xs">#</th>
			<th>שם</th>
			<th>אימייל</th>
			<th class="hidden-xs">דרגה</th>
			<th>פעולות</th>
		</tr>
		</thead>
		<tbody>
		<tr ng-repeat="e in entities | filter:searchText | filter:lowerThan('level', <?= Entities\User::LEVEL_SUPER_ADMIN ?>)">
			<td class="hidden-xs">{{e.id}}</td>
			<td>{{e.first_name}} {{e.last_name}}</td>
			<td>{{e.email}}</td>
			<td class="hidden-xs">{{e.level_name}}</td>
			<td>
				<a href="<?= admin_url($this->ctrl_name.'/edit')?>/{{e.id}}" class="btn btn-sm btn-default" title="edit"><i class="fa fa-pencil"></i></a>
				<a href="" class="btn btn-sm btn-danger" ng-click="delete_user(e,$event)"><i class="fa fa-trash-o"></i></a>
			</td>
		</tr>
		</tbody>
	</table>

	<a href="<?= admin_url($this->ctrl_name.'/add')?>" class="btn btn-primary">הוספה</a>
</form>