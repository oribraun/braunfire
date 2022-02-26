<?php
/**
 * Created by PhpStorm.
 * User: private
 * Date: 17/08/14
 * Time: 14:50
 */

class Users extends Admin_Controller {

	public function __construct()
	{
		parent::__construct('users');
		$this->permission_owner_admin();
	}

	public function index()
	{
		$this->layout->view('admin/users/list');
	}


	public function add()
	{
		$data = [];
		$data['level_options'] = $this->user_model->get_level_options();
		$data['entity'] = $this->user_model->newInstance();
		$this->layout->view('admin/users/form',$data);
	}

	public function edit($id = 0)
	{
		if (!($user = $this->user_model->get($id))){
			show_404();
		}
		if($user->getEmail() == 'support@braun.com') {
			header('Location: '. admin_url('users'));

		}
		$data = [];
		$data['level_options'] = $this->user_model->get_level_options();
		$data['entity'] = $user;
		$this->layout->view('admin/users/form' , $data);
	}
	public function ajax_load()
	{

		$users = $this->user_model->get_all_for_form(['first_name','last_name','email']);
        $levels = $this->user_model->get_level_options();
//        var_dump($levels);
        foreach($users as $u) {
            if(!$this->user->isSuperAdmin() && $u->getLevel() == \Entities\User::LEVEL_SUPER_ADMIN) {
                continue;
            }
            $u->level_name = $levels[$u->getLevel()-1]["text"];
        }
		$this->ajax->json_response([
			'entities' => $users
		]);
	}

    /**
     *
     */
    public function ajax_save()
	{

        $post_fields = (array)$this->input->post();
//        var_dump(extract($post_fields,EXTR_PREFIX_SAME,"dup"));
        $array = [];
        foreach($post_fields as $key => $val){
//            echo "$key -> $val </br>";
            $$key = $val;
            $array[$key] = $val;
        }
//        exit;
//        var_dump($id);
//        var_dump($first_name);
//        var_dump($last_name);
//        var_dump($email);
//        var_dump($password);
//        var_dump($level);exit;
//		$id = intval($this->input->post('id'));
//		$first_name = trim(strval($this->input->post('first_name')));
//		$last_name = trim(strval($this->input->post('last_name')));
//		$email = trim(strval($this->input->post('email')));
//		$password = trim(strval($this->input->post('password')));
//		$level = intval($this->input->post('level'));
//		$update_password = intval($this->input->post('update_password'));

		if (isset($id) && $id > 0){
			if (!($entity = $this->user_model->get($id))){
				$this->ajax->json_error('לא נמצאה רשומה עם ID זה');
			}
		} else {
			$entity = $this->user_model->newInstance();
		}

		$entity->setFirstName(trim(strval(isset($first_name) ? $first_name : '')));
		$entity->setLastName(trim(strval(isset($last_name) ? $last_name : '')));
		if($entity->getEmail() != "support@braun.com"){
			$entity->setEmail(trim(strval(isset($email) ? $email : '')));
		}
		$entity->setLevel(intval(isset($level) ? $level : ''));
		if(isset($password) && $password != ''){
			$entity->setPassword(trim(strval($password)));
		}

		if(isset($update_password) && $update_password){
//			$current_password = trim(strval($this->input->post('current_password')));
//			$new_password = trim(strval($this->input->post('new_password')));
//			$confirm_password = trim(strval($this->input->post('confirm_password')));
			$result = $this->user_model->check_password($id,isset($current_password) ? $current_password : '');
			if(count($result) > 0){
				if(isset($new_password) && $new_password == '' && isset($confirm_password) && $confirm_password == ''){
					$this->ajax->json_error('נא למלא סיסמא חדשה');
				}
				if($new_password != $confirm_password){
					$this->ajax->json_error('סיסמאות חדשות לא תואמות');
				}
				if($new_password == $current_password){
					$this->ajax->json_error('סיסמה זהה לקודמת');
				}
				$entity->setPassword($new_password);
			}else{
				$this->ajax->json_error('סיסמה שגויה');
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

	function ajax_delete()
	{
		$id = intval($this->input->post('id'));
		$email = strval($this->input->post('email'));

		if($email == 'support@braun.com'){
			$this->ajax->json_error('cannot delete this user');
		}

		try{
			$entity = $this->user_model->newInstance();
			$entity->setId($id);
			$this->user_model->delete_entry($entity);
			$this->ajax->json_response(["id"=> $id]);
		}catch(Exception $e){
			$this->ajax->json_error($e->getMessage());
		}
	}

} 