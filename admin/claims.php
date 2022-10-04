<?php //include_once 'header.php'; 
	include_once 'side_bar.php'; 
?>
<main class="mt-3">
	<div class="row">
		<div class="col-12 col-sm-6 col-md-4 mt-2 text-center">
			<!-- <button class="btn btn-primary btn-lg fw-bold p-3">Active Insurances</button> -->
			<a href="claims.php" class="btn btn-primary btn-lg fw-bold p-3">All Claims</a>
		</div>
		<div class="col-12 col-sm-6 col-md-4 mt-2 text-center">
			<!-- <button class="btn btn-primary btn-lg fw-bold p-3">Active Insurances</button> -->
			<a href="claims.php?page=new_claims" class="btn btn-primary btn-lg fw-bold p-3">New Claims</a>
		</div>
		<div class="col-12 col-sm-6 col-md-4 mt-2 text-center">
			<!-- <button class="btn btn-primary btn-lg fw-bold p-3">Active Insurances</button> -->
			<a href="claims.php?page=served_claims" class="btn btn-primary btn-lg fw-bold p-3">Served Claims</a>
		</div>
	</div> <hr>
	<?php
        if (@$_GET['msg']) { ?>
            <?php if(@$_GET['cssClass']){ $cssClass = $_GET['cssClass'] ?>
            <div class="alert <?= $cssClass; ?> text-center" role="alert">
                <i class="<?php if($cssClass == 'alert-danger'){ echo 'fas fa-exclamation-triangle'; }else{echo 'fas fa-check';} ?>"></i> <?= $_GET['msg']; ?>
            </div>
        <?php } }
    ?>
	<div class="row">
		<?php if (@$_GET['page'] != 'new_claims' && @$_GET['page'] != 'served_claims') { ?>
			<h2 class="text-center">All Claims</h2><hr>
			<div>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>No.</th>
							<!-- <th>Claimer Email</th> -->
							<th>Insurance No</th>
							<th>Reason</th>
							<th>Description</th>
							<th>Date</th>
							<th>Served</th>
							<th colspan="3" class="text-center">Operation</th>
						</tr>
					</thead>
					<tbody>
						<?php $sql = mysqli_query($con, "SELECT * FROM `claims`");
							$count = 1;
							while ($data = mysqli_fetch_assoc($sql)) {
								if ($data['status'] == 1) {
									$status = '<i class="fa fa-check"></i>';
								} else {
									$status = '<i class="fa fa-times"></i>';
								}
							?>
								<tr>
									<th><?= $count; ?></th>
									<!-- <td><?= $count; ?></td> -->
									<td><?= $data['insure_no']; ?></td>
									<td><?= $data['type']; ?></td>
									<td><?= $data['cause']; ?></td>
									<td><?= $data['when']; ?></td>
									<td><?= $status; ?></td>
									<td><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#moreInfo<?= $data['claim_id'] ?>">More</button></td>
									<!-- <td><button class="btn btn-primary">Served</button></td> -->
									<td><a href="../handlers/claims_handler.php?operation=served_claim&id=<?= $data['claim_id']; ?>" class="btn btn-primary">Served</a></td>
									<td><button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#msgModal<?= $data['claim_id'] ?>">Message</button></td>
									<!-- <td><button class="btn btn-danger">Delete</button></td> -->
								</tr>
								<!-- more info Modal start -->
								<div class="modal fade" id="moreInfo<?= $data['claim_id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="staticBackdropLabel">More Information about <?= $data['insure_no']; ?> claim</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<!-- <?= $data['claim_id'] ?> -->
												<?php $insurNo = $data['insure_no'];
													$sql2 = mysqli_query($con, "SELECT * FROM `personal` WHERE `insure_no` = '$insurNo'");
													$data2 = mysqli_fetch_assoc($sql2);
												?>
													<b>Email: </b><?= $data2['email']; ?> <br>
													<b>Problem Level: </b><?= $data['level']; ?> <br>
													<b>House No: </b><?= $data2['house_no']; ?> <br>
													<b>Driver Licence: </b><?= $data2['licence']; ?> <br>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
												<!-- <button type="button" class="btn btn-primary">Understood</button> -->
											</div>
										</div>
									</div>
								</div>
								<!-- more info Modal end -->

								<!-- Message Modal start -->
								<div class="modal fade" id="msgModal<?= $data['claim_id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="staticBackdropLabel">More Information about <?= $data['insure_no']; ?> claim</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<form action="../phpmailer/index.php?operation=claim_message" method="post">
												<div class="modal-body">
													<?php $sql1 = mysqli_query($con, "SELECT * FROM personal WHERE insure_no = '$insurNo'");
														$data1 = mysqli_fetch_array($sql1);
														$email = $data1['email'];
													?>
														<div class="row">
															<div class="col-md-12">
																<label for="email" class="form-label">Email</label>
																<input type="email" name="email" id="email" value="<?= $email; ?>" class="form-control">
															</div>
															<div class="col-md-12">
																<label for="msg" class="form-label">Message</label>
																<textarea name="msg" id="msg" cols="" rows="5" class="form-control"></textarea>
															</div>

														</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
													<button type="submit" name="claimMsgSubmit" class="btn btn-primary">Submit</button>
												</div>
											</form>
										</div>
									</div>
								</div>
								<!-- Message Modal end -->
							<?php $count++;
								}
						?>
					</tbody>
				</table>
			</div>
		<?php } if (@$_GET['page'] == 'new_claims') { ?>
			<h2 class="text-center">New Claims Order By Newest</h2><hr>
			<div>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>No.</th>
							<!-- <th>Claimer Email</th> -->
							<th>Insurance No</th>
							<th>Reason</th>
							<th>Description</th>
							<th>Date</th>
							<th colspan="3" class="text-center">Operation</th>
						</tr>
					</thead>
					<tbody>
						<?php $sql = mysqli_query($con, "SELECT * FROM `claims` WHERE `status` = 0 ORDER BY claim_id DESC");
							$count = 1;
							while ($data = mysqli_fetch_assoc($sql)) {
								$insurNo = $data['insure_no']; ?>
								<tr>
									<th><?= $count; ?></th>
									<!-- <td><?= $count; ?></td> -->
									<td><?= $insurNo; ?></td>
									<td><?= $data['type']; ?></td>
									<td><?= $data['cause']; ?></td>
									<td><?= $data['when']; ?></td>
									<td><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#moreInfo<?= $data['claim_id'] ?>">More</button></td>
									<!-- <td><button class="btn btn-primary">Served</button></td> -->
									<td><a href="../handlers/claims_handler.php?operation=served_claim&id=<?= $data['claim_id']; ?>" class="btn btn-primary">Served</a></td>
									<td><button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#msgModal<?= $data['claim_id'] ?>">Message</button></td>
									<!-- <td><button class="btn btn-danger">Delete</button></td> -->
								</tr>
								<!-- more info Modal start -->
								<div class="modal fade" id="moreInfo<?= $data['claim_id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="staticBackdropLabel">More Information about <?= $data['insure_no']; ?> claim</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<!-- <?= $data['claim_id'] ?> -->
												<?php $insurNo = $data['insure_no'];
													$sql2 = mysqli_query($con, "SELECT * FROM `personal` WHERE `insure_no` = '$insurNo'");
													$data2 = mysqli_fetch_assoc($sql2);
												?>
													<b>Email: </b><?= $data2['email']; ?> <br>
													<b>Problem Level: </b><?= $data['level']; ?> <br>
													<b>House No: </b><?= $data2['house_no']; ?> <br>
													<b>Driver Licence: </b><?= $data2['licence']; ?> <br>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
												<!-- <button type="button" class="btn btn-primary">Understood</button> -->
											</div>
										</div>
									</div>
								</div>
								<!-- more info Modal end -->

								<!-- Message Modal start -->
								<div class="modal fade" id="msgModal<?= $data['claim_id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="staticBackdropLabel">More Information about <?= $data['insure_no']; ?> claim</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<form action="../phpmailer/index.php?operation=claim_message" method="post">
												<div class="modal-body">
													<?php $sql1 = mysqli_query($con, "SELECT * FROM personal WHERE insure_no = '$insurNo'");
														$data1 = mysqli_fetch_array($sql1);
														$email = $data1['email'];
													?>
														<div class="row">
															<div class="col-md-12">
																<label for="email" class="form-label">Email</label>
																<input type="email" name="email" id="email" value="<?= $email; ?>" class="form-control">
															</div>
															<div class="col-md-12">
																<label for="msg" class="form-label">Message</label>
																<textarea name="msg" id="msg" cols="" rows="5" class="form-control"></textarea>
															</div>

														</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
													<button type="submit" name="claimMsgSubmit" class="btn btn-primary">Submit</button>
												</div>
											</form>
										</div>
									</div>
								</div>
								<!-- Message Modal end -->
							<?php $count++;
								}
						?>
					</tbody>
				</table>
			</div>
		<?php } if (@$_GET['page'] == 'served_claims') { ?>
			<h2 class="text-center">Served Claims Order By Newest</h2><hr>
			<div>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>No.</th>
							<!-- <th>Claimer Email</th> -->
							<th>Insurance No</th>
							<th>Reason</th>
							<th>Description</th>
							<th>Date</th>
							<th class="text">Operation</th>
						</tr>
					</thead>
					<tbody>
						<?php $sql = mysqli_query($con, "SELECT * FROM `claims` WHERE `status` = 1 ORDER BY claim_id DESC");
							$count = 1;
							while ($data = mysqli_fetch_assoc($sql)) { ?>
								<tr>
									<th><?= $count; ?></th>
									<!-- <td><?= $count; ?></td> -->
									<td><?= $data['insure_no']; ?></td>
									<td><?= $data['type']; ?></td>
									<td><?= $data['cause']; ?></td>
									<td><?= $data['when']; ?></td>
									<td><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#moreInfo<?= $data['claim_id'] ?>">More</button></td>
									<!-- <td><button class="btn btn-primary">Served</button></td> -->
									<!-- <td><a href="../handlers/claims_handler.php?operation=served_claim&id=<?= $data['claim_id']; ?>" class="btn btn-primary">Served</a></td> -->
									<!-- <td><button class="btn btn-success">Message</button></td> -->
									<!-- <td><button class="btn btn-danger">Delete</button></td> -->
								</tr>
								<!--more infor Modal start -->
								<div class="modal fade" id="moreInfo<?= $data['claim_id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="staticBackdropLabel">More Information about <?= $data['insure_no']; ?> claim</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<!-- <?= $data['claim_id'] ?> -->
												<?php $insurNo = $data['insure_no'];
													$sql2 = mysqli_query($con, "SELECT * FROM `personal` WHERE `insure_no` = '$insurNo'");
													$data2 = mysqli_fetch_assoc($sql2);
												?>
													<b>Email: </b><?= $data2['email']; ?> <br>
													<b>Problem Level: </b><?= $data['level']; ?> <br>
													<b>House No: </b><?= $data2['house_no']; ?> <br>
													<b>Driver Licence: </b><?= $data2['licence']; ?> <br>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
												<!-- <button type="button" class="btn btn-primary">Understood</button> -->
											</div>
										</div>
									</div>
								</div>
								<!--more infor Modal end -->
							<?php $count++;
								}
						?>
					</tbody>
				</table>
			</div>
		<?php }	
		?>
			
	</div>
</main>