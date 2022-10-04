<?php session_start();
	require_once '../includes/database.php';
	$email = $_SESSION['email'];
	$insurNo = $_SESSION['insurNo'];
	if (@$_GET['operation'] == 'insured') {
		if (isset($_POST['submit'])) {
			$acc = $_POST['acc'];
			//$pAcc = $_POST['pAcc'];
			$NatCal = $_POST['NatCal'];
			//$liability = $_POST['liability'];
			$choice = $_POST['choice'];
			$theft = $_POST['theft'];
			// $acc = $_POST['acc'];
			// echo $acc;
			// echo $pAcc;
			// echo $NatCal;
			// echo $liability;
			// echo $choice;
			// echo $theft;

			//$serv =  $acc .','.$pAcc.','.$NatCal.','.$liability.','.$choice.','.$theft;
			$curMon = date('m');
			$date = date('Y') + 1;
			$valid = '1 year';
			$expDate = new DateTime('this day + '.$valid);
			$exp = $expDate->format('Y-m-d');

			$sql = mysqli_query($con, "INSERT INTO `insured`(`accident`, `calamity`, `fire`, `theft`,`exp_date`,`current_month`, `insure_no`) VALUES ('$acc','$NatCal','$choice','$theft','$exp','$curMon','$insurNo')");

			if ($sql) {
				header("location: ../my_insure.php");
			} else {
				echo "ooops something went wrong";
			}
 
		}
	}

	// renew insurance
	if (@$_GET['operation'] == 'update_insurance') {
		if (isset($_POST['renewSubmit'])) {
			$acc = mysqli_real_escape_string($con, $_POST['accident']);
			$cal = mysqli_real_escape_string($con, $_POST['calamity']);
			$fire = mysqli_real_escape_string($con, $_POST['fire']);
			$theft = mysqli_real_escape_string($con, $_POST['theft']);

			echo $acc; echo "<br>";
			echo $cal; echo "<br>";
			echo $fire; echo "<br>";
			echo $theft; echo "<br>";

			$curMon = date('m');
			$date = date('Y') + 1;
			$valid = '1 year';
			$expDate = new DateTime('this day + '.$valid);
			$exp = $expDate->format('Y-m-d');

			$sql = mysqli_query($con, "UPDATE `insured` SET `accident`='$acc',`calamity`='$cal',`fire`='$fire',`theft`='$theft',`exp_date`='$exp',`status`='1',`monthly`='1',`current_month`='$curMon' WHERE `insure_no`='$insurNo'");

			if ($sql) {
				header("location: ../my_insure.php");
			} else {
				echo "ooops something went wrong";
			}
		}
	}