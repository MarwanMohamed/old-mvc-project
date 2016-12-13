<?php
  session_start();
  include '../includes/autoloader.php';


  $categories = new Display('categories');
  $Cats = $categories->categories();
  $Disitems = new Display('items');
  $items = $Disitems->items();
  if (isset($_SESSION['user'])) {
    $active = new Display('users');
    $user = $_SESSION['user'];
    $activeUser = $active-> userStat($user);
  }
  include '../views/eCommerce.php';
