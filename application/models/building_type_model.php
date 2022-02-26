<?php

/**
 * Class Building_Type_Model
 *
 * @method \Entities\Building_Type get(mixed $match)
 *
 */
class Building_Type_Model extends MY_Model {

	public function __construct()
	{
		parent::__construct('building_types', 'Building_Type');
	}

	/**
	 * @override
	 * @param \Entities\Building_Type $current_entity
	 * @param bool          $params
	 * @throws Exception
	 */
	public function pre_insert(\Entities\Building_Type $current_entity, $params = false)
	{
        $this->_set_fields($current_entity);
	}

	public function post_insert(\Entities\Entity $entity, $params = false)
	{
	}

	public function pre_update(\Entities\Building_Type $current_entity, $params = false)
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

	private function _set_fields(\Entities\Building_Type $current_entity, $params = false)
	{
        foreach ($current_entity as $key => $value) {
            if($value && !in_array($key,parent::getPermittedFields())) {
                $this->db->set($key, $value);
//                echo "$key -> $value </br>";
            }
        }
	}

	public function get_options($val = 'id', $txt = 'name')
	{
		$options = parent::get_options($val, $txt);
		return array_map(function($e){ $e->value = intval($e->value); return $e; }, $options);
	}
}
