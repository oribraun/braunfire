<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->dbforge();
//		echo 'Database created!';
//		exit;
		$fields = array(
			'id' => array('type' => 'INT',
				'constraint' => 11,
				'auto_increment' => TRUE),
//            'project_id' => array('type' => 'INT',
//				'constraint' => 11),
			'first_name' => array('type' => 'VARCHAR',
				'constraint' => 20,
				'COLLATE'=>'utf8mb4_general_ci'),
//            'building_type_id' => array('type' => 'INT',
//                'constraint' => 11),
			'last_name' => array('type' => 'VARCHAR',
				'constraint' => 20,
				'COLLATE'=>'utf8mb4_general_ci'),
            'email' => array('type' => 'VARCHAR',
                'constraint' => 30,
                'COLLATE'=>'utf8mb4_general_ci'),
            'address' => array('type' => 'VARCHAR',
                'constraint' => 50,
                'COLLATE'=>'utf8mb4_general_ci'),
//            'building_ground' => array('type' => 'VARCHAR',
//                'constraint' => 50,
//                'COLLATE'=>'utf8mb4_general_ci'),
            'post_box' => array('type' => 'INT',
                'constraint' => 10),
            'post_code' => array('type' => 'INT',
                'constraint' => 10),
            'phone' => array('type' => 'INT',
                'constraint' => 10),
            'mobile' => array('type' => 'INT',
                'constraint' => 10),
//            'architect_name' => array('type' => 'VARCHAR',
//                'constraint' => 30,
//                'COLLATE'=>'utf8mb4_general_ci'),
            'fax' => array('type' => 'INT',
                'constraint' => 10),
            'manager_name' => array('type' => 'VARCHAR',
                'constraint' => 20,
                'COLLATE'=>'utf8mb4_general_ci'),
            'manager_email' => array('type' => 'VARCHAR',
                'constraint' => 30,
                'COLLATE'=>'utf8mb4_general_ci'),
            'manager_mobile' => array('type' => 'INT',
                'constraint' => 10),
//            'payment_status' => array('type' => 'VARCHAR',
//                'constraint' => 50,
//                'COLLATE'=>'utf8mb4_general_ci'),
//            'notes' => array('type' => 'VARCHAR',
//                'constraint' => 255,
//                'COLLATE'=>'utf8mb4_general_ci'),
//            'water_specs' => array('type' => 'TINYINT',
//                'constraint' => 1),
//            'committee_approve' => array('type' => 'TINYINT',
//                'constraint' => 1),
//            'architect_id' => array('type' => 'INT',
//                'constraint' => 10),
//            'mobile' => array('type' => 'INT',
//                'constraint' => 10),
//            'fax' => array('type' => 'INT',
//                'constraint' => 10),
//            'project_manager_id' => array('type' => 'INT',
//                'constraint' => 11),
//            'account_manager_id' => array('type' => 'INT',
//                'constraint' => 11),
			'modified' => array('type' => 'TIMESTAMP',
				'default' => date('Y-m-d H:i:s', time())),
			'created' => array('type' => 'TIMESTAMP',
			'default'=>'0000-00-00 00:00:00')
		);
//		$this->dbforge->add_field($fields);
//		$this->dbforge->add_key('id', TRUE);
//		$this->dbforge->create_table('architects',TRUE);
////		$this->dbforge->add_column('user', $fields);
//		var_dump('a');exit;
//        for ($i = 140001 ; $i <= 140062; $i++){
//            $this->db->set("project_serial",$i);
//            $this->db->insert("projects");
//        }
		show_404();
		$this->layout->view('home');
	}

	public function surf_cameras(){
		redirect('http://braunfire.com/all_surf_cameras');
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
//		log_message('INFO','surf current ip address - '.$ip);
//		log_message('DEBUG','surf current ip address - '.$ip);
		log_message('ERROR','surf current ip address - '.$ip);
		$this->load->view('surf');
	}

	public function all_surf_cameras(){ 
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
//		log_message('INFO','surf current ip address - '.$ip);
//		log_message('DEBUG','surf current ip address - '.$ip);
		log_message('ERROR','surf current ip address - '.$ip);
		$this->load->view('surf');
	}

	public function ajax_get_key(){
		$key = '';
		if(strpos($_SERVER['HTTP_REFERER'],'braunfire.com'))
		{
			$key = "gDs1KJKxZ2kDvRyuLROZoefFLcZ44qf487KcT6vQ52I=";
		}
		$this->ajax->json_response(['key'=>$key]);
	}

	public function terms(){
		$this->load->view('terms');
	}
}