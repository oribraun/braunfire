<?php

namespace Entities;

class Building_Type extends Entity {

	public $name = '';

	public function __construct($o=null)
	{
		parent::__construct($this, $o);
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


}
