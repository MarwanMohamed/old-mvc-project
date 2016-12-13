<?php
require_once '../includes/autoloader.php';

class eCommerce {
	protected $cxn;

	function connectToDB(){
		$this->cxn = new Database();
	}
}
