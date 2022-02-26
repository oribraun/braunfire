<?php
/**
 * Created by PhpStorm.
 * User: private
 * Date: 17/08/14
 * Time: 14:50
 */

class Manager_Types extends Admin_Controller {

	public function __construct()
	{
		parent::__construct('manager_types');
		$this->permission_admin();
	}

	public function index()
	{
		$this->layout->view('admin/manager_types/list');
	}


	public function add()
	{
		$data = [];
		$data['entity'] = $this->manager_type_model->newInstance();
		$this->layout->view('admin/manager_types/form',$data);
	}

	public function edit($id = 0)
	{
		if (!($entity = $this->manager_type_model->get($id))){
			show_404();
		}

		$data = [];
		$data['entity'] = $entity;
		$this->layout->view('admin/manager_types/form' , $data);
	}
	public function ajax_load()
	{

		$entities = $this->manager_type_model->get_all_for_form(['name']);
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
			if (!($entity = $this->manager_type_model->get($id))){
				$this->ajax->json_error('לא נמצאה רשומה עם ID זה');
			}
		} else {
			$entity = $this->manager_type_model->newInstance();
		}

        $entity->setAll($entity,$array);
//		$entity->setName(trim(strval($name)));

		try{
			$this->manager_type_model->save_entry($entity);
			$this->ajax->json_response();
		} catch(Exception $e){
			$this->ajax->json_error($e->getMessage());
		}
	}

	function ajax_delete()
	{
		$id = intval($this->input->post('id'));

		try{
			$entity = $this->manager_type_model->newInstance();
			$entity->setId($id);
			$this->manager_type_model->delete_entry($entity);
			$this->ajax->json_response(["id"=> $id]);
		}catch(Exception $e){
			$this->ajax->json_error($e->getMessage());
		}
	}

} 