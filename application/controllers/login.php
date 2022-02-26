<?php

Class Login extends MY_Controller
{
	public function __construct()
	{
		parent::__construct(SSL_MODE_FORCE);
		if ($this->user->isAdmin()){
			header('Location: '.admin_url());
			exit;
		}
	}

	public function ajax_submit()
	{
		$email = trim(strval($this->input->post("email")));
		$password = trim(strval($this->input->post("password")));
		$remember = intval($this->input->post("remember")) == 1;

		try {
			$this->user_model->login_admin($email, $password, $remember);
			$this->ajax->json_response(array('user_id'=>$this->user->getId()));
		} catch(Exception $e){
			$this->ajax->json_error($e->getMessage());
		}
	}

	public function ajax_register()
	{
		$email = trim(strval($this->input->post("email")));
		$password = trim(strval($this->input->post("password")));
		$remember = intval($this->input->post("remember")) == 1;

		$entity = $this->user_model->newInstance();

		$entity->setEmail($email);
		$entity->setPassword($password);
		try {
			$this->user_model->register($entity);
			$this->user_model->login_user($email, $password, $remember);
			$this->ajax->json_response(array('user_id'=>$this->user->getId()));
		} catch(Exception $e){
			$this->ajax->json_error($e->getMessage());
		}
	}
}