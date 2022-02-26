<?php

/**
 * Class Manager_Model
 *
 * @method \Entities\Manager get(mixed $match)
 *
 */
class Manager_Model extends MY_Model {

	public function __construct()
	{
		parent::__construct('managers', 'Manager');
	}

	/**
	 * @override
	 * @param \Entities\Manager $current_entity
	 * @param bool          $params
	 * @throws Exception
	 */
	public function pre_insert(\Entities\Manager $current_entity, $params = false)
	{
        $this->_set_fields($current_entity);
	}

	public function post_insert(\Entities\Entity $entity, $params = false)
	{
	}

	public function pre_update(\Entities\Manager $current_entity, $params = false)
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

	private function _set_fields(\Entities\Manager $current_entity, $params = false)
	{
        foreach ($current_entity as $key => $value) {
            if(!in_array($key,parent::getPermittedFields())) {
                $this->db->set($key, $value);
//                echo "$key -> $value </br>";
            }
        }
	}

	public function get_options($type = false, $val = 'm.id', $txt = 'CONCAT(m.first_name, " ", m.last_name)')
	{
        $this->db->select($val.' as value, '.$txt .' as text',false);
        $this->db->order_by("first_name", 'asc');
        if($type) {
            $this->db->join("manager_types mt", "mt.id = m.manager_type_id","left");
            $this->db->where("m.manager_type_id",$type);
        }
        $this->db->from("managers m");
        $query = $this->db->get();
        $result = $query->result();
        if (!is_array($result)){
            return [];
        }
        $options = $result;
		return array_map(function($e){ $e->value = intval($e->value); return $e; }, $options);
	}
}
