<?php
session_start();
if (!isset($_SESSION['admin'])) {
	header("Location: ../login.php");
	die();
}
$title = 'Members';
include_once '../includes/init.php';
?>
<h1 class="text-center">Manage Member</h1>
			<div class="container">
				<?php if (!empty($delete)){
					foreach ($delete as $del) {
						echo "<p class='alert alert-danger'> $del</p>";
					}
				}
				?>

				<?php if (!empty($insertData)){
					foreach ($insertData as $insert) {
						echo "<p class='alert alert-success'> $insert</p>";
					}
				} ?>
				<div class="table-responsive">
					<table class="main-table text-center table table-bordered">
						<tr>
							<td>#id</td>
							<td>Username</td>
							<td>Email</td>
							<td>Fullname</td>
							<td>Registerd Date</td>
							<td>Control</td>
						</tr>
						<?php
						$id = 1;
							foreach ($AllData as $data) {
								echo "<tr>";
									echo "<td>" .$id++."</td>";
									echo "<td>" .$data['username']."</td>";
									echo "<td>" .$data['email']."</td>";
									echo "<td>" .$data['fullName']."</td>";
									echo "<td>" .$data['date']."</td>";
									echo "<td>
											<a href='Members.php?do=Edit&id=".$data['id']."'class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>
											<a href='Members.php?do=Delete&id=".$data['id']."' class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete</a>";
									if ($data['regStatus'] == 0) {
										echo   "<a href='Members.php?do=Active&id=".$data['id']."' class='btn btn-info active'><i class='fa fa-check'></i> Active</a>";
										 }
										 "</td>";
								echo "</tr>";
							}
						?>

					</table>
				</div>
				<a href='members.php?do=Add' class="btn btn-primary"><i class="fa fa-plus"></i> Add New Member</a>


			</div>
