<?php
/**
 * Created by PhpStorm.
 * User: private
 * Date: 20/06/2015
 * Time: 15:39
 */

class Panel extends Admin_Controller {

    public function __construct() {
        parent::__construct("panel");
    }

    public function index(){
        $data = [];
        $data["project_options"] = $this->project_model->get_options();
        $data["project_serial_options"] = $this->project_model->get_serial_options();
        $data['project_status_options'] = $this->project_status_model->get_options();
        $data['status_description_options'] = $this->status_description_model->get_options();
        $data['architect_options'] = $this->architect_model->get_options();
        $data['company_options'] = $this->company_model->get_options();
        $data['water_specs_options'] = $this->project_model->get_water_specs_options();
        $data['committee_approve_options'] = $this->project_model->get_committee_approve_options();
        $data['project_manager_options'] = $this->manager_model->get_options(8);
        $data['account_manager_options'] = $this->manager_model->get_options(5);
        $data['foreman_manager_options'] = $this->manager_model->get_options(9);
        $data['manager_type_options'] = $this->manager_type_model->get_options();
        $data['building_type_options'] = $this->building_type_model->get_options();
        $data['building_status_options'] = $this->building_status_model->get_options();
        $data['print_shop_link_options'] = $this->print_shop_link_model->get_options();
        $data['consultant_options'] = $this->consultant_model->get_options();
        $data['user_options'] = $this->user_model->get_options();
        $data['consultant_type_options'] = $this->consultant_type_model->get_options();
        $this->layout->set_template("panel");
        $this->layout->view("admin/panel", $data);
    }

    public function ajax_load_project(){
        $project_id = intval($this->input->post("project_id"));
        if(!$project = $this->project_model->get_full_project($project_id)) {
            $this->ajax->json_error("פרוייקט לא נמצא במערכת");
        }
        $data = [];
        $data['project'] = $project;
        $data['architect'] = $this->architect_model->get(["id"=>$project->getArchitectId()]);
        $data['company'] = $this->company_model->get_full_company($project->getCompanyId());
        $data['project_manager'] = $this->manager_model->get($project->getProjectManagerId());
        $data['project_notes'] = $this->project_model->project_get_notes($project);
        $data['project_criticism'] = $this->project_model->project_get_criticism($project);
        $data['consultants'] = $this->consultant_model->get_all_project_consultant_fixed($project_id);
        $data['foreman'] = $this->manager_model->get_all_for_project_foreman($project_id);
        $data['account_managers'] = $this->manager_model->get_all(["manager_type_id"=>5]);
        $data['project_performas'] = $this->project_performa_model->get_all(['project_id'=>$project_id]);
        $buildings = $this->building_model->get_all(["project_id"=>$project->getId()],(object)['column'=>'building_num','order'=>'asc']);
        /** @var \Entities\Building $b */
        foreach($buildings as $b) {
            $b->setArchitectId(intval($b->getArchitectId()));
            $b->setCommitteeApprove(intval($b->getCommitteeApprove()));
            $b->setBuildingStatusId(intval($b->getBuildingStatusId()));
            $b->setBuildingTypeId(intval($b->getBuildingTypeId()));
        }
        $data['buildings'] = $buildings;
        $this->ajax->json_response($data);
    }

    public function ajax_load_project_by_serial(){
        $project_serial = intval($this->input->post("project_serial"));
        if(!$project = $this->project_model->get(["project_serial" =>$project_serial])) {
            $this->ajax->json_error("פרוייקט לא נמצא במערכת");
        }
        $data = [];
        $data['project'] = $project;
        $data['architect'] = $this->architect_model->get(["id"=>$project->getArchitectId()]);
        $data['company'] = $this->company_model->get_full_company($project->getCompanyId());
        $data['project_manager'] = $this->manager_model->get($project->getProjectManagerId());
        $data['project_notes'] = $this->project_model->project_get_notes($project);
        $data['project_criticism'] = $this->project_model->project_get_criticism($project);
        $data['consultants'] = $this->consultant_model->get_all_project_consultant_fixed($project->getId());
        $data['foreman'] = $this->manager_model->get_all_for_project_foreman($project->getId());
        $data['account_managers'] = $this->manager_model->get_all(["manager_type_id"=>5]);
        $data['project_performas'] = $this->project_performa_model->get_all(['project_id'=>$project->getId()]);
        $buildings = $this->building_model->get_all(["project_id"=>$project->getId()],(object)['column'=>'building_num','order'=>'asc']);
        /** @var \Entities\Building $b */
        foreach($buildings as $b) {
            $b->setArchitectId(intval($b->getArchitectId()));
            $b->setCommitteeApprove(intval($b->getCommitteeApprove()));
            $b->setBuildingStatusId(intval($b->getBuildingStatusId()));
            $b->setBuildingTypeId(intval($b->getBuildingTypeId()));
            $b->setBuildingNum(intval($b->getBuildingNum()));
        }
        $data['buildings'] = $buildings;
        $this->ajax->json_response($data);
    }

