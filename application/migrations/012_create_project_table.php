<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_project_table extends CI_Migration {

    public function up() {
        // Define the table fields
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'project_serial' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => ''
            ),
            'address' => array(
                'type' => 'TEXT',
            ),
            'project_status_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ),
            'project_condition' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => ''
            ),
            'print_shop_link_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ),
            'payment_status' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => ''
            ),
            'contract_status' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => ''
            ),
            'notes' => array(
                'type' => 'TEXT',
            ),
            'water_specs' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ),
            'water_shield' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ),
            'committee_approve' => array(
                'type' => 'INT',
                'constraint' => 1,
                'default' => 0
            ),
            'architect_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ),
            'company_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ),
            'project_manager_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ),
            'manager_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => ''
            ),
            'manager_email' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => ''
            ),
            'manager_mobile' => array(
                'type' => 'VARCHAR',
                'constraint' => '15',
                'default' => '0'
            ),
            'manager_phone' => array(
                'type' => 'VARCHAR',
                'constraint' => '15',
                'default' => '0'
            ),
            'working_user_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ),
            'consultants_notes' => array(
                'type' => 'TEXT',
            ),
            'project_criticism_num' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ),
            'manager_notes' => array(
                'type' => 'TEXT',
            ),
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ));

        // Add primary key
        $this->dbforge->add_key('id', TRUE);

        // Create the table
        $this->dbforge->create_table('projects');
    }

    public function down() {
        // Drop the table if we roll back
        $this->dbforge->drop_table('projects');
    }
}
