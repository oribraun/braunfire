<?php

namespace Entities;

class User extends Entity {

	const LEVEL_GUEST 		= 0;
	const LEVEL_MEMBER 		= 1;
	const LEVEL_BUSINESS 	= 2;
	const LEVEL_EMPLOYEE 	= 3;
	const LEVEL_ADMIN		= 4;
	const LEVEL_OWNER_ADMIN	= 5;
	const LEVEL_SUPER_ADMIN = 6;

	public $email = '';
	public $first_name = '';
	public $last_name = '';

	public $password = '';
	public $level = self::LEVEL_MEMBER;


	public function __construct($o=null)
	{
		parent::__construct($this, $o);
	}
	public function isSuperAdmin()
	{
		return $this->level >= self::LEVEL_SUPER_ADMIN;
	}
	public function isOwnerAdmin()
	{
		return $this->level >= self::LEVEL_OWNER_ADMIN;
	}
	public function isAdmin()
	{
		return $this->level >= self::LEVEL_ADMIN;
	}
	public function isEmployeeAdmin()
	{
		return $this->level >= self::LEVEL_EMPLOYEE;
	}
	public function isBusiness()
	{
		return $this->level >= self::LEVEL_BUSINESS;
	}
	public function isMember()
	{
		return $this->getId() > 0;
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
	public function getEmail()
	{
		return $this->email;
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
	public function getFirstName()
	{
		return $this->first_name;
	}

	/**
	 * @param string $last_name
	 */
	public function setLastName($last_name)
	{
		$this->last_name = $last_name;
	}

	/**
	 * @return string
	 */
	public function getLastName()
	{
		return $this->last_name;
	}

	/**
	 * @param int $level
	 */
	public function setLevel($level)
	{
		$this->level = $level;
	}

	/**
	 * @return int
	 */
	public function getLevel()
	{
		return $this->level;
	}

	/**
	 * @param string $password
	 */
	public function setPassword($password)
	{
		$this->password = $password;
	}

	/**
	 * @return string
	 */
	public function getPassword()
	{
		return $this->password;
	}

	public function getName()
	{
		return $this->getFirstName() . ' ' . $this->getLastName();
	}
}
