<?php
	include_once 'includes/header.php';
?>
<div class="container">
	<div class="row mt-">
		<!-- <div class="col-md-4 mb-3 mt-3 border">
					<h2 class="text-center mt-3">Full Policy</h2> <hr>
					<h4 class="text-center">Ghs 200¢/Mon</h4>
		</div> -->
		<h3 class="text-center mt-5">Select all the services that you want to get your vehicle insured to</h3>
		<?php
	        if (@$_GET['msg']) { ?>
	            <?php if(@$_GET['cssClass']){ $cssClass = $_GET['cssClass'] ?>
	            <div class="alert <?= $cssClass; ?> text-center" role="alert">
	                <i class="<?php if($cssClass == 'alert-danger'){ echo 'fas fa-exclamation-triangle'; }else{echo 'fas fa-check';} ?>"></i> <?= $_GET['msg']; ?>
	            </div>
	        <?php } }
	    ?>
		<!-- <div class="card border mb-2 border-secondary"><h5 class="text-center">Monthly: Ghs 400¢</h5></div> -->
		<form action="handlers/insured_handler.php?operation=insured" method="post">
			<div class="row text-center g-4 mb-3">
				<div class="col-md-6">
					<div class="card h-100 bg-secondary  border border-dark text-light">
						<div class="card-body text-center">
							<div class="h1 mb-3">
								<!-- <i class="bi bi-laptop"></i> -->
							</div>
							<div class="form-check form-switch">
								<input class="form-check-input border border-primary border border-primary" type="hidden" role="switch" name="acc" value="0">
								<input class="form-check-input border border-primary border border-primary" type="checkbox" role="switch" name="acc" value="1" id="acc">
								<label class="form-check-label" for="acc"><h3 class="card-titile mb-3">Accident</h3></label>
							</div>
							
							<p class="card-text">
								Been in a car accident? Keep calm, we cover damages your car sustains in an accident.
							</p>
							<!-- <a href="#" class="btn btn-primary">Read More</a> -->
						</div>
					</div>
				</div>
				<!-- <div class="col-md-6">
					<div class="card h-100 border border-dark bg-secondary text-light">
						<div class="card-body text-center">
							<div class="h1 mb-3">
							</div>
							<div class="form-check form-switch">
								<input class="form-check-input border border-primary" name="pAcc" value="0" type="hidden" role="switch" >
								<input class="form-check-input border border-primary" name="pAcc" value="1" type="checkbox" role="switch" id="pAcc">
								<label class="form-check-label" for="pAcc"><h3 class="card-titile mb-3">Personal accident cover</h3></label>
							</div>
							
							<p class="card-text">
								Your safety is our priority, in case of injuries due to a car.
							</p>
						</div>
					</div>
				</div> -->
				<div class="col-md-6">
					<div class="card h-100 border border-dark ">
						<div class="card-body text-center">
							<div class="h1 mb-3">
								<!-- <i class="bi bi-people"></i> -->
							</div>
							<div class="form-check form-switch">
								<input class="form-check-input border border-secondary" name="NatCal" value="0" type="hidden" role="switch" >
								<input class="form-check-input border border-secondary" name="NatCal" value="1" type="checkbox" role="switch" id="NatCal">
								<label class="form-check-label" for="NatCal"><h3 class="card-titile mb-3">Natural calamities</h3></label>
							</div>
							
							<p class="card-text">
								Calamities can wreak havoc and your car is not immune to them, but your finances are!
							</p>
							<!-- <a href="#" class="btn btn-primary">Read More</a> -->
						</div>
					</div>
				</div>
				<!-- <div class="col-md-6">
					<div class="card h-100 border border-dark bg-secondary text-light">
						<div class="card-body text-center">
							<div class="h1 mb-3">
							</div>
							<div class="form-check form-switch">
								<input class="form-check-input border border-primary" name="liability" value="0" type="hidden" role="switch" >
								<input class="form-check-input border border-primary" name="liability" value="1" type="checkbox" role="switch" id="liability">
								<label class="form-check-label" for="liability"><h3 class="card-titile mb-3">Third-party liability</h3></label>
							</div>
							
							<p class="card-text">
								We cover damages to a third party property or injuries sustained by a third party.
							</p>
						</div>
					</div>
				</div> -->
				<div class="col-md-6">
					<div class="card h-100 border border-dark ">
						<div class="card-body text-center">
							<div class="h1 mb-3">
								<!-- <i class="bi bi-people"></i> -->
							</div>
							<div class="form-check form-switch">
								<input class="form-check-input border border-secondary" name="choice" value="0" type="hidden" role="switch" >
								<input class="form-check-input border border-secondary" name="choice" value="1" type="checkbox" role="switch" id="choice">
								<label class="form-check-label" for="choice"><h3 class="card-titile mb-3">Fire</h3></label>
							</div>
							
							<p class="card-text">
								We won't let a fire or an explosion burn your finances to ashes, be rest assured your car.
							</p>
							<!-- <a href="#" class="btn btn-primary">Read More</a> -->
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card h-100 border border-dark bg-secondary text-light">
						<div class="card-body text-center">
							<div class="h1 mb-3">
								<!-- <i class="bi bi-people"></i> -->
							</div>
							<div class="form-check form-switch">
								<input class="form-check-input border border-primary" name="theft" value="0" type="hidden" role="switch" >
								<input class="form-check-input border border-primary" name="theft" value="1" type="checkbox" role="switch" id="theft">
								<label class="form-check-label" for="theft"><h3 class="card-titile mb-3">Theft</h3></label>
							</div>
							
							<p class="card-text">
								Your car getting stolen could be your worst nightmare come true, but we ensure your peace.
							</p>
							<!-- <a href="#" class="btn btn-dark">Read More</a> -->
						</div>
					</div>
				</div>
					<div class="row">
						<div class="col-md-4"></div>
						<div class="col-md-4 row mt-2">
							<button class="btn btn-primary btn-lg btn-block" name="submit">Submit</button>
						</div>
						<div class="col-md-4"></div>
					</div>
			</div>
		</form>
	</div>
</div>
<?php include_once 'includes/footer.php'; ?>