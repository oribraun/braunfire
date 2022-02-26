<?
/* @var $this \MY_Controller */
?>

<div ng-controller="PanelCtrl" class="panel-wrapper">
    <div class="row panel-header well">
        <div class="col-sm-4">
            <input class="form-control" autofocus placeholder="שם פרוייקט" type="text" typeahead-on-select="loadProject()" typeahead="p as p.text for p in project_options | filter:$viewValue" ng-model="current_project"/>
        </div>
        <div class="col-sm-4">
            <input class="form-control" placeholder="מספר פרוייקט" type="text" typeahead-on-select="loadProjectBySerial()" typeahead="p as p.text for p in project_serial_options | filter:$viewValue" ng-model="current_project_serial"/>
        </div>
        <div class="col-sm-4">
            <a href="<?= admin_url('backup') ?>">גיבוי נתונים</a>
        </div>
        <?/*<div class="col-sm-1 col-xs-2" ng-show="!current_project.value">
            <div style="  height: 34px;padding: 4px 0;" ng-click="newProject()">
                <i class="fa fa-fw fa-2x fa-plus"></i>
            </div>
        </div>*/ ?>
    </div>
    <div class=" panel-body">
        <div class="loader" ng-show="loading">
            <i class="fa fa-2x fa-fq fa-spin fa-spinner"></i>
        </div>
        <div ng-show="tabs.project.created">
            <h2><strong>{{tabs.project.name}}</strong> - {{tabs.project.project_serial}}</h2>
        </div>
        <div class="tabs-panel row" ng-show="(current_project || current_project_serial) && !loading">
            <div class="tab col-lg-1 col-sm-2 col-xs-6" ng-click="setOpenTab('project')" ng-class="{'active':openTab == 'project'}">
                <span class="text">פרטי פרוייקט</span>
            </div>
            <div class="tab col-lg-1 col-sm-2 col-xs-6" ng-click="setOpenTab('company')" ng-class="{'active':openTab == 'company'}">
                <span class="text">חברה/יזם</span>
            </div>
            <div class="tab col-lg-1 col-sm-2 col-xs-6" ng-click="setOpenTab('project_manager')" ng-class="{'active':openTab == 'project_manager'}">
                <span class="text">מנהל פרוייקט</span>
            </div>
            <div class="tab col-lg-1 col-sm-2 col-xs-6" ng-click="setOpenTab('consultants')" ng-class="{'active':openTab == 'consultants'}">
                <span class="text">יועצים</span>
            </div>
            <div class="tab col-lg-1 col-sm-2 col-xs-6" ng-click="setOpenTab('architect')" ng-class="{'active':openTab == 'architect'}">
                <span class="text">אדריכל</span>
            </div>
            <div class="tab col-lg-1 col-sm-2 col-xs-6" ng-click="setOpenTab('buildings')" ng-class="{'active':openTab == 'buildings'}">
                <span class="text">בניינים</span>
            </div>
            <div class="tab col-lg-1 col-sm-2 col-xs-6" ng-show="tabs.project.id" ng-click="setOpenTab('project_performas')" ng-class="{'active':openTab == 'project_performas'}">
                <span class="text">בקשות לתשלום</span>
            </div>
            <div class="tab col-lg-1 col-sm-2 col-xs-6" ng-show="tabs.project.id" ng-click="setOpenTab('project_notes')" ng-class="{'active':openTab == 'project_notes'}">
                <span class="text">עדכון פרוייקט</span>
            </div>
            <div class="tab col-lg-1 col-sm-2 col-xs-6" ng-show="tabs.project.id" ng-click="setOpenTab('project_criticism')" ng-class="{'active':openTab == 'project_criticism'}">
                <span class="text">עדכון ביקורות</span>
            </div>
        </div>
        <? /*
        <div class="row" style="margin-top:15px;">
            <input class="btn btn-primary pull-left" ng-click="saveProject()" type="button" value="שמור"/>
        </div>
 */ ?>
        <div class="tabs-results col-sm-6" ng-show="(current_project || current_project_serial) && !loading">
            <div class="project" ng-show="openTab == 'project' && !loading">
                <h2>פרטי פרוייקט - <strong>{{tabs.project.name}}</strong></h2>
                <hr/>
                <div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label" for="">מספר פרוייקט</label>
                        <div class="col-sm-8">
                            <input class="form-control" ng-model="tabs.project.project_serial" readonly type="text"/>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label" for="">שם הפרוייקט</label>
                        <div class="col-sm-8">
                            <input class="form-control" ng-model="tabs.project.name" type="text"/>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">שם המטפל מהמשרד שלנו
                        <i class="fa fa-1x fa-fw fa-plus" ng-click="openAddWindow('users/add','user')"></i></label>
                    <div class="col-sm-8">
                        <select class="form-control" ng-model="tabs.project.working_user_id" ng-options="a.value as a.text for a in user_options">
                            <option value="" ng-show="!tabs.project.working_user_id">- בחר -</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">כתובת</label>
                    <div class="col-sm-8">
                        <input class="form-control" ng-model="tabs.project.address" type="text"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">סטטוס פרוייקט
                        <i class="fa fa-1x fa-fw fa-plus" ng-click="openAddWindow('project_statuses/add','project_status')"></i></label>
                    <div class="col-sm-8">
                        <select class="form-control" ng-model="tabs.project.project_status_id" ng-options="a.value as a.text for a in project_status_options">
                            <option value="" ng-show="!tabs.project.project_status_id">- בחר -</option>
                        </select>
                    </div>
                </div>
                <? /*
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">מצב פרוייקט</label>
                    <div class="col-sm-8">
                        <input class="form-control" ng-model="tabs.project.project_condition" type="text"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">סטטוס תשלומים</label>
                    <div class="col-sm-8">
                        <input class="form-control" ng-model="tabs.project.payment_status" type="text"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">מצב חוזה</label>
                    <div class="col-sm-8">
                        <input class="form-control" ng-model="tabs.project.contract_status" type="text"/>
                    </div>
                </div>*/?>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">תאור הפרוייקט</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" cols="30" rows="5" ng-model="tabs.project.notes"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">אפיון רשת מים</label>
                    <div class="col-sm-8">
                        <select class="form-control" ng-model="tabs.project.water_specs" ng-options="a.value as a.text for a in water_specs_options">
                            <option value="" ng-show="!tabs.project.water_specs">- ללא אפיון -</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">סכימת מים</label>
                    <div class="col-sm-8">
                        <select class="form-control" ng-model="tabs.project.water_shield" ng-options="a.value as a.text for a in [{'value':0,'text':'לא התקבל'},{'value':1,'text':'התקבל'}]">
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">החלטות ועדה</label>
                    <div class="col-sm-8">
                        <select class="form-control" ng-model="tabs.project.committee_approve" ng-options="a.value as a.text for a in committee_approve_options">
                            <option value="" ng-show="!tabs.project.committee_approve">- ללא החלטת ועדה -</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">מכון העתקות
                        <i class="fa fa-1x fa-fw fa-plus" ng-click="openAddWindow('print_shop_links/add','print_shop_link')"></i></label>
                    <div class="col-sm-8">
                        <select class="form-control" ng-model="tabs.project.print_shop_link_id" ng-options="a.value as a.text for a in print_shop_link_options">
                            <option value="" ng-show="!tabs.project.print_shop_link_id">- ללא מכון העתקות -</option>
                        </select>
                        <? /*
                        <div class="text-left" ng-show="tabs.project.print_shop_link_id">
                            <a target="_blank" href="{{printShopLinkText(tabs.project.print_shop_link_id)}}">{{printShopLinkText(tabs.project.print_shop_link_id)}}</a>
                        </div> */ ?>
                    </div>
                </div>
                <? /*<div><strong>כתובת:</strong>{{tabs.project.address}}</div>
                <div><strong>קוד סטטוס פרוייקט:</strong> {{tabs.project.project_status_id}}</div>
                <div><strong>שם סטטוס פרוייקט:</strong> {{tabs.project.project_status_name}}</div>
                <div><strong>סטטוס תשלום:</strong> {{tabs.project.payment_status}}</div>
                <div><strong>הערות:</strong> {{tabs.project.notes}}</div>
                <div><strong>water_specs:</strong> {{tabs.project.water_specs}}</div>
                <div><strong>water_specs_text:</strong> {{tabs.project.water_specs_text}}</div>
                <div><strong>committee_approve:</strong> {{tabs.project.committee_approve}}</div>
                <div><strong>committee_approve_text:</strong> {{tabs.project.committee_approve_text}}</div>*/ ?>
                <div class="form-group row" ng-show="tabs.project.modified">
                    <div class="col-sm-4"><strong>השתנה:</strong></div>
                    <div class="col-sm-8">{{tabs.project.modified}}</div>
                </div>
                <div class="form-group row" ng-show="tabs.project.created">
                    <div class="col-sm-4"><strong>נוצר:</strong></div>
                    <div class="col-sm-8">{{tabs.project.created}}</div>
                </div>
            </div>
            <div class="architect" ng-show="openTab == 'architect' && !loading">
                <h2>פרטי אדריכל - <strong>{{tabs.architect.first_name}} {{tabs.architect.last_name}}</strong></h2>
                <hr/>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">בחר מאדריכל קיים</label>
                    <div class="col-sm-8">
                        <select class="form-control" ng-change="loadArchitect()" ng-model="tabs.project.architect_id" ng-options="a.value as a.text for a in architect_options">
                            <option value="">- אדריכל חדש -</option>
                        </select>
                    </div>
                </div>
                <div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label" for="">שם פרטי</label>
                        <div class="col-sm-8">
                            <input class="form-control" ng-model="tabs.architect.first_name" type="text"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label" for="">שם משפחה</label>
                        <div class="col-sm-8">
                            <input class="form-control" ng-model="tabs.architect.last_name" type="text"/>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">אימייל</label>
                    <div class="col-sm-8">
                        <input class="form-control" ng-model="tabs.architect.email" type="text"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">כתובת</label>
                    <div class="col-sm-8">
                        <input class="form-control" ng-model="tabs.architect.address" type="text"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">ת"ד</label>
                    <div class="col-sm-8">
                        <input class="form-control" ng-model="tabs.architect.post_box" type="text"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">מיקוד</label>
                    <div class="col-sm-8">
                        <input class="form-control" ng-model="tabs.architect.post_code" type="text"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">טלפון</label>
                    <div class="col-sm-8">
                        <input class="form-control" ng-model="tabs.architect.phone" type="text"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">נייד</label>
                    <div class="col-sm-8">
                        <input class="form-control" ng-model="tabs.architect.mobile" type="text"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">פקס</label>
                    <div class="col-sm-8">
                        <input class="form-control" ng-model="tabs.architect.fax" type="text"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">שם אחראי לפרוייקט</label>
                    <div class="col-sm-8">
                        <input class="form-control" ng-model="tabs.project.manager_name" type="text"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">אימייל אחראי לפרוייקט</label>
                    <div class="col-sm-8">
                        <input class="form-control" ng-model="tabs.project.manager_email" type="text"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">נייד אחראי לפרוייקט</label>
                    <div class="col-sm-8">
                        <input class="form-control" ng-model="tabs.project.manager_mobile" type="text"/>
                    </div>
                </div>
