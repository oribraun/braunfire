<?php
/**
 * Created by PhpStorm.
 * User: private
 * Date: 17/08/14
 * Time: 14:50
 */

class Buildings extends Admin_Controller {

	public function __construct()
	{
		parent::__construct('buildings');
		$this->permission_admin();
	}

	public function index()
	{
        $data = [];
        $data['building_type_options'] = $this->building_type_model->get_options();
        $data['building_status_options'] = $this->building_status_model->get_options();
        $data['architect_options'] = $this->architect_model->get_options();
        $data['project_options'] = $this->project_model->get_options();
        $data['committee_approve_options'] = $this->project_model->get_committee_approve_options();
		$this->layout->view('admin/buildings/list', $data);
	}


	public function add()
	{
		$data = [];
		$data['entity'] = $this->building_model->newInstance();
		$data['building_type_options'] = $this->building_type_model->get_options();
		$data['building_status_options'] = $this->building_status_model->get_options();
		$data['architect_options'] = $this->architect_model->get_options();
        $data['project_options'] = $this->project_model->get_options();
        $data['committee_approve_options'] = $this->project_model->get_committee_approve_options();
		$this->layout->view('admin/buildings/form',$data);
	}

	public function edit($id = 0)
	{
		if (!($entity = $this->building_model->get($id))){
			show_404();
		}

		$data = [];
		$data['entity'] = $entity;
        $data['building_type_options'] = $this->building_type_model->get_options();
        $data['building_status_options'] = $this->building_status_model->get_options();
        $data['architect_options'] = $this->architect_model->get_options();
        $data['project_options'] = $this->project_model->get_options();
        $data['committee_approve_options'] = $this->project_model->get_committee_approve_options();
		$this->layout->view('admin/buildings/form' , $data);
	}
	public function ajax_load()
	{

		$entities = $this->building_model->get_all_for_form(['building_name','building_block','building_lot','building_ground']);
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
			if (!($entity = $this->building_model->get($id))){
				$this->ajax->json_error('לא נמצאה רשומה עם ID זה');
			}
		} else {
			$entity = $this->building_model->newInstance();
		}

        $entity->setAll($entity,$array);
//		$entity->setProjectId(intval($project_id));
//		$entity->setBuildingName(trim(strval($building_name)));
//		$entity->setBuildingTypeId(intval($building_type_id));
//		$entity->setBuildingBlock(trim(strval($building_block)));
//		$entity->setBuildingLot(trim(strval($building_lot)));
//		$entity->setBuildingGround(trim(strval($building_ground)));
//		$entity->setMuniNum(intval($muni_num));
//		$entity->setBuildingNum(intval($building_num));
//		$entity->setFireNum(trim(strval($fire_num)));
//		$entity->setCommitteeApprove(intval($committee_approve));
//		$entity->setBuildingStatusId(intval($building_status_id));
//		$entity->setArchitectId(intval($architect_id));

		try{
			$this->building_model->save_entry($entity);
			$this->ajax->json_response();
		} catch(Exception $e){
			$this->ajax->json_error($e->getMessage());
		}
	}

	function ajax_delete()
	{
		$id = intval($this->input->post('id'));

		try{
			$entity = $this->building_model->newInstance();
			$entity->setId($id);
			$this->building_model->delete_entry($entity);
			$this->ajax->json_response(["id"=> $id]);
		}catch(Exception $e){
			$this->ajax->json_error($e->getMessage());
		}
	}

} 