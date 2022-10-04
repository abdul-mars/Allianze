<?php require_once '../includes/database.php';
	if (@$_GET['operation'] == 'signup') {
		// echo "string";
		if (isset($_POST['signupSubmit'])) {
			// echo "string";
			$email = $_POST['email'];
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$gender = $_POST['gender'];
			$phone = $_POST['phone'];
			//$type = $_POST['type'];
			$password = $_POST['password'];
			$confirmPassword = $_POST['confirmPassword'];
			// echo $email;

			if (empty($email)) {
				echo "Please enter email address";
			} else {
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				  echo "Invalid email format";
				} else {
					$sql = mysqli_query($con, "SELECT `email` FROM `logins` WHERE email = '$email'");
					if (mysqli_num_rows($sql) > 0) {
						echo "This email is alread in use";
					} else {
						if (empty($firstname)) {
							echo "Please enter your firstname";
						} else {
							if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
								echo "Only letters and white space allowed in your firstname";
							} else {
								if (empty($lastname)) {
									echo "Please enter your lastname";
								} else {
									if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
										echo "Only letters and white space allowed in your lastname";
									} else {
										if (strtolower($gender) != 'male' && strtolower($gender) != 'female') {
											echo "Please select your gender";
										} else {
											if (empty($phone)) {
												echo "Please enter your phone number";
											} else {
												if (!preg_match("/^[0-9]*$/",$phone)) {
													echo "letters and special characters are not allowed in phone number";
												} else {
													//if (strtolower($type) != 'personal' && strtolower($type) != 'company') {
														//echo "Please select your account type";
													//} else {
														if (empty($password)) {
															echo "Please enter password";
														} else {
															if (strlen($password) < 6) {
																echo "password must be at least 6 characters long";
															} else {
																if ($password !== $confirmPassword) {
																	echo "passwords do not match";
																} else {
																	// clean inputs
																	$email = mysqli_real_escape_string($con, $email);
																	$firstname = mysqli_real_escape_string($con, $firstname);
																	$lastname = mysqli_real_escape_string($con, $lastname);
																	$gender = mysqli_real_escape_string($con, $gender);
																	$phone = mysqli_real_escape_string($con, $phone);
																	//$type = mysqli_real_escape_string($con, $type);
																	$password = mysqli_real_escape_string($con, $password);
																	$confirmPassword = mysqli_real_escape_string($con, $confirmPassword);

																	$password = sha1($password);

																	$sql = mysqli_query($con, "INSERT INTO `logins`(`firstname`, `lastname`, `email`, `phone`, `gender`, `password`) VALUES ('$firstname','$lastname','$email','$phone','$gender','$password')");
																	if ($sql) {
																		$insurNo = 'VI-'.rand('111111111', '999999999');
																		session_start();
																		//if ($type == 'personal') {
																			mysqli_query($con, "INSERT INTO `personal`(`insure_no`, `email`) VALUES('$insurNo', '$email');");
																			$sql = mysqli_query($con, "SELECT * FROM `logins` WHERE email = '$email'");
																		//} else {
																			// mysqli_query($con, "INSERT INTO `company`(`insure_no`, `email`) VALUES('$insurNo', '$email');");
																			// $sql = mysqli_query($con, "SELECT * FROM `logins` WHERE email = '$email'");
																		//}
																		$data = mysqli_fetch_assoc($sql);
																		$_SESSION['id'] = $data['id'];
																		$_SESSION['email'] = $data['email'];
																		$_SESSION['name'] = $data['lastname']. ' '. $data['firstname'];
																		$_SESSION['role'] = $data['role'];
																		$_SESSION['insurNo'] = $insurNo;
																		// mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM company "))
																		echo 1;
																	} else{
																		echo "Unable to create account. Please try again later";
																	}

																}
															}
														}
													//}
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
		}
	}

	// user sign in handler
	if (@$_GET['operation'] == 'signin') {
		if (isset($_POST['signinSubmit'])) {
			$email = $_POST['email'];
			$password = $_POST['password'];
			// echo $email;
			$email = mysqli_real_escape_string($con, $email);
			$password = mysqli_real_escape_string($con, $password);

			if (empty($email)) {
				echo 'Please enter your email address';
			} else {
				if (empty($password)) {
					echo "Please enter your password";
				} else {
					$password = sha1($password);
					$sql = mysqli_query($con, "SELECT * FROM logins WHERE email = '$email' AND password = '$password' AND role = '0'");
					if (mysqli_num_rows($sql) < 1) {
						echo "Incorrect Email and or Password";
						exit();
					} else {
						session_start();
						$data = mysqli_fetch_assoc($sql);
						$sql1 = mysqli_query($con, "SELECT * FROM personal WHERE email = '$email'");
						if (mysqli_num_rows($sql1) != 0) {
							$data1 = mysqli_fetch_assoc($sql1);
							$insurNo = $data1['insure_no'];
						} else {
							$sql2 = mysqli_query($con, "SELECT * FROM `company` WHERE `email` = '$email'");
							$data2 = mysqli_fetch_assoc($sql2);
							$insurNo = $data2['insure_no'];
						}
						$_SESSION['id'] = $data['id'];
						$_SESSION['email'] = $data['email'];
						$_SESSION['name'] = $data['lastname']. ' '. $data['firstname'];
						$_SESSION['role'] = $data['role'];
						$_SESSION['insurNo'] = $insurNo;
						echo 1;
					}
				}
			}
		}
	}

	// admin sign in handler
	if (@$_GET['operation'] == 'admin_signin') {
		if (isset($_POST['adminSigninSubmit'])) {
			$email = $_POST['email'];
			$password = $_POST['password'];
			// echo $email;
			$email = mysqli_real_escape_string($con, $email);
			$password = mysqli_real_escape_string($con, $password); //echo $email;

			if (empty($email)) {
				echo 'Please enter your email address';
			} else {
				if (empty($password)) {
					echo "Please enter your password";
				} else {
					$sql = mysqli_query($con, "SELECT * FROM logins WHERE email = '$email' AND token = '$password' AND role = '1'");
					if (mysqli_num_rows($sql) < 1) {
						$password = sha1($password);
						$sql = mysqli_query($con, "SELECT * FROM logins WHERE email = '$email' AND password = '$password' AND role = '1'");
						if (mysqli_num_rows($sql) < 1) {
							echo "Incorrect Email and or Password";
							exit();
						} else {
							session_start();
							$data = mysqli_fetch_assoc($sql);
							// $sql1 = mysqli_query($con, "SELECT * FROM personal WHERE email = '$email'");
							// // if (mysqli_num_rows($sql1) != 0) {
							// 	$data1 = mysqli_fetch_assoc($sql1);
							// 	$insurNo = $data1['insure_no'];
							// } else {
							// 	$sql2 = mysqli_query($con, "SELECT * FROM `company` WHERE `email` = '$email'");
							// 	$data2 = mysqli_fetch_assoc($sql2);
							// 	$insurNo = $data2['insure_no'];
							// }
							$_SESSION['id'] = $data['id'];
							$_SESSION['email'] = $data['email'];
							$_SESSION['name'] = $data['lastname']. ' '. $data['firstname'];
							$_SESSION['role'] = $data['role'];
							// $_SESSION['insurNo'] = $insurNo;
							echo 1;
						}
					} else {
						session_start();
						$email = $_SESSION['email'] = $data = mysqli_fetch_assoc($sql)['email'];
						echo 2;
						// $msg = 'You have to set your password for the fisrt time login in as admin';
						// $cssClass = 'alert-success';
						// header("location: ../admin/new_admin?msg=$msg&cssClass=$cssClass");
						// exit();
					}
				}
			}
		}
	}

	// if (@$_GET['operation'] == 'forget_password') {
	// 	if (isset($_POST['forgetPassSubmit'])) {
	// 		$email = mysqli_real_escape_string($con, $_POST['email']);
	// 		// echo $email;
	// 		$sql = mysqli_query($con, "SELECT * FROM logins WHERE email = '$email'");
	// 		if (mysqli_num_rows($sql) < 1) {
	// 			$msg = 'This email is not registered';
	// 			$cssClass = 'alert-danger';
	// 			header("location: ../login.php?msg=$msg&cssClass=$cssClass");
	// 			exit();
	// 		} else {
	// 			$code = rand(000000, 999999);
	// 			// echo $code;
	// 			$subject = 'Verification Code From Allianze Vehicle Insurance';
	// 			$body = "<p>You request to reset your account password and here your verification code</p>
	// 					<p style='font-weight: bold; color: red;'>".$code."</p>";
	// 			// echo $subject; echo "<br>";
	// 			// echo $body;

	// 			$sql = mysqli_query($con, "INSERT INTO `forget_password`( `email`, `code`) VALUES ('$email','$code')");
	// 			if ($sql) {
	// 				echo 'saved';

	// 			} else { echo 'not saved'; }
	// 		}
	// 	}
	// } 