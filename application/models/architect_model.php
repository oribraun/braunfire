<?php

/**
 * Class Architect_Model
 *
 * @method \Entities\Architect get(mixed $match)
 *
 */
class Architect_Model extends MY_Model {

	public function __construct()
	{
		parent::__construct('architects', 'Architect');
	}

	/**
	 * @override
	 * @param \Entities\Architect $current_entity
	 * @param bool          $params
	 * @throws Exception
	 */
	public function pre_insert(\Entities\Architect $current_entity, $params = false)
	{
        $this->_set_fields($current_entity);
	}

	public function post_insert(\Entities\Entity $entity, $params = false)
	{
	}

	public function pre_update(\Entities\Architect $current_entity, $params = false)
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

	private function _set_fields(\Entities\Architect $current_entity, $params = false)
	{
        foreach ($current_entity as $key => $value) {
            if(!in_array($key,parent::getPermittedFields())) {
                $this->db->set($key, $value);
//                echo "$key -> $value </br>";
            }
        }
	}

	public function get_options($val = 'id', $txt = 'CONCAT(first_name, " ", last_name)')
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
}
