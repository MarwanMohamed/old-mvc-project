<?php
require_once '../includes/autoloader.php';
if ($_POST || $_GET) {

  if (isset($_GET['do']) && $_GET['do'] == 'Edit') {
    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
    $display = new Display('comments');
    $Displaycomments = $display->getDataByiD($id);
    include '../views/editComment.php';
  }

  if (isset($_GET['do']) && $_GET['do'] == 'update') {
    $id = intval($_POST['id']);
		$comment['comment'] = filter_var($_POST['comment'],FILTER_SANITIZE_STRING);
    $errors = array();

    if (empty($comment['comment'])) {
      $errors[] = 'Comment can\'t be empty';
    }

    if (empty($errors)) {
      $update = new Update('comments', $comment);
      $edit = $update->Update($id);
      if ($edit == true) {
        $done = array();
        $done[] = 'Successfuly Update';
        $display = new Display('comments');
        $Displaycomments = $display->getDataByiD($id);
        include '../views/editComment.php';
      }
    }else{
      $display = new Display('comments');
      $Displaycomments = $display->getDataByiD($id);
      include '../views/editComment.php';
    }
  }

  if (isset($_GET['do']) && $_GET['do'] == 'Delete') {
    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
    $delete = new Delete('comments');
    $DeleteMember = $delete->Delete($id);
    if ($DeleteMember == True) {
      $delete = array();
      $delete[] = 'Successfuly Deleted';
      $display = new Display('comments');
      $comments = $display->getComments();
      header("refresh:2;url= ../controllers/Comments.php");
      include '../views/comments.php';
    }
  }

}else {
  $display = new Display('comments');
  $comments = $display->getComments();
  include '../views/comments.php';
}
