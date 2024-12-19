<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_print_shop_link_table extends CI_Migration {

    public function up() {
        // Define the table fields
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'name' => array(
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
        $this->dbforge->create_table('print_shop_links');
    }

    public function down() {
        // Drop the table if we roll back
        $this->dbforge->drop_table('print_shop_links');
    }
}
