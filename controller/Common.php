<?php
namespace Controller;

class Common extends \Controller{
	public function Index(){
		$data['login'] = \Loader::loadController('Login');
		
		if(!isLogged())
			$data['registration'] = \Loader::loadController('Registration');
		
		\View::viewOutput('Common', $data);
	}
}