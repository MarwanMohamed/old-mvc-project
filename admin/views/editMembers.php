<?php
session_start();
if (!isset($_SESSION['admin'])) {
	header("Location: ../login.php");
	die();
}
$title = 'Edit Member';
include_once '../includes/init.php';
?>
<h1 class="text-center">Edit Member </h1>
    <div class="container">
      <form class="form-horizontal" action="../controllers/Members.php?do=Update&id=<?php echo $displayData['id'] ?>" method="POST">
				<input hidden="hidden" name="id" value="<?php echo $displayData['id'] ?>">
        <div class="form-group form-group-lg">
          <label class="col-sm-2 controle-lable">Username</label>
          <div class="col-sm-10 col-lg-4">
            <input type="text" class="form-control" name="username" value='<?php echo $displayData['username'] ?>' required='required' autocomplete="off">
          </div>
        </div>
        <div class="form-group form-group-lg">
          <label class="col-sm-2 controle-lable">Password</label>
          <div class="col-sm-10 col-lg-4">
            <input type="password" class="password form-control" name="password" placeholder='Leave Your old Password' autocomplete="new-password" >
						<input type="hidden" name="oldPassword" value="<?php echo $displayData['password']; ?>">
					</div>
        </div>
        <div class="form-group form-group-lg">
          <label class="col-sm-2 controle-lable">Email</label>
          <div class="col-sm-10 col-lg-4">
            <input type="email" class="form-control" value='<?php echo $displayData['email'] ?>' required='required' name="email" >
          </div>
        </div>
        <div class="form-group form-group-lg">
          <label class="col-sm-2 controle-lable">Full Name</label>
          <div class="col-sm-10 col-lg-4">
            <input type="text"  class="form-control" value='<?php echo $displayData['fullName'] ?>' required='required' name="fullName">
          </div>
        </div>
        <div class="form-group form-group-lg">
          <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" class="btn btn-primary btn-lg" value="Update">
          </div>
        </div>
      </form>
			<?php
			if (!empty($errors)) {
				foreach ($errors as $error) {
					echo "<p class='alert alert-danger'> $error </p>";
				}
			}
			if (!empty($done)) {
				foreach ($done as $do) {
					echo "<p class='alert alert-success'> $do </p>";
				}
			}
			?>
    </div>
