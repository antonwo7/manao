<?php

function get_current_url(){
	return SITE_URL . $_SERVER['REQUEST_URI'];
}

function get_path(){
	$path_with_get = $_SERVER['REQUEST_URI'];
	$path = preg_replace('/ \/ (.+) \/ \??.* $ /xsi', '$1', $path_with_get);
	return $path;
}

function get_controller_method_url($controller, $method = 'Index'){
	$result .= '/' . $controller . '/' . $method . '/';
	return $result;
}

function e($value){
	 return htmlspecialchars(stripslashes(trim($value)));
}
function en($value){
	 return htmlspecialchars(trim($value));
}

function isLogged(){
	
	 if (isset($_SESSION["is_auth"])) { 
		return $_SESSION["is_auth"];
	}
	return false; 
}

function redirect($url = SITE_URL){
	header('Location: ' . $url);
}

function md5_encode($value){
	return md5($value . SALT);
}
