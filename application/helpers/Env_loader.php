<?php
// Load environment variables using Dotenv

function load_env() {
    // Ensure the autoload file is loaded (for Composer packages)
    if (file_exists(APPPATH . '../vendor/autoload.php')) {
        require_once APPPATH . '../vendor/autoload.php';
    }


    // Check if Dotenv class exists and load the .env file
    if (class_exists('Dotenv\Dotenv')) {
        $dotenv = Dotenv\Dotenv::createUnsafeImmutable(FCPATH);
        $dotenv->load();
    } else {
        log_message('error', 'Dotenv class not found. Make sure the "phpdotenv" library is installed.');
    }
}
