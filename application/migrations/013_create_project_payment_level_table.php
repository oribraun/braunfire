<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_project_payment_level_table extends CI_Migration {

    public function up() {
        // Define the table fields
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'project_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ),
            'price' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => 0.00
            ),
            'notes' => array(
                'type' => 'TEXT',
            ),
            'total_buildings' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ),
            'lot' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => ''
            ),
            'created datetime default current_timestamp',
            'updated datetime default current_timestamp on update current_timestamp',
        ));

        // Add primary key
        $this->dbforge->add_key('id', TRUE);

        // Create the table
        $this->dbforge->create_table('project_payment_levels');
    }

    public function down() {
        // Drop the table if we roll back
        $this->dbforge->drop_table('project_payment_levels');
    }
}
