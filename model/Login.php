<?php
namespace Model;

class Login{
	public function check_auth($args){
		global $db;
		
		$result = array();
		
		foreach($db->dom->getElementsByTagName('user') as $user){
			$user_login = $user->getElementsByTagName('login')->item(0)->nodeValue;
			$user_password = $user->getElementsByTagName('password')->item(0)->nodeValue;
			
			if(($user_login == $args['Login']) && ($user_password == md5_encode($args['Password']))){
				$user_name = $user->getElementsByTagName('name')->item(0)->nodeValue;
				return $user_name;
			}
			
		}
		
		return false;
	}
	
	
}

?>