<?php
	include_once 'includes/header.php';
	$insurNo = $_SESSION['insurNo'];
	$sql = mysqli_query($con, "SELECT * FROM insured WHERE insure_no = '$insurNo'");
	if (mysqli_num_rows($sql) < 1) {
		$msg = 'please get insured first';
		$cssClass = 'alert-danger';
		header("location: insured.php?msg=$msg&cssClass=$cssClass");
		exit();
	}
?>

<div class="container">
	<div class="row mt-3">
		<h3 class="text-center">Claim Insurance Form</h3>
		<h5 class="text-center">Please fill this form properly</h5>
		<form action="handlers/claims_handler.php" method="post" enctype="multipart/form-data">
			<div class="row">
				<!-- <div class="form-group"> -->
					<div class="mb-3 col-sm-6">
						<label for="type" class="form-label">Problem type</label>
						<input type="text" class="form-control" name="type" id="type" placeholder="type of problem">
					</div>
					<div class="mb-3 col-sm-6">
						<label for="cause" class="form-label">Problem cause</label>
						<input type="text" class="form-control" name="cause" id="cause" placeholder="cause of problem">
					</div>
					<div class="mb-3 col-sm-6">
						<label for="when" class="form-label">When</label>
						<input type="date" class="form-control" name="when" id="when" placeholder="when did the problem happed">
					</div>
					<div class="mb-3 col-sm-6">
						<label for="where" class="form-label">Where</label>
						<input type="text" class="form-control" name="where" id="where" placeholder="where did the problem happed">
					</div>
					<div class="mb-3 col-sm-6">
						<label for="level" class="form-label">Problem Level</label>
						<!-- <input type="email" class="form-control" id="level" placeholder="level of problem"> -->
						<select name="level" id="level" class="form-select">
							<option value="Serious">Serious</option>
							<option value="Severe">Severe</option>
						</select>
					</div>
					<div class="mb-3 col-sm-6">
						<label for="picture" class="form-label">Picture of the problem</label>
						<input type="file" class="form-control" name="picture" id="picture" value="D:\My Projects\PHP Projects\htdocs\epes\assets\uploads\1607134440_avatar.jpg" placeholder="picture of problem">
					</div>
					<div class="mb-3">
						<button class="btn btn-primary btn-lg" type="submit" name="submit">Submit Claim</button>
					</div>
				<!-- </div> -->
			</div>
		</form>
	</div>
</div>



<?php
	include_once 'includes/footer.php';
?>