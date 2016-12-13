<?php
session_start();
if (!isset($_SESSION['admin'])) {
	header("Location: ../login.php");
	die();
}
$title = 'Dashboard';
include_once '../includes/init.php';
?>

<div class='container home-stats text-center'>
	<h1>Dashboard</h1>
	<div class='row'>
		<div class='col-md-3'>
			<div class='stat members'>
				<i class='fa fa-users'></i>
				<div class='info'>
					Total Members
					<span><a href='Members.php'>
						<?php echo $countUsers ?>
					</a></span>
				</div>
			</div>
		</div>
		<div class='col-md-3'>
			<div class='stat pending'>
				<i class='fa fa-user-plus'></i>
				<div class='info'>
					Pending Members
					<span><a href="Members.php?do=panding">
						<?php echo $countPanding ?>
					</a></span>
				</div>
			</div>
		</div>
		<div class='col-md-3'>
			<div class='stat items'>
				<i class='fa fa-tag'></i>
				<div class='info'>
					Total Items
					<span><a href="Items.php">
					<?php echo $countItems ?>
					</a></span>
				</div>
			</div>
		</div>
		<div class='col-md-3'>
			<div class='stat comments'>
				<i class='fa fa-comments'></i>
				<div class='info'>Total Comments<span><a href="Comments.php">
					<?php echo $countComment ?>
				</a></span>
				</div>
			</div>
		</div>
	</div>
</div>

<div class='container latest'>
	<div class='row'>
		<div class='col-sm-6'>
			<div class='panel panel-default'>
				<div class='panel-heading'>
					<i class='fa fa-users'></i> Latest <?php echo $limit ?> Registerd Users
					<span class='toggle-info pull-right'><i class='fa fa-plus fa-lg'></i></span>
				</div>
				<div class='panel-body'>
					<ul class="latest-users list-unstyled">
						<?php
								if (!empty($Users)) {
									foreach ($Users as $user)
									{
										echo '<li>' . $user['username'] .
												'<a href="Members.php?do=Edit&id='.$user["id"].'">
													<span class="btn btn-success pull-right">
														<i class=\'fa fa-edit\'></i> Edit
													</span>
												</a>
											 </li>';
									}
								}else{
									echo "No Members here Now";
								}
								?>
					</ul>
				</div>
			</div>
		</div>
		<div class='col-sm-6'>
			<div class='panel panel-default'>
				<div class='panel-heading'>
					<i class='fa fa-tag'></i> Latest <?php echo $limit ?> Items
					<span class='toggle-info pull-right'><i class='fa fa-plus fa-lg'></i></span>
				</div>
				<div class='panel-body'>
				<ul class="latest-users list-unstyled">
					<?php
					if(!empty($Items)){
								foreach ($Items as $item)
								{
									echo '<li>' . $item['name'] .
											'<a href="Items.php?do=Edit&id='.$item["id"].'">
												<span class="btn btn-success pull-right">
													<i class=\'fa fa-edit\'></i> Edit
												</span>
											</a>
											</li>';
									}
							}else{
								echo "No Items Here";
							}

					?>
				</ul>
				</div>
			</div>
		</div>
	</div>
	<div class='row'>
		<div class='col-sm-6'>
			<div class='panel panel-default'>
				<div class='panel-heading'>
					<i class='fa fa-comments-o'></i> Latest <?php echo $limit ?> Comments
					<span class='toggle-info pull-right'><i class='fa fa-plus fa-lg'></i></span>
				</div>
				<div class='panel-body'>
					<?php
					if(!empty($comments)){
					foreach ($comments as $comment) {
						echo '<div class="comment-box">';
							echo '<span class="member-name"><a href="members.php?do=Edit&id='.$comment['userID'].'">'. $comment['username'] . '</a></span>';
							echo '<p class="member-comment">'. $comment['comment'] . '</p>';
						echo '</div>';
					}
				}else {
					echo "No Comments here now";
				}
				?>

				</div>
			</div>
		</div>
	</div>
</div>
