<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_default_user extends CI_Migration {

    public function up()
    {
//         $this->load->library('Env_loader');
        // Prepare data for the default admin user
        $this->load->model('user_model');
        echo "start setting up user<br>\n";
        $this->insert_default_user();
        echo "done setting up user<br>\n";
    }

    public function down()
    {
        $email = getenv('ADMIN_EMAIL');
        // To roll back this migration, we remove the default admin user
        $this->db->where('email', $email);
        $this->db->delete('users');
    }

    private function insert_default_user()
    {
        // Prepare data for the default super admin user
        $email = getenv('ADMIN_EMAIL');
        $username = getenv('ADMIN_USERNAME');
        $password = getenv('ADMIN_PASSWORD');

        // Use the encrypt_password method from User_model to encrypt the password
        $hashed_password = $this->user_model->encrypt_password($password); // SHA1(self::SALT . $password)

        $user_level = 6;  // LEVEL_SUPER_ADMIN (6)

        // Data for inserting the default super admin user
        $data = array(
            'email' => $email,
            'password' => $hashed_password,
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'level' => $user_level, // Set the user level to LEVEL_SUPER_ADMIN (6)
        );

        // Insert the default super admin user
        $this->db->insert('users', $data);

        // Output message to confirm the user creation
        echo "Default super admin user created successfully.<br>\n";
    }
}
