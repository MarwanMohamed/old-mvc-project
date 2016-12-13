<?php
session_start();
if (!isset($_SESSION['admin'])) {
	header("Location: ../login.php");
	die();
}

$title = 'Comments';
include_once '../includes/init.php';
?>
<h1 class="text-center">Manage Comment</h1>
				<div class="container">
					<?php if (!empty($delete)){
						foreach ($delete as $del) {
							echo "<p class='alert alert-danger'> $del</p>";
						}
					}
					?>
					<div class="table-responsive">
						<table class="main-table text-center table table-bordered">
							<tr>
								<td>#id</td>
								<td>Comment</td>
								<td>Item Name</td>
								<td>Username</td>
								<td>Added Date</td>
								<td>Control</td>
							</tr>
							<?php
									$id = 1;
									foreach ($comments as $comment) {
										echo "<tr>";
											echo "<td>" .$id++."</td>";
											echo "<td>" .$comment['comment']."</td>";
											echo "<td>" .$comment['name']."</td>";
											echo "<td>" .$comment['username']."</td>";
											echo "<td>" .$comment['date']."</td>";
											echo "<td>
													<a href='Comments.php?do=Edit&id=".$comment['id']."'class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>
													<a href='Comments.php?do=Delete&id=".$comment['id']."' class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete</a>";
										echo "</tr>";
									}
								?>
						</table>
					</div>
				</div>
