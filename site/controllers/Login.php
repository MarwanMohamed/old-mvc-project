<?php
include '../includes/autoloader.php';

if ($_POST) {

  if (isset($_POST['Register'])) {

    $data['username'] = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
  	$data['password'] = sha1($_POST['password']);
  	$pass2 = sha1($_POST['passwordTwo']);
  	$data['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $data['date'] = date("Y:m:d");

    $errors = array();

    if (strlen($data['username']) < 4) {
			$errors[] = 'Username can\'t be less than 4 char';
		}

    if (isset($data['password']) && isset($pass2)) {

			if (empty($data['password'])) {
			$errors[] = 'Password can\'t be empty';
		}

			if (sha1($data['password']) !== sha1($pass2)) {
			$errors[] = 'Sorry Password is not match';
			}

		}

    if (filter_var($data['email'], FILTER_VALIDATE_EMAIL) != TRUE) {
        $errors[] = 'This email is not valid';
    }

    if (empty($errors)) {
      $categories = new Display('categories');
      $Cats = $categories->categories();

      $add = new Add('users', $data);
      $insert = $add->insert();

      if ($insert == true) {
        $insertData = array();
        $insertData[] = 'Register Successfuly';
        include '../views/login.php';
      }
    }else{
      $categories = new Display('categories');
      $Cats = $categories->categories();
      include '../views/login.php';
    }

  }

  if (isset($_POST['Login'])) {
    	$user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    	$pass = $_POST['password'];
    	$hasPass  = sha1($pass);
      try {
        $login = new Login($user, $hasPass);
        if ($login == TRUE) {
          session_start();
          $_SESSION['user'] = $user;
          $_SESSION['userID'] = $login->id;
          header("Location: ../views/index.php");
        }
      }catch (Exception $e) {
        $errors = array();
        $errors[]= 'username or password wrong';
        $categories = new Display('categories');
        $Cats = $categories->categories();
        include '../views/login.php';
    	}
  }

}else {
  $categories = new Display('categories');
  $Cats = $categories->categories();
  include '../views/login.php';
}
