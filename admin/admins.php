<?php //include_once 'header.php';
	include_once 'side_bar.php';
?>
<main class="mt-3">
	<div class="row">
		<div class="col-12 col-sm-6 col-md-4 mt-2 text-center">
			<!-- <button class="btn btn-primary btn-lg fw-bold p-3">Active Insurances</button> -->
			<a href="admins.php?page=add_admin" class="btn btn-primary btn-lg fw-bold p-3">Add New Admin</a>
		</div>
		<!-- <div class="col-12 col-sm-6 col-md-4 mt-2 text-center">
			<a href="claims.php?page=served_claims" class="btn btn-primary btn-lg fw-bold p-3">Served Claims</a>
		</div> -->
		<?php if (@$_GET['page'] != 'add_admin' && @$_GET['page'] != 'new_admin') { ?>
			<h2 class="text-center">All Admins</h2> <hr>
			<?php
                if (@$_GET['msg']) { ?>
                    <?php if(@$_GET['cssClass']){ $cssClass = $_GET['cssClass'] ?>
                    <div class="alert <?= $cssClass; ?> text-center" role="alert">
                        <i class="<?php if($cssClass == 'alert-danger'){ echo 'fas fa-exclamation-triangle'; }else{echo 'fas fa-check';} ?>"></i> <?= $_GET['msg']; ?>
                    </div>
                <?php } }
            ?>
			<div>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Email</th>
							<th>Name</th>
							<th>Operation</th>
						</tr>
					</thead>
					<tbody>
						<?php $sql = mysqli_query($con, "SELECT * FROM logins WHERE role = 1");
							$count = 1;
						while ($data = mysqli_fetch_assoc($sql)) { ?>
						<tr>
							<th><?= $count; ?></th>
							<td><?= $data['email']; ?></td>
							<td><?= $data['lastname'].' '.$data['firstname']; ?></td>
							<td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delAdmin<?= $data['id']; ?>"> <i class="far fa-trash-alt"></i> Delete</button></td>
						</tr>
						<div class="modal fade" id="delAdmin<?= $data['id']; ?>" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<div class="row">
											<i class="far fa-trash-alt fa-5x text-danger text-center"></i>
											<h5 class="text-center">Are You Sure You Want To Delete This Admin?</h5>
											<h6 class="text-center text-danger">This Action Is Irreversable</h6>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
										<!-- <button type="button" class="btn btn-danger">Understood</button> -->
										<a href="../handlers/admin_handler.php?operation=del_admin&id=<?= $data['id']; ?>" class="btn btn-danger">Yes, Delete</a>
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
		<?php } if (@$_GET['page'] == 'add_admin') { ?>
			<?php
                if (@$_GET['msg']) { ?>
                    <?php if(@$_GET['cssClass']){ $cssClass = $_GET['cssClass'] ?>
                    <div class="alert <?= $cssClass; ?> text-center" role="alert">
                        <i class="<?php if($cssClass == 'alert-danger'){ echo 'fas fa-exclamation-triangle'; }else{echo 'fas fa-check';} ?>"></i> <?= $_GET['msg']; ?>
                    </div>
                <?php } }
            ?>
			<h2 class="text-center">Add Admin Page</h2>
			<hr>
			<div class="row">
				<div class="form-group">
					<form action="../handlers/admin_handler.php?operation=add_admin_handler" method="post">
						<div class="container">
							<div class="row">
								<div class="col-md-6 mb-2">
									<label for="firstname" class="form-label">Firstname</label>
									<input type="text" name="firstname" id="firstname" class="form-control" required>
								</div>
								<div class="col-md-6 mb-2">
									<label for="lastname" class="form-label">Lastname</label>
									<input type="text" name="lastname" id="lastname" class="form-control" required>
								</div>
								<div class="col-md-6 mb-2">
									<label for="email" class="form-label">Email</label>
									<input type="email" name="email" id="email" class="form-control" required>
								</div>
								<div class="col-md-6 mb-2">
									<label for="phone" class="form-label">Phone</label>
									<input type="number" name="phone" id="phone" class="form-control">
								</div>
								<div class="col-md-6 mb-2">
									<label for="sex" class="form-label">Sex</label>
									<!-- <input type="number" name="phone" id="phone" class="form-control"> -->
									<select name="sex" id="sex" class="form-select">
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
								</div>
								<?php function genratepass($length){
						                $char = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
						                return substr(str_shuffle($char), 0, $length);
						            }
					            ?>
								<div class="col-md-6 mb-2">
									<label for="token" class="form-label">Token(Auto Generate Password)</label>
									<input type="text" name="token" value="<?php echo genratepass(8); ?>" id="token" class="form-control" readonly required>
								</div>
								<div class="mt-3">
									<!-- <label for="submit" class="form-label">submit</label>
									<input type="submit" value="Submit" name="submit" id="submit" class="form-control"> -->
									<button type="submit" class="btn btn-primary" name="addAdminSubmit">Add Admin</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		<?php } ?>

	</div>
</main>