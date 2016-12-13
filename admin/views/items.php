<?php
session_start();
if (!isset($_SESSION['admin'])) {
	header("Location: ../login.php");
	die();
}
$title = 'Items';
include_once '../includes/init.php';
?>
<h1 class="text-center">Manage Items</h1>
			<div class="container">
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
				<div class="table-responsive">
					<table class="main-table text-center table table-bordered">
						<tr>
							<td>#id</td>
							<td>Name</td>
							<td>Description</td>
							<td>Price</td>
							<td>Adding Date</td>
							<td>Category</td>
							<td>Username</td>
							<td>Control</td>
						</tr>
							<?php
							$id = 1;
								foreach ($displayData as $data){
										echo "
												<tr>
													<td>".$id++."</td>
													<td>".$data['name']."</td>
													<td>".$data['description']."</td>
													<td>".$data['price']."</td>
													<td>".$data['date']."</td>
													<td>".$data['categoryName']."</td>
													<td>".$data['username']."</td>";
													echo "<td>
															<a href='Items.php?do=Edit&id=".$data['id']."'class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>
															<a href='Items.php?do=Delete&id=".$data['id']."' class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete</a>";
														 	if($data['aprove'] == 0) {echo "<a href='Items.php?do=Approve&id=".$data['id']."' class='btn btn-info approve'><i class='fa fa-check'></i> Approve</a>";}
														 "</td>";
										echo "</tr>";

								}
								?>




					</table>
				</div>
				<a href='Items.php?do=Add' class="btn btn-primary"><i class="fa fa-plus"></i> New Item</a>

			</div>
