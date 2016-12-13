<nav class="navbar navbar-inverse">
  <div class="container">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo '../controllers/Dashboard.php';?>">Home</a>
    </div>

    <div class="collapse navbar-collapse" id="app">
      <ul class="nav navbar-nav">
        <li><a href="../controllers/Categories.php">Categories</a></li>
        <li><a href="../controllers/Items.php">Items</a></li>
        <li><a href="../controllers/Members.php">Members</a></li>
        <li><a href="../controllers/Comments.php">Comments</a></li>
      </ul>


      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['admin'];  ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../../site/views/index.php" target="_blank">Visit Shop</a></li>
            <li><a href="../controllers/Members.php?do=Edit&id=<?php echo $_SESSION['adminID']; ?>">Edit</a></li>
            <li><a href="../controllers/c_Logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
