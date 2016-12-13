<?php
require_once '../includes/autoloader.php';

if ($_POST || $_GET) {


}else {

  $limit = 5;
  $displayItems = new Display('items');
  $Items  = $displayItems->Latest ('*', 'id', $limit);
  $displayUsers = new Display('users');
  $Users  = $displayUsers->LatestUsers ('*', 'id', $limit);
  $displayComments = new Display('comments');
  $comments  = $displayComments->Comments($limit);
  $countComment = $displayItems->CountItems('comments','');
  $countItems = $displayItems->CountItems('items','');
  $countUsers = $displayUsers->CountItems('users','WHERE groupID !=1');
  $countPanding = $displayUsers->CountItems('users','WHERE regstatus !=1');
  include '../views/dashboard.php';
}
