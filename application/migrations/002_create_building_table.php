<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_building_table extends CI_Migration {

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
            'building_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => ''
            ),
            'building_address' => array(
                'type' => 'TEXT',
            ),
            'building_type_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ),
            'building_block' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'default' => ''
            ),
            'building_lot' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'default' => ''
            ),
            'building_ground' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'default' => ''
            ),
            'muni_num' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ),
            'building_num' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ),
            'fire_num' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ),
            'committee_approve' => array(
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0
            ),
            'building_status_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ),
            'architect_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ),
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ));

        // Add primary key
        $this->dbforge->add_key('id', TRUE);

        // Create the table
        $this->dbforge->create_table('buildings');
    }

    public function down() {
        // Drop the table if we roll back
        $this->dbforge->drop_table('buildings');
    }
}
