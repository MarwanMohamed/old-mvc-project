<?php
 require_once '../includes/autoloader.php';

if (isset($_POST)) {

	$username = $_POST['username'];
	$password = $_POST['password'];
	$hassPass = sha1($_POST['password']);
	try {
		$login = new Login($username, $hassPass);
		if ($login == TRUE) {
			session_start();
	        $_SESSION['admin'] = $username;
	    	$_SESSION['adminID'] = $login->id;
			header("Location: ../controllers/Dashboard.php");
		}

	} catch (Exception $e) {
		header("Location: ../login.php?e=error");
	}
}
