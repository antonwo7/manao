<?php
namespace Controller;

class Registration extends \Controller {
	
	public $messages = array();
	
	public function Index(){
		
		$data['messages'] = $this->messages;
		$data['action_registration'] = get_controller_method_url('Registration', 'doRegistration');
		
		return \View::viewGet('Registration', $data);
		
	}
	public function doRegistration1(){
		$result['content'] = $_POST["Login"];
		header('Content-Type: application/json');
		echo json_encode($result);
	}
	public function doRegistration(){
		
		$args['Login'] = $_POST["Login"];
		$args['Password'] = $_POST["Password"];
		$args['Confirm'] = $_POST["Confirm"];
		$args['Name'] = $_POST["Name"];
		$args['Email'] = $_POST["Email"];
		
		if($this->Validate($args) && $this->checkUser($args)){
			\Loader::loadModel('Registration', 'add_user', $args);
			$this->messages['success'] = 'User was registrated. You can login now';
		}
		
		$data['messages'] = $this->messages;
		$data['action_registration'] = get_controller_method_url('Registration', 'doRegistration');
		$result['content'] = \View::viewGet('Registration', $data);
		
		header('Content-Type: application/json');
		echo json_encode($result);
	}
	
	
	public function checkUser($args){
		if(!\Loader::loadModel('Registration', 'check_user', $args)){
			$this->messages['errors'][] = 'User is already registrated';
			return false;
		}
		
		return true;
	}
	
	public function Validate(&$args){
		foreach($args as $key => $arg){
			if($key != 'Password')
				$args[$key] = e($arg);
		}
		
		if(strlen($args['Login']) < 2) $this->messages['errors'][] = 'Field Login less than 2 characters';
		if(strlen($args['Password']) < 2) $this->messages['errors'][] = 'Field Password less than 2 characters';
		if($args['Confirm'] != $args['Password']) $this->messages['errors'][] = 'Password != Confirm';
		if(strlen($args['Name']) < 2) $this->messages['errors'][] = 'Field Login less than 2 characters';
		if(strlen($args['Email']) < 2) $this->messages['errors'][] = 'Field Password less than 2 characters';
		if(!preg_match('/ .+@.+\..+ /xsi', $args['Email'])) $this->messages['errors'][] = 'Field Email is not an email';
		
		$args['Password'] = md5_encode( en( $args['Password'] ) );
		
		if(!empty($this->messages['errors'])) 
			return false;
		return true;
	}
}