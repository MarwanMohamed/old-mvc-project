<?php
  $title = $catName['name'];
  include '../includes/init.php';
?>

<div class="container">
		<h1 class="text-center"> <?php echo $catName['name']; ?></h1>
		<div class="row">

		<?php
			foreach ($items as $item) {
				echo "<div class='col-sm-6 col-md-3'>";
					echo "<div class='thumbnail item-box'>";
						echo "<span class='price'> $". $item['price']."</span>";
						echo "<img class='img-responsive' src='../layout/img/1.png' alt='' width=280/>";
						echo "<div class='caption'>";
							echo "<h3><a href='Items.php?itemid=".$item['id']."'>".$item['name']."</a></h3>";
							echo "<p>".$item['description']."</p>";
							echo "<div class='date'>".$item['date']."</div>";
						echo "</div>";
					echo "</div>";
				echo "</div>";
			}
		?>
		</div>
	</div>
