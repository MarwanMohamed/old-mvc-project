<?php
require_once '../includes/autoloader.php';
if ($_POST || @$_GET) {

  //panding Member
  if (isset($_GET['do']) && $_GET['do'] == 'panding') {
    $display = new Display('users');
    $AllData = $display->getPanding();
    include '../views/members.php';

  }

  // Edit Page
  if (isset($_GET['do']) && $_GET['do'] == 'Edit') {
    try {
      $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
      $display = new Display('users');
      $displayData = $display->getDataById($id);
      include '../views/editMembers.php';
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }


  //Add Member
  if (isset($_GET['do']) && $_GET['do'] == 'Add') {
    include '../views/addMembers.php';
  }

  //Insert Page
  if (isset($_GET['do']) && $_GET['do'] == 'insert') {
    $user['username'] = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $user['email'] 	  = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $user['password'] = sha1($password);
		$user['fullName'] = filter_var($_POST['fullName'],FILTER_SANITIZE_STRING);
    $user['groupID'] = 0;
    $user['regStatus'] = 0;
    $user['date'] = date('Y-m-d');

    //validation form
    $errors = array();
    if (empty($user['username'])) {
      $errors[] = 'Username can\'t be empty';
    }

    if (strlen($user['username']) < 3 ) {
      $errors[] = 'Username can\'t be less than 3 char';
    }

    if(strlen($user['username']) > 15){
          $errors[] = 'Username can\'t be more than 15 char';
    }

    if (empty($user['email'])) {
      $errors[] = 'Email can\'t be empty';
    }

    if (empty($user['fullName'])) {
      $errors[] = 'Full name can\'t be empty';
    }

    if (empty($errors)) {
      $tableName = 'users';
      include '../models/Add.php';
      $add = new Add($tableName, $user);
      $insert = $add->insert();
      if ($insert == TRUE) {
        $insertData = array();
        $insertData[] = 'Added Successfuly';
        $display = new Display('users');
        $AllData = $display->getAllData();
        header("refresh:2;url=../controllers/members.php");
        include '../views/members.php';
      }
    }else{
      include '../views/addMembers.php';

    }

  }

  //Active Member
  if (isset($_GET['do']) && $_GET['do'] == 'Active') {
    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
    $tableName = 'users';
    include '../models/Active.php';
    $active = new Active($tableName, $id);
    $actived = $active->Active();
    if ($actived == true) {
      header("Location: ../controllers/Members.php?do=panding");
    }
  }

  //Detete Member
  if (isset($_GET['do']) && $_GET['do'] == 'Delete') {
    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
    $delete = new Delete('users');
    $DeleteMember = $delete->Delete($id);
    if ($DeleteMember == True) {
      $delete = array();
      $delete[] = 'Successfuly Deleted';
      $display = new Display('users');
      $AllData = $display->getAllData();
      header("refresh:2;url= ../controllers/Members.php");
      include '../views/members.php';
    }
  }

  // Update Page
  if (isset($_GET['do']) && $_GET['do'] == 'Update') {
    $id = intval($_POST['id']);
    $data['username'] = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $data['password'] = empty($_POST['password']) ? $_POST['oldPassword'] : sha1($_POST['password']);
    $data['email'] 	  = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
		$data['fullName'] = filter_var($_POST['fullName'],FILTER_SANITIZE_STRING);

    $errors = array();

    //validation form
    if (empty($data['username'])) {
      $errors[] = 'Username can\'t be empty';
    }

    if (strlen($data['username']) < 3 ) {
      $errors[] = 'Username can\'t be less than 3 char';
    }

    if(strlen($data['username']) > 15){
					$errors[] = 'Username can\'t be more than 15 char';
		}

    if (empty($data['email'])) {
      $errors[] = 'Email can\'t be empty';
    }

    if (empty($data['fullName'])) {
      $errors[] = 'Full name can\'t be empty';
    }

    if (empty($errors)) {
      $tableName = 'users';
      include '../models/Update.php';
      $update = new Update($tableName, $data);
      $edit = $update->Update($id);
      if ($edit == true) {
        $done = array();
        $done[] = 'Successfuly Update';
        $display = new Display('users');
        $displayData = $display->getDataById($id);
        include '../views/editMembers.php';
      }
    }else {
      $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
      $display = new Display('users');
      $displayData = $display->getDataById($id);
      include '../views/editMembers.php';
    }
  }

}else{
  $display = new Display('users');
  $AllData = $display->getAllData();
  include '../views/members.php';
}
