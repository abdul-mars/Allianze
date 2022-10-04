<?php
	$url = $_SERVER['HTTP_HOST'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- <link rel="stylesheet" href="<?php echo 'http://'.$url; ?>/insurance/styles/bootstrap 5.css?style=<?= time(); ?>"> -->
		<link rel="stylesheet" href="<?php echo 'http://'.$url; ?>/Allianze/styles/index.css?style=<?= time(); ?>">
		<link rel="stylesheet" href="<?php echo 'http://'.$url; ?>/insurance/styles/cdn.bootstrap.5.2.0.css?style=<?= time(); ?>">
		<link rel="stylesheet" href="<?php echo 'http://'.$url; ?>/insurance/styles/bootstrap-icons.css?style=<?= time(); ?>">
		<link rel="stylesheet" href="<?php echo 'http://'.$url; ?>/insurance/styles/all.css?style=<?= time(); ?>">
		<!-- <link rel="stylesheet" href="<?php echo 'http://'.$url; ?>/insurance/styles/bootstrap.4.1.3.min.css?style=<?= time(); ?>"> -->
		<!-- <link rel="stylesheet" href="<?php echo 'http://'.$url; ?>/insurance/styles/maxcdn.bootstrapcdn.com3.3.7.css"> -->
		<title>Vehicle Insurance Log In</title>
	</head>
	<body>
		<div class="form_bg">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6"></div>
					<div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6">
						<div class="form_horizontal">
							<div class="form_icon"><i class="fas fa-user-edit"></i></div>
							<h3 class="title">Sign Up</h3>
							<div class="form-group">
								<span class="input-icon"><i class="fa fa-envelope"></i></span>
								<input type="email" name="email" id="email" class="form-control input" placeholder="Email">
							</div>
							<div class="form-group">
								<span class="input-icon"><i class="fa fa-user"></i></span>
								<input type="text" name="firstname" id="firstname" class="form-control input" placeholder="Firstname">
							</div>
							<div class="form-group">
								<span class="input-icon"><i class="fa fa-user"></i></span>
								<input type="text" name="lastname" id="lastname" class="form-control input" placeholder="Lastname">
							</div>
							<div class="form-group">
								<span class="input-icon"><i class="fa fa-phone"></i></span>
								<input type="tel" name="phone" id="phone" class="form-control input" placeholder="Phone">
							</div>
							<div class="form-group">
								<span class="input-icon"><i class="fa fa-user"></i></span>
								<!-- <input type="text" name="gender" id="gender" class="form-control input" placeholder="gender"> -->
								<select name="gender" id="gender" class="form-seect form-control input">
									<option value="">--Gender--</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
							<!-- <div class="form-group">
								<span class="input-icon"><i class="fa fa-user"></i></span>
								<select name="type" id="type" class="form-selct form-control ">
									<option value="">--Select Account Type--</option>
									<option value="Personal">Personal</option>
									<option value="Company">Company</option>
								</select>
							</div> -->
							<div class="form-group">
								<span class="input-icon" onclick="toggle()"><i class="fa fa-lock" id="lock"></i></span>
								<input type="password" name="password" id="password" class="form-control input" placeholder="Password">
							</div>
							<div class="form-group">
								<span class="input-icon" onclick="toggle2()"><i class="fa fa-lock" id="lock2"></i></span>
								<input type="password" name="confirmPassword" id="confirmPassword" class="form-control input" placeholder="Confirm Password">
							</div>
							<button class="btn signupSubmit">Sign Up</button>
							<ul class="form-options">
								<li><a href="#">Forgot Password?</a></li>
								<li ><a href="login.php" class="">Have Account? Sign In</a></li>
							</ul>
						</div>
						<!-- error Modal  start -->
						<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog modal-dialog-centered">
						    <div class="modal-content">
						      <!-- <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
						        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						      </div> -->
						      <div class="modal-body errorModal"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						      </div>
						      <!-- <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						        <button type="button" class="btn btn-primary">Save changes</button>
						      </div> -->
						      
						    </div>
						  </div>
						</div>
						<!-- error Modal  end -->
					</div>
					<div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6"></div>
				</div>
			</div>
		</div>
		<script src="<?php echo 'http://'.$url; ?>/insurance/js/cdn.jsdelivr.bootstrap.5.2.0.bundle.min.js?script=<?= time(); ?>"></script>
		<script src="<?php echo 'http://'.$url; ?>/insurance/js/jquery-3.6.1.js?script=<?= time(); ?>"></script>
		<script src="<?php echo 'http://'.$url; ?>/insurance/js/bootstrapcdn-4.0.0.bootstrap.min.js?script=<?= time(); ?>"></script>
		<script src="<?php echo 'http://'.$url; ?>/insurance/js/bootstrap.bundle.min.js?script=<?= time(); ?>"></script>
		<script src="<?php echo 'http://'.$url; ?>/Allianze/js/index.js?script=<?= time(); ?>"></script>
	</body>
</html>