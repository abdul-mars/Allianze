<?php require_once '../includes/database.php';
	/*##########Script Information#########
	  # Purpose: Send mail Using PHPMailer#
	  #          & Gmail SMTP Server 	  #
	  # Created: 24-11-2019 			  #
	  #	Author : Hafiz Haider			  #
	  # Version: 1.0					  #
	  # Website: www.BroExperts.com 	  #
	  #####################################*/

		//Include required PHPMailer files
		require 'includes/PHPMailer.php';
		require 'includes/SMTP.php';
		require 'includes/Exception.php';
		//Define name spaces
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\SMTP;
		use PHPMailer\PHPMailer\Exception;


	if (@$_GET['operation'] == 'reply_message') {
		if (isset($_POST['replyMsg'])) {
			$id = mysqli_real_escape_string($con, $_POST['id']);
			$email = mysqli_real_escape_string($con, $_POST['email']);
			$name = mysqli_real_escape_string($con, $_POST['name']);
			$userMsg = mysqli_real_escape_string($con, $_POST['userMsg']);
			$yourReply = mysqli_real_escape_string($con, $_POST['yourReply']);

			$body = "<p>Hello, ".$name."</p>
			<p>Replying to your message: </p>
			<p><b>".$userMsg."</b></p>
			Our Reply:
			<p>.".$yourReply."</p>";
			$subject = 'Raply From Allianze Vehicle Insurance';

			function successReturn(){
				$msg = 'Raply sent Successfully';
				$cssClass = 'alert-success';
				header("location: ../admin/messages.php?msg=$msg&cssClass=$cssClass");
				exit();
			}
			function notSuccessReturn(){
				$msg = 'Unable to send reply';
				$cssClass = 'alert-danger';
				header("location: ../admin/messages.php?msg=$msg&cssClass=$cssClass");
				exit();
			}

		//Create instance of PHPMailer
			$mail = new PHPMailer();
		//Set mailer to use smtp
			$mail->isSMTP();
		//Define smtp host
			$mail->Host = "smtp.gmail.com";
		//Enable smtp authentication
			$mail->SMTPAuth = true;
		//Set smtp encryption type (ssl/tls)
			$mail->SMTPSecure = "tls";
		//Port to connect smtp
			$mail->Port = "587";
		//Set gmail username
			$mail->Username = "marssoftwares1@gmail.com";
		//Set gmail password
			$mail->Password = "sdlbvsolsmepcvpe";
		//Email subject
			// $mail->Subject = "Test email using PHPMailer";
			$mail->Subject = $subject;
		//Set sender email
			$mail->setFrom('marssoftwares1@gmail.com');
		//Enable HTML
			$mail->isHTML(true);
		//Attachment
			//$mail->addAttachment('img/attachment.png');
		//Email body
			// $mail->Body = "<h1>This is HTML h1 Heading</h1></br><p>This is html paragraph</p>";
			$mail->Body = $body;
		//Add recipient
			// $mail->addAddress('abdulmars1102@gmail.com');
			$mail->addAddress($email);
		//Finally send email
			if ( $mail->send() ) {
				// echo "Email Sent..!";
				successReturn();
			}else{
				// echo "Message could not be sent. Mailer Error: ";
				notSuccessReturn();
			}
		//Closing smtp connection
			$mail->smtpClose();
		}
	}

	if (@$_GET['operation'] == 'forget_password') {
		if (isset($_POST['forgetPassSubmit'])) {
			$email = mysqli_real_escape_string($con, $_POST['email']);
			// echo $email;
			$sql = mysqli_query($con, "SELECT * FROM logins WHERE email = '$email'");
			if (mysqli_num_rows($sql) < 1) {
				$msg = 'This email is not registered';
				$cssClass = 'alert-danger';
				header("location: ../login.php?msg=$msg&cssClass=$cssClass");
				exit();
			} else {
				$code = rand(000000, 999999);
				// echo $code;
				$subject = 'Verification Code From Allianze Vehicle Insurance';
				$body = "<p>You request to reset your account password and here your verification code</p>
						<p style='font-weight: bold; color: red;'>".$code."</p>";
				// echo $subject; echo "<br>";
				// echo $body;

				$sql = mysqli_query($con, "INSERT INTO `forget_password`( `email`, `code`) VALUES ('$email','$code')");
				if ($sql) {
					//Create instance of PHPMailer
						$mail = new PHPMailer();
					//Set mailer to use smtp
						$mail->isSMTP();
					//Define smtp host
						$mail->Host = "smtp.gmail.com";
					//Enable smtp authentication
						$mail->SMTPAuth = true;
					//Set smtp encryption type (ssl/tls)
						$mail->SMTPSecure = "tls";
					//Port to connect smtp
						$mail->Port = "587";
					//Set gmail username
						$mail->Username = "marssoftwares1@gmail.com";
					//Set gmail password
						$mail->Password = "sdlbvsolsmepcvpe";
					//Email subject
						// $mail->Subject = "Test email using PHPMailer";
						$mail->Subject = $subject;
					//Set sender email
						$mail->setFrom('marssoftwares1@gmail.com');
					//Enable HTML
						$mail->isHTML(true);
					//Attachment
						//$mail->addAttachment('img/attachment.png');
					//Email body
						// $mail->Body = "<h1>This is HTML h1 Heading</h1></br><p>This is html paragraph</p>";
						$mail->Body = $body;
					//Add recipient
						// $mail->addAddress('abdulmars1102@gmail.com');
						$mail->addAddress($email);
					//Finally send email
						if ( $mail->send() ) {
							// echo "Email Sent..!";
							$msg = 'Verification Code has been sent to your email, please verify that its you by entering code';
							$cssClass = 'alert-success';
							header("location: ../forgot_password.php?page=code&email=$email&msg=$msg&cssClass=$cssClass");
							exit();
						}else{
							// echo "Message could not be sent. Mailer Error: ";
							$msg = 'Unable to generate verification code. please try again later';
							$cssClass = 'alert-danger';
							header("location: ../login.php?msg=$msg&cssClass=$cssClass");
							exit();
						}
					//Closing smtp connection
						$mail->smtpClose();

				} else { 
					$msg = 'Unable to generate verification code. please try again later';
					$cssClass = 'alert-danger';
					header("location: ../login.php?msg=$msg&cssClass=$cssClass");
					exit();
				}
			}
		}
	}

	if (@$_GET['operation'] == 'claim_message') {
		if (isset($_POST['claimMsgSubmit'])) {
			$email = mysqli_real_escape_string($con, $_POST['email']);
			$msg = mysqli_real_escape_string($con, $_POST['msg']);

			// echo $email;
			// echo $msg;
			// $body = "<p>Hello, ".$name."</p>
			// <p>Replying to your message: </p>
			// <p><b>".$userMsg."</b></p>
			// Our Reply:
			// <p>.".$yourReply."</p>";
			$body = $msg;
			$subject = 'Message From Allianze Vehicle Insurance';

			function successReturn(){
				$msg = 'Message sent Successfully';
				$cssClass = 'alert-success';
				header("location: ../admin/claims.php?msg=$msg&cssClass=$cssClass");
				exit();
			}
			function notSuccessReturn(){
				$msg = 'Unable to send message';
				$cssClass = 'alert-danger';
				header("location: ../admin/claims.php?msg=$msg&cssClass=$cssClass");
				exit();
			}

			//Create instance of PHPMailer
				$mail = new PHPMailer();
			//Set mailer to use smtp
				$mail->isSMTP();
			//Define smtp host
				$mail->Host = "smtp.gmail.com";
			//Enable smtp authentication
				$mail->SMTPAuth = true;
			//Set smtp encryption type (ssl/tls)
				$mail->SMTPSecure = "tls";
			//Port to connect smtp
				$mail->Port = "587";
			//Set gmail username
				$mail->Username = "marssoftwares1@gmail.com";
			//Set gmail password
				$mail->Password = "sdlbvsolsmepcvpe";
			//Email subject
				// $mail->Subject = "Test email using PHPMailer";
				$mail->Subject = $subject;
			//Set sender email
				$mail->setFrom('marssoftwares1@gmail.com');
			//Enable HTML
				$mail->isHTML(true);
			//Attachment
				//$mail->addAttachment('img/attachment.png');
			//Email body
				// $mail->Body = "<h1>This is HTML h1 Heading</h1></br><p>This is html paragraph</p>";
				$mail->Body = $body;
			//Add recipient
				// $mail->addAddress('abdulmars1102@gmail.com');
				$mail->addAddress($email);
			//Finally send email
				if ( $mail->send() ) {
					// echo "Email Sent..!";
					successReturn();
				}else{
					// echo "Message could not be sent. Mailer Error: ";
					notSuccessReturn();
				}
			//Closing smtp connection
				$mail->smtpClose();
		}
	}

	
	// //Include required PHPMailer files
	// 	require 'includes/PHPMailer.php';
	// 	require 'includes/SMTP.php';
	// 	require 'includes/Exception.php';
	// //Define name spaces
	// 	use PHPMailer\PHPMailer\PHPMailer;
	// 	use PHPMailer\PHPMailer\SMTP;
	// 	use PHPMailer\PHPMailer\Exception;
	// //Create instance of PHPMailer
	// 	$mail = new PHPMailer();
	// //Set mailer to use smtp
	// 	$mail->isSMTP();
	// //Define smtp host
	// 	$mail->Host = "smtp.gmail.com";
	// //Enable smtp authentication
	// 	$mail->SMTPAuth = true;
	// //Set smtp encryption type (ssl/tls)
	// 	$mail->SMTPSecure = "tls";
	// //Port to connect smtp
	// 	$mail->Port = "587";
	// //Set gmail username
	// 	$mail->Username = "marssoftwares1@gmail.com";
	// //Set gmail password
	// 	$mail->Password = "sdlbvsolsmepcvpe";
	// //Email subject
	// 	// $mail->Subject = "Test email using PHPMailer";
	// 	$mail->Subject = $subject;
	// //Set sender email
	// 	$mail->setFrom('marssoftwares1@gmail.com');
	// //Enable HTML
	// 	$mail->isHTML(true);
	// //Attachment
	// 	//$mail->addAttachment('img/attachment.png');
	// //Email body
	// 	// $mail->Body = "<h1>This is HTML h1 Heading</h1></br><p>This is html paragraph</p>";
	// 	$mail->Body = $body;
	// //Add recipient
	// 	// $mail->addAddress('abdulmars1102@gmail.com');
	// 	$mail->addAddress($email);
	// //Finally send email
	// 	if ( $mail->send() ) {
	// 		// echo "Email Sent..!";
	// 		successReturn();
	// 	}else{
	// 		// echo "Message could not be sent. Mailer Error: ";
	// 		notSuccessReturn();
	// 	}
	// //Closing smtp connection
	// 	$mail->smtpClose();