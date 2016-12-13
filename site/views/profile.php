<?php
$title = 'Profile';
include '../includes/init.php';
?>
<h1 class="text-center"><?php  echo $info['username']; ?></h1>
	<div class="info block">
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading">
					My information
				</div>
				<div class="panel-body">
					<ul class='list-unstyled'>
						<li>
							<i class='fa fa-unlock-alt fa-fw'></i>
							<span>Username: </span><?php echo $info['username'];?>
						</li>
						<li>
							<i class='fa fa-envelope-o fa-fw'></i>
							<span>Email: </span><?php echo $info['email'];?>
						</li>
						<li>
							<i class='fa fa-user fa-fw'></i>
							<span>Full Name: </span><?php echo $info['fullName'];?>
						</li>
						<li>
							<i class='fa fa-calendar fa-fw'></i>
							<span>Register: </span><?php echo $info['date'];?>
						</li>
					</ul>
					<a href="#" class=' btn btn-default'>Edit Information</a>
				</div>
			</div>
		</div>
	</div>
	<div id='my-ads' class="ads block">
			<div class="container">
				<div class="panel panel-primary">
					<div class="panel-heading">
						My Advertisments
					</div>
					<div class="panel-body">
					<?php
						if (! empty($myitemss))
						{
							foreach ($myitemss as $item) {
								echo "<div class='col-sm-6 col-md-3'>";
									echo "<div class='thumbnail item-box'>";
									if ($item['aprove']  == 0) { echo "<span class='approve'>not approved </span>"; }
										echo "<span class='price'>$". $item['price']."</span>";
										echo "<img class='img-responsive' src='../layout/img/1.png' alt='' width=280/>";
										echo "<div class='caption'>";
											echo "<h3><a href='Items.php?itemid=".$item['id']."'>".$item['name']."</a></h3>";
											echo "<p>".$item['description']."</p>";
											echo "<div class='date'>".$item['date']."</div>";
										echo "</div>";
									echo "</div>";
								echo "</div>";
							}
						}else{
							echo "no items here now, create <a href='newAdv.php'>New Adv</a>";
						}
					?>
					</div>
				</div>
			</div>
		</div>
	<div class="comm block">
			<div class="container">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Latest Comments
					</div>
					<div class="panel-body">
					<?php
						if (! empty($comments)) {
						 foreach ($comments as $comment) {
						 	echo "<p>".$comment['comment']."</p>";
						 }
					}else {
						echo "no comments now";
					}
					?>
					</div>
				</div>
			</div>
		</div>
