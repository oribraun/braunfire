<?php

/**
 * Class Project_Performa_Model
 *
 * @method \Entities\Project_Performa get(mixed $match)
 *
 */
class Project_Performa_Model extends MY_Model {

	public function __construct()
	{
		parent::__construct('project_performas', 'Project_Performa');
	}

	/**
	 * @override
	 * @param \Entities\Project_Performa $current_entity
	 * @param bool          $params
	 * @throws Exception
	 */
	public function pre_insert(\Entities\Project_Performa $current_entity, $params = false)
	{
        $this->_set_fields($current_entity);
	}

	public function post_insert(\Entities\Entity $entity, $params = false)
	{
	}

	public function pre_update(\Entities\Project_Performa $current_entity, $params = false)
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

	private function _set_fields(\Entities\Project_Performa $current_entity, $params = false)
	{
        foreach ($current_entity as $key => $value) {
            if(!in_array($key,parent::getPermittedFields())) {
                $this->db->set($key, $value);
//                echo "$key -> $value </br>";
            }
        }
	}

	public function get_options($val = 'id', $txt = 'text')
	{
        $this->db->select($val.' as value, '.$txt .' as text',false);
        $this->db->order_by("first_name", 'asc');
        $query = $this->db->get($this->getTable());
        $result = $query->result();
        if (!is_array($result)){
            return [];
        }
        $options = $result;
		return array_map(function($e){ $e->value = intval($e->value); return $e; }, $options);
	}

	public function pre_get_all_for_form(){
		$this->db->join("projects p","p.id = project_id","left");
		$this->db->select("p.name as project_name");
//
		$this->db->join("users u","u.id = delivered_user_id","left");
		$this->db->select("CONCAT(u.first_name, ' ', u.last_name) as delivered_user_name", false);
	}

	public function get_all_payments($type = 0){
		$this->db->select('t.*');
		$this->db->from($this->getTable().' t');
		$this->db->join("projects p","p.id = project_id","left");
		$this->db->select("p.name as project_name");
//
		$this->db->join("users u","u.id = delivered_user_id","left");
		$this->db->select("CONCAT(u.first_name, ' ', u.last_name) as delivered_user_name", false);
		$this->db->where('need_to_send',1);
		if($type < 2) {
			if($type == 1) {
				$this->db->where('is_delivered', $type);
				$this->db->where('payed', 0);
			} else {
				$this->db->where('is_delivered', $type);
			}
		} else if($type == 2) {
			$this->db->where('payed', 1);
		}
		$this->db->order_by('need_to_send,created');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
}
