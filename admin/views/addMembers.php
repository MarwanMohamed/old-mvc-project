<?php
session_start();
if (!isset($_SESSION['admin'])) {
	header("Location: ../login.php");
	die();
}
$title = 'Add Members';
include_once '../includes/init.php';
?>
<h1 class="text-center">Add Member</h1>
    <div class="container">

      <form class="form-horizontal" action="?do=insert" method="POST">
        <div class="form-group form-group-lg">
          <label class="col-sm-2 controle-lable">Username</label>
          <div class="col-sm-10 col-lg-4">
            <input type="text" class="form-control" name="username" required='required' autocomplete="off">
          </div>
        </div>
        <div class="form-group form-group-lg">
          <label class="col-sm-2 controle-lable">Password</label>
          <div class="col-sm-10 col-lg-4">
            <input type="password" class="password form-control" name="password" placeholder='' autocomplete="new-password" required='required' >
          </div>
        </div>
        <div class="form-group form-group-lg">
          <label class="col-sm-2 controle-lable">Email</label>
          <div class="col-sm-10 col-lg-4">
            <input type="email" class="form-control" required='required' name="email" >
          </div>
        </div>
        <div class="form-group form-group-lg">
          <label class="col-sm-2 controle-lable">Full Name</label>
          <div class="col-sm-10 col-lg-4">
            <input type="text"  class="form-control" required='required' name="fullName">
          </div>
        </div>
        <div class="form-group form-group-lg">
          <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" class="btn btn-primary btn-lg" value="Add">
          </div>
        </div>
      </form>
			<?php
			if (!empty($errors)) {
				foreach ($errors as $error) {
					echo "<p class='alert alert-danger'> $error </p>";
				}
			}
			?>
    </div>
