<?php
/* @var $this \MY_Controller */
/* @var $page_data stdClass */
//$bootstrap_url = rel_url('tools/bootstrap/css/bootstrap.min.css');
//$bootstrap_url = rel_url('tools/bootstrap-rtl/css/bootstrap-rtl.min.css');
//$bootstrap_url = rel_url('tools/custom/css/bootstrap-rtl.css');
/**
 * @var Entities\Project $project
 */
$company = $project->getCompany($project->getCompanyId());
?><!DOCTYPE html>
<html ng-app="braun">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <title>פרפורמה</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript">
            var ADMIN_PATH = "<?= admin_url() .'/' ?>";
        </script>

        <script>
            var current_entity = <?= isset($entity) ? json_encode($entity) : json_encode('') ?>;
            var level_options = <?= isset($level_options) ? json_encode($level_options) : json_encode('') ?>;
            var building_type_options = <?= isset($building_type_options) ? json_encode($building_type_options) : json_encode('') ?>;
            var building_status_options = <?= isset($building_status_options) ? json_encode($building_status_options) : json_encode('') ?>;
            var architect_options = <?= isset($architect_options) ? json_encode($architect_options) : json_encode('') ?>;
            var manager_type_options = <?= isset($manager_type_options) ? json_encode($manager_type_options) : json_encode('') ?>;
            var project_manager_options = <?= isset($project_manager_options) ? json_encode($project_manager_options) : json_encode('') ?>;
            var account_manager_options = <?= isset($account_manager_options) ? json_encode($account_manager_options) : json_encode('') ?>;
            var water_specs_options = <?= isset($water_specs_options) ? json_encode($water_specs_options) : json_encode('') ?>;
            var committee_approve_options = <?= isset($committee_approve_options) ? json_encode($committee_approve_options) : json_encode('') ?>;
            var project_status_options = <?= isset($project_status_options) ? json_encode($project_status_options) : json_encode('') ?>;
            var project_options = <?= isset($project_options) ? json_encode($project_options) : json_encode('') ?>;
            var company_options = <?= isset($company_options) ? json_encode($company_options) : json_encode('') ?>;
            var print_shop_link_options = <?= isset($print_shop_link_options) ? json_encode($print_shop_link_options) : json_encode('') ?>;
            var performa_text_options = <?= isset($performa_text_options) ? json_encode($performa_text_options) : json_encode('') ?>;

            var ctrl_name = '<?= isset($this->ctrl_name) ? $this->ctrl_name : '' ?>';
            var current_country = <?= isset($country) ? $country : 0 ?>;
            var current_state = <?= isset($state) ? $state : 0 ?>;
            var current_user = <?= isset($user) ? json_encode($user) : 0 ?>;
            var current_conversation = <?= isset($conversation) ? $conversation : 0 ?>;
        </script>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

        <script type="text/javascript" src="<?= rel_url('resources/tools/angular.min.js') ?>"></script>
        <script type="text/javascript" src="<?= rel_url('resources/tools/angular-strap.min.js') ?>"></script>

        <script src="<?= rel_url('resources/js/app.js') ?>" type="text/javascript"></script>
        <script src="<?= rel_url('resources/js/common.js') ?>" type="text/javascript"></script>
        <script src="<?= rel_url('resources/js/services.js') ?>" type="text/javascript"></script>
        <script src="<?= rel_url('resources/js/controllers/adminCtrl.js') ?>" type="text/javascript"></script>
        <style>
            input, textarea {
                border:none;
                font-family: sans-serif;
                overflow:hidden;
                text-align: center;
            }
            td {
                padding: 2px;
            }
            .btn {
                display: inline-block;
                padding: 6px 12px;
                margin-bottom: 0;
                font-size: 14px;
                font-weight: 400;
                line-height: 1.42857143;
                text-align: center;
                white-space: nowrap;
                vertical-align: middle;
                cursor: pointer;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                background-image: none;
                border: 1px solid transparent;
                border-radius: 4px;
            }
            .btn-primary {
                color: #fff;
                background-color: #428bca;
                border-color: #357ebd;
            }
            .btn-default {
                color: #333;
                background-color: #fff;
                border-color: #ccc;
            }
            .form-group {
                display: inline-block;
                margin: 0 10px;
                text-align: center;
            }
            @media print {
                .remove{
                    display:none;
                }
                table {
                    box-shadow: none !important;
                }
            }
        </style>
    </head>
    <body style="direction: rtl;font-family: sans-serif;font-size:15px;text-align: right;">
    <div ng-controller="AdminCtrl" ng-cloak>
        <table width="100%" style="  width: 640px;margin: 0 auto;box-shadow: 0px 0px 5px #ccc;padding: 10px;">
            <tr>
                <td style="font-style: italic;font-size:12px;text-align: left;padding-left: 15px;" class="created" ng-bind="(formatDate(entity.created) || formatDate()) |  date:'MM/dd/yyyy'"></td>
            </tr>
            <tr><td></td></tr>
            <tr>
                <td style="font-style: italic;font-size:12px;text-align: left;" class="created">ע.מ - 558125001</td>
            </tr>
            <tr>
                <td class="created" style="text-align: center;font-weight: bold">
                    חשבון פרופורמה מצטבר מספר -
                    <input style="width: 15px;" class="form-control" ng-model="entity.preforma_number" type="text"/> -
                     <span><?= $project->getProjectSerial() ?></span>
                    <p>- מקור -</p>
                </td>
            </tr>
            <tr>
                <td>
                    לכבוד,<br/>
                    <?= $company->getFullName() ?><br/>
                    <?= $company->getAddress() ?><br/>
                    תנאי תשלום : שוטף + {{entity.payment_days}}
                </td>
            </tr>
            <tr>
                <td class="created" style="text-align: center;font-weight: bold">
                    <span style="border-bottom: 1px solid #000;">
