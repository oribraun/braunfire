<?php

?>
<div ng-controller="AdminCtrl">
    <form class="form-horizontal">
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">מק"ט</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.project_serial" readonly type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">שם המטפל מהמשרד שלנו</label>
            <div class="col-sm-6">
                <select class="form-control" ng-model="entity.working_user_id" ng-options="a.value as a.text for a in user_options">
                    <option value="" ng-show="!entity.working_user_id">- בחר -</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">שם אדריכל אחראי לפרוייקט</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.manager_name" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">שם</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.name" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">כתובת</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.address" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">סטטוס פרוייקט</label>
            <div class="col-sm-6">
                <select class="form-control" ng-model="entity.project_status_id" ng-options="a.value as a.text for a in project_status_options">
                    <option value="" ng-show="!entity.project_status_id">- בחר -</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">תיאור סטטוס</label>
            <div class="col-sm-6">
                <select class="form-control" ng-model="entity.status_description_id" ng-options="a.value as a.text for a in status_description_options">
                    <option value="" ng-show="!entity.status_description_id">- בחר -</option>
                </select>
            </div>
        </div>
        <? /*
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">מצב פרוייקט</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.project_condition" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">סטטוס תשלומים</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.payment_status" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">מצב חוזה</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.contract_status" type="text"/>
            </div>
        </div>*/?>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">תאור הפרוייקט</label>
            <div class="col-sm-6">
                <textarea class="form-control" cols="30" rows="5" ng-model="entity.notes"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">אפיון רשת מים</label>
            <div class="col-sm-6">
                <select class="form-control" ng-model="entity.water_specs" ng-options="a.value as a.text for a in water_specs_options">
                    <option value="" ng-show="!entity.water_specs">- בחר -</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">סכימת מים</label>
            <div class="col-sm-6">
                <select class="form-control" ng-model="entity.water_shield" ng-options="a.value as a.text for a in [{'value':0,'text':'לא התקבל'},{'value':1,'text':'התקבל'}]">
                </select>
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
            <label for="" class="col-sm-2 control-label">מכון העתקות</label>
            <div class="col-sm-6">
                <select class="form-control" ng-model="entity.print_shop_link_id" ng-options="a.value as a.text for a in print_shop_link_options">
                    <option value="" ng-show="!entity.print_shop_link_id">- בחר -</option>
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
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">חברה/יזם</label>
            <div class="col-sm-6">
                <select class="form-control" ng-model="entity.company_id" ng-options="a.value as a.text for a in company_options">
                    <option value="" ng-show="!entity.company_id">- בחר -</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">מנהל פרוייקט</label>
            <div class="col-sm-6">
                <select class="form-control" ng-model="entity.project_manager_id" ng-options="a.value as a.text for a in project_manager_options">
                    <option value="" ng-show="!entity.project_manager_id">- בחר -</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">הערות יועצים לפרוייקט</label>
            <div class="col-sm-6">
                <textarea class="form-control" cols="30" rows="5" ng-model="entity.consultants_notes"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">הערות מנהל לפרוייקט</label>
            <div class="col-sm-6">
                <textarea class="form-control" cols="30" rows="5" ng-model="entity.manager_notes"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">מספר ביקורות שניתנו</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.project_criticism_num" type="text"/>
            </div>
        </div>
        <? /*
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">שם מנהל</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.manager_name" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">אימייל מנהל</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.manager_email" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">טלפון מנהל</label>
            <div class="col-sm-6">
                <input class="form-control" ng-keypress="only_numbers($event)" ng-model="entity.manager_phone" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">נייד מנהל</label>
            <div class="col-sm-6">
                <input class="form-control" ng-keypress="only_numbers($event)" ng-model="entity.manager_mobile" type="text"/>
            </div>
        </div>*/ ?>
        <button class="btn btn-primary" ng-click="save()">שמור</button>
    </form>
</div>
