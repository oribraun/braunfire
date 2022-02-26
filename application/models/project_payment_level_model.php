<?php

/**
 * Class Project_Payment_Level_Model
 *
 * @method \Entities\Project_Payment_Level get(mixed $match)
 *
 */
class Project_Payment_Level_Model extends MY_Model {

	public function __construct()
	{
		parent::__construct('project_payment_levels', 'Project_Payment_Level');
	}

	/**
	 * @override
	 * @param \Entities\Project_Payment_Level $current_entity
	 * @param bool          $params
	 * @throws Exception
	 */
	public function pre_insert(\Entities\Project_Payment_Level $current_entity, $params = false)
	{
        $this->_set_fields($current_entity);
	}

	public function post_insert(\Entities\Entity $entity, $params = false)
	{
	}

	public function pre_update(\Entities\Project_Payment_Level $current_entity, $params = false)
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

	private function _set_fields(\Entities\Project_Payment_Level $current_entity, $params = false)
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

        $project_id = intval($this->input->post("project_id"));
        if($project_id){
            $this->db->where("project_id",$project_id);
        }
    }

    public function get_options($val = 'id')
    {
        $this->db->query('SET @row = 0');
        $query = $this->db->query('SELECT @row := @row +1 AS text, '.$val.' as value, project_id FROM '.$this->getTable());
        $result = $query->result();
        if (!is_array($result)){
            return [];
        }
        $options = $result;
        return array_map(function($e){ $e->value = intval($e->value); return $e; }, $options);
    }

}
