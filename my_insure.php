<?php //session_start();
	include_once 'includes/header.php';
	$name = $_SESSION['name'];
	$email = $_SESSION['email'];
	$insurNo = $_SESSION['insurNo'];
?>
<!-- <div class="container"> -->
	<div class="row mt-2">
		<section class="bg-primary text-light">
			<div class="container">
				<div class="row">
				<div class="col-md-6 mt-5 mb-2">
					<?php
	                    if (@$_GET['msg']) { ?>
	                        <?php if(@$_GET['cssClass']){ $cssClass = $_GET['cssClass'] ?>
	                        <div class="alert <?= $cssClass; ?> text-center border border-dark" role="alert">
	                            <i class="<?php if($cssClass == 'alert-danger'){ echo 'fas fa-exclamation-triangle'; }else{echo 'fas fa-check';} ?>"></i> <?= $_GET['msg']; ?>
	                        </div>
	                    <?php } }
	                ?>
					<h2>Your information</h2>
					<?php $sql = mysqli_query($con, "SELECT * FROM logins WHERE email = '$email'");
						$data = mysqli_fetch_assoc($sql);
						//echo $insurNo = 'VI-'.rand('111111111', '999999999');
					?>
					<table class="table table-lg text-light mt-5">
						<!-- <thead> -->
							<tr>
								<th><h4>Firstname:</h4></th>
								<td><h4><?= $data['firstname']; ?></h4></td>
							</tr>
							<tr>
								<th><h4>Lastname:</h4></th>
								<td><h4><?= $data['lastname']; ?></h4></td>
							</tr>
							<tr>
								<th><h4>Email:</h4></th>
								<td><h4><?= $email; ?></h4></td>
							</tr>
							<tr>
								<th><h4>Phone No:</h4></th>
								<td><h4><?= $data['phone']; ?></h4></td>
							</tr>
						<!-- </thead> -->
					</table>
					<button class="btn btn-light btn-lg" data-bs-toggle="modal" data-bs-target="#updateInfo">Update Information</button>
				</div>
				<div class="col-md-6 col-lg- text-center">
					<?php
						$sql = mysqli_query($con, "SELECT * FROM `personal` WHERE email = '$email'"); 
						$picData = mysqli_fetch_assoc($sql);
					?>
					<img src="<?= $picData['picture']; ?>" class=" rounded-circle bg-light p-1 shadow-lg" alt="" width="100%" height="100%">
					<!-- <img src="img/63134fee18bac.jpg" alt="" width="100%" height="100%"> -->
				</div>
			</div>
		</section>
		<!-- user update info Modal start -->
		<div class="modal fade" id="updateInfo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">Update Info</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form action="handlers/my_insure_handler.php?operation=update_info" method="post" enctype="multipart/form-data">
							<div class="mb-3">
								<label for="firstname" class="form-label">First Name</label>
								<input type="text" class="form-control" value="<?= $data['firstname']; ?>" name="firstname" id="firstname" placeholder="">
							</div>
							<div class="mb-3">
								<label for="lastname" class="form-label">Lastname</label>
								<input type="text" name="lastname" id="lastname" value="<?= $data['lastname']; ?>" class="form-control">
							</div>
							<div class="mb-3">
								<label for="email" class="form-label">Email</label>
								<input type="email" name="email" id="email" value="<?= $data['email']; ?>" class="form-control">
							</div>
							<div class="mb-3">
								<label for="phone" class="form-label">Phone  No</label>
								<input type="number" name="phone" id="phone" value="<?= $data['phone']; ?>" class="form-control">
							</div>
							<!-- <div class="mb-3">
								<label for="lastname" class="form-label">Lastname</label>
								<input type="text" name="lastname" id="lastname" value="<?= $data['lastname']; ?>" class="form-control">
							</div> -->
							<button class="btn btn-primary" name="submit" type="submit">Update</button>
							<button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancel</button>
						</form>
					</div>
					<!-- <div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Understood</button>
					</div> -->
				</div>
			</div>
		</div>
		<!-- user update info Modal end -->
		<section>
			<div class="container">
				<div class="row mt-2 mb-2">
					<div class="col-md-6">
						<h2>Information about your insurance</h2>
						<?php $sql = mysqli_query($con, "SELECT * FROM `insured` WHERE insure_no = '$insurNo'");
						if (mysqli_num_rows($sql) < 1) {
							echo "You currently have no insurance";
						} else {
							$data = mysqli_fetch_assoc($sql);
							//$insuredTo = $data['accident'].','.$data['calamity'].','.$data['fire'].','.$data['theft'];
						?>
						<table class="table table- text- mt-5">
							<tr>
								<th><h4>Insurance No:</h4></th>
								<td><h4><?= $insurNo; ?></h4></td>
							</tr>
							<tr>
								<th><h4>Started On:</h4></th>
								<td><h4><?= $data['start_date']; ?></h4></td>
							</tr>
							<tr>
								<th><h4>Expiring On:</h4></th>
								<td><h4><?= $data['exp_date']; ?></h4></td>
							</tr>
							<!-- <tr>
								<th><h4>Services Insured To:</h4></th>
								<td><h4><?= $insuredTo; ?></h4></td>
							</tr> -->

						</table>
						<button class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#updateInsurance">Renew Insurance</button>
					</div>
					<div class="col-md-6">
						<h4>Services Currently Insured To</h4>
						<?php $sql = mysqli_query($con, "SELECT * FROM `insured` WHERE insure_no = '$insurNo'");
							$data = mysqli_fetch_assoc($sql);
							//$insuredTo = $data['accident'].','.$data['calamity'].','.$data['fire'].','.$data['theft'];
							//$page = isset($_GET['page']) ? $_GET['page'] : 'home';
							$acc = $data['accident'];
							$cal = $data['calamity'];
							$adds = $data['fire'];
							$theft = $data['theft'];
							// $acc = '5' ? 'Insured' : 'Not Insured';
							if ($acc == 1) {
								$acc = '<i class="fas fa-check"></i>';
							} else { $acc = '<i class="fas fa-times"></i>'; }
							if ($cal == 1) {
								$cal = '<i class="fas fa-check"></i>';
							} else { $cal = '<i class="fas fa-times"></i>'; }
							if ($adds == 1) {
								$adds = '<i class="fas fa-check"></i>';
							} else { $adds = '<i class="fas fa-times"></i>'; }
							if ($theft == 1) {
								$theft = '<i class="fas fa-check"></i>';
							} else { $theft = '<i class="fas fa-times"></i>'; }
						?>
						<table class="table table- text- mt-">
							<tr>
								<th><h4>Accident:</h4></th>
								<td><h4><?= $acc; ?></h4></td>
							</tr>
							<tr>
								<th><h4>Calamity:</h4></th>
								<td><h4><?= $cal; ?></h4></td>
							</tr>
							<tr>
								<th><h4>Fire:</h4></th>
								<td><h4><?= $adds; ?></h4></td>
							</tr>
							<tr>
								<th><h4>Theft:</h4></th>
								<td><h4><?= $theft; ?></h4></td>
							</tr>

						</table>
					<?php } ?>
						<!-- <button class="btn btn-light btn-lg">Update Info</button> -->
					</div>
				</div>
			</div>
			<!-- update insurance Modal start -->
			<div class="modal fade" id="updateInsurance" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticBackdropLabel">Renew Insurance</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form action="handlers/insured_handler.php?operation=update_insurance" method="post">
								<div class="mb-3">
									<input type="hidden" value="0">
									<input type="checkbox" class="form-check-input border border-primary border-2" value="1" name="accident" id="accident" <?php if($data['accident'] == 1) echo 'checked'; ?>>
									<label for="accident" class="form-check-label">Accident</label>
								</div>
								<div class="mb-3">
									<input type="hidden" name="calamity" value="0">
									<input type="checkbox" name="calamity" id="calamity" value="1" class="form-check-input border border-primary border-2" <?php if($data['calamity'] == 1) echo 'checked'; ?>>
									<label for="calamity" class="form-check-label">Calamity</label>
								</div>
								<div class="mb-3">
									<input type="hidden" name="fire" value="0">
									<input type="checkbox" name="fire" id="fire" value="1" class="form-check-input border border-primary border-2" <?php if($data['fire'] == 1) echo 'checked'; ?>>
									<label for="fire" class="form-check-label">Fire</label>
								</div>
								<div class="mb-3">
									<input type="hidden" name="theft" value="0">
									<input type="checkbox" name="theft" id="theft" value="1" class="form-check-input border border-primary border-2" <?php if($data['theft'] == 1) echo 'checked'; ?>>
									<label for="theft" class="form-check-label">Theft</label>
								</div>
								<div class="dropdown-divider"></div>
								<div class="mb-3">
									<?php 
										// $curMon = date('m');
										$date = date('Y') + 1;
										$valid = '1 year';
										$expDate = new DateTime('this day + '.$valid);
										$exp = $expDate->format('Y-m-d');
									?>
									<label for="date" class="form-label">Next Expiry Date</label>
									<input type="text" name="date" id="date" value="<?= $exp; ?>" class="form-control border border-primary border-2" readonly>
								</div>
								<!-- <div class="mb-3">
									<label for="seat" class="form-label">Number of Seats</label>
									<input type="text" name="seat" id="seat" value="<?= $data['seat_capa']; ?>" class="form-control">
								</div>
								<div class="mb-3">
									<label for="picture" class="form-label">Picture</label>
									<input type="file" name="picture" id="picture" value="<?= $data['img']; ?>" class="form-control">
								</div> -->
								<button class="btn btn-primary" name="renewSubmit" type="submit">Renew</button>
								<button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancel</button>
							</form>
						</div>
						<!-- <div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary">Understood</button>
						</div> -->
					</div>
				</div>
			</div>
			<!-- update insurance Modal end -->
		</section>

		<section class="bg-primary text-light">
			<div class="container">
				<div class="row">
				<div class="col-md-6 mt-5 mb-2">
					<h2>Information about your vehicle</h2>
					<?php $sql = mysqli_query($con, "SELECT * FROM `vehicles` WHERE insure_no = '$insurNo'");
						$data = mysqli_fetch_assoc($sql);
					?>
					<table class="table table-lg text-light mt-5">
						<!-- <thead> -->
							<tr>
								<th><h4>Vehicle name:</h4></th>
								<td><h4><?= $data['name']; ?></h4></td>
							</tr>
							<tr>
								<th><h4>Model:</h4></th>
								<td><h4><?= $data['model']; ?></h4></td>
							</tr>
							<tr>
								<th><h4>Type:</h4></th>
								<td><h4><?= $data['type']; ?></h4></td>
							</tr>
							<tr>
								<th><h4>Plate No:</h4></th>
								<td><h4><?= $data['plate_no']; ?></h4></td>
							</tr>
						<!-- </thead> -->
					</table>
					<button class="btn btn-light btn-lg" data-bs-toggle="modal" data-bs-target="#updateVehicleInfo">Update Information</button>
				</div>
				<div class="col-md-6 col-lg-">
					<?php $sql = mysqli_query($con, "SELECT `img` FROM `vehicles` WHERE insure_no = '$insurNo'");
						$data2 = mysqli_fetch_assoc($sql);
					?>
					<img src="<?= $data2['img'] ?>" alt="" width="100%" height="100%">
				</div>
			</div>
		</section>
		<!-- update vehicle Modal start -->
		<div class="modal fade" id="updateVehicleInfo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">Update Vehicle Info</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form action="handlers/my_insure_handler.php?operation=update_vehicle" method="post" enctype="multipart/form-data
						">
							<div class="mb-3">
								<label for="name" class="form-label">Vehicle Name</label>
								<input type="text" class="form-control" value="<?= $data['name']; ?>" name="name" id="name" placeholder="">
							</div>
							<div class="mb-3">
								<label for="model" class="form-label">Model</label>
								<input type="text" name="model" id="model" value="<?= $data['model']; ?>" class="form-control">
							</div>
							<div class="mb-3">
								<label for="type" class="form-label">Type</label>
								<input type="text" name="type" id="type" value="<?= $data['type']; ?>" class="form-control">
							</div>
							<div class="mb-3">
								<label for="color" class="form-label">color</label>
								<input type="text" name="color" id="color" value="<?= $data['color']; ?>" class="form-control">
							</div>
							<div class="mb-3">
								<label for="plate" class="form-label">Plate  No</label>
								<input type="text" name="plate" id="plate" value="<?= $data['plate_no']; ?>" class="form-control">
							</div>
							<div class="mb-3">
								<label for="seat" class="form-label">Number of Seats</label>
								<input type="text" name="seat" id="seat" value="<?= $data['seat_capa']; ?>" class="form-control">
							</div>
							<div class="mb-3">
								<label for="picture" class="form-label">Picture</label>
								<input type="file" name="picture" id="picture" value="<?= $data['img']; ?>" class="form-control">
							</div>
							<button class="btn btn-primary" name="submit" type="submit">Update</button>
							<button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancel</button>
						</form>
					</div>
					<!-- <div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Understood</button>
					</div> -->
				</div>
			</div>
		</div>
		<!-- update vehicle Modal end -->
	<!-- </div> -->
</div>

<?php
	include_once 'includes/footer.php';
?>