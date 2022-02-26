<?php

namespace Entities;

class Project_Payment_Level extends Entity {

    public $project_id = 0;
    public $price = 0;
    public $notes = '';
    public $total_buildings = 0;
    public $lot = '';

	public function __construct($o=null)
	{
		parent::__construct($this, $o);
	}

    /**
     * @return string
     */
    public function getLot()
    {
        return $this->lot;
    }

    /**
     * @param string $lot
     */
    public function setLot($lot)
    {
        $this->lot = $lot;
    }

    /**
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getProjectId()
    {
        return $this->project_id;
    }

    /**
     * @param int $project_id
     */
    public function setProjectId($project_id)
    {
        $this->project_id = $project_id;
    }

    /**
     * @return int
     */
    public function getTotalBuildings()
    {
        return $this->total_buildings;
    }

    /**
     * @param int $total_buildings
     */
    public function setTotalBuildings($total_buildings)
    {
        $this->total_buildings = $total_buildings;
    }


}
