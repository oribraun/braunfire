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
	}

	public function index()
	{
        $data = [];
        $data['project_options'] = $this->project_model->get_options();
		$this->layout->view('admin/performas/list', $data);
	}


	public function add()
	{
		$data = [];
        $entity = $this->performa_model->newInstance();
        $performa_text_options = $this->performa_model->get_text_options();
        $entity->setPrePaymentText($performa_text_options[0]);
        $entity->setPreConsultText($performa_text_options[1]);
        $entity->setFinishConsultText($performa_text_options[2]);
        $entity->setApprovedText($performa_text_options[3]);
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
		$data['entity'] = $entity;
        $data['project_options'] = $this->project_model->get_options();
		$this->layout->view('admin/performas/form' , $data);
	}

    public function view($id = 0, $project_id = false)
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

		$entities = $this->performa_model->get_all_for_form(['pre_payment_text','pre_consult_text','finish_consult_text','approved_text','extra_text']);
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
//		$entity->setProjectId(intval($project_id));
//		$entity->setPreformaNumber(intval($preforma_number));
//		$entity->setPaymentDays(intval($payment_days));
//        $entity->setPrePaymentText(trim(strval($pre_payment_text)));
//        $entity->setPrePaymentPrice(intval($pre_payment_price));
//        $entity->setPrePaymentPercent(intval($pre_payment_percent));
//        $entity->setPreConsultText(trim(strval($pre_consult_text)));
//        $entity->setPreConsultPrice(intval($pre_consult_price));
//        $entity->setPreConsultPercent(intval($pre_consult_percent));
//        $entity->setFinishConsultText(trim(strval($finish_consult_text)));
//        $entity->setFinishConsultPrice(intval($finish_consult_price));
//        $entity->setFinishConsultPercent(intval($finish_consult_percent));
//        $entity->setApprovedText(trim(strval($approved_text)));
//        $entity->setApprovedPrice(intval($approved_price));
//        $entity->setApprovedPercent(intval($approved_percent));
//        $entity->setExtraText(trim(strval($extra_text)));
//        $entity->setExtraPrice(intval($extra_price));
//        $entity->setExtraPercent(intval($extra_percent));
//		$entity->setDelivered(intval($delivered));
//		$entity->setApproved(intval($approved));
//		$entity->setPayedNoFee(intval($payed_no_fee));
//		$entity->setPayedWithFee(intval($payed_with_fee));
//		$entity->setInvoice(intval($invoice));

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

} 