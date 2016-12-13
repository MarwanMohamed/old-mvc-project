<?php
  $title = 'Add Adv';
  include '../includes/init.php';
?>
<h1 class="text-center">Creat New Adv</h1>
	<div class="adv block">
		<div class="container">
      <?php
        if (!empty($insertData)) {

          foreach ($insertData as $insert) {
            echo "<p class='alert alert-success'> $insert </p>";
          }
        }
      ?>
			<div class="panel panel-primary">
				<div class="panel-heading">
					Creat New Adv
				</div>
				<div class="panel-body">
					<div class='row'>
						<div class='col-md-8'>
							<form class="form-horizontal main-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
							<div class="form-group form-group-lg">
								<label class="col-sm-2 controle-lable">Name</label>
								<div class="col-sm-10 col-lg-8">
									<input type="text" class="form-control live-name" name="name" required='required'>
								</div>
							</div>
							<div class="form-group form-group-lg">
								<label class="col-sm-2 controle-lable">Describtion</label>
								<div class="col-sm-10 col-lg-8">
									<textarea class="form-control live-des" name="description" required='required'></textarea>
								</div>
							</div>
							<div class="form-group form-group-lg">
								<label class="col-sm-2 controle-lable">Price</label>
								<div class="col-sm-10 col-lg-8">
									<input type="text" class="form-control live-price" name="price" required='required'>
								</div>
							</div>


							<div class="form-group form-group-lg">
								<label class="col-sm-2 controle-lable">Category</label>
								<div class="col-sm-10 col-lg-8">
									<select class='form-control' name='category'>
										<option value='0'></option>
										<?php

											foreach ($Cats as $cat) {
												echo "<option value='".$cat['id']."'>".$cat['name']."</option>";
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-group form-group-lg">
								<div class="col-sm-offset-2 col-sm-10">
									<input type="submit" class="btn btn-primary btn-lg" value="Add Adv" name="submit">
								</div>
							</div>
							</form>
						</div>
						<div class='col-md-4'>
							<div class='thumbnail item-box live-priv'>
								<span class='price'>0</span>
								<img class='img-responsive' src='../layout/img/1.png' alt='' width=280/>
								<div class='caption'>
									<h3>Item</h3>
									<p>Describtion</p>
								</div>
							</div>
						</div>
					</div>
					<?php
						if (!empty($errors)) {

							foreach ($errors as $error) {
								echo "<p class='alert alert-danger'> $error </p>";
							}
						}
					?>
				</div>
			</div>
		</div>
	</div>
