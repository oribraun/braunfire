<?php

namespace Entities;

class Company extends Entity {

    public $first_name = '';
    public $last_name = '';
    public $email = '';
    public $social_id = 0;
    public $address = '';
    public $post_box = 0;
    public $post_code = 0;
    public $phone = 0;
    public $mobile = 0;
    public $fax = 0;
//    public $project_manager_id = 0;
    public $account_manager_id = 0;

	public function __construct($o=null)
	{
		parent::__construct($this, $o);
	}

    /**
     * @return int
     */
    public function getAccountManagerId()
    {
        return $this->account_manager_id;
    }

    /**
     * @param int $account_manager_id
     */
    public function setAccountManagerId($account_manager_id)
    {
        $this->account_manager_id = $account_manager_id;
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
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return int
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param int $fax
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param string $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    public function getFullName()
    {
        return $this->first_name . " " .$this->last_name;
    }
    /**
     * @return int
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param int $mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

    /**
     * @return int
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param int $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return int
     */
    public function getPostBox()
    {
        return $this->post_box;
    }

    /**
     * @param int $post_box
     */
    public function setPostBox($post_box)
    {
        $this->post_box = $post_box;
    }

    /**
     * @return int
     */
    public function getPostCode()
    {
        return $this->post_code;
    }

    /**
     * @param int $post_code
     */
    public function setPostCode($post_code)
    {
        $this->post_code = $post_code;
    }

//    /**
//     * @return int
//     */
//    public function getProjectManagerId()
//    {
//        return $this->project_manager_id;
//    }
//
//    /**
//     * @param int $project_manager_id
//     */
//    public function setProjectManagerId($project_manager_id)
//    {
//        $this->project_manager_id = $project_manager_id;
//    }

    /**
     * @return int
     */
    public function getSocialId()
    {
        return $this->social_id;
    }

    /**
     * @param int $social_id
     */
    public function setSocialId($social_id)
    {
        $this->social_id = $social_id;
    }



}
