<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends Admin_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->permission_employee_admin();
	}

	public function index()
	{
		$this->layout->view('admin/home');
	}
}