<?php

/**
 * Class User_Model
 *
 * @method \Entities\User get(mixed $match)
 *
 */
class User_Model extends MY_Model {

	private $_message_invalid_email = 'Invalid email address';
	private $_message_email_use = 'Email address already in use';
	private $_message_invalid_password = 'Invalid Password - Needs to be 6 to 14 characters, Numbers and English letters only';
	private $_message_bad_login = 'Incorrect email or password';

	const SALT = 'fgsdfkjh54kjhek45jhv9usdf#$sdfshjh43@#';
	/**
	 *
	 */
	public function __construct()
	{
		parent::__construct('users', 'User');
        parent::addPermittedFields(['email','password']);
	}

	/**
	 * @override
	 * @param \Entities\User $user
	 * @param bool          $params
	 * @throws Exception
	 */
	public function pre_insert(\Entities\User $user, $params = false)
	{
		if (!filter_var($user->getEmail(), FILTER_VALIDATE_EMAIL)){
			throw new \Exception($this->_message_invalid_email);
		}
		if ($this->get_by_email($user->getEmail())){
			throw new \Exception($this->_message_email_use);
		}

		if (!$this->valid_password($user->getPassword())){
			throw new \Exception($this->_message_invalid_password);
		}
		$user->setPassword($this->encrypt_password($user->getPassword()));

		$this->_set_fields($user);
		$this->db->set('email', $user->getEmail());
		$this->db->set('password', $user->getPassword());
	}

	public function update_password(\Entities\User $user, $password)
	{
		if (!$this->valid_password($password)){
			throw new \Exception($this->_message_invalid_password);
		}
		$enc_pass = $this->encrypt_password($password);
		$this->db->set('password', $enc_pass);
		$this->db->where('id', $user->getId());
		$this->db->update($this->getTable());

		$user->setPassword($enc_pass);
	}

