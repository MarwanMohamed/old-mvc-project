<?php
session_start();
if (!isset($_SESSION['admin'])) {
	header("Location: ../login.php");
	die();
}
$title = 'Edit Comment';
include_once '../includes/init.php';
?>
<h1 class="text-center">Edit Comment</h1>
				<div class="container">
					<?php
					if (!empty($done)) {
						foreach ($done as $do) {
							echo "<p class='alert alert-success'> $do </p>";
						}
					}
					?>
					<form class="form-horizontal" action="?do=update" method="POST">
						<input type="hidden" name="id" value="<?php echo $Displaycomments['id']; ?>">
						<div class="form-group form-group-lg">
							<label class="col-sm-2 controle-lable">Comment</label>
							<div class="col-sm-10 col-lg-4">
								<textarea class="form-control" name="comment" required='required'><?php echo $Displaycomments['comment']; ?></textarea>
							</div>
						</div>
						<div class="form-group form-group-lg">
							<div class="col-sm-offset-2 col-sm-10">
								<input type="submit" class="btn btn-primary btn-lg" value="Save">
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
