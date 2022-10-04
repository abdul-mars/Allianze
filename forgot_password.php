<?php
	require_once 'includes/database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles/bootstrap.min.css?style=<?= time(); ?>">
	<link rel="stylesheet" href="styles/style.css?style=<?= time(); ?>">
	<title>Reset Password</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<?php
		        if (@$_GET['msg']) { ?>
		            <?php if(@$_GET['cssClass']){ $cssClass = $_GET['cssClass'] ?>
		            <div class="alert <?= $cssClass; ?> text-center" role="alert">
		                <i class="<?php if($cssClass == 'alert-danger'){ echo 'fas fa-exclamation-triangle'; }else{echo 'fas fa-check';} ?>"></i> <?= $_GET['msg']; ?>
		            </div>
		        <?php } }
		    ?>
		    <?php if (@$_GET['page'] == 'code') {
		    	if (isset($_GET['email'])) {
		    		$email = $_GET['email'];
		    		//echo $email;?>
		    		<div class="form-group">
		    			<h3 class="text-center">Enter the verification code to proceed</h3> <hr>
		    			<form action="forgot_password.php?page=reset_password" method="post">
		    				<div class="row">
		    					<div class="col-12">
		    						<label for="code" class="form-label">Enter Verification Code</label>
			    					<input type="text" name="code" id="code" class="form-control form-control-lg border border-dark">
			    					<input type="hidden" value="<?= $email; ?>" name="email" id="email">
		    					</div>
		    					<div class="col mt-3">
		    						<button type="submit" name="submit" class="btn btn-primary btn-lg">Submit</button>
		    					</div>
		    				</div>
		    			</form>
		    		</div>
		    	<?php }
		    } if (@$_GET['page'] == 'reset_password') {
		    	if (isset($_POST['submit'])) {
		    		// if (@$_GET['email']) {
		    			$email = mysqli_real_escape_string($con, $_POST['email']);
		    			$code = mysqli_real_escape_string($con, $_POST['code']);
		    			echo $email;
		    			echo $code;

		    			$sql = mysqli_query($con, "SELECT * FROM `forget_password` WHERE email = '$email' AND $code = '$code' LIMIT 1");
		    			if (mysqli_num_rows($sql) < 1) {
		    				$msg = 'invalid code';
		    				$cssClass = 'alert-danger';
		    				header("location: forgot_password.php?page=code&email=$email&msg=$msg&cssClass=$cssClass");
		    				exit();
		    			} else {?>
							<div class="form-group">
								<form action="forgot_password.php?page=reset_password_handler" method="post">
									<div class="row">
										<h2 class="text-center">Create a new password</h2><hr>
										<div class="col-md-6">
											<label for="password" class="form-label">Password</label>
											<input type="password" name="password" id="password" class="form-control form-control-lg border border-dark">
											<input type="hidden" name="email" value="<?= $email; ?>" id="password">
										</div>
										<div class="col-md-6">
											<label for="confirmPassword" class="form-label">New Password</label>
											<input type="password" name="confirmPassword" id="confirmPassword" class="form-control form-control-lg border border-dark">
										</div>
										<div class="col-md-6">
											<!-- <label for="confirmPassword" class="form-label">New Password</label>
											<input type="password" name="confirmPassword" id="confirmPassword" class="form-control form-control-lg border border-dark"> -->
											<button type="submit" name="submit" class="btn btn-primary mt-3 btn-lg">Submit</button>
										</div>
									</div>
								</form>
							</div>
		    			<?php }
		    		//}
		    	}
		    } if (@$_GET['page'] == 'reset_password_handler') {
		    	if (isset($_POST['submit'])) {
		    		$email = mysqli_real_escape_string($con, $_POST['email']);
		    		$password = mysqli_real_escape_string($con, $_POST['password']);
		    		$confirmPassword = mysqli_real_escape_string($con, $_POST['confirmPassword']);

		    		echo $email;
		    		echo $password;
		    		echo $confirmPassword;

		    		if (empty($password)) {
		    			$msg = 'please enter password';
		    			$cssClass = 'alert-danger';
		    			header("location: forgot_password.php?page=reset_password?email=$email&msg=$msg&cssClass=$cssClass");
		    			exit();
		    		} else {
		    			if (strlen($password) < 6) {
			    			$msg = 'Password cannot be less 6 characters long';
			    			$cssClass = 'alert-danger';
			    			header("location: forgot_password.php?page=reset_password?email=$email&msg=$msg&cssClass=$cssClass");
			    			exit();
		    			} else {
		    				if ($password !== $confirmPassword) {
			    				$msg = 'Passwords do not match';
				    			$cssClass = 'alert-danger';
				    			header("location: forgot_password.php?page=reset_password?email=$email&msg=$msg&cssClass=$cssClass");
				    			exit();
		    				} else {
		    					$sql = mysqli_query($con, "UPDATE `logins` SET `password`='' WHERE `email` = '$email'");
		    					if ($sql) {
		    						session_start();
		    						$sql = mysqli_query($con, "SELECT * FROM `logins` WHERE `email` = '$email'");
		    						$data = mysqli_fetch_assoc($sql);
		    						$role = $data['role'];
			    					$msg = 'You have successfuly reset your password';
					    			$cssClass = 'alert-success';
					    			if ($role == 1) {
					    				$_SESSION['id'] = $data['id'];
										$_SESSION['email'] = $data['email'];
										$_SESSION['name'] = $data['lastname']. ' '. $data['firstname'];
										$_SESSION['role'] = $data['role'];
										// $_SESSION['insurNo'] = $insurNo;
					    				header("location: admin/index.php?msg=$msg&cssClass=$cssClass");
					    			} else {
					    				$_SESSION['id'] = $data['id'];
										$_SESSION['email'] = $data['email'];
										$_SESSION['name'] = $data['lastname']. ' '. $data['firstname'];
										$_SESSION['role'] = $data['role'];
										$_SESSION['insurNo'] = $data['insure_no'];
					    				header("location: index.php?msg=$msg&cssClass=$cssClass");
					    			}
						    			
					    			exit();
		    					}
		    				}
		    			}
		    		}
		    	}
		    }
		    ?>
		</div>
	</div>
</body>
</html>