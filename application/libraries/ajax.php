<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of ajax
 *
 * @author Gal
 */
class Ajax {
	
	
	public function __construct()
	{
		
	}

	/**
	 * @param mixed $data
	 */
	public function json_response($data=null)
	{
		$jsonObj = new stdClass;
		$jsonObj->err = 0;
		$jsonObj->errdesc = '';
		if ($data != null){
			foreach ($data as $k=>$v){
				$jsonObj->$k = $v;
			}
		}
		$this->json_output($jsonObj);
	}
	
	public function json_output($data)
	{
		header("Content-Type: application/json");
		echo json_encode($data);
		exit;
	}

	/**
	 * @param      $err
	 * @param bool $exit
	 */

	public function json_error($err, $exit = true)
	{
		$jsonObj = new stdClass;
		if (is_string($err)){
			$jsonObj->err = 1;
			$jsonObj->errdesc = $err;
		} else {
			$jsonObj->err = $err->getCode();
			$jsonObj->errdesc = $err->getMessage();
		}


		$this->json_output($jsonObj);
		if ($exit){
			exit;
		}
	}
	
}