    public function ajax_load_tab(){
        $project_id = intval($this->input->post("project_id"));
        $tab = strval($this->input->post("tab"));

        if(!$project = $this->project_model->get($project_id)) {
            $this->ajax->json_error("פרוייקט לא נמצא");
        }
        $entity = [];
        if($tab == 'architect') {
            $entity = $this->architect_model->get(["id"=>$project->getArchitectId()]);
        }
        if($tab == 'company') {
//            $company = $this->company_model->get(["id"=>$project->getCompanyId()]);
            $entity = $this->company_model->get_full_company($project->getCompanyId());
        }

        $this->ajax->json_response([$tab=>$entity]);
    }

    public function ajax_load_architect(){
        $architect_id = intval($this->input->post("architect_id"));
        if(!$architect = $this->architect_model->get($architect_id)) {
            $this->ajax->json_error("ארכיטקט לא נמצא במערכת");
        }
        $data = [];
        $data['architect'] = $architect;
        $this->ajax->json_response($data);
    }

    public function ajax_load_company(){
        $company_id = intval($this->input->post("company_id"));
        if(!$company = $this->company_model->get_full_company($company_id)) {
            $this->ajax->json_error("חברה לא נמצאה במערכת");
        }
        $data = [];
        $data['company'] = $company;
        $this->ajax->json_response($data);
    }

    public function ajax_load_project_manager(){
        $project_manager_id = intval($this->input->post("project_manager_id"));
        if(!$project_manager = $this->manager_model->get($project_manager_id)) {
            $this->ajax->json_error("מנהל לא נמצא במערכת");
        }
        $data = [];
        $data['project_manager'] = $project_manager;
        $this->ajax->json_response($data);
    }

    public function ajax_load_project_buildings(){
        $project_id = intval($this->input->post("project_id"));
        if(!$buildings = $this->building_model->get_all(["project_id"=>$project_id],(object)['column'=>'building_num','order'=>'asc'])) {
            $this->ajax->json_error("אין בניינים לפרוייקט");
        }
        $data = [];
        /**
         * @var \Entities\Building $b
         */
        foreach($buildings as $b) {
            $b->setArchitectId(intval($b->getArchitectId()));
            $b->setCommitteeApprove(intval($b->getCommitteeApprove()));
            $b->setBuildingStatusId(intval($b->getBuildingStatusId()));
            $b->setBuildingTypeId(intval($b->getBuildingTypeId()));
            $b->setBuildingNum(intval($b->getBuildingNum()));
        }
        $data['buildings'] = $buildings;
        $this->ajax->json_response($data);
    }
    public function ajax_load_payment_level_performas(){
        $payment_level_id = intval($this->input->post("id"));
        if(!$performas = $this->performa_model->get_all(["project_payment_level_id"=>$payment_level_id], (object)['column'=>'id','order' => 'asc'])) {
            $this->ajax->json_error("אין פרפורמות לשלב תשלום");
        }
//        var_dump($performas);exit;
        $data = [];
        /**
         * @var \Entities\Performa $b
         */
        $performa_text_options = $this->performa_model->get_text_options();
        foreach($performas as $b) {
            $b->getProjectPaymentLevelId(intval($b->getProjectPaymentLevelId()));
            if($b->getPerformaNumber() < 4) {
                $b->setName($performa_text_options[$b->getPerformaNumber()]);
            }
        }
        $data['performas'] = $performas;
        $this->ajax->json_response($data);
    }

    public function ajax_load_project_payment_levels(){
        $project_id = intval($this->input->post("project_id"));
        if(!$payment_levels = $this->project_payment_level_model->get_all(["project_id"=>$project_id], (object)['column'=>'id','order' => 'asc'])) {
            $this->ajax->json_error("אין שלבי תשלום לפרוייקט");
        }
//        var_dump($performas);exit;
        $data = [];
        /**
         * @var \Entities\Project_Payment_Level $b
         */
        $performa_text_options = $this->performa_model->get_text_options();
        foreach($payment_levels as $b) {
            $b->getProjectId(intval($b->getProjectId()));
        }
        $data['payment_levels'] = $payment_levels;
        $this->ajax->json_response($data);
    }

