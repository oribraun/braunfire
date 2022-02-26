<?php

/**
 * Class Building_Model
 *
 * @method \Entities\Building get(mixed $match)
 *
 */
class Building_Model extends MY_Model {

	public function __construct()
	{
		parent::__construct('buildings', 'Building');
	}

	/**
	 * @override
	 * @param \Entities\Building $current_entity
	 * @param bool          $params
	 * @throws Exception
	 */
	public function pre_insert(\Entities\Building $current_entity, $params = false)
	{
        $this->_set_fields($current_entity);
	}

	public function post_insert(\Entities\Entity $entity, $params = false)
	{
	}

	public function pre_update(\Entities\Building $current_entity, $params = false)
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

	private function _set_fields(\Entities\Building $current_entity, $params = false)
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
        $this->db->join("building_types b","b.id = building_type_id","left");
        $this->db->select("b.name as building_type_name");
        $project_id = intval($this->input->post("project_id"));
        $building_type_id = intval($this->input->post("building_type_id"));
        if($project_id){
            $this->db->where("project_id",$project_id);
        }
        if($building_type_id){
            $this->db->where("building_type_id",$building_type_id);
        }
    }

	public function get_options($val = 'id', $txt = 'building_name')
	{
		$options = parent::get_options($val, $txt);
		return array_map(function($e){ $e->value = intval($e->value); return $e; }, $options);
	}
}
