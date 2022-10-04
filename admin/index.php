<?php //include_once 'header.php'; 
	include_once 'side_bar.php'; 
?>


<main class="mt-3">
	<div class="row">
		<div class="col-1"></div>
		<div class="col-12 col-sm-6 col-md-3 p-2 m-2">
			<div class="small-box bg-light shadow-sm border row">
				<div class="inner col-6">
					<h1>
						<?php $sql = mysqli_query($con, "SELECT * FROM logins WHERE role = 0");
							echo mysqli_num_rows($sql);
						?>
					</h1>
					<p>Total Users</p>
				</div>
				<div class="icon col-6 mt-2">
					<i class="fa fa-th-list fa-5x text-muted"></i>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-6 col-md-3 p-2 m-2">
			<div class="small-box bg-light shadow-sm border row">
				<div class="inner col-6">
					<h1>
						<?php $sql = mysqli_query($con, "SELECT DISTINCT insure_no FROM insured");
							echo mysqli_num_rows($sql);
						?>
					</h1>
					<p>Total Insured</p>
				</div>
				<div class="icon col-6 mt-2">
					<i class="fa fa-th-list fa-5x text-muted"></i>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-6 col-md-3 p-2 m-2">
			<div class="small-box bg-light shadow-sm border row">
				<div class="inner col-6">
					<h1>
						<?php $sql = mysqli_query($con, "SELECT * FROM `messages`");
							echo mysqli_num_rows($sql);
						?>
					</h1>
					<p>Total Messages</p>
				</div>
				<div class="icon col-6 mt-2">
					<i class="fa fa-th-list fa-5x text-muted"></i>
				</div>
			</div>
		</div>
	</div>
	<?php //$valid = '1 year';
		// $date = new DateTime('this day + '.$valid);
		// // $new = new $date;
		// // echo "<pre>";
		// // print_r($date) ;echo "</pre>";
		// echo $date->format('Y-m-d');
	?>
</main>



















