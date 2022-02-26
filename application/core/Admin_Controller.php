<?php


/**
 * Class Admin_controller
 *
 *
 */
class Admin_Controller extends MY_Controller
{
    public $ctrl_name = '';

	public function __construct($ctrl_name = '')
	{
        parent::__construct(SSL_MODE_FORCE);
        $this->ctrl_name = $ctrl_name;
        if ($this->user == null || !$this->user->isEmployeeAdmin()){
			header('Location: '. admin_url('login').'?ref='.rel_url(urlencode(uri_string())));
			exit;
		}

		$this->layout->set_layout("admin");
		$this->layout->set_template("main");
		if($this->user->isSuperAdmin()){

		}
		else if($this->user->isOwnerAdmin()){

		}
		else if($this->user->isAdmin()){
			$this->layout->set_template('admin');
		}
		else if($this->user->isEmployeeAdmin()) {
			$this->layout->set_template('employee');
		}
	}

	public function permission_super_admin()
	{
		if (!$this->user->isSuperAdmin()){
			header('Location: '. admin_url());
//			echo $this->layout->view('admin/permission_denied', null, true);
			exit;
		}
	}
	public function permission_owner_admin()
	{
		if (!$this->user->isOwnerAdmin()){
			header('Location: '. admin_url());
//			echo $this->layout->view('admin/permission_denied', null, true);
			exit;
		}
	}
	public function permission_admin()
	{
		if (!$this->user->isAdmin()){
			header('Location: '. admin_url());
//			echo $this->layout->view('admin/permission_denied', null, true);
			exit;
		}
	}
	public function permission_employee_admin()
	{
		if (!$this->user->isEmployeeAdmin()){
			header('Location: '. admin_url());
//			echo $this->layout->view('admin/permission_denied', null, true);
			exit;
		}
	}
}