    public function ajax_save(){

        $project = (array)$this->input->post("project");
        $project = new Entities\Project((object)$project);
        $architect = $this->input->post("architect");
        $architect =  new Entities\Architect((object)$architect);
        $company = $this->input->post("company");
        $company =  new Entities\Company((object)$company);
        $project_manager = $this->input->post("project_manager");
        $project_manager =  new Entities\Manager((object)$project_manager);
        $project_manager->setManagerTypeId(8);
        $buildings = $this->input->post("buildings");
        $consultants = $this->input->post("consultants");
        $foreman = $this->input->post("foreman");
        $project_performas = $this->input->post("project_performas");
        $project_notes = $this->input->post("project_notes");
        $project_criticism = $this->input->post("project_criticism");
        if(!$project->getProjectStatusId()) {
            $this->ajax->json_error('נא לבחור סטטוס פרוייקט');
        }
//        if(!$project->getWaterSpecs()) {
//            $this->ajax->json_error('נא לבחור אפיון רשת מים');
//        }
//        if(!$project->getCommitteeApprove()) {
//            $this->ajax->json_error('נא לבחור החלטות ועדה');
//        }
        if(!$company->getFirstName()) {
            $this->ajax->json_error('נא למלא שם פרטי/שם חברה לחברה');
        }
//        if(!$company->getLastName()) {
//            $this->ajax->json_error('נא למלא שם משפחה לחברה');
//        }
        if(!$architect->getFirstName()) {
            $this->ajax->json_error('נא למלא שם פרטי לארכיטקט');
        }

        if(!$architect->getLastName()) {
            $this->ajax->json_error('נא למלא שם משפחה לארכיטקט');
        }
//        if(!$company->getProjectManagerId()) {
//            $this->ajax->json_error('נא לבחור מנהל פרוייקט לחברה');
//        }
//        if(!$company->getAccountManagerId()) {
//            $this->ajax->json_error('נא לבחור מנהל חשבונות לחברה');
//        }
//        if(!$project_manager->getFirstName()) {
//            $this->ajax->json_error('נא למלא שם פרטי למנהל פרוייקט');
//        }
//        if(!$project_manager->getLastName()) {
//            $this->ajax->json_error('נא למלא שם משפחה למנהל פרוייקט');
//        }
//        if(!$project_manager->getManagerTypeId()) {
//            $this->ajax->json_error('נא לבחור סוג מנהל פרוייקט');
//        }
        if($consultants && is_array($consultants)) {
            $consultant_array = [];
            foreach($consultants as $i => $c) {
                $c = (object)$c;
                if(!$c->id) {
//                    $this->ajax->json_error('נא לבחור יועץ');
                    unset($consultants[$i]);
                    continue;
                }
                if(!in_array($c->id,$consultant_array)){
                    $consultant_array [] = $c->id;
                } else {
                    $this->ajax->json_error('נא לבחור יועצים שונים');
                }
            }
        }
        if($foreman && is_array($foreman)) {
            $foreman_array = [];
            foreach($foreman as $i => $f) {
                $f = (object)$f;
                if(!$f->id) {
                    $this->ajax->json_error('נא לבחור מנהל עבודה');
                    unset($foreman[$i]);
                    continue;
                }
                if(!in_array($f->id,$foreman_array)){
                    $foreman_array [] = $f->id;
                } else {
                    $this->ajax->json_error('נא לבחור מנהלי עבודה שונים');
                }
            }
        }
        if(!$project->getProjectSerial()) {
            $project->setProjectSerial($this->project_model->calc_project_serial(date("y")));
        }

        try {
            $this->architect_model->save_entry($architect);
            if($project_manager->getFirstName() && $project_manager->getLastName()) {
                $this->manager_model->save_entry($project_manager);
                $project->setProjectManagerId($project_manager->getId());
            }
            $this->company_model->save_entry($company);
            $project->setCompanyId($company->getId());
            $project->setArchitectId($architect->getId());
//            var_dump($project);exit;
            $this->project_model->save_entry($project);
            if($project_notes && is_array($project_notes)) {
                $this->project_model->project_add_notes($project, $project_notes);
            }
            if($project_criticism && is_array($project_criticism)) {
                $this->project_model->project_add_criticism($project, $project_criticism);
            }
            if($consultants && is_array($consultants)) {
                $this->consultant_model->add_project_consultants($consultants,$project->getId());
            }
            if($foreman && is_array($foreman)) {
                $this->manager_model->add_project_foreman($foreman,$project->getId());
            }
            if($project_performas && is_array($project_performas)) {
                foreach($project_performas as $pp) {
                    $pp =  new Entities\Project_Performa((object)$pp);
                    if(isset($pp->added)) {
                        unset($pp->added);
                    }
                    $this->project_performa_model->save_entry($pp);
                }
            }
            if(!is_array($buildings)) {
                $buildings = [];
            }
            foreach($buildings as $b) {

                $b =  new Entities\Building((object)$b);
                if(isset($b->added)) {
                    unset($b->added);
                }
                if(!$b->getArchitectId()) {
//                $this->ajax->json_error('נא לבחור ארכיטקט לבניין '. $b->getBuildingName());
                    $b->setArchitectId($project->getArchitectId());
                }
                $b->setProjectId($project->getId());
                $this->building_model->save_entry($b);
            }
        } catch(Exception $e) {
            $this->ajax->json_error($e->getMessage());
        }

        $buildings = $this->building_model->get_all(["project_id"=>$project->getId()],(object)['column'=>'building_num','order'=>'asc']);
        /** @var \Entities\Building $b */
        foreach($buildings as $b) {
            $b->setArchitectId(intval($b->getArchitectId()));
            $b->setCommitteeApprove(intval($b->getCommitteeApprove()));
            $b->setBuildingStatusId(intval($b->getBuildingStatusId()));
            $b->setBuildingTypeId(intval($b->getBuildingTypeId()));
            $b->setBuildingNum(intval($b->getBuildingNum()));
        }
        $this->ajax->json_response([
            "project"=>$project,
            "architect_id"=>$architect->getId(),
            "company_id"=>$company->getId(),
            "buildings"=>$buildings,
            "project_manager_id"=>$project_manager->getId(),
            "project_notes"=>$this->project_model->project_get_notes($project),
            "project_criticism"=>$this->project_model->project_get_criticism($project),
            "consultants"=>$this->consultant_model->get_all_project_consultant_fixed($project->getId()),
            "foreman"=>$this->manager_model->get_all_for_project_foreman($project->getId()),
            "project_performas"=>$this->project_performa_model->get_all(['project_id'=>$project->getId()]),
        ]);
        var_dump($project);
        var_dump($architect);
        var_dump($company);exit;
    }

