<?php

/**
 * Class Company_Model
 *
 * @method \Entities\Company get(mixed $match)
 *
 */
class Company_Model extends MY_Model {

	public function __construct()
	{
		parent::__construct('companies', 'Company');
	}

	/**
	 * @override
	 * @param \Entities\Company $current_entity
	 * @param bool          $params
	 * @throws Exception
	 */
	public function pre_insert(\Entities\Company $current_entity, $params = false)
	{
        $this->_set_fields($current_entity);
	}

	public function post_insert(\Entities\Entity $entity, $params = false)
	{
	}

	public function pre_update(\Entities\Company $current_entity, $params = false)
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

	private function _set_fields(\Entities\Company $current_entity, $params = false)
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

    public function get_full_company($id) {
        if(!$id) {
            return false;
        }
        $this->db->select("c.*");
//        $this->db->join("managers m","m.id = c.project_manager_id","left");
//        $this->db->select("CONCAT(m.first_name,' ', m.last_name) as project_manager_name",false);
//
//        $this->db->join("managers m1","m1.id = c.account_manager_id","left");
//        $this->db->select("CONCAT(m1.first_name,' ', m1.last_name) as account_manager_name",false);

        $this->db->where("c.id",$id);
        $this->db->from($this->getTable()." c");
        $result = $this->db->get()->result('\Entities\Company');
        foreach($result as $r) {
            $r->account_manager_id = intval($r->account_manager_id);
        }
        return count($result) ? $result[0] : [];
    }
}
