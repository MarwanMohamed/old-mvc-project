<?php
session_start();
if (isset($_SESSION['admin'])) {
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="layout/css/bootstrap.css" rel="stylesheet">
    <link href="layout/css/font-awesome.min.css" rel="stylesheet">
    <link href="layout/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="controllers/c_Login.php" method="POST">
              <h1>Login Form</h1>
              <div>
                <input name="username" type="text" class="form-control" placeholder="Username" required />
              </div>
              <div>
                <input name="password" type="password" class="form-control" placeholder="Password" required />
              </div>
              <div>
                <button class="btn btn-default submit" type="submit" value="Login" >Log in</button>
              </div>
            </form>
            <?php
              if (isset($_GET['e'])){
                echo "<p style='color:red'>username or password wrong</p>";
              }
             ?>

          </section>
      </div>
    </div>
  </body>
</html>
