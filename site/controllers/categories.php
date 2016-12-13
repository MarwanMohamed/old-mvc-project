<?php
session_start();
include '../includes/autoloader.php';



if (isset($_SESSION['user'])) {
  $active = new Display('users');
  $user = $_SESSION['user'];
  $activeUser = $active-> userStat($user);
}
$id = intval($_GET['page']);
$categories = new Display('categories');
$Cats = $categories->categories();
$catName = $categories->getDataByiD($id);
$item = new Display('items');
$items = $item->CatItems($id);

include '../views/categories.php';
