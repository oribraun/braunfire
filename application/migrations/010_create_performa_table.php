<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_performa_table extends CI_Migration {

    public function up() {
        // Define the table fields
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'project_payment_level_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ),
            'performa_number' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ),
            'payment_days' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => ''
            ),
            'price' => array(
                'type' => 'DECIMAL',
                'constraint' => '15,2',
                'default' => 0
            ),
            'percent' => array(
                'type' => 'DECIMAL',
                'constraint' => '5,2',
                'default' => 0
            ),
            'delivered' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ),
            'partial_payed' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ),
            'partial_payed_price' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => ''
            ),
            'more_payed' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ),
            'more_payed_price' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => ''
            ),
            'approved' => array(
                'type' => 'INT',
                'constraint' => 1,
                'default' => 0
            ),
            'payed_no_fee' => array(
                'type' => 'DECIMAL',
                'constraint' => '15,2',
                'default' => 0
            ),
            'payed_with_fee' => array(
                'type' => 'DECIMAL',
                'constraint' => '15,2',
                'default' => 0
            ),
            'invoice' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ),
            'invoice_number' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ),
            'notes' => array(
                'type' => 'TEXT',
            ),
            'notify_date' => array(
                'type' => 'DATE',
                'null' => TRUE
            ),
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ));

        // Add primary key
        $this->dbforge->add_key('id', TRUE);

        // Create the table
        $this->dbforge->create_table('performas');
    }

    public function down() {
        // Drop the table if we roll back
        $this->dbforge->drop_table('performas');
    }
}
