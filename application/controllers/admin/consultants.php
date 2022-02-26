<?php
/**
 * Created by PhpStorm.
 * User: private
 * Date: 17/08/14
 * Time: 14:50
 */

class Consultants extends Admin_Controller {

	public function __construct()
	{
		parent::__construct('consultants');
		$this->permission_admin();
	}

	public function index()
	{
		$data = [];
		$data['consultant_type_options'] = $this->consultant_type_model->get_options();
		$this->layout->view('admin/consultants/list',$data);
	}


	public function add()
	{
		$data = [];
		$data['consultant_type_options'] = $this->consultant_type_model->get_options();
		$data['entity'] = $this->consultant_model->newInstance();
		$this->layout->view('admin/consultants/form',$data);
	}

	public function edit($id = 0)
	{
		if (!($entity = $this->consultant_model->get($id))){
			show_404();
		}

		$data = [];
		$data['consultant_type_options'] = $this->consultant_type_model->get_options();
		$data['entity'] = $entity;
        $this->layout->view('admin/consultants/form' , $data);
	}
	public function ajax_load()
	{

		$entities = $this->consultant_model->get_all_for_form(['first_name','last_name','email','address']);
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
			if (!($entity = $this->consultant_model->get($id))){
				$this->ajax->json_error('לא נמצאה רשומה עם ID זה');
			}
		} else {
			$entity = $this->consultant_model->newInstance();
		}

        $entity->setAll($entity,$array);

		try{
			$this->consultant_model->save_entry($entity);
			$this->ajax->json_response();
		} catch(Exception $e){
			$this->ajax->json_error($e->getMessage());
		}
	}

	function ajax_delete()
	{
		$id = intval($this->input->post('id'));

		try{
			$entity = $this->consultant_model->newInstance();
			$entity->setId($id);
			$this->consultant_model->delete_entry($entity);
			$this->ajax->json_response(["id"=> $id]);
		}catch(Exception $e){
			$this->ajax->json_error($e->getMessage());
		}
	}

} 