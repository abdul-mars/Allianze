<?php require_once '../includes/database.php';
	if (@$_GET['operation'] == 'update') {
		if (@$_GET['id']) {
			$id = mysqli_real_escape_string($con, $_GET['id']);
			if (isset($_POST['updSerSubmit'])) {
				$name = mysqli_real_escape_string($con, $_POST['name']);
				$title = mysqli_real_escape_string($con, $_POST['title']);
				$desc = mysqli_real_escape_string($con, $_POST['desc']);

				// echo $name; echo "<br>";
				// echo $title; echo "<br>";
				// echo $desc; echo "<br>";

				if (empty($name) || empty($title) || empty($desc)) {
					$msg = 'All fields are required';
					$cssClass = 'alert-danger';
					header("location: ../admin/services.php?msg=$msg&cssClass=$cssClass");
					exit();
				} else {
					$sql = mysqli_query($con, "UPDATE `services` SET `service_name`='$name',`service_title`='$title',`service_info`='$desc' WHERE `service_id` = '$id'");
					if ($sql) {
						$msg = 'Service Update Successfuly';
						$cssClass = 'alert-success';
						header("location: ../admin/services.php?msg=$msg&cssClass=$cssClass");
						exit();
					} else {
						$msg = 'Unable to update service';
						$cssClass = 'alert-danger';
						header("location: ../admin/services.php?msg=$msg&cssClass=$cssClass");
						exit();
					}
				}
			} else {
				// $msg = 'All fields are required';
				// $cssClass = 'alert-danger';
				header("location: ../admin/services.php");
				exit();
			}
		} else {
			// $msg = 'All fields are required';
			// $cssClass = 'alert-danger';
			header("location: ../admin/services.php");
			exit();
		}
			
	}