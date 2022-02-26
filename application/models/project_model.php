<?php

/**
 * Class Project_Model
 *
 * @method \Entities\Project get(mixed $match)
 *
 */
class Project_Model extends MY_Model {

	public function __construct()
	{
		parent::__construct('projects', 'Project');
	}

	/**
	 * @override
	 * @param \Entities\Project $current_entity
	 * @param bool          $params
	 * @throws Exception
	 */
	public function pre_insert(\Entities\Project $current_entity, $params = false)
	{
        $this->_set_fields($current_entity);
	}

	public function post_insert(\Entities\Entity $entity, $params = false)
	{
	}

	public function pre_update(\Entities\Project $current_entity, $params = false)
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

	private function _set_fields(\Entities\Project $current_entity, $params = false)
	{
        foreach ($current_entity as $key => $value) {
            if(!in_array($key,parent::getPermittedFields())) {
                $this->db->set($key, $value);
//                echo "$key -> $value </br>";
            }
        }
	}

    public function pre_get_all_for_form(){
        $this->db->join("project_statuses p","p.id = project_status_id","left");
        $this->db->select("p.name as project_status_name");
//
        $this->db->join("companies c","c.id = company_id","left");
        $this->db->select("CONCAT(c.first_name, ' ', c.last_name) as company_name", false);

        $architect_id = intval($this->input->post("architect_id"));
        $company_id = intval($this->input->post("company_id"));
        $project_status_id = intval($this->input->post("project_status_id"));
        $water_specs = intval($this->input->post("water_specs"));
        $water_shield = intval($this->input->post("water_shield"));
        $committee_approve = intval($this->input->post("committee_approve"));
        $working_user_id = intval($this->input->post("working_user_id"));
        if($architect_id){
            $this->db->where("architect_id",$architect_id);
        }
        if($company_id){
            $this->db->where("company_id",$company_id);
        }
        if($project_status_id){
            $this->db->where("project_status_id",$project_status_id);
        }
        if($water_specs){
            $this->db->where("water_specs",$water_specs);
        }
        if($water_shield){
            $this->db->where("water_shield",$water_shield);
        }
        if($committee_approve){
            $this->db->where("committee_approve",$committee_approve);
        }
        if($working_user_id){
            $this->db->where("working_user_id",$working_user_id);
        }
    }
	public function get_options($val = 'id', $txt = 'name')
	{
        $options = parent::get_options($val,$txt);
		return array_map(function($e){ $e->value = intval($e->value); return $e; }, $options);
	}

    public function get_serial_options($val = 'id', $txt = 'project_serial')
    {
        $options = parent::get_options($val,$txt);
        return array_map(function($e){ $e->value = intval($e->value); return $e; }, $options);
    }

    public function get_water_specs_options(){
        return [
            (object)[
                'value'=>1,
                'text'=>'לא התקבל'
            ],
            (object)[
                'value'=>2,
                'text'=>'התקבל תקין'
            ],
            (object)[
                'value'=>3,
                'text'=>'התקבל לא תקין'
            ],
            (object)[
                'value'=>4,
                'text'=>'אין אפשרות'
            ]
        ];
    }

    public function get_committee_approve_options(){
        return [
            (object)[
                'value'=>1,
                'text'=>'התקבל'
            ],
            (object)[
                'value'=>2,
                'text'=>'לא התקבל'
            ]
        ];
    }

    public function get_full_project($id) {
        $this->db->select("p.*");
//        $this->db->join("project_statuses ps","ps.id = p.project_status_id","left");
//        $this->db->select("ps.name as project_status_name");

        $this->db->where("p.id",$id);
        $this->db->from($this->getTable()." p");
        $query = $this->db->get();
        $result = $query->result($this->getEntityClass());
//        $c_a = $result[0]->getCommitteeApprove();
//        $w_s = $result[0]->getWaterSpecs();
//        $result[0]->water_specs_text = '';
//        $result[0]->committee_approve_text = '';
//        foreach ($this->get_committee_approve_options() as $obj) {
//            if ($obj->value == $c_a) {
//                $result[0]->committee_approve_text =  $obj->text;
//                break;
//            }
//        }
//        foreach ($this->get_water_specs_options() as $obj) {
//            if ($obj->value == $c_a) {
//                $result[0]->water_specs_text =  $obj->text;
//                break;
//            }
//        }
        return $result[0];
    }

    public function calc_project_serial($year) {
        $this->db->select("project_serial");
        $this->db->from($this->getTable());
        $this->db->where("project_serial",$year."0001");
        $query = $this->db->get();
        $result = $query->result();

        if(count($result)) {
            $this->db->select_max("project_serial");
            $this->db->where("project_serial BETWEEN ".$year."0000 AND ".$year."9999");
            $this->db->from($this->getTable());
            $query = $this->db->get();
            $result = $query->result();
            return ++$result[0]->project_serial;
        } else {
            return intval($year."0001");
        }
    }

    public function project_add_notes(Entities\Project $project, $project_notes) {
        foreach($project_notes as $note) {
            $obj = (object)$note;
            if(!isset($obj->created)) {
                $this->db->set('project_id', $project->getId());
                $this->db->set('note', $obj->note);
                $this->db->insert('project_notes');
            } else {
                if($this->user->isOwnerAdmin()) {
                    if($obj->note) {
                        $this->db->where('project_id', $project->getId());
                        $this->db->where('id', $obj->id);
                        $this->db->set('note', $obj->note);
                        $this->db->update('project_notes');
                    } else {
                        $this->db->where('project_id', $project->getId());
                        $this->db->where('id', $obj->id);
                        $this->db->delete('project_notes');
                    }
                }
            }
        }
    }

    public function project_get_notes(Entities\Project $project) {
        $this->db->select('id,project_id,note');
        $this->db->select('DATE_FORMAT(created, "%d/%m/%Y %H:%i") as created ',false);
        $this->db->from('project_notes');
        $this->db->where('project_id',$project->getId());
        return $this->db->get()->result();
    }

    public function project_add_criticism(Entities\Project $project, $project_notes) {
        foreach($project_notes as $note) {
            $obj = (object)$note;
            if(!isset($obj->created)) {
                $this->db->set('project_id', $project->getId());
                $this->db->set('note', $obj->note);
                $this->db->insert('project_criticism');
            } else {
                if($this->user->isOwnerAdmin()) {
                    if($obj->note) {
                        $this->db->where('project_id', $project->getId());
                        $this->db->where('id', $obj->id);
                        $this->db->set('note', $obj->note);
                        $this->db->update('project_criticism');
                    } else {
                        $this->db->where('project_id', $project->getId());
                        $this->db->where('id', $obj->id);
                        $this->db->delete('project_criticism');
                    }
                }
            }
        }
    }

    public function project_get_criticism(Entities\Project $project) {
        $this->db->select('id,project_id,note');
        $this->db->select('DATE_FORMAT(created, "%d/%m/%Y %H:%i") as created ',false);
        $this->db->from('project_criticism');
        $this->db->where('project_id',$project->getId());
        return $this->db->get()->result();
    }
}
