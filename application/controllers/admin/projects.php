<?php
/**
 * Created by PhpStorm.
 * User: private
 * Date: 17/08/14
 * Time: 14:50
 */

class Projects extends Admin_Controller {

	public function __construct()
	{
		parent::__construct('projects');
		$this->permission_admin();
	}

	public function index()
	{
        $data = [];
        $data['project_status_options'] = $this->project_status_model->get_options();
        $data['architect_options'] = $this->architect_model->get_options();
        $data['company_options'] = $this->company_model->get_options();
        $data['water_specs_options'] = $this->project_model->get_water_specs_options();
        $data['committee_approve_options'] = $this->project_model->get_committee_approve_options();
        $data['print_shop_link_options'] = $this->print_shop_link_model->get_options();
        $data['project_manager_options'] = $this->manager_model->get_options(8);
		$data['user_options'] = $this->user_model->get_options();
//        $data['user_options'] = $this->user_model->get_options();
		$this->layout->view('admin/projects/list', $data);
	}


	public function add()
	{
		$data = [];
		$data['entity'] = $this->project_model->newInstance();
		$data['project_status_options'] = $this->project_status_model->get_options();
		$data['architect_options'] = $this->architect_model->get_options();
		$data['company_options'] = $this->company_model->get_options();
        $data['water_specs_options'] = $this->project_model->get_water_specs_options();
        $data['committee_approve_options'] = $this->project_model->get_committee_approve_options();
        $data['print_shop_link_options'] = $this->print_shop_link_model->get_options();
        $data['project_manager_options'] = $this->manager_model->get_options(8);
		$data['user_options'] = $this->user_model->get_options();
		$this->layout->view('admin/projects/form',$data);
	}

	public function edit($id = 0)
	{
		if (!($entity = $this->project_model->get($id))){
			show_404();
		}

		$data = [];
		$data['entity'] = $entity;
        $data['project_status_options'] = $this->project_status_model->get_options();
        $data['architect_options'] = $this->architect_model->get_options();
        $data['company_options'] = $this->company_model->get_options();
        $data['water_specs_options'] = $this->project_model->get_water_specs_options();
        $data['committee_approve_options'] = $this->project_model->get_committee_approve_options();
        $data['print_shop_link_options'] = $this->print_shop_link_model->get_options();
        $data['project_manager_options'] = $this->manager_model->get_options(8);
		$data['user_options'] = $this->user_model->get_options();
		$this->layout->view('admin/projects/form' , $data);
	}
	public function ajax_load()
	{

		$entities = $this->project_model->get_all_for_form(['name','address','project_condition','payment_status','notes','manager_name','manager_email']);
		$this->ajax->json_response([
			'entities' => $entities
		]);
	}

    /**
     *
     */
    public function ajax_save()
	{
        $post_fields = (array)$this->input->post();
//        var_dump(extract($post_fields,EXTR_PREFIX_SAME,"dup"));
        $array = [];
        foreach($post_fields as $key => $val){
//            echo "$key -> $val </br>";
            $$key = $val;
            $array[$key] = $val;
        }

		if (isset($id) && $id > 0){
			if (!($entity = $this->project_model->get($id))){
				$this->ajax->json_error('לא נמצאה רשומה עם ID זה');
			}
		} else {
			$entity = $this->project_model->newInstance();
		}

		$entity->setName(trim(strval($name)));
		$entity->setAddress(trim(strval($address)));
        $entity->setProjectStatusId(intval($project_status_id));
        $entity->setProjectCondition(trim(strval($project_condition)));
        $entity->setPrintShopLinkId(intval($print_shop_link_id));
        $entity->setPaymentStatus(trim(strval($payment_status)));
        $entity->setContractStatus(trim(strval($contract_status)));
        $entity->setNotes(trim(strval($notes)));
		$entity->setWaterSpecs(intval($water_specs));
		$entity->setWaterShield(intval($water_shield));
		$entity->setCommitteeApprove(intval($committee_approve));
        if(!$project_serial) {
            $entity->setProjectSerial($this->project_model->calc_project_serial(date("y")));
        }
		$entity->setArchitectId(intval($architect_id));
		$entity->setCompanyId(intval($company_id));
		$entity->setProjectManagerId(intval($project_manager_id));
		$entity->setManagerName(trim(strval($manager_name)));
		$entity->setManagerEmail(trim(strval($manager_email)));
		$entity->setManagerPhone(trim(strval($manager_phone)));
		$entity->setManagerMobile(trim(strval($manager_mobile)));
		$entity->setWorkingUserId(trim(strval($working_user_id)));
		$entity->setConsultantsNotes(trim(strval($consultants_notes)));

		try{
			$this->project_model->save_entry($entity);
			$this->ajax->json_response();
		} catch(Exception $e){
			$this->ajax->json_error($e->getMessage());
		}
	}

	function ajax_delete()
	{
		$id = intval($this->input->post('id'));

		try{
			$entity = $this->project_model->newInstance();
			$entity->setId($id);
			$this->project_model->delete_entry($entity);
			$this->ajax->json_response(["id"=> $id]);
		}catch(Exception $e){
			$this->ajax->json_error($e->getMessage());
		}
	}

} 