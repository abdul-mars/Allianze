<?php session_start();
	require_once '../includes/database.php';
	if (isset($_SESSION['insurNo'])) {
		$insurNo = $_SESSION['insurNo'];
	}

	if (isset($_POST['submit'])) {
		// echo "string";
		$type = $_POST['type'];
		$cause = $_POST['cause'];
		$when = $_POST['when'];
		$where = $_POST['where'];
		$level = $_POST['level'];
		$picture = $_FILES['picture'];
		// print_r($picture) ;

		$type = mysqli_real_escape_string($con, $type);
		$cause = mysqli_real_escape_string($con, $cause);
		$when = mysqli_real_escape_string($con, $when);
		$where = mysqli_real_escape_string($con, $where);
		$level = mysqli_real_escape_string($con, $level);
		// $type = mysqli_real_escape_string($con, $type);
		// echo $type;

		if (empty($type) || empty($cause) || empty($where) || empty($when) || empty($level)) { //echo 'empty';
			$msg = 'All fields are required';
			header("location: ../claims.php?msg=$msg");
			exit();
		 } else {
			$sql = "INSERT INTO `claims`(
							    `type`,
							    `cause`,
							    `when`,
							    `where`,
							    `level`,
							    `insure_no`
							)
							VALUES(
							    '$type',
							    '$cause',
							    '$when',
							    '$where',
							    '$level',
							    '$insurNo'
							)";
			if (mysqli_query($con, $sql)) {
				$msg = 'claim submited successfuly';
				$cssClass = 'alert-success';
				header("location: ../index.php?msg=$msg&cssClass=$cssClass");
				exit();
			} else {
				$msg = 'Unable to submit claim';
				header("location: ../claims.php?msg=$msg");
				exit();
			}
		}
	}

	if (@$_GET['operation'] == 'served_claim') {
		$id = mysqli_real_escape_string($con, $_GET['id']);
		// echo $id;
		$sql = mysqli_query($con, "UPDATE `claims` SET `status`='1' WHERE `claim_id` = '$id'");
		if ($sql) {
			$msg = 'Claim Served successfuly';
			$cssClass = 'alert-success';
			header("location: ../admin/claims.php?page=new_claims&msg=$msg&cssClass=$cssClass");
			exit();
		} else {
			$msg = 'Unable to save served claim. please try again';
			$cssClass = 'alert-danger';
			header("location: ../admin/claims.php?msg=$msg&cssClass=$cssClass");
			exit();
		}
	}