<?php
include '../includes/autoloader.php';

if ($_POST || $_GET) {

  if (isset($_GET['do']) && $_GET['do'] == 'Add') {
    $dataUsers = new Display('users');
    $users = $dataUsers->Data();
    $dataCat = new Display('categories');
    $cats = $dataCat->Data();
    include '../views/addItems.php';
  }

  if (isset($_GET['do']) && $_GET['do'] == 'Insert') {
    $item['name'] = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
    $item['description'] = filter_var($_POST['description'],FILTER_SANITIZE_STRING);
    $item['price'] = filter_var($_POST['price'],FILTER_SANITIZE_STRING);
    $item['date'] = date('Y:m:d');
    $item['userID'] = $_POST['member'];
    $item['catID'] = $_POST['category'];

    $errors = array();

				if(empty($item['name'])){
					$errors[] = 'Name can\'t be empty';
				}

				if(strlen($item['name']) < 4){
					$errors[] = 'Name can\'t be less than 4 char';
				}

				if(strlen($item['name']) > 20){
					$errors[] = 'Name can\'t be more than 20 char';
				}
				if(empty($item['description'])){
					$errors[] = 'Describtion can\'t be empty';
				}

				if(empty($item['price'])){
					$errors[] = 'Price can\'t be empty';
				}

					if($item['catID'] == 0){
					$errors[] = 'You must choose the category';
				}
					if($item['userID'] == 0){
					$errors[] = 'You must choose the member';
				}

        if (empty($errors)) {
          $tableName = 'items';
          include '../models/Add.php';
          $add = new Add($tableName, $item);
          $insert = $add->insert();
          if ($insert == true) {
            $insertData = array();
            $insertData[] = 'Added Successfuly';
            $display = new Display('items');
            $displayData = $display->displayData();
            header("refresh:2;url=../controllers/Items.php");
            include '../views/items.php';
        }
      }else{
        $dataUsers = new Display('users');
        $users = $dataUsers->Data();
        $dataCat = new Display('categories');
        $cats = $dataCat->Data();
        include '../views/addItems.php';
      }
  }

  if (isset($_GET['do']) && $_GET['do'] == 'Approve') {
    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
    $tableName = 'items';
    include '../models/Active.php';
    $active = new Active($tableName, $id);
    $actived = $active->approve();
    if ($actived == true) {
      header("Location: ../controllers/Items.php");
    }
  }

  //Detete Member
  if (isset($_GET['do']) && $_GET['do'] == 'Delete') {
    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
    $delete = new Delete('items');
    $DeleteMember = $delete->Delete($id);
    if ($DeleteMember == True) {
      $delete = array();
      $delete[] = 'Successfuly Deleted';
      $display = new Display('items');
      $displayData = $display->displayData();
      header("refresh:2;url= ../controllers/Items.php");
      include '../views/items.php';
    }
  }

  if (isset($_GET['do']) && $_GET['do'] == 'Edit') {
    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
    $display = new Display('items');
    $displayData = $display->getDataByiD($id);
    $dataUsers = new Display('users');
    $users = $dataUsers->Data();
    $dataCat = new Display('categories');
    $cats = $dataCat->Data();
    include '../views/editItems.php';
  }

  if (isset($_GET['do']) && $_GET['do'] == 'Update') {
    $id = intval($_POST['id']);
    $item['name'] = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
    $item['description'] = filter_var($_POST['description'],FILTER_SANITIZE_STRING);
    $item['price'] = filter_var($_POST['price'],FILTER_SANITIZE_STRING);
    $item['date'] = date('Y:m:d');
    $item['userID'] = $_POST['member'];
    $item['catID'] = $_POST['category'];

    $errors = array();

        if(empty($item['name'])){
          $errors[] = 'Name can\'t be empty';
        }

        if(strlen($item['name']) < 4){
          $errors[] = 'Name can\'t be less than 4 char';
        }

        if(strlen($item['name']) > 20){
          $errors[] = 'Name can\'t be more than 20 char';
        }
        if(empty($item['description'])){
          $errors[] = 'Describtion can\'t be empty';
        }

        if(empty($item['price'])){
          $errors[] = 'Price can\'t be empty';
        }

          if($item['catID'] == 0){
          $errors[] = 'You must choose the category';
        }
          if($item['userID'] == 0){
          $errors[] = 'You must choose the member';
        }

        if (empty($errors)) {
          $tableName = 'items';
          $update = new Update($tableName, $item);
          $updateData = $update->Update($id);
          if ($updateData == true) {
            $insertData = array();
            $insertData[] = 'Update Successfuly';
            $display = new Display('items');
            $displayData = $display->displayData();
            header("refresh:2;url=../controllers/Items.php");
            include '../views/items.php';
        }
      }else{
        $display = new Display('items');
        $displayData = $display->getDataByiD($id);
        $dataUsers = new Display('users');
        $users = $dataUsers->Data();
        $dataCat = new Display('categories');
        $cats = $dataCat->Data();
        include '../views/editItems.php';
      }
  }


}else {
  $display = new Display('items');
  $displayData = $display->displayData();
  include '../views/items.php';
}
