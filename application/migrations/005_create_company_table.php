<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_company_table extends CI_Migration {

    public function up() {
        // Define the table fields
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'first_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => ''
            ),
            'last_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => ''
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => ''
            ),
            'social_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ),
            'address' => array(
                'type' => 'TEXT',
            ),
            'post_box' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ),
            'post_code' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ),
            'phone' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ),
            'mobile' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ),
            'fax' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ),
            'account_manager_id' => array(
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
        $this->dbforge->create_table('companies');
    }

    public function down() {
        // Drop the table if we roll back
        $this->dbforge->drop_table('companies');
    }
}
