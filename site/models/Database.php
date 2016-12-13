<?php

class Database {

	private $hots;
	private $user;
	private $password;
	private $dbName;
	public $con;

	public function __construct ()
	{
		$this->setData();
		$this->connect();
	}

	function setData() {
		$this->host 	= 'localhost';
		$this->user    	= 'root';
		$this->password = 'root';
		$this->dbName 	= 'ecommerce2';
	}

	function connect() {
		try {
			$this->con = new PDO ("mysql:localhost=$this->host;dbname=$this->dbName",$this->user,$this->password,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
}
