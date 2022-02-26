<?php

namespace Entities;

class Manager extends Entity {

    public $first_name = '';
    public $last_name = '';
    public $email = '';
    public $address = '';
    public $post_code = 0;
    public $phone = 0;
    public $mobile = 0;
    public $manager_type_id = 0;

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
    public function getManagerTypeId()
    {
        return $this->manager_type_id;
    }

    /**
     * @param int $manager_type_id
     */
    public function setManagerTypeId($manager_type_id)
    {
        $this->manager_type_id = $manager_type_id;
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


}
