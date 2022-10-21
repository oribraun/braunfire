<?php


/**
 * Class MY_controller
 * @property \Entities\User $user
 * @property \Entities\Building_Status $building_status
 * @property \Entities\Building_Type $building_type
 * @property \Entities\Project_Status $project_status
 * @property \Entities\Status_Description $project_status
 * @property \Entities\Manager_Type $manager_type
 * @property \Entities\Building $building
 * @property \Entities\Architect $architect
 * @property \Entities\Manager $manager
 * @property \Entities\Company $company
 * @property \Entities\Project $project
 * @property \Layout $layout
 * @property \Ajax $ajax
 *
 * @property \User_Model $user_model
 * @property \Building_Status_Model $building_status_model
 * @property \Building_Type_Model $building_type_model
 * @property \Project_Status_Model $project_status_model
 * @property \Status_Description_Model $status_description_model
 * @property \Manager_Type_Model $manager_type_model
 * @property \Consultant_Type_Model $consultant_type_model
 * @property \Building_Model $building_model
 * @property \Architect_Model $architect_model
 * @property \Manager_Model $manager_model
 * @property \Company_Model $company_model
 * @property \Project_Model $project_model
 * @property \Print_Shop_Link_Model $print_shop_link_model
 * @property \Performa_Model $performa_model
 * @property \Project_Payment_Level_Model $project_payment_level_model
 * @property \Consultant_Model $consultant_model
 * @property \Project_Performa_Model $project_performa_model
 */
class MY_Controller extends CI_Controller
{
	public $user = false;

	public function __construct($ssl_model = SSL_MODE_ALLOW)
	{
		parent::__construct();

		$this->load->helper('url');

		$this->load->config('braun');

		$this->load->library("session");
		$this->load->library("ajax");
		$this->load->library('layout');

		$this->layout->set_layout("default");
		$this->layout->set_template("main");

		$this->load->database();

		$this->load->model('user_model');
		$this->load->model('building_status_model');
        $this->load->model('building_type_model');
        $this->load->model('project_status_model');
        $this->load->model('status_description_model');
        $this->load->model('manager_type_model');
        $this->load->model('building_model');
        $this->load->model('architect_model');
        $this->load->model('manager_model');
        $this->load->model('company_model');
        $this->load->model('project_model');
        $this->load->model('print_shop_link_model');
        $this->load->model('performa_model');
        $this->load->model('project_payment_level_model');
        $this->load->model('consultant_model');
        $this->load->model('project_performa_model');
        $this->load->model('consultant_type_model');

		$this->user_model->login_from_session();

		$query = $this->db->query("SET time_zone='Israel';");
	}
}