<!--                <div class="form-group row">-->
<!--                    <label class="col-sm-4 control-label" for="">שם אחראי משוייך לאדריכל</label>-->
<!--                    <div class="col-sm-8">-->
<!--                        <input class="form-control" ng-model="tabs.architect.manager_name" type="text"/>-->
<!--                    </div>-->
<!--                </div>-->
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">שם אחראי לאדריכל</label>
                    <div class="col-sm-8">
                        <input class="form-control" ng-model="tabs.architect.manager_name" type="text"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">אימייל אחראי לאדריכל</label>
                    <div class="col-sm-8">
                        <input class="form-control" ng-model="tabs.architect.manager_email" type="text"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">נייד אחראי לאדריכל</label>
                    <div class="col-sm-8">
                        <input class="form-control" ng-model="tabs.architect.manager_mobile" type="text"/>
                    </div>
                </div>
                <div class="form-group row" ng-show="tabs.architect.modified">
                    <div class="col-sm-4"><strong>השתנה:</strong></div>
                    <div class="col-sm-8">{{tabs.architect.modified}}</div>
                </div>
                <div class="form-group row" ng-show="tabs.architect.created">
                    <div class="col-sm-4"><strong>נוצר:</strong></div>
                    <div class="col-sm-8">{{tabs.architect.created}}</div>
                </div>
                <? /*<div><strong>אימייל:</strong> {{tabs.architect.email}}</div>
                <div><strong>כתובת:</strong> {{tabs.architect.address}}</div>
                <div><strong>ת"ד:</strong> {{tabs.architect.post_box}}</div>
                <div><strong>מיקוד:</strong> {{tabs.architect.post_code}}</div>
                <div><strong>טלפון:</strong> {{tabs.architect.phone}}</div>
                <div><strong>נייד:</strong> {{tabs.architect.mobile}}</div>
                <div><strong>פקס:</strong> {{tabs.architect.fax}}</div>
                <div><strong>שם מנהל:</strong> {{tabs.architect.manager_name}}</div>
                <div><strong>אימייל מנהל:</strong> {{tabs.architect.manager_email}}</div>
                <div><strong>נייד מנהל:</strong> {{tabs.architect.manager_mobile}}</div>
                <div><strong>השתנה:</strong> {{tabs.architect.modified}}</div>
                <div><strong>נוצר:</strong> {{tabs.architect.created}}</div>*/ ?>
            </div>
            <div class="company" ng-show="openTab == 'company' && !loading">
                <h2>פרטי חברה - <strong>{{tabs.company.first_name}} {{tabs.company.last_name}}</strong></h2>
                <hr/>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">בחר מחברה קיימת</label>
                    <div class="col-sm-8">
                        <select class="form-control" ng-change="loadCompany()" ng-model="tabs.project.company_id" ng-options="c.value as c.text for c in company_options">
                            <option value="">- חברה חדשה -</option>
                        </select>
                    </div>
                </div>
                <div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label" for="">שם חברה/פרטי</label>
                        <div class="col-sm-8">
                            <input class="form-control" ng-model="tabs.company.first_name" type="text"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label" for="">שם משפחה/אחראי</label>
                        <div class="col-sm-8">
                            <input class="form-control" ng-model="tabs.company.last_name" type="text"/>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">כתובת</label>
                    <div class="col-sm-8">
                        <input class="form-control" ng-model="tabs.company.address" type="text"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">ת.ז/ח"פ</label>
                    <div class="col-sm-8">
                        <input class="form-control" ng-model="tabs.company.social_id" type="text"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">ת"ד</label>
                    <div class="col-sm-8">
                        <input class="form-control" ng-model="tabs.company.post_box" type="text"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">מיקוד</label>
                    <div class="col-sm-8">
                        <input class="form-control" ng-model="tabs.company.post_code" type="text"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">טלפון</label>
                    <div class="col-sm-8">
                        <input class="form-control" ng-model="tabs.company.phone" type="text"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">נייד</label>
                    <div class="col-sm-8">
                        <input class="form-control" ng-model="tabs.company.mobile" type="text"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">פקס</label>
                    <div class="col-sm-8">
                        <input class="form-control" ng-model="tabs.company.fax" type="text"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">אימייל</label>
                    <div class="col-sm-8">
                        <input class="form-control" ng-model="tabs.company.email" type="text"/>
                    </div>
                </div>
                <? /*<div class="form-group row">
                    <label class="col-sm-4 control-label" for="">מנהל פרוייקט</label>
                    <div class="col-sm-8">
                        <select class="form-control" ng-model="tabs.company.project_manager_id" ng-options="a.value as a.text for a in project_manager_options">
                            <option value="">- בחר -</option>
                        </select>
                    </div>
                </div> */ ?>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">מנהל חשבונות
                        <i class="fa fa-1x fa-fw fa-plus" ng-click="openAddWindow('managers/add','account_manager')"></i></label>
                    <div class="col-sm-4">
                        <select class="form-control" ng-model="tabs.company.account_manager_id" ng-options="a.value as a.text for a in account_manager_options">
                            <option value="">- ללא מנהל -</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <div>{{findAccountManager(tabs.company.account_manager_id).email}}</div>
                        <div>{{findAccountManager(tabs.company.account_manager_id).phone}}</div>
                        <div>{{findAccountManager(tabs.company.account_manager_id).mobile}}</div>
                    </div>
                </div>
                <div class="form-group row" ng-show="tabs.company.modified">
                    <div class="col-sm-4"><strong>השתנה:</strong></div>
                    <div class="col-sm-8">{{tabs.company.modified}}</div>
                </div>
                <div class="form-group row" ng-show="tabs.company.created">
                    <div class="col-sm-4"><strong>נוצר:</strong></div>
                    <div class="col-sm-8">{{tabs.company.created}}</div>
                </div>
                <? /*
                <div><strong>אימייל:</strong> {{tabs.company.email}}</div>
                <div><strong>כתובת:</strong> {{tabs.company.address}}</div>
                <div><strong>ת.ז:</strong> {{tabs.company.social_id}}</div>
                <div><strong>ת"ד:</strong> {{tabs.company.post_box}}</div>
                <div><strong>מיקוד:</strong> {{tabs.company.post_code}}</div>
                <div><strong>טלפון:</strong> {{tabs.company.phone}}</div>
                <div><strong>נייד:</strong> {{tabs.company.mobile}}</div>
                <div><strong>פקס:</strong> {{tabs.company.fax}}</div>
                <div><strong>קוד מנהל פרוייקט:</strong> {{tabs.company.project_manager_id}}</div>
                <div><strong>שם מנהל פרוייקט:</strong> {{tabs.company.project_manager_name}}</div>
                <div><strong>קוד מנהל חשבונות:</strong> {{tabs.company.account_manager_id}}</div>
                <div><strong>שם מנהל חשבונות:</strong> {{tabs.company.account_manager_name}}</div>
                <div><strong>השתנה:</strong> {{tabs.company.modified}}</div>
                <div><strong>נוצר:</strong> {{tabs.company.created}}</div>*/ ?>
            </div>
            <? /*
            <div class="buildings" ng-show="openTab == 'payment_level' && !loading">
                <div class="building-tabs">
                    <div><a href="" ng-click="setOpenTab('payment_level')">רענן</a></div>
                    <ul>
                        <li class="tab" ng-repeat="pl in tabs.payment_levels track by $index" ng-click="setCurrentPaymentLevel($index); loadProjectPaymentLevelPerformas(pl.id)" ng-class="{'active': currentPaymentLevel == $index}">
                            <span class="edit" ng-click="editPaymentLevel($index)">
                                <i class="fa fa-fw fa-pencil"></i>
                            </span>
                            {{$index+1}}
                        </li>
                        <li class="plus" data-toggle="modal" data-target="#open-payment-level">
                            <i class="fa fw fa-plus"></i> הוסף שלב תשלום
                        </li>
                        <ul ng-show="tabs.payment_levels.length" style="padding:8px 0">
                            <li class="tab" ng-repeat="p in tabs.performas track by $index" ng-click="setCurrentPerforma($index)" ng-class="{'active': currentPerforma == $index}">
                                <span class="edit" ng-click="editPerforma(tabs.payment_levels[currentPaymentLevel].id,p.id)">
                                    <i class="fa fa-fw fa-pencil"></i>
                                </span>
                                <span ng-click="viewPreforma(p.id,tabs.payment_levels[currentPaymentLevel].id)">{{$index+1}}</span>
                            </li>
                            <li class="plus" ng-click="addPerforma(tabs.payment_levels[currentPaymentLevel].id)">
                                <i class="fa fw fa-plus"></i> הוסף פרפורמה
                            </li>
                        </ul>
                    </ul>
                </div>
            </div>
            */ ?>
            <div class="project_manager" ng-show="openTab == 'project_manager' && !loading">
                <h2>פרטי מנהל - <strong>{{tabs.project_manager.first_name}} {{tabs.project_manager.last_name}}</strong></h2>
                <hr/>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">בחר מנהל קיים</label>
                    <div class="col-sm-8">
                        <select class="form-control" ng-change="loadManager()" ng-model="tabs.project.project_manager_id" ng-options="m.value as m.text for m in project_manager_options">
                            <option value="">- מנהל חדש -</option>
                        </select>
                    </div>
                </div>
                <div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label" for="">שם פרטי/חברה</label>
                        <div class="col-sm-8">
                            <input class="form-control" ng-model="tabs.project_manager.first_name" type="text"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label" for="">שם משפחה/אחראי</label>
                        <div class="col-sm-8">
                            <input class="form-control" ng-model="tabs.project_manager.last_name" type="text"/>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">אימייל</label>
                    <div class="col-sm-8">
                        <input class="form-control" ng-model="tabs.project_manager.email" type="text"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">כתובת</label>
                    <div class="col-sm-8">
                        <input class="form-control" ng-model="tabs.project_manager.address" type="text"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">טלפון</label>
                    <div class="col-sm-8">
                        <input class="form-control" ng-model="tabs.project_manager.phone" type="text"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">נייד</label>
                    <div class="col-sm-8">
                        <input class="form-control" ng-model="tabs.project_manager.mobile" type="text"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">מיקוד</label>
                    <div class="col-sm-8">
                        <input class="form-control" ng-model="tabs.project_manager.post_code" type="text"/>
                    </div>
                </div>
                <div class="form-group row" ng-show="tabs.project_manager.modified">
                    <div class="col-sm-4"><strong>השתנה:</strong></div>
                    <div class="col-sm-8">{{tabs.company.modified}}</div>
                </div>
                <div class="form-group row" ng-show="tabs.project_manager.created">
                    <div class="col-sm-4"><strong>נוצר:</strong></div>
                    <div class="col-sm-8">{{tabs.company.created}}</div>
                </div>
                <? /*
                <div><strong>אימייל:</strong> {{tabs.company.email}}</div>
                <div><strong>כתובת:</strong> {{tabs.company.address}}</div>
                <div><strong>ת.ז:</strong> {{tabs.company.social_id}}</div>
                <div><strong>ת"ד:</strong> {{tabs.company.post_box}}</div>
                <div><strong>מיקוד:</strong> {{tabs.company.post_code}}</div>
                <div><strong>טלפון:</strong> {{tabs.company.phone}}</div>
                <div><strong>נייד:</strong> {{tabs.company.mobile}}</div>
                <div><strong>פקס:</strong> {{tabs.company.fax}}</div>
                <div><strong>קוד מנהל פרוייקט:</strong> {{tabs.company.project_manager_id}}</div>
                <div><strong>שם מנהל פרוייקט:</strong> {{tabs.company.project_manager_name}}</div>
                <div><strong>קוד מנהל חשבונות:</strong> {{tabs.company.account_manager_id}}</div>
                <div><strong>שם מנהל חשבונות:</strong> {{tabs.company.account_manager_name}}</div>
                <div><strong>השתנה:</strong> {{tabs.company.modified}}</div>
                <div><strong>נוצר:</strong> {{tabs.company.created}}</div>*/ ?>
            </div>
            <div class="consultants" ng-show="openTab == 'consultants' && !loading">
                <label class="control-label" for="">יועצים
                    <i class="fa fa-1x fa-fw fa-plus" ng-click="openAddWindow('consultants/add','consultant')"></i>
                </label>
                <div class="form-group row" ng-repeat="c in consultant_type_options">
                    <div class="col-sm-3" style="line-height:34px;">
                        {{c.text}}
                    </div>
                    <div class="col-sm-3 col-xs-7">
                        <select class="form-control" ng-model="tabs.consultants[$index].id" ng-options="a.value as a.text for a in consultant_options|filter:{consultant_type_id:c.value}">
                            <option value="" ng-show="!tabs.consultants[$index].id">- בחר -</option>
                        </select>
                    </div>
                    <div class="col-sm-4 col-xs-3">
                        <div style="">{{tabs.consultants[$index].email}}</div>
                        <div style="">{{tabs.consultants[$index].mobile}}</div>
                        <div style="">{{tabs.consultants[$index].phone}}</div>
                    </div>
                    <div class="col-sm-2 col-xs-2">
                        <div class="remove" style="height: 34px;line-height: 34px;">
                            <a href=""><i class="fa fa-fw fa-trash-o" ng-click="removeProjectConsultant($index)"></i></a>
                        </div>
                    </div>
                </div>
                <? /*
                <div class="plus">
                    <a href="" ng-click="addProjectConsultant()">הוסף יועץ</a>
                </div> */ ?>
                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="">הערות יועצים לפרוייקט</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" cols="30" rows="5" ng-model="tabs.project.consultants_notes"></textarea>
                    </div>
                </div>
            </div>
            <div class="buildings" ng-show="openTab == 'buildings' && !loading">
                <div class="building-tabs">
                    <ul>
                        <li class="tab" ng-repeat="b in tabs.buildings track by $index" ng-click="setCurrentBuilding($index)" ng-class="{'active': currentBuilding == $index}">
                            {{b.building_name}}
                            <span class="remove" ng-if="b.added" ng-click="removeBuilding($index)">
                                <i class="fa fw fa-minus"></i>
                            </span>
                        </li>
                        <li class="plus" ng-click="addBuilding()">
                            <i class="fa fw fa-plus"></i> הוסף בניין
                        </li>
                    </ul>
                    <div class="building-details" ng-repeat="b in tabs.buildings track by $index" ng-show="$index == currentBuilding">
                        <h2>פרטי בניין - <strong>{{b.building_name}}</strong></h2>
                        <hr/>
                        <div class="form-group row">
                            <label class="col-sm-4 control-label" for="">שם בניין</label>
                            <div class="col-sm-8">
                                <input class="form-control" ng-model="b.building_name" type="text"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 control-label" for="">מספר בניין</label>
                            <div class="col-sm-8">
                                <input class="form-control" readonly ng-model="b.building_num" type="text"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 control-label" for="">גוש</label>
                            <div class="col-sm-8">
                                <input class="form-control" ng-model="b.building_block" type="text"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 control-label" for="">חלקה</label>
                            <div class="col-sm-8">
                                <input class="form-control" ng-model="b.building_lot" type="text"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 control-label" for="">מגרש</label>
                            <div class="col-sm-8">
                                <input class="form-control" ng-model="b.building_ground" type="text"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 control-label" for="">מס' תיק בניין</label>
                            <div class="col-sm-8">
                                <input class="form-control" ng-model="b.muni_num" type="text"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 control-label" for="">מס' תיק כיבוי</label>
                            <div class="col-sm-8">
                                <input class="form-control" ng-model="b.fire_num" type="text"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 control-label" for="">מס' החלטת ועדה</label>
                            <div class="col-sm-8">
                                <input class="form-control" ng-model="b.committee_approve_num" type="text"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 control-label" for="">החלטת ועדה</label>
                            <div class="col-sm-8">
                                <select class="form-control" ng-model="b.committee_approve" ng-options="c.value as c.text for c in committee_approve_options">
                                    <option value="">- ללא -</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 control-label" for="">אדריכל</label>
                            <div class="col-sm-8">
                                <select class="form-control" ng-model="b.architect_id" ng-options="a.value as a.text for a in architect_options">
                                    <option value="">- אדריכל ראשי -</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 control-label" for="">סטטוס בניין
                                <i class="fa fa-1x fa-fw fa-plus" ng-click="openAddWindow('building_statuses/add','building_status')"></i></label>
                            <div class="col-sm-8">
                                <select class="form-control" ng-model="b.building_status_id" ng-options="a.value as a.text for a in building_status_options">
                                    <option value="">- ללא סטטוס -</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 control-label" for="">סוג בניין
                                <i class="fa fa-1x fa-fw fa-plus" ng-click="openAddWindow('building_types/add','building_type')"></i></label>
                            <div class="col-sm-8">
                                <select class="form-control" ng-model="b.building_type_id" ng-options="a.value as a.text for a in building_type_options">
                                    <option value="">- ללא סוג -</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row" ng-show="b.modified">
                            <div class="col-sm-4"><strong>השתנה:</strong></div>
                            <div class="col-sm-8">{{b.modified}}</div>
                        </div>
                        <div class="form-group row" ng-show="b.created">
                            <div class="col-sm-4"><strong>נוצר:</strong></div>
                            <div class="col-sm-8">{{b.created}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="project_updates" ng-show="openTab == 'project_updates' && !loading">
                מה אתם צריכים פה לא הבנתי!!!
            </div>
            <div class="project_notes" ng-show="openTab == 'project_notes'">
                <div class="project_notes-list">
                    <? if($this->user->isOwnerAdmin()):?>
                        <div style="font-size:18px;padding:10px 5px;color:red">
                            <p><strong style="color:#000">נא לשים לב!!!</strong>ניתן לערוך הערות, לאחר עריכה לא יתאפשר שיחזור!</p>
                            <p>למחיקה השאר הערה ריקה בעת השמירה.</p>
                        </div>
                    <? endif; ?>
                    <ul class="list-unstyled">
                        <li class="note" ng-repeat="p in tabs.project_notes" style="margin:3px 0;">
                            <div style="direction: ltr;">{{p.created}}</div>
                            <textarea name="" ng-readonly="<?= !$this->user->isOwnerAdmin() ? 'p.created' : '' ?>" class="form-control" ng-model="p.note" id="" rows="3"></textarea>
                            <span class="remove" ng-if="p.added" ng-click="removeProjectNote($index)">
                                <i class="fa fw fa-minus"></i>
                            </span>
                        </li>
                        <li class="plus" ng-click="addProjectNote()">
                            <i class="fa fw fa-plus"></i>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="project_criticism" ng-show="openTab == 'project_criticism'">
                <div class="project_notes-list">
                    <? if($this->user->isOwnerAdmin()):?>
                        <div style="font-size:18px;padding:10px 5px;color:red">
                            <p><strong style="color:#000">נא לשים לב!!!</strong>ניתן לערוך ביקורות, לאחר עריכה לא יתאפשר שיחזור!</p>
                            <p>למחיקה השאר ביקורת ריקה בעת השמירה.</p>
                        </div>
                    <? endif; ?>
                    <ul class="list-unstyled">
                        <li class="note" ng-repeat="p in tabs.project_criticism" style="margin:3px 0;">
                            <div style="direction: ltr;">{{p.created}}</div>
                            <textarea name="" ng-readonly="<?= !$this->user->isOwnerAdmin() ? 'p.created' : '' ?>" class="form-control" ng-model="p.note" id="" rows="3"></textarea>
                            <span class="remove" ng-if="p.added" ng-click="removeProjectCriticism($index)">
                                <i class="fa fw fa-minus"></i>
                            </span>
                        </li>
                        <li class="plus" ng-click="addProjectCriticism()">
                            <i class="fa fw fa-plus"></i>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="project_performas" ng-show="openTab == 'project_performas'">
                <div class="project_notes-list">
                    <ul class="list-unstyled">
                        <li class="note" ng-repeat="p in tabs.project_performas" style="margin:3px 0;">
                            <textarea name="" class="form-control" ng-model="p.text" id="" rows="2"></textarea>
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="remove">
                                        <a href=""  ng-click="removeProjectPerforma($index)"><i class="fa fw fa-trash-o"></i></a>
                                    </div>
                                </div>
                                <div class="col-sm-2 col-lg-2">
                                    <label for="">
                                        <input type="checkbox" disabled name="" ng-true-value="1" ng-false-value="0" ng-model="p.need_to_send" id="" />
צריך לשלוח
                                    </label>
                                </div>

                                <div class="col-sm-2 col-lg-2">
                                    <label for="">
                                        <input type="checkbox" disabled name="" ng-model="p.is_delivered" ng-true-value="1" ng-false-value="0" id="" />
                                        נשלח
                                    </label>
                                </div>
                                <div class="col-sm-2 col-lg-2">
                                    <label for="">
                                        <input type="checkbox" disabled name="" ng-model="p.payed" ng-true-value="1" ng-false-value="0" id="" />
שולם
                                    </label>
                                </div>
                                <div class="col-sm-4">
                                    <div style="direction: ltr;">{{p.created}}</div>
                                </div>
                            </div>
                        </li>
                        <li class="plus" ng-click="addProjectPerforma()">
                            <i class="fa fw fa-plus"></i>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="form-group row">
                <input class="btn btn-primary" ng-click="saveProject()" type="button" value="שמור"/>
            </div>
        </div>
    </div>
    <div class="modal fade" id="open-payment-level" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-register">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="header">
                        שלב תשלום
                    </div>
                    <div class="body">
                        <div class="section">
                            <div class="inputs-wrapper">
                                <div class="row form-group">
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" ng-model="payment_level.price" placeholder="סכום"/>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" ng-model="payment_level.total_buildings" placeholder="כמות בניינים"/>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" ng-model="payment_level.lot" placeholder="מגרש"/>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-12">
                                        <textarea class="form-control" ng-model="payment_level.notes" name="" id="" rows="5"></textarea>
                                    </div>
                                </div>

                                <div class="text-left">
                                    <button class="btn btn-primary" ng-click="savePaymentLevel()">שמור</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div id="reminder" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h1 class="modal-title text-center">תזכורת!!!</h1>
                </div>
                <div class="modal-body text-center">
                    <h2>אנא בצעו גיבוי</h2>
                    <button class="btn btn-primary" onclick="location.href = '<?= admin_url('backup') ?>'">לגיבוי לחץ כאן</button>
                </div>
                <div class="modal-footer">
                    <img src="<?= base_url('resources/images/braun-fire-logo.jpg') ?>" style="max-height: 34px;" alt="">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>
