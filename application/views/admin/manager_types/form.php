<?php

?>
<div ng-controller="AdminCtrl">
	<form class="form-horizontal">
		<div class="form-group">
			<label for="" class="col-sm-2 control-label">שם</label>
			<div class="col-sm-6">
				<input class="form-control" ng-model="entity.name" type="text"/>
			</div>
		</div>
		<button class="btn btn-primary" ng-click="save()">שמור</button>
	</form>
</div>