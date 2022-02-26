<?php

namespace Entities;

class Building extends Entity {

    public $project_id = 0;
    public $building_name = '';
    public $building_type_id = 0;
    public $building_block = '';
    public $building_lot = '';
    public $building_ground = '';
    public $muni_num = 0;
    public $building_num = 0;
    public $fire_num = 0;
    public $committee_approve = 0;
    public $building_status_id = 0;
    public $architect_id = 0;

	public function __construct($o=null)
	{
		parent::__construct($this, $o);
	}

    /**
     * @return int
     */
    public function getArchitectId()
    {
        return $this->architect_id;
    }

    /**
     * @param int $architect_id
     */
    public function setArchitectId($architect_id)
    {
        $this->architect_id = $architect_id;
    }

    /**
     * @return string
     */
    public function getBuildingBlock()
    {
        return $this->building_block;
    }

    /**
     * @param string $building_block
     */
    public function setBuildingBlock($building_block)
    {
        $this->building_block = $building_block;
    }

    /**
     * @return string
     */
    public function getBuildingGround()
    {
        return $this->building_ground;
    }

    /**
     * @param string $building_ground
     */
    public function setBuildingGround($building_ground)
    {
        $this->building_ground = $building_ground;
    }

    /**
     * @return string
     */
    public function getBuildingLot()
    {
        return $this->building_lot;
    }

    /**
     * @param string $building_lot
     */
    public function setBuildingLot($building_lot)
    {
        $this->building_lot = $building_lot;
    }

    /**
     * @return string
     */
    public function getBuildingName()
    {
        return $this->building_name;
    }

    /**
     * @param string $building_name
     */
    public function setBuildingName($building_name)
    {
        $this->building_name = $building_name;
    }

    /**
     * @return int
     */
    public function getBuildingNum()
    {
        return $this->building_num;
    }

    /**
     * @param int $building_num
     */
    public function setBuildingNum($building_num)
    {
        $this->building_num = $building_num;
    }

    /**
     * @return int
     */
    public function getBuildingStatusId()
    {
        return $this->building_status_id;
    }

    /**
     * @param int $building_status_id
     */
    public function setBuildingStatusId($building_status_id)
    {
        $this->building_status_id = $building_status_id;
    }

    /**
     * @return int
     */
    public function getBuildingTypeId()
    {
        return $this->building_type_id;
    }

    /**
     * @param int $building_type_id
     */
    public function setBuildingTypeId($building_type_id)
    {
        $this->building_type_id = $building_type_id;
    }

    /**
     * @return int
     */
    public function getFireNum()
    {
        return $this->fire_num;
    }

    /**
     * @param int $fire_num
     */
    public function setFireNum($fire_num)
    {
        $this->fire_num = $fire_num;
    }

    /**
     * @return int
     */
    public function getMuniNum()
    {
        return $this->muni_num;
    }

    /**
     * @param int $muni_num
     */
    public function setMuniNum($muni_num)
    {
        $this->muni_num = $muni_num;
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
    public function getCommitteeApprove()
    {
        return $this->committee_approve;
    }

    /**
     * @param int $committee_approve
     */
    public function setCommitteeApprove($committee_approve)
    {
        $this->committee_approve = $committee_approve;
    }



}
