<?php
session_start();
if (!isset($_SESSION['admin'])) {
	header("Location: ../login.php");
	die();
}
$title = 'Edit Category';
include_once '../includes/init.php';
?>
<h1 class="text-center">Edit Category</h1>
				<div class="container">
					<form class="form-horizontal" action="?do=Update" method="POST">
						<input type="hidden" name="id" value="<?php echo $displayData['id']; ?>">
						<div class="form-group form-group-lg">
							<label class="col-sm-2 controle-lable">Name</label>
							<div class="col-sm-10 col-lg-4">
								<input type="text" class="form-control" name="name" value=' <?php echo $displayData['name']; ?> ' required='required' autocomplete="off">
							</div>
						</div>
						<div class="form-group form-group-lg">
							<label class="col-sm-2 controle-lable">Description</label>
							<div class="col-sm-10 col-lg-4">
								<textarea class="form-control" name="description" ><?php echo $displayData['description']; ?> </textarea>
							</div>
						</div>
						<div class="form-group form-group-lg">
							<label class="col-sm-2 controle-lable">Ordaring</label>
							<div class="col-sm-10 col-lg-4">
								<input type="text" class="form-control" name="ordaring" value="<?php echo $displayData['ordaring']; ?>">
							</div>
						</div>
						<div class="form-group form-group-lg">
							<label class="col-sm-2 controle-lable">Visible</label>
							<div class="col-sm-10 col-lg-4">
								<div>
									<input id='vis-yes' type='radio' name='visible' value='1' <?php if ($displayData['visbility'] == 1) {echo "checked";}  ?>>
									<label for='vis-yes'>Yes</label>
								</div>
								<div>
									<input id='vis-no' type='radio' name='visible' value='0'  <?php if ($displayData['visbility'] == 0) {echo "checked";}  ?>>
									<label for='vis-no'>No</label>
								</div>
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
