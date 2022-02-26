<?php

namespace Entities;

class Architect extends Entity {

    public $first_name = '';
    public $last_name = '';
    public $email = '';
    public $address = '';
    public $post_box = 0;
    public $post_code = 0;
    public $phone = 0;
    public $mobile = 0;
    public $fax = 0;
    public $manager_name = '';
    public $manager_email = '';
    public $manager_mobile = 0;

	public function __construct($o=null)
	{
		parent::__construct($this, $o);
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


}
