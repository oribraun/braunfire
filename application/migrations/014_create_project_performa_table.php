<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_project_performa_table extends CI_Migration {

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
            'text' => array(
                'type' => 'TEXT',
            ),
            'need_to_send' => array(
                'type' => 'INT',
                'constraint' => 1,
                'default' => 1
            ),
            'is_delivered' => array(
                'type' => 'INT',
                'constraint' => 1,
                'default' => 0
            ),
            'payed' => array(
                'type' => 'INT',
                'constraint' => 1,
                'default' => 0
            ),
            'delivered_user_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ),
            'need_send_user_id' => array(
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
        $this->dbforge->create_table('project_performas');
    }

    public function down() {
        // Drop the table if we roll back
        $this->dbforge->drop_table('project_performas');
    }
}
