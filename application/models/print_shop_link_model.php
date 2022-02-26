<?php

/**
 * Class Print_Shop_Link_Model
 *
 * @method \Entities\Print_Shop_Link get(mixed $match)
 *
 */
class Print_Shop_Link_Model extends MY_Model {

	public function __construct()
	{
		parent::__construct('print_shop_links', 'Print_Shop_Link');
	}

	/**
	 * @override
	 * @param \Entities\Print_Shop_Link $current_entity
	 * @param bool          $params
	 * @throws Exception
	 */
	public function pre_insert(\Entities\Print_Shop_Link $current_entity, $params = false)
	{
        $this->_set_fields($current_entity);
	}

	public function post_insert(\Entities\Entity $entity, $params = false)
	{
	}

	public function pre_update(\Entities\Print_Shop_Link $current_entity, $params = false)
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

	private function _set_fields(\Entities\Print_Shop_Link $current_entity, $params = false)
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
