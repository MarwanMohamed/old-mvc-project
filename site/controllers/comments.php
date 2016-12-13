<?php
session_start();
include '../includes/autoloader.php';

$data['comment'] = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
$data['date'] = date('Y:m:d');
$data['itemID']  = $_POST['itemID'];
$data['userID']  = $_SESSION['userID'];

$errors = array();

if (empty($data['comment']) ) {
   $errors[] = 'Comment can\'t be empty';
}
if (empty($errors)) {
    $add = new Add('comments', $data);
    $insert = $add->insert();
    if ($insert == true) {
      echo '<script>history.back();</script>';
    }
  }
