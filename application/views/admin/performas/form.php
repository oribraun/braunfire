<?php

?>
<div ng-controller="AdminCtrl">
    <form class="form-horizontal">
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">פרוייקט</label>
            <div class="col-sm-6">
                <select class="form-control" ng-model="entity.project_id" ng-options="a.value as a.text for a in project_options">
                    <option value="" ng-show="!entity.project_id">- בחר -</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">מספר פרפורמה</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.preforma_number" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">שוטף</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.payment_days" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">טקסט מקדמה</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.pre_payment_text" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">מחיר מקדמה</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.pre_payment_price" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">אחוז מקדמה</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.pre_payment_percent" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">טקסט גמר יעוץ מקדים</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.pre_consult_text" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">מחיר גמר יעוץ מקדים</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.pre_consult_price" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">אחוז גמר יעוץ מקדים</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.pre_consult_percent" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">טקסט גמר יעוץ סופי</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.finish_consult_text" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">מחיר גמר יעוץ סופי</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.finish_consult_price" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">אחוז גמר יעוץ סופי</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.finish_consult_percent" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">טקסט גמר פיקוח עליון</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.approved_text" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">מחיר גמר פיקוח עליון</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.approved_price" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">אחוז גמר פיקוח עליון</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.approved_percent" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">טקסט שורה נוספת</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.extra_text" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">מחיר שורה נוספת</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.extra_price" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">אחוז שורה נוספת</label>
            <div class="col-sm-6">
                <input class="form-control" ng-model="entity.extra_percent" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">נשלח</label>
            <div class="col-sm-6">
                <select class="form-control" ng-model="entity.delivered">
                    <option value="0">לא</option>
                    <option value="1">כן</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">אושר</label>
            <div class="col-sm-6">
                <select class="form-control" ng-model="entity.approved">
                    <option value="0">לא</option>
                    <option value="1">כן</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">שולם ללא מע"מ</label>
            <div class="col-sm-6">
                <select class="form-control" ng-model="entity.payed_no_fee">
                    <option value="0">לא</option>
                    <option value="1">כן</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">שולם עם מע"מ</label>
            <div class="col-sm-6">
                <select class="form-control" ng-model="entity.payed_with_fee">
                    <option value="0">לא</option>
                    <option value="1">כן</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">יצאה חשבונית</label>
            <div class="col-sm-6">
                <select class="form-control" ng-model="entity.invoice">
                    <option value="0">לא</option>
                    <option value="1">כן</option>
                </select>
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