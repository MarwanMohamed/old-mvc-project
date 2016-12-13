<?php
  $title = 'Login';
  include '../includes/init.php';
?>
<div class="container login-page">
	<h1 class="text-center"><span class="selected" data-class='login'>Login</span> | <span data-class="signup">SignUp</span></h1>

	<form  class="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
		<div class="input-container">

			<input type="text" class="form-control" name="username" autocomplete="off" placeholder="Username" required>
		<div class="input-container">
			<input type="password" class="form-control" name="password" autocomplete="new-password" placeholder="Password" required>
		</div>
    <input class="btn btn-primary btn-block" type='submit' name='Login'>
		</div>
	</form>

	<form  class="signup" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
		<div class="input-container">
			<input type="text" class="form-control" name="username" autocomplete="off" placeholder="Username" required pattern=".{3,}" title="Username Must be more than 3 char">
		</div>
		<div class="input-container">
			<input type="password" class="form-control" name="password" autocomplete="new-password" placeholder="Password" required minlength="4">
		</div>
		<div class="input-container">
			<input type="password" class="form-control" name="passwordTwo" autocomplete="new-password" placeholder="Password again" required minlength="4">
		</div>
		<div class="input-container">
			<input type="email" class="form-control" name="email" placeholder="Email" required>
		</div>
			<input class="btn btn-success btn-block" type='submit' name='Register' >
		</div>
	</form>
	<div class="errors text-center">
	<?php
		if (!empty($errors)) {

			foreach ($errors as $error) {
				echo "<p style='color:red'> $error </p>";
			}
		}
	?>

  <?php
    if (!empty($insertData)) {

      foreach ($insertData as $data) {
        echo "<p style='color:green'> $data </p>";
      }
    }
  ?>
	</div>
</div>
