<?php
session_start();
include '../includes/autoloader.php';

if (isset($_SESSION['user'])) {
  $active = new Display('users');
  $user = $_SESSION['user'];
  $activeUser = $active-> userStat($user);
}
$categories = new Display('categories');
$Cats = $categories->categories();
$id = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0;
$items = new Display('items');
$item = $items->displayData($id);
$comment = new Display('comments');
$comments = $comment->AllComments($id);
include '../views/items.php';
