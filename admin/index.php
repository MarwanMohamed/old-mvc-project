<?php
session_start();
if (!isset($_SESSION['admin'])) {
	header("Location: login.php");
	die();
}else {
	header("Location: controllers/Dashboard.php");
}
?>
