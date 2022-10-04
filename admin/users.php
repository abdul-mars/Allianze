<?php //include_once 'header.php'; 
	include_once 'side_bar.php'; 
	error_reporting(0);
?>
<main class="mt-3">
	<div class="row">
		<div class="col-12 col-sm-6 col-md-4 mt-2 text-center">
			<!-- <button class="btn btn-primary btn-lg fw-bold p-3">Active Insurances</button> -->
			<a href="users.php?page=active_insurances" class="btn btn-primary btn-lg fw-bold p-3">Active Insurances</a>
		</div>
		<div class="col-12 col-sm-6 col-md-4 mt-2 text-center">
			<!-- <button class="btn btn-primary btn-lg fw-bold p-3">Expired Insurances</button> -->
			<a href="users.php?page=expired_insurances" class="btn btn-primary btn-lg fw-bold p-3">Expired Insurances</a>
		</div>
		<div class="col-12 col-sm-6 col-md-4 mt-2 text-center">
			<!-- <button class="btn btn-primary btn-lg fw-bold p-3">All Users</button> -->
			<a href="users.php?page=all_users" class="btn btn-primary btn-lg fw-bold p-3">All Users</a>
		</div>
	</div><hr>
	<div class="row">
		<?php if (@$_GET['page'] != 'active_insurances' && @$_GET['page'] != 'expired_insurances' && @$_GET['page'] == 'all_users') { ?>
			<div class="h2">All Users</div>
			<div>
				<table class="table table-hover table-bordeed">
					<thead>
						<tr>
							<th>#</th>
							<!-- <th>Picture</th> -->
							<th>Email</th>
							<th>Name</th>
							<th>Gender</th>
							<th>Phone</th>
							<!-- <th>Operation</th> -->
						</tr>
					</thead>
					<tbody>
						<?php 
							$sql = mysqli_query($con, "SELECT * FROM logins WHERE role = 0");
							$count = 1;
							while ($data = mysqli_fetch_assoc($sql)) {
								$email = $data['email'];
								$name = $data['lastname'].' '.$data['firstname'];
								$gender =$data['gender'];
								$phone = $data['phone']; ?>
								<tr>
									<th><?= $count; ?></th>
									<td><?= $email; ?></td>
									<td><?= $name; ?></td>
									<td><?= $gender; ?></td>
									<td><?= $phone; ?></td>
								</tr>
							<?php $count ++;
								}
							?>
					</tbody>
				</table>
			</div>
		<?php } if (@$_GET['page'] == 'active_insurances' && @$_GET['page'] != 'expired_insurances' && @$_GET['page'] != 'all_users') { ?>
			<div class="h2">All Users</div>
			<div>
				<table class="table table-hover table-bordeed">
					<thead>
						<tr>
							<th>#</th>
							<!-- <th>Picture</th> -->
							<th>Email</th>
							<th>Insurance No</th>
							<!-- <th>Accident</th>
							<th>Calamity</th>
							<th>Add_ons</th>
							<th>Theft</th> -->
							<th>Status</th>
							<th>Operation</th>
						</tr>
					</thead>
					<tbody>
						<?php $sql = mysqli_query($con, "SELECT * FROM `insured`");
							$count = 1;
							while ($data = mysqli_fetch_assoc($sql)) {
								$insurNo = $data['insure_no'];
								if ($data['accident'] == 1) {
									$acc = '<i class="fas fa-check"></i>';
								} else {
									$acc = '<i class="fas fa-times"></i>';
								}
								if ($data['calamity'] == 1) {
									$cal = '<i class="fas fa-check"></i>';
								} else {
									$cal = '<i class="fas fa-times"></i>';
								}
								if ($data['fire'] == 1) {
									$addOns = '<i class="fas fa-check"></i>';
								} else {
									$addOns = '<i class="fas fa-times"></i>';
								}
								if ($data['theft'] == 1) {
									$theft = '<i class="fas fa-check"></i>';
								} else {
									$theft = '<i class="fas fa-times"></i>';
								}
								if ($data['status'] == 1) {
									$status = '<span class="badge bg-primary">Active</span>';
								} else {
									$status = '<span class="badge bg-danger">Expired</span>';
								}
								// $acc = $data['accident'] = 1 ? 'yes' : 'no';
								$email = mysqli_fetch_assoc(mysqli_query($con, "SELECT `email` FROM personal WHERE insure_no = '$insurNo'"))['email'];
							?>
							<tr>
								<th><?= $count; ?></th>
								<td><?= $email; ?></td>
								<td><?= $insurNo; ?></td>
								<!-- <td>Testing User1</td> -->
								<!-- <td><?= $acc; ?></td>
								<td><?= $cal; ?></td>
								<td><?= $addOns; ?></td>
								<td><?= $theft; ?></td> -->
								<td><?= $status; ?></td>
								<!-- <td></td> -->
								<td><button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#more<?= $data['id']; ?>">View More</button></td>
								<!-- <td><button class="btn btn-warning btn-sm">View More</button></td> -->
							</tr>
							<!-- Modal -->
							<div class="modal fade" id="more<?= $data['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											Starting Date: <?= $data['start_date']; ?> <br>
											Expiring Date: <?= $data['exp_date']; ?> <br> <hr>
											Accident: <?= $acc; ?> <!-- <br> -->
											Calamity: <?= $cal; ?> <!-- <br> -->
											Fire: <?= $addOns; ?> <!-- <br> -->
											Theft: <?= $theft; ?> <!-- <br> -->
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
											<!-- <button type="button" class="btn btn-primary">Understood</button> -->
										</div>
									</div>
								</div>
							</div>
							<?php $count++;
								}
						?>
					</tbody>
				</table>
			</div>
		<?php } if (@$_GET['page'] != 'active_insurances' && @$_GET['page'] == 'expired_insurances' && @$_GET['page'] != 'all_users') { ?>
			<div class="h2">All Users</div>
			<div>
				<table class="table table-hover table-bordeed">
					<thead>
						<tr>
							<th>#</th>
							<!-- <th>Picture</th> -->
							<th>Email</th>
							<th>Name</th>
							<th>Insurance No</th>
							<th>Status</th>
							<th>Operation</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$today = date('Y-m-d');
							// $today = strtotime($today);
							$tomoro = "2022-09-22";
							$tomoro = strtotime($tomoro);
							// $expDate = $today < $tomoro;
							// if ($today < $tomoro) {
							// 	echo 'not expired';
							// } else { echo 'expired';}
							$sql = mysqli_query($con, "SELECT * FROM `insured` WHERE `exp_date` < '$today'");
							$count = 1;
							while ($data = mysqli_fetch_assoc($sql)) {
								$insurNo = $data['insure_no'];
								if ($data['accident'] == 1) {
									$acc = '<i class="fas fa-check"></i>';
								} else {
									$acc = '<i class="fas fa-times"></i>';
								}
								if ($data['calamity'] == 1) {
									$cal = '<i class="fas fa-check"></i>';
								} else {
									$cal = '<i class="fas fa-times"></i>';
								}
								if ($data['fire'] == 1) {
									$addOns = '<i class="fas fa-check"></i>';
								} else {
									$addOns = '<i class="fas fa-times"></i>';
								}
								if ($data['theft'] == 1) {
									$theft = '<i class="fas fa-check"></i>';
								} else {
									$theft = '<i class="fas fa-times"></i>';
								}
								if ($data['status'] == 1) {
									$status = '<span class="badge bg-primary">Active</span>';
								} else {
									$status = '<span class="badge bg-danger">Expired</span>';
								}
								$sql1 = mysqli_query($con, "SELECT * FROM personal WHERE insure_no = '$insurNo'");
								$data1 = mysqli_fetch_array($sql1);
								$email = $data1['email'];
								
								$sql2 = mysqli_query($con, "SELECT * FROM logins WHERE email = '$email'");
								$data2 = mysqli_fetch_array($sql2);
								$name = $data2['lastname'].' '.$data2['firstname'];
							 ?>
								<tr>
									<th><?= $count; ?></th>
									<!-- <td><img src="../img/rashid.jpg" alt="Profile Picture" width="70" height="70" style="border-radius: 50%;"></td> -->
									<td><?= $email; ?></td>
									<td><?= $name; ?></td>
									<td><?= $insurNo; ?></td>
									<td><span class="badge bg-danger">Expired</span></td>
									<td><button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#more<?= $data['id']; ?>">View More</button></td>
									<!-- <td><button class="btn btn-warning btn-sm">View More</button></td> -->
								</tr>
								<!-- Modal -->
								<div class="modal fade" id="more<?= $data['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<?= $today; ?> <br>
												Starting Date: <?= $data['start_date']; ?> <br>
												Expiring Date: <?= $data['exp_date']; ?> <br> <hr>
												Accident: <?= $acc; ?> <!-- <br> -->
												Calamity: <?= $cal; ?> <!-- <br> -->
												Fire: <?= $addOns; ?> <!-- <br> -->
												Theft: <?= $theft; ?> <!-- <br> -->
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
												<!-- <button type="button" class="btn btn-primary">Understood</button> -->
											</div>
										</div>
									</div>
								</div>
							<?php $count++;
								 }
						?>
					</tbody>
				</table>
			</div>
		<?php } ?>
	</div>
</main>