    public function ajax_refresh_options(){
        $model = trim(strval($this->input->post("model")));
        if(!$model){
            $this->ajax->json_error("model not found");
        }

        if($model == 'account_manager'){
            $options = $this->manager_model->get_options(5);
        } else if($model == 'project_manager'){
            $options = $this->manager_model->get_options(8);
        } else if($model == 'foreman_manager'){
            $options = $this->manager_model->get_options(9);
        } else {
            $options = $this->{$model."_model"}->get_options();
        }
        $this->ajax->json_response(["options"=>$options]);
    }

    public function ajax_save_payment_level(){
        $id = intval($this->input->post("id"));
        if($id) {
            if (!$payment_level = $this->project_payment_level_model->get($id)) {
                $this->ajax->json_error("רשומה לא נמצאה");
            }
        } else {
            $payment_level = $this->project_payment_level_model->newInstance();
        }
        $payment_level->setPrice(intval($this->input->post("price")));
        $payment_level->setProjectId(intval($this->input->post("project_id")));
        $payment_level->setTotalBuildings(intval($this->input->post("total_buildings")));
        $payment_level->setLot(strval($this->input->post("lot")));
        $payment_level->setNotes(strval($this->input->post("notes")));

        try {
            $this->project_payment_level_model->save_entry($payment_level);
        } catch(Exception $e) {
            $this->ajax->json_error($e->getMessage());
        }
//        var_dump($performas);exit;
        $data = [];
        $data['id'] = $payment_level->getId();
        $data['edit'] = !$id ? false : true;
        $this->ajax->json_response($data);
    }

    public function report(){

    }

    public function ajax_delete_project_consultant() {
        $id = intval($this->input->post("id"));
        try {
            $this->consultant_model->delete_project_consultant($id);
        } catch(Exception $e) {
            $this->ajax->json_error($e->getMessage());
        }
        $this->ajax->json_response();
    }
    public function ajax_delete_project_foreman() {
        $id = intval($this->input->post("id"));
        try {
            $this->manager_model->delete_project_foreman($id);
        } catch(Exception $e) {
            $this->ajax->json_error($e->getMessage());
        }
        $this->ajax->json_response();
    }
    public function ajax_delete_project_performa() {
        $id = intval($this->input->post("id"));
        if(!$performa = $this->project_performa_model->get($id)){
            $this->ajax->json_error('רשומה לא נמצאה');
        }
        try {
            $this->project_performa_model->delete_entry($performa);
        } catch(Exception $e) {
            $this->ajax->json_error($e->getMessage());
        }
        $this->ajax->json_response();
    }
}