	public function update_email(\Entities\User $user, $email)
	{
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
			throw new \Exception($this->_message_invalid_email);
		}
		$this->db->where('email', $email);
		$this->db->where('id != ', $user->getId());
		if ($this->db->count_all_results($this->getTable()) > 0){
			throw new \Exception($this->_message_email_use);
		}
		$user->setEmail($email);
		$this->db->set('email', $email);
		$this->db->where('id', $user->getId());
		$this->db->update($this->getTable());
	}

	public function post_insert(\Entities\Entity $entity, $params = false)
	{
	}

	public function pre_update(\Entities\User $user, $params = false)
	{
		if (isset($params['update_email']) && $params['update_email']){
			if (!filter_var($user->getEmail(), FILTER_VALIDATE_EMAIL)){
				throw new \Exception($this->_message_invalid_email);
			}
			$this->db->where('email', $user->getEmail());
			$this->db->where('id !=', $user->getId());
			if ($this->db->count_all_results($this->getTable()) > 0){
				throw new \Exception($this->_message_email_use);
			}
			$this->db->set('email', $user->getEmail());
		}

		if (isset($params['update_password']) && $params['update_password']){
			if (!$this->user_model->valid_password($user->getPassword())){
				throw new \Exception($this->_message_invalid_password);
			}
			$user->setPassword($this->encrypt_password($user->getPassword()));
			$this->db->set('password', $user->getPassword());
		}

		$this->_set_fields($user);
	}

	public function post_update(\Entities\Entity $entity, $params = false)
	{
	}
	public function pre_delete(\Entities\Entity $entity, $params = false)
	{
	}
	public function post_delete(\Entities\Entity $entity, $params = false)
	{
	}

	private function _set_fields(\Entities\User $user, $params = false)
	{
        foreach ($user as $key => $value) {
            if($value && !in_array($key,parent::getPermittedFields())) {
                $this->db->set($key, $value);
//                echo "$key -> $value </br>";
            }
        }
//        exit;
//        var_dump($user);exit;
//		$this->db->set('level', $user->getLevel());
//		$this->db->set('first_name', $user->getFirstName());
//		$this->db->set('last_name', $user->getLastName());
	}


	public function encrypt_password($pass)
	{
		return sha1(self::SALT.$pass);
	}

	public function get_by_email($email)
	{
		return $this->get(['email' => $email]);
	}

	public function get_level_options()
	{
		$array =  array(
			array (
				'value'	=> \Entities\User::LEVEL_MEMBER,
				'text'	=> 'חבר',
			),
			array (
				'value'	=> \Entities\User::LEVEL_BUSINESS,
				'text'	=> 'עסק',
			),
			array (
				'value'	=> \Entities\User::LEVEL_EMPLOYEE,
				'text'	=> 'עובד',
			),
			array (
				'value'	=> \Entities\User::LEVEL_ADMIN,
				'text'	=> 'מנהל',
			),
			array (
				'value'	=> \Entities\User::LEVEL_OWNER_ADMIN,
				'text'	=> 'בעלים',
			)
		);

        if($this->user->isSuperAdmin()){
            array_push($array,array (
                'value'	=> \Entities\User::LEVEL_SUPER_ADMIN,
                'text'	=> 'מנהל ראשי',
            ));
        }
        return $array;
	}


	public function register(\Entities\User $user)
	{
		if (!filter_var($user->getEmail(), FILTER_VALIDATE_EMAIL)){
			throw new \Exception($this->_message_invalid_email);
		}
		if ($this->get_by_email($user->getEmail())){
			throw new \Exception($this->_message_email_use);
		}

		if (!$this->valid_password($user->getPassword())){
			throw new \Exception($this->_message_invalid_password);
		}


		$this->save_entry($user, array('update_password'=>true));
		return $user;
	}


	public function login_no_pass(\Entities\User $user)
	{
		$this->_save_session_data($user, false);
		return true;
	}

	public function login_from_session()
	{
		$user_data_session = $this->session->userdata('login_user');
		$user_data_cookie = $this->input->cookie('login_user');


		if ($user_data_session && $this->_login_user_data($user_data_session)){
		} elseif ($user_data_cookie && $this->_login_user_data($user_data_cookie)) {
		} else {
			$this->logout();
		}
	}
	private function _login_user_data($user_data)
	{
		if ($user_data == ''){
			return false;
		}
		$serialized = @unserialize($user_data);
		if (!$serialized){
			log_message('error', 'invalid user_data: '. $user_data);
		}
		if ($serialized && is_array($serialized) && isset($serialized['id']) && isset($serialized['password'])) {
			if (!isset($serialized['remember'])) $serialized['remember'] = false;
			return $this->_login_id($serialized['id'], $serialized['password'], $serialized['remember']);
		}
		return false;
	}

	private function _login_id($id, $password, $remember = false)
	{
		/* @var $user \Entities\User */
		$user = $this->user_model->get($id);
		if ($user && md5($user->getPassword()) === $password){
			$this->_save_session_data($user, $remember);
			return true;
		} else {
			$this->logout();
		}
		return false;
	}

	/**
	 * @param      $email
	 * @param      $password
	 * @param bool $set_cookie
	 * @throws Exception
	 */
	public function login_admin($email, $password, $set_cookie = false)
	{
		$email = strval($email);
		$password = strval($password);
		/* @var $user \Entities\User */
		$user = $this->user_model->get_by_email($email);

		if (!$user){
			throw new \Exception($this->_message_bad_login);
		}
		if (!$user->isAdmin()){
			throw new \Exception($this->_message_bad_login);
		}

		$enc_pass = $this->user_model->encrypt_password($password);
		if ($enc_pass === $user->getPassword() || $password === md5($user->getPassword())){
			$this->_save_session_data($user, $set_cookie);
		} else {
			throw new \Exception($this->_message_bad_login);
		}
	}

	private function _save_session_data(\Entities\User $user, $set_cookie = false)
	{
		/* @var $CI \MY_Controller */
		$CI =& get_instance();
		$user_data = serialize(array(
			'id' => $user->getId(),
			'password' => md5($user->getPassword()),
			'remember' => $set_cookie
		));

		$this->session->set_userdata('login_user', $user_data);
		if ($set_cookie){
			$cookie = array(
				'name'   => 'login_user',
				'value'  => $user_data,
				'expire' => '86500',
				'secure' => FALSE
			);
			$this->input->set_cookie($cookie);
		}

		$CI->user = $user;
	}


	/**
	 *	@param string $password	the string to be checked
	 *	@return boolean true if password consists of 0-9,a-Z and between 6 to 14 characters
	 */
	public function valid_password($password)
	{
		$pattern = '/^[a-zA-Z0-9]{6,14}$/';
		return (preg_match($pattern,$password)) > 0;
	}

	/**
	 * generate a random valid user password
	 * @return string a new random password
	 */
	public function generate_password()
	{
		$code = '';
		for ($i=0; $i<8; $i++) {
			$d=rand(1,30)%2;
			$code .= $d ? chr(rand(65,90)) : chr(rand(48,57));
		}
		return $code;
	}

	public function logout()
	{
		$this->session->unset_userdata('login_user');
		$this->session->set_userdata('login_user','');
		$this->input->set_cookie(array(
			'name'   => 'login_user',
			'secure' => TRUE
		));
		/* @var $CI \MY_Controller */
		$CI =& get_instance();
		$CI->user = new \Entities\User();
	}

	/**
	 * @param      $email
	 * @param      $password
	 * @param bool $set_cookie
	 * @throws 		Exception
	 */
	public function login_user($email, $password, $set_cookie = false)
	{
		$email = strval($email);
		$password = strval($password);
		/* @var $user \Entities\User */
		$user = $this->user_model->get_by_email($email);
		if (!$user){
			throw new \Exception($this->_message_bad_login);
		}

		$enc_pass = $this->user_model->encrypt_password($password);
		if ($enc_pass === $user->getPassword() || $password === md5($user->getPassword())){
			$this->_save_session_data($user, $set_cookie);
		} else {
			throw new \Exception($this->_message_bad_login);
		}
	}

	public function get_options($val = 'id', $txt = 'CONCAT(first_name," ",last_name)')
	{
		$this->db->select($val.' as value, '.$txt .' as text',false);
		$this->db->where('level <',Entities\User::LEVEL_SUPER_ADMIN);
		$this->db->order_by('text', 'asc');
		$query = $this->db->get($this->getTable());
		$result = $query->result();
		if (!is_array($result)){
			return [];
		}
		$options = $result;
		return array_map(function($e){ $e->value = intval($e->value); return $e; }, $options);
	}

	public function get_user_js(\Entities\User $user)
	{
		return (object)[
			'id' 			=> $user->getId(),
			'email' 		=> $user->getEmail(),
			'name' 			=> $user->getName(),
			'first_name' 	=> $user->getFirstName(),
			'last_name' 	=> $user->getLastName()
		];
	}

	public function check_password($id,$pass){
		$this->db->where('id',$id);
		$this->db->where('password',$this->encrypt_password($pass));
		$this->db->from($this->getTable());
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

}
