<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title><?php echo getTitle(); ?></title>
		<link rel="stylesheet" href="../layout/css/bootstrap.min.css">
		<link rel="stylesheet" href="../layout/css/font-awesome.min.css">
		<link rel="stylesheet" href="../layout/css/style.css">
	</head>
	<body>
		<div class="upper-bar">
			<div class="container">
			<?php
				if (isset($_SESSION['user'])) { ?>

					<img class='my-img img-thumbnail img-circle' src='../layout/img/1.png'/>
					<div class='btn-group my-info'>
						<span class='btn btn-default dropdown-toggle' data-toggle='dropdown'>
							<?php	echo $_SESSION['user'] ?>
							<span class='caret'></span>
						</span>
						<ul class='dropdown-menu'>
							<li><a href='Profile.php'>My Profile </a></li>
							<li><a href='newAdv.php'>New Item </a></li>
							<li><a href='Profile.php#my-ads'>my Ads </a></li>
							<li><a href='Logout.php'>Logout </a></li>
						</ul>
					</div>

			<?php
			if (isset($_SESSION['user'])) {

					if ($activeUser == 1) {
						echo " You are not activated";
					}
				}
			}else{ ?>
				<a href="../controllers/Login.php">
					<span class="pull-right">Login / SignUp</span>
				</a>
			<?php }?>
			</div>
		</div>
		<nav class="navbar navbar-inverse">
		  <div class="container">

		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="<?php echo 'index.php';?>">Home Page</a>
		    </div>

		    <div class="collapse navbar-collapse" id="app">
		      <ul class="nav navbar-nav navbar-right">
						<?php
							foreach ($Cats as $cat) {
							echo '<li><a href="categories.php?page='. $cat['id'].'">'.$cat['name'].'</a></li>';
							}
			 		 	?>
			    </ul>
		    </div>
		  </div>
		</nav>
