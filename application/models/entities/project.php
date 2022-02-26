<?php

namespace Entities;

class Project extends Entity {

    public $project_serial = 0;
    public $name = '';
    public $address = '';
    public $project_status_id = 0;
    public $project_condition= '';
    public $print_shop_link_id= 0;
    public $payment_status = '';
    public $contract_status = '';
    public $notes = '';
    public $water_specs = 0;
    public $water_shield = 0;
    public $committee_approve = 0;
    public $architect_id = 0;
    public $company_id = 0;
    public $project_manager_id = 0;
    public $manager_name = '';
    public $manager_email = '';
    public $manager_mobile = 0;
    public $manager_phone = 0;
    public $working_user_id = 0;
    public $consultants_notes = '';

	public function __construct($o=null)
	{
		parent::__construct($this, $o);
	}

    /**
     * @return int
     */
    public function getProjectSerial()
    {
        return $this->project_serial;
    }

    /**
     * @param int $project_serial
     */
    public function setProjectSerial($project_serial)
    {
        $this->project_serial = $project_serial;
    }


    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
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

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @return string
     */
    public function getPaymentStatus()
    {
        return $this->payment_status;
    }

    /**
     * @param string $payment_status
     */
    public function setPaymentStatus($payment_status)
    {
        $this->payment_status = $payment_status;
    }

    /**
     * @return string
     */
    public function getContractStatus()
    {
        return $this->contract_status;
    }

    /**
     * @param string $contract_status
     */
    public function setContractStatus($contract_status)
    {
        $this->contract_status = $contract_status;
    }


    /**
     * @return int
     */
    public function getProjectStatusId()
    {
        return $this->project_status_id;
    }

    /**
     * @param int $project_status_id
     */
    public function setProjectStatusId($project_status_id)
    {
        $this->project_status_id = $project_status_id;
    }

    /**
     * @return string
     */
    public function getProjectCondition()
    {
        return $this->project_condition;
    }

    /**
     * @param string $project_condition
     */
    public function setProjectCondition($project_condition)
    {
        $this->project_condition = $project_condition;
    }

    /**
     * @return int
     */
    public function getPrintShopLinkId()
    {
        return $this->print_shop_link_id;
    }

    /**
     * @param int $print_shop_link_id
     */
    public function setPrintShopLinkId($print_shop_link_id)
    {
        $this->print_shop_link_id = $print_shop_link_id;
    }



    /**
     * @return int
     */
    public function getWaterSpecs()
    {
        return $this->water_specs;
    }

    /**
     * @param int $water_specs
     */
    public function setWaterSpecs($water_specs)
    {
        $this->water_specs = $water_specs;
    }

    /**
     * @return int
     */
    public function getWaterShield()
    {
        return $this->water_shield;
    }

    /**
     * @param int $water_shield
     */
    public function setWaterShield($water_shield)
    {
        $this->water_shield = $water_shield;
    }

    /**
     * @return int
     */
    public function getCompanyId()
    {
        return $this->company_id;
    }

    public function getCompany($company_id)
    {
        /* @var $CI \MY_Controller */
        $CI =& get_instance();

        return $CI->company_model->get($company_id);
    }

    /**
     * @param int $company_id
     */
    public function setCompanyId($company_id)
    {
        $this->company_id = $company_id;
    }

    /**
     * @return string
     */
    public function getManagerEmail()
    {
        return $this->manager_email;
    }

    /**
     * @param string $manager_email
     */
    public function setManagerEmail($manager_email)
    {
        $this->manager_email = $manager_email;
    }

    /**
     * @return int
     */
    public function getManagerMobile()
    {
        return $this->manager_mobile;
    }

    /**
     * @param int $manager_mobile
     */
    public function setManagerMobile($manager_mobile)
    {
        $this->manager_mobile = $manager_mobile;
    }

    /**
     * @return string
     */
    public function getManagerName()
    {
        return $this->manager_name;
    }

    /**
     * @param string $manager_name
     */
    public function setManagerName($manager_name)
    {
        $this->manager_name = $manager_name;
    }

    /**
     * @return int
     */
    public function getManagerPhone()
    {
        return $this->manager_phone;
    }

    /**
     * @param int $manager_phone
     */
    public function setManagerPhone($manager_phone)
    {
        $this->manager_phone = $manager_phone;
    }

    /**
     * @return int
     */
    public function getProjectManagerId()
    {
        return $this->project_manager_id;
    }

    /**
     * @param int $project_manager_id
     */
    public function setProjectManagerId($project_manager_id)
    {
        $this->project_manager_id = $project_manager_id;
    }

    /**
     * @return int
     */
    public function getWorkingUserId()
    {
        return $this->working_user_id;
    }

    /**
     * @param int $working_user_id
     */
    public function setWorkingUserId($working_user_id)
    {
        $this->working_user_id = $working_user_id;
    }

    /**
     * @return string
     */
    public function getConsultantsNotes()
    {
        return $this->consultants_notes;
    }

    /**
     * @param string $consultants_notes
     */
    public function setConsultantsNotes($consultants_notes)
    {
        $this->consultants_notes = $consultants_notes;
    }



}
