<?php
session_start();
if (!isset($_SESSION['admin'])) {
	header("Location: ../login.php");
	die();
}
$title = 'Add Items';
include_once '../includes/init.php';
?>
<h1 class="text-center">Add New Item</h1>
				<div class="container">
					<form class="form-horizontal" action="?do=Insert" method="POST">
						<div class="form-group form-group-lg">
							<label class="col-sm-2 controle-lable">Name</label>
							<div class="col-sm-10 col-lg-4">
								<input type="text" class="form-control" name="name" required='required'>
							</div>
						</div>
						<div class="form-group form-group-lg">
							<label class="col-sm-2 controle-lable">Describtion</label>
							<div class="col-sm-10 col-lg-4">
								<textarea class="form-control" name="description" required='required'></textarea>
							</div>
						</div>
						<div class="form-group form-group-lg">
							<label class="col-sm-2 controle-lable">Price</label>
							<div class="col-sm-10 col-lg-4">
								<input type="text" class="form-control" name="price" required='required'>
							</div>
						</div>

						<div class="form-group form-group-lg">
							<label class="col-sm-2 controle-lable">Member</label>
							<div class="col-sm-10 col-lg-4">
								<select class='form-control' name='member'>
									<option value='0'></option>
                  <?php
                    foreach ($users as $user) {
                      echo "<option value='". $user['id']."'>". $user['username']."</option>";
                    }
                  ?>
								</select>
							</div>
						</div>
						<div class="form-group form-group-lg">
							<label class="col-sm-2 controle-lable">Category</label>
							<div class="col-sm-10 col-lg-4">
								<select class='form-control' name='category'>
									<option value='0'></option>
                  <?php
                    foreach ($cats as $cat) {
                      echo "<option value='". $cat['id']."'>". $cat['name']."</option>";
                    }
                  ?>
								</select>
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
