<?php

class Login extends eCommerce {

	private $username;
	private $password;
	public $id;
	public function __construct($username, $password) {
		$this->setData($username, $password);
		$this->connectToDB();
		$this->Login();
	}

	function setData($username, $password) {
		$this->username = $username;
		$this->password = $password;
	}

	function Login() {
		$query = "SELECT * FROM users WHERE username = ? AND password = ?";
		$sql = $this->cxn->con->prepare($query);
		$sql->bindparam(1, $this->username, PDO::PARAM_STR);
    $sql->bindparam(2, $this->password, PDO::PARAM_STR);
		$sql->execute();
		$result = $sql->fetch();
		$this->id = $result['id'];
		if ($result != false) {
			return true;
			return $result;
		}else {
			throw new Exception("username or password wrong");
		}
	}
}
