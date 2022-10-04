<?php session_start();
	include_once 'includes/database.php';
	
	if (isset($_SESSION['email']) && isset($_SESSION['role']) && isset($_SESSION['name'])) {
		$email = $_SESSION['email'];
	} else {
		header("location: login.php");
	}
?>
<head>
	<link rel="stylesheet" href="styles/bootstrap.min.css">
	<link rel="stylesheet" href="styles/style.css">
	<link rel="stylesheet" href="styles/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="styles/all.css">
	<title>Allianze</title>

</head>
<div class="bg-light">
	<div class="container 	">
		<div class="row mt-">
			<h2 class=" mt- text-center">Before you continue we need information about you and your vehicle</h2>
			<?php
				$sql = mysqli_query($con, "SELECT * FROM logins WHERE email = '$email'");
				if (@$_GET['page'] != 'vehicle') {
				$data = mysqli_fetch_assoc($sql);
				//if (strtolower($data['acc_type']) == 'personal') { ?>
					<fieldset class="border border-danger p-3 shadow mb-4">
						<h4 class="text-center">Information about you</h4>
						<h5 class="text-center">Name: <?= $data['lastname']. ' '. $data['firstname']; ?></h5>
						<hr>
						<form action="handlers/details_handler.php?operation=user_info" method="post" enctype="multipart/form-data">
							<div class="form-group row">
								<!-- <div class="mb-3 col-sm-6 col-md-4">
									<label for="name" class="form-label">Full Name</label>
									<input type="text" class="form-control" name="name" id="name" value="<?= $data['lastname']. ' '. $data['firstname']; ?>" placeholder="name" readonly required>
								</div> -->
								<!-- <div class="mb-3 col-sm-6 col-md-4">
									<label for="lastname" class="form-label">lastname</label>
									<input type="text" class="form-control" name="lastname" id="lastname" placeholder="lastname">
								</div> -->
								<div class="mb-3 col-sm-6 col-md-4">
									<label for="kin" class="form-label">Next Of Kin</label>
									<input type="text" class="form-control" name="kin" id="kin" placeholder="next of kin" required>
								</div>
								<div class="mb-3 col-sm-6 col-md-4">
									<label for="relationship" class="form-label">Kin Relationship</label>
									<input type="text" class="form-control" name="relationship" id="relationship" placeholder="relationship with the next of kin">
								</div>
								<div class="mb-3 col-sm-6 col-md-4">
									<label for="houseNo" class="form-label">house Number</label>
									<input type="text" class="form-control" name="houseNo" id="houseNo" placeholder="house Number">
								</div>
								<div class="mb-3 col-sm-6 col-md-4">
									<label for="licence" class="form-label">Driven licence No</label>
									<input type="text" class="form-control" name="licence" id="licence" placeholder="Driven licence No" required>
								</div>
								<div class="mb-3 col-sm-6 col-md-4">
									<label for="occupation" class="form-label">occupation</label>
									<input type="text" class="form-control" name="occupation" id="occupation" placeholder="occupation">
								</div>
								<div class="mb-3 col-sm-6 col-md-4">
									<label for="disability" class="form-label">disability</label>
									<!-- <input type="text" class="form-control" name="disability" id="disability" placeholder="disability"> -->
									<select name="disability" id="disability" class="form-select">
										<option value="None">None</option>
										<option value="visual">Visual Problem</option>
										<option value="hearing">Hearing Problem</option>
									</select>
								</div>
								<div class="mb-3 col-sm-6 col-md-4">
									<label for="picture" class="form-label">Picture</label>
									<input type="file" class="form-control" name="picture" id="picture" required>
								</div>
								<div class="mb-3 col-sm-12">
									<button type="submit" name="submit" class="btn btn-primary btn-lg float-end">Continue</button>
									<!-- <button type="submit" class="btn btn-dark text-light float-right">Back</button> -->
								</div>
							</div>
						</form>
					</fieldset>
				<?php //} else { ?>
					<!-- <fieldset class="border border-danger p-3 shadow mb-4">
						<h4 class="text-center">Information about the company</h4>
						<hr>
						<form action="handlers/details_handler.php?operation=company_info" method="post">
							<div class="form-group row">
								<div class="mb-3 col-sm-6 col-md-4">
									<label for="name" class="form-label">Compay Name</label>
									<input type="text" class="form-control" name="name" id="name" placeholder="name">
								</div>
								<div class="mb-3 col-sm-6 col-md-4">
									<label for="manager" class="form-label">Manager</label>
									<input type="text" class="form-control" name="manager" id="manager" placeholder="next of manager">
								</div>
								<div class="mb-3 col-sm-6 col-md-4">
									<label for="location" class="form-label">location</label>
									<input type="text" class="form-control" name="location" id="location" placeholder="location of the company">
								</div>
								<div class="mb-3 col-sm-6 col-md-4">
									<label for="driver" class="form-label">Drive Name</label>
									<input type="text" class="form-control" name="driver" id="driver" placeholder="Driver's name">
								</div>
								<div class="mb-3 col-sm-6 col-md-4">
									<label for="licence" class="form-label">Driven licence No</label>
									<input type="text" class="form-control" name="licence" id="licence" placeholder="Driven licence No">
								</div>
								<div class="mb-3 col-sm-6 col-md-4">
									<label for="disability" class="form-label">Driver disability</label>
									<select name="disability" id="disability" class="form-select">
										<option value="None">None</option>
										<option value="visual">Visual Problem</option>
										<option value="hearing">Hearing Problem</option>
									</select>
								</div>
								<div class="mb-3 col-sm-12">
									<button type="submit" name="submit"  class="btn btn-danger float-end">Continue</button>
									<button type="submit"class="btn btn-dark text-light float-right">Back</button>
								</div>
							</div>
						</form>
					</fieldset> -->
				<?php //} 
			} ?>

			<?php if (@$_GET['page'] == 'vehicle') { ?>
				<fieldset class="border border-danger p-3 shadow mb-4">
					<h4 class="text-center">Information about the vehicle</h4>
					<hr>
					<form action="handlers/details_handler.php?operation=vehicles" method="post" enctype="multipart/form-data">
						<div class="form-group row">
							<div class="mb-3 col-sm-6 col-md-4">
								<label for="name" class="form-label">Vehicl Name</label>
								<input type="text" class="form-control" name="name" id="name" placeholder="name" required>
							</div>
							<div class="mb-3 col-sm-6 col-md-4">
								<label for="model" class="form-label">model</label>
								<input type="text" class="form-control" name="model" id="model" placeholder="model" required>
							</div>
							<div class="mb-3 col-sm-6 col-md-4">
								<label for="type" class="form-label">type</label>
								<input type="text" class="form-control" name="type" id="type" placeholder="type of the vehicle">
							</div>
							<div class="mb-3 col-sm-6 col-md-4">
								<label for="plate" class="form-label">Plate No</label>
								<input type="text" class="form-control" name="plate" id="plate" placeholder="vehicle's place number" required>
							</div>
							<div class="mb-3 col-sm-6 col-md-4">
								<label for="color" class="form-label">Color</label>
								<input type="text" class="form-control" name="color" id="color" placeholder="color">
							</div>
							<div class="mb-3 col-sm-6 col-md-4">
								<label for="capacity" class="form-label">Seat Capacity</label>
								<input type="number" class="form-control" name="capacity" id="capacity" placeholder="capacity" required>
							</div>
							<div class="mb-3 col-sm-6 col-md-4">
								<label for="picture" class="form-label">Picture of vehicle</label>
								<input type="file" class="form-control" name="picture" id="picture" placeholder="picture" required>
							</div>
							<div class="mb-3 col-sm-12">
								<button type="submit" name="submit" class="btn btn-primary btn-lg float-end">Continue</button>
								<!-- <button type="submit" class="btn btn-dark text-light float-right">Back</button> -->
							</div>
						</div>
					</form>
				</fieldset>
			<?php } ?>
		</div>
	</div>
</div>
<?php
	include_once 'includes/footer.php';