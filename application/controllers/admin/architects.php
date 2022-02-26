<?php
/**
 * Created by PhpStorm.
 * User: private
 * Date: 17/08/14
 * Time: 14:50
 */

class Architects extends Admin_Controller {

	public function __construct()
	{
		parent::__construct('architects');
		$this->permission_admin();
	}

	public function index()
	{
		$this->layout->view('admin/architects/list');
	}


	public function add()
	{
		$data = [];
		$data['entity'] = $this->architect_model->newInstance();
		$this->layout->view('admin/architects/form',$data);
	}

	public function edit($id = 0)
	{
		if (!($entity = $this->architect_model->get($id))){
			show_404();
		}

		$data = [];
		$data['entity'] = $entity;
		$this->layout->view('admin/architects/form' , $data);
	}
	public function ajax_load()
	{

		$entities = $this->architect_model->get_all_for_form(['first_name','last_name','email','address','manager_name','manager_email']);
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
			if (!($entity = $this->architect_model->get($id))){
				$this->ajax->json_error('לא נמצאה רשומה עם ID זה');
			}
		} else {
			$entity = $this->architect_model->newInstance();
		}
        $entity->setAll($entity,$array);
//		$entity->setFirstName(trim(strval($array['first_name'])));
//		$entity->setLastName(trim(strval($array['last_name'])));
//		$entity->setEmail(trim(strval($array['email'])));
//		$entity->setAddress(trim(strval($array['address'])));
//		$entity->setPostBox(intval($array['post_box']));
//		$entity->setPostCode(intval($array['post_code']));
//		$entity->setPhone(trim(strval($array['phone'])));
//		$entity->setMobile(trim(strval($array['mobile'])));
//		$entity->setFax(trim(strval($array['fax'])));
//		$entity->setManagerName(trim(strval($array['manager_name'])));
//		$entity->setManagerEmail(trim(strval($array['manager_email'])));
//		$entity->setManagerMobile(intval($array['manager_mobile']));

		try{
			$this->architect_model->save_entry($entity);
			$this->ajax->json_response();
		} catch(Exception $e){
			$this->ajax->json_error($e->getMessage());
		}
	}

	function ajax_delete()
	{
		$id = intval($this->input->post('id'));

		try{
			$entity = $this->architect_model->newInstance();
			$entity->setId($id);
			$this->architect_model->delete_entry($entity);
			$this->ajax->json_response(["id"=> $id]);
		}catch(Exception $e){
			$this->ajax->json_error($e->getMessage());
		}
	}

} 