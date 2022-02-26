<?php
/**
 * Created by PhpStorm.
 * User: private
 * Date: 17/08/14
 * Time: 14:50
 */

class Reports extends Admin_Controller {

	public function __construct()
	{
		parent::__construct('reports');
		$this->permission_employee_admin();
	}

	public function index()
	{
//		$this->layout->view('admin/project_performas/list',$data);
	}


	public function payments()
	{
		$data = [];
		$data['payments'] = $this->project_performa_model->get_all_payments();
		$this->layout->view('admin/reports/payments',$data);
	}


	public function ajax_update()
	{
		$id = intval($this->input->post('id'));
		if(!$entity = $this->project_performa_model->get($id)){
			$this->ajax->json_error('רשומה לא נמצאה');
		}

		$is_delivered = intval($this->input->post('is_delivered'));
		$entity->setIsDelivered($is_delivered);
		$entity->setDeliveredUserId($this->user->getId());
		try{
			$this->project_performa_model->save_entry($entity);
			$this->ajax->json_response();
		} catch(Exception $e){
			$this->ajax->json_error($e->getMessage());
		}
	}

	public function ajax_update_payed()
	{
		$id = intval($this->input->post('id'));
		if(!$entity = $this->project_performa_model->get($id)){
			$this->ajax->json_error('רשומה לא נמצאה');
		}

		$payed = intval($this->input->post('payed'));
		$entity->setPayed($payed);
		try{
			$this->project_performa_model->save_entry($entity);
			$this->ajax->json_response();
		} catch(Exception $e){
			$this->ajax->json_error($e->getMessage());
		}
	}

	public function ajax_list(){
		$type = intval($this->input->post('type'));
		try {
			$payments = $this->project_performa_model->get_all_payments($type);
		} catch(Exception $e) {
			$this->ajax->json_error($e->getMessage());
		}
		$this->ajax->json_response(['payments'=>$payments]);
	}

} 