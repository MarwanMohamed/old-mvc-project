<?php
session_start();
if (!isset($_SESSION['admin'])) {
	header("Location: ../login.php");
	die();
}
$title = 'Add Category';
include_once '../includes/init.php';
?>
<h1 class="text-center">Add New Catigory</h1>
				<div class="container">
					<form class="form-horizontal" action="?do=Insert" method="POST">
						<div class="form-group form-group-lg">
							<label class="col-sm-2 controle-lable">Name</label>
							<div class="col-sm-10 col-lg-4">
								<input type="text" class="form-control" name="name" required='required' autocomplete="off">
							</div>
						</div>
						<div class="form-group form-group-lg">
							<label class="col-sm-2 controle-lable">Description</label>
							<div class="col-sm-10 col-lg-4">
								<textarea class="form-control" name="description" > </textarea>
							</div>
						</div>
						<div class="form-group form-group-lg">
							<label class="col-sm-2 controle-lable">Ordaring</label>
							<div class="col-sm-10 col-lg-4">
								<input type="text" class="form-control" name="ordaring">
							</div>
						</div>
						<div class="form-group form-group-lg">
							<label class="col-sm-2 controle-lable">Visible</label>
							<div class="col-sm-10 col-lg-4">
								<div>
									<input id='vis-yes' type='radio' name='visible' value='1' checked>
									<label for='vis-yes'>Yes</label>
								</div>
								<div>
									<input id='vis-no' type='radio' name='visible' value='0'>
									<label for='vis-no'>No</label>
								</div>
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
