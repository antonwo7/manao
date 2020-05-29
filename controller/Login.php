<?php
namespace Controller;

class Login extends \Controller {
	
	public $messages = array();
	
	public function Index(){
		
		if(isLogged()){
			$data['action_logout'] = get_controller_method_url('Login', 'doLogout');
			$data['user_name'] = $_SESSION["user_name"];
			return \View::viewGet('Login_logged', $data);
		}
		
		$data['action_login'] = get_controller_method_url('Login', 'doLogin');
		return \View::viewGet('Login_form', $data);
	}
	
	public function doLogin(){
		$result = array();
		$data = array();
		
		$args['Login'] = $_POST["Login"];
		$args['Password'] = $_POST["Password"];
		
		if($this->Validate($args)){
			
			if($result_user_name = \Loader::loadModel('Login', 'check_auth', $args)){
				
				$_SESSION["is_auth"] = true;
				$_SESSION["user_login"] = $args['Login']; 
				$_SESSION["user_name"] = $result_user_name;
				
				$data['action_logout'] = get_controller_method_url('Login', 'doLogout');
				$data['messages']['success'] = 'Successfully logged!';
				$data['user_name'] = $result_user_name;
				$result['content'] = \View::viewGet('Login_logged', $data);
				$result['logged'] = true;
				
				header('Content-Type: application/json');
				echo json_encode($result);
				return;
			
			}
			else{
				$this->messages['errors'][] = 'Login or password incorrect!';
			}
			
		}
		
		$data['messages'] = $this->messages;
		$data['action_login'] = get_controller_method_url('Login', 'doLogin');
		$result['content'] = \View::viewGet('Login_form', $data);
		$result['logged'] = false;
		
		header('Content-Type: application/json');
		echo json_encode($result);
	}
	
	public function doLogout(){
		
		session_destroy();
		
		redirect();
		
	}
	
	public function Validate(&$args){
		$args['Login'] = e($args['Login']);
		$args['Password'] = en($args['Password']);
		
		if(strlen($args['Login']) < 2) $this->messages['errors'][] = 'Field Login less than 2 characters';
		if(strlen($args['Password']) < 2) $this->messages['errors'][] = 'Field Password less than 2 characters';
		
		if(!empty($this->messages['errors'])) 
			return false;
		return true;
	}
}