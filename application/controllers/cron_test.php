<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cron_Test extends MY_Controller {


    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        log_message('ERROR','cron test file');
    }
}