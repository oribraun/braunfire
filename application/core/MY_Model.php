<?php

/**
 *
 * @property Ajax $ajax
 * @property \Entities\User $user
 * @property Layout $layout
 * @property
 *
 * MODELS:
 * @property \User_Model $user_model
 */
class MY_Model extends CI_Model
{
	public $CI;
	public $db;

	private $_table;
	private $_entity_class;
	private $_permitted_fields = ['id','modified','created'];

	public function __construct($table_name = '', $entity_class = '')
	{
		parent::__construct();
		$this->CI =& get_instance();
		$this->db =& $this->CI->db;
		$this->_table = $table_name;
		$this->_entity_class = $entity_class;
	}

    /**
     * @return array
     */
    public function getPermittedFields()
    {
        return $this->_permitted_fields;
    }

    /**
     * @param array $permitted_fields
     */
    public function setPermittedFields($permitted_fields)
    {
        $this->_permitted_fields = $permitted_fields;
    }

    /**
     * @param array $permitted_fields
     */
    public function addPermittedFields($permitted_fields)
    {
        $this->_permitted_fields = array_merge($this->_permitted_fields,$permitted_fields);
    }


    public function getTable()
	{
		return $this->_table;
	}
	public function setTable($table)
	{
		$this->_table = $table;
	}
	public function getEntityClass()
	{
		return '\\Entities\\'.$this->_entity_class;
	}

	public function newInstance()
	{
		$class_path = $this->getEntityClass();
		return new $class_path();
	}


	/**
	 * @param Entities\Entity $entity
	 * @param bool            $params
	 */
	public function pre_insert(\Entities\Entity $entity, $params = false)
	{
	}
	public function post_insert(\Entities\Entity $entity, $params = false)
	{
	}
	public function pre_update(\Entities\Entity $entity, $params = false)
	{
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

	/**
	 * @param null|mixed $match
	 * @return \Entities\Entity[]
	 */
	public function get_all($match = null, $order_by = null)
	{
		if ($match != null && !is_array($match)){
			$match = array('id'=>intval($match));
		}
        if($order_by) {
            $this->db->order_by($order_by->column, $order_by->order);
        }
		$query = $this->db->get_where($this->getTable(), $match);
		$rows = $query->result($this->getEntityClass());
		if (!$rows || !is_array($rows)){
			return [];
		}
		return $rows;
	}

    /**
     * @param null|mixed $match
     * @return \Entities\Entity[]
     */
    public function get_all_for_form($columns = [])
    {

        $page = intval($this->input->post("page"));
        $page_size = intval($this->input->post("page_size"));
        $text = trim(strval($this->input->post("text")));
        $sort_by = $this->input->post("sort_by");

        $this->db->select("t.*");
        $this->pre_get_all_for_form();
        $i = 0;
        if($text) {
            foreach ($columns as $c) {
                if ($i == 0) {
                    $this->db->like("t.".$c, $text);
                } else {
                    $this->db->or_like("t.".$c, $text);
                }
                $i++;
            }
        }
        $this->db->limit($page_size, ($page * $page_size));
        $this->db->from($this->getTable()." t");
        $this->db->order_by($sort_by['column'],$sort_by['order']);
        $rows = $this->db->get()->result($this->getEntityClass());

        if (!$rows || !is_array($rows)){
            return [];
        }
//        $class_path = $this->getEntityClass();
//        $class_rows = [];
//        /**
//         * $var \Entities\Entity $entity
//         */
        foreach($rows as $r) {
			$r->id = intval($r->id);
//            $entity = new $class_path();
//            $entity->setAll($entity,$r);
//            $class_rows [] = $entity;
        }
        return $rows;
    }

    public function pre_get_all_for_form(){
    }

	/**
	 *
	 * @param mixed $match
	 * @param mixed $num_results
	 * @param integer $offset
	 * @return \Entities\Entity|boolean
	 */
	public function get($match, $num_results = 1, $offset = 0)
	{
		if ($match != null && !is_array($match)){
			$match = array('id'=>intval($match));
		}
		if ($num_results < 1){
			$num_results = null;
		}

		$query = $this->db->get_where($this->getTable(), $match, $num_results, $offset);

		$rows = $query->result($this->getEntityClass());
		if (!$rows || count($rows) == 0){
			return false;
		}
		if ($num_results == 1) {
			return $rows[0];
		}
		return $rows;
	}

	/**
	 * @param \Entities\Entity $entity
	 * @param bool   $params
	 */
	public function insert_entry(\Entities\Entity $entity, $params = false)
	{
//		$this->db->set('_type', $this->_entity_class);
//		$this->db->insert('entity_mapper');
//
//		// fetch the new entity id
//		$entity->setId($this->db->insert_id());

		$this->pre_insert($entity, $params);
		$this->db->set('created', 'NOW()', false);
		$this->db->set('id', $entity->getId());
		$this->db->insert($this->getTable());

		$entity->setId($this->db->insert_id());
		$this->post_insert($entity, $params);
	}

	/**
	 * @param \Entities\Entity $entity
	 * @param bool   $params
	 */
	public function update_entry(\Entities\Entity $entity, $params = false)
	{
		$this->pre_update($entity, $params);
		$this->db->where('id', $entity->getId());
		$this->db->update($this->getTable());
		$this->post_update($entity, $params);
	}

	/**
	 * @param \Entities\Entity $entity
	 * @param bool   $params
	 */
	public function delete_entry(\Entities\Entity $entity, $params = false)
	{
		$this->pre_delete($entity, $params);
		$this->db->delete($this->getTable(), array('id' => $entity->getId()));
		$this->post_delete($entity, $params);
	}

	/**
	 * @param \Entities\Entity $entity
	 * @param bool   $params
	 */
	public function save_entry(\Entities\Entity $entity, $params = false)
	{
		if ($entity->getId() > 0){
			$this->update_entry($entity, $params);
		} else {
			$this->insert_entry($entity, $params);
		}
	}

	public function get_list_hash()
	{
		$items = $this->get_all();
		$hashed = array();
		foreach($items as $i){
			$hashed['_'.$i->getId()] = $i;
		}
		return $hashed;
	}

	public function get_options($val, $txt)
	{
		$this->db->select($val.' as value, '.$txt .' as text');
		$this->db->order_by($txt, 'asc');
		$query = $this->db->get($this->getTable());
		$result = $query->result();
		if (!is_array($result)){
			return [];
		}
		return $result;
	}

}

