<?php
session_start();
include '../includes/autoloader.php';

if (isset($_POST['submit'])) {
  $data['name']    	   = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	$data['description'] = filter_var( $_POST['description'], FILTER_SANITIZE_STRING);
	$data['price'] 		   = filter_var( $_POST['price'], FILTER_SANITIZE_NUMBER_INT);
  $data['date']        = date("Y:m:d");
  $data['aprove']      = 0;
	$data['catID'] 	     = filter_var( $_POST['category'], FILTER_SANITIZE_NUMBER_INT);
  $data['userID']     = $_SESSION['userID'];

  $errors = array();

  if (empty($data['name']) ) {
	   $errors[] = 'Item Name can\'t be empty';
	}

  if (strlen($data['name']) < 4) {
	   $errors[] = 'Item Name must be at least 4 char';
	}

	if (strlen($data['description']) < 20) {
	   $errors[] = 'Item Describtion must be at least 20 char';
	}

	if (empty($data['price'])) {
	   $errors[] = 'Item Price can\'t be empty';
	}

	if ($data['catID'] == 0) {
	   $errors[] = 'Item Category can\'t be empty';
	}


	if (empty($errors)) {
      $add = new Add('items', $data);
      $insert = $add->insert();
      if ($insert == true) {
        $insertData = array();
        $insertData[] = 'Added Successfuly';
        if (isset($_SESSION['user'])) {
          $active = new Display('users');
          $user = $_SESSION['user'];
          $activeUser = $active-> userStat($user);
        }else {
          header("Location: ../views/index.php ");
        }
        $categories = new Display('categories');
        $Cats = $categories->categories();
        include '../views/addAdv.php';

      }
  }else {
    if (isset($_SESSION['user'])) {
      $active = new Display('users');
      $user = $_SESSION['user'];
      $activeUser = $active-> userStat($user);
    }else {
      header("Location: ../views/index.php ");
    }
    $categories = new Display('categories');
    $Cats = $categories->categories();
    include '../views/addAdv.php';
  }

}else{

  if (isset($_SESSION['user'])) {
    $active = new Display('users');
    $user = $_SESSION['user'];
    $activeUser = $active-> userStat($user);
  }else {
    header("Location: ../views/index.php ");
  }
  $categories = new Display('categories');
  $Cats = $categories->categories();
  include '../views/addAdv.php';

}
