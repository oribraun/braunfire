<?php
/**
 * Created by PhpStorm.
 * User: private
 * Date: 17/08/14
 * Time: 14:50
 */

class Project_Payment_Levels extends Admin_Controller {

	public function __construct()
	{
		parent::__construct('project_payment_levels');
        $this->permission_admin();
	}

	public function index()
	{
        $data = [];
        $data['project_options'] = $this->project_model->get_options();
		$this->layout->view('admin/project_payment_levels/list',$data);
	}


	public function add()
	{
		$data = [];
		$data['entity'] = $this->project_payment_level_model->newInstance();
        $data['project_options'] = $this->project_model->get_options();
		$this->layout->view('admin/project_payment_levels/form',$data);
	}

	public function edit($id = 0)
	{
		if (!($entity = $this->project_payment_level_model->get($id))){
			show_404();
		}

		$data = [];
		$data['entity'] = $entity;
        $data['project_options'] = $this->project_model->get_options();
		$this->layout->view('admin/project_payment_levels/form' , $data);
	}

    public function add_new($id = 0, $performa_id = false)
    {
        if(!$id && !$performa_id){
            show_404();
        }
        if (!($entity = $this->project_payment_level_model->get($id))){
            show_404();
        }
        $data = [];
        $data['project'] = $this->project_model->get($entity->getProjectId());
        $data['edit'] = $performa_id ? true : false;
        if(!$performa_id) {
            $performas = $this->performa_model->get_all(["project_payment_level_id" => $entity->getId()], (object)['column' => 'performa_number', 'order' => 'asc']);
        } else {
            $performas = $this->performa_model->get_all(['id' => $performa_id], (object)['column' => 'performa_number', 'order' => 'asc']);
        }
//        if($entity->getId() == 0){
            /**
             * @var \Entities\Performa $p
             */
        if(!$performa_id) {
            $last = $this->performa_model->get_default_text($id);
            $p = $this->performa_model->newInstance();
            $p->setName($last->text);
            $p->setPerformaNumber(++$last->num);
            $p->setProjectPaymentLevelId($entity->getId());
            $performas [] = $p;
        }
//        }
//        var_dump($performas);exit;
        foreach($performas as $p) {
            $p->setPerformaNumber(intval($p->getPerformaNumber()));
//            var_dump($p->getNotifyDate());exit;
            $p->setNotifyDate(date('d/m/Y',strtotime($p->getNotifyDate() != '0000-00-00' ? $p->getNotifyDate() : date("m/d/Y"))));
//            $p->setInvoice(intval($p->getInvoice()));
//            $p->setApproved(intval($p->getApproved()));
//            $p->setPartialPayed(intval($p->getPartialPayed()));
//            $p->setMorePayed(intval($p->getMorePayed()));
//            $p->setPayedNoFee(intval($p->getPayedNoFee()));
//            $p->setPayedWithFee(intval($p->getPayedWithFee()));
        }
//        $performa_text = $this->performa_model->get_default_text();
//        if(!$entity->getPrePaymentText()) {
//            $entity->setPrePaymentText($performa_text_options[0]);
//        }
//        var_dump($performas);exit;
//        $data['price_payed'] = $this->performa_model->calc_price_payed($project_id);
        $entity->performas = $performas;
        $data['entity'] = $entity;
//        $data['payed_price'] = $this->performa_model->calc_price_payed($project_id,$entity);
        $data['project_options'] = $this->project_model->get_options();
        $this->load->view('admin/performas/page' , $data);
    }

	public function ajax_load()
	{

		$entities = $this->project_payment_level_model->get_all_for_form(['notes','lot']);
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
        $performas = $array['performas'];
        unset($array['performas']);
		if (isset($id) && $id > 0){
			if (!($entity = $this->project_payment_level_model->get($id))){
			}
		} else {
			$entity = $this->project_payment_level_model->newInstance();
		}

        $entity->setAll($entity,$array);

		try{
            $i = 1;
            if(isset($performas)){
                foreach($performas as $p){
                    $class_path = $this->performa_model->getEntityClass();
                    $performa = new $class_path((object)$p);
                    if(!$performa->getId()) {
                        $performa->setPerformaNumber($i);
                    } else {
                        $performa->setNotifyDate(date('Y-m-d',strtotime(str_replace('/', '-', $performa->getNotifyDate()))));
//                        var_dump($performa->getNotifyDate());exit;
                        $this->performa_model->save_entry($performa);
                    }
                    $i++;
                }
            }
			$this->project_payment_level_model->save_entry($entity);
			$this->ajax->json_response();
		} catch(Exception $e){
			$this->ajax->json_error($e->getMessage());
		}
	}

	function ajax_delete()
	{
		$id = intval($this->input->post('id'));

		try{
			$entity = $this->project_payment_level_model->newInstance();
			$entity->setId($id);
			$this->project_payment_level_model->delete_entry($entity);
			$this->ajax->json_response(["id"=> $id]);
		}catch(Exception $e){
			$this->ajax->json_error($e->getMessage());
		}
	}

} 