<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Clear extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->input->is_cli_request()
            or exit("Execute via command line: php index.php migrate");
    }

    public function index()
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