הנדון: חשבון בגין יעוץ בטיחות ל "<?= $project->getName() ?>"
                    </span>
                </td>
            </tr>
            <tr><td>&nbsp;</td></tr>
            <tr>
                <td>
                    <table width="100%" cellpadding="6" cellspacing="0" border="0" style="border-collapse: collapse;text-align: center">
                        <thead>
                            <tr>
                                <th style="border: 1px solid #ccc">שלב התשלום עפ"י חוזה<br/>התקשרות</th>
                                <th style="border: 1px solid #ccc">סה"כ שכר טרחה שהוסכם<br/>100%</th>
                                <th style="border: 1px solid #ccc">אחוז תשלום</th>
                                <th style="border: 1px solid #ccc">סה"כ לתשלום</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="border: 1px solid #ccc"><textarea name="" ng-model="entity.pre_payment_text" rows="2" style="resize: none"></textarea></td>
                                <td style="border: 1px solid #ccc"><input class="form-control" ng-model="entity.pre_payment_price" type="text"/></td>
                                <td style="border: 1px solid #ccc"><input class="form-control" ng-model="entity.pre_payment_percent" type="text"/></td>
                                <td style="border: 1px solid #ccc">{{price_1 = entity.pre_payment_price * (entity.pre_payment_percent/100)}}</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #ccc"><textarea name="" ng-model="entity.pre_consult_text" rows="2" style="resize: none"></textarea></td>
                                <td style="border: 1px solid #ccc"><input class="form-control" ng-model="entity.pre_consult_price" type="text"/></td>
                                <td style="border: 1px solid #ccc"><input class="form-control" ng-model="entity.pre_consult_percent" type="text"/></td>
                                <td style="border: 1px solid #ccc">{{price_2 = entity.pre_consult_price * (entity.pre_consult_percent/100)}}</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #ccc"><textarea name="" ng-model="entity.finish_consult_text" rows="2" style="resize: none"></textarea></td>
                                <td style="border: 1px solid #ccc"><input class="form-control" ng-model="entity.finish_consult_price" type="text"/></td>
                                <td style="border: 1px solid #ccc"><input class="form-control" ng-model="entity.finish_consult_percent" type="text"/></td>
                                <td style="border: 1px solid #ccc">{{price_3 = entity.finish_consult_price * (entity.finish_consult_percent/100)}}</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #ccc"><textarea name="" ng-model="entity.approved_text" rows="2" style="resize: none"></textarea></td>
                                <td style="border: 1px solid #ccc"><input class="form-control" ng-model="entity.approved_price" type="text"/></td>
                                <td style="border: 1px solid #ccc"><input class="form-control" ng-model="entity.approved_percent" type="text"/></td>
                                <td style="border: 1px solid #ccc">{{price_4 = entity.approved_price * (entity.approved_percent/100)}}</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #ccc"><textarea name="" ng-model="entity.extra_text" rows="2" style="resize: none"></textarea></td>
                                <td style="border: 1px solid #ccc"><input class="form-control" ng-model="entity.extra_price" type="text"/></td>
                                <td style="border: 1px solid #ccc"><input class="form-control" ng-model="entity.extra_percent" type="text"/></td>
                                <td style="border: 1px solid #ccc">{{price_5 = entity.extra_price * (entity.extra_percent/100)}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td style="border: 1px solid #ccc"><strong>סה"כ חשבון</strong></td>
                                <td style="border: 1px solid #ccc">{{(price_1 + price_2 + price_3 + price_4 + price_5)}}</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td style="border: 1px solid #ccc"><strong>סה"כ חשבון</strong></td>
                                <td style="border: 1px solid #ccc">{{(price_1 + price_2 + price_3 + price_4 + price_5)}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td style="border: 1px solid #ccc"><strong>פחות חשבון<br/>קודם ששולם</strong></td>
                                <td style="border: 1px solid #ccc"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td style="border: 1px solid #ccc"><strong>סה"כ לתשלום</strong></td>
                                <td style="border: 1px solid #ccc"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td style="border: 1px solid #ccc"><strong>מע"מ 18%</strong></td>
                                <td style="border: 1px solid #ccc"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td style="border: 1px solid #ccc"><strong>סה"כ לתשלום<br/>כולל מע"מ</strong></td>
                                <td style="border: 1px solid #ccc"></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr><td>&nbsp;</td></tr>
                            <tr style="text-align: right;line-height: 25px;">
                                <td colspan="4">
-                                     ניתן לשלם בצ'ק מזומן בדואר רשום,(את מספר הדואר הרשום יש לשלוח במייל לצורך מעקב)
<br/>
                                    &nbsp;
                                    או העברה בנקאית(לפרטים
                                צרו קשר)</td>
                            </tr>
                            <tr style="text-align: right;">
                                <td colspan="4">לטיפולכם,</td>
                            </tr>
                            <tr style="text-align: left;">
                                <td colspan="4">
                                    <span style="text-align: right;display: inline-block;">
                                    בכבוד רב,
                                    <br/>
                                    צבי וקרן בראון
                                        </span>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </td>
            </tr>
        </table>
        <div class="remove" style="text-align: center">
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
            <div style="text-align:center;margin-top:10px">
                <button class="btn btn-primary" ng-click="save(<?= $this->input->get("close_on_save") ? 'true' : '' ?>)">שמור</button>
                <? /*<button class="btn btn-default" OnClick="print();">הדפס</button>*/ ?>
            </div>
        </div>

    </div>

    <script>
        function print(){
            window.print();
        }
    </script>
    </body>
</html>