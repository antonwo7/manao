<?php
Class Database{
	public $dom;
	
	public function __construct(){
		$dom = new DOMDocument();
		// $dom->validateOnParse = true;
		if( @$dom->load(DB_URL) ){
			$this->dom = $dom;
		}else{
			die("Нет подключения к базе данных");
		}
	}
	
	public function __destruct(){
		
	}

}
?>