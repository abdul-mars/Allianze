<?php session_start();
	$role = $_SESSION['role'];
	function logout() {
		session_unset();
		session_destroy();
	}
	if ($role == 1) {
		logout();
		header("location: admin/login.php");
		exit();
	} else {
		logout();
		header("location: login.php");
		exit();
	}
?>