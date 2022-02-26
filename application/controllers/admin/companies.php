<?php
/**
 * Created by PhpStorm.
 * User: private
 * Date: 17/08/14
 * Time: 14:50
 */

class Companies extends Admin_Controller {

	public function __construct()
	{
		parent::__construct('companies');
		$this->permission_admin();
	}

	public function index()
	{
		$this->layout->view('admin/companies/list');
	}


	public function add()
	{
		$data = [];
		$data['entity'] = $this->company_model->newInstance();
        $data['project_manager_options'] = $this->manager_model->get_options(8);
        $data['account_manager_options'] = $this->manager_model->get_options(5);
		$this->layout->view('admin/companies/form',$data);
	}

	public function edit($id = 0)
	{
		if (!($entity = $this->company_model->get($id))){
			show_404();
		}

		$data = [];
		$data['entity'] = $entity;
        $data['project_manager_options'] = $this->manager_model->get_options(8);
        $data['account_manager_options'] = $this->manager_model->get_options(5);
		$this->layout->view('admin/companies/form' , $data);
	}
	public function ajax_load()
	{

		$entities = $this->company_model->get_all_for_form(['first_name','last_name','email','address']);
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
			if (!($entity = $this->company_model->get($id))){
				$this->ajax->json_error('לא נמצאה רשומה עם ID זה');
			}
		} else {
			$entity = $this->company_model->newInstance();
		}

        $entity->setAll($entity,$array);
//		$entity->setFirstName(trim(strval($first_name)));
//		$entity->setLastName(trim(strval($last_name)));
//		$entity->setEmail(trim(strval($email)));
//		$entity->setSocialId(intval($social_id));
//		$entity->setAddress(trim(strval($address)));
//		$entity->setPostBox(intval($post_box));
//		$entity->setPostCode(intval($post_code));
//		$entity->setPhone(trim(strval($phone)));
//		$entity->setMobile(trim(strval($mobile)));
//		$entity->setFax(intval($fax));
////		$entity->setProjectManagerId(intval($project_manager_id));
//		$entity->setAccountManagerId(intval($account_manager_id));

		try{
			$this->company_model->save_entry($entity);
			$this->ajax->json_response();
		} catch(Exception $e){
			$this->ajax->json_error($e->getMessage());
		}
	}

	function ajax_delete()
	{
		$id = intval($this->input->post('id'));

		try{
			$entity = $this->company_model->newInstance();
			$entity->setId($id);
			$this->company_model->delete_entry($entity);
			$this->ajax->json_response(["id"=> $id]);
		}catch(Exception $e){
			$this->ajax->json_error($e->getMessage());
		}
	}

} 