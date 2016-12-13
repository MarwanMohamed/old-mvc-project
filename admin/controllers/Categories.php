<?php
require_once '../includes/autoloader.php';

if ($_POST || $_GET) {
	//Edit page
	if (isset($_GET['do']) && $_GET['do'] == 'Edit') {
		$id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
		$display = new Display('categories');
		$displayData = $display->getDataByiD($id);
		include '../views/editCategories.php';
	}

	//Detete category
	if (isset($_GET['do']) && $_GET['do'] == 'Delete') {
		$id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
		$delete = new Delete('categories');
		$DeleteMember = $delete->Delete($id);
		if ($DeleteMember == True) {
			$delete = array();
			$delete[] = 'Successfuly Deleted';
			$display = new Display('categories');
			$sort = 'ASC';
			$displayData = $display->getData($sort);
			header("refresh:2;url=../controllers/categories.php");
			include '../views/categories.php';

		}
	}

	//Add Page
	if (isset($_GET['do']) && $_GET['do'] == 'Add') {
		include '../views/addCategories.php';
	}

	//Insert Page
	if (isset($_GET['do']) && $_GET['do'] == 'Insert') {
		$data['name'] = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
		$data['description'] = filter_var($_POST['description'],FILTER_SANITIZE_STRING);
		$data['Ordaring'] = filter_var($_POST['ordaring'],FILTER_SANITIZE_NUMBER_INT);
		$data['visbility'] = filter_var($_POST['visible'],FILTER_SANITIZE_NUMBER_INT);

		$errors = array();

		//validation form
		if (empty($data['name'])) {
			$errors[] = 'Name can\'t be empty';
		}

		if (strlen($data['name']) < 3 ) {
			$errors[] = 'Name can\'t be less than 3 char';
		}

		if(strlen($data['name']) > 15){
			$errors[] = 'Name can\'t be more than 15 char';
		}

		if (empty($errors)) {
			$tableName = 'categories';
			$insert = new Add($tableName, $data);
			$add = $insert->insert();
			if ($add == true) {
				$insertData = array();
				$insertData[] = 'Added Successfuly';
				$display = new Display('Categories');
				$sort = 'ASC';
				$displayData = $display->getData($sort);
				header("refresh:2;url=../controllers/categories.php");
				include '../views/categories.php';
			}
		}else{
			include '../views/addCategories.php';
		}
	}

	//Update Page
	if (isset($_GET['do']) && $_GET['do'] == 'Update') {
		$id = intval($_POST['id']);
		$data['name'] = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
		$data['description'] = filter_var($_POST['description'],FILTER_SANITIZE_STRING);
		$data['Ordaring'] = filter_var($_POST['ordaring'],FILTER_SANITIZE_NUMBER_INT);
		$data['visbility'] = filter_var($_POST['visible'],FILTER_SANITIZE_NUMBER_INT);

		$errors = array();

		//validation form
		if (empty($data['name'])) {
			$errors[] = 'Name can\'t be empty';
		}

		if (strlen($data['name']) < 3 ) {
			$errors[] = 'Name can\'t be less than 3 char';
		}

		if(strlen($data['name']) > 15){
			$errors[] = 'Name can\'t be more than 15 char';
		}

		if (empty($errors)) {
			$tableName = 'categories';
			include '../models/Update.php';
			$update = new Update($tableName, $data);
			$edit = $update->Update($id);
			if ($edit == true) {
				$done = array();
				$done[] = 'Successfuly Update';
				$display = new Display('categories');
				$displayData = $display->getDataById($id);
				include '../views/editCategories.php';
			}
		}else {
			$display = new Display('categories');
			$displayData = $display->getDataById($id);
			include '../views/editCategories.php';
		}

	}

	if (isset($_GET['sort'])) {
		$sort = 'ASC';
		$sort_array = array('ASC', 'DESC');
		if (isset($_GET['sort']) && in_array($_GET['sort'], $sort_array)) {
			$sort = $_GET['sort'];
		}
		$display = new Display('categories');
		$displayData = $display->getData($sort);
		include '../views/categories.php';
	}

}else {
	$sort = 'ASC';
	$display = new Display('categories');
	$displayData = $display->getData($sort);
	include '../views/categories.php';
}
