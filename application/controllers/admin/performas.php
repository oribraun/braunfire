<?php
/**
 * Created by PhpStorm.
 * User: private
 * Date: 17/08/14
 * Time: 14:50
 */

class Performas extends Admin_Controller {

	public function __construct()
	{
		parent::__construct('performas');
        $this->permission_admin();
	}

	public function index()
	{
        $data = [];
        $data['project_options'] = $this->project_model->get_options();
        $data['project_payment_level_options'] = $this->project_payment_level_model->get_options();
		$this->layout->view('admin/performas/list', $data);
	}


	public function add()
	{
		$data = [];
        $entity = $this->performa_model->newInstance();
//        $performa_text = $this->performa_model->get_default_text();
//        $entity->setName($performa_text);
        $data['entity'] = $entity;
        $data['project_options'] = $this->project_model->get_options();
        $this->layout->view('admin/performas/form',$data);
	}

	public function edit($id = 0)
{
        if (!($entity = $this->performa_model->get($id))){
            show_404();
        }

        $data = [];
        $performa_text = $this->performa_model->get_default_text($entity->getPerformaNumber());
        if(!$entity->getName()) {
            $entity->setName($performa_text);
        }
        $data['entity'] = $entity;
        $data['project_options'] = $this->project_model->get_options();
        $this->layout->view('admin/performas/form' , $data);
    }

    public function view2($id = 0, $project_id = false)
    {
        if (!($entity = $this->performa_model->get($id))){
            $entity = $this->performa_model->newInstance();
        }
        if(!$entity->getId() && !$project_id){
            show_404();
        }
        $data = [];
        if($entity->getId() && !$project_id) {
            $project_id = $entity->getProjectId();
            $data['project'] = $this->project_model->get($project_id);
        } else {
            $data['project'] = $this->project_model->get($project_id);
            $last_perforam = $this->performa_model->duplicate_last_preforma($project_id);
            if($last_perforam){
                $entity = $last_perforam;
                $entity->setPreformaNumber(++$this->performa_model->duplicate_last_preforma($project_id)->preforma_number);
            } else {
                $entity = $this->performa_model->newInstance();
                $entity->setPreformaNumber(1);
                $entity->setProjectId($project_id);
            }
        }

        $performa_text_options = $this->performa_model->get_text_options();
        if(!$entity->getPrePaymentText()) {
            $entity->setPrePaymentText($performa_text_options[0]);
        }
        if(!$entity->getPreConsultText()) {
            $entity->setPreConsultText($performa_text_options[1]);
        }
        if(!$entity->getFinishConsultText()) {
            $entity->setFinishConsultText($performa_text_options[2]);
        }
        if(!$entity->getApprovedText()) {
            $entity->setApprovedText($performa_text_options[3]);
        }
//        $data['price_payed'] = $this->performa_model->calc_price_payed($project_id);
        $data['entity'] = $entity;
//        $data['payed_price'] = $this->performa_model->calc_price_payed($project_id,$entity);
        $data['project_options'] = $this->project_model->get_options();
        $this->load->view('admin/performas/page' , $data);
    }

	public function ajax_load()
	{

		$entities = $this->performa_model->get_all_for_form(['name','notes']);
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
			if (!($entity = $this->performa_model->get($id))){
				$this->ajax->json_error('לא נמצאה רשומה עם ID זה');
			}
		} else {
			$entity = $this->performa_model->newInstance();
		}

        $entity->setAll($entity,$array);

		try{
			$this->performa_model->save_entry($entity);
			$this->ajax->json_response();
		} catch(Exception $e){
			$this->ajax->json_error($e->getMessage());
		}
	}

	function ajax_delete()
	{
		$id = intval($this->input->post('id'));

		try{
			$entity = $this->performa_model->newInstance();
			$entity->setId($id);
			$this->performa_model->delete_entry($entity);
			$this->ajax->json_response(["id"=> $id]);
		}catch(Exception $e){
			$this->ajax->json_error($e->getMessage());
		}
	}

    public function view($id = 0)
    {
        if (!($entity = $this->performa_model->get($id))){
            $entity = $this->performa_model->newInstance();
        }
        if(!$entity->getId()){
            show_404();
        }
        $project_payment = $this->project_payment_level_model->get($entity->getProjectPaymentLevelId());
        $data = [];

        $data['project'] = $this->project_model->get($project_payment->getProjectId());
        $performas = $this->performa_model->get_all(["project_payment_level_id"=> $entity->getProjectPaymentLevelId(),'performa_number <= ' => $entity->getPerformaNumber()],(object)['column'=>'performa_number','order'=>'asc']);
//        if($entity->getId() == 0){
        /**
         * @var \Entities\Performa $p
         */
//        }
//        var_dump($performas);exit;
        foreach($performas as $p) {
            $p->setPerformaNumber(intval($p->getPerformaNumber()));
        }
        $project_payment->performas = $performas;
        $data['entity'] = $project_payment;
        $data['view'] = true;
//        $data['payed_price'] = $this->performa_model->calc_price_payed($project_id,$entity);
        $data['project_options'] = $this->project_model->get_options();
        $this->load->view('admin/performas/page' , $data);
    }
} 