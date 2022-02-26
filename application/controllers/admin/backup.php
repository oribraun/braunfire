<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backup extends Admin_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->permission_admin();
	}

	public function index()
	{
		$date = date("d-m-Y-H-i-s");
		$this->load->dbutil();
		$prefs = array(
			'format'      => 'zip',
			'filename'    => 'my_db_backup_'.$date.'.sql'
		);
//		var_dump($_SERVER);exit;
		log_message('ERROR','backup by - '. $this->user->getName() . ' - '.$this->user->getId());
		$backup =& $this->dbutil->backup($prefs);

		$db_name = 'braunfire-db-backup-on-'. $date .'.zip';
		$save = 'db_backup/'.$db_name;

		$this->load->helper('file');
		write_file($save, $backup);


		$this->load->helper('download');
		force_download($db_name, $backup);
	}
}