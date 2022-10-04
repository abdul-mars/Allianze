<?php //include_once 'header.php'; 
	include_once 'side_bar.php'; 
?>
<main class="mt-3">
	<div class="row">
		<h2 class="text-center">
			All Messages Order By Newest
		</h2>
		<?php
	        if (@$_GET['msg']) { ?>
	            <?php if(@$_GET['cssClass']){ $cssClass = $_GET['cssClass'] ?>
	            <div class="alert <?= $cssClass; ?> text-center" role="alert">
	                <i class="<?php if($cssClass == 'alert-danger'){ echo 'fas fa-exclamation-triangle'; }else{echo 'fas fa-check';} ?>"></i> <?= $_GET['msg']; ?>
	            </div>
	        <?php } }
	    ?>
		<div class="col">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Email</th>
						<th>Name</th>
						<th>Message</th>
						<th>Date Sent</th>
						<th>Operation</th>
					</tr>
				</thead>
				<tbody>
					<?php $sql = mysqli_query($con, "SELECT * FROM messages");
					$count = 1;
						while ($data = mysqli_fetch_assoc($sql)) { ?>
							<tr>
								<th><?= $count; ?></th>
								<td><?= $data['email']; ?></td>
								<td><?= $data['name']; ?></td>
								<td><?= $data['msg']; ?></td>
								<td><?= $data['date_sent']; ?></td>
								<td><button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#reply<?= $data['msg_id']; ?>">Reply</button></td>
							</tr>
							<!-- Button trigger modal -->
							<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reply">
							Launch static backdrop modal
							</button> -->
							<!-- Modal -->
							<div class="modal fade" id="reply<?= $data['msg_id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="staticBackdropLabel">Reply Message</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
											<form action="../phpmailer/index.php?operation=reply_message" method="post">
												<div class="modal-body"> 
													<div class="mb-3">
														<!-- <label for="email" class="form-label">User's Email</label> -->
														<input type="hidden" name="id" value="<?= $data['msg_id']; ?>" class="form-control" id="email" placeholder="user email">
													</div>
													<div class="mb-3">
														<label for="email" class="form-label">User's Email</label>
														<input type="email" name="email" value="<?= $data['email']; ?>" class="form-control" id="email" placeholder="user email">
													</div>
													<div class="mb-3">
														<label for="email" class="form-label">User's Name</label>
														<input type="text" name="name" value="<?= $data['name']; ?>" class="form-control" id="email" placeholder="user name">
													</div>
													<div class="mb-3">
														<label for="userMsg" class="form-label">User's Message</label>
														<textarea class="form-control" name="userMsg" id="userMsg" rows="3"><?= $data['msg']; ?></textarea>
													</div>
													<div class="mb-3">
														<label for="yourReply" class="form-label">Your Reply</label>
														<textarea class="form-control" name="yourReply" id="yourReply" rows="3">Type your reply message here</textarea>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
													<button type="submit" name="replyMsg" class="btn btn-primary">Reply</button>
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
						<td>user1@user.com</td>
						<td>User Testing</td>
						<td>Hello, How are you</td>
						<td><button class="btn btn-primary btn-sm">Reply</button></td>
					</tr>
					<tr>
						<th>3</th>
						<td>user2@user.com</td>
						<td>User Testing</td>
						<td>Hello, How are you</td>
						<td><button class="btn btn-primary btn-sm">Reply</button></td>
					</tr>
					<tr>
						<th>4</th>
						<td>user3@user.com</td>
						<td>User Testing</td>
						<td>Hello, How are you</td>
						<td><button class="btn btn-primary btn-sm">Reply</button></td>
					</tr> -->
				</tbody>
			</table>
		</div>
	</div>
</main>