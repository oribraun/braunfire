<?php

/**
 * Class Consultant_Model
 *
 * @method \Entities\Consultant get(mixed $match)
 *
 */
class Consultant_Model extends MY_Model {

	public function __construct()
	{
		parent::__construct('consultants', 'Consultant');
	}

	/**
	 * @override
	 * @param \Entities\Manager $current_entity
	 * @param bool          $params
	 * @throws Exception
	 */
	public function pre_insert(\Entities\Consultant $current_entity, $params = false)
	{
        $this->_set_fields($current_entity);
	}

	public function post_insert(\Entities\Entity $entity, $params = false)
	{
	}

	public function pre_update(\Entities\Consultant $current_entity, $params = false)
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

	private function _set_fields(\Entities\Consultant $current_entity, $params = false)
	{
        foreach ($current_entity as $key => $value) {
            if(!in_array($key,parent::getPermittedFields())) {
                $this->db->set($key, $value);
//                echo "$key -> $value </br>";
            }
        }
	}

	public function get_options($val = 'c.id', $txt = 'CONCAT(c.first_name, " ", c.last_name)')
	{
        $this->db->select($val.' as value, '.$txt .' as text',false);
        $this->db->select('c.consultant_type_id');
        $this->db->order_by("first_name", 'asc');
        $this->db->from($this->getTable().' c');
        $query = $this->db->get();
        $result = $query->result();
        if (!is_array($result)){
            return [];
        }
        $options = $result;
		return array_map(function($e){ $e->value = intval($e->value); return $e; }, $options);
	}

	public function get_all_project_consultant($project_id) {
		$this->db->select('ctp.id as consultant_to_project_id,c.id,c.consultant_type_id,c.phone,c.mobile,c.email,c.first_name');
		$this->db->from('consultants_to_project ctp');
		$this->db->where('ctp.project_id',$project_id);
		$this->db->join('consultants c','c.id = ctp.consultant_id','left');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function add_project_consultants($consultants,$project_id) {
		foreach($consultants as $c) {
			$c = (object)$c;
			$this->db->set('consultant_id', $c->id);
			if(isset($c->added) && $c->added) {
				$this->db->set('project_id', $project_id);
				$this->db->insert('consultants_to_project');
			} else {
				$this->db->where('project_id', $project_id);
				$this->db->where('id', $c->consultant_to_project_id);
				$this->db->update('consultants_to_project');
			}
		}
	}

	public function delete_project_consultant($id) {
		if(!$id) {
			return;
		}
		$this->db->where('id', $id);
		$this->db->delete('consultants_to_project');
	}

	public function get_all_project_consultant_fixed($project_id){
		/** @var MY_Controller $CI */
		$CI =& get_instance();
		$consultants = $this->get_all_project_consultant($project_id);
		$consultants_options = $CI->consultant_type_model->get_options();
		$fix_consultants = [];
		$consultants_map = array_map(function($c){return $c->consultant_type_id;},$consultants);
		$array = [];
		foreach($consultants_options as $co) {
			if(($index = array_search($co->value,$consultants_map)) === false) {
				$c = new Entities\Consultant();
				$c->added = 1;
				$fix_consultants [] = $c;
			} else {
				$c = $consultants[$index];
				$c->id = intval($c->id);
				$fix_consultants [] = $c;
			}
		}
//		var_dump($fix_consultants);exit;
		return $fix_consultants;
	}
}
