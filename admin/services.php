<?php //include_once 'header.php'; 
	include_once 'side_bar.php'; 
?>
<main class="mt-3">
	<div class="row">
		<h2>All Services</h2>
		<?php
            if (@$_GET['msg']) { ?>
                <?php if(@$_GET['cssClass']){ $cssClass = $_GET['cssClass'] ?>
                <div class="alert <?= $cssClass; ?> text-center" role="alert">
                    <i class="<?php if($cssClass == 'alert-danger'){ echo 'fas fa-exclamation-triangle'; }else{echo 'fas fa-check';} ?>"></i> <?= $_GET['msg']; ?>
                </div>
            <?php } }
        ?> <hr>
		<div>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<!-- <th>Title</th> -->
						<th>Description</th>
						<!-- <th>No Of <br> Insured</th> -->
						<th>Operation</th>
					</tr>
				</thead>
				<tbody>
					<?php $sql = mysqli_query($con, "SELECT * FROM `services`");
						$count = 1;
						while ($data = mysqli_fetch_assoc($sql)) { ?>
							<tr>
								<th><?= $count; ?></th>
								<td><?= $data['service_name']; ?></td>
								<!-- <td><?= $data['service_title']; ?></td> -->
								<td><?= $data['service_info']; ?></td>
								<td><button class="btn btn-primary btn-" data-bs-toggle="modal" data-bs-target="#edit<?= $data['service_id'] ?>">Edit</button></td>
							</tr>
							<!-- Modal -->
							<div class="modal fade" id="edit<?= $data['service_id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="staticBackdropLabel">Update Service</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
											<form action="../handlers/services_handler.php?operation=update&id=<?= $data['service_id']; ?>" method="post">
												<div class="modal-body">
													<div class="form-group">
														<div class="row">
															<div class="mb-3">
																<label for="name" class="form-label">Service Name</label>
																<input type="text" name="name" id="name" value="<?= $data['service_name']; ?>" class="form-control">
															</div>
															<div class="mb-3">
																<label for="title" class="form-label">Service Title</label>
																<input type="text" name="title" id="title" value="<?= $data['service_title']; ?>" class="form-control">
															</div>
															<div class="mb-3">
																<label for="desc" class="form-label">Service Description</label>
																<!-- <input type="text" name="desc" id="desc" class="form-control"> -->
																<textarea name="desc" id="desc" class="form-control" cols="" rows=""><?= $data['service_info']; ?></textarea>
															</div>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
													<button type="submit" name="updSerSubmit" class="btn btn-primary">Understood</button>
												</div>
											</form>
									</div>
								</div>
							</div>
						<?php $count++;
							}
					?>
							
					<!-- <tr>
						<th>2</th>
						<td>Theft</td>
						<td>Lorem ipsum dolor sit amet consectetur adipisicing, elit. Quia nihil deserunt doloremque nostrum non ad dignissimos libero architecto quos quis, alias dolor unde minima provident dicta molestiae omnis asperiores tempore.</td>
						<td>50</td>
						<td><button class="btn btn-primary btn-">Edit</button></td>
					</tr>
					<tr>
						<th>3</th>
						<td>Nature</td>
						<td>Lorem ipsum dolor sit amet consectetur adipisicing, elit. Quia nihil deserunt doloremque nostrum non ad dignissimos libero architecto quos quis, alias dolor unde minima provident dicta molestiae omnis asperiores tempore.</td>
						<td>50</td>
						<td><button class="btn btn-primary btn-">Edit</button></td>
					</tr> -->
				</tbody>
			</table>
		</div>
	</div>
</main>