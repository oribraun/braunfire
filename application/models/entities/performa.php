<?php

namespace Entities;

class Performa extends Entity {

    public $project_payment_level_id = 0;
    public $performa_number = 0;
    public $payment_days = 0;
    public $name = '';
    public $price = 0;
    public $percent = 0;
    public $delivered = 0;
    public $partial_payed = 0;
    public $partial_payed_price = '';
    public $more_payed = 0;
    public $more_payed_price = '';
    public $approved = 0;
    public $payed_no_fee = 0;
    public $payed_with_fee = 0;
    public $invoice = 0;
    public $invoice_number = 0;
    public $notes = '';
    public $notify_date = '';


	public function __construct($o=null)
	{
		parent::__construct($this, $o);
	}

    /**
     * @return int
     */
    public function getApproved()
    {
        return $this->approved;
    }

    /**
     * @param int $approved
     */
    public function setApproved($approved)
    {
        $this->approved = $approved;
    }

    /**
     * @return int
     */
    public function getDelivered()
    {
        return $this->delivered;
    }

    /**
     * @param int $delivered
     */
    public function setDelivered($delivered)
    {
        $this->delivered = $delivered;
    }

    /**
     * @return int
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * @param int $invoice
     */
    public function setInvoice($invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * @return int
     */
    public function getInvoiceNumber()
    {
        return $this->invoice_number;
    }

    /**
     * @param int $invoice_number
     */
    public function setInvoiceNumber($invoice_number)
    {
        $this->invoice_number = $invoice_number;
    }

    /**
     * @return int
     */
    public function getMorePayed()
    {
        return $this->more_payed;
    }

    /**
     * @param int $more_payed
     */
    public function setMorePayed($more_payed)
    {
        $this->more_payed = $more_payed;
    }

    /**
     * @return string
     */
    public function getMorePayedPrice()
    {
        return $this->more_payed_price;
    }

    /**
     * @param string $more_payed_price
     */
    public function setMorePayedPrice($more_payed_price)
    {
        $this->more_payed_price = $more_payed_price;
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
    public function getNotifyDate()
    {
        return $this->notify_date;
    }

    /**
     * @param string $notify_date
     */
    public function setNotifyDate($notify_date)
    {
        $this->notify_date = $notify_date;
    }

    /**
     * @return int
     */
    public function getPartialPayed()
    {
        return $this->partial_payed;
    }

    /**
     * @param int $partial_payed
     */
    public function setPartialPayed($partial_payed)
    {
        $this->partial_payed = $partial_payed;
    }

    /**
     * @return string
     */
    public function getPartialPayedPrice()
    {
        return $this->partial_payed_price;
    }

    /**
     * @param string $partial_payed_price
     */
    public function setPartialPayedPrice($partial_payed_price)
    {
        $this->partial_payed_price = $partial_payed_price;
    }

    /**
     * @return int
     */
    public function getPayedNoFee()
    {
        return $this->payed_no_fee;
    }

    /**
     * @param int $payed_no_fee
     */
    public function setPayedNoFee($payed_no_fee)
    {
        $this->payed_no_fee = $payed_no_fee;
    }

    /**
     * @return int
     */
    public function getPayedWithFee()
    {
        return $this->payed_with_fee;
    }

    /**
     * @param int $payed_with_fee
     */
    public function setPayedWithFee($payed_with_fee)
    {
        $this->payed_with_fee = $payed_with_fee;
    }

    /**
     * @return int
     */
    public function getPaymentDays()
    {
        return $this->payment_days;
    }

    /**
     * @param int $payment_days
     */
    public function setPaymentDays($payment_days)
    {
        $this->payment_days = $payment_days;
    }

    /**
     * @return int
     */
    public function getPercent()
    {
        return $this->percent;
    }

    /**
     * @param int $percent
     */
    public function setPercent($percent)
    {
        $this->percent = $percent;
    }

    /**
     * @return int
     */
    public function getPerformaNumber()
    {
        return $this->performa_number;
    }

    /**
     * @param int $performa_number
     */
    public function setPerformaNumber($performa_number)
    {
        $this->performa_number = $performa_number;
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
    public function getProjectPaymentLevelId()
    {
        return $this->project_payment_level_id;
    }

    /**
     * @param int $project_payment_level_id
     */
    public function setProjectPaymentLevelId($project_payment_level_id)
    {
        $this->project_payment_level_id = $project_payment_level_id;
    }


}
