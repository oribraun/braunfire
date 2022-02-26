<?php

/**
 * Class Performa_Model
 *
 * @method \Entities\Performa get(mixed $match)
 *
 */
class Performa_Model extends MY_Model {

	public function __construct()
	{
		parent::__construct('performas', 'Performa');
	}

	/**
	 * @override
	 * @param \Entities\Performa $current_entity
	 * @param bool          $params
	 * @throws Exception
	 */
	public function pre_insert(\Entities\Performa $current_entity, $params = false)
	{
        $this->_set_fields($current_entity);
	}

	public function post_insert(\Entities\Entity $entity, $params = false)
	{
	}

	public function pre_update(\Entities\Performa $current_entity, $params = false)
	{
        $this->_set_fields($current_entity);
	}

	public function post_update(\Entities\Entity $entity, $params = false)
	{
	}
	public function pre_delete(\Entities\Entity $entity, $params = false)
	{
	}
	public function post_delete(\Entities\Entity $entity, $params = false)
	{
	}

	private function _set_fields(\Entities\Performa $current_entity, $params = false)
	{
        foreach ($current_entity as $key => $value) {
            if(!in_array($key,parent::getPermittedFields())) {
                $this->db->set($key, $value);
//                echo "$key -> $value </br>";
            }
        }
	}

    public function pre_get_all_for_form(){
        $this->db->join("projects p","p.id = project_id","left");
        $this->db->select("p.name as project_name");

        $project_id = intval($this->input->post("project_id"));
        if($project_id){
            $this->db->where("project_id",$project_id);
        }
    }
//	public function get_options($val = 'id', $txt = 'name')
//	{
//        $options = parent::get_options($val,$txt);
//		return array_map(function($e){ $e->value = intval($e->value); return $e; }, $options);
//	}

    public function get_text_options2(){
        return [
            (object)[
                'value'=>1,
                'text'=>'מקדמה בקבלת תוכניות'
            ],
            (object)[
                'value'=>2,
                'text'=>'בגמר יעוץ מקדים'
            ],
            (object)[
                'value'=>3,
                'text'=>'בגמר יעוץ סופי וקבלת חתימה מכיבוי אש על תוכניות'
            ],
            (object)[
                'value'=>4,
                'text'=>'בגמר פיקוח עליון ומתן אישור לרשות הכיבוי'
            ]
        ];
    }
    public function get_text_options(){
        return [
            'מקדמה בקבלת תוכניות',
            'בגמר יעוץ מקדים',
'בגמר יעוץ סופי וקבלת חתימה מכיבוי אש על תוכניות',
            'בגמר פיקוח עליון ומתן אישור לרשות הכיבוי'
        ];
    }

    public function duplicate_last_preforma($project_id){
        $this->db->select("preforma_number,project_id,payment_days,pre_payment_text,pre_payment_price,pre_payment_percent");
        $this->db->select("pre_consult_text,pre_consult_price,pre_consult_percent");
        $this->db->select("finish_consult_text,finish_consult_price,finish_consult_percent");
        $this->db->select("approved_text,approved_price,approved_percent");
        $this->db->select("extra_text,extra_price,extra_percent");
        $this->db->where("project_id",$project_id);
        $this->db->order_by("preforma_number","desc");
        $this->db->from($this->getTable());
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->result('\Entities\Performa');
//        var_dump($result);exit;
        return count($result) ? $result[0] : false;
        var_dump($result);exit;
    }

    public function calc_price_payed($project_id, \Entities\Performa $performa){
        $fee = 1.18;
//        $this->db->select("preforma_number,project_id,payment_days,pre_payment_text,pre_payment_price,pre_payment_percent");
//        $this->db->select("SUM(CASE payed_no_fee WHEN 1 THEN SUM(pre_payment_price*pre_payment_percent)+
//        SUM(pre_consult_price*pre_consult_percent) + SUM(finish_consult_price*finish_consult_percent)+
//        SUM(approved_price*approved_percent)+ SUM(extra_price*extra_percent) ELSE 0) as price_payed",false);
//        $this->db->select("COALESCE(SUM(CASE WHEN payed_no_fee=1 THEN ROUND(pre_payment_price*(pre_payment_percent/100))+
//          ROUND(pre_consult_price*(pre_consult_percent/100))+
//           ROUND(finish_consult_price*(finish_consult_percent/100))+
//           ROUND(approved_price*(approved_percent/100))+
//           ROUND(extra_price*(extra_percent/100)) ELSE 0 END),0) AS price_payed_no_fee",false);
//        $this->db->select("COALESCE(SUM(CASE WHEN payed_with_fee=1 THEN ROUND(pre_payment_price*(pre_payment_percent/100))*".$fee."+
//          ROUND(pre_consult_price*(pre_consult_percent/100))*".$fee."+
//           ROUND(finish_consult_price*(finish_consult_percent/100))*".$fee."+
//           ROUND(approved_price*(approved_percent/100))*".$fee."+
//           ROUND(extra_price*(extra_percent/100))*".$fee." ELSE 0 END),0) AS price_payed_with_fee",false);
        $this->db->select("COALESCE(SUM(CASE WHEN payed_with_fee=1 THEN ROUND(pre_payment_price*(pre_payment_percent/100))*".$fee."+
          ROUND(pre_consult_price*(pre_consult_percent/100))*".$fee."+
           ROUND(finish_consult_price*(finish_consult_percent/100))*".$fee."+
           ROUND(approved_price*(approved_percent/100))*".$fee."+
           ROUND(extra_price*(extra_percent/100))*".$fee." ELSE 0 END),0) +
           COALESCE(SUM(CASE WHEN payed_no_fee=1 THEN ROUND(pre_payment_price*(pre_payment_percent/100))+
           ROUND(pre_consult_price*(pre_consult_percent/100))+
           ROUND(finish_consult_price*(finish_consult_percent/100))+
           ROUND(approved_price*(approved_percent/100))+
           ROUND(extra_price*(extra_percent/100)) ELSE 0 END),0)
            AS total_price_payed",false);
        $this->db->where("project_id",$project_id);
        $this->db->where("id !=",$performa->getId());
        $this->db->where("preforma_number <",$performa->getPreformaNumber());
        $this->db->where("delivered",1);
        $this->db->where("approved",1);
//        $this->db->group_by("pre_payment_price,pre_consult_price,finish_consult_price,approved_price,extra_price");
//        $this->db->where("payed_no_fee",1);
//        $this->db->or_where("payed_with_fee",1);
        $this->db->from($this->getTable());
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->result();
//        var_dump($result[0]);exit;
        return count($result) ? $result[0] : false;
        var_dump($result);exit;
    }

    public function get_performa($id){
        $this->db->select("p.*");
        $this->db->select("(SELECT COUNT(*) FROM performas p2 WHERE p2.project_id = p.project_id AND p2.id != p.id
        AND p2.preforma_number < p.preforma_number AND (p2.payed_no_fee > 0 OR p2.payed_with_fee > 0)) as payed_price");
        $this->db->where("id",$id);
//        $this->db->order_by("preforma_number","desc");
        $this->db->from($this->getTable()." p");
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->result('\Entities\Performa');
//        var_dump($result);exit;
        return count($result) ? $result[0] : false;
        var_dump($result);exit;
    }
}
