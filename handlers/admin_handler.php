<?php session_start();
	require_once '../includes/database.php';

	// delete admin handler
	if (@$_GET['operation'] == 'del_admin') {
		if (@$_GET['id']) {
			$id = mysqli_real_escape_string($con, $_GET['id']);

			$sql = mysqli_query($con, "DELETE FROM `logins` WHERE `id` = $id");
			if ($sql) {
				$msg = 'Admin deleted successfully';
				$cssClass = 'alert-success';
				header("location: ../admin/admins.php?msg=$msg&cssClass=$cssClass");
				exit();
			} else {
				$msg = 'Unable to delete admin';
				$cssClass = 'alert-se';
				header("location: ../admin/admins.php?msg=$msg&cssClass=$cssClass");
				exit();
			}
		}
	}

	// add new admin handler
	if (@$_GET['operation'] == 'add_admin_handler') {
		if (isset($_POST['addAdminSubmit'])) {
			$lastname = $_POST['lastname'];
			$firstname = $_POST['firstname'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$sex = $_POST['sex'];
			$token = $_POST['token'];
			
			// clean input
			function cleanInput($value){
				global $con;
				$value = strip_tags($value);
				$value = mysqli_real_escape_string($con, $value);
			}

			cleanInput($lastname);
			cleanInput($firstname);
			cleanInput($email);
			cleanInput($phone);
			cleanInput($sex);
			cleanInput($token);

			$sql = "SELECT * FROM `logins` WHERE `email` = '$email'";
			if (mysqli_num_rows(mysqli_query($con, $sql)) > 0) {
				$msg = 'This email is alread in use';
				$cssClass = 'alert-danger';
				header("location: ../admin/admins.php?page=add_admin&msg=$msg&cssClass=$cssClass");
				exit();
			} else{
				if (strlen(str_replace(' ', '', $lastname)) < 2) {
					$msg = "Please enter admin's lastname";
					$cssClass = 'alert-danger';
					header("location: ../admin/admins.php?page=add_admin&msg=$msg&cssClass=$cssClass");
					// exit();
				} else {
					if (strlen(str_replace(' ', '', $firstname)) < 2) {
						$msg = "Please enter admin's firstname";
						$cssClass = 'alert-danger';
						header("location: ../admin/admins.php?page=add_admin&msg=$msg&cssClass=$cssClass");
						// exit();
					} else {
						if (strlen(str_replace(' ', '', $email)) < 2) {
							$msg = "Please enter admin's email";
							$cssClass = 'alert-danger';
							header("location: ../admin/admins.php?page=add_admin&msg=$msg&cssClass=$cssClass");
							// exit();
						} else {
							if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
								$msg = "Invalid email format";
								$cssClass = 'alert-danger';
								header("location: ../admin/admins.php?page=add_admin&msg=$msg&cssClass=$cssClass");
								// exit();
							} else {
								// if (strlen($phone) < 10 || strlen($phone) > 15) {
								if (strlen($phone) > 15) {
									$msg = 'Phone number cannot be less than 10 and cannot more than 15 characters';
									$cssClass = 'alert-danger';
									header("location: ../admin/admins.php?page=add_admin&msg=$msg&cssClass=$cssClass");
								} else {
									if ($sex == strtolower('male') && $sex == strtolower('female')) {
										$msg = 'enter valid sex';
										$cssClass = 'alert-danger';
										header("location: ../admin/admins.php?page=add_admin&msg=$msg&cssClass=$cssClass");
									} else {
										$role = 1;
										// $sql = "INSERT INTO `userstable`(`email`, `lastname`, `firstname`,`sex`, `phone`,`token`, `role`) VALUES ('$email','$lastname','$firstname','$sex','$phone','$token','$role')";
										$sql = "INSERT INTO `logins`(`firstname`, `lastname`, `email`, `phone`, `gender`, `token`, `role`) VALUES ('$firstname','$lastname','$email','$phone','$sex','$token','1')";
										if (mysqli_query($con, $sql)) {
											// $msg = "New Admin Added Successfully";
											// $msg = 1;
											$msg = 'New admin added successfully';
											$cssClass = 'alert-success';
											header("location: ../admin/admins.php?msg=$msg&cssClass=$cssClass");
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}

	// new admin set password handler
	if (@$_GET['operation'] == 'new_admin') {
		if (isset($_POST['adminSetPass'])) {
			$password = mysqli_real_escape_string($con, $_POST['password']);
			$confirmPassword = mysqli_real_escape_string($con, $_POST['confirmPassword']);

			// echo $password;
			$email = $_SESSION['email'];
			$password = $_POST['password'];
			$confirmPassword = $_POST['confirmPassword'];
			// echo $email;

			$password = strip_tags($password);
			$password = mysqli_real_escape_string($con, $password);
			$confirmPassword = strip_tags($confirmPassword);
			$confirmPassword = mysqli_real_escape_string($con, $confirmPassword);

			if (empty($password)) {
				$error = "Please enter Password";
				echo $error;
			} else {
				if (strlen($password) < 6) {
					$error = "Your password cannot be less than 6 characters";
					echo $error;
				} else {
					if ($password !== $confirmPassword) {
						$error = "Your passwords do not match";
						echo $error;
					} else {
						$password = sha1($password);
						
						$sql = "UPDATE `logins` SET `token`='',`password`='$password' WHERE `email` = '$email'";
						if (mysqli_query($con, $sql)) {
							$sql = "SELECT * FROM `logins` WHERE `email` = '$email'";
							$result = mysqli_query($con, $sql);
							$data = mysqli_fetch_assoc($result);
							// $sql1 = mysqli_query($con, "SELECT * FROM personal WHERE email = '$email'");
							// $data1 = mysqli_fetch_assoc($sql1);
							// $insurNo = $data1['insure_no'];
							$_SESSION['id'] = $data['id'];
							$_SESSION['email'] = $data['email'];
							$_SESSION['name'] = $data['lastname']. ' '. $data['firstname'];
							$_SESSION['role'] = $data['role'];
							$_SESSION['insurNo'] = $insurNo;
							$msg ='You have create your password successfully';
							$alertClass = 'alert-success';
							header("location: ../admin/index.php?msg=$msg&alertClass=$alertClass");
							exit();

							
						}
					}
				}
			}
		}
	}

	