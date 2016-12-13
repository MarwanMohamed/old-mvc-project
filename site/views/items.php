<?php
  $title = 'Item';
  include '../includes/init.php';
?>
<h1 class='text-center'> <?php echo $item['name']; ?></h1>
	<div class='container'>
		<div class='row'>
			<div class='col-md-3'>
				<img class='img-responsive img-thumbnail center-block' src='../layout/img/1.png' alt='' width=280/>
			</div>
			<div class='col-md-9 item-info'>
				<h2><?php echo $item['name'];?></h2>
				<p><?php echo $item['description'];?></p>
				<ul class='list-unstyled'>
					<li><span>Added Date</span> : <?php echo $item['date'];?></li>
					<li><span>Price</span> : <?php echo $item['price'];?></li>
					<li><span>category</span> : <a href='categories.php?page=<?php echo $item['catID']?>'> <?php echo $item['catigoryName'];?> </a></li>
					<li><span>Added By</span> :<a href='#'> <?php echo $item['username'];?> </a></li>
				</ul>
			</div>
		</div>
    <?php
		if ($item['aprove'] == 1) { ?>
    <hr style='border-top: 1px solid #c9c9c9;'>
    <?php if (isset($_SESSION['user'])) { ?>
      <div class='row'>
    		<div class='col-md-offset-3'>
    			<div class='add-comment'>
    				<h3>Add Your Comment</h3>
    				<form method='POST' action="../controllers/comments.php">
    					<textarea name='comment' required></textarea>
              <input type='hidden' name='itemID' value='<?php echo $item['id'];?>' >
    					<input  class=' btn btn-primary'type='submit' value='Add Comment'>
    				</form>
          </div>
    		</div>
    	</div>
  <?php
	 }else {
				echo '<a href="Login.php">
				<span>Login / SignUp</span>
			</a> To Add Comment';
			}
      ?>
      <hr style='border-top: 1px solid #c9c9c9;'>
      <?php
					foreach ($comments as $comment) { ?>
						<div class='comment-box'>
							<div class='row'>
								<div class='col-md-2 text-center'>
									<img class='img-responsive img-circle center-block' src='../layout/img/1.png' alt=''/>
								 	<?php echo $comment['username'].'<br>' ?>
								</div>
								<div class='col-md-10'>
								 	<p class='lead'><?php echo $comment['comment'].'<br>' ?></p>
								</div>
							</div>
						</div>
          <?php } ?>
		<hr style='border-top: 1px solid #c9c9c9;'>
    <?php
  	}else {
    			echo "No Item id " . $_GET['itemid'];
    }
    ?>
