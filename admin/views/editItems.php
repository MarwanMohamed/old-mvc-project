<?php
session_start();
if (!isset($_SESSION['admin'])) {
	header("Location: ../login.php");
	die();
}
$title = 'Edit Items';
include_once '../includes/init.php';
?>
<h1 class="text-center">Edit Item</h1>
				<div class="container">
					<form class="form-horizontal" action="?do=Update" method="POST">
						<input type="hidden" name="id" value="<?php echo $displayData['id'] ?>">
						<div class="form-group form-group-lg">
							<label class="col-sm-2 controle-lable">Name</label>
							<div class="col-sm-10 col-lg-4">
								<input type="text" class="form-control" name="name" required='required' value="<?php echo $displayData['name'] ?>">
							</div>
						</div>
						<div class="form-group form-group-lg">
							<label class="col-sm-2 controle-lable">Describtion</label>
							<div class="col-sm-10 col-lg-4">
								<textarea class="form-control" name="description" required='required'><?php echo $displayData['description'] ?></textarea>
							</div>
						</div>
						<div class="form-group form-group-lg">
							<label class="col-sm-2 controle-lable">Price</label>
							<div class="col-sm-10 col-lg-4">
								<input type="text" class="form-control" name="price" required='required' value="<?php echo $displayData['price'] ?>">
							</div>
						</div>

						<div class="form-group form-group-lg">
							<label class="col-sm-2 controle-lable">Member</label>
							<div class="col-sm-10 col-lg-4">
								<select class='form-control' name='member'>
									<option value='0'></option>
                  <?php
                    foreach ($users as $user) {
											echo "<option value='".$user['id']."'"; if($displayData['userID'] == $user['id']) {echo "selected";} echo ">".$user['username']."</option>";
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
											echo "<option value='".$cat['id']."'"; if($displayData['catID'] == $cat['id']) {echo "selected";} echo ">".$cat['name']."</option>";
                    }
                  ?>
								</select>
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
					?>
				</div>
