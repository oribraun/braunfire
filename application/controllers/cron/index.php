<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->backup_sql();
	}

	public function backup_sql(){
		log_message('ERROR','cron job');
		$date = date("d-m-Y-H-i-s");
		$this->load->dbutil();
		$prefs = array(
			'format'      => 'zip',
			'filename'    => 'my_db_backup_'.$date.'.sql'
		);

		$backup =& $this->dbutil->backup($prefs);

		$db_name = 'braunfire-db-backup-on-'. $date .'.zip';
		$save = 'db_backup/'.$db_name;

		$this->load->helper('file');
		write_file($save, $backup);
	}
}