<?php
/**
 * Created by PhpStorm.
 * User: private
 * Date: 17/08/14
 * Time: 14:50
 */

class Users extends MY_Controller {

	public function __countsrct()
	{
		parent::__construct();
	}



	public function ajax_get_user($id)
	{

		$user = $this->user_model->get($id);
		$this->ajax->json_response([
			'user' => $user
		]);
	}

	public function ajax_update_user()
	{
		$id = intval($this->input->post('id'));
		$first_name = trim(strval($this->input->post('first_name')));
		$last_name = trim(strval($this->input->post('last_name')));
		$email = trim(strval($this->input->post('email')));
		$update_password = intval($this->input->post('update_password'));

		if ($id > 0){
			if (!($entity = $this->user_model->get($id))){
				$this->ajax->json_error('No User Found');
			}
		} else {
			$entity = $this->user_model->newInstance();
		}

		$entity->setFirstName($first_name);
		$entity->setLastName($last_name);
		$entity->setEmail($email);

		if($update_password){
			$current_password = trim(strval($this->input->post('current_password')));
			$new_password = trim(strval($this->input->post('new_password')));
			$confirm_password = trim(strval($this->input->post('confirm_password')));
			$result = $this->user_model->check_password($id,$current_password);
			if(count($result) > 0){
				if($new_password == '' && $confirm_password == ''){
					$this->ajax->json_error('new password are empty');
				}
				if($new_password != $confirm_password){
					$this->ajax->json_error('new password do not match');
				}
				if($new_password == $current_password){
					$this->ajax->json_error('same password entered');
				}
				$entity->setPassword($new_password);
			}else{
				$this->ajax->json_error('current password do not match');
			}
		}

		try{
			$params = [];
			$params['update_email'] = true;
			if($update_password){
				$params ['update_password'] = true;
			}
			$this->user_model->save_entry($entity ,$params);
			$this->ajax->json_response();
		} catch(Exception $e){
			$this->ajax->json_error($e->getMessage());
		}
	}

	public function ajax_update_password()
	{
		$id = intval($this->input->post('id'));

		if (!($entity = $this->user_model->get($id))){
			$this->ajax->json_error('No User Found');
		}

		$current_password = trim(strval($this->input->post('current_password')));
		$new_password = trim(strval($this->input->post('new_password')));
		$confirm_password = trim(strval($this->input->post('confirm_password')));
		$result = $this->user_model->check_password($id,$current_password);
		if(count($result) > 0){
			if($new_password == '' && $confirm_password == ''){
				$this->ajax->json_error('new password are empty');
			}
			if($new_password != $confirm_password){
				$this->ajax->json_error('new password do not match');
			}
			if($new_password == $current_password){
				$this->ajax->json_error('same password entered');
			}
			$entity->setPassword($new_password);
		}else{
			$this->ajax->json_error('current password do not match');
		}
		try{
			$this->user_model->update_password($entity ,$new_password);
			$this->ajax->json_response();
		} catch(Exception $e){
			$this->ajax->json_error($e->getMessage());
		}
	}
} 