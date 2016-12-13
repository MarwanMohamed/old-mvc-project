<?php
session_start();
include '../includes/autoloader.php';



if (isset($_SESSION['user'])) {
  $active = new Display('users');
  $user = $_SESSION['user'];
  $activeUser = $active-> userStat($user);
}else {
  header("Location: ../views/index.php ");
}

$myitems = new Display('items');
$myitemss = $myitems->Myitems($_SESSION['userID']);

$myComments = new Display('comments');
$comments = $myComments->Myitems($_SESSION['userID']);


$categories = new Display('categories');
$Cats = $categories->categories();
$info = $active->info($user);
include '../views/profile.php';
