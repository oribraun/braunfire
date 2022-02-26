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
//        $this->db->join("projects p","p.id = project_id","left");
//        $this->db->select("p.name as project_name");

        $this->db->join("project_payment_levels ppl","ppl.id = project_payment_level_id","left");
        $this->db->join("projects p","p.id = ppl.project_id","left");
        $this->db->select("p.name as project_name",false);

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

    public function get_default_text($project_payment_level_id){
        $this->db->select("COALESCE(MAX(performa_number),0) as num",false);
//        $this->db->where("delivered",1);
        $this->db->where("project_payment_level_id",$project_payment_level_id);
        $this->db->order_by("performa_number","desc");
        $this->db->from($this->getTable());
        $this->db->limit(1);
        $query = $this->db->get();
        $results = $query->result();
//        var_dump($results);exit;
        $num = $results[0]->num;
        if($num >=0 && $num < 4) {
            return (object)['num'=>$num,'text'=>$this->get_text_options()[$num]];
        }
        return (object)['num'=>$num,'text'=>''];
    }
}
