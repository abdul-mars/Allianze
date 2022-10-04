<?php
	$url = $_SERVER['HTTP_HOST'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="<?php echo 'http://'.$url; ?>/Allianze/styles/index.css?style=<?= time(); ?>">
		<link rel="stylesheet" href="<?php echo 'http://'.$url; ?>/insurance/styles/cdn.bootstrap.5.2.0.css?style=<?= time(); ?>">
		<link rel="stylesheet" href="<?php echo 'http://'.$url; ?>/Allianze/styles/bootstrap-icons.css?style=<?= time(); ?>">
		<link rel="stylesheet" href="<?php echo 'http://'.$url; ?>/insurance/styles/all.css?style=<?= time(); ?>">
		<!-- <link rel="stylesheet" href="<?php echo 'http://'.$url; ?>/insurance/styles/maxcdn.bootstrapcdn.com3.3.7.css"> -->
		<title>Vehicle Insurance Log In</title>
	</head>
	<body>
		<div class="form_bg">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6"></div>
					<div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6">
						<?php
					        if (@$_GET['msg']) { ?>
					            <?php if(@$_GET['cssClass']){ $cssClass = $_GET['cssClass'] ?>
					            <div class="alert <?= $cssClass; ?> text-center" role="alert">
					                <i class="<?php if($cssClass == 'alert-danger'){ echo 'fas fa-exclamation-triangle'; }else{echo 'fas fa-check';} ?>"></i> <?= $_GET['msg']; ?>
					            </div>
					        <?php } }
					    ?>
						<div class="form_horizontal">
							<div class="form_icon"><i class="fa fa-user-circle"></i></div>
							<h3 class="title">Sign In</h3>
							<div class="form-group">
								<span class="input-icon"><i class="fas fa-envelope"></i></span>
								<input type="email" name="email" id="email" class="form-control input" placeholder="Email">
							</div>
							<div class="form-group">
								<span class="input-icon" onclick="toggle()"><i class="fas fa-lock" id="lock"></i></span>
								<input type="password" name="password" id="password" class="form-control input" placeholder="Password">
							</div>
								<small id="show" onclick="toggle()" style="cursor: pointer; user-select: none;">Show</small>
							<button class="btn signinSubmit">Sign In</button>
							<ul class="form-options">
								<li><a href="#staticBackdrop" data-bs-toggle="modal" >Forgot Password?</a></li>
								<!-- <li><button>Forgot Password?</button></li> -->
								<li><a href="signup.php">Create New Account</a></li>
							</ul>
						</div> <?//= $password = sha1('zxcvbnm'); ?>
						
						<!-- Modal -->
						<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="staticBackdropLabel">Forgot Password</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<h5 class="text-center">Enter the account email </h5>
										<!-- <form action="phpmailer/index.php?operation=forget_password" method="post"> -->
										<form action="phpmailer/index.php?operation=forget_password" method="post">
											<input type="email" name="email" class="form-control border border-dark form-control-lg">
											<button type="submit" name="forgetPassSubmit" class="btn btn-primary mt-2">Submit</button>
											<?//= md5("123123"); ?>
										</form>
									</div>
									<!-- <div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary">Understood</button>
									</div> -->
								</div>
							</div>
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
	</body>
	<script src="<?php echo 'http://'.$url; ?>/insurance/js/cdn.jsdelivr.bootstrap.5.2.0.bundle.min.js?script=<?= time(); ?>"></script>
	<script src="<?php echo 'http://'.$url; ?>/insurance/js/jquery-3.6.1.js?script=<?= time(); ?>"></script>
	<script src="<?php echo 'http://'.$url; ?>/Allianze/js/index.js?script=<?= time(); ?>"></script>
</html>