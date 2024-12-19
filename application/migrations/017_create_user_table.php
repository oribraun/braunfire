<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_user_table extends CI_Migration {

    public function up() {
        // Define the table fields
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'unique' => TRUE,
                'default' => ''
            ),
            'first_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'default' => ''
            ),
            'last_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'default' => ''
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => ''
            ),
            'level' => array(
                'type' => 'INT',
                'constraint' => 1,
                'default' => 1 // Default level is LEVEL_MEMBER
            ),
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ));

        // Add primary key
        $this->dbforge->add_key('id', TRUE);

        // Create the table
        $this->dbforge->create_table('users');
    }

    public function down() {
        // Drop the table if we roll back
        $this->dbforge->drop_table('users');
    }
}
