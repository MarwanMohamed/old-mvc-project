<?php
session_start();
if (!isset($_SESSION['admin'])) {
	header("Location: ../login.php");
	die();
}
$title = 'Categories';
include_once '../includes/init.php';
?>

			<h1 class='text-center'>Manage Categories</h1>
			<div class='container catigories'>
				<?php if (!empty($delete)){
					foreach ($delete as $del) {
						echo "<p class='alert alert-danger'> $del</p>";
					}
				} ?>

					<?php if (!empty($insertData)){
						foreach ($insertData as $insert) {
							echo "<p class='alert alert-success'> $insert</p>";
						}
					} ?>
				<div class='panel panel-default'>
					<div class='panel-heading'>
						<i class='fa fa-edit'></i> Manage Categories
						<div class='option pull-right'>
								<i class='fa fa-sort'></i> Ordaring: [
								<a class="<?php if($sort =='ASC'){ echo 'active';}?>" href='?sort=ASC'>Asc</a> |
								<a class="<?php if($sort =='DESC'){ echo 'active';}?>" href="?sort=DESC"> Desc</a>] &nbsp;
								<i class='fa fa-eye'></i> View: [<span data-view='full' class='active'>Full</span> | <span>Classic</span> ]
							</div>
					</div>
					<div class='panel-body'>
						<?php
						foreach ($displayData as $data) {

								echo "<div class='cat'>";
									echo "<div class='hidden-btn'>";
										echo "<a href='?do=Edit&id=".$data['id']."' class='btn  btn-primary'><i class='fa fa-edit'></i> Edit</a>";
										echo "<a href='?do=Delete&id=".$data['id']."' class='confirm btn btn-danger'><i class='fa fa-close'></i> Delete</a>";
									echo "</div>";
									echo "<h3>".$data['name']."</h3>";
									echo "<div class='full-view'>";
										echo "<p>".$data['description']."</p>";
										if ($data['visbility'] == 0) {
											echo "<span class='visbility'><i class='fa fa-eye'></i> Hidden</span>";
										}
									echo"</div>";
								echo"</div>";
								echo"<hr>";
							}
						?>
					</div>
				</div>
				<a href='?do=Add' class='btn btn-primary'><i class='fa fa-plus'></i> Add New Catigory</a>
			</div>
