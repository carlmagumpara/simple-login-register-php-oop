<?php
	require_once('session.php');

	if (isset($_SESSION['id'])) {
		if (!empty($_SESSION['id'])) {
			header('location: welcome.php');
		}
	}
?>