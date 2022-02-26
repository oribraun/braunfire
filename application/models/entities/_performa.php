<?php

namespace Entities;

class Performa extends Entity {

    public $project_id = 0;
    public $preforma_number = 0;
    public $payment_days = 0;
    public $pre_payment_text = '';
    public $pre_payment_price = 0;
    public $pre_payment_percent = 0;
    public $pre_consult_text = '';
    public $pre_consult_price = 0;
    public $pre_consult_percent = 0;
    public $finish_consult_text = '';
    public $finish_consult_price = 0;
    public $finish_consult_percent = 0;
    public $approved_text = '';
    public $approved_price = 0;
    public $approved_percent = 0;
    public $extra_text = '';
    public $extra_price = 0;
    public $extra_percent = 0;
    public $delivered = 0;
    public $approved = 0;
    public $payed_no_fee = 0;
    public $payed_with_fee = 0;
    public $invoice = 0;


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
    public function getApprovedPercent()
    {
        return $this->approved_percent;
    }

    /**
     * @param int $approved_percent
     */
    public function setApprovedPercent($approved_percent)
    {
        $this->approved_percent = $approved_percent;
    }

    /**
     * @return int
     */
    public function getApprovedPrice()
    {
        return $this->approved_price;
    }

    /**
     * @param int $approved_price
     */
    public function setApprovedPrice($approved_price)
    {
        $this->approved_price = $approved_price;
    }

    /**
     * @return string
     */
    public function getApprovedText()
    {
        return $this->approved_text;
    }

    /**
     * @param string $approved_text
     */
    public function setApprovedText($approved_text)
    {
        $this->approved_text = $approved_text;
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
    public function getExtraPercent()
    {
        return $this->extra_percent;
    }

    /**
     * @param int $extra_percent
     */
    public function setExtraPercent($extra_percent)
    {
        $this->extra_percent = $extra_percent;
    }

    /**
     * @return int
     */
    public function getExtraPrice()
    {
        return $this->extra_price;
    }

    /**
     * @param int $extra_price
     */
    public function setExtraPrice($extra_price)
    {
        $this->extra_price = $extra_price;
    }

    /**
     * @return string
     */
    public function getExtraText()
    {
        return $this->extra_text;
    }

    /**
     * @param string $extra_text
     */
    public function setExtraText($extra_text)
    {
        $this->extra_text = $extra_text;
    }

    /**
     * @return int
     */
    public function getFinishConsultPercent()
    {
        return $this->finish_consult_percent;
    }

    /**
     * @param int $finish_consult_percent
     */
    public function setFinishConsultPercent($finish_consult_percent)
    {
        $this->finish_consult_percent = $finish_consult_percent;
    }

    /**
     * @return int
     */
    public function getFinishConsultPrice()
    {
        return $this->finish_consult_price;
    }

    /**
     * @param int $finish_consult_price
     */
    public function setFinishConsultPrice($finish_consult_price)
    {
        $this->finish_consult_price = $finish_consult_price;
    }

    /**
     * @return string
     */
    public function getFinishConsultText()
    {
        return $this->finish_consult_text;
    }

    /**
     * @param string $finish_consult_text
     */
    public function setFinishConsultText($finish_consult_text)
    {
        $this->finish_consult_text = $finish_consult_text;
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
    public function getPreConsultPercent()
    {
        return $this->pre_consult_percent;
    }

    /**
     * @param int $pre_consult_percent
     */
    public function setPreConsultPercent($pre_consult_percent)
    {
        $this->pre_consult_percent = $pre_consult_percent;
    }

    /**
     * @return int
     */
    public function getPreConsultPrice()
    {
        return $this->pre_consult_price;
    }

    /**
     * @param int $pre_consult_price
     */
    public function setPreConsultPrice($pre_consult_price)
    {
        $this->pre_consult_price = $pre_consult_price;
    }

    /**
     * @return string
     */
    public function getPreConsultText()
    {
        return $this->pre_consult_text;
    }

    /**
     * @param string $pre_consult_text
     */
    public function setPreConsultText($pre_consult_text)
    {
        $this->pre_consult_text = $pre_consult_text;
    }

    /**
     * @return int
     */
    public function getPrePaymentPercent()
    {
        return $this->pre_payment_percent;
    }

    /**
     * @param int $pre_payment_percent
     */
    public function setPrePaymentPercent($pre_payment_percent)
    {
        $this->pre_payment_percent = $pre_payment_percent;
    }

    /**
     * @return int
     */
    public function getPrePaymentPrice()
    {
        return $this->pre_payment_price;
    }

    /**
     * @param int $pre_payment_price
     */
    public function setPrePaymentPrice($pre_payment_price)
    {
        $this->pre_payment_price = $pre_payment_price;
    }

    /**
     * @return string
     */
    public function getPrePaymentText()
    {
        return $this->pre_payment_text;
    }

    /**
     * @param string $pre_payment_text
     */
    public function setPrePaymentText($pre_payment_text)
    {
        $this->pre_payment_text = $pre_payment_text;
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
    public function getPreformaNumber()
    {
        return $this->preforma_number;
    }

    /**
     * @param int $preforma_number
     */
    public function setPreformaNumber($preforma_number)
    {
        $this->preforma_number = $preforma_number;
    }


}
