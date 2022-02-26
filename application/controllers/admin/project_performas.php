<?php
/**
 * Created by PhpStorm.
 * User: private
 * Date: 17/08/14
 * Time: 14:50
 */

class Project_Performas extends Admin_Controller {

	public function __construct()
	{
		parent::__construct('project_performas');
		$this->permission_admin();
	}

	public function index()
	{
		$data['project_options'] = $this->project_model->get_options();
		$data['user_options'] = $this->user_model->get_options();
		$this->layout->view('admin/project_performas/list',$data);
	}


	public function add()
	{
		$data = [];
		$data['project_options'] = $this->project_model->get_options();
		$data['user_options'] = $this->user_model->get_options();
		$data['entity'] = $this->project_performa_model->newInstance();

		$this->layout->view('admin/project_performas/form',$data);
	}

	public function edit($id = 0)
	{
		if (!($entity = $this->project_performa_model->get($id))){
			show_404();
		}
		$entity->setNeedToSend(intval($entity->getNeedToSend()));
		$entity->setIsDelivered(intval($entity->getIsDelivered()));
		$entity->setPayed(intval($entity->getPayed()));

		$data = [];
		$data['project_options'] = $this->project_model->get_options();
		$data['user_options'] = $this->user_model->get_options();
		$data['entity'] = $entity;
		$this->layout->view('admin/project_performas/form' , $data);
	}
	public function ajax_load()
	{

		$entities = $this->project_performa_model->get_all_for_form(['project_id','text','need_to_send','is_delivered','payed','delivered_user_id','need_send_user_id']);
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
			if (!($entity = $this->project_performa_model->get($id))){
				$this->ajax->json_error('לא נמצאה רשומה עם ID זה');
			}
		} else {
			$entity = $this->project_performa_model->newInstance();
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
			$this->project_performa_model->save_entry($entity);
			$this->ajax->json_response();
		} catch(Exception $e){
			$this->ajax->json_error($e->getMessage());
		}
	}

	function ajax_delete()
	{
		$id = intval($this->input->post('id'));

		try{
			$entity = $this->project_performa_model->newInstance();
			$entity->setId($id);
			$this->project_performa_model->delete_entry($entity);
			$this->ajax->json_response(["id"=> $id]);
		}catch(Exception $e){
			$this->ajax->json_error($e->getMessage());
		}
	}

} 