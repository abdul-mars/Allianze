<?php session_start();
	require_once '../includes/database.php';
	// user send message handler
	if (@$_GET['operation'] == 'msg_send') {
		if (isset($_POST['msgSubmit'])) {
			$email = mysqli_real_escape_string($con, $_POST['email']);
			$name = mysqli_real_escape_string($con, $_POST['name']);
			$message = mysqli_real_escape_string($con, $_POST['message']);

			if (empty($email) || empty($name) || empty($message)) {
				$msg = 'all fields are required';
				$cssClass = 'alert-danger';
				header("location: ../index.php?msg=$msg&cssClass=$cssClass");
				exit();
			} else {
				$sql = mysqli_query($con, "INSERT INTO `messages`( `email`, `name`, `msg`) VALUES ('$email','$name','$message')");
				if ($sql) {
					$msg = 'Message sent Successfully. Thanks for messaging us';
					$cssClass = 'alert-success';
					header("location: ../index.php?msg=$msg&cssClass=$cssClass");
					exit();
				} else {
					$msg = 'Unabel to send message';
					$cssClass = 'alert-danger';
					header("location: ../index.php?msg=$msg&cssClass=$cssClass");
					exit();
				}
			}
		}
	}

	// admin reply message handler
	if (@$_GET['operation'] == 'reply_message') {
		if (isset($_POST['replyMsg'])) {
			$id = mysqli_real_escape_string($con, $_POST['id']);
			$email = mysqli_real_escape_string($con, $_POST['email']);
			$name = mysqli_real_escape_string($con, $_POST['name']);
			$userMsg = mysqli_real_escape_string($con, $_POST['userMsg']);
			$yourReply = mysqli_real_escape_string($con, $_POST['yourReply']);

			// echo $id;echo "<br>";
			// echo $email;echo "<br>";
			// echo $name;echo "<br>";
			// echo $userMsg;echo "<br>";
			// echo $yourReply;echo "<br>";
			//echo "<br>"; 
			$body = "<p>Hello, ".$name."</p>
			<p>Replying to your message: </p>
			<p><b>".$userMsg."</b></p>
			<p>.".$yourReply."</p>";
			// echo $body;
		}
	}