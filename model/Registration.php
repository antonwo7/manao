<?php
namespace Model;

class Registration{
	public function add_user($args){
		global $db;
		
		$users_nodes = $db->dom->getElementsByTagName('users');
		$users_node = $users_nodes->item(0);
		$user_node_new = $db->dom->createElement('user');
		
		$user_node_new->appendChild($db->dom->createElement('name', $args['Name']));
		$user_node_new->appendChild($db->dom->createElement('login', $args['Login']));
		$user_node_new->appendChild($db->dom->createElement('password', $args['Password']));
		$user_node_new->appendChild($db->dom->createElement('email', $args['Email']));
		
		$users_node->appendChild($user_node_new);	
		$db->dom->save(DB_URL);

	}
	
	public function check_user($args){
		global $db;
		
		foreach($db->dom->getElementsByTagName('user') as $user){
			$user_login = $user->getElementsByTagName('login')->item(0)->nodeValue;
			$user_email = $user->getElementsByTagName('email')->item(0)->nodeValue;
			
			if(($user_login == $args['Login']) || ($user_email == $args['Email'])){
				return false;
			}
		}
		
		return true;

	}
}

?>