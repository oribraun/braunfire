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
				<input class="form-control" ng-model="entity.email" type="email"/>
			</div>
		</div>
		<? if(!$entity->password) :?>
		<div class="form-group">
			<label for="" class="col-sm-2 control-label">סיסמא</label>
			<div class="col-sm-6">
				<input class="form-control" ng-model="entity.password" type="password"/>
			</div>
		</div>
		<? else: ?>
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">עדכון סיסמא</label>
				<div class="col-sm-6">
					<input ng-model="entity.update_password" ng-true-value="1" ng-false-value="0" type="checkbox"/>
				</div>
			</div>
			<div class="transition" ng-class="{slide_down_open: entity.update_password == 1, slide_down_close : entity.update_password == 0}">
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">סיסמא נוכחית</label>
					<div class="col-sm-6">
						<input class="form-control" ng-model="entity.current_password" type="password"/>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">סיסמא חדשה</label>
					<div class="col-sm-6">
						<input class="form-control" ng-model="entity.new_password" type="password"/>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">אימות סיסמא</label>
					<div class="col-sm-6">
						<input class="form-control" ng-model="entity.confirm_password" type="password"/>
					</div>
				</div>
			</div>
		<? endif; ?>
		<div class="form-group">
			<label for="" class="col-sm-2 control-label">דרגה</label>
			<div class="col-sm-6">
				<select ng-model="entity.level" class="form-control" ng-options="l.value as l.text for l in level_options">
					<option value="" ng-hide="entity.level">-- בחר --</option>
				</select>
			</div>
		</div>
		<button class="btn btn-primary" ng-click="save(<?= $this->input->get("close_on_save") ? 'true' : '' ?>)">שמור</button>
	</form>
</div>