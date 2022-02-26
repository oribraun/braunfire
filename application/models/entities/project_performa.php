<?php

namespace Entities;

class Project_Performa extends Entity {

    public $project_id = 0;
    public $text = '';
    public $need_to_send = 1;
    public $is_delivered = 0;
    public $payed = 0;
    public $delivered_user_id = 0;
    public $need_send_user_id = 0;

	public function __construct($o=null)
	{
		parent::__construct($this, $o);
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
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return int
     */
    public function getNeedToSend()
    {
        return $this->need_to_send;
    }

    /**
     * @param int $need_to_send
     */
    public function setNeedToSend($need_to_send)
    {
        $this->need_to_send = $need_to_send;
    }

    /**
     * @return int
     */
    public function getIsDelivered()
    {
        return $this->is_delivered;
    }

    /**
     * @param int $is_delivered
     */
    public function setIsDelivered($is_delivered)
    {
        $this->is_delivered = $is_delivered;
    }

    /**
     * @return int
     */
    public function getDeliveredUserId()
    {
        return $this->delivered_user_id;
    }

    /**
     * @param int $delivered_user_id
     */
    public function setDeliveredUserId($delivered_user_id)
    {
        $this->delivered_user_id = $delivered_user_id;
    }

    /**
     * @return int
     */
    public function getNeedSendUserId()
    {
        return $this->need_send_user_id;
    }

    /**
     * @param int $need_send_user_id
     */
    public function setNeedSendUserId($need_send_user_id)
    {
        $this->need_send_user_id = $need_send_user_id;
    }

    /**
     * @return int
     */
    public function getPayed()
    {
        return $this->payed;
    }

    /**
     * @param int $payed
     */
    public function setPayed($payed)
    {
        $this->payed = $payed;
    }


}
