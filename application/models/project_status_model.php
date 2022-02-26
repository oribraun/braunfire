<?php

/**
 * Class Project_Status_Model
 *
 * @method \Entities\Project_Status get(mixed $match)
 *
 */
class Project_Status_Model extends MY_Model {

	public function __construct()
	{
		parent::__construct('project_statuses', 'Project_Status');
	}

	/**
	 * @override
	 * @param \Entities\Project_Status $current_entity
	 * @param bool          $params
	 * @throws Exception
	 */
	public function pre_insert(\Entities\Project_Status $current_entity, $params = false)
	{
        $this->_set_fields($current_entity);
	}

	public function post_insert(\Entities\Entity $entity, $params = false)
	{
	}

	public function pre_update(\Entities\Project_Status $current_entity, $params = false)
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

	private function _set_fields(\Entities\Project_Status $current_entity, $params = false)
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
