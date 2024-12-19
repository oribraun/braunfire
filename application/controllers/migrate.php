<?php  if ( ! defined('BASEPATH')) exit("No direct script access allowed");

class Migrate extends CI_Controller {

  public function __construct()
  {
    parent::__construct();

//     $this->input->is_cli_request()
//       or exit("Execute via command line: php index.php migrate");

    $this->load->library('migration');
  }

  public function index()
  {
    if(!$this->migration->latest())
    {
      show_error($this->migration->error_string());
    }
    echo 'Migration complete';
  }

  public function regress()
  {
    $this->migration->regress(0);
    echo 'Migration regress complete';
  }

  public function clear()
    {
        // Get all table names in the current database
        $tables = $this->db->list_tables();

        // Loop through each table and drop it
        foreach ($tables as $table) {
            $this->dbforge->drop_table($table, TRUE);
        }

        echo "All tables have been dropped.";
    }
}