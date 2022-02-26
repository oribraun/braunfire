<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends MY_Controller {

	/**
	 *
	 */
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->user_model->logout();
		header('Location: ' .admin_url());
	}


}