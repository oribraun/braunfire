<div ng-controller="PanelCtrl" class="panel-wrapper">
    <div class="row panel-header well">
        <div class="col-sm-2">
            <select class="form-control" ng-model="current_project_id" ng-options="p.value as p.text for p in project_options" ng-change="loadProject()">
                <option value="" ng-show="!entity.project_id">- פרוייקט -</option>
            </select>
        </div>
    </div>
    <div class="row panel-body">
        <div class="loader" ng-show="loading">
            <i class="fa fa-2x fa-fq fa-spin fa-spinner"></i>
        </div>
        <div class="tabs-panel" ng-show="current_project_id">
            <div class="tab" ng-click="setOpenTab('details')" ng-class="{'active':openTab == 'details'}">
                <span class="text">פרטים</span>
            </div>
            <div class="tab" ng-click="setOpenTab('architect')" ng-class="{'active':openTab == 'architect'}">
                <span class="text">ארכיטקט</span>
            </div>
            <div class="tab" ng-click="setOpenTab('company')" ng-class="{'active':openTab == 'company'}">
                <span class="text">חברה</span>
            </div>
        </div>
        <div class="tabs-results">
            <div class="details" ng-show="openTab == 'details' && !loading">
                <h2>פרטי פרוייקט - <strong>{{tabs.details.name}}</strong></h2>
                <hr/>
                <div><strong>כתובת:</strong> {{tabs.details.address}}</div>
                <div><strong>קוד סטטוס פרוייקט:</strong> {{tabs.details.project_status_id}}</div>
                <div><strong>שם סטטוס פרוייקט:</strong> {{tabs.details.project_status_name}}</div>
                <div><strong>סטטוס תשלום:</strong> {{tabs.details.payment_status}}</div>
                <div><strong>הערות:</strong> {{tabs.details.notes}}</div>
                <div><strong>water_specs:</strong> {{tabs.details.water_specs}}</div>
                <div><strong>water_specs_text:</strong> {{tabs.details.water_specs_text}}</div>
                <div><strong>committee_approve:</strong> {{tabs.details.committee_approve}}</div>
                <div><strong>committee_approve_text:</strong> {{tabs.details.committee_approve_text}}</div>
                <div><strong>השתנה:</strong> {{tabs.details.modified}}</div>
                <div><strong>נוצר:</strong> {{tabs.details.created}}</div>
            </div>
            <div class="architect" ng-show="openTab == 'architect' && !loading">
                <h2>פרטי ארכיטקט - <strong>{{tabs.architect.first_name}} {{tabs.architect.last_name}}</strong></h2>
                <hr/>
                <div><strong>אימייל:</strong> {{tabs.architect.email}}</div>
                <div><strong>כתובת:</strong> {{tabs.architect.address}}</div>
                <div><strong>ת"ד:</strong> {{tabs.architect.post_box}}</div>
                <div><strong>מיקוד:</strong> {{tabs.architect.post_code}}</div>
                <div><strong>טלפון:</strong> {{tabs.architect.phone}}</div>
                <div><strong>נייד:</strong> {{tabs.architect.mobile}}</div>
                <div><strong>פקס:</strong> {{tabs.architect.fax}}</div>
                <div><strong>שם מנהל:</strong> {{tabs.architect.manager_name}}</div>
                <div><strong>קימייל מנהל:</strong> {{tabs.architect.manager_email}}</div>
                <div><strong>נייד מנהל:</strong> {{tabs.architect.manager_mobile}}</div>
                <div><strong>השתנה:</strong> {{tabs.architect.modified}}</div>
                <div><strong>נוצר:</strong> {{tabs.architect.created}}</div>
            </div>
            <div class="company" ng-show="openTab == 'company' && !loading">
                <h2>פרטי חברה - <strong>{{tabs.company.first_name}} {{tabs.company.last_name}}</strong></h2>
                <hr/>
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
                <div><strong>נוצר:</strong> {{tabs.company.created}}</div>
            </div>
        </div>
    </div>
